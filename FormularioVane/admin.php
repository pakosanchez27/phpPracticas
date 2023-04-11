<?php
session_start();
if (!isset($_SESSION["usuario"])) {
  header("Location: login.php");
  exit;
}

require 'includes/config.php';

$sql = "SELECT * FROM formulario";
$reslt = $pdo->query($sql);

$id = $_GET['id'];
if ($id){
    $query = $pdo->query("DELETE FROM formulario WHERE id = $id");
    header("location: /admin.php");
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Dashboard</title>
  <link rel="stylesheet" href="css/dashboard.css">
</head>
<body>
  <header>
    <h1>Dashboard</h1>
    <nav>
      <ul>
        <li><a href="formulario.php">Nuevo registro</a></li>
        <li><a href="pdfGeneral.php">Generar reporte</a></li>
        <li><a href="cerrar.php">Cerrar sesión</a></li>
      </ul>
    </nav>
  </header>
  <main>
    <table>
      <thead>
        <tr>
          <th>Nombre</th>
          <th>Apellido</th>
          <th>Correo</th>
          <th>Sexo</th>
          <th>Carrera</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>

        <?php while ($datos = $reslt->fetch(PDO::FETCH_ASSOC)) : ?>
        <tr>
          <td><?php echo $datos['nombre'] ?></td>
          <td><?php echo $datos['apellido'] ?></td>
          <td><?php echo $datos['correo'] ?></td>
          <td><?php echo $datos['sexo'] ?></td>
          <td><?php echo $datos['carrera'] ?></td>
          <td>
            <a href="ver.php?id=<?php echo $datos['id'] ?>">Ver</a>
            <a href="pdfIndividual.php?id=<?php echo $datos['id'] ?>">PDF</a>
            <a href="editar.php?id=<?php echo $datos['id'] ?>">Editar</a>
            <a href="admin.php?id=<?php echo $datos['id'] ?>">Eliminar</a>
          </td>
        </tr>
        <?php endwhile; ?>
        <!-- Aquí irían los demás registros -->
      </tbody>
    </table>
  </main>
  <footer>
    <p>Derechos reservados Vanessa© 2023</p>
  </footer>
</body>
</html>
