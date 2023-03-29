<?php

include 'plantilla.php';
require 'includes/config.php';
$db = conectarDB();
$sql = "SELECT * FROM datos";
$result = mysqli_query($db, $sql);



$pdf = new PDF ( 'L', 'mm', 'legal'); // Cramos el objeto pdf
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 12);
$pdf->SetFillColor(232,232,232);
$pdf->Cell(10,10,'id', 1 ,0 ,'C',1);
$pdf->Cell(30,10,'Nombre', 1 ,0 ,'C',1);
$pdf->Cell(30,10,'sexo', 1 ,0 ,'C',1);
$pdf->Cell(70,10,'Email', 1 ,0 ,'C',1);
$pdf->Cell(30,10,'Fecha', 1 ,0 ,'C',1);
$pdf->Cell(70,10,'Conocimiento', 1 ,1,'C',1);
$pdf->SetFont('Arial', 'I', 12);

while ($dato = mysqli_fetch_assoc($result)){
    $pdf->Cell(10,10,$dato['id'], 1 ,0 ,'C',0);
    $pdf->Cell(30,10, utf8_decode( $dato['nombre']), 1 ,0 ,'C',0);
    $pdf->Cell(30,10,$dato['sexo'], 1 ,0 ,'C',0);
    $pdf->Cell(70,10,utf8_decode( $dato['email']), 1 ,0 ,'C',0);
    $pdf->Cell(30,10,$dato['fecha'], 1 ,0 ,'C',0);
    $pdf->Cell(70,10,utf8_decode( $dato['conocimiento']), 1 ,1,'C',0);
};

    
$pdf->Output();
?>