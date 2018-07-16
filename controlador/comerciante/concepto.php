<?php 

include'../../autoload.php';

$concepto  =  new Concepto();

foreach ($concepto->lista() as $key => $value) {
	 
   $valor       = $value['id'];
   $estado      = (isset($_POST[$value['id']])) ? 1 : 0 ;
   $comerciante = $_POST['id'];

   //$valor.' - '.$estado.' - '.$comerciante."<br>";

   $conceptoComerciante  =  new ConceptoComerciante($comerciante,$valor,$estado);
  $conceptoComerciante->actualizar();


}

echo '<div class="alert alert-success">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	Información Actualizada.
</div>';


 ?>