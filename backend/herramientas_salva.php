<?php 
require "./conexion.php";


// $file_name = $_FILES['archivo']['name'];
// $file_tmp = $_FILES['archivo']['tmp_name'];
// $cadena = explode(".", $file_name);
// $ext = $cadena[1];
// $dir = "../archivos/";
// $file_enc = md5_file($file_tmp);

$nombre = $_POST['nombre'];
$estatus = $_POST['estatus'];
$fechaEntrada = $_POST['date'];
$medida = $_POST['medida'];
$ubicacion  = $_POST['ubicacion'];
$fechaSalida = "0000-00-00";


// if($file_name != ''){
//         $fileName1 = "$file_enc.$ext";
//         copy($file_tmp, $dir.$fileName1);
        
// }
// $archivo = $fileName1;
// $archivo_n = $file_name;

$sentencia = $pdo->prepare("INSERT INTO `herramientas`
(`id`, `nombre`, `estatus` , `medida`, `fechaEntrada`, `fechaSalida`, `ubicacion`,`eliminado`)
VALUES 
(NULL,:nombre,:estatus,:medida,:fechaEntrada,NOW(),:ubicacion,'0')");

$sentencia->bindParam(':nombre',$nombre);
$sentencia->bindParam(':estatus',$estatus);
$sentencia->bindParam(':fechaEntrada',$fechaEntrada);
// $sentencia->bindParam(':fechaSalida',$fechaSalida);
$sentencia->bindParam(':medida',$medida);
$sentencia->bindParam(':ubicacion',$ubicacion);

if ($sentencia->execute()) {
       return header("location:herramientas_lista.php");
}else {
        return "error";
}

// echo"<script language='javascript'>window.location='administradores_lista.php'</script>;";
?>