<?php 

class ConceptoPago extends Conexion{


protected $id_comerciante;
protected $id_concepto;
protected $pago;
protected $fecha;
protected $id_puesto;


function __construct($id_comerciante='',$id_concepto='',$pago='',$fecha='',$id_puesto='')
{

$this->id_comerciante   =  $id_comerciante;
$this->id_concepto   	=  $id_concepto;
$this->pago   		 	=  $pago;
$this->fecha   			=  $fecha;
$this->id_puesto        =  $id_puesto;
 
}


function agregar()
{

try {

$conexion  = $this->get_conexion();
$query     = "INSERT INTO concepto_pago(id_comerciante,id_concepto,pago,fecha,id_puesto)VALUES( 
    :id_comerciante,
    :id_concepto,
    :pago,
    :fecha,
    :id_puesto
    )";
$statement = $conexion->prepare($query);
$statement->bindParam(':id_comerciante',$this->id_comerciante);
$statement->bindParam(':id_concepto',$this->id_concepto);
$statement->bindParam(':pago',$this->pago);
$statement->bindParam(':fecha',$this->fecha);
$statement->bindParam(':id_puesto',$this->id_puesto);
$statement->execute();
return "ok";

	
} catch (Exception $e) {
	
echo "Error: ".$e->getMessage();

}

}


function lista()
{

try {

$conexion  = $this->get_conexion();
$query     = "
SELECT 
p.id,
c.descripcion,
c.costo,
c.porcentaje,
c.tipo,
c.estado,
p.fecha,
p.pago
FROM concepto c
INNER JOIN
(
SELECT id,id_concepto,pago,fecha,fecha_creacion,fecha_update FROM concepto_pago  WHERE
 id_comerciante=:id_comerciante AND
DATE_FORMAT(fecha,'%Y-%m') =:fecha AND 
 id_concepto=:id_concepto 
)p ON c.id=p.id_concepto ORDER BY fecha";
$statement = $conexion->prepare($query);
$statement->bindParam(':id_comerciante',$this->id_comerciante);
$statement->bindParam(':fecha',$this->fecha);
$statement->bindParam(':id_concepto',$this->id_concepto);
$statement->execute();
$result    = $statement->fetchAll(PDO::FETCH_ASSOC);
return $result;
	
} catch (Exception $e) {
	
echo "Error: ".$e->getMessage();

}

}




function lista_mes()
{

try {

$conexion  = $this->get_conexion();
$query     = "
SELECT 
p.id,
c.descripcion,
c.costo,
c.porcentaje,
c.tipo,
c.estado,
p.fecha,
p.pago
FROM concepto c
INNER JOIN
(
SELECT id,id_concepto,pago,fecha,fecha_creacion,fecha_update FROM concepto_pago  WHERE
 id_comerciante=:id_comerciante AND
 DATE_FORMAT(fecha,'%Y-%m') =:fecha AND 
 id_concepto=:id_concepto
)p ON c.id=p.id_concepto";
$statement = $conexion->prepare($query);
$statement->bindParam(':id_comerciante',$this->id_comerciante);
$statement->bindParam(':fecha',$this->fecha);
$statement->bindParam(':id_concepto',$this->id_concepto);
$statement->execute();
$result    = $statement->fetchAll(PDO::FETCH_ASSOC);
return $result;
	
} catch (Exception $e) {
	
echo "Error: ".$e->getMessage();

}

}

function lista_diario()
{

try {

$conexion  = $this->get_conexion();
$query     = "
SELECT 
p.id,
c.descripcion,
c.costo,
c.porcentaje,
c.tipo,
c.estado,
p.fecha,
p.pago
FROM concepto c
INNER JOIN
(
SELECT id,id_concepto,pago,fecha,fecha_creacion,fecha_update FROM concepto_pago  WHERE
 id_comerciante=:id_comerciante AND
 fecha =:fecha AND 
 id_concepto=:id_concepto
)p ON c.id=p.id_concepto";
$statement = $conexion->prepare($query);
$statement->bindParam(':id_comerciante',$this->id_comerciante);
$statement->bindParam(':fecha',$this->fecha);
$statement->bindParam(':id_concepto',$this->id_concepto);
$statement->execute();
$result    = $statement->fetchAll(PDO::FETCH_ASSOC);
return $result;
	
} catch (Exception $e) {
	
echo "Error: ".$e->getMessage();

}

}




function eliminar($id)
{

try {
	
$conexion  = $this->get_conexion();
$query     = "DELETE FROM concepto_pago WHERE
id=:id";
$statement = $conexion->prepare($query);
$statement->bindParam(':id',$id);
$statement->execute();
return "ok";

} catch (Exception $e) {
	
echo "Erro: ".$e->getMessage();

}

}




}


 ?>