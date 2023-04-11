<?php

session_start();
if (!isset($_SESSION["usuario"])) {
  header("Location: login.php");
  exit;
}

require('fpdf/fpdf.php');
require 'includes/config.php';

$id = $_GET['id'];

$sql = "SELECT * FROM formulario WHERE id = $id ";
$result = $pdo->query($sql);
$dato = $result->fetch(PDO::FETCH_ASSOC);

// Crea una instancia de FPDF
$pdf = new FPDF();

// Agrega una nueva página
$pdf->AddPage();

// Agrega el título
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(0, 10, 'Detalle del Registro', 0, 1, 'C');

// Agrega los datos del registro
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(30, 10, 'Nombre:', 0);
$pdf->Cell(0, 10, utf8_encode($dato['nombre'])  , 0, 1);
$pdf->Cell(30, 10, 'Apellido:', 0);
$pdf->Cell(0, 10,  utf8_encode($dato['apellido']), 0, 1);
$pdf->Cell(30, 10, 'email:', 0);
$pdf->Cell(0, 10,  utf8_encode($dato['correo']), 0, 1);
$pdf->Cell(30, 10, 'Sexo:', 0);
$pdf->Cell(0, 10, utf8_encode($dato['sexo']), 0, 1);
$pdf->Cell(30, 10, 'Carrera:', 0);
$pdf->Cell(0, 10, utf8_encode($dato['carrera']), 0, 1);



// Agrega los estilos
$pdf->SetTextColor(0, 0, 0);
$pdf->SetFont('Arial', '', 12);
$pdf->SetMargins(20, 20, 20);
$pdf->SetAutoPageBreak(true, 20);
$pdf->SetFillColor(220, 220, 220);

// Genera el PDF
$pdf->Output();
?>
