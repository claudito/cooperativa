<?php 


class Area extends Conexion{


protected $descripcion;


function __construct($descripcion='')
{


 $this->descripcion = $descripcion;


}


function agregar()
{

try {

$conexion = $this->get_conexion();
$query    = "SELECT * FROM area WHERE descripcion=:descripcion";
$statement= $conexion->prepare($query);
$statement->bindParam(':descripcion',$this->descripcion); 
$statement->execute();
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
if (count($result)>0) 
{
return "existe";
}
else
{

$query    = "INSERT INTO area(descripcion)VALUES(:descripcion)";
$statement= $conexion->prepare($query);
$statement->bindParam(':descripcion',$this->descripcion);
$statement->execute();
return "ok";

}

} catch (Exception $e) {
	
echo "Error: ".$e->getMessage();

}


}

function actualizar($id)
{

try {

$conexion = $this->get_conexion();
$query    = "UPDATE  area SET 
descripcion=:descripcion
 WHERE id=:id";
$statement= $conexion->prepare($query);
$statement->bindParam(':id',$id);
$statement->bindParam(':descripcion',$this->descripcion);
$statement->execute();
return "ok";

} catch (Exception $e) {
	
echo "Error: ".$e->getMessage();

}


}



function lista()
{

try {

$conexion = $this->get_conexion();
$query    = "SELECT * FROM  area";
$statement= $conexion->prepare($query);
$statement->execute();
$result   = $statement->fetchAll(PDO::FETCH_ASSOC);
return $result;

} catch (Exception $e) {
	
echo "Error: ".$e->getMessage();

}


}


function consulta($id)
{

try {

$conexion = $this->get_conexion();
$query    = "SELECT * FROM  area WHERE id=:id";
$statement= $conexion->prepare($query);
$statement->bindParam(':id',$id);
$statement->execute();
$result   = $statement->fetch();
return $result;

} catch (Exception $e) {
	
echo "Error: ".$e->getMessage();

}


}




}



 ?>