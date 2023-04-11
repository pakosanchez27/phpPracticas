<?php

require 'includes/config.php';

$mensaje = $_GET['mensaje'];

if($_SERVER['REQUEST_METHOD'] == 'POST'){

  $correo  = $_POST['correo'];
  $pass = $_POST['pass'];

  $sql = "SELECT * FROM usuarios WHERE correo = '$correo'";
  // echo $sql;
  $result = $pdo->query($sql);
  $datos = $result->fetch(PDO::FETCH_ASSOC);
  
  if($datos){
    if(password_verify($pass, $datos['contrasena'])){
      session_start();
      // Llenar el arreglo de la sesion
      $_SESSION['usuario'] = $datos['correo'];
      $_SESSION['login'] = true;

      header('Location: /admin.php');

    }else{
      header("location: /login.php?mensaje=1");
    }
  }else{
    header("location: /login.php?mensaje=2");
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <form method="POST">
        <h2>Iniciar sesión</h2>
        <div>
          <label for="correo">Correo electrónico:</label>
          <input  type="email" id="correo" name="correo" required>
        </div>
        <div>
          <label for="contraseña">Contraseña:</label>
          <input type="password" id="contraseña" name="pass" required>
        </div>
        <div>
          <button type="submit">Iniciar sesión</button>
        </div>
        <p>¿No tienes una cuenta? <a href="formRegistro.php">Regístrate aquí</a></p>
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