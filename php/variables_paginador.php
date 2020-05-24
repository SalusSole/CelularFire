<?php
$sql= "SELECT * FROM productos";
$result=mysqli_query($conexion,$sql);
$row = mysqli_num_rows($result); 
$article_page = 2;
$pages = $row/$article_page;
$pages = ceil($pages);
$pagina_actual = $_GET['page'];
$inicio = ($pagina_actual-1)*$article_page+1;
$final = $inicio+$article_page-1;
?>