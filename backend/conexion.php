<?php
define ("HOST", "localhost");
define("BD", "test");
define("USER_BD","root");
define("PASS_BD","");

define("SERVIDOR", "localhost");
define("USUARIO", "root");
define("PASSWORD", "");





    $servidor = "mysql:dbname=".BD.";host=".SERVIDOR;
    try {
        $pdo= new PDO($servidor,USUARIO, PASSWORD,
        array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8")
        );
       
    } catch (\Throwable $th) {
        echo "<script>alert('Error...')</script>";
    }

    function conecta(){
        if (!($con = mysqli_connect(HOST,USER_BD, PASS_BD))) {
            echo "Error conectando al servidor de BBDD";
            exit();
        }
    
        if (!mysqli_select_db(BD, $con)) {
            echo "Error Seleccionando BD";
            exit();
        }
        return $con;
    }


?>

