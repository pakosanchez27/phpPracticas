<?php

require 'includes/config.php';

$id = $_GET ['id'];

$sql = "SELECT * FROM registros WHERE id = $id";
$result = $pdo->query($sql);
$row = $result->fetch(PDO::FETCH_ASSOC);

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Detalle de registro</title>
    <link rel="stylesheet" href="css/registro.css">
</head>
<body>
    <div class="container">
        <h1>Detalle de registro</h1>
        <div class="registro">
            <h2>Registro <?php echo $row['id'] ?></h2>
            <ul>
                <li><span>Nombre:</span> <?php echo $row['nombre'] ?></li>
                <li><span>Apellido:</span> <?php echo $row['apellido'] ?></li>
                <li><span>Fecha de nacimiento:</span> <?php echo $row['fecha'] ?></li>
                <li><span>Email:</span> <?php echo $row['email'] ?></li>
                <li><span>Sexo:</span> <?php echo $row['sexo'] ?></li>
                <li><span>Plan:</span> <?php echo $row['plan'] ?></li>
            </ul>
            <a href="panel.php" class="button">Regresar al panel</a>
        </div>
    </div>
</body>
</html>
