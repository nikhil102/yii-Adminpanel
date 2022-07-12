<?php
require('rotation.php');

class PDF extends PDF_Rotate
{
function Header()
{
	//Put the watermark
	$this->SetFont('Arial','B',50);
	$this->SetTextColor(255,192,203);
	$this->RotatedText(35,190,'NIKHIL SHINDE',45);
}

function RotatedText($x, $y, $txt, $angle)
{
	//Text rotated around its origin
	$this->Rotate($angle,$x,$y);
	$this->Text($x,$y,$txt);
	$this->Rotate(0);
}
}

//$pdf=new PDF();
//$pdf->AddPage();
////$pdf->setSourceFile('branch.pdf');
//$pdf->SetFont('Arial','',12);
//$txt="FPDF is a PHP class which allows to generate PDF files with pure PHP, that is to say ".
//	"without using the PDFlib library. F from FPDF stands for Free: you may use it for any ".
//	"kind of usage and modify it to suit your needs.\n\n";
//for($i=0;$i<25;$i++) 
//	$pdf->MultiCell(0,5,$txt,0,'J');
//$pdf->Output();

$pdf =& new FPDI();  
$pdf=new PDF();
// add a page
$pdf->AddPage();  
// set the sourcefile  
$pdf->setSourceFile('branch.pdf');  
// import page 1  
$tplIdx = $pdf->importPage(1);  
// use the imported page and place it at point 10,10 with a width of 200 mm   (This is the image of the included pdf)
$pdf->useTemplate($tplIdx, 10, 10, 200);  
// now write some text above the imported page
$pdf->SetTextColor(0,0,255);
 
$pdf->SetFont('Arial','B',8);  
$pdf->SetXY(95, 16);  
$pdf->Write(0, "Mindfire");
$pdf->Output();

?>
