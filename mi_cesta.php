<?php
    session_start();
    $id_usuario=$_SESSION["user_id"];
    $total=1;
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Celular Fire | Cesta</title>
    <?php
        include 'templates/meta_link.html';//incluye todas las lineas con los meta y link
    ?>
</head>
<body>
<header>
    <?php
        include 'templates/nav.php';//incluye el nav
    ?>
    <br><br>
</header>

        <?php 
                   
        if (!$cesta = simplexml_load_file('php/cesta.xml')) {//leer el archivo xml y guardarlo en $cesta y si no no lee manda mensaje de error
            echo "Error algo salio mal";
        }else{//si el archivo esta, procede
            // recorrer el archivo xml
            $sum_menudeo=0;
            $sum_mayoreo=0;
                foreach ($cesta as $productos){//recorre el archivo xml
                    $id=$productos->id;//guarda el id de los nodos del archivo xml en la variable $id
                        if($id_usuario==$productos->id_usuario){
                            if($productos->eliminado==0){
                                $cantidad=$productos->cantidad;
                                $mayoreo=$productos->precio_mayoreo;
                                $menudeo=$productos->precio_menudeo;
                                    $sum_menudeo+= $productos->total_menudeo;
                                    $sum_mayoreo+= $productos->total_mayoreo;
                                
                            }
                        }
                    
                }
                foreach ($cesta as $productos){//recorre el archivo xml
                    $id=$productos->id;//guarda el id de los nodos del archivo xml en la variable $id
                        if($id_usuario==$productos->id_usuario){
                            if($productos->eliminado==0){
                                if ($sum_menudeo>=1500){
                                    echo "
                                    <div class='container'>             
                                        <div class='contenedores'>
                                            <div class='row text-left'>
                                                <div class='col-sm-5 col-md-4'>
                                                    <img class='img-fluid contenedores img-cesta' src='$productos->imagen' alt=''>
                                                </div>
                                                <div class='col-sm-7 col-md-8'>
                                                    <span class='contenido'>$productos->marca $productos->modelo $productos->calidad $productos->categoria</span>
                                                    <br>
                                                    <del class='precio'>MXN$$productos->precio_menudeo.00</del><br>
                                                    <span class='precio'>MXN$$productos->precio_mayoreo.00</span><br>
                                                    <span class='contenido'>$productos->color</span><br>
                                                    <span class='contenido'>Cantidad: $productos->cantidad</span>
                                                    <br>
                                                    <div class='btn-left'>
                                                    <a class='hyper contenido' 'style='text-decoration:none' href='php/eliminar.php?id=".$productos->id."'><img src='img/iconos/icons/Delete.png' alt=''></a>
                                                    </div>
                                                </div>
                                            </div>



                                        </div>             
                                    </div><br>
                                    ";
                                }else{
                                    echo "
                                    <div class='container'>             
                                        <div class='contenedores'>
                                            <div class='row text-left'>
                                                <div class='col-sm-5 col-md-4'>
                                                    <img class='img-fluid contenedores img-cesta' src='$productos->imagen' alt=''>
                                                </div>
                                                <div class='col-sm-7 col-md-8'>
                                                    <span class='contenido'>$productos->marca $productos->modelo $productos->calidad $productos->categoria</span>
                                                    <br>
                                                    <span class='precio'>MXN$$productos->precio_menudeo.00</span><br>
                                                    <span class='contenido'>$productos->color</span><br>
                                                    <span class='contenido'>Cantidad: $productos->cantidad</span>
                                                    <br>
                                                    <div class='btn-left'>
                                                    <a class='hyper contenido' 'style='text-decoration:none' href='php/eliminar.php?id=".$productos->id."'><img src='img/iconos/icons/Delete.png' alt=''></a>
                                                    </div>
                                                </div>
                                            </div>



                                        </div>             
                                    </div><br>
                                    ";
                                }
                                
                            }
                        }
                    
                }
        }
        ?>
        <?php
    if ($sum_menudeo==null){
        ?>
        <center>
            <span class='cesta'> Parece que aun no ha agregado nada a la canasta...<span>
            <br>
            <br>
            <a class="btn btn-info" href="index.php">Compra ahora!</a>
        </center>
        <?php
    }else{
        if($sum_menudeo<1500){
            echo "
            <div class='container'>             
                <div class='contenedores'>
                    <div class='row'>
                        <div class='col-sm-8 col-md-8'>
                            <span class='container'>Total</span>
                        </div>
                        <div class='col-sm-4 col-md-4'>
                            <span>MXN$$sum_menudeo.00</span>
                        </div>
                    </div>
                </div>             
            </div><br>
            <center>
                <a class='btn orange' href='../envio.php?precio=$sum_menudeo'>Comprar ahora</a>
            </center>
            <br>
            ";
        }else{
            echo "
            <div class='container'>             
                <div class='contenedores'>
                    <div class='row'>
                        <div class='col-sm-3 col-md-3'>
                            <span class='container'>Total</span>
                        </div>
                        <div class='col-sm-4 col-md-4 text-center'>
                            <del>MXN$$sum_menudeo.00</del>
                        </div>
                        <div class='col-sm-4 col-md-4 text-center'>
                            <span>MXN$$sum_mayoreo.00</span>
                        </div>
                    </div>
                </div>             
            </div><br>
            <center>
                <a class='btn orange' href='../envio.php?precio=$sum_mayoreo'>Comprar ahora</a>
            </center>
            <br>
            ";
        }
    }
        

    
    ?>
        

<?php
include 'templates/footer.php';
?>
<script src="../script.js"></script>
<script src="../js/jquery-3.4.1.min.js"></script>
<script src="../js/popper.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
</body>
</html>