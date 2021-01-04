<?php
session_start();

// if (!$_SESSION['idU']) {
// 	header("Location: index.php");
// }
// $idU = $_SESSION['idU'];
// $nombre1 = $_SESSION['nombre'];
require "./conexion.php";

$id = $_REQUEST['id'];

$sql =  $pdo->query("SELECT * FROM herramientas WHERE id = $id");
$lista= $sql->fetch(PDO::FETCH_ASSOC);

$nombre = $lista['nombre'];
$estatus = $lista['estatus'];
$medida = $lista['medida'];
$fechaEntrada = $lista['fechaEntrada'];
$fechaSalida = $lista['fechaSalida'];
$ubicacion = $lista['ubicacion'];

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
                document.Forma01.action = 'herramientas_update.php';
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
        
        Edicion de Herramientas <br><hr>
        <br>
        <a href="herramientas_lista.php" class="btn btn-secondary" >Regresar</a>
        <br>
        <br>
		<label>
			Nombre:
			<input id="nombre" type="text" name="nombre" class="form-control" placeholder="Escribe el nombre" value= "<?php echo $nombre;?>">
        </label>
        <label>
			Estado:
			<input id="estatus" type="text" name="estatus" class="form-control"  value= "<?php echo $estatus;?>"  >
		</label>
		
		<br>
		<label>FechaEntrada:</label>
        <input id="fechaEntrada" type="text" name="fechaEntrada" class="form-control"  value= "<?php echo $fechaEntrada;?>" >
        <br>
		<label>FechaSalida:</label>
        <input id="fechaSalida" type="text" name="fechaSalida" class="form-control" value= "<?php echo $fechaSalida;?>" >
        <br>
        <label>
			Medida:
			<input id="medida" type="text" name="medida" class="form-control"  value= "<?php echo $medida;?>"  >
        </label>
        <br>
        <label>
			Ubicacion:
			<input id="ubicacion" type="text" name="ubicacion" class="form-control"  value= "<?php echo $ubicacion;?>"  >
        </label>
        <br>
		<!-- <label for="status">Status:</label>
		<select name="status" class="form-control">
			<option value="0" selected>Selecciona</option>
			<option value="1" <?php if ($estatus== 1) echo 'selected'; ?>>Activo</option>
			<option value="2" <?php if ($estatus== 2) echo 'selected'; ?>>Inactivo</option>			
		</select>
        <br> -->
        <!-- <input type="file" id= "archivo" name= "archivo"><br> <br> -->
        <input onclick="verificacionCampos(); return false;" type="submit" class="btn btn-success" value="Salvar">
    
    <br>
    <div id= "mostrar" style="background-color: #57429A; display: none;">Faltan Campos por llenar</div>
	</form>
	
 </body>

</html>