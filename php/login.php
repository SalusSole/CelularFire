<?php

if(!empty($_POST)){
    if(isset($_POST["username"]) &&isset($_POST["password"]) &&isset($_POST["ec"])){
		if($_POST["username"]!=""&&$_POST["password"]!=""&&$_POST["ec"]!=""){
			include "conexion.php";
			
			$user_id=null;
			$sql1= "select * from user where (username=\"$_POST[username]\" or email=\"$_POST[username]\") and password=\"$_POST[password]\" ";
			$query = $conexion->query($sql1);
			while ($r=$query->fetch_array()) {
				$user_id=$r["id"];
                $usuario=$r["tipo_usuario"];
				break;
			}
			if($user_id==null){
				print "<script>alert(\"Acceso invalido.\");window.location='../login.php';</script>";
			}else{
				session_start();
				$_SESSION["user_id"]=$user_id;
                if ($usuario=="admin"){
                    print "<script>window.location='../admin.php';</script>";				
                }else{
                    mysql_connect("localhost","root","");
                    mysql_select_db("proyecto");
                    $sSQL="Update user Set estado_cuenta='1' Where id='$user_id'";
                    mysql_query($sSQL);
                    print "<script>window.location='../index.php';</script>";	
                }
			}
		}
	}else if(isset($_POST["username"]) &&isset($_POST["password"])){
		if($_POST["username"]!=""&&$_POST["password"]!=""){
			include "conexion.php";
			
			$user_id=null;
			$sql1= "select * from user where (username=\"$_POST[username]\" or email=\"$_POST[username]\") and password=\"$_POST[password]\" ";
			$query = $conexion->query($sql1);
			while ($r=$query->fetch_array()) {
				$user_id=$r["id"];
                $usuario=$r["tipo_usuario"];
				break;
			}
			if($user_id==null){
				print "<script>alert(\"Acceso invalido.\");window.location='../login.php';</script>";
			}else{
				session_start();
				$_SESSION["user_id"]=$user_id;
                if ($usuario=="admin"){
                    print "<script>window.location='../productos_admin.php';</script>";				
                }else{
				    print "<script>window.location='../index.php';</script>";//
                }
			}
		}
	}
}



?>