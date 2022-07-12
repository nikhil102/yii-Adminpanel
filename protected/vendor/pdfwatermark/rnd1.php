<?php
require_once('fpdf.php');
require_once('fpdi.php');
require_once('pdfwatermarker/pdfwatermarker.php');
require_once('pdfwatermarker/pdfwatermark.php');



$watermark = new PDFWatermark('/var/www/wmk/watermark.png'); 

//Specify the path to the existing pdf, the path to the new pdf file, and the watermark object
$watermarker = new PDFWatermarker('/var/www/wmk/format.pdf','/var/www/wmk/formats.pdf',$watermark); 



//Set the position
$watermarker->setWatermarkPosition('center');

//Save the new PDF to its specified location
$watermarker->watermarkPdf(); 
echo "success";
