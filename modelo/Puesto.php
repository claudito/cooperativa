<?php 


class Puesto extends Conexion{

protected $codigo;
protected $descripcion;
protected $estado;
protected $tipo;

function __construct($codigo='',$descripcion='',$estado='',$tipo='')
{

 $this->codigo      = $codigo;
 $this->descripcion = $descripcion;
 $this->estado      = $estado;
 $this->tipo        = $tipo;

}


function agregar()
{

try {

$conexion = $this->get_conexion();
$query    = "SELECT * FROM puesto WHERE codigo=:codigo AND estado=:estado AND tipo=:tipo";
$statement= $conexion->prepare($query);
$statement->bindParam(':codigo',$this->codigo); 
$statement->bindParam(':estado',$this->estado);
$statement->bindParam(':tipo',$this->tipo);
$statement->execute();
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
if (count($result)>0) 
{
return "existe";
}
else
{

$query    = "INSERT INTO puesto(codigo,descripcion,estado,tipo)VALUES(:codigo,:descripcion,:estado,:tipo)";
$statement= $conexion->prepare($query);
$statement->bindParam(':codigo',$this->codigo);
$statement->bindParam(':descripcion',$this->descripcion);
$statement->bindParam(':estado',$this->estado);
$statement->bindParam(':tipo',$this->tipo);
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
$query    = "UPDATE  puesto SET 
descripcion=:descripcion,
estado=:estado,
tipo=:tipo
 WHERE id=:id";
$statement= $conexion->prepare($query);
$statement->bindParam(':id',$id);
$statement->bindParam(':descripcion',$this->descripcion);
$statement->bindParam(':estado',$this->estado);
$statement->bindParam(':tipo',$this->tipo);
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
$query    = "SELECT * FROM  puesto";
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
$query    = "SELECT * FROM  puesto WHERE id=:id";
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