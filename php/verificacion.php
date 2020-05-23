<?php

if($_GET){
    $user = $_GET['nombre_usuario'];
    include 'conexion.php';
    $sql = "UPDATE `user` SET `estado_cuenta` = '1' WHERE `user`.`fullname` = $user"; 
}

?>