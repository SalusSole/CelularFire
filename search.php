<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <?php include 'templates/meta_link.html'; ?>

    <title>Busqueda</title>
</head>
<body>

<?php include 'templates/nav.php'; ?>
<div class="container">
<div class="col-xs-12 col-sm-12 col-md-9 col-lg-8">
    <div class="row">
<?php
include 'php/conexion.php';
if($_POST){
    $buscar = $_POST["palabra"];
    $sql= "SELECT * FROM productos WHERE marca like '%$buscar%' or modelo like '%$buscar%'";
    $result=mysqli_query($conexion,$sql);

    while($mostrar = mysqli_fetch_assoc($result)) 
       {
        if($mostrar['disponibilidad']=='existencias'){
            $id=$mostrar['id_producto'];
            $num_foto=$mostrar['numero_foto_uno'];
                
            echo '<div class="col-xs-6 col-sm-6 col-md-6 col-lg-4 bottom">
                            <div class="cont-img">
                                <div class="contenedores imagenes">';
                                    echo "<a class='hyper' href='producto.php?id=$id'><img class='img-fluid contenedores' src='img/productos/$num_foto.png'' alt='X'></a>";
                                    echo"
                                    <center>
                                    <a class='hyper contenido' style='text-decoration:none' href='producto.php?id=$id'>".$mostrar['marca']." ".$mostrar['modelo']." ".$mostrar['calidad']."</a>
                                    <br>
                                    <a class='hyper contenido' style='text-decoration:none' href='producto.php?id=$id'>".$mostrar['categoria'].".</a>
                                    <br>
                                    <a class='precio' style='text-decoration:none' href='producto.php?id=$id'>MXN$".$mostrar['precio_menudeo'].".00</a>
                                    <br>";
                                        echo "<a href='producto.php?id=$id' class='btn btn-light bottom'>Ver Producto</a>";
                                        echo'                                                                                                                    
                                    </center>
                                </div>
                            </div>
                    </div>';
            
                
            }else{
            $id=$mostrar['id_producto'];
            $num_foto=$mostrar['numero_foto_uno'];
                echo '<div class="col-xs-6 col-sm-6 col-md-6 col-lg-4 bottom">
                            <div class="cont-img">
                                <div class="contenedores imagenes">';
                                    echo "<img class='img-fluid contenedores' src='img/productos/$num_foto.png'' alt='X'>";
                                    echo"
                                    <center>
                                    <span class='agotado'>Producto agotado.</span>
                                    <br>                                                                                                                   
                                    </center>
                                </div>
                            </div>
                    </div>";
            }
       } 
}
?>

    </div>
</div>
</div>
</body>
</html>