<?php
include 'conexion.php';

if($_FILES){

    $nombre = $_FILES['foto']['name'];
    $guardado = $_FILES['foto']['tmp_name'];
    $name = 'img/home/'.$nombre;

    if(file_exists('../img/home')){
        if(move_uploaded_file($guardado, '../img/home/'.$nombre)){
            
            $sql = "INSERT INTO promociones (ruta, activo) values ('$name', '1')";
            mysqli_query($conexion, $sql);

            echo '<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=../promo.php">';

        }else{
            echo "nothing";
        }
    }else{
        echo "babas";
    }
}else{
    echo "nope";
}

?>