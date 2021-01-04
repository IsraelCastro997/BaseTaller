<?php

require "./conexion.php";

$id = $_REQUEST['id'];
$eliminado = 1;

if ($id > 0) {
    $sentencia = $pdo->query("DELETE FROM `trabajos`  WHERE id = $id");
    return header("location:trabajos_lista.php");
    
}

?>