<?php

    if($_GET["id"]) {//verificar si la variable esta en la URL
        $id=$_GET['id'];
        //echo $id;        
    }else{
        echo "Algo esta mal";
        }



$xml = new DOMDocument("1.0", "utf-8");
$xml -> formatOutput = true;
$xml->load('cesta.xml');

$nodoslista=$xml->getElementsBYTagName("productos");
$modificar=null;

for($i=0;$i<$nodoslista->length; $i++){
    $lista=$nodoslista->item($i)->childNodes;
    
        
        if (((string) $lista->item(0)->nodeValue)==$id){

            $lista->item(7)->nodeValue=1;
            $modificar=1;
            break 1;
            $xml->save('cesta.xml');
            
        } //echo "algo salio mal";
            
    
}
if ($modificar!==null) {
    $xml->save('cesta.xml');
}else{
    echo "Algo no sirve";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <META HTTP-EQUIV="REFRESH" CONTENT="2;URL=../mi_cesta.php">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Eliminando</title>
</head>
<body>
    <center>
        <img class="img-fluid" width="400px" src="../img/gif/loader.gif" alt="">
    </center>
</body>
</html>