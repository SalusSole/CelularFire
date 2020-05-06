<?php

if($_POST){
			include "conexion.php";
            
			$found=false;
			$sql1= "select * from envio";
			$query = $conexion->query($sql1);
			while ($r=$query->fetch_array()) {
				$found=true;
				break;
			}
			if($found){
				
            $sql = "INSERT INTO envio (fecha, codigo_postal, estado, municipio, colonia, calle, exterior, interior, numero, detalles) VALUES (NOW(),'$_POST[cp]','$_POST[estado]','$_POST[municipio]','$_POST[colonia]','$_POST[calle]','$_POST[exterior]','$_POST[interior]','$_POST[numero]','$_POST[detalles]')";
            if (mysqli_query($conexion, $sql)) {
            } else {
                  echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
            }
            if($query!=null){
                    print "<script>alert(\"Proceda con el pago\");window.location='pagar.php?precio=$_POST[precio]';</script>";
			}
			}else{
                echo "nope";
            }
            mysqli_close($conexion);
			
		
}else echo "no hay nada";

?>