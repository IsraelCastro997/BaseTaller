<?php

require "./conexion.php";

$id = $_REQUEST['id'];
$eliminado = 1;

if ($id > 0) {
    $sentencia = $pdo->prepare("UPDATE `empleados` SET eliminado = :eliminado WHERE id = $id");
    $sentencia->bindParam(':eliminado',$eliminado);
    if ($sentencia->execute()) {
        return header("location:empleados_lista.php");
    }else {
         return "error";
    }
}

?>