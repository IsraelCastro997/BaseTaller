<?php 
require "./conexion.php";

// $file_name = $_FILES['archivo']['name'];
// $file_tmp = $_FILES['archivo']['tmp_name'];
// $cadena = explode(".", $file_name);
// $ext = $cadena[1];
// $dir = "../archivos/";
// $file_enc = md5_file($file_tmp);

$nombre = $_POST['nombre'];
$medida = $_POST['medida'];
$precio = $_POST['precio'];
$stock = $_POST['stock'];
$fechaEntrada = $_POST['date'];
$proovedor = $_POST['proovedor'];
$ubicacion  = $_POST['ubicacion'];
// $fechaSalida = "0000-00-00";


// if($file_name != ''){
//         $fileName1 = "$file_enc.$ext";
//         copy($file_tmp, $dir.$fileName1);
        
// }
// $archivo = $fileName1;
// $archivo_n = $file_name;

$sentencia = $pdo->prepare("INSERT INTO `materiales`
(`id`, `nombre`, `medida` , `precio`, `stock`,`fechaEntrada`,`proovedor`,  `ubicacion`,`eliminado`)
VALUES 
(NULL,:nombre,:medida,:precio,:stock,:fechaEntrada,:proovedor,:ubicacion,'0')");

$sentencia->bindParam(':nombre',$nombre);
$sentencia->bindParam(':medida',$medida);
$sentencia->bindParam(':precio',$precio);
$sentencia->bindParam(':stock',$stock);
$sentencia->bindParam(':fechaEntrada',$fechaEntrada);
// $sentencia->bindParam(':fechaSalida',$fechaSalida);
$sentencia->bindParam(':proovedor',$proovedor);
$sentencia->bindParam(':ubicacion',$ubicacion);

if ($sentencia->execute()) {
       return header("location:materiales_lista.php");
}else {
        return "error";
}

// echo"<script language='javascript'>window.location='administradores_lista.php'</script>;";
?>