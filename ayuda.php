<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ayuda</title>
    <?php
    include 'templates/meta_link.html';
    ?>
</head>
<body>
<?php
include 'templates/nav.php';
?>
<br>
<div class="container">
    <div class="row">
        <div class="col-12 ayuda-div">
            <div>
                <h5 class="text-center titulos">CÓMO USAR CELULAR FIRE ONLINE</h5>
            </div>
            <br>
            <a>
                Para poder realizar compras dentro de la plataforma de Celular Fire debe seguir los siguientes pasos:
                <ul>
                    <br>
                    <li>Entrar a la página de inicio en <a href="index.php">celularfireonline.com</a>.</li>
                    <br>
                    <li>En el menú debe ingresar al elemento <a href="registro.php">Crear Cuenta</a>, en caso de que no tenga una cuenta registrada.</li>
                    <br>
                    <li>Una vez tenga una cuenta registrada, ingrese con su nombre de usuario o su correo junto con la contraseña que ingresó con anterioridad en la pagina de <a href="login.php">Login</a>.</li>
                    <br>
                    <li>Posteriormente podrá ingresar a ver todos los productos, dirigiendose a la página de <a href="index.php">Inicio</a>.</li>
                    <br>
                    <li>Para agregar al carrito de compras debe seleccionar el producto que desee, elegir la cantidad y el color. Después dar click en Añadir a la cesta.</li>
                    <br>
                    <li>Para poder ver los elementos que ha añadido a la cesta debe dirigirse al elemento del menú: <a href="mi_cesta.php">Canasta</a>. Donde aparecerá la información de los productos agregados al carrito, como el precio.</li>
                    <br>
                    <li>Para eliminar un elemento del carrito se debe hacer click en el icono de cesto de basura en el producto que desea elimina para retirarlo del carrito de compras.</li>
                    <br>
                    <li>Para proceder con el pedido, deberá hacer click en: Comprar Ahora, en el carrito de compras.</li>
                    <br>
                    <li>Se mostrará un formulario para que lo llene con la información del envío.</li>
                    <br>
                    <li>Después debe hacer click en continuar le aparecerá una confirmación del total a pagar y un botón que lo redirigirá a una ventana emergente de PayPal, donde podrá realizar el pago.</li>
                    <br>
                    <li>Posteriormente, el pago será procesado junto con la informaión del envío y se le hará llegar el paquete de forma segura.</li>
                </ul>
            </a>
        </div>
    </div>
</div>

  
<?php
include 'templates/footer.php';
?>  
</body>
</html>