<?php
$servidor ="mysql:dbname=".DB.";host=".SERVIDOR.";port=".PUERTO;

try {
    $pdo = new PDO($servidor,USUARIO,PASSWORD,
                array(PDO::MYSQL_ATTR_INIT_COMMAND =>"SET NAMES utf8")
                );
                //echo "<script>alert('conectado...')</script>";
                

        
}catch(PDOException $e) {
        //echo "<script>alert('Error..')</script>";
}
?>
