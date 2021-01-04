<?php
session_start();
require "conexion.php";
$con = conecta();

$user = $_POST['user'];
$pass = $_POST['pass'];
$pass = md5($pass);

$sentencia = $pdo->prepare("SELECT * FROM administradores
        WHERE correo = '$user' AND pass = '$pass'
        AND status = 1 AND eliminado = 0 ");
$sentencia->execute();
$res = mysqli_query($con,$sentencia);
$array =$sentencia->fetchAll(PDO::FETCH_ASSOC);
echo $res;

if ($array) {
    $idU = mysqli_free_result($res,0,"nombre");
    $nombre = mysqli_free_result($res,0,"nombre").' '.mysqli_free_result($res,0,"apellidos");
    $correo = mysqli_free_result($res,0,"correo");

    $_SESSION['idU'] = $idU;
    $_SESSION['nombre'] = $nombre;
    $_SESSION['correo'] = $correo;

    echo $_SESSION;
}

                   


?>