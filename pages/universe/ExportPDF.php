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
$pdf->SetFont('Arial','',12);
$pdf->Image('FPDF184/EMBLOGO.jpg', 10, 10, -180);
$pdf->Ln(30);


$array = array($res);
foreach($array as $value) {
    // $pdf->Write(5,$value);
    // var_dump($value);
    $pdf->Write(3,'Report Control: ');
    $pdf->Write(3,$value["Reportcontrol"]);
    $pdf->Ln(5);
    $pdf->Write(3,'Establishment Name: ');
    $pdf->Write(3,$value["ProjectName"]);


}

$pdf->Output();

?>
<!-- <script src="../../build/js/ajax.js"></script> -->

