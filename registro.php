<?php session_start(); ?>
<html>
	<head>
		<title>Formulario de Registro</title>
		<meta name="google-signin-client_id" content="302300371460-fj6pefuk3lteov7acjlq3qtuc2ofmlh9.apps.googleusercontent.com">
		<?php
		include 'templates/meta_link.html';
		?>
	</head>
	<body>
	<?php include "templates/nav.php"; ?>
<div class="container">
<div class="row">
<div class="col-md-12">
		<h2>Registro</h2>

		<form role="form" name="registro" action="php/registro.php" method="post">
		  <div class="form-group">
		    <label for="username">Nombre de usuario</label>
		    <input type="text" class="form-control" id="username" name="username" placeholder="Nombre de usuario">
		  </div>
		  <div class="form-group">
		    <label for="fullname">Nombre Completo</label>
		    <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Nombre Completo">
		  </div>
		  <div class="form-group">
		    <label for="email">Correo Electronico</label>
		    <input type="email" class="form-control" id="email" name="email" placeholder="Correo Electronico">
		  </div>
		  <div class="form-group">
		    <label for="password">Crea una contraseña</label>
		    <input type="password" class="form-control" id="password" name="password" placeholder="Contrase&ntilde;a">
		  </div>
		  <div class="form-group">
		    <label for="confirm_password">Confirmar Contraseña</label>
		    <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirmar Contrase&ntilde;a">
		  </div>
		  <button class="btn orange" type="submit" class="btn btn-default">Registrar</button>
		  <!-- <br><br><span>&nbsp; Usar Google para autocompletar:</span>
           <br>
           <br>
            <div class="g-signin2" data-onsuccess="onSignIn"></div> -->
		</form>
		</div>
		</div>
</div>
<?php
include '/templates/footer.php';
?>
       
        <script src="js/google.js"></script>
        <script src="https://apis.google.com/js/platform.js" async defer></script>
		<script src="js/valida_registro.js"></script>
	</body>
</html>