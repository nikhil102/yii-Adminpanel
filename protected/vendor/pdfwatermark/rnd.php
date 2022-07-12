<?php
require_once('fpdf.php');
require_once('fpdi.php');
require_once('pdfwatermarker/pdfwatermarker.php');
require_once('pdfwatermarker/pdfwatermark.php');

// initiate FPDI
//$pdf = new FPDI();
//// add a page
//$pdf->AddPage();
//// set the source file
//$pdf->setSourceFile("branch.pdf");
//echo "<pre>";
//print_r($pdf);
//exit();
//// import page 1
//$tplIdx = $pdf->importPage(1);
//
//// use the imported page and place it at point 10,10 with a width of 100 mm
//$pdf->useTemplate($tplIdx, 10, 10, 190);
//
//// now write some text above the imported page
//$pdf->SetFont('Helvetica');
//$pdf->SetTextColor(255, 0, 0);
//$pdf->SetXY(30, 30);
//$pdf->Write(0, 'This is just a simple text');
//
//$pdf->Output();
//$pdf = new FPDI();
$pdf=new FPDF();
$pdf-> open('/var/www/wmk/branch.pdf');
$pdf-> pdfreplace("[account_no]","new string");

//$watermark = new PDFWatermark('/var/www/wmk/ww.png'); 
//
////Specify the path to the existing pdf, the path to the new pdf file, and the watermark object
//$watermarker = new PDFWatermarker('/var/www/wmk/branch.pdf','/var/www/wmk/branchs.pdf',$watermark); 
//
////Set the position
//$watermarker->setWatermarkPosition('center');
//
////Save the new PDF to its specified location
//$watermarker->watermarkPdf(); 
echo "success";
