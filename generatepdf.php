<?php
require('fpdf/fpdf.php');

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('helvetica','B',16);

$pdf->Image('fpdf/cardf.jpg', 85, 5, 40, '', 'JPG', '', 'T', false, 400, 'C', false, false, 0, false, false, false);
$pdf->Ln();

$pdf->Cell(0, 10, "MINISTRY OF FINANCE, PLANNING AND ECONOMIC DEVELOPMENT", 0, 0, 'C');
$pdf->Ln();

$pdf->Cell(0, 10, "VERIFIED PENSION DATABASE", 0, 0, 'C');
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->output();
?>