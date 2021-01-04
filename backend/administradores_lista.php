<?php 
session_start();

// if (!$_SESSION['idU']) {
// 	header("Location: index.php");
// }
require "./conexion.php";
// $idU = $_SESSION['idU'];
// $nombre = $_SESSION['nombre'];
?>

<!Doctype html>
<html lang="es">
<head>
<meta charset="utf-8">
	<title></title>
	<script src="../js/jquery-3.3.1.min.js"></script>
	
<style>
	#content{
		position: absolute;
		min-height: 50%;
		width: 80%;
		top: 20%;
		left: 5%;
	}
	.selected{
		cursor: pointer;
	}
	.selected:hover{
		background-color: #0585C0;
		color: white;
	}
	.seleccionada{
		background-color: #0585C0;
		color: white;
	}
	.ocultar{
		display: none;
	}
</style>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> -->

<!-- Scripts Registro  -->
<script>

          function verificacionCampos(){
  
                  var name = document.getElementById('nombre').value;
                  var correo = document.getElementById('correo').value; 
                  var apellidos = document.getElementById('apellidos').value;
                 var rol = document.Forma01.rol.value;
                //   var archivo = document.getElementById('archivo').value;
                  
              if(name != " " &&  apellidos != ""  &&
              correo != "" && rol != "" ){
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
                  document.Forma01.action = 'administradores_salva.php';
                  document.Forma01.submit();
              }
              
          }

	</script>
	
<!-- Scripts Lista  -->
<script>
	$(document).ready(function(){

		agregar();
		

	});
	var cont=0;
	var id_fila_selected=[];


	function agregar(){

		<?php
             $sentencia = $pdo->prepare("SELECT * FROM administradores  WHERE status = 1 AND eliminado = 0");
             $sentencia->execute();
             $listaAdministradores=$sentencia->fetchAll(PDO::FETCH_ASSOC);
            
            
           
             	foreach ($listaAdministradores as $mostrar) { 
                    $id = $mostrar['id'];
                    $numero = 1;
                    ?>
						cont++;
						var fila='<tr class="selected" id="fila'+cont+
						'" onclick="seleccionar(this.id);"><td class = "ocultar">'+cont+
						'</td><td><?php echo $mostrar['id']?></td><td><?php echo $mostrar['nombre']?></td><td><?php echo $mostrar['apellidos']?></td><td><?php 
						echo $mostrar['correo']?></td><td><?php echo ($mostrar['rol'] == 1) ? 'Admin' : 'Empleado';?></td><td><?php
						echo "<a href=\"administradores_elimina.php?id=".$mostrar['id']."\" class=\"btn btn-danger\"> Eliminar</a>";?></td><td><?php 
						echo "<a href=\"administradores_edita.php?id=".$mostrar['id']."\" class=\"btn btn-success\"> Editar</a>";?></td><td><?php 
						echo "<a href=\"administradores_detalles.php?id=".$mostrar['id']."\" class=\"btn btn-secondary\">  detalles</a>";?></td></tr>';
						$('#tabla').append(fila);
						reordenar();
                <?php
                $numero++;
                }
        
                ?>


	}

	function seleccionar(id_fila){
		if($('#'+id_fila).hasClass('seleccionada')){
			$('#'+id_fila).removeClass('seleccionada');
		}
		else{
			$('#'+id_fila).addClass('seleccionada');
		}
		//2702id_fila_selected=id_fila;
		id_fila_selected.push(id_fila);
	}



	function reordenar(){
		var num=1;
		$('#tabla tbody tr').each(function(){
			$(this).find('td').eq(0).text(num);
			num++;
		});
	}
	

	$(document).ready(function() {
		function clickbutton() {
			// simulamos el click del mouse en el boton del formulario
			$("#bt_del").click();
			alert("Aqui llega"); //Debugger
		}
		$('#bt_del').on('click',function() {
			
		});
	});
	

	

</script>
</head>
<body>
<form  name="Forma01" method="POST" enctype="multipart/form-data" action="administradores_salva.php">
		<?php
			include("menu.php");
		?>
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#insertar">
			Registrar
		</button>
	<div id="content">Lista De Administradores
		<button id="bt_delall" class="ocultar">Eliminar todo</button>
		<button id="bt_del" class="ocultar">Eliminar</button>
		<br>
		<br>

		<table id="tabla" class="table table-dark table-striped">

		<thead>
			<tr>
				<td>id</td>
				<td>nombre</td>
				<td>apellidos</td>
				<td>email</td>
				<td>rol</td>
				<td>Borrar</td>
				<td>Editar</td>
				<td>Ver detalles</td>
			</tr>


		</thead>
	</table>
	</div>

	
<!-- Modal Registrar-->
<div class="modal fade" id="insertar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Crear Administrador</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>
          Nombre:
          <input id="nombre" type="text" name="nombre" placeholder="Escribe tu nombre" required class="form-control">
          </label>
        </div>
     
        <div class="form-group">
          <label>
          Apellidos:
          <input id="apellidos" type="text" name="apellidos" placeholder="Escribe tu nombre" required class="form-control">
          </label>
        </div>
        <div class="form-grou">
          <label>Correo:</label>
          <input id="correo" type="email" name="correo" value="@udg.mx" placeholder="Escribe tu correo"  class="form-control">
        </div>
		
        <div class="form-group">
          <label for="pasw">Contraseña:</label>
          <input type="password" name="pass" id = "pass" class="form-control">
        </div>
    
        <div class="form-group">
            <label for="rol">Rol:</label>
            <select name="rol" class="form-control">
              <option value="0" selected>Selecciona</option>
              <option value="1">Admin</option>
              <option value="2">Empleado</option>			
            </select>
         </div>
          <!-- <div class="form-group">
            <input type="file" id= "archivo" name= "archivo"><br> <br>
          </div>  -->
       
        <br>
    
    <input type="hidden" id="id_sel" name="id_sel" value= "0">
    <div id= "mostrar" style="background-color: #57429A; display: none;">Faltan Campos por llenar</div>
      </div>
      </form>
      <div class="modal-footer">
        <button type="submit" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <input onclick="verificacionCampos(); return false;" type="submit" value="Salvar" name="submit" class="btn btn-primary">
      </div>
    </div>
  </div>
</div>

</body>
</html>
