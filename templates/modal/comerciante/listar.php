<?php 

include'../../../autoload.php';
$session     = new Session();
$session->validity();

$objeto = new Comerciante();
?>
<?php if (count($objeto->lista())>0): ?>
<div class="panel panel-info">
<div class="panel-heading">
<h3 class="panel-title">Comerciantes</h3>
</div>
<div class="panel-body">
<div class="table-responsive">
<table  id="consulta" class="table table-condensed">
<thead>
<tr>
<th>Id</th>
<th>Comerciante</th>
<th>Dni</th>
<th>Dirección</th>
<th>Telefóno</th>
<th>Celular</th>
<th>Correo</th>
<th>Fecha Ingreso</th>
<th>Área</th>
<th>Tipo</th> 
<th width="100">Acciones</th>
</tr>
</thead>
<tbody>
<?php foreach ($objeto->lista() as $key => $value): ?>
<tr>
<td><?= $value['id'] ?></td>
<td><a href="#" class="btn-edit" data-id="<?= $value['id'] ?>"><?= $value['nombres'].' '.$value['apellidos'] ?></a></td>
<td><?= $value['dni'] ?></td>
<td><?= $value['direccion'] ?></td>
<td><?= $value['telefono'] ?></td>
<td><?= $value['celular'] ?></td>
<td><?= $value['correo'] ?></td>
<td><?= date_format(date_create($value['fecha_ingreso']),'d/m/Y') ?></td>
<td><?= $value['area'] ?></td>
<td>
<?php if ($value['tipo']=='socio'): ?>
<label class="btn btn-warning btn-xs">SOCIO</label>
<?php else: ?>
<label class="btn btn-success btn-xs">INQUILINO</label>	
<?php endif ?>
</td> 
<td>
<button class="btn btn-default btn-puesto btn-xs"  data-id="<?= $value['id'] ?>"><i class="fa fa-home"></i></button> 
<button class="btn btn-primary btn-concepto btn-xs"  data-id="<?= $value['id'] ?>"><i class="fa fa-cube"></i></button> 
<button class="btn btn-success btn-pago btn-xs"  data-id="<?= $value['id'] ?>"><i class="fa fa-money"></i></button> 
</td>
</tr>
<?php endforeach ?>
</tbody>
</table>
</div>
</div>
</div>

<script>
//conceptos
$('.btn-concepto').click(function (){

var id         = $(this).data('id');
var parametros = {"id":id};
var url        = "../templates/modal/comerciante/concepto.php";
$.post(url,parametros,function (data){

$('#form-concepto').html(data);

});

$('#modal-concepto').modal('show');

});

//pagos
$('.btn-pago').click(function (){

var id         = $(this).data('id');
var parametros = {"id":id};
var url        = "../templates/modal/comerciante/pago.php";
$.post(url,parametros,function (data){

$('#form-pago').html(data);

});

$('#modal-pago').modal('show');

});


//puesto
$('.btn-puesto').click(function (){

var id         = $(this).data('id');
var parametros = {"id":id};
var url        = "../templates/modal/comerciante/puesto.php";
$.post(url,parametros,function (data){

$('#form-puesto').html(data);

});

$('#modal-puesto').modal('show');

});


//Actualizar
$('.btn-edit').on('click',function (){


var id         = $(this).data('id');
var parametros = {"id":id};
var url        = "../templates/modal/comerciante/actualizar.php";
$.post(url,parametros,function (data){

$('#form-edit').html(data);

});

$('#modal-actualizar').modal('show');


});
</script>


<!-- Modal Concepto -->
<div class="modal fade" id="modal-concepto">
	<div class="modal-dialog">
		<div class="modal-content">
		 
		<div id="form-concepto"></div>

		</div>
	</div>
</div>


<!-- Modal Pago -->
<div class="modal fade" id="modal-pago">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
		 
		<div id="form-pago"></div>

		</div>
	</div>
</div>

<!-- Modal Pago -->
<div class="modal fade" id="modal-puesto">
	<div class="modal-dialog">
		<div class="modal-content">
		 
		<div id="form-puesto"></div>

		</div>
	</div>
</div>

<!-- Modal Pago -->
<div class="modal fade" id="modal-actualizar">
	<div class="modal-dialog">
		<div class="modal-content">
		 
		<div id="form-edit"></div>

		</div>
	</div>
</div>



<script>
$(document).ready(function() {
    $('#consulta').DataTable( {
        "language": {
            "url": "../assets/js/spanish.json"
        }
    } );
} );
</script>
<?php else: ?>
<p class="alert alert-warning">No hay registros disponibles.</p>
<?php endif ?>