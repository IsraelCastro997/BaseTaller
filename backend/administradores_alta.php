<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

    <script>
        

          function verificacionCampos(){
  
                  var name = document.getElementById('nombre').value;
                  var correo = document.getElementById('correo').value; 
                  var apellidos = document.getElementById('apellidos').value;
                  var rol = document.Forma01.rol.value;
                  var archivo = document.getElementById('archivo').value;
                  
              if(name != " " &  apellidos != ""  &&
              correo != "" && rol != 0 && archivo != null ){
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
</head>
<body>
  <form  name="Forma01" method="POST" enctype="multipart/form-data" action="administradores_salva.php">
<?php
		include("menu.php");
?>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#insertar">
 Registrar
</button>

<!-- Modal -->
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
          Nombre:
          <input id="apellidos" type="text" name="apellidos" placeholder="Escribe tu nombre" required class="form-control">
          </label>
        </div>
        <div class="form-grou">
          <label>Correo:</label>
          <input id="correo" type="email" name="correo" value="@udg.mx" placeholder="Escribe tu correo" onblur="verificaCorreo()" class="form-control">
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
              <option value="2">Empleadoo</option>			
            </select>
        <!-- </div>
          <div class="form-group">
            <input type="file" id= "archivo" name= "archivo"><br> <br>
          </div> -->
       
        <br>
    
    <input type="hidden" id="id_sel" name="id_sel" value= "0">
    <div id= "mostrar" style="background-color: #57429A; display: none;">Faltan Campos por llenar</div>
      </div>
      </form>
      <div class="modal-footer">
        <button type="submit" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <input onclick="verificacionCampos(); return false;" type="submit" value="Salvar" name="submit" class="btn btn-primary">
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>
  
</body>
</html>
<?php
include("administradores_lista.php");
?>