<?php session_start(); ?>
<html>

<head>
    <title>Formulario de Registro</title>
    <meta name="google-signin-client_id" content="302300371460-fj6pefuk3lteov7acjlq3qtuc2ofmlh9.apps.googleusercontent.com">
    <?php
    include '/templates/meta_link.html';
    ?>
</head>

<body>
    <?php include "/templates/nav.php"; ?>
    <div class="container">
        <div class="">
            <div class="row">
                <div class="col-md-12">
                    <h2>Login</h2>
                    <?php
                            if(!empty($_GET)){
                                if($_GET["estado_cuenta"]){ 
                                    $ec=$_GET['estado_cuenta'];
                        ?>
                    <form role="form" name="login" action="php/login.php" method="post">
                        <div class="form-group">
                            <label for="username">Nombre de usuario o email</label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="Nombre de usuario">
                        </div>
                        <div class="form-group">
                            <label for="password">Contrase&ntilde;a</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Contrase&ntilde;a">
                        </div>

                        <select class="hidden" type="" name="ec">
                            <?php echo "<option value='$ec'></option>";?>
                        </select>

                        <button class="btn orange" type="submit" class="btn btn-default">Acceder</button>
                        <span>&nbsp; &nbsp; o &nbsp;&nbsp;</span>
                        <a class="btn btn-outline-secondary" href="registro.php">Crea una cuenta</a>
                    </form>
                    <!--<div class="g-signin2" data-onsuccess="onSignIn"></div>-->

                    <?php }}else{ ?>

                    <form role="form" name="login" action="php/login.php" method="post">
                        <div class="form-group">
                            <label for="username">Nombre de usuario o email</label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="Nombre de usuario">
                        </div>
                        <div class="form-group">
                            <label for="password">Contrase&ntilde;a</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Contrase&ntilde;a">
                        </div>

                        <button class="btn orange" type="submit" class="btn btn-default">Acceder</button>
                        <span>&nbsp; &nbsp; o &nbsp;&nbsp;</span>
                        <a class="btn btn-outline-secondary" href="registro.php">Crea una cuenta</a>
                    </form>
                    <!--<div class="g-signin2" data-onsuccess="onSignIn"></div>-->
                    <?php } ?>

                </div>
            </div>
        </div>
    </div>


    <script src="js/google.js"></script>
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <script src="js/valida_login.js"></script>
</body>
<?php
include '/templates/footer.php';
?>
</html>
