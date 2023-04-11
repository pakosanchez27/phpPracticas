<?php
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['usuario'])) {
  // El usuario no ha iniciado sesión, redirigir a la página de inicio de sesión
  header("Location: /formLogin.php");
  exit();
}
require 'includes/config.php';

$id = $_GET ['id'];

$sql =  "SELECT * FROM registros WHERE id = {$id}";
$result = $pdo->query($sql);
$row = $result->fetch(PDO::FETCH_ASSOC);

$nombre = $row['nombre'];
$apellido = $row['apellido'];
$fecha = $row['fecha'];
$email = $row['email'];
$sexo =$row['sexo'];
$plan = $row['plan'];

if($_SERVER["REQUEST_METHOD"] == "POST"){

  $nombre = $_POST['nombre'];
  $apellido = $_POST['apellido'];
  $email = $_POST['email'];
  $fecha = $_POST['fecha'];
  $sexo = $_POST['sexo'];
  $plan = $_POST['plan'];


$query = "UPDATE registros SET nombre='$nombre',apellido ='$apellido',fecha='$fecha', email='$email', sexo='$sexo', plan='$plan'  WHERE id={$id} ";  
echo $query;

$insertar = $pdo->query($query);

if ($insertar) {

  header('Location: /panel.php?resultado=2');

}


}



?>



<!DOCTYPE html>
<html>
<head>
  <title>Formulario de registro</title>
  <link rel="stylesheet" href="css/estilos.css">
</head>
<body class="body-formulario">
  <form method="POST" >
    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre"  value="<?php echo $nombre ?>">
    
    <label for="apellido">Apellido:</label>
    <input type="text" id="apellido" name="apellido"  value="<?php echo $apellido ?>">

    <label for="email">Email:</label>
    <input type="email" id="email" name="email"  value="<?php echo $email?>">
    
    <label for="fecha_nacimiento">Fecha de nacimiento:</label>
    <input type="date" id="fecha" name="fecha"  value="<?php echo $fecha ?>">
    
    
    
    <label for="sexo">Sexo:</label>
    <select id="sexo" name="sexo" >
      
      <option value="<?php echo $sexo ?>"><?php echo $sexo ?></option>
      <option value="masculino">Masculino</option>
      <option value="femenino">Femenino</option>
      <option value="otro">Otro</option>
    </select>
    <label>Plan:</label>
    <div class="planes">
      
        <label for="plan_basico">Básico:</label>
        <input type="radio" id="plan_basico" name="plan" value="basico">
        <label for="plan_intermedio">Intermedio:</label>
        <input type="radio" id="plan_intermedio" name="plan" value="intermedio">
        <label for="plan_premium">Premium:</label>
        <input type="radio" id="plan_premium" name="plan" value="premium">
        
        
    </div>
   
    <div>
      <input type="submit" value="Actualizar">
    </div>
</form>
</body>
</html>