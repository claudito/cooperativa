<?php 
include'../autoload.php';
$assets  = new Assets();
$session = new Session();
$session->validity();
$session->acceso();
$assets->title('Puestos');
$assets->sweetalert();
$assets->datatables();
$assets->head();
$assets->nav('..');
$assets->breadcrumbs('MANTENIMIENTOS','PUESTOS');
$assets->modal('puesto/agregar');
$assets->modal('puesto/eliminar');
?>



<div class="row">

<div class="col-md-12">


<!-- Botón Agregar
<div class="pull-right">
<button class="btn btn-primary" data-toggle="modal" href="#modal-agregar"><i class="fa fa-plus"></i>  Agregar</button>
</div> -->


<div id="mensaje"></div>
<div id="loader" class="text-center"></div>
<div id="table"></div>



</div>

</div>



<script src="../ajax/app/puesto.js"></script>
<script>loadTable()</script>
<?php  $assets->footer();  ?>