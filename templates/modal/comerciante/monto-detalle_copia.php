<?php 

include'../../../autoload.php';

$comerciante  = $_POST['comerciante'];
$concepto     = $_POST['concepto'];
$fecha        = $_POST['fecha'];
$obj_concepto = new Concepto();
$data         = $obj_concepto->consulta($concepto);



if ($data['tipo']=='diario') 
{

$fecha_formato  = $fecha;
} 
else
{
$fecha_formato  = substr($fecha,0,7);

}



$conceptoPago = new ConceptoPago($comerciante,$concepto,'',$fecha_formato);



 ?>

<?php if ($data['tipo']=='diario'): ?>
<?php if (count($conceptoPago->lista_diario())>0): ?>
<div class="table-responsive">
	<table class="table table-condensed">
		<thead>
			<tr class="success">
				<th>Concepto</th>
				<th class="text-center">Monto</th>
				<th class="text-center">Fecha</th>
				<th class="text-center">Acciones</th>
			</tr>
		</thead>
		<tbody>
		<?php 
        $total = 0; 
		foreach ($conceptoPago->lista_diario()as $key => $value): ?>
		<tr>
		<td><?= $value['descripcion'] ?></td>
		<td class="text-center"><?= round($value['pago'],2) ?></td>
		<td class="text-center"><?= date_format(date_create($value['fecha']),'d/m/Y') ?></td>
		<td class="text-center">
		<button class="btn btn-xs btn-danger btn-delete"
		 data-id='<?= $value['id'] ?>'
         data-comerciante='<?= $comerciante ?>'
         data-concepto='<?= $concepto ?>'
         data-fecha='<?= $fecha ?>'
		><i class="glyphicon glyphicon-trash"></i></button>
		</td>
		</tr>
		<?php $total = $total + round($value['pago'],2) ?>
		<?php endforeach ?>
		</tbody>
		<tbody>
		<tr>
		<td class="text-right"><strong>Total: </strong></td>
		<td class="text-center"><?= $total; ?></td>
		</tr>
		</tbody>
	</table>
</div>
<script>
$('.btn-delete').on('click',function (){

var id          = $(this).data('id');
var comerciante = $(this).data('comerciante');
var concepto    = $(this).data('concepto');
var fecha       = $(this).data('fecha');

var url = "../controlador/comerciante/delete_monto.php";
var parametros = {"id":id};

$.post(url,parametros,function(data){

//alert(data);

loadPago(comerciante,concepto,fecha);

});

});
</script>
<?php else: ?>
<p class="alert alert-warning">No hay registro disponibles.</p>	
<?php endif ?>
	
<?php else: ?>
<?php if (count($conceptoPago->lista_mes())>0): ?>
<div class="table-responsive">
	<table class="table table-condensed">
		<thead>
			<tr class="success">
				<th>Concepto</th>
				<th class="text-center">Monto</th>
				<th class="text-center">Fecha</th>
				<th class="text-center">Acciones</th>
			</tr>
		</thead>
		<tbody>
		<?php 
        $total = 0; 
		foreach ($conceptoPago->lista_mes()as $key => $value): ?>
		<tr>
		<td><?= $value['descripcion'] ?></td>
		<td class="text-center"><?= round($value['pago'],2) ?></td>
		<td class="text-center"><?= date_format(date_create($value['fecha']),'d/m/Y') ?></td>
		<td class="text-center">
		<button class="btn btn-xs btn-danger btn-delete"
		 data-id='<?= $value['id'] ?>'
         data-comerciante='<?= $comerciante ?>'
         data-concepto='<?= $concepto ?>'
         data-fecha='<?= $fecha ?>'
		><i class="glyphicon glyphicon-trash"></i></button>
		</td>
		</tr>
		<?php $total = $total + round($value['pago'],2) ?>
		<?php endforeach ?>
		</tbody>
		<tbody>
		<tr>
		<td class="text-right"><strong>Total: </strong></td>
		<td class="text-center"><?= $total; ?></td>
		</tr>
		</tbody>
	</table>
</div>
<script>
$('.btn-delete').on('click',function (){

var id          = $(this).data('id');
var comerciante = $(this).data('comerciante');
var concepto    = $(this).data('concepto');
var fecha       = $(this).data('fecha');

var url = "../controlador/comerciante/delete_monto.php";
var parametros = {"id":id};

$.post(url,parametros,function(data){

//alert(data);

loadPago(comerciante,concepto,fecha);

});

});
</script>
<?php else: ?>
<p class="alert alert-warning">No hay registro disponibles.</p>	
<?php endif ?>
	
<?php endif ?>



