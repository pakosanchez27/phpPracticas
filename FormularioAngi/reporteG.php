<?php 

include 'plantilla.php';
require 'includes/config.php';



// Trae los registo 
$sql = "SELECT * FROM registros";
$result = $pdo->query($sql);


$pdf = new PDF('L');
$pdf->AliasNbPages();
$pdf->AddPage();

// Agregar el encabezado de la tabla
$pdf->SetFont('Arial','B',12);
$pdf->SetFillColor(230, 230, 230);
$pdf->SetTextColor(0,0,0);
$pdf->SetDrawColor(0,0,0);
$pdf->SetLineWidth(0.2);
$pdf->Cell(20,10,'ID',1,0,'C',1);
$pdf->Cell(40,10,'Nombre',1,0,'C',1);
$pdf->Cell(40,10,'Apellido',1,0,'C',1);
$pdf->Cell(40,10,'Fecha',1,0,'C',1);
$pdf->Cell(50,10,'Email',1,0,'C',1);
$pdf->Cell(30,10,'Sexo',1,0,'C',1);
$pdf->Cell(30,10,'Plan',1,0,'C',1);
$pdf->Ln();

// Agregar los registros de la tabla
$pdf->SetFont('Arial','',12);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0,0,0);
$pdf->SetDrawColor(0,0,0);
$pdf->SetLineWidth(0.2);
while ($registro = $result->fetch(PDO::FETCH_ASSOC)) {
$pdf->Cell(20,10,$registro['id'],1,0,'C',1);
$pdf->Cell(40,10,$registro['nombre'],1,0,'C',1);
$pdf->Cell(40,10,$registro['apellido'],1,0,'C',1);
$pdf->Cell(40,10,$registro['fecha'],1,0,'C',1);
$pdf->Cell(50,10,$registro['email'],1,0,'C',1);
$pdf->Cell(30,10,$registro['sexo'],1,0,'C',1);
$pdf->Cell(30,10,$registro['plan'],1,0,'C',1);
$pdf->Ln();
}

// Enviar el archivo PDF al navegador
$pdf->Output();
?>