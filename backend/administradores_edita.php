<?php
session_start();

// if (!$_SESSION['idU']) {
// 	header("Location: index.php");
// }
// $idU = $_SESSION['idU'];
// $nombre1 = $_SESSION['nombre'];
require "./conexion.php";

$id = $_REQUEST['id'];

$sql =  $pdo->query("SELECT * FROM administradores WHERE id = $id");
$administradores= $sql->fetch(PDO::FETCH_ASSOC);

$nombre = $administradores['nombre'];
$apellidos = $administradores['apellidos'];
$correo = $administradores['correo'];
$rol = $administradores['rol'];

?>

<html>
<style>
    .error{
        display: inline;
        color: #FF0000;
    }
</style>
 <head>
  <title>Formulario request</title>
  <script src="../js/jquery-3.3.1.min.js"></script>

  <script>
       

        function verificacionCampos(){
 
                var name = document.getElementById('nombre').value;
                var correo = document.getElementById('correo').value; 
                var apellidos = document.getElementById('apellidos').value;
                var rol = document.Forma01.rol.value;
            if(name != "" &&  apellidos != ""  &&
            correo != "" && rol != 0 ){
                        Envio();
                    }else{
                        mostrar();
                    }
        
        }

        function mostrar() {
           document.getElementById('mostrar').style.display ="block";
           $('#mostrar').hide(5000);
           
       }
        function Envio(){   

            if (confirm('Enviar datos?')) {
                document.Forma01.method = 'post';
                document.Forma01.action = 'administradores_update.php';
                document.Forma01.submit();
            }
            
        }

  </script>
 </head>

 <body>
	<form  name="Forma01" method="post" enctype="multipart/form-data" >
    <input type="hidden" id="id_sel" name="id_sel" value= "<?php echo $id;?>">
        <?php
            include("menu.php");
		?>
        <br>
        
        Edicion de Administradores <br><hr>
        <br>
        <a href="administradores_lista.php" class="btn btn-secondary" >Regresar</a>
        <br>
        <br>
		<label>
			Nombre:
			<input id="nombre" type="text" name="nombre" class="form-control" placeholder="Escribe tu nombre" value= "<?php echo $nombre;?>">
        </label>
        <label>
			Apellidos:
			<input id="apellidos" type="text" name="apellidos" class="form-control" placeholder="Escribe tus apellidos" value= "<?php echo $apellidos;?>"  >
		</label>
		
		<br>
		<label>Correo:</label>
        <input id="correo" type="email" name="correo" class="form-control" placeholder="Escribe tu correo" value= "<?php echo $correo;?>" onblur="verificaCorreo()">
        <div id="mensaje1" class="error"></div><br>
        <br>
		<label for="pasw">Contraseña:</label>
        <input class="form-control" type="password" name="pass">
        <br>
		<label for="rol">Rol:</label>
		<select name="rol" class="form-control">
			<option value="0" selected>Selecciona</option>
			<option value="1" <?php if ($rol== 1) echo 'selected'; ?>>Gerente</option>
			<option value="2" <?php if ($rol== 2) echo 'selected'; ?>>Ejecutivo</option>			
		</select>
        <br>
        <!-- <input type="file" id= "archivo" name= "archivo"><br> <br> -->
        <input onclick="verificacionCampos(); return false;" type="submit" class="btn btn-success" value="Salvar">
    
    <br>
    <div id= "mostrar" style="background-color: #57429A; display: none;">Faltan Campos por llenar</div>
	</form>
	
 </body>

</html>