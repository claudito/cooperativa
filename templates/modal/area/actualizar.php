<?php 

include'../../../autoload.php';

$assets = new Assets();
$objeto = new Area();
$id     = $_GET['id'];
$dato   = $objeto->consulta($id);

 ?>

<form id="actualizar" autocomplete="off">

<input type="hidden" name="id" value="<?= $id ?>">

<div class="row">
<div class="col-md-2">
<div class="form-group">
<label>Id</label>
<input type="number" min="1" name="codigo" class="form-control" required
 value="<?= $dato['id']  ?>" readonly>
</div>  
</div>
<div class="col-md-10">
<div class="form-group">
<label>Descripción</label>
<input type="text"  name="descripcion" class="form-control" required
 value="<?= $dato['descripcion']  ?>" onchange="Mayusculas(this)">
</div> 
</div>
</div>

<button class="btn btn-primary">Actualizar</button>

</form>


<?php $assets->modal_actualizar('area'); ?>