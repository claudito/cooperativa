<?php 

include'../../../autoload.php';

$assets = new Assets();
$objeto = new Puesto();
$id     = $_GET['id'];
$dato   = $objeto->consulta($id);
$tipo   = array('exterior','interior','puesto');
$estado = array('libre','socio','cooperativa');

 ?>

<form id="actualizar" autocomplete="off">

<input type="hidden" name="id" value="<?= $id ?>">





<div class="row">
<div class="col-md-6">
<div class="form-group">
<label>Id</label>
<input type="number" min="1" name="codigo" class="form-control" required
 value="<?= $dato['id']  ?>" readonly>
</div>  
</div>
<div class="col-md-6">
<div class="form-group">
<label>Código</label>
<input type="number" min="1" name="codigo" class="form-control" required
 value="<?= $dato['codigo']  ?>" readonly>
</div> 
</div>
</div>


<div class="form-group">
<label>Descripción</label>
<input type="text" name="descripcion" class="form-control" required
 value="<?= $dato['descripcion']  ?>" onchange="Mayusculas(this)">
</div>

<div class="form-group">
<label>Estado</label>
<select name="estado" class="form-control">
<option value="<?= $dato['estado'] ?>"><?= strtoupper($dato['estado']) ?></option>
<?php foreach ($estado as $key => $value): ?>
<?php if ($dato['estado']!==$value): ?>
<option value="<?= $value ?>"><?= strtoupper($value) ?></option>
 <?php endif ?> 
<?php endforeach ?>
</select>
</div>

<div class="form-group">
<label>Tipo</label>
<select name="tipo" class="form-control">
<option value="<?= $dato['tipo'] ?>"><?= strtoupper($dato['tipo']) ?></option>
<?php foreach ($tipo as $key => $value): ?>
<?php if ($dato['tipo']!==$value): ?>
<option value="<?= $value ?>"><?= strtoupper($value) ?></option>
 <?php endif ?> 
<?php endforeach ?>
</select>
</div>

<button class="btn btn-primary">Actualizar</button>

</form>


<?php $assets->modal_actualizar('puesto'); ?>