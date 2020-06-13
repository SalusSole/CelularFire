<?php
session_start();
include 'php/conexion.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Banner Publicitario</title>
    <?php
        include 'templates/meta_link.html';
    ?>
</head>
<body>
<?php
  include 'templates/nav_admin.php';  
?>
<div class="container">
    <div>
        <h5 class="text-center titulos">SUBIR BANER DE PUBLICIDAD</h5>
    </div>
    <br>
    <div class=" text-center">
        <form action="php/agregar_banner.php" method="post" enctype="multipart/form-data">
            <br>
            <input type="file" name="foto" required class="btn btn-dark">
            <br><br>
            <input type="submit" class="btn btn-success" value="Subir foto" >
            <br><br>
        </form>
    </div>
</div>
    
</body>
</html>