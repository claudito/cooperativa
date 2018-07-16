<?php 

include'../../autoload.php';

$session =  new Session();
$session->validity();

//session fecha
$_SESSION['session_fecha'] = $_POST['valor'];


 ?>