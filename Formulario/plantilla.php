<?php
require 'fpdf/fpdf.php'; 

class PDF extends FPDF{
    
    function header() {
        $date = date('d-m-Y');
        $this->Image('src/img/logo.png', 10, 5, 20);
        $this->SetFont('Arial', 'B', 18);
        $this->Cell(30);
        $this->SetX(50);
        $this->Cell(110, 10, 'Reporte ' ,1,0,'C');
        $this->SetFont('Arial', '', 15);
        $this->SetX(180);
        $this->Cell(10, 10, $date ,0,0,'C');
        $this->Ln(20);
    }


    function footer() {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'Pagina '. $this->PageNo() . '/{nb}',0,0,'C');
    }
}



?>