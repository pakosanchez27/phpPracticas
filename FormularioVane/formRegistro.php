<?php

require 'includes/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  $nombre = $_POST['nombre'];
  $correo = $_POST['correo'];
  $pass = $_POST['pass'];
  $passHash = password_hash($pass, PASSWORD_DEFAULT);

  $sql = "insert into usuarios (nombre,correo,contrasena) values ('$nombre', '$correo','$passHash')"; 
  //  echo $sql;
  $result = $pdo->query($sql); 

  if ($result) {

    header("Location: /login.php");      
  }


}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="css/login.css">
</head>

<body>
    <form method="POST">
        <h2>Registro</h2>
        <div>
          <label for="nombre">Nombre:</label>
          <input type="text" id="nombre" name="nombre" required>
        </div>
        <div>
          <label for="correo">Correo electrónico:</label>
          <input type="email" id="correo" name="correo" required>
        </div>
        <div>
          <label for="contraseña">Contraseña:</label>
          <input type="password" id="contraseña" name="pass" required>
        </div>
        <div>
          <button type="submit">Registrarse</button>
        </div>
        <p>¿Ya tienes una cuenta? <a href="login.php">Inicia Sesión</a></p>
      </form>
      
</body>
</html>