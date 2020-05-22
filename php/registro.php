<?php

// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;

// require '../phpmailer/Exception.php';
// require '../phpmailer/PHPMailer.php';
// require '../phpmailer/SMTP.php';

if(!empty($_POST)){
	if(isset($_POST["username"]) &&isset($_POST["fullname"]) &&isset($_POST["email"]) &&isset($_POST["password"]) &&isset($_POST["confirm_password"])){
		if($_POST["username"]!=""&& $_POST["fullname"]!=""&&$_POST["email"]!=""&&$_POST["password"]!=""&&$_POST["password"]==$_POST["confirm_password"]){
			include "conexion.php";
			
			$found=false;
			$sql1= "select * from user where username=\"$_POST[username]\" or email=\"$_POST[email]\"";
            $query = $conexion->query($sql1);
            $user=$_POST['username'];
			while ($r=$query->fetch_array()) {
				$found=true;
				break;
			}
			if($found){
				print "<script>alert(\"Nombre de usuario o email ya estan registrados.\");window.location='../registro.php';</script>";
			}else{
            $sql = "INSERT INTO user (username, fullname, email, password, estado_cuenta) VALUES ('$_POST[username]', '$_POST[fullname]', '$_POST[email]', '$_POST[password]', '0')";
            if (mysqli_query($conexion, $sql)) {
                echo "New record created successfully";
                
                //en caso de que se registre todo correctamente manda correo de verificación
                
                //funcion para PHPMAILER para su funcionamiento en Localhost, pero para el hosting se usa PhP Mail().
                // $mail = new PHPMailer(true);

                // try {
                //     //Server settings
                //     $mail->SMTPDebug = 0;                      // Enable verbose debug output
                //     $mail->isSMTP();                                            // Send using SMTP
                //     $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
                //     $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                //     $mail->Username   = 'ch1.yomero.ss@gmail.com';                     // SMTP username
                //     $mail->Password   = 'contraseña*';                               // SMTP password
                //     $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                //     $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

                //     //Recipients
                //     $mail->setFrom('ch1.yomero.ss@gmail.com', 'Administrador');
                //     $mail->addAddress($_POST['email']);

                //     // Content
                //     $mail->isHTML(true);                                  // Set email format to HTML
                //     $mail->Subject = 'Verifique su correo electronico';
                //     $mail->Body    = 'Para poder realizar compras es necesario que verifique su cuenta de correo. Si este es su correo haga click en el siguiente enlace para ser redirigido a Celular Fire. <br> <center> <a class="btn" href="http://localhost/cf-four/php/logout.php?estado_cuenta=1">Empieza a comprar ahora.</a></center>';
                //     $mail->send();
                //     echo 'El mensaje ha sido enviado';
                // } catch (Exception $e) {
                //     echo "Hubo un problema al enviar el correo. Error: {$mail->ErrorInfo}";
                // }
                
                //Código para PHP Mail().
                
                ini_set( 'display_errors', 1 );
                error_reporting( E_ALL );
                $from = "admin@celularfireonline.com";
                $to = $_POST['email'];
                $subject = "Verifique su correo electronico";
                
                $message = "
                <html>
                <head>
                <title>HTML email</title>
                </head>
                <body>
                <p>This email contains HTML Tags!</p>
                <table>
                <tr>
                <th>Firstname</th>
                <th>Lastname</th>
                </tr>
                <tr>
                <td>John</td>
                <td>Doe</td>
                </tr>
                </table>
                </body>
                </html>
                ";

                // Always set content-type when sending HTML email
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                // More headers
                $headers .= 'From:' . $from. "\r\n";

                mail($to,$subject,$message, $headers);
                echo "The email message was sent.";


            } else {
                  echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
            }
            if($query!=null){
				print "<script>alert(\"Registro exitoso. Proceda a logearse\");window.location='../login.php';</script>";
			}
            }
            mysqli_close($conexion);
			
			
		}
	}
}


?>