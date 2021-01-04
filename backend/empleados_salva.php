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
$fechaIngreso = $_POST['date'];
$sueldo = $_POST['sueldo'];
$telefono  = $_POST['telefono'];
$fechaSalida = "0000-00-00";


// if($file_name != ''){
//         $fileName1 = "$file_enc.$ext";
//         copy($file_tmp, $dir.$fileName1);
        
// }
// $archivo = $fileName1;
// $archivo_n = $file_name;

$sentencia = $pdo->prepare("INSERT INTO `empleados`
(`id`, `nombre`, `apellidos`, `fechaIngreso`, `fechaSalida`, `sueldo`, `telefono`,`status`,`eliminado`)
VALUES 
(NULL,:nombre,:apellidos,:fechaIngreso,NOW(),:sueldo,:telefono,'1','0')");

$sentencia->bindParam(':nombre',$nombre);
$sentencia->bindParam(':apellidos',$apellidos);
$sentencia->bindParam(':fechaIngreso',$fechaIngreso);
// $sentencia->bindParam(':fechaSalida',$fechaSalida);
$sentencia->bindParam(':sueldo',$sueldo);
$sentencia->bindParam(':telefono',$telefono);

if ($sentencia->execute()) {
       return header("location:empleados_lista.php");
}else {
        return "error";
}

// echo"<script language='javascript'>window.location='administradores_lista.php'</script>;";
?>