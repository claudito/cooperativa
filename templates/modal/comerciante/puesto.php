<?php 

include'../../../autoload.php';
$session =  new Session();
$session->validity();
$id 			      = $_POST['id'];
$comerciante          = new Comerciante();
$dato                 = $comerciante->consulta($id);

$puesto               = new Puesto();

 ?>
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h4 class="modal-title"><i class="fa fa-user"></i> <?= $dato['nombres'].' '.$dato['apellidos']; ?></h4>
</div>

<div class="modal-body">

<div id="msj_puesto"></div>


<div class="form-group">
<label>Puestos:</label>


<?php foreach ($puesto->lista() as $key => $value): ?>
<div class="checkbox">
 <label>
    <input type="checkbox"  class="puesto" 
    data-puesto="<?= $value['id'] ?>"
    data-comerciante="<?= $id ?>"
    >
    <?= $value['codigo'].' - '.$value['descripcion'].' - '.$value['estado'].' - '.$value['tipo'] ?>
  </label>
</div>
<?php endforeach ?>


</div>


</div>


<script>
/*
$(".puesto").on( 'change', function() {
    if( $(this).is(':checked') ) {
        // Hacer algo si el checkbox ha sido seleccionado
        alert("El checkbox con valor " + $(this).val() + " ha sido seleccionado");
    } else {
        // Hacer algo si el checkbox ha sido deseleccionado
        alert("El checkbox con valor " + $(this).val() + " ha sido deseleccionado");
    }
});*/

$(".puesto").on( 'change', function() {

     var puesto      = $(this).data('puesto');
     var comerciante = $(this).data('comerciante');

    if( $(this).is(':checked') ) {
        // Hacer algo si el checkbox ha sido seleccionado
        //alert("El checkbox con valor " + $(this).val() + " ha sido seleccionado");
       	alert(puesto);


    }
    else {
        // Hacer algo si el checkbox ha sido deseleccionado
        alert("El checkbox con valor " + $(this).val() + " ha sido deseleccionado");


    }


});



</script>
