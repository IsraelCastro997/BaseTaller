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
$apellidos = $_REQUEST['apellidos'];
$fechaIngreso = $_REQUEST['fechaIngreso'];
$fechaSalida = $_REQUEST['fechaSalida'];
$sueldo = $_REQUEST['sueldo'];
$telefono = $_REQUEST['telefono'];
$status = $_REQUEST['status'];

// $archivo_n = $_REQUEST['archivo'];

// $archivo = $fileName1;
// $archivo_n = $file_name;

$sentencia = $pdo->prepare("UPDATE `empleados` SET
nombre = :nombre,apellidos = :apellidos, fechaIngreso =:fechaIngreso,fechaSalida=:fechaSalida,sueldo=:sueldo,telefono=:telefono,status=:estado WHERE id = $id");

$sentencia->bindParam(':nombre',$nombre);
$sentencia->bindParam(':apellidos',$apellidos);
$sentencia->bindParam(':fechaIngreso',$fechaIngreso);
$sentencia->bindParam(':fechaSalida',$fechaSalida);
$sentencia->bindParam(':sueldo',$sueldo);
$sentencia->bindParam(':telefono',$telefono);
$sentencia->bindParam(':estado',$status);


if ($sentencia->execute()) {
       return header("location:empleados_lista.php");
}else {
        return "error";
}


?>