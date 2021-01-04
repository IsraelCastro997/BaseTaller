<?php 
require "./backend/conexion.php";
include 'carrito.php';
include 'templates/cabecera.php';
?>

 <form id="contactform" action="correoEnvia.php" name="contactform" method="POST">
    <fieldset>
        <br>
        <br>
        <div>
            <input type="text" name="nombre" id="first_name" placeholder="Nombre">
        </div>
        <div>
            <input type="text" name="apellido" id="last_name" placeholder="Apellido Paterno">
        </div>
        <div>
            <input type="email" name="email" id="email" placeholder="Email">
        </div>
        <div>
            <input type="text" name="numero" id="phone" placeholder="Teléfono">
        </div>
        <div>
            <textarea class="form-control" name="mensaje" id="comments" rows="6"></textarea>
        </div>
        <input type="submit" name="enviar" value="Enviar">
    </fieldset>
</form>



<?php
    include 'templates/pie.php';
    ?>