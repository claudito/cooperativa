<?php 

class Concepto extends Conexion
{


function lista()
{

try {
	
$conexion   =  $this->get_conexion();
$query      =  "
SELECT 
*
FROM concepto";
$statement  = $conexion->prepare($query);
$statement->execute();
$result     = $statement->fetchAll(PDO::FETCH_ASSOC);
return $result;


} catch (Exception $e) {
	
echo "Error: ".$e->getMessage();

}



}


function consulta($id)
{

try {
	
$conexion   =  $this->get_conexion();
$query      =  "
SELECT 
*
FROM concepto WHERE id=:id";
$statement  = $conexion->prepare($query);
$statement->bindParam(':id',$id);
$statement->execute();
$result     = $statement->fetch();
return $result;

} catch (Exception $e) {
	
echo "Error: ".$e->getMessage();

}



}






}



 ?>