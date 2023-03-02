<?php
include "../../build/php/Records.php";
include "../../build/php/Database.php";
include "FPDF184/fpdf.php";
include "dompdf/autoload.inc.php";

$database = new Databases();
$db = $database->getConnection();
$record = new Records($db);
$res = $record->pdfRecord($_GET['id']);

$pdf = new FPDF('p','mm','legal');
$pdf->AddPage();
$pdf->SetFont('Arial','',11);
$pdf->Image('FPDF184/EMBLOGO.jpg', 10, 10, -178);
$pdf->Ln(30);
$pdf->SetAutoPageBreak(true);

$array = array($res);
foreach($array as $value) {

    $pdf->Cell(0,0,'Report Control Number: '.$value["Reportcontrol"].' ',0);
    $pdf->Ln(5);
    $pdf->Cell(0,0,'Date of Inspection: '.$value["DateofInspection"].' ',0);
    $pdf->Ln(5);
    $pdf->Cell(0,0,'Mission Order Number: '.$value["MissionOrder"].' ',0);
    $pdf->SetDrawColor(50,0,0);
    $pdf->Ln(10);
    $pdf->SetFont('Arial','B',12);
    $pdf->Write(1,"1. GENERAL INFORMATION");
    $pdf->Ln(6);
    $pdf->SetFont('Arial','',11);
    $pdf->SetXY(10, 65);
    $pdf->MultiCell(0,7,'Applicable Environmental Laws: (Pls. check box)
PD1586.Checked??    RA6969.Checked??     RA8749.Checked??    RA9275.Checked??     RA9003.Checked??','1','T');
    $pdf->SetXY(10, 79);
    $pdf->MultiCell(70,7,'Name of Establishment: ',1,0);
    $pdf->SetXY(80, 79);
    $pdf->SetFont('Arial','B',11);
    $pdf->MultiCell(0,7,''.$value["ProjectName"].' ',1,0);
    $pdf->SetXY(10, 86);
    $pdf->SetFont('Arial','',11);
    $pdf->MultiCell(70,7,'Address: ',1,0);
    $pdf->SetXY(80, 86);
    $pdf->SetFont('Arial','B',11);
    $pdf->MultiCell(126,7,''.$value["SpecificAddress"].', '.$value["Municipality"].', '.$value["Province"].' ',1,0);
    $pdf->SetXY(10, 93);
    $pdf->SetFont('Arial','',11);
    $pdf->MultiCell(70,10,'Nature of Business: ',1,0);
    $pdf->SetXY(80, 93);
    $pdf->SetFont('Arial','B',11);
    $pdf->MultiCell(65,10,''.$value["NatureofBusiness"].' ',1,0);
    $pdf->SetXY(145, 93);
    $pdf->SetFont('Arial','',11);
    $pdf->MultiCell(0,5,'Coordinates:                              '.$value["Latitude"].', '.$value["Longitude"].' ',1,0);
    $pdf->SetXY(10, 103);
    $pdf->MultiCell(70,12,'PSIC Code: ',1,0);
    $pdf->SetXY(32, 103);
    $pdf->SetFont('Arial','B',11);
    $pdf->MultiCell(70,12,$value["PSIC"].'',0,0);
    $pdf->SetXY(80, 103);
    $pdf->SetFont('Arial','',11);
    $pdf->MultiCell(65,12,'Product: '.' ',1,'J');
    $pdf->SetXY(98, 104);
    $pdf->SetFont('Arial','B',11);
    $pdf->MultiCell(45,5, $value["Product"]. ''.' ',0,'J');
    $pdf->SetXY(145, 103);
    $pdf->SetFont('Arial','',11);
    $pdf->MultiCell(0,12, 'Year Established: ' . ''.' ',1,'J');
    $pdf->SetXY(178, 103);
    $pdf->SetFont('Arial','B',11);
    $pdf->MultiCell(0,12,  $value["YearEstablished"]. ''.' ',0,'J');
    $pdf->SetXY(10, 115);
    $pdf->SetFont('Arial','',11);
    $pdf->MultiCell(70,12,'Operating hours/day: ',1,0);
    $pdf->SetXY(80, 115);
    $pdf->SetFont('Arial','',11);
    $pdf->MultiCell(65,12,'Operating days/week: '.' ',1,'J');
    $pdf->SetXY(145, 115);
    $pdf->SetFont('Arial','',11);
    $pdf->MultiCell(61,12, 'Operating days/year: '.' ',1,'J');
    $pdf->SetXY(10, 200);
    $pdf->SetFont('Arial','',11);
    $pdf->Cell(0,0,'Approved By: ',0);
    $pdf->SetXY(10, 205);
    $pdf->Cell(0,0,''.$value["SectionChief"].' ',0);
    $pdf->SetXY(10, 210);
    $pdf->Cell(0,0, 'Chief WAQMS '.' ','','J');
    $pdf->SetXY(10, 235);
    $pdf->SetFont('Arial','',11);
    $pdf->Cell(0,0,'Checked By: ',0);
    $pdf->SetXY(10, 240);
    $pdf->Cell(0,0,''.$value["DivisionChief"].' ',0);
    $pdf->SetXY(10, 245);
    $pdf->Cell(0,0, 'Chief Environmental Enforcement Division '.' ','','J');
    $pdf->SetXY(10, 270);
    $pdf->Cell(0,0,''.$value["RegionalDirector"].' ',0);
    $pdf->SetXY(10, 275);
    $pdf->Cell(0,0, 'Regional Director '.' ','','J');
    $pdf->SetXY(10, 300);
    $pdf->Cell(0,0,''.$value["ECC_Condition"].' ',0);

}

$pdf->SetTitle($value["ProjectName"]);
$pdf->Output();
?>


