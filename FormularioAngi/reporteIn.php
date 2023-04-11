
<?php

session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['usuario'])) {
  // El usuario no ha iniciado sesión, redirigir a la página de inicio de sesión
  header("Location: /formLogin.php");
  exit();
}
include 'plantilla.php';
require 'includes/config.php';


$id = $_GET ['id'];

$sql = "SELECT * FROM registros WHERE id = $id";
$result = $pdo->query($sql);
$row = $result->fetch(PDO::FETCH_ASSOC);

$nombre = utf8_decode($row['nombre']);
$apelldio = utf8_decode($row['apelldio']);
$fecha = utf8_decode($row['fecha']);
$email = utf8_decode($row['email']);
$sexo = utf8_decode($row['sexo']);
$plan = utf8_decode($row['plan']);



// Recuperar los datos del formulario


// Crear un nuevo objeto de la clase FPDF
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

// Establecer el estilo de fuente y color de texto
$pdf->SetFont('Arial', '', 12);
$pdf->SetTextColor(50, 50, 50);

// Agregar el título del documento
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(0, 10, 'Datos del formulario', 0, 1, 'C');

// Agregar los datos del formulario
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(30, 10, 'Nombre:', 0);
$pdf->Cell(0, 10, $nombre, 0, 1);

$pdf->Cell(30, 10, 'Apellido:', 0);
$pdf->Cell(0, 10, $apellido, 0, 1);


$pdf->Cell(30, 10, 'Fecha de nacimiento:', 0);
$pdf->SetX(60);
$pdf->Cell(0, 10, $fecha, 0, 1);

$pdf->Cell(30, 10, 'Email:', 0);
$pdf->Cell(0, 10, $email, 0, 1);

$pdf->Cell(30, 10, 'Sexo:', 0);
$pdf->Cell(0, 10, $sexo, 0, 1);

$pdf->Cell(30, 10, 'Plan:', 0);
$pdf->Cell(0, 10, $plan, 0, 1);

// Establecer el estilo de borde y color de línea
$pdf->SetDrawColor(50, 50, 50);
$pdf->SetLineWidth(0.5);
$pdf->Cell(0, 0, '', 1, 1);

// Enviar el archivo PDF al navegador
$pdf->Output();
?>