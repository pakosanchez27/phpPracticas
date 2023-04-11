<?php
require 'includes/config.php';

// Verifica si se recibieron los datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	// Obtiene los valores de los campos del formulario
	$nombre = $_POST["nombre"];
	$email = $_POST["email"];
	$password = $_POST["contrasena"];
	$hash = password_hash($password, PASSWORD_DEFAULT);
	// Prepara la consulta SQL para insertar un nuevo registro en la tabla
	$sql = "INSERT INTO usuarios (nombre, email, password) VALUES ('$nombre', '$email', '$hash')";
	// echo $sql;
	// Ejecuta la consulta SQL


	if ($pdo->query($sql)) {
		header("Location: /formLogin.php");
	}
}
?>

<!DOCTYPE html>
<html>

<head>
	<title>Formulario de registro</title>
	<link rel="stylesheet" type="text/css" href="css/login.css">
</head>

<body>
	<form class="formulario" method="POST">
		<h2>Registro</h2>
		<label for="nombre">Nombre</label>
		<input type="text" id="nombre" name="nombre" placeholder="Ingresa tu nombre">

		<label for="email">Correo electrónico</label>
		<input type="email" id="email" name="email" placeholder="Ingresa tu correo electrónico">

		<label for="password">Contraseña</label>
		<input type="password" id="password" name="password" placeholder="Ingresa tu contraseña">

		<input type="submit" value="Registrarse">
		<a href="formLogin.php">Iniciar sesión</a>
	</form>


	</div>
</body>

</html>