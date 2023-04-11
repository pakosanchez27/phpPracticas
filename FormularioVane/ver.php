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


?>

<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Detalle del Registro</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
    }

    h1 {
      color: #008000;
      margin-top: 0;
      padding-top: 2rem;
      text-align: center;
    }

    section {
      max-width: 800px;
      margin: 2rem auto;
      background-color: #fff;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
      padding: 2rem;
      border-radius: 10px;
    }

    dl {
      display: grid;
      grid-template-columns: repeat(2, 1fr);
      grid-gap: 1rem;
      margin: 2rem 0;
    }

    dt {
      font-weight: bold;
      color: #555;
    }

    dd {
      margin-left: 0;
    }

    a {
      display: inline-block;
      margin-top: 1rem;
      color: #fff;
      background-color: #008000;
      padding: 0.5rem;
      border-radius: 4px;
      text-decoration: none;
    }

    a:hover {
      background-color: #006400;
    }
  </style>
</head>
<body>
  <h1>Detalle del Registro</h1>
  <section>
    <dl>
      <dt>Nombre:</dt>
      <dd><?php echo $dato['nombre'] ?></dd>
      <dt>Apellido:</dt>
      <dd><?php echo $dato['apellido'] ?></dd>
      <dt>Correo electrónico:</dt>
      <dd><?php echo $dato['correo'] ?></dd>
      <dt>Sexo:</dt>
      <dd><?php echo $dato['sexo'] ?></dd>
      <dt>Carrera:</dt>
      <dd><?php echo $dato['carrera'] ?></dd>
    </dl>
    <a href="admin.php">regresar</a>
    
  </section>
</body>
</html>
