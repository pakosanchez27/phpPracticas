<?php
session_start();
if (!isset($_SESSION["usuario"])) {
  header("Location: login.php");
  exit;
}

require 'includes/config.php';


$id = $_GET['id'];

$sql = "SELECT * FROM formulario WHERE id = $id ";
$result = $pdo->query($sql);
$dato = $result->fetch(PDO::FETCH_ASSOC);

$nombre = $dato['nombre'];
$apellido = $dato['apellido'];
$correo = $dato['correo'];
$sexo = $dato['sexo'];
$carrera = $dato['carrera'];


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

 

  // Validar los datos recibidos
  $errores = [];

  if (empty($_POST['nombre'])) {
    $errores[] = 'El campo "Nombre" es obligatorio';
  }

  if (empty($_POST['apellido'])) {
    $errores[] = 'El campo "Apellido" es obligatorio';
  }

  if (empty($_POST['correo'])) {
    $errores[] = 'El campo "Correo" es obligatorio';
  } else if (!filter_var($_POST['correo'], FILTER_VALIDATE_EMAIL)) {
    $errores[] = 'El correo electrónico no es válido';
  }

  if (empty($_POST['sexo'])) {
    $errores[] = 'El campo "Sexo" es obligatorio';
  }

  if (empty($_POST['carrera'])) {
    $errores[] = 'El campo "Carrera" es obligatorio';
  }

  if (empty($errores)) {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $correo = $_POST['correo'];
    $sexo = $_POST['sexo'];
    $carrera = $_POST['carrera'];
     
  $query = "UPDATE formulario SET   nombre = '$nombre', apellido = '$apellido', correo = '$correo', sexo = '$sexo', carrera = '$carrera' WHERE id = $id";
  echo $query;
  $insertar = $pdo->query($query);
    if ($insertar){
      header("Location: /admin.php");
    }
  }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
    <link rel="stylesheet" href="css/form.css">
</head>
<body>
    <div class="form-container">
        <form method="POST">
          <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" value="<?php echo $nombre ?>">
          </div>
      
          <div class="form-group">
            <label for="apellido">Apellido:</label>
            <input type="text" id="apellido" name="apellido" value="<?php echo $apellido ?>">
          </div>
      
          <div class="form-group">
            <label for="correo">Correo:</label>
            <input type="email" id="correo" name="correo" value="<?php echo $correo ?>">
          </div>
      
          <div class="form-group">
            <label for="sexo">Sexo:</label>
            <select id="sexo" name="sexo">
              <option value="<?php echo $sexo?>"> <?php echo $sexo ?></option>
              <option value="masculino">Masculino</option>
              <option value="femenino">Femenino</option>
              <option value="otro">Otro</option>
            </select>
          </div>
      
          <div class="form-group">
            <label for="carrera">Carrera:</label>
            <input type="text" id="carrera" name="carrera" value="<?php echo $carrera ?>">
          </div>
      
          <div class="buttons">
            <input type="submit" value="Acutalizar">
            
          </div>

          <?php foreach($errores as $error): ?>
           <div class="alerta error">
            <p><?php echo $error; ?></p> 
            </div>
        <?php endforeach; ?>
        </form>
      </div>
      
      
</body>
</html>