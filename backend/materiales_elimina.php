<?php

require "./conexion.php";

$id = $_REQUEST['id'];
$eliminado = 1;

if ($id > 0) {
    $sentencia = $pdo->prepare("UPDATE `materiales` SET eliminado = :eliminado WHERE id = $id");
    $sentencia->bindParam(':eliminado',$eliminado);
    if ($sentencia->execute()) {
        return header("location:materiales_lista.php");
    }else {
         return "error";
    }
}

?>