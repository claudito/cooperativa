<?php 

include'../../../autoload.php';
$session =  new Session();
$session->validity();
unset($_SESSION['session_fecha']);
$id 			      = $_POST['id'];
$conceptoComerciante  = new ConceptoComerciante($id);
$comerciante          = new Comerciante();
$dato                 = $comerciante->consulta($id);
$_SESSION['id_comerciante'] = $id;

 ?>

<script>
$(document).ready(function() {
// Parametros para el combo
$("#idconcepto").change(function () {
$("#idconcepto option:selected").each(function () {
elegido=$(this).val();
$.post("../ajax/select/concepto.php", { elegido: elegido }, function(data){
$("#data-concepto").html(data);
});     
});
});    
});
</script>


<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h4 class="modal-title"><i class="fa fa-user"></i> <?= $dato['nombres'].' '.$dato['apellidos']; ?></h4>
</div>
<div class="modal-body">

<div class="row">
<div class="col-md-6">
<div class="form-group">

<label >Fecha de Pago</label>
<input type="date" name="fecha" id="idfecha"  required class="form-control" 
 value="<?= date('Y-m-d'); ?>">

</div>	
</div>
<div class="col-md-6">
<div class="form-group">
<label>Conceptos</label>
<select name="concepto" id="idconcepto"  class="form-control" required>
<option value="">[Seleccionar]</option>
<?php foreach ($conceptoComerciante->lista() as $key => $value): ?>
<option value="<?= $value['id'] ?>"><?= $value['descripcion'] ?></option>
<?php endforeach ?>
</select>
</div>	
</div>
</div>

<div id="data-concepto"></div>

</div>

<script>
$( "#idfecha" ).blur(function() {

  var valor      = $(this).val();
  var parametros = {'valor':valor}
  var url        = "../controlador/comerciante/session_fecha.php";

  $.post(url,parametros,function(data){
 
  $('#idconcepto').prop('selectedIndex',0);
  $('#data-concepto').html("");

   //data enviada

  //alert(data);

  });


});
</script>
