<?php
session_start();
// if ($_SESSION['idU']) {
//     header("Location: bienvenido.php");
// }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="../js/jquery-3.3.1.min.js"></script>
    <script>
    
    function verificacionCampos(){
    
    var correo = document.getElementById('user').value; 
    var pass = document.getElementById('pass').value;
        if(correo != "" && pass != "" ){
           validar();
        
        }else{
            mostrar();
        }
    }

    function mostrar() {
        document.getElementById('mostrar').style.display ="block";
        $('#mostrar').hide(5000);
        
    }
    function mostrar2() {
        document.getElementById('mostrar2').style.display ="block";
        $('#mostrar2').hide(5000);
        
    }

    function validar() {
        var user = $('#user').val();
        var pass =$('#pass').val();
        if (user != '' && pass != '') {
            $.ajax({
                url         :   'validaUsuario.php',
                type        :   'post',
                dataType    :   'text',
                data        :   'user='+user+'&pass='+pass,
                success     :   function (res) {
                    console.log(res);
                    console.log(user);
                    if (res != null) {
                        
                        window.location.href = "bienvenido.php";
                    }else{
                        $('#mensaje').html('Datos incorrectos');
                        setTimeout("$('#mensaje').html('');",5000);
                        mostrar2();
                    }
                }, error: function() {
                        alert('Error al conectar al servidor...');
                        
                }
            });
        }

    }
    </script>
    
</head>
<body>
<form name="Forma01" >   
    Login <br><hr>
		<br>
		<label>Usuario:</label>
        <input id="user" type="email" name="user" placeholder="Escribe tu correo">
		<label for="pasw">Contraseña:</label>
        <input type="password" name="pass" id="pass">
        <br>
		
		<br>
    <input onclick="verificacionCampos(); return false;" type="submit" value="Ingresar">
    <input type="hidden" id="id_sel" name="id_sel" value= "0">
    <br>
    <div id= "mostrar" style="background-color: #57429A; display: none;">Faltan Campos por llenar</div>
    <div id= "mostrar2" style="background-color: #57429A; display: none;">Datos Incorrectos</div>
	</form>
</body>
</html>