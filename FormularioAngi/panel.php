<?php

require 'includes/config.php';

// Trae los registo 
$sql = "SELECT * FROM registros";
$result = $pdo->query($sql);


// Elimina el registro segun el id
$id = $_GET ['id'];

if ($id){
  $query = "DELETE FROM registros WHERE id = $id";
  $eliminar = $pdo->query($query);

  if ($eliminar) {
    header('Location: panel.php?resultado=3');
}
}



?>

<!DOCTYPE html>
<html>

<head>
  <title>Panel de control</title>
  <link rel="stylesheet" href="css/estilos.css">
</head>

<body>
  <div class="header">
    Panel de control
  </div>
  <div class="btnForm">
    <a href="formulario.php" class="btn">Nuevo registro</a>
  </div>
  <div class="container">
    <table>
      <thead>
        <tr>
          <th>Nombre</th>
          <th>Apellido</th>
          <th>Fecha de nacimiento</th>
          <th>Email</th>
          <th>Sexo</th>
          <th>Plan</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <?php while ($row = $result->fetch(PDO::FETCH_ASSOC)) : ?>
          <tr>
            <td><?php echo $row['nombre'] ?></td>
            <td><?php echo $row['apellido'] ?></td>
            <td><?php echo $row['fecha'] ?></td>
            <td><?php echo $row['email'] ?></td>
            <td><?php echo $row['sexo'] ?></td>
            <td><?php echo $row['plan'] ?></td>
            <td class="btns">
              <a href="registro.php?id=<?php echo $row['id'] ?>" class="btn">Ver</a>
              <a href="actualizar.php?id=<?php echo $row['id'] ?>" class="btn">Editar</a>
              <a href="panel.php?id=<?php echo $row['id'] ?>" class="btn">Eliminar</a>
              <a href="reporteIn.php?id=<?php echo $row['id'] ?>" class="btn">PDF</a>
            </td>
          </tr>
        <?php endwhile ?>
      </tbody>
    </table>
    <div class="btnReporte">
      <a href="reporteG.php" class="btn">Generar reporte</a>
    </div>
  </div>
</body>

</html>