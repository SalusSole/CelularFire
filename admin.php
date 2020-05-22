<?php
    session_start();

    include 'php/conexion.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Administrador</title>
	<?php
    include 'templates/meta_link.html';
    ?>
</head>
<body>
<?php
    include 'templates/nav_admin.php'
?>

	
</body>
</html>
<?php
mysqli_close($conexion);
?>