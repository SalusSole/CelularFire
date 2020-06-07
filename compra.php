<?php
session_start(); 
$user_id = $_SESSION["user_id"];
$bandera1=0;
$bandera2=0;
if($_POST){
	$total=$_POST['precio'];
	//echo $total;
			include "php/conexion.php";
            
			$found=false;
			$sql1= "select * from envio";
			$query = $conexion->query($sql1);
			while ($r=$query->fetch_array()) {
				$found=true;
				break;
      }
     
      $sql_user = "select * from user";
      $result = mysqli_query ($conexion, $sql_user);
      while ($datos_user=mysqli_fetch_array($result)){
        if($user_id==$datos_user['id']){
          $nombre = $datos_user['fullname'];
          $email = $datos_user['email'];
        }
      }

			if($found){
			//agrega los datos del envio a la base de datos	
            $sql = "INSERT INTO envio (fecha, codigo_postal, estado, municipio, colonia, calle, exterior, interior, numero, detalles) VALUES (NOW(),'$_POST[cp]','$_POST[estado]','$_POST[municipio]','$_POST[colonia]','$_POST[calle]','$_POST[exterior]','$_POST[interior]','$_POST[numero]','$_POST[detalles]')";
            if (mysqli_query($conexion, $sql)) {
              $envio_id = mysqli_insert_id($conexion);
            } else {
                  echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
            }
            if($query!=null){
				//pasa a guardar los elememtos de la compra y la venta en la base de datos
				$sql = "INSERT INTO compra (id_usuario, fecha, total, status, user, correo) VALUES ('$_SESSION[user_id]',NOW(),'$_POST[precio]','Pendiente', '$nombre', '$email')";
    
				if (mysqli_query($conexion, $sql)) {
					$compra_id = mysqli_insert_id($conexion);
					
					$bandera1=1;
				   // echo $last_id;
				} else {
					echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
				}
        //VENTA


      if (!$cesta = simplexml_load_file('php/cesta.xml')) {//leer el archivo xml y guardarlo en $cesta y si no no lee manda mensaje de error
        echo "Error algo salio mal";
      }else{
        $sum_menudeo=0;
        $sum_mayoreo=0;
          foreach ($cesta as $productos){//recorre el archivo xml
            $id=$productos->id;//guarda el id de los nodos del archivo xml en la variable $id
            $status = $productos->status;
            if($user_id==$productos->id_usuario){
              if($status!='Pagado'){
                if($productos->eliminado==0){
                  $cantidad = $productos->cantidad;
                  $marca = $productos->marca;
                  $modelo = $productos->modelo;
                  $calidad = $productos->calidad;
                  $categoria = $productos->categoria;
                  $color = $productos->color;
                  $precio_menudeo = $productos->precio_menudeo;
                  $precio_mayoreo = $productos->precio_mayoreo;

                  $sql = "INSERT INTO venta (id_envio, id_compra, precio_menudeo, precio_mayoreo, cantidad, color, calidad, categoria, precio_total, marca, modelo) VALUES ('$envio_id','$compra_id','$precio_menudeo','$precio_mayoreo','$cantidad','$color','$calidad','$categoria','$_POST[precio]', '$marca', '$modelo' )";
        
                  if (mysqli_query($conexion, $sql)) {
                    $bandera2=1;
                  } else {
                      echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
                  }  
                }
              }
            }
          } 
      }
      } 

			}else{
                echo "nope";
            }
			
			if($bandera1==1 && $bandera2==1){
			?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include 'templates/meta_link.html' ?>
</head>
<body>

<div class="container text-center text-compra-exitosa">
    <span>El total de su compra es: $<b><?php echo $total ?></b> </span>
    <br>
    <br>
<div id="paypal-button"></div>
<script src="https://www.paypalobjects.com/api/checkout.js"></script>
</div>
<script>
  paypal.Button.render({
    // Configure environment
    env: 'sandbox',
    client: {
      sandbox: 'ASLVLknScxYbM5v20Ht_FOANzhxi5zMcsm6gTQVSilTcfAjBeBZamPiOyBwyrjJEVz0LTniwuNIrmikr',
      production: 'demo_production_client_id'
    },
    // Customize button (optional)
    locale: 'es_US',
    style: {
      size: 'small',
      color: 'blue',
      shape: 'pill',
    },

    // Enable Pay Now checkout flow (optional)
    commit: true,

    // Set up a payment
    payment: function(data, actions) {
      return actions.payment.create({
        transactions: [{
          amount: {
            total: '<?php echo $total ?>',
            currency: 'MXN'
          }
        }]
      });
    },
    // Execute the payment
    onAuthorize: function(data, actions) {
      return actions.payment.execute().then(function() {
        // Show a confirmation message to the buyer
        //window.alert('Thank you for your purchase!');
        console.log(data);
		var id_compra = <?php echo $compra_id ?>;
        //window.alert(id_compra);
        window.location="pago.php?id_compra="+id_compra;
        //window.location="verificador.php?paymentToken="+data.paymentToken+"&paymentID="+data.paymentID;
      });
    }
  }, '#paypal-button');

</script>
<?php
}		
			mysqli_close($conexion);
			
		
}else echo "no hay nada";

?>