<?php
session_start();    
include "conexion.php";

/*$found=false;
$sql1= "select * from comra";
$query = $conexion->query($sql1);
while ($r=$query->fetch_array()) {
    $found=true;
    break;
}
if($found){*/
    $sql = "INSERT INTO compra (id_usuario, fecha, total, status) VALUES ('$_SESSION[user_id]',NOW(),'$_GET[precio]','pendiente')";
    
    if (mysqli_query($conexion, $sql)) {
        $last_id = mysqli_insert_id($conexion);
        echo $last_id;
    }

    $sql = "INSERT INTO venta (id_compra, id_producto, precio_unitario, cantidad, descargado, color, calidad, categoria, precio_total) VALUES ('1','1','200','2','0','blanco','','display','200' )";

    if (mysqli_query($conexion, $sql)) {
    } else {
          echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
    }
    /*
    if($query!=null){
        if ($_GET){*/
            echo $_GET["precio"];
        /*}
            //print "<script>alert(\"Proceda con el pago\");window.location='../pagar.php?precio=$_POST[precio]';</script>";
    }
}else{
    echo "nope";
}*/
mysqli_close($conexion);


?>