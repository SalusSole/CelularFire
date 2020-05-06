<?php

if(!empty($_POST)){
	if(isset($_POST["disponibilidad"]) &&isset($_POST["negro"]) &&isset($_POST["blanco"]) &&isset($_POST["azul"]) &&isset($_POST["menudeo"]) &&isset($_POST["mayoreo"]) &&isset($_POST["id"])){
		if($_POST["disponibilidad"]!=""&& $_POST["negro"]!=""&&$_POST["blanco"]!=""&&$_POST["azul"]!=""&&$_POST["menudeo"]!=""&&$_POST["mayoreo"]!=""&&$_POST["id"]!=""){
			include "conexion.php";
			
			$sql= "SELECT * FROM productos";
            $result=mysqli_query($conexion,$sql);

            while($mostrar=mysqli_fetch_array($result)){

                if($mostrar['id_producto']==$_POST["id"]){
                    $sql = "UPDATE productos SET disponibilidad = '$_POST[disponibilidad]', negro = '$_POST[negro]', blanco ='$_POST[blanco]', azul = '$_POST[azul]', precio_menudeo = '$_POST[menudeo]', precio_mayoreo = '$_POST[mayoreo]' WHERE id_producto = '$_POST[id]'";
                    
                    
                    //$sql = "INSERT INTO productos (disponibilidad, negro, blanco, azul, precio_menudeo, precio_mayoreo) VALUES ('$_POST[disponibilidad]', '$_POST[negro]', '$_POST[blanco]', '$_POST[azul]', '$_POST[menudeo]', '$_POST[mayoreo]')";
                    
                    
                    if (mysqli_query($conexion, $sql)) {
                          echo "New record created successfully";
                    } else {
                          echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
                    }
                
				//print "<script>alert(\"Nombre de usuario o email ya estan registrados.\");window.location='../registro.php';</script>";
			     }
            }
            
            mysqli_close($conexion);
			
			
		}
	}else{
        echo "nope";
    }
}else{
    echo "hola";
}


?>