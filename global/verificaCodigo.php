<?php

require "./conexion.php";
$con = conecta();

$id     = $_REQUEST['id'];
$codigo = $_REQUEST['codigo'];
$num    = 0;

if ($codigo) {
    $tx = ($id > 0) ? "AND id != $id" : '';
    $sql = "SELECT * FROM productos WHERE codigo = '$codigo' AND eliminado = 0 $tx";
    $res = mysql_query($sql, $con);
    $num = mysql_num_rows($res);
}
echo $num;
?>