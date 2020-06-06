<?php
session_start();
include 'php/conexion.php';

if($_GET){
  $id_compra = $_GET['id_compra'];
  $sql = "UPDATE compra SET status='pagado' WHERE id_compra='$id_compra'";
  $conexion->query($sql);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Compra finalizada</title>
  <?php include 'templates/meta_link.html' ?>
</head>
<body>
  
<?php include 'templates/nav.php' ?>

  <div class="container compra-exitosa text-center">
    <div class="text-compra-exitosa">
      <span class="">El pagó se realizo con éxito. Su pedido llegará en un lapso de 30 días.</span>
    </div>
  </div>
</body>
</html>

<?php
mysqli_close($conexion);
?>