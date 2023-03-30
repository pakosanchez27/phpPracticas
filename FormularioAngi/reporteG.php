<?php 

include 'plantilla.php';
require 'includes/config.php';



// Trae los registo 
$sql = "SELECT * FROM registros";
$result = $pdo->query($sql);
$registro = $result->fetch(PDO::FETCH_ASSOC);

$id = $registro['id'];
$nombre = $registro['nombre'];
$apellido = $registro['apellido'];
$fecha = $registro['fecha'];
$email = $registro['email'];
$sexo = $registro['sexo'];
$plan = $registro['plan'];


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
foreach ($registro as $registro) {
$pdf->Cell(20,10,$id,1,0,'C',1);
$pdf->Cell(40,10,$nombre,1,0,'C',1);
$pdf->Cell(40,10,$apellido,1,0,'C',1);
$pdf->Cell(40,10,$fecha,1,0,'C',1);
$pdf->Cell(50,10,$email,1,0,'C',1);
$pdf->Cell(30,10,$sexo,1,0,'C',1);
$pdf->Cell(30,10,$plan,1,0,'C',1);
$pdf->Ln();
}

// Enviar el archivo PDF al navegador
$pdf->Output();
?>