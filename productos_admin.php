<?php
    session_start();

    include 'php/conexion.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar los productos</title>
    <?php
        include 'templates/meta_link.html';
    ?>
</head>
<body>
<?php
    include 'templates/nav_admin.php';
?>
<br>
    <div>
        <h5 class="text-center titulos">EDITAR PRODUCTOS</h5>
    </div>
<br>
<div class="container">
<div class="row">
            
<?php
    $sql= "SELECT * FROM productos";
    $result=mysqli_query($conexion,$sql);

    while($mostrar=mysqli_fetch_array($result)){
    
        $id=$mostrar['id_producto'];
        $num_foto=$mostrar['numero_foto_uno'];
            
        echo '<div class="col-xs-6 col-sm-6 col-md-6 col-lg-4 bottom">
                        <div class="cont-img">
                            <div class="contenedores imagenes">';
                                echo "<a class='hyper' href='editar_productos.php?id=$id'><img class='img-fluid contenedores' src='$num_foto'' alt='X'></a>";
                                echo"
                                <center>
                                <a class='hyper contenido' style='text-decoration:none' href='editar_productos.php?id=$id'>".$mostrar['marca']." ".$mostrar['modelo']." ".$mostrar['calidad']."</a>
                                <br>
                                <a class='hyper contenido' style='text-decoration:none' href='editar_productos.php?id=$id'>".$mostrar['categoria'].".</a>
                                <br><br>";
                                    echo "<a href='editar_productos.php?id=$id' class='btn btn-outline-info'>Editar producto</a>";
                                    echo'                                                                                                                    
                                </center>
                            </div>
                        </div>
                </div>';
    }
            ?>
    </div>
    </div>
</body>
</html>
<?php
mysqli_close($conexion);
?>