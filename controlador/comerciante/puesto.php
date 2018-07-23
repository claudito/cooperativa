<?php 

include'../../autoload.php';
$puesto      = $_POST['puesto'];
$comerciante = $_POST['comerciante'];


$comerciantePuesto  =  new ComerciantePuesto($comerciante,$puesto);
$comerciantePuesto->eliminar();
$comerciantePuesto->agregar();

echo '<div class="alert alert-success">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	Puesto Agregado.
</div>';

 ?>