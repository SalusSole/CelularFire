<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pedido</title>
    <?php
        include 'templates/meta_link.html';
    ?>
</head>
<body>
   <header>
       <h1 class="text-center">Agregar Domicilio</h1>
   </header>
    <div class="container">
        <div>
            <form action="compra.php" method="post">
                <label for="">Código postal</label>
                <br>
                <input type="text"name="cp" class="form-control" placeholder="Código postal" required>
                <br>
                <label for="">Estado</label>
                <br>
                <input type="text"name="estado" class="form-control" placeholder="Estado" required>
                <br>
                <label for="">Delegación / Municipio</label>
                <br>
                <input type="text"name="municipio" class="form-control" placeholder="Delegación / Municipio" required>
                <br>
                <label for="">Colonia</label>
                <br>
                <input type="text"name="colonia" class="form-control" placeholder="Colonia" required>
                <br>
                <label for="">Calle</label>
                <br>
                <input type="text"name="calle" class="form-control" placeholder="Calle" required>
                <br>
                <label for="">N° exterior</label>
                <br>
                <input type="text"name="exterior" class="form-control" placeholder="N° Exterior" required>
                <br>
                <label for="">N° interior (opcional)</label>
                <br>
                <input type="text"name="interior" class="form-control" placeholder="">
                <br>
                <label for="">Número de concacto</label>
                <br>
                <input type="text"name="numero" class="form-control" placeholder="">
                <br>
                <label for="">Indicaciones adicionales</label>
                <br>
                <input type="text"name="detalles" class="form-control" placeholder="">
                <br>
                <input hidden type="text"name="precio" value="<?php echo $_POST["precio"]?>">
                <br>
                <input type="submit" class="btn-lg btn-primary btn-block" value="Continuar">
                <br>
            </form>
        </div>
    </div>
</body>
</html>