<?php

require 'includes/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  $nombre = $_POST['nombre'];
  $apellido = $_POST['apellido'];
  $email = $_POST['email'];
  $fecha = $_POST['fecha'];
  $sexo = $_POST['sexo'];
  $plan = $_POST['plan'];

 $sql = "INSERT INTO registros (nombre,apellido,email,fecha,sexo,plan) VALUES ('$nombre', '$apellido', '$email', '$fecha', '$sexo', '$plan')";
 $result = $pdo->query($sql);
// echo $sql;

header('Location: panel.php?result=1');
  
}

?>


<!DOCTYPE html>
<html>
<head>
  <title>Formulario de registro</title>
  <link rel="stylesheet" href="css/estilos.css">
</head>
<body class="body-formulario">
  <form method="POST" action="/formulario.php">
    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre" required>
    
    <label for="apellido">Apellido:</label>
    <input type="text" id="apellido" name="apellido" required>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>
    
    <label for="fecha_nacimiento">Fecha de nacimiento:</label>
    <input type="date" id="fecha_nacimiento" name="fecha" required>
    
    
    
    <label for="sexo">Sexo:</label>
    <select id="sexo" name="sexo" required>
      <option value="">Seleccione su género</option>
      <option value="masculino">Masculino</option>
      <option value="femenino">Femenino</option>
      <option value="otro">Otro</option>
    </select>
    <label>Plan:</label>
    <div class="planes">
      <div class="opc">
        <label for="plan_basico">Básico:</label>
        <input type="radio" id="plan_basico" name="plan" value="basico">
      </div>
       <div class="opc">
        <label for="plan_intermedio">Intermedio:</label>
        <input type="radio" id="plan_intermedio" name="plan" value="intermedio">
       </div>
        <div class="opc">
          <label for="plan_premium">Premium:</label>
          <input type="radio" id="plan_premium" name="plan" value="premium">
        </div>

        
        
    </div>
   
    <div>
      <button type="reset">Limpiar</button>
      <button
      type="submit">Enviar</button>
    </div>
</form>
</body>
</html>