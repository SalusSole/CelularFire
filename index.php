<?php
    session_start();
    include 'php/conexion.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Celular Fire</title>
    
    <?php
        include 'templates/meta_link.html';//incluye todas las lineas con los meta y link
    ?>

</head>
<body>
<?php
  include 'templates/nav.php';  
?>
<br>   

<div class="container">
    <div class="row">
        <!-- <div class="col-sm-12 col-md-3 col-lg-4">
            <div>
                <h5 class="text-center titulos">CATEGORÍAS</h5>
            </div>
            <div class="">
                <div class="contenedores" >
                    <div class="">
                        <a class="dropdown-item" href="#">Displays</a>
                    </div>
                    <div class="">
                        <a class="dropdown-item" href="#">Touch</a>
                    </div>
                    <div class="">
                        <a class="dropdown-item" href="#">Flexores</a>
                    </div>
                    <div class="">
                        <a class="dropdown-item" href="#">Baterias</a>
                    </div>
                </div>
            </div>
            <br><br>
            <div>
                <h5 class="text-center titulos">MARCAS</h5>
            </div>
            <div class="">
                <div class="contenedores">
                    <div class="">
                        <a class="dropdown-item" href="#">Samsung</a>
                    </div>
                    <div class="">
                        <a class="dropdown-item" href="#">Motorola</a>
                    </div>
                    <div class="">
                        <a class="dropdown-item" href="#">Apple</a>
                    </div>
                    <div class="">
                        <a class="dropdown-item" href="#">Huawei</a>
                    </div>
                    <div class="">
                        <a class="dropdown-item" href="#">Sony</a>
                    </div>
                    <div class="">
                        <a class="dropdown-item" href="#">Xiaomi</a>
                    </div>
                </div>
            </div>
            <br><br>
        </div> -->
        <div>
            <form method="POST" action="search.php" onSubmit="return validarForm(this)">
                <input type="text" placeholder="Buscar usuario" name="palabra">
                <input type="submit" value="Buscar" name="buscar">
            </form>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-9 col-lg-8">
            <div>
                <h5 class="text-center titulos">TODOS LOS PRODUCTOS</h5>
            </div>
            <div class="row">
            
<?php
    $sql= "SELECT * FROM productos";
    $result=mysqli_query($conexion,$sql);

    while($mostrar=mysqli_fetch_array($result)){
    
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
        ?>
            <br><a href=""></a>
            </div>
        </div>
    </div>
</div>
	
<?php
include 'templates/footer.php';
?>
    <script src="script.js"></script>
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    
</body>
</html>
