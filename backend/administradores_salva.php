<?php 
require "./conexion.php";


// $file_name = $_FILES['archivo']['name'];
// $file_tmp = $_FILES['archivo']['tmp_name'];
// $cadena = explode(".", $file_name);
// $ext = $cadena[1];
// $dir = "../archivos/";
// $file_enc = md5_file($file_tmp);

$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$correo = $_POST['correo'];
$pass = $_POST['pass'];
$rol  = $_POST['rol'];

if ($pass != '') {
        $pass = md5($pass);
        $tx =", pass = '$pass'";
}

// if($file_name != ''){
//         $fileName1 = "$file_enc.$ext";
//         copy($file_tmp, $dir.$fileName1);
        
// }
// $archivo = $fileName1;
// $archivo_n = $file_name;

$sentencia = $pdo->prepare("INSERT INTO `administradores`
(`id`, `nombre`, `apellidos`, `correo`, `pass`, `rol`, `archivo_n`, `archivo`,`status`,`eliminado`)
VALUES 
(NULL,:nombre,:apellidos,:correo,:pass,:rol,:archivo_n,:archivo,'1','0')");

$sentencia->bindParam(':nombre',$nombre);
$sentencia->bindParam(':apellidos',$apellidos);
$sentencia->bindParam(':correo',$correo);
$sentencia->bindParam(':pass',$pass);
$sentencia->bindParam(':rol',$rol);
$sentencia->bindParam(':archivo_n',$archivo_n);
$sentencia->bindParam(':archivo',$archivo_n);


if ($sentencia->execute()) {
       return header("location:administradores_lista.php");
}else {
        return "error";
}






// echo"<script language='javascript'>window.location='administradores_lista.php'</script>;";
?>