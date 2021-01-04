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
$correo = $_REQUEST['correo'];
$pass = $_REQUEST['pass'];
$rol  = $_REQUEST['rol'];
// $archivo_n = $_REQUEST['archivo'];

$tx = '';

if ($pass != '') {
    $pass = md5($pass);
    $tx =", pass = '$pass'";
}
// $archivo = $fileName1;
// $archivo_n = $file_name;

$sentencia = $pdo->prepare("UPDATE `administradores` SET
nombre = :nombre,apellidos = :apellidos, correo =:correo,pass=:pass,rol=:rol,archivo_n=:archivo_n,archivo=:archivo WHERE id = $id");

$sentencia->bindParam(':nombre',$nombre);
$sentencia->bindParam(':apellidos',$apellidos);
$sentencia->bindParam(':correo',$correo);
$sentencia->bindParam(':pass',$pass);
$sentencia->bindParam(':rol',$rol);
$sentencia->bindParam(':archivo_n',$archivo_n);
$sentencia->bindParam(':archivo',$archivo);


if ($sentencia->execute()) {
       return header("location:administradores_lista.php");
}else {
        return "error";
}


?>