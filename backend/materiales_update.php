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
$medida = $_REQUEST['medida'];
$precio = $_REQUEST['precio'];
$stock = $_REQUEST['stock'];
$fechaEntrada = $_REQUEST['fechaEntrada'];
$proovedor = $_REQUEST['proovedor'];
$ubicacion = $_REQUEST['ubicacion'];

// $archivo_n = $_REQUEST['archivo'];

// $archivo = $fileName1;
// $archivo_n = $file_name;

$sentencia = $pdo->prepare("UPDATE `materiales` SET
nombre = :nombre,medida = :medida,precio=:precio, stock=:stock,fechaEntrada =:fechaEntrada,proovedor=:proovedor,ubicacion=:ubicacion WHERE id = $id");

$sentencia->bindParam(':nombre',$nombre);
$sentencia->bindParam(':medida',$medida);
$sentencia->bindParam(':precio',$precio);
$sentencia->bindParam(':stock',$stock);
$sentencia->bindParam(':fechaEntrada',$fechaEntrada);
$sentencia->bindParam(':proovedor',$proovedor);
$sentencia->bindParam(':ubicacion',$ubicacion);


if ($sentencia->execute()) {
       return header("location:materiales_lista.php");
}else {
        return "error";
}


?>