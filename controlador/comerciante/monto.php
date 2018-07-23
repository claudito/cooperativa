<?php 

include'../../autoload.php';

$comerciante  = $_POST['id_comerciante'];
$concepto     = $_POST['id_concepto'];
$monto        = $_POST['monto'];
$fecha        = $_POST['fecha'];
$puesto       = $_POST['id_puesto'];

$conceptoPago = new ConceptoPago($comerciante,$concepto,$monto,$fecha,$puesto);
$data         = $conceptoPago->agregar();

if ($data=='ok') 
{
 echo '<div class="alert alert-success">
 	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
 	Registro Agregado
 </div>';
} 
else
{
 echo '<div class="alert alert-danger">
 	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
 	Error
 </div>';
}




 ?>