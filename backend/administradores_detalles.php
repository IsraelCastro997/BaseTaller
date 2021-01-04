<?php 

session_start();

// if (!$_SESSION['idU']) {
// 	header("Location: index.php");
// }
// $idU = $_SESSION['idU'];
// $nombre = $_SESSION['nombre'];

require "./conexion.php";

$id = $_REQUEST['id'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

        <?php
		include("menu.php");
		?>
    <br>
    <br>
    <a href="menuAdministrador.php">Regresar</a>
    <br>
    <br>
    <table border="1">
        <tr>
            <td>id</td>
            <td>nombre</td>
            <td>email</td>
            <td>rol</td>
            <td>status</td>
            <td>Avatar</td>
           
            
        </tr>

        <?php
             $sentencia = $pdo->prepare("SELECT * FROM administradores");
             $sentencia->execute();
             $listaAdministradores=$sentencia->fetchAll(PDO::FETCH_ASSOC);
            
            
           
             foreach ($listaAdministradores as $mostrar) { 

                    ?>
                        
                    <tr>
                        <td><?php echo $mostrar['id']?></td>
                        <td><?php echo $mostrar['nombre'].$mostrar['apellidos']?></td>
                        <td><?php echo $mostrar['correo']?></td>
                        <td><?php echo ($mostrar['rol'] == 1) ? 'Admin' : 'Empleado';?></td>
                        <td><?php echo ($mostrar['status'] == 1) ? 'Activo' : 'Incativo';?></td>
                        <td><img src="../archivos/<?php echo $mostrar['archivo']?>" width = "360px" height = "220px"> </td>
                    </tr>
                <?php
                }
        
                ?>
        
    </table>
</body>
</html>

