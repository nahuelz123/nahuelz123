<?php 

require('fpdf.php');

$pdf = new FPDF("p", "mm","A4");
$pdf->AddPage('landscape');
$pdf->SetFont("Arial","B",10);
$pdf->Cell(50,5, "postulantes joboffert",1,0,"c");
ob_end_clean();
$pdf->Ln(10);

$pdf->Cell(20,5,"studnetId",1,0,"c");
$pdf->Cell(20,5,"CareerId",1,0,"c");
$pdf->Cell(25,5,"FirtName",1,0,"c");
$pdf->Cell(25,5,"LastName",1,0,"c");
$pdf->Cell(20,5,"Dni",1,0,"c");
$pdf->Cell(25,5,"FileNumber",1,0,"c");
$pdf->Cell(20,5,"Gender",1,0,"c");
$pdf->Cell(20,5,"BirtDate",1,0,"c");
$pdf->Cell(50,5,"Email",1,0,"c");
$pdf->Cell(30,5,"PhoneNumber",1,0,"c");

$pdf->SetFont("Arial","",9);
$pdf->Ln(15);

foreach($postulaciones as $studen){

$pdf->Cell(20,5,$studen->getStudentId(),1,0,"c");
$pdf->Cell(20,5,$studen->getCareerId(),1,0,"c");
$pdf->Cell(25,5,$studen->getFirstName(),1,0,"c");
$pdf->Cell(25,5,$studen->getLastName(),1,0,"c");
$pdf->Cell(20,5,$studen->getDni(),1,0,"c");
$pdf->Cell(25,5,$studen->getFileNumber(),1,0,"c");
$pdf->Cell(20,5,$studen->getGender(),1,0,"c");
$pdf->Cell(20,5,$studen->getBirthDate(),1,0,"c");
$pdf->Cell(50,5,$studen->getEmail(),1,0,"c");
$pdf->Cell(30,5,$studen->getPhoneNumber(),1,0,"c");
$pdf->Ln(5);
}

$pdf->Output();



?>