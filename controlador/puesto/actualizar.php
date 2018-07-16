<?php 

include'../../autoload.php';
$session     = new Session();
$funciones   = new Funciones();
$message     = new Message();

$session->validity();

$id          =  $funciones->validar_xss($_POST['id']);
$codigo      =  $funciones->validar_xss($_POST['codigo']);
$descripcion =  $funciones->validar_xss($_POST['descripcion']);
$estado      =  $funciones->validar_xss($_POST['estado']);
$tipo        =  $funciones->validar_xss($_POST['tipo']);

$objeto      =  new Puesto($codigo,$descripcion,$estado,$tipo);
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