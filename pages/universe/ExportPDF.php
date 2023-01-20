<?php
include "../../build/php/Records.php";
include "../../build/php/Database.php";


// $database = new Databases();
// $db = $database->getConnection();
// $record = new Records($db);
// echo $record->pdfRecord();


include "FPDF184/fpdf.php";

$database = new Databases();
$db = $database->getConnection();
$record = new Records($db);
$res = $record->pdfRecord($_GET['id']);

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','',16);
$pdf->Image('FPDF184/EMBLOGO.jpg', 10, 10, -180);
$pdf->Ln(18);



foreach($res as $value) {
    $pdf->Write(5,$value);
}

$pdf->Output();




?>
<!-- <script src="../../build/js/ajax.js"></script> -->

