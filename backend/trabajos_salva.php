<?php 
require "./conexion.php";

// $file_name = $_FILES['archivo']['name'];
// $file_tmp = $_FILES['archivo']['tmp_name'];
// $cadena = explode(".", $file_name);
// $ext = $cadena[1];
// $dir = "../archivos/";
// $file_enc = md5_file($file_tmp);

$trabajo = $_POST['trabajo'];
$cliente = $_POST['cliente'];
$fechaEntrada = $_POST['date'];
$anotaciones = $_POST['anotaciones'];
$estado  = $_POST['estado'];
// $fechaSalida = "0000-00-00";


// if($file_name != ''){
//         $fileName1 = "$file_enc.$ext";
//         copy($file_tmp, $dir.$fileName1);
        
// }
// $archivo = $fileName1;
// $archivo_n = $file_name;

$sentencia = $pdo->prepare("INSERT INTO `trabajos`
(`id`, `trabajo`, `cliente` ,`fechaEntrada`,`anotaciones`,  `estado`)
VALUES 
(NULL,:trabajo,:cliente,:fechaEntrada,:anotaciones,:estado)");

$sentencia->bindParam(':trabajo',$trabajo);
$sentencia->bindParam(':cliente',$cliente);
$sentencia->bindParam(':fechaEntrada',$fechaEntrada);
// $sentencia->bindParam(':fechaSalida',$fechaSalida);
$sentencia->bindParam(':anotaciones',$anotaciones);
$sentencia->bindParam(':estado',$estado);

if ($sentencia->execute()) {
       return header("location:trabajos_lista.php");
}else {
        return "error";
}

// echo"<script language='javascript'>window.location='administradores_lista.php'</script>;";
?>