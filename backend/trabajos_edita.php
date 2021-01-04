<?php
session_start();

// if (!$_SESSION['idU']) {
// 	header("Location: index.php");
// }
// $idU = $_SESSION['idU'];
// $nombre1 = $_SESSION['nombre'];
require "./conexion.php";

$id = $_REQUEST['id'];

$sql =  $pdo->query("SELECT * FROM trabajos WHERE id = $id");
$lista= $sql->fetch(PDO::FETCH_ASSOC);

$trabajo = $lista['trabajo'];
$cliente = $lista['cliente'];
$fechaEntrada = $lista['fechaEntrada'];
$anotaciones = $lista['anotaciones'];
$estado = $lista['estado'];

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
                document.Forma01.action = 'trabajos_update.php';
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
        
        Edicion de trabajos <br><hr>
        <br>
        <a href="materiales_lista.php" class="btn btn-secondary" >Regresar</a>
        <br>
        <br>
		<label>
			Trabajo:
			<input id="trabajo" type="text" name="trabajo" class="form-control" placeholder="Escribe el trabajo" value= "<?php echo $trabajo;?>">
        </label>
        <label>
			Cliente:
			<input id="cliente" type="text" name="cliente" class="form-control"  value= "<?php echo $cliente;?>"  >
        </label>
        <br>
		<label>FechaEntrada:</label>
        <input id="fechaEntrada" type="text" name="fechaEntrada" class="form-control"  value= "<?php echo $fechaEntrada;?>" >
        <br>
        <label>
			Anotaciones:
			<input id="anotaciones" type="text" name="anotaciones" class="form-control"  value= "<?php echo $anotaciones;?>"  >
        </label>
        <br>
        <label>
			Estado:
			<input id="estado" type="text" name="estado" class="form-control"  value= "<?php echo $estado;?>"  >
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
        <input onclick=verificacionCampos(); return ="false"; type="submit" class="btn btn-success" value="Salvar">
    
    <br>
    <div id= "mostrar" style="background-color: #57429A; display: none;">Faltan Campos por llenar</div>
	</form>
	
 </body>

</html>