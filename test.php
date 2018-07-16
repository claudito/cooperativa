<?php 

include'autoload.php';

$session =  new Session();
$session->validity();

unset($_SESSION['session_fecha']);


 ?>