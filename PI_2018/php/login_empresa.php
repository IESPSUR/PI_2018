<?php
session_start(); 
if (isset($_POST['usuario']) and isset($_POST['password'])) {
    include 'connection.php';

	$username = mysqli_real_escape_string($conexion,$_POST['usuario']);
	$password = mysqli_real_escape_string($conexion,$_POST['password']);

	$sql = 'select * from empresa where alias="'.$username.'"';
	$comprobacion=$conexion->query($sql);
	
	if ($comprobacion->num_rows > 0) {
 		$pass = $comprobacion->fetch_array(MYSQLI_ASSOC);
 		print '1-'.$pass['password'].'- '.$username;
		if ($password === $pass['password']) {
			$_SESSION['nombre'] = $username;
            $_SESSION['tipo'] = 'empresa';
			header('location: ../index.php');
		}else{
			print 'password incorrecto<br>
			<a href="../content/form_login_empresa.html">Volver atrás</a>';
		}
		
	}else{
			print 'usuario no correcto <br>
			<a href="../content/form_login_empresa.html">Volver atrás</a>';
	}

}else{
	echo 'login incorrecto';
	header('location: ../content/form_login.php');
}