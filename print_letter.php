<?php
require('fpdf/fpdf.php'); //load fpdf class
include("connection.php"); // connection to database
$icno = $_GET['icno']; // get ic number
$sql = mysqli_query($connection, "SELECT * FROM student WHERE icno='$icno'"); // query for select member by ic number
if(mysqli_num_rows($sql) == 0){
header("Location: member_profile.php");
}else{
$row = mysqli_fetch_assoc($sql);
}
$name = $row['name'];
$status = $row['status'];
$address = $row['address'];
$position = $row['position'];
$class = $row['class'];
$currentDate = date("j/n/Y");
// Create your class instance
$pdf = new FPDF();
// Set up the default page margins for your PDF
// The parameters are margin left, margin top, margin right (units used are mm)
$pdf->SetMargins(20, 20, 20);
// SetAutoPageBreak function will create a new page if our content exceeds the page limit. 0 stands for margin from bottom of the page before breaking.
$pdf->SetAutoPageBreak(true, 0);
//add our first page to the PDF - this is also used to add any additional pages.
$pdf->AddPage();
//add image
$pdf->Image('assets/img/logo.png',20,20,30);
// Arial bold 15
$pdf->SetFont('Arial','B',14);
// Move to the right
$pdf->Cell(35);
// Title
$pdf->Cell(80,5,'Arau High School Computer Club',0,0);
// Line break
$pdf->Ln(10);
// Move to the right
$pdf->Cell(35);
$pdf->Cell(50,5,'02600 Arau, Perlis',0,0);
// Line break
$pdf->Ln(10);
// Move to the right
$pdf->Cell(35);
$pdf->Cell(50,5,'Tel : 04-9882222',0,0);
// Line break
$pdf->Ln(15);
$pdf->Cell(0,0,'','B');
$pdf->Ln(5);
$pdf->SetFont('Times','',12);
$pdf->Cell(40,5,$currentDate,0,1);
$pdf->Cell(40,10,$name,0,1);
$pdf->MultiCell(80,20,$address,0,1);
$pdf->SetFont('Times','B',12);
$pdf->Cell(0,10,'MEMBERSHIP APPROVAL',0,1);
$pdf->SetFont('Times','',12);
$pdf->MultiCell(0,10,'This letter will serve as acknowledgement that membership request has been approved by the club for the student as stated below:',0,1);
$pdf->SetFont('Times','B',12);
$pdf->Cell(35);
$pdf->Cell(40,10,'Name :',1,0,'R');
$pdf->Cell(40,10,$name,1,1);
$pdf->Cell(35);
$pdf->Cell(40,10,'IC Number :',1,0,'R');
$pdf->Cell(40,10,$icno,1,1);
$pdf->Cell(35);
$pdf->Cell(40,10,'Class :',1,0,'R');
$pdf->Cell(40,10,$class,1,1);
$pdf->Cell(35);
$pdf->Cell(40,10,'Position :',1,0,'R');
$pdf->Cell(40,10,$position,1,1);
$pdf->Cell(35);
$pdf->Cell(40,10,'Status :',1,0,'R');
$pdf->Cell(40,10,$status,1,1);
$pdf->SetFont('Times','',12);
$pdf->Cell(0,10,'Please contact us for any enqueries',0,1);
$pdf->Cell(40,10,'Regards,',0,0);
// Line break
$pdf->Ln(20);
$pdf->Cell(40,10,'IKMAL ARIEF',0,1);
$pdf->Cell(40,10,'President,',0,1);
$pdf->Output();
?>