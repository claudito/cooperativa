<?php 


class ComerciantePuesto extends Conexion
{


protected $id_comerciante;
protected $id_puesto;
protected $fecha_asociacion;
protected $estado;


function __construct($id_comerciante='',$id_puesto='',$fecha_asociacion='',$estado='')
{

$this->id_comerciante   =  $id_comerciante;
$this->id_puesto        =  $id_puesto;
$this->fecha_asociacion =  $fecha_asociacion;
$this->estado   		=  $estado;

}


function agregar()
{

try {


$conexion   = $this->get_conexion();
$query      = "SELECT * FROM comerciante_puesto WHERE id_comerciante=:id_comerciante AND id_puesto=:id_puesto";
$statement  = $conexion->prepare($query);
$statement->bindParam(':id_comerciante',$this->id_comerciante);
$statement->bindParam(':id_puesto',$this->id_puesto);
$statement->execute();
$result     = $statement->fetchAll(PDO::FETCH_ASSOC);
if (count($result)>0)
{
return "existe";
} 
else
{

$query      = "INSERT INTO comerciante_puesto(id_comerciante,id_puesto)
VALUES(:id_comerciante,:id_puesto)";
$statement  = $conexion->prepare($query);
$statement->bindParam(':id_comerciante',$this->id_comerciante);
$statement->bindParam(':id_puesto',$this->id_puesto);
$statement->execute();
return "ok";

}

	
} catch (Exception $e) {
	
echo "Error: ".$e->getMessage();

}


}



function eliminar()
{

try {

$conexion   = $this->get_conexion();
$query      = "DELETE FROM comerciante_puesto WHERE id_comerciante=:id_comerciante";
$statement  = $conexion->prepare($query);
$statement->bindParam(':id_comerciante',$this->id_comerciante);
$statement->execute();
return "ok";

} catch (Exception $e) {

echo "Error: ".$e->getMessage();
	
}


}


function lista()
{

try {

$conexion   = $this->get_conexion();
$query      = "SELECT 
c.id,
c.id_comerciante,
c.id_puesto,
c.fecha_asociacion,
-- c.estado,
c.fecha_creacion,
p.id id_puesto,
p.codigo,
p.descripcion,
p.tipo,
p.estado
FROM comerciante_puesto c
INNER JOIN puesto p ON c.id_puesto=p.id WHERE c.id_comerciante=:id_comerciante";
$statement  = $conexion->prepare($query);
$statement->bindParam(':id_comerciante',$this->id_comerciante);
$statement->execute();
$result     = $statement->fetchAll(PDO::FETCH_ASSOC);
return $result;
	
} catch (Exception $e) {
	
echo "Error: ".$e->getMessage();

}


}


function consulta()
{

try {

$conexion   = $this->get_conexion();
$query      = "SELECT 
c.id,
c.id_comerciante,
c.id_puesto,
c.fecha_asociacion,
p.estado,
c.fecha_creacion,
p.id id_puesto,
p.codigo,
p.descripcion,
p.tipo
FROM comerciante_puesto c
INNER JOIN puesto p ON c.id_puesto=p.id WHERE c.id_comerciante=:id_comerciante";
$statement  = $conexion->prepare($query);
$statement->bindParam(':id_comerciante',$this->id_comerciante);
$statement->execute();
$result     = $statement->fetch();
return $result;
	
} catch (Exception $e) {
	
echo "Error: ".$e->getMessage();

}


}



}



 ?>