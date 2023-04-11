<?php
session_start();
if (!isset($_SESSION["usuario"])) {
  header("Location: login.php");
  exit;
}

require('fpdf/fpdf.php');
require 'includes/config.php';

$sql = "SELECT * FROM formulario";
$reslt = $pdo->query($sql);
// $datos = $reslt->fetch(PDO::FETCH_ASSOC);

// Crea una instancia de FPDF
$pdf = new FPDF('l');

// Agrega una nueva página
$pdf->AddPage();

// Agrega el título
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(0, 10, 'Reporte General', 0, 1, 'C');

// Agrega una tabla con los registros
$pdf->SetFont('Arial', '', 12);
$pdf->SetFillColor(220, 220, 220);
$pdf->Cell(30, 10, 'ID', 1, 0, 'C', true);
$pdf->Cell(50, 10, 'Nombre', 1, 0, 'C', true);
$pdf->Cell(50, 10, 'Apellido', 1, 0, 'C', true);
$pdf->Cell(70, 10, 'Correo Electrónico', 1, 0, 'C', true);
$pdf->Cell(30, 10, 'Sexo', 1, 0, 'C', true);
$pdf->Cell(70, 10, 'Carrera', 1, 1, 'C', true);

$pdf->SetFont('Arial', '', 10);
//Aquí obtienes los registros de la base de datos y los recorres
//suponiendo que tienes los registros en la variable $registros

foreach($reslt as $registro){
    $pdf->Cell(30, 10, $registro['id'], 1, 0, 'C');
    $pdf->Cell(50, 10, $registro['nombre'], 1, 0, 'L');
    $pdf->Cell(50, 10, $registro['apellido'], 1, 0, 'L');
    $pdf->Cell(70, 10, $registro['correo'], 1, 0, 'L');
    $pdf->Cell(30, 10, $registro['sexo'], 1, 0, 'C');
    $pdf->Cell(70, 10, $registro['carrera'], 1, 1, 'L');
}

// Agrega los estilos
$pdf->SetMargins(20, 20, 20);
$pdf->SetAutoPageBreak(true, 20);

// Genera el PDF
$pdf->Output();
?>
