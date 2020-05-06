<?php

if($_GET){
    $ec=$_GET['estado_cuenta'];
    print "<script>window.location='../login.php?estado_cuenta=$ec';</script>";
}else{
    session_start();
    session_destroy();
    print "<script>window.location='../login.php';</script>";
}

?>