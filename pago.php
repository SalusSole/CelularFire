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
          
      } 
      
      
    }

    // $sql = "select * from venta";
    // $result = mysqli_query ($conexion, $sql);
    // while ($datos=mysqli_fetch_array($result)){
    //   if ($id_compra==$datos['id_compra']){
        

    //     $color = strtolower($datos['color']);
    //     $cantidad = $datos['cantidad'];
    //     $id_producto = $datos['id_producto'];

    //     $sql2 = "select * from productos";
    //     $result2 = mysqli_query ($conexion, $sql2);
    //     while ($datos2=mysqli_fetch_array($result2)){
    //       if ($id_producto=$datos2['id_producto']){
    //         if($color=='negro'){
    //           $cantidad_producto = $datos2['negro'];
    //           $cantidad_final = $cantidad_producto-$cantidad;
    //         }else if($color=='blanco'){
    //           $cantidad_producto = $datos2['blanco'];
    //           $cantidad_final = $cantidad_producto-$cantidad;
    //         }else if($color=='azul'){
    //           $cantidad_producto = $datos2['azul'];
    //           $cantidad_final = $cantidad_producto-$cantidad;
    //         }
    //       }
    //     }
    //     echo $cantidad;
    //     echo "<br>";
    //     echo $cantidad_producto;
    //     echo "<br>";
    //     echo $cantidad_final;
    //     echo "<br>";
    //     echo "<br>";
        
    //     $sql3 = "UPDATE productos SET 'negro'='$cantidad_final' WHERE id_producto='$id_producto'";
    //     $conexion->query($sql3);
    //   }
    // }
  
    $sql = "select * from venta";
    $result = mysqli_query ($conexion, $sql);
    while ($datos=mysqli_fetch_array($result)){
      if ($id_compra==$datos['id_compra']){
        $id_producto = $datos['id_producto'];
        $cantidad = $datos['cantidad'];
        $color = $datos['color'];

        $sql2 = "select * from productos";
        $result2 = mysqli_query ($conexion, $sql2);
        while ($datos2=mysqli_fetch_array($result2)){
          if ($id_producto==$datos2['id_producto']){
            $id_producto = $datos2['id_producto'];
            if($color=='Negro'){
              $cantidad_prod = $datos2['negro'];
              $total=$cantidad_prod-$cantidad;
              $sql3 = "UPDATE productos SET negro='$total' WHERE id_producto='$id_producto'";
              $conexion->query($sql3);
            }else if($color=='Blanco'){
              $cantidad_prod = $datos2['blanco'];
              $total=$cantidad_prod-$cantidad;
              $sql3 = "UPDATE productos SET blanco='$total' WHERE id_producto='$id_producto'";
              $conexion->query($sql3);
            }else if($color=='Azul'){
              $cantidad_prod = $datos2['azul'];
              $total=$cantidad_prod-$cantidad;
              $sql3 = "UPDATE productos SET azul='$total' WHERE id_producto='$id_producto'";
              $conexion->query($sql3);
            }


          }
        }
        
      }
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
  <script>
      // setTimeout("location.href = 'pedidos.php';",6000);
  </script>
</body>
</html>

<?php
}
mysqli_close($conexion);
?>