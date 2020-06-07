<?php 
    include 'php/conexion.php' ;
    session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Infomación de compra</title>
    <?php include 'templates/meta_link.html'?>
</head>
<body>
<?php 
include 'templates/nav_admin.php';
if($_GET){
?>

<br>
    <div>
        <h5 class="text-center titulos">INFORMACIÓN DE PEDIDOS</h5>
    </div>
<br>

<div class="container">
        <div>
            <table class="table table-striped table-bootstrap">
                <thead class="thead-blue">
                    <tr>
                        <th scope="col">ID Compra</th>
                        <th scope="col">Marca</th>
                        <th scope="col">Modelo</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Calidad</th>
                        <th scope="col">Color</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $sql = "select * from venta";
                $result = mysqli_query ($conexion, $sql);
                while ($datos=mysqli_fetch_array($result)){
                    $id_compra = $datos['id_compra'];
                    if ($_GET['id']==$id_compra){
                        $id_envio = $datos['id_envio'];
                        $id_venta = $datos['id_venta'];
                        $marca = $datos['marca'];
                        $modelo = $datos['modelo'];
                        $calidad = $datos['calidad'];
                        $color = $datos['color'];
                        $cantidad = $datos['cantidad'];

                        echo "
                        <tr>
                            <th scope='row'>$id_venta</th>
                            <td>$marca</td>
                            <td>$modelo</td>
                            <td>$cantidad</td>
                            <td>$calidad</td>
                            <td>$color</td>
                        </tr>";

                    }
                }
                ?>
                </tbody>
            </table>
        </div>
        <?php 
        $sql = "select * from compra";
        $result = mysqli_query ($conexion, $sql);
        while ($datos=mysqli_fetch_array($result)){
            if ($_GET['id']==$datos['id_compra']){
                if($datos['status'] == 'Pagado'){
                ?>
                <div class="dropdown show">
                    <form action="info_compra.php" method="post">
                        <select name="status" class="btn btn-secondary dropdown-toggle">
                            <option value="0">Sin entregar</option> 
                            <option value="1">Entregado</option> 
                        </select>
                        <input type="text" hidden value="<?php echo $_GET['id'] ?>" name="id">
                        <input class="btn btn-success" type="submit" value="Realizado">
                    </form>
                </div>
            <?php 
                }else if($datos['status']=='Pendiente'){
                    echo "<h5>Los prductos aún no han sido pagados.</h5>";
                }else if($datos['status']=='Entregado'){
                    echo "<h5>Los prductos ya fueron entregados.</h5>";
                }
            }
        } 
        ?>
</div>
<br>
    <div>
        <h5 class="text-center titulos">INFORMACIÓN DE ENVÍO</h5>
    </div>
<br>

<div class="container">
        <div>
            <table class="table table-striped table-bootstrap">
                <thead class="thead-blue">
                    <tr>
                        <th scope="col">Código Postal</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Municipio</th>
                        <th scope="col">Colonia</th>
                        <th scope="col">Calle</th>
                        <th scope="col">N° Exterior</th>
                        <th scope="col">N° Interior</th>
                        <th scope="col">Teléfono</th>
                        <th scope="col">Detalles</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $sql = "select * from envio";
                $result = mysqli_query ($conexion, $sql);
                while ($datos=mysqli_fetch_array($result)){
                    if ($id_envio==$datos['id_envio']){
                        $codigo_postal = $datos['codigo_postal'];
                        $estado = $datos['estado'];
                        $municipio = $datos['municipio'];
                        $colonia = $datos['colonia'];
                        $calle = $datos['calle'];
                        $n_exterior = $datos['exterior'];
                        $n_interior = $datos['interior'];
                        $telefono = $datos['numero'];
                        $detalles = $datos['detalles'];

                        echo "
                        <tr>
                            <td>$codigo_postal</td>
                            <td>$estado</td>
                            <td>$municipio</td>
                            <td>$colonia</td>
                            <td>$calle</td>
                            <td>$n_exterior</td>
                            <td>$n_interior</td>
                            <td>$telefono</td>
                            <td>$detalles</td>
                        </tr>";
                    }
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>

<?php 
} 
if ($_POST){
    $id_compra=$_POST['id'];
    $sql = "UPDATE compra SET status='Entregado' WHERE id_compra='$id_compra'";
    $conexion->query($sql);
    echo "<center><h3>Cambios realizados con éxito</h3></center>";
    ?>
    <script>
      setTimeout("location.href = 'pedidos.php';",6000);
    </script>
    <?php
}
?>

</body>
</html>