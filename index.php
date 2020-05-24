<?php
    session_start();
    include 'php/conexion.php';
    include 'php/variables_paginador.php'
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
        <!-- <div class="col-sm-12 col-md-3 col-lg-4">
            <div>
                <h5 class="text-center titulos">BUSCAR PRODUCTOS</h5>
            </div>
            <div>
                <form method="POST" action="search.php" onSubmit="return validarForm(this)">
                    <input type="text" placeholder="Buscar usuario" name="palabra">
                    <input type="submit" value="Buscar" name="buscar">
                </form>
            <div>
        </div> -->
        <div class="col-sm-12 col-md-12 col-lg-4">
            <div>
                <h5 class="text-center titulos">BUSCAR PRODUCTOS</h5>
            </div>
            <div class="text-center search-container">
                <form method="GET" action="search.php">
                    <input class="search" type="text" placeholder="Buscar..." name="palabra" required>
                    <input type="image" value="Buscar" name="buscar" src="img/iconos/icons/search.png" width="23px">
                </form>
            </div>
            <br><br>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
            <div>
                <h5 class="text-center titulos">TODOS LOS PRODUCTOS</h5>
            </div>
            <div class="row">
            
<?php
    $sql= "SELECT * FROM productos";
    $result=mysqli_query($conexion,$sql);

    if(!$_GET){
        echo "<script> window.location='index.php?page=1'; </script>";
    }

    while($mostrar=mysqli_fetch_array($result)){
        if($mostrar['id_producto']>=$inicio && $mostrar['id_producto']<=$final){
            if($mostrar['disponibilidad']=='existencias'){
            $id=$mostrar['id_producto'];
            $num_foto=$mostrar['numero_foto_uno'];
                
            echo '<div class="col-xs-6 col-sm-6 col-md-4 col-lg-4 bottom">
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
                    </div>'
                    ;
            
                
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
        ?>
            
            </div>
        </div>
    </div>
</div>
<br><br>
<div class="paginador">
<!-- Paginador con bootstrap  -->
<?php if($row>=2): ?>
    <div class="">
        <div aria-label="Page navigation example">
        <ul class="pagination">

            <?php
            if ($_GET['page']>1){
            ?>
                <li class="page-item">
                <a class="page-link" href="index.php?page=<?php echo $_GET['page']-1 ?>" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span>
                </a>
                </li>
            <?php
            }
            ?>

            <?php for($i=0;$i<$pages;$i++):?>
                <li class='page-item <?php echo $_GET['page']==$i+1 ? 'active' : '' ?>'>
                    <a class='page-link' href='index.php?page=<?php echo $i+1 ?>'>
                        <?php echo $i+1 ?>
                    </a>
                </li>
            <?php endfor ?>
            
            <?php
            if ($_GET['page']<$pages){
            ?>
                <li class="page-item">
                <a class="page-link" href="index.php?page=<?php echo $_GET['page']+1 ?>" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                </a>
                </li>
            <?php
            }
            ?>
        </ul>
        </div>
    </div>
    <?php endif ?>
</div>


<?php include 'templates/footer.php'; ?>    

<!-- <img src="img/webp/1.webp" width="300px" alt="">
<img src="img/productos/1.png" width="300px" alt=""> -->

    <script src="script.js"></script>
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    
</body>
</html>

<?php
mysqli_close($conexion);
?>