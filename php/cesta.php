<?php
    session_start();
    $id_usuario=$_SESSION["user_id"];
    include 'conexion.php';
    
    if($_GET["id"]) {//verificar si la variable esta en la URL
        $id=$_GET['id'];
        $cantidad=$_GET['cantidad'];
        $color=$_GET['color'];
        //echo $id;
        //echo $cantidad;
        
    }else{
        echo "algo esta mal";
        }

    $sql= "SELECT * FROM productos";
    $result=mysqli_query($conexion,$sql);

    while($mostrar=mysqli_fetch_array($result)){
        
        
        if($mostrar['id_producto']==$id){//Encontra la fila donde esta el id buscado.
            //echo $mostrar['marca'];  //Muestra algún elemento de la fila encontrada
            $id_producto=$mostrar['id_producto'];
            $marca=$mostrar['marca'];
            $modelo=$mostrar['modelo'];
            $calidad=$mostrar['calidad'];
            $categoria=$mostrar['categoria'];
            $imagen=$mostrar['numero_foto_uno'];
            $menudeo=$mostrar['precio_menudeo'];
            $mayoreo=$mostrar['precio_mayoreo'];
            
            
        }
    }
    

$doc = new domDocument("1.0", "utf-8");
$doc -> formatOutput = true;
$doc -> load("cesta.xml");

    $raiz = $doc -> getElementsByTagName("cesta") -> item(0);
    $rama = $doc -> createElement('productos');

//'id'=>$id_compra, 'marca'=>$marca, 'modelo'=>$modelo, 'calidad'=>$calidad, 'categoria'=>$categoria, 'cantidad'=>$cantidad, 'color'=>$color
$xml = file_get_contents("cesta.xml");
$elem = new SimpleXMLElement($xml);
$id_elementos=$elem->count();


        $hoja = $doc -> createElement('id');
        $hoja -> appendChild($doc -> createTextNode($id_elementos+1));
        $rama -> appendChild($hoja);  

        $hoja = $doc -> createElement('marca');
        $hoja -> appendChild($doc -> createTextNode($marca));
        $rama -> appendChild($hoja);

        $hoja = $doc -> createElement('modelo');
        $hoja -> appendChild($doc -> createTextNode($modelo));
        $rama -> appendChild($hoja);

        $hoja = $doc -> createElement('calidad');
        $hoja -> appendChild($doc -> createTextNode($calidad));
        $rama -> appendChild($hoja);

        $hoja = $doc -> createElement('categoria');
        $hoja -> appendChild($doc -> createTextNode($categoria));
        $rama -> appendChild($hoja);

        $hoja = $doc -> createElement('cantidad');
        $hoja -> appendChild($doc -> createTextNode($cantidad));
        $rama -> appendChild($hoja);

        $hoja = $doc -> createElement('color');
        $hoja -> appendChild($doc -> createTextNode($color));
        $rama -> appendChild($hoja);
        
        $hoja = $doc -> createElement('eliminado');
        $hoja -> appendChild($doc -> createTextNode(0));
        $rama -> appendChild($hoja);

        $hoja = $doc -> createElement('imagen');
        $hoja -> appendChild($doc -> createTextNode($imagen));
        $rama -> appendChild($hoja);

        $hoja = $doc -> createElement('precio_menudeo');
        $hoja -> appendChild($doc -> createTextNode($menudeo));
        $rama -> appendChild($hoja);
            
        $hoja = $doc -> createElement('precio_mayoreo');
        $hoja -> appendChild($doc -> createTextNode($mayoreo));
        $rama -> appendChild($hoja);

        $hoja = $doc -> createElement('total_menudeo');
        $hoja -> appendChild($doc -> createTextNode($menudeo*$cantidad));
        $rama -> appendChild($hoja);
        
        $hoja = $doc -> createElement('total_mayoreo');
        $hoja -> appendChild($doc -> createTextNode($mayoreo*$cantidad));
        $rama -> appendChild($hoja);
         
        $hoja = $doc -> createElement('id_usuario');
        $hoja -> appendChild($doc -> createTextNode($id_usuario));
        $rama -> appendChild($hoja);

        $hoja = $doc -> createElement('status');
        $hoja -> appendChild($doc -> createTextNode('Pendiente'));
        $rama -> appendChild($hoja);

        $hoja = $doc -> createElement('id_producto');
        $hoja -> appendChild($doc -> createTextNode($id_producto));
        $rama -> appendChild($hoja);

    $raiz -> appendChild($rama);
    $doc -> appendChild($raiz);
    $doc -> save("cesta.xml");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <META HTTP-EQUIV="REFRESH" CONTENT="2;URL=../index.php"> 
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Añadiendo a la cesta</title>
</head>
<body>
    <center>
        <img class="img-fluid" width="400px" src="../img/gif/loader.gif" alt="">
    </center>
</body>
</html>
<?php
mysqli_close($conexion);
?>