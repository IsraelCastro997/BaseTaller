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
    #content2{
        position: absolute;
		min-height: 50%;
		width: 80%;
		top: 15%;
		left: 79%;
    }
    #content3{
        position: absolute;
		min-height: 50%;
		width: 80%;
		top: 15%;
		left: 90%;
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

<!-- Scripts Registro  -->
<script>

          function verificacionCampos(){
  
            //       var name = document.getElementById('nombre').value;
            //       var correo = document.getElementById('correo').value; 
            //       var apellidos = document.getElementById('apellidos').value;
            //       var rol = document.Forma01.rol.value;
            //       var archivo = document.getElementById('archivo').value;
                  
            //   if(name != " " &  apellidos != ""  &&
            //   correo != "" && rol != 0 && archivo != null ){
            //               
            //           }else{
            //               mostrar();
            //           }
                  
            Envio();
          }

          	
   
          function mostrar() {
          document.getElementById('mostrar').style.display ="block";
          $('#mostrar').hide(5000);
          
          }

		  function obtenerFecha(e)
			{
			var variableJs = moment(e.value);
			console.log("Fecha original:" + e.value);
			console.log("Fecha formateada es: " + variableJs.format("DD/MM/YYYY"));
			
			}

          function Envio(){   
			document.getElementById("date").value=variableJs;
              if (confirm('Enviar datos?')) {
                  document.Forma01.method = 'post';
                  document.Forma01.action = 'trabajos_salva.php';
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

function Envia(){   

            if (confirm('Enviar datos?')) {
                document.Forma01.method = 'post';
                document.Forma01.action = 'trabajos_salva.php';
                document.Forma01.submit();
            }
            
        }

        function Borrar(){   

            if (confirm('Enviar datos?')) {
                document.borrar.method = 'post';
                document.borrar.action = 'trabajos_elimina.php';
                document.borrar.submit();
            }

        }


	function agregar(){

		<?php
        $estado=1;

        if ($_POST){
        //Incrementamos el valor
        $estado = 2;
        // $estado = $_POST["conta"] + 1;
        }
        else if($_GET){
        //Valor inicial
        $estado = 1;
        }   


             $sentencia = $pdo->prepare("SELECT * FROM trabajos WHERE estado = $estado ");

             $sentencia->execute();
             $lista=$sentencia->fetchAll(PDO::FETCH_ASSOC);

             	foreach ($lista as $mostrar) { 
                    $id = $mostrar['id'];
                    $numero = 1;
                    ?>
						cont++;
						var fila='<tr class="selected" id="fila'+cont+
						'" onclick="seleccionar(this.id);"><td class = "ocultar">'+cont+
						'</td><td><?php echo $mostrar['id']?></td><td><?php echo $mostrar['trabajo']?></td><td><?php echo $mostrar['cliente']?></td>><td><?php echo $mostrar['fechaEntrada'] ;?></td><td><?php
            echo $mostrar['anotaciones'] ;?></td><td><?php echo ($mostrar['estado'] == 1) ? 'Pendiente' : 'En Proceso';?></td><td><?php
						echo "<form name=\"borrar\"  method=\"post\" action=\"trabajos_elimina.php?id=".$mostrar['id']."\"><input onclick=Borrar(); return=\" false;\" type=\"submit\" class=\"btn btn-danger\" value=\"Eliminar\"></form>";?></td><td><?php 
						echo "<a href=\"trabajos_edita.php?id=".$mostrar['id']."\" class=\"btn btn-success\"> Editar</a>";?></td><td><?php 
						echo "<a href=\"trabajos_detalles.php?id=".$mostrar['id']."\" class=\"btn btn-secondary\">  detalles</a>";?></td></tr>';
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

<form  name="Forma01" method="POST" enctype="multipart/form-data" action="trabajos_salva.php">
		<?php
			include("menu.php");
		?>
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#insertar">
			Registrar
        </button>
        
	<div id="content">Lista De trabajos
		<br>

		<table id="tabla" class="table table-dark table-striped">

		<thead>
			<tr>
				<td>id</td>
                <td>trabajo</td>
                <td>Cliente</td>
				<td>Fecha de Entrada</td>
                <td>Anotaciones</td>
                <td>Estado</td>
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
        <h5 class="modal-title" id="exampleModalLabel">Registrar Trabajo</h5>

        

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <div class="form-group">
          <label>
          Trabajo:
          <input id="trabajo" type="text" name="trabajo" placeholder="Escribe el nombre" required class="form-control">
          </label>
        </div>
     
        <div class="form-group">
          <label>
         Cliente:
          <input id="cliente" type="text" name="cliente" placeholder="Escribe la medida" required class="form-control">
          </label>
        </div>
        <div class="form-grou">
          <label>Fecha de Entrada:</label>
          <script src="https://momentjs.com/downloads/moment.js"></script>

            <input type="date" name="date" id="date" class="form-control" onchange="obtenerFecha(this)"  />  
        </div>
		
        <div class="form-group">
          <label >Anotaciones:</label>
          <input type="text" name="anotaciones" id = "anotaciones" class="form-control">
        </div>
    
        <div class="form-group">
            <label for="estado">Estado:</label>
            <select name="estado" id= "estado"class="form-control">
              <option value="0" selected>Selecciona</option>
              <option value="1">Pendiente</option>
              <option value="2">En Proceso</option>			
            </select>
         </div>
        <!-- <div class="form-group">
            <input type="file" id= "archivo" name= "archivo"><br> <br>
          </div> -->
       
        <br>
    
    <input type="hidden" id="id_sel" name="id_sel" value= "0">
    <div id= "mostrar" style="background-color: #57429A; display: none;">Faltan Campos por llenar</div>
      </div>
      </form>
      <div class="modal-footer">
        <button type="submit" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <input onclick="Envio(); return false;" type="submit" value="Salvar" name="submit" class="btn btn-primary">
      </div>
    </div>
  </div>
</div>
<div id="content2">
<form name="f1" action="<?=$_SERVER["PHP_SELF"]?>" method="post">
    <input type="hidden" name="conta" value="">
    <input class="btn btn-success" type="submit" value="Trabajos en proceso">
</form>
</div>
<div id="content3">
<form name="f1" action="<?=$_SERVER["PHP_SELF"]?>" method="get">
    <input type="hidden" name="conta" value="">
    <input name="conta" class="btn btn-danger" type="submit" value="Trabajos pendientes">
</form>
</div>


</body>
</html>
