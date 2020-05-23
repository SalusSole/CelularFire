<?php

if ($_GET) {
    $user = $_GET['nombre_usuario'];
    include 'conexion.php';
    // $update="Update user Set estado_cuenta='1' Where fullname='$user'"
    $sql = "UPDATE user SET estado_cuenta='1' WHERE username='$user'";
    $conexion->query($sql);
        print "<script>window.location='../index.php';</script>";
    
}
?>