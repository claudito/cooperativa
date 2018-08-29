<?php 

include'../../../autoload.php';

$assets = new Assets();
$objeto = new Comerciante();
$id     = $_POST['id'];
$dato   = $objeto->consulta($id);

 ?>

<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h4 class="modal-title"><?= $dato['nombres'].' '.$dato['apellidos'] ?></h4>
</div>

<div class="modal-body">

<form id="actualizar" autocomplete="off">

<input type="hidden" name="id" value="<?= $id ?>">

<div class="row">
<div class="col-md-6">
<div class="form-group">
<label>Nombres</label>
<input type="text" name="" id="" class="form-control">
</div>	
</div>
<div class="col-md-6">
<div class="form-group">
<label>Apellidos</label>
<input type="text" name="" id="" class="form-control">
</div>
</div>
</div>



<button class="btn btn-primary">Actualizar</button>

</form>

</div>


<?php $assets->modal_actualizar('comerciante'); ?>