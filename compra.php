<?php
session_start(); 
$bandera1=0;
$bandera2=0;
if($_POST){
	$total=$_POST['precio'];
	echo $total;
			include "php/conexion.php";
            
			$found=false;
			$sql1= "select * from envio";
			$query = $conexion->query($sql1);
			while ($r=$query->fetch_array()) {
				$found=true;
				break;
			}
			if($found){
			//agrega los datos del envio a la base de datos	
            $sql = "INSERT INTO envio (fecha, codigo_postal, estado, municipio, colonia, calle, exterior, interior, numero, detalles) VALUES (NOW(),'$_POST[cp]','$_POST[estado]','$_POST[municipio]','$_POST[colonia]','$_POST[calle]','$_POST[exterior]','$_POST[interior]','$_POST[numero]','$_POST[detalles]')";
            if (mysqli_query($conexion, $sql)) {
            } else {
                  echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
            }
            if($query!=null){
				//pasa a guardar los elememtos de la compra y la venta en la base de datos
				$sql = "INSERT INTO compra (id_usuario, fecha, total, status) VALUES ('$_SESSION[user_id]',NOW(),'$_POST[precio]','pendiente')";
    
				if (mysqli_query($conexion, $sql)) {
					$compra_id = mysqli_insert_id($conexion);
					
					$bandera1=1;
				   // echo $last_id;
				} else {
					echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
				}
			
				$sql = "INSERT INTO venta (id_compra, id_producto, precio_unitario, cantidad, descargado, color, calidad, categoria, precio_total) VALUES ('1','1','200','2','0','blanco','','display','$_POST[precio]' )";
			
				if (mysqli_query($conexion, $sql)) {
					$bandera2=1;
				} else {
					  echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
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
</head>
<body>
<div id="paypal-button"></div>
<script src="https://www.paypalobjects.com/api/checkout.js"></script>
<div id="paypal-button"></div>
<script src="https://www.paypalobjects.com/api/checkout.js"></script>
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
        window.location="paypal.php?id_compra="+id_compra;
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