<?php 
require "./conexion.php";

// $file_name = $_FILES['archivo']['name'];
// $file_tmp = $_FILES['archivo']['tmp_name'];
// $cadena = explode(".", $file_name);
// $ext = $cadena[1];
// $dir = "../archivos/";
// $file_enc = md5_file($file_tmp);
$id = $_REQUEST['id_sel'];
$nombre = $_REQUEST['nombre'];
$estatus = $_REQUEST['estatus'];
$fechaEntrada = $_REQUEST['fechaEntrada'];
$fechaSalida = $_REQUEST['fechaSalida'];
$medida = $_REQUEST['medida'];
$ubicacion = $_REQUEST['ubicacion'];

// $archivo_n = $_REQUEST['archivo'];

// $archivo = $fileName1;
// $archivo_n = $file_name;

$sentencia = $pdo->prepare("UPDATE `herramientas` SET
nombre = :nombre,estatus = :estatus,medida=:medida, fechaEntrada =:fechaEntrada,fechaSalida=:fechaSalida,ubicacion=:ubicacion WHERE id = $id");

$sentencia->bindParam(':nombre',$nombre);
$sentencia->bindParam(':estatus',$estatus);
$sentencia->bindParam(':fechaEntrada',$fechaEntrada);
$sentencia->bindParam(':fechaSalida',$fechaSalida);
$sentencia->bindParam(':ubicacion',$ubicacion);
$sentencia->bindParam(':medida',$medida);

if ($sentencia->execute()) {
       return header("location:herramientas_lista.php");
}else {
        return "error";
}


?>