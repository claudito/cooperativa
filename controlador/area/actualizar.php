<?php 

include'../../autoload.php';
$session     = new Session();
$funciones   = new Funciones();
$message     = new Message();

$session->validity();

$id          =  $funciones->validar_xss($_POST['id']);
$descripcion =  $funciones->validar_xss($_POST['descripcion']);

$objeto      =  new Area($descripcion);
$data        =  $objeto->actualizar($id);

switch ($data) {
	case 'ok':
$message->sweetalert('Buen Trabajo','success','Registro Actualizado',2);
		break;
	default:
$message->sweetalert('Error','error','Consulte al área de soporte',2);
		break;
}



?>