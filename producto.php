<?php
    session_start();
    
    include 'php/conexion.php';//Conexion con la base de datos
    
    if($_GET["id"]) {//verificar si la variable esta en la URL
        $id=$_GET['id'];
        //echo $id;
        
    }else{
        echo "algo esta mal";
        }

    
    /*$sql= "SELECT * FROM productos";
    $result=mysqli_query($conexion,$sql);

    while($mostrar=mysqli_fetch_array($result)){
        
        
        //if($mostrar['id_producto']==$id){//Encontra la fila donde esta el id buscado.
            //echo $mostrar['marca'];  //Muestra algún elemento de la fila encontrada
        //}
    }*/
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    
    <?php
        include '/templates/meta_link.html'
    ?>
    
    <title>Celular Fire | Tu compra</title>
</head>
<body>
<!--
<header>
    <div class="top">
            <div class=" container" >


                <div class="text-center">

                    <a href="index.php"><img class="img-fluid logo" width="350em" src="img/home/cf.png" alt="Celular Fire"/></a>

                </div>

            </div>
    </div>
    <div class="container">
       <div class="row">
            <div class="col-sm-4 col-md-4">
                <div class="text-center top bottom ">
                    <nav class="nav blue nav_productos" style="background: #ff9344">
                        <a href="index.php" class="nav-item nav-link text-center">
                            <img class="icon" src="img/iconos/icons/Back.png" width="25em">
                            <span class="hidden font-nav"></span>
                        </a>
                        <span class="nav-indicator"></span>  
                    </nav>
                </div>
            </div>
            <div class="col-sm-4 col-md-4">
                <div class="text-center top bottom ">
                    <nav class="nav blue nav_productos" style="background: #155264">
                        <a href="index.php" class="nav-item nav-link">
                            <img class="icon" src="img/iconos/icons/Back.png" width="25em">
                            <span class="hidden font-nav"></span>
                        </a>
                        <span class="nav-indicator"></span>  
                    </nav>
                </div>
            </div>  
            <div class="col-sm-4 col-md-4">
                <div class="text-center top bottom ">
                    <nav class="nav blue nav_productos" style="background: #155264">
                        <a href="index.php" class="nav-item nav-link">
                            <img class="icon" src="img/iconos/icons/Back.png" width="25em">
                            <span class="hidden font-nav"></span>
                        </a>
                        <span class="nav-indicator"></span>  
                    </nav>
                </div>
            </div>             
        </div>        
    </div>
</header>
-->
<?php
    include '/templates/nav.php';
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
                                        <br>
                                        <span class="precio_produ">MXN$'.$mostrar["precio_menudeo"].'.00</span>
                                        <br>';

                                            //echo "<a href='canasta.php?id=$id'' class='btn btn-light bottom'>Añadir a la cesta</a>";
                                    ?>
                                        <br>
                                        
                                        <form class="escondido" id="Form" name="formulario"method="get"action="php/cesta.php">
                                        <span class="seleccion">Selecciona un color:</span>
                                        <br>
                                                <select class='btn btn-secondary dropdown-toggle list' type='button' name='color' required>
                                                   <option value=""> Color </option>
                                        
                                        <?php
                                            for ($i = 1; ; $i++) {
                                                if ($i == $color_dispo+1) {
                                                }
                                                if ($negro != 0){//si negro esta disponible 
                                                    echo "<option value='Negro'>Negro</option>";
                                                    if ($blanco != 0){//si blanco disponible y negro disponible
                                                        echo "<option value='Blanco'>Blanco</option>";
                                                        if ($azul != 0){//si azul disponible y blanco disponible y negro disponible
                                                            echo "<option value='Azul'>Azul</option>";
                                                        }
                                                        else{
                                                        }
                                                    }
                                                    else{
                                                        if ($azul != 0){
                                                            echo "<option value='Azul'>Azul</option>";
                                                        }
                                                        else{
                                                        }
                                                    }
                                                }
                                                else{//si negro no esta disponible
                                                    if ($blanco != 0){//si blanco disponible y negro no esta disponible
                                                        echo "<option value='Blanco'>Blanco</option>";
                                                        if ($azul != 0){//si azul disponible y blanco disponible y negro no disponible
                                                            echo "<option value='Azul'>Azul</option>";
                                                        }
                                                        else{
                                                        }
                                                    }
                                                    else{
                                                        if ($azul != 0){//si azul disponible y negro no disponible y blanco no disponible
                                                            echo "<option value='Azul'>Azul</option>";
                                                        }
                                                        else{
                                                        }
                                                    }
                                                }
                                                
                                                 break;   
                                            }
                                        ?>
                                                </select> 
                                        <br>
                                        <br>
                                        <span class="seleccion">Selecciona una cantidad:</span><br>
                                        <select class="btn btn-secondary dropdown-toggle list" type="button" name="cantidad" required>
                                           <option selected value=""> Cantidad </option>
                                                <option value='1'>1</option>
                                                <option value='2'>2</option>
                                                <option value='3'>3</option>
                                                <option value='4'>4</option>
                                                <option value='5'>5</option>
                                                <option value='6'>6</option>
                                                <option value='7'>7</option>
                                                <option value='8'>8</option>
                                                <option value='9'>9</option>
                                                <option value='10'>10</option>
                                        </select>
                                        
                                            <br>
                                            <select class="hidden" type="" name="id">
                                            <?php echo "<option value='$id'></option>";?>//pasar el id
                                            </select>
                                            <br>
                                            <?php if(!isset($_SESSION["user_id"])):?>
                                                <a class='btn btn-orange btn-movil' href="login.php">Añadir a la cesta</a><!--Boton del formulario-->
                                            
                                            <?php else:?>
                                                <?php 
                                                    $sql1= "SELECT * FROM user";
                                                    $result1=mysqli_query($conexion,$sql1);
                                                    while($consulta=mysqli_fetch_array($result1)){
                                                        if ($consulta['id']==$_SESSION["user_id"]){
                                                            if($consulta['estado_cuenta']==0){
                                                                $id_user=$consulta['id'];
                                                                $ec=$consulta['estado_cuenta'];
                                                                ?>
                                                                <button class='btn btn-orange btn-movil' onclick="verificar()">Añadir a la cesta</button>
                                                                <script>
                                                                function verificar() {
                                                                alert("Debe de verificar su cuenta por medio del correo electronico que ingresó para poder comprar. Se le envió un correo de verificaccion a su cuenta e email.");
                                                                }
                                                                </script>
                                                                <?php
                                                            }else{
                                                                ?>
                                                                <input class='btn btn-orange btn-movil' type="submit" value="Añadir a la cesta"/><!--Boton del formulario-->
                                                                <?php
                                                            }
                                                        }
                                                    }
                                                    ?>
                                            <?php endif;?>

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


<!--
<form class="demo escondido" method="get"action="php/ces.php">
<div >
  <input  type="radio" name="color" id="m2" value="0">
  <label  for="m2"><img class="img-radio" src='img/iconos/icons/0.png' alt='negro'></label>
  
  <input type="radio" name="color" id="h2" value="1">  
  <label for="h2"><img class="img-radio" src='img/iconos/icons/1.png' alt='negro'></label>
  <input class='btn btn-orange' type="submit" value="Añadir a la cesta"/>
</div>
</form>
-->
  
</div>
<script src="script.js"></script>
<script src="js/jquery-3.4.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>

</body>
<?php
include '/templates/footer.php';
?>
</html>