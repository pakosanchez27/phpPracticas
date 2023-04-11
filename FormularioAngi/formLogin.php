<?php

require 'includes/config.php';

$mensaje = $_GET['mensaje'];

if($_SERVER['REQUEST_METHOD'] == 'POST'){

  $email  = $_POST['email'];
  $pass = $_POST['pass'];

  $sql = "SELECT * FROM usuarios WHERE email = '$email'";
  // echo $sql;
  $result = $pdo->query($sql);
  $datos = $result->fetch(PDO::FETCH_ASSOC);
  
  if($datos){
    if(password_verify($pass, $datos['pass'])){
      session_start();
      // Llenar el arreglo de la sesion
      $_SESSION['usuario'] = $datos['email'];
      $_SESSION['login'] = true;

      header('Location: /panel.php');

    }else{
      header("location: /formLogin.php?mensaje=1");
    }
  }else{
    header("location: /formLogin.php?mensaje=2");
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
	<form class="formulario" method="POST">
		<h2>Iniciar sesión</h2>

		<label for="email">Correo electrónico</label>
		<input type="email" id="email" name="email" placeholder="Ingresa tu correo electrónico">

		<label for="password">Contraseña</label>
		<input type="password" id="password" name="pass" placeholder="Ingresa tu contraseña">


		<input type="submit" value="Iniciar Sesión">
		<a href="formRegistro.php">Registrarse</a>
		<div class="errores">
        <?php if( intval( $mensaje ) === 1): ?>
              <p class="error"> Datos incorrectos </p>
              <?php elseif( intval( $mensaje ) === 2): ?>
              <p class="error"> Usuario no existe </p>
              <?php endif ?>
          </div>
	</form>

</body>

</html>