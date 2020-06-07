<?php
session_start();
$id_user = $_SESSION['user_id'];
include 'php/conexion.php';

if($_GET){
  $id_compra = $_GET['id_compra'];
  $sql = "UPDATE compra SET status='Pagado' WHERE id_compra='$id_compra'";
  $conexion->query($sql);

  $xml = new DOMDocument("1.0", "utf-8");
  $xml -> formatOutput = true;
  $xml->load('php/cesta.xml');
  
  $nodoslista=$xml->getElementsBYTagName("productos");
  $modificar=null;
  
  for($i=0;$i<$nodoslista->length; $i++){
      $lista=$nodoslista->item($i)->childNodes;
      
          while (((string) $lista->item(13)->nodeValue)==$id_user){
  
              $lista->item(14)->nodeValue='Pagado';
              $modificar=1;
              $xml->save('php/cesta.xml');
              break 1;
              
          } //echo "algo salio mal";
              
      
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
}
mysqli_close($conexion);
?>