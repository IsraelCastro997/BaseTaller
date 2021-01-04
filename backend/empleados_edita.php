<?php
session_start();

// if (!$_SESSION['idU']) {
// 	header("Location: index.php");
// }
// $idU = $_SESSION['idU'];
// $nombre1 = $_SESSION['nombre'];
require "./conexion.php";

$id = $_REQUEST['id'];

$sql =  $pdo->query("SELECT * FROM empleados WHERE id = $id");
$lista= $sql->fetch(PDO::FETCH_ASSOC);

$nombre = $lista['nombre'];
$apellidos = $lista['apellidos'];
$fechaIngreso = $lista['fechaIngreso'];
$fechaSalida = $lista['fechaSalida'];
$sueldo = $lista['sueldo'];
$telefono = $lista['telefono'];
$status = $lista['status'];

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
 
            //     var name = document.getElementById('nombre').value;
            //     var correo = document.getElementById('correo').value; 
            //     var apellidos = document.getElementById('apellidos').value;
            //     var rol = document.Forma01.rol.value;
            // if(name != "" &&  apellidos != ""  &&
            // correo != "" && rol != 0 ){
            //           
            //         }else{
            //             mostrar();
            //         }
            Envio();
        }

        function mostrar() {
           document.getElementById('mostrar').style.display ="block";
           $('#mostrar').hide(5000);
           
       }
        function Envio(){   

            if (confirm('Enviar datos?')) {
                document.Forma01.method = 'post';
                document.Forma01.action = 'empleados_update.php';
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
        
        Edicion de Empleados <br><hr>
        <br>
        <a href="empleados_lista.php" class="btn btn-secondary" >Regresar</a>
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
		<label>FechaIngreso:</label>
        <input id="fechaIngreso" type="text" name="fechaIngreso" class="form-control"  value= "<?php echo $fechaIngreso;?>" >
        <br>
		<label>FechaSalida:</label>
        <input id="fechaSalida" type="text" name="fechaSalida" class="form-control" value= "<?php echo $fechaSalida;?>" >
        <br>
        <label>
			Sueldo:
			<input id="sueldo" type="text" name="sueldo" class="form-control"  value= "<?php echo $sueldo;?>"  >
        </label>
        <br>
        <label>
			Telefono:
			<input id="telefono" type="text" name="telefono" class="form-control"  value= "<?php echo $telefono;?>"  >
        </label>
        <br>
		<label for="status">Status:</label>
		<select name="status" class="form-control">
			<option value="0" selected>Selecciona</option>
			<option value="1" <?php if ($status== 1) echo 'selected'; ?>>Activo</option>
			<option value="2" <?php if ($status== 2) echo 'selected'; ?>>Inactivo</option>			
		</select>
        <br>
        <!-- <input type="file" id= "archivo" name= "archivo"><br> <br> -->
        <input onclick="verificacionCampos(); return false;" type="submit" class="btn btn-success" value="Salvar">
    
    <br>
    <div id= "mostrar" style="background-color: #57429A; display: none;">Faltan Campos por llenar</div>
	</form>
	
 </body>

</html>