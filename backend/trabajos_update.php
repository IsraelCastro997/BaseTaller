<?php 
require "./conexion.php";

// $file_name = $_FILES['archivo']['name'];
// $file_tmp = $_FILES['archivo']['tmp_name'];
// $cadena = explode(".", $file_name);
// $ext = $cadena[1];
// $dir = "../archivos/";
// $file_enc = md5_file($file_tmp);
$id = $_REQUEST['id_sel'];
$trabajo = $_REQUEST['trabajo'];
$cliente = $_REQUEST['cliente'];
$fechaEntrada = $_REQUEST['fechaEntrada'];
$anotaciones = $_REQUEST['anotaciones'];
$estado = $_REQUEST['estado'];

// $archivo_n = $_REQUEST['archivo'];

// $archivo = $fileName1;
// $archivo_n = $file_name;

$sentencia = $pdo->prepare("UPDATE `trabajos` SET
trabajo = :trabajo,cliente = :cliente,fechaEntrada =:fechaEntrada,anotaciones=:anotaciones,estado=:estado WHERE id = $id");

$sentencia->bindParam(':trabajo',$trabajo);
$sentencia->bindParam(':cliente',$cliente);
$sentencia->bindParam(':fechaEntrada',$fechaEntrada);
$sentencia->bindParam(':anotaciones',$anotaciones);
$sentencia->bindParam(':estado',$estado);


if ($sentencia->execute()) {
       return header("location:materiales_lista.php");
}else {
        return "error";
}


?>