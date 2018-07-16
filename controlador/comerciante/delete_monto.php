<?php 

include'../../autoload.php';

$id   =  $_POST['id'];

$conceptoPago = new ConceptoPago();
$conceptoPago->eliminar($id);


 ?>