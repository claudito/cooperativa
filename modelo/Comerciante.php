<?php 

class Comerciante extends Conexion
{


function lista()
{

try {
	
$conexion   =  $this->get_conexion();
$query      =  "
SELECT 
c.id,
c.nombres,
c.apellidos,
c.dni,
c.ruc,
c.razon_social,
c.direccion,
c.telefono,
c.celular,
c.correo,
c.fecha_ingreso,
c.fecha_salida,
c.tipo,
a.descripcion area
FROM comerciante c INNER JOIN area a ON c.id_area=a.id";
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
c.id,
c.nombres,
c.apellidos,
c.dni,
c.ruc,
c.razon_social,
c.direccion,
c.telefono,
c.celular,
c.correo,
c.fecha_ingreso,
c.fecha_salida,
c.tipo,
a.descripcion area
FROM comerciante c INNER JOIN area a ON c.id_area=a.id  
WHERE c.id=:id
";
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