<?php
    session_start();
    include 'php/conexion.php';//Conexion con la base de datos
    
    if($_GET["id"]) {//verificar si la variable esta en la URL
        $id=$_GET['id'];
        //echo $id;
        
    }else{
        echo "algo esta mal";
    }
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <?php
        include 'templates/meta_link.html'
    ?>
    <title>Celular Fire | Tu compra</title>
</head>
<body>

<?php
    include 'templates/nav_admin.php';
    $sql= "SELECT * FROM productos";
    $result=mysqli_query($conexion,$sql);

    while($mostrar=mysqli_fetch_array($result)){
    
        if($mostrar['id_producto']==$id){//Encontra la fila donde esta el id buscado.
        $id=$mostrar['id_producto'];
        $uno = $mostrar['numero_foto_uno'];//toma de la base de datos el numero correspondiente de su imagen en el servidor
        $dos = $mostrar['numero_foto_dos'];
        $negro=$mostrar['negro'];
        $blanco=$mostrar['blanco'];
        $azul=$mostrar['azul'];
        $color_dispo=$mostrar['colores_disponibles'];
        $marca=$mostrar['marca'];
        $modelo=$mostrar['modelo'];
        $disponibilidad=$mostrar['disponibilidad'];
        $categoria=$mostrar['categoria'];
        $menudeo=$mostrar['precio_menudeo'];
        $mayoreo=$mostrar['precio_mayoreo'];

    ?>
    
        <div class="container">
            <div class="row">
                            <div class="col-md-12 bottom">
                                <div>
                                    <div class="contenedores">
                                        <div class="text-center">
                                            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel"><!--contenedor del carrusel-->
                                                <center>
                                                <div class="carousel-inner">
                                                    <?php //inicio de php para mostrar las imagenes del servidor
                                                        echo"
                                                        <!--Contenedores imagenes carrusel-->
                                                        <div class='carousel-item active thumbnail '>
                                                            <img type='button' data-toggle='modal' data-target='#exampleModaluno' class='d-block img-fluid contenedores' width='600em' src='img/productos/$uno.png' alt='First slide'>
                                                            <div class=' text-center'><p>1/2</p></div>
                                                        </div>
                                                        <div class='carousel-item'>
                                                            <img type='button' data-toggle='modal' data-target='#exampleModaldos' class='d-block img-fluid contenedores' width='600em' src='img/productos/$dos.png' alt='Second slide'>
                                                            <div class=' text-center'><p>2/2</p></div>
                                                        </div>
                                                        <!--Fin Contenedores imagenes carrusel-->
                                                        ";
                                                    //final del php para mostrar las imagenes del servidor
                                                    ?>
                                                </div>
                                                </center>
                                                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                    <span class="sr-only">Anterior</span>
                                                </a>
                                                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                    <span class="sr-only">Siguiente</span>
                                                </a>
                                            </div>
                                        </div>
                                    <center>
                                    <img src="img/home/bord.png" width="300em" alt="">
                                    <br><br>
                                    
                                    <?php
                    
                                    echo'<span class="contenido_produ">'.$mostrar["marca"].' '.$mostrar["modelo"].' '.$mostrar["calidad"].'</span>
                                        <br>
                                        <span class="contenido_produ">'.$mostrar["categoria"].'</span>
                                        <br>';

                                    ?>
                                        <br>
                                        
                                        <form class="escondido" role="form" name="editar" action="php/editar_productos.php" method="post">
                                        
                                            <select class="btn btn-secondary dropdown-toggle list" type="" name="disponibilidad" required>
                                               <option selected value=""> Disponibilidad </option>
                                                    <option value='existencias'>Existencias</option>
                                                    <option value='agotado'>Agotado</option>
                                            </select>
                                            <br><br>
                                            <div class="row">
                                                <div class="col-4">
                                                    <label>Negro: &nbsp;</label>
                                                </div>
                                                <div class="col-8">
                                                    <select class="btn btn-secondary dropdown-toggle list" type="" name="negro" required>
                                                       <option selected value=""> Cantidad disponible </option>
                                                            <option value='0'>0</option>
                                                            <option value='1'>1</option>
                                                            <option value='2'>2</option>
                                                            <option value='3'>3</option>
                                                            <option value='4'>4</option>
                                                            <option value='5'>5</option>
                                                            <option value='6'>6</option>
                                                            <option value='7'>7</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-4">
                                                    <label>Blanco: &nbsp;</label>
                                                </div>
                                                <div class="col-8">
                                                    <select class="btn btn-secondary dropdown-toggle list" type="" name="blanco" required>
                                                       <option selected value=""> Cantidad disponible </option>
                                                            <option value='0'>0</option>
                                                            <option value='1'>1</option>
                                                            <option value='2'>2</option>
                                                            <option value='3'>3</option>
                                                            <option value='4'>4</option>
                                                            <option value='5'>5</option>
                                                            <option value='6'>6</option>
                                                            <option value='7'>7</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-4">
                                                    <label>Azul: &nbsp;</label>
                                                </div>
                                                <div class="col-8">
                                                    <select class="btn btn-secondary dropdown-toggle list" type="" name="azul" required>
                                                       <option selected value=""> Cantidad disponible </option>
                                                            <option value='0'>0</option>
                                                            <option value='1'>1</option>
                                                            <option value='2'>2</option>
                                                            <option value='3'>3</option>
                                                            <option value='4'>4</option>
                                                            <option value='5'>5</option>
                                                            <option value='6'>6</option>
                                                            <option value='7'>7</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-4">
                                                    <label>Precio menudeo:</label>
                                                </div>
                                                <div class="col-8">
                                                    <?php echo "<input style='width: 10em' type='text' name='menudeo' placeholder='$menudeo'>"; ?>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-4">
                                                    <label>Precio mayoreo:</label>
                                                </div>
                                                <div class="col-8">
                                                    <?php echo "<input style='width: 10em' type='text' name='mayoreo' placeholder='$mayoreo'>"; ?>
                                                </div>
                                            </div>
                                            <br>
                                           
                                            <br>
                                            <select class="hidden" type="" name="id">
                                            <?php echo "<option value='$id'></option>";?>//pasar el id
                                            </select>
                                            <br>
                                            <input class='btn btn-orange btn-movil' type="submit" value="Realizado"/><!--Boton del formulario-->

                                        </form><!--fin del formularuio-->

                                        <br><br>
                                    </center>
                                </div>
                            </div>
                        </div>

                     <?php
                    }
                }
                    ?>
            </div>
        </div>
 

               
<div class="container contenedores">  

<!-- Modal para expandir la imagen seleccionada nunmero uno-->
<div class="modal fade" id="exampleModaluno" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <center>
            <?php echo"
                <img src='img/productos/$uno.png' class='img-fluid' alt=''>";
            ?>
        </center>
      </div>
    </div>
  </div>
</div>

<!-- Modal para expandir la imagen seleccionada nunmero dos-->
<div class="modal fade" id="exampleModaldos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <center>
            <?php echo"
                <img src='img/productos/$dos.png' class='img-fluid' alt=''>";
            ?>
        </center>
      </div>
    </div>
  </div>
</div>

  
</div>
<script src="script.js"></script>
<script src="js/jquery-3.4.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>

</body>
</html>