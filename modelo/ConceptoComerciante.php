<?php 

class ConceptoComerciante extends Conexion
{

protected $id_comerciante;
protected $id_concepto;
protected $estado;


function __construct($id_comerciante='',$id_concepto='',$estado='')
{

 $this->id_comerciante = $id_comerciante;
 $this->id_concepto    = $id_concepto;
 $this->estado         = $estado;

}


function agregar($id_concepto)
{

try {

$conexion = $this->get_conexion();
$query    = "SELECT * FROM concepto_comerciante WHERE
 id_comerciante=:id_comerciante AND 
 id_concepto=:id_concepto";
$statement  = $conexion->prepare($query);
$statement->bindParam(':id_comerciante',$this->id_comerciante);
$statement->bindParam(':id_concepto',$id_concepto);
$statement->execute();
$result     = $statement->fetchAll(PDO::FETCH_ASSOC);
if (count($result)>0)
{
return "existe";
} 
else 
{

$query    = "INSERT INTO concepto_comerciante(id_comerciante,id_concepto)VALUES(:id_comerciante,:id_concepto)";
$statement  = $conexion->prepare($query);
$statement->bindParam(':id_comerciante',$this->id_comerciante);
$statement->bindParam(':id_concepto',$id_concepto);
$statement->execute();
return "ok";

}

} catch (Exception $e) {
	
echo "Error: ".$e->getMessage();

}

}


function actualizar()
{

try {
	
$conexion = $this->get_conexion();
$query    = "UPDATE concepto_comerciante SET 
estado         =:estado WHERE 
id_comerciante =:id_comerciante AND
id_concepto    =:id_concepto";
$statement     = $conexion->prepare($query);
$statement->bindParam(':id_comerciante',$this->id_comerciante);
$statement->bindParam(':id_concepto',$this->id_concepto);
$statement->bindParam(':estado',$this->estado);
$statement->execute();
return "ok";


} catch (Exception $e) {
	
echo "Error: ".$e->getMessage();

}

}




function fill_conceptos()
{

try {
	
$concepto =  new Concepto();

foreach ($concepto->lista() as $key => $value) {

$this->agregar($value['id']);

}



} catch (Exception $e) {
	
echo "Error: ".$e->getMessage();

}


}


function consulta($id_concepto)
{


try {

$conexion  = $this->get_conexion();
$query     = "SELECT * FROM concepto_comerciante WHERE id_comerciante=:id_comerciante AND id_concepto=:id_concepto";
$statement = $conexion->prepare($query);
$statement->bindParam(':id_comerciante',$this->id_comerciante);
$statement->bindParam(':id_concepto',$id_concepto);
$statement->execute();
$result    = $statement->fetch();
return $result;
	
} catch (Exception $e) {
	
echo "Error: ".$e->getMessage();

}


}


function lista()
{

try {
	
$conexion = $this->get_conexion();	
$query    =  "
SELECT 
c.id,
c.descripcion,
c.costo,
c.porcentaje,
c.tipo,
c.estado
FROM concepto c
INNER JOIN
(
SELECT id_concepto FROM concepto_comerciante WHERE id_comerciante=:id_comerciante AND estado=1
)cc ON c.id=cc.id_concepto
";
$statement= $conexion->prepare($query);
$statement->bindParam(':id_comerciante',$this->id_comerciante);
$statement->execute();
$result   = $statement->fetchAll(PDO::FETCH_ASSOC);
return $result;

} catch (Exception $e) {

echo "Error: ".$e->getMessage();
	
}


}




}





 ?>