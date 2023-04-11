<?php

require 'includes/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

	  echo "<pre>";
        var_dump($_POST);
        echo "</pre>";
	$email = $_POST['email'];
	$pass = $_POST['password'];

	$sql = "SELECT * FROM usuarios WHERE email = '$email'";
	$result = $pdo->query($sql);
	$datos = $result->fetch(PDO::FETCH_ASSOC);
	$hash = $datos['password'];
	$auth = password_verify($pass, $hash);
	echo '<pre>';
	 var_dump($auth);
	 echo '</pre>';
	 exit();
	if ($datos) {
		if ($auth) {
			echo "password correct";
		} else {
			echo "password incorrect";
		}
	}else{
		echo "no hay email " . $email;
	}
}



?>


<!DOCTYPE html>
<html>

<head>
	<title>Formulario de inicio de sesión</title>
	<link rel="stylesheet" type="text/css" href="css/login.css">
</head>

<body>
	<form class="formulario" method="POST" action="/formLogin.php">
		<h2>Iniciar sesión</h2>

		<label for="email">Correo electrónico</label>
		<input type="email" id="email" name="email" placeholder="Ingresa tu correo electrónico">

		<label for="password">Contraseña</label>
		<input type="password" id="password" name="password" placeholder="Ingresa tu contraseña">


		<input type="submit" value="Iniciar Sesión">
		<a href="formRegistro.php">Registrarse</a>
	</form>

</body>

</html>