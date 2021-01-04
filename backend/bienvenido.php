<?php

session_start();

// if (!$_SESSION['idU']) {
// 	header("Location: index.php");
// }
// $idU = $_SESSION['idU'];
// $nombre = $_SESSION['nombre'];


?>


<html>
	<head>
		<title> Sistema de administracion </title>
	</head>
	<body style = "font-family: helvetica">
        <div style = "text-align: center;"> 
		<!-- Hola <?php echo $nombre;?> Bienvenido al sistema de administracion... </div> -->
		<?php
		include("menu.php");
		?>
	</body>
</html>