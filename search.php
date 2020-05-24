<?php
include 'php/conexion.php';
if($_GET){
$buscar = $_GET["palabra"];
?>
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
    <div>
        <h5 class="text-center titulos">BUSCAR PRODUCTOS</h5>
    </div>
    <div class="text-center search-container">
        <form method="GET" action="search.php">
            <?php
                echo "<input class='search' type='text' value='$buscar' name='palabra' required>";
            ?>
            <input type="image" value="Buscar" name="buscar" src="img/iconos/icons/search.png" width="23px">
        </form>
    </div>
    
<?php

  
if($sql= "SELECT * FROM productos WHERE marca like '%$buscar%' or modelo like '%$buscar%' or categoria like '%$buscar%'"){
    $result=mysqli_query($conexion,$sql);

    $row = mysqli_num_rows($result); 
    if($row>0){
    ?>
        <div class="text-center resultado-search">
            <span>Resultado de su busqueda</span>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-9 col-lg-8">
            <div class="row">
     <?php
    }
    while($mostrar = mysqli_fetch_assoc($result)) {
        if($mostrar['disponibilidad']=='existencias'){
            $id=$mostrar['id_producto'];
            $num_foto=$mostrar['numero_foto_uno'];
            
            

            echo '<div class="col-xs-6 col-sm-6 col-md-6 col-lg-4 bottom">
                            <div class="cont-img">
                                <div class="contenedores imagenes">';
                                    echo "<a class='hyper' href='producto.php?id=$id'><img class='img-fluid contenedores' src='$num_foto' alt='X'></a>";
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
                                        echo "<img class='img-fluid contenedores' src='$num_foto' alt='X'>";
                                        echo"
                                        <center>
                                        <a class='hyper contenido' style='text-decoration:none' href='producto.php?id=$id'>".$mostrar['marca']." ".$mostrar['modelo']." ".$mostrar['calidad']."</a>
                                        <br>
                                        <a class='hyper contenido' style='text-decoration:none' href='producto.php?id=$id'>".$mostrar['categoria'].".</a>
                                        <br>
                                        <span class='agotado'>Producto agotado.</span>
                                        <br>                                                                                                                   
                                        </center>
                                    </div>
                                </div>
                        </div>";
            }
        }
    }
    $row = mysqli_num_rows($result); 
    if($row==0){
        ?>
        <div class="text-center resultado-search">
            <span>Su busqueda no tiene resultados :(</span>
            <br>
            <span>Pruebe con otra cosa.</span>
        </div>
        <?php
    }
}
?>

    </div>
</div>
</div>
</body>
</html>
<?php
mysqli_close($conexion);
?>