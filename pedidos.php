<?php
    include 'php/conexion.php'; 
    session_start();    
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedidos</title>
    <?php include 'templates/meta_link.html' ?>
</head>
<body>
    <?php include 'templates/nav_admin.php' ?>
    <div class="container">
        <br>
        <div>
            <h5 class="text-center titulos">PEDIDOS</h5>
        </div>
        <br>
        <div>
            <table class="table table-striped table-bootstrap">
                <thead class="thead-blue">
                    <tr>
                        <th scope="col">Fecha pedido</th>
                        <th scope="col">Usuario</th>
                        <th scope="col">Estado de pago</th>
                    </tr>
                </thead>
                <tbody>
                <?php

                $sql = "select * from compra";
                $result = mysqli_query ($conexion, $sql);
                while ($datos=mysqli_fetch_array($result)){
                    $id_compra = $datos['id_compra'];
                    $user = $datos['user'];
                    $correo = $datos['correo'];
                    $estado = $datos['status'];
                    $fecha = $datos['fecha'];
                   
                echo "
                    <tr>
                        <td>$fecha</th>
                        <td><a class='link-pedido' href='info_compra.php?id=$id_compra'>$user</a></td>
                        <td><a class='link-pedido' href='info_compra.php?id=$id_compra'>$estado</a></td>
                    </tr>";
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>

<?php mysqli_close($conexion); ?>