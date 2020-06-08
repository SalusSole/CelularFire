<?php
    session_start();

    include 'php/conexion.php';
    include 'php/variables_paginador.php';
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
<div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-4">
            <div>
                <h5 class="text-center titulos">BUSCAR PRODUCTOS</h5>
            </div>
            <div class="text-center search-container">
                <form method="GET" action="search_admin.php">
                    <input class="search" type="text" placeholder="Buscar..." name="palabra" required>
                    <input type="image" value="Buscar" name="buscar" src="img/iconos/icons/search.png" width="23px">
                </form>
            </div>
            <br><br>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
            <div>
                <h5 class="text-center titulos">EDITAR PRODUCTOS</h5>
            </div>
            <div class="row">
<br>


            
<?php
if(!$_GET){
    echo "<script> window.location='productos_admin.php?page=1'; </script>";
}
    $sql= "SELECT * FROM productos";
    $result=mysqli_query($conexion,$sql);

    while($mostrar=mysqli_fetch_array($result)){
        if($mostrar['id_producto']>=$inicio && $mostrar['id_producto']<=$final){
    
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
    }
            ?>
    </div>
    </div>
    </div>
    <div class="paginador">
<!-- Paginador con bootstrap  -->
<?php if($row>=10): ?>
    <div class="">
        <div aria-label="Page navigation example">
        <ul class="pagination">

            <?php
            if ($_GET['page']>1){
            ?>
                <li class="page-item">
                <a class="page-link" href="productos_admin.php?page=<?php echo $_GET['page']-1 ?>" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span>
                </a>
                </li>
            <?php
            }
            ?>

            <?php for($i=0;$i<$pages;$i++):?>
                <li class='page-item <?php echo $_GET['page']==$i+1 ? 'active' : '' ?>'>
                    <a class='page-link' href='productos_admin.php?page=<?php echo $i+1 ?>'>
                        <?php echo $i+1 ?>
                    </a>
                </li>
            <?php endfor ?>
            
            <?php
            if ($_GET['page']<$pages){
            ?>
                <li class="page-item">
                <a class="page-link" href="productos_admin.php?page=<?php echo $_GET['page']+1 ?>" aria-label="Next">
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
</body>
</html>
<?php
mysqli_close($conexion);
?>