<?php 

include'../../autoload.php';
$session =  new Session();
$session->validity();
$id        = $_POST['elegido'];
$concepto  = new Concepto();
$data      = $concepto->consulta($id);

$fecha     =  (isset($_SESSION['session_fecha'])) ? $_SESSION['session_fecha'] : date('Y-m-d'); ;

$id_comerciante = $_SESSION['id_comerciante'];



 ?>

<form id="agregar_monto">
	
<input type="hidden" value="<?= $id_comerciante ?>" name="id_comerciante" id="id_comerciante">
<input type="hidden" value="<?= $id ?>" name="id_concepto" id="id_concepto">
<input type="hidden" value="<?= $fecha ?>" name="fecha" id="fecha">


<label>Monto</label>
<div class="input-group">
  <span class="input-group-addon">Costo del Concepto - S/. <?= round($data['costo'],2) ?> </span>
  <input type="number" name="monto" class="form-control" 
     step="any"  max="<?= round($data['costo'],2); ?>"  value="<?= round($data['costo'],2); ?>"  required autofocus>
<span class="input-group-btn">
<button class="btn btn-primary" type="submit"><i class="fa fa-plus"></i> Agregar Monto</button>
</span>
</div>

</form>

<hr>

<div id="data-pago"></div>

<script>	
function loadPago(comerciante,concepto,fecha)
{

var parametros = {"comerciante":comerciante,"concepto":concepto,"fecha":fecha};

$.ajax({

url:"../templates/modal/comerciante/monto-detalle.php",
type:"POST",
data:parametros,
beforeSend:function(){

$('#data-pago').html('Cargando...');

},
success:function(data)
{

$('#data-pago').html(data);

}



});



}
loadPago(<?= $id_comerciante ?>,<?= $id ?>,'<?= $fecha ?>');

$('#agregar_monto').submit(function (event){

var id_comerciante = $('#id_comerciante').val();
var id_concepto    = $('#id_concepto').val();
var fecha          = $('#fecha').val();

var parametros = $(this).serialize();

$.ajax({

url:"../controlador/comerciante/monto.php",
type:"POST",
data:parametros,
beforeSend:function(){

$('#data-pago').html('Cargando...');

},
success:function(data)
{

$('#data-pago').html(data);
loadPago(id_comerciante,id_concepto,fecha);

}

});


event.preventDefault();	
});


</script>