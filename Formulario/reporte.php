<?php

include 'plantilla.php';
require 'includes/config.php';
$db = conectarDB();
$id = $_GET['id'];
$id = filter_var($id, FILTER_VALIDATE_INT);
$tipo = 'Individual';

$sql = "SELECT * FROM datos WHERE id = {$id}";
$result = mysqli_query($db, $sql);
$row = mysqli_fetch_array($result);
// echo $sql;
$id =  $row['id'];
$nombre = utf8_decode( $row['nombre']);
$imagen =  $row['foto'];
$correo = utf8_decode( $row['email']);
$fecha = utf8_decode( $row['fecha']);
$sexo = utf8_decode( $row['sexo']);
$conocimiento = utf8_decode( $row['conocimiento']);
$comentario = utf8_decode( $row['comentario']);



$pdf = new PDF ( ); // Cramos el objeto pdf
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->Image('imagenes/'.$imagen,20,50,30);
$pdf->SetFont('Arial', 'B', 15);
$pdf->SetFillColor(232,232,232);
$pdf->Ln(30);
$pdf->SetY(50);
$pdf->SetX(55);
$pdf->Cell(25,5,'Nombre: ', 0,0,'L',1);
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(30,5, $nombre, 0,0,'L',0);
$pdf->Ln(30);
$pdf->SetFont('Arial', 'B', 15);
$pdf->SetY(60);
$pdf->SetX(55);
$pdf->Cell(20,5,'Correo: ', 0,0,'L',1);
$pdf->SetFont('Arial', '', 12);
$pdf->SetX(80);
$pdf->Cell(30,5,$correo, 0,0,'L',0);
$pdf->Ln(30);
$pdf->SetFont('Arial', 'B', 15);
$pdf->SetY(70);
$pdf->SetX(55);
$pdf->Cell(55, 5 , 'Fecha de Nacimiento: ', 0, 0, 'L',1);
$pdf->SetFont('Arial', '', 12);
$pdf->SetX(110);
$pdf->Cell(30,5,$fecha, 0,0,'L',0);
$pdf->Ln(30);
$pdf->SetFont('Arial', 'B', 15);
$pdf->SetY(80);
$pdf->SetX(55);
$pdf->Cell(15, 5 , 'Sexo:', 0, 0, 'L',1);
$pdf->SetFont('Arial', '', 12);
$pdf->SetX(73);
$pdf->Cell(30,5,$sexo, 0,0,'L',0);
$pdf->Ln(20);

$pdf->Cell(35,5, 'Conocimientos: ', 1,1,'C',1);
$pdf->Ln(10);
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(35,5, $conocimiento, 0,0,'L',0);
$pdf->Ln(20);
$pdf->Cell(35,5, 'Acerca de mi: ', 1,1,'C',1);
$pdf->Ln(10);
$pdf->SetFont('Arial', '', 12);
$pdf->MultiCell(180,5,  $comentario, 0,0,'L',0);
// Largo, alto, Texto, borde, Aniliacion, fondo.


$pdf->Output(); // mostramos la salida 
