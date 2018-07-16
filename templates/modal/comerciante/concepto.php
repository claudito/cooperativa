<?php 

include'../../../autoload.php';

$id                   = $_POST['id'];
$concepto             =  new Concepto();
$conceptoComerciante  =  new ConceptoComerciante($id);
$conceptoComerciante->fill_conceptos();

 ?>

<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h4 class="modal-title">Conceptos</h4>
</div>

<form id="concepto">
<div class="modal-body">

<div id="msj_concepto"></div>

<input type="hidden" name="id" value="<?= $id ?>">
<ul>
<?php foreach ($concepto->lista() as $key => $value): ?>
<div class="checkbox">
<label>
<?php if ($conceptoComerciante->consulta($value['id'])['estado']==1): ?>
<input type="checkbox" name="<?= $value['id'] ?>" checked><?= $value['descripcion'] ?>
<?php else: ?>
<input type="checkbox" name="<?= $value['id'] ?>"><?= $value['descripcion'] ?>
<?php endif ?>
</label>
</div>
<?php endforeach ?>
</ul>

</div>
<div class="modal-footer">
<button type="submit" class="btn btn-primary">Actualizar</button>
</div>
</form>

<script>
$('#concepto').submit(function(event){

var parametros =  $(this).serialize();

$.ajax({

url:"../controlador/comerciante/concepto.php",
type:"POST",
data:parametros,
beforeSend:function()
{

$('#msj_concepto').html('Cargando...');

},
success:function(data)
{

$('#msj_concepto').html(data);

}

});



event.preventDefault();
});

</script>