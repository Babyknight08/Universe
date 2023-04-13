<?php
include "../../build/php/Records.php";
include "../../build/php/Database.php";
include "FPDF184/fpdf.php";
include "dompdf/autoload.inc.php";

use Dompdf\Dompdf;
use Dompdf\Options;

$options = new Options();
$options->set('isRemoteEnabled', true);
$options->set('chroot', realpath(''));
$dompdf = new Dompdf($options);
$database = new Databases();
$db = $database->getConnection();
$record = new Records($db);
$res = $record->pdfRecord($_GET['id']);

$array = array($res);
foreach($array as $value) {

    $output = "";
    $output .= ' <style>
    body {
        font-family: -apple-system, BlinkMacSystemFont, sans-serif;
        font-size: 11pt;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    td {
        height: 18px;
        padding: 5px;
        max-width: 200px;
        word-wrap: break-word;
    }

      input[type="checkbox"][name="LawCitations"] {
        appearance: none;
        -webkit-appearance: none;
        -moz-appearance: none;
        outline: none;
        border: none;
        background-color: transparent;
        width: 20px;
        height: 20px;
        margin-right: 5px;
        position: relative;
      }
      
      input[type="checkbox"][name="LawCitations"]::before {
        content: "";
        display: block;
        width: 100%;
        height: 100%;
        border: 2px solid white;
        box-sizing: border-box;
        position: absolute;
        top: 0;
        left: 0;
        transition: border-color 0.3s ease;
      }
      
      input[type="checkbox"][name="LawCitations"]:checked::before {
        border-color: white;
      }
      
      input[type="checkbox"][name="LawCitations"]:checked::after {
        content: "\2714";
        font-size: 18px;
        color: black;
        display: block;
        position: absolute;
        top: 2px;
        left: 4px;
      }
   
      input[type="checkbox"][name="LawCitations"]::before {
        content: "";
        display: block;
        width: 100%;
        height: 100%;
        border: 2px solid white;
        box-sizing: border-box;
        position: absolute;
        top: 0;
        left: 0;
        transition: border-color 0.3s ease;
      }


    </style>';
    $output .= '<title>'.$value["ProjectName"].'</title>';
    $output .= '<div id="header"><img src="EMBLOGO.jpg" style="width:100%; margin-bottom: 2%;"></div>';
    $output .= 'Report Control Number: ' . $value['Reportcontrol']. '<br>';
    $output .= 'Date of Inspection: '  . date('F d, Y', strtotime($value['DateofInspection'])) .'<br>';
    $output .= 'Mission Order No.: ' . $value['MissionOrder']. '<br>';
    $output .= '<p style="font-size: 16px;font-weight:bold;">1. GENERAL INFORMATION</p>';
    $output .= '<table style="width: 100%;border:1px solid black">';
    $output .= '<tbody>';
    $output .= '<tr>';
    $output .= '<label style="margin-left:1%;">Applicable Environmental Laws: (Pls. check box)</label>';
    $output .= '<tr>';

    $output .= '<tr>';
    $ReportPD1586 = ($value['ReportPD1586'] == "true") ? 'checked' : '';
    $output .= '<div style="display: inline-block;margin-left:7%;padding-top: 12px;"><label><input type="checkbox" name="Laws" '.$ReportPD1586.'></label></div><b>'; 
    $output .= '<div style="display: inline-block;margin-bottom:2.5px;padding-top: 12px;"><label>PD1586</label></div><b>';  
    
    $ReportRA6969 = ($value['ReportRA6969'] == "true") ? 'checked' : '';
    $output .= '<div style="display: inline-block;margin-left:8%;padding-top: 12px;"><label><input type="checkbox" name="Laws" '.$ReportRA6969.'></label></div>'; 
    $output .= '<div style="display: inline-block;margin-bottom:2.5px;padding-top: 12px;"><label>RA6969</label></div>';  

    $ReportRA8749 = ($value['ReportRA8749'] == "true") ? 'checked' : '';
    $output .= '<div style="display: inline-block;margin-left:8%;padding-top: 12px;"><label><input type="checkbox" name="Laws" '.$ReportRA8749.'></label></div>'; 
    $output .= '<div style="display: inline-block;margin-bottom:2.5px;padding-top: 12px;"><label>RA8749</label></div>'; 

    $ReportRA9275 = ($value['ReportRA9275'] == "true") ? 'checked' : '';
    $output .= '<div style="display: inline-block;margin-left:8%;padding-top: 12px;"><label><input type="checkbox" name="Laws" '.$ReportRA9275.'></label></div>'; 
    $output .= '<div style="display: inline-block;margin-bottom:2.5px;padding-top: 12px;"><label>RA9275</label></div>'; 
    
    $ReportRA9003 = ($value['ReportRA9003'] == "true") ? 'checked' : '';
    $output .= '<div style="display: inline-block;margin-left:8%;padding-top: 12px;"><label><input type="checkbox" name="Laws" '.$ReportRA9003.'></label></div>'; 
    $output .= '<div style="display: inline-block;margin-bottom:2.5px;padding-top: 12px;"><label>RA9003</label></div>'; 
    $output .= '</tr>';
    $output .= '</tbody>';
    $output .= '</table>';

     // Table column 2
    $output .= '<table style="width: 100%;">';
    $output .= '<tbody>';
    $output .= '<tr>';
    $output .= '<td style="border-left:1px solid black;border-bottom:1px solid black;border-right:1px solid black;width:33%;">';
    $output .= 'Name of Establishment: ';
    $output .= '</td>';
    $output .= '<td style="border-left:1px solid black;border-bottom:1px solid black;border-right:1px solid black" colspan="2"><b>';
    $output .= $value['ProjectName'];
    $output .= '</td>';
    $output .= '</tr>';

     // Table column 3
    $output .= '<tr>';
    $output .= '<td style="border-left:1px solid black;border-bottom:1px solid black;border-right:1px solid black;width:33%;">';
    $output .= 'Address: ';
    $output .= '</td>';
    $output .= '<td style="border:1px solid black" colspan="2"><b>';
    $output .= $value["SpecificAddress"].', '.$value["Municipality"].', '.$value["Province"];
    $output .= '</td>';
    $output .= '</tr>';

 // Table column 4
    $output .= '<tr>';
    $output .= '<td style="border: 1px solid black;width:33%;">';
    $output .= 'Nature of Business: ';
    $output .= '</td>';
    $output .= '<td style="border:1px solid black;width:33%;"><b>';
    $output .= $value["NatureofBusiness"];
    $output .= '</td>';
    $output .= '<td style="border:1px solid black">';
    $output .= 'Geo Coordinates: <br>';
    $output .= '<b>'.$value["Latitude"].', '.$value["Longitude"];
    $output .= '</td>';
    $output .= '</tr>';
    $output .= '<tr>';
    $output .= '<td style="border: 1px solid black;width:33%;">';
    $output .= 'PSIC: ' . '<b>'. $value['PSICCode']. '<br>';
    $output .= '</td>';
    $output .= '<td style="border:1px solid black;width:33%;">';
    $output .= 'Product: ' .$value['Product']. '<br>';
    $output .= '</td>';
    $output .= '<td style="border:1px solid black;width:33%;">';
    $output .= 'Year Established: ' .date('Y', strtotime($value['YearEstablished'])) .'<br>';
    
    $output .= '</td>';
    $output .= '</tr>';

 // Table column 5
    $output .= '<tr>';
    $output .= '<td style="border: 1px solid black;width:33%;">';
    $output .= 'Operating hours/day: ' . $value['OperatingDay']. '<br>';
    $output .= '</td>';
    $output .= '<td style="border:1px solid black;width:33%;">';
    $output .= 'Operating days/week: ' . $value['OperatingWeek']. '<br>';
    $output .= '</td>';
    $output .= '<td style="border:1px solid black;width:33%;">';
    $output .= 'Operating days/year: ' . $value['OperatingYear']. '<br>';
    $output .= '</td>';
    $output .= '</tr>';
    $output .= '</tbody>';
    $output .= '</table>';




    $output .= '<table style="width: 100%;">';
    $output .= '<tbody><br>';
    $output .= '<tr>';
    $output .= '<td style="border: 1px solid black; width:33.3%;"><center>';
    $output .= 'Product Lines';
    $output .= '</td>';
    $output .= '<td style="border:1px solid black;width:33.3%;"><center>';
    $output .= 'Production Rate as Declared in the ECC (Unit/day)';
    $output .= '</td>';
    $output .= '<td style="border:1px solid black;width:33%;"><center>';
    $output .= 'Actual Production Rate';
    $output .= '</td>';
    $output .= '</tr>';


    $output .= '<tr>';
    $output .= '<td style="border: 1px solid black"><center>';
    $output .= $value["Product_Line"];
    $output .= '</td>';
    $output .= '<td style="border:1px solid black"><center>';
    $output .= $value["ProdRateECCDeclared"];
    $output .= '</td>';
    $output .= '<td style="border:1px solid black"><center>';
    $output .= $value["ActualProdRate"];
    $output .= '</td>';
    $output .= '</tr>';

    $output .= '</tbody>';
    $output .= '</table>' .'<br>';
    $output .= '<table>';
    $output .= '<tbody>';
    $output .= '<tr>';
    $output .= '<td style="border: 1px solid black;width:33.3%">';
    $output .= 'Name of Managing Head ';
    $output .= '</td>';
    $output .= '<td style="border:1px solid black" colspan="2"><b>' ;
    $output .= $value["ManagingHead"];
    $output .= '</td>';
 
    $output .= '</tr>';
    $output .= '<tr>';
    $output .= '<td style="border:1px solid black">';
    $output .= 'Name of PCO';
    $output .= '</td>';
    $output .= '<td style="border:1px solid black" colspan="2">';
    $output .= $value["PCOName"];
    $output .= '</td>';


    $output .= '<tr>';
    $output .= '<td style="border: 1px solid black">';
    $output .= 'PCO Accreditation No.';
    $output .= '</td>';
    $output .= '<td style="border:1px solid black;width:33%;">';
    $output .=  $value['PCOAccreditation']. '<br>';
    $output .= '</td>';
    $output .= '<td style="border:1px solid black;width:33%">';
    $output .= 'Date of Effectivity: ' .date('m-d-Y', strtotime($value['PCOA_Date'])) . '<br>'; 
    $output .= '</td>';
    $output .= '</tr>';

    $output .= '<tr>';
    $output .= '<td style="border: 1px solid black">';
    $output .= 'Phone/Fax';
    $output .= '</td>';
    $output .= '<td style="border:1px solid black">';
    $output .=  $value['ContactNumber']. '<br>';
    $output .= '</td>';
    $output .= '<td style="border:1px solid black;">';
    $output .= 'Email Address: ' . $value['EmailAddress']. '<br>';
    $output .= '</td>';
    $output .= '</tr>';
    $output .= '</tbody>';
    $output .= '</table>';


    // Purpose Verification
    $output .= '<p style="font-size: 16px;font-weight:bold;">2. PURPOSE OF VERIFICATION</p>';
    $VerifyAccuracy = ($value['VerifyAccuracy'] == "true") ? 'checked' : '';
    $output .= '<input type="checkbox" name="my_checkbox"'.$VerifyAccuracy.'>Verify accuracy of information submitted by the establishment pertaining to new permit applications, renewals, or midifications.';

    $output .= '<br><div style="display: inline-block;margin-left:59%"><p>New</p></div>';
    $output .= '<div style="display: inline-block;margin-left:8%"><p>Renew</p></div>';
    $output .= '<div style="display: inline-block;margin-left:6%"><p></p></div>';
    
    $output .= '<div style="display: inline-block;margin-left:10%"><label>PMPIN Hazardous</label></div>';  
    $PMPIN_Hazardous1 = ($value['PMPIN_Hazardous'] == "NEW") ? 'checked' : '';
    $output .= '<div style="display: inline-block;margin-left:33%"><label><input type="checkbox" name="my_checkbox" '.$PMPIN_Hazardous1.'></label></div>'; 
    $PMPIN_Hazardous2 = ($value['PMPIN_Hazardous'] == "RENEW") ? 'checked' : '';
    $output .= '<div style="display: inline-block;margin-left:11%"><input type="checkbox" name="my_checkbox" '.$PMPIN_Hazardous2.'></div>';

    
    $output .= '<div style="display: inline-block;margin-left:10%"><label>Hazardous Waste ID Registration</label></div>';
    $HWIDRegistration1 = ($value['HWIDRegistration'] == "NEW") ? 'checked' : '';
    $output .= '<div style="display: inline-block;margin-left:19.8%"><input type="checkbox" name="my_checkbox" '.$HWIDRegistration1.'></div>';
    $HWIDRegistration2 = ($value['HWIDRegistration'] == "RENEW") ? 'checked' : '';
    $output .= '<div style="display: inline-block;margin-left:11%"><input type="checkbox" name="my_checkbox" '.$HWIDRegistration2.'></div>';

   
    $output .= '<div style="display: inline-block;margin-left:10%"><label>Hazardous Waste Transporter Registration </label></div>';
    $HWTRegistration1 = ($value['HWTRegistration'] == "NEW") ? 'checked' : '';
    $output .= '<div style="display: inline-block;margin-left:11.3%"><input type="checkbox" name="my_checkbox" '.$HWTRegistration1.'></div>';
    $HWTRegistration2 = ($value['HWTRegistration'] == "RENEW") ? 'checked' : '';
    $output .= '<div style="display: inline-block;margin-left:11%"><input type="checkbox" name="my_checkbox" '.$HWTRegistration2.'></div>';

   
    $output .= '<br><div style="display: inline-block;margin-left:10%"><label>Hazardous Waste TSD Registration</label></div>';
    $HWTSDRegistration1 = ($value['PTOAPCI'] == "NEW") ? 'checked' : '';
    $output .= '<div style="display: inline-block;margin-left:17.8%"><input type="checkbox" name="my_checkbox" '.$HWTSDRegistration1.'></div>';
    $HWTSDRegistration2 = ($value['PTOAPCI'] == "RENEW") ? 'checked' : '';
    $output .= '<div style="display: inline-block;margin-left:11%"><input type="checkbox" name="my_checkbox" '.$HWTSDRegistration2.'></div>';

   
    $output .= '<br><div style="display: inline-block;margin-left:10%"><label>Permit to Operate Air Pollution Control Installation</label></div>';
    $PTOAPCI1 = ($value['DischargePermit'] == "NEW") ? 'checked' : '';
    $output .= '<div style="display: inline-block;margin-left:5.2%"><input type="checkbox" name="my_checkbox" '.$PTOAPCI1.'></div>';
    $PTOAPCI2 = ($value['DischargePermit'] == "RENEW") ? 'checked' : '';
    $output .= '<div style="display: inline-block;margin-left:11%"><input type="checkbox" name="my_checkbox" '.$PTOAPCI2.'></div>';


    $output .= '<br><div style="display: inline-block;margin-left:10%"><label>Discharge Permit</label></div>';
    $DischargePermit1 = ($value['DischargePermit'] == "NEW") ? 'checked' : '';
    $output .= '<div style="display: inline-block;margin-left:34.2%"><input type="checkbox" name="my_checkbox" '.$DischargePermit1.'></div>';
    $DischargePermit2 = ($value['DischargePermit'] == "RENEW") ? 'checked' : '';
    $output .= '<div style="display: inline-block;margin-left:11%"><input type="checkbox" name="my_checkbox" '.$DischargePermit2.'></div>';
 

    $OthersPV = ($value['OthersPV'] == "true") ? 'checked' : '';
    $output .= '<br><div style="display: inline-block;margin-left:9.8%"><label><input type="checkbox" name="my_checkbox" '.$OthersPV.'></label></div>'; 
 
    $output .= '<div style="display: inline-block;margin-bottom:2.5px"><label>Others</label></div>';  
    if($value['OthersPV'] == "true"){
        $output .= '<div style="">	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp; &nbsp;	&nbsp;	&nbsp;	&nbsp; '.$value["OthersPV_Text"].'</div>';
    }
    // Purpose Verification

    $DetermineCompliance = ($value['DetermineCompliance'] == "true") ? 'checked' : '';
    $output .= '<br><div style="display: inline-block;padding-top: 12px;"><label><input type="checkbox" name="my_checkbox" '.$DetermineCompliance.'></label></div>'; 
    $output .= '<div style="display: inline-block;margin-bottom:2.5px;padding-top: 12px;"><label> Determine compliance status with environmental regulations, permit conditions, and other requirements</label></div>';  

    $InvestigateComplaints = ($value['InvestigateComplaints'] == "true") ? 'checked' : '';
    $output .= '<br><div style="display: inline-block;"><label><input type="checkbox" name="my_checkbox" '.$InvestigateComplaints.'></label></div>'; 
    $output .= '<div style="display: inline-block;"><label>Investigate community complains</label></div>';  

    $StatusCommitments = ($value['StatusCommitments'] == "true") ? 'checked' : '';
    $output .= '<br><div style="display: inline-block;"><label><input type="checkbox" name="my_checkbox" '.$StatusCommitments.'></label></div>'; 
    $output .= '<div style="display: inline-block;"><label> Check status of commitment(s)
    </label></div>';  

    
    
    $EwatchProgram = ($value['EwatchProgram'] == "true") ? 'checked' : '';
    $output .= '<br><div style="display: inline-block;margin-left:5%"><label><input type="checkbox" name="my_checkbox" '.$EwatchProgram.'></label></div>'; 
    $output .= '<div style="display: inline-block;margin-bottom:2.5px;padding-top: 15px;"><label>Industrial Ecowatch Program</label></div>';  

    $PEPP = ($value['PEPP'] == "true") ? 'checked' : '';
    $output .= '<br><div style="display: inline-block;margin-left:5%;"><label><input type="checkbox" name="my_checkbox" '.$PEPP.'></label></div>'; 
    $output .= '<div style="display: inline-block;margin-bottom:2.5px;"><label>Philippine Environmental Partnership Program (PEPP)</label></div>';  

    $PAB = ($value['PAB'] == "true") ? 'checked' : '';
    $output .= '<br><div style="display: inline-block;margin-left:5%;"><label><input type="checkbox" name="my_checkbox" '.$PAB.'></label></div>'; 
    $output .= '<div style="display: inline-block;margin-bottom:2.5px;"><label>Pollution Adjudication Board (PAB)</label></div>'; 

    $Others = ($value['Others'] == "true") ? 'checked' : '';
    $output .= '<br><div style="display: inline-block;margin-left:5%;"><label><input type="checkbox" name="my_checkbox" '.$Others.'></label></div>'; 
    $output .= '<div style="display: inline-block;margin-bottom:2.5px;"><label>Others</label></div>'; 

    if($value['Others'] == "true"){
        $output .= '<div style="">	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp; '.$value["Others_Text"].'</div>';
    }



// --------------------------------Table Envi Laws---------------------------------------------------------------------------------------------

    $output .= '<p style="font-size: 16px;font-weight:bold;">3. COMPLIANCE STATUS</p>';
    $output .= '<br><p style="font-size: 14px;font-weight:bold;">3.1 DENR Permits/Licenses/Clearances</p>';

    $output .= '<table style="width: 100%;" name="LawCitations" class="LawCitations">';
    $output .= '<tbody>';
    $output .= '<tr>';
    $output .= '<td style="border: 1px solid black;background-color:#F4B484">';
    $output .= '<center><b>Environmental Law';
    $output .= '</td>';
    $output .= '<td style="border:1px solid black;background-color:#F4B484" colspan="2">';
    $output .=  '<center><b>Permit';
    $output .= '</td>';
    $output .= '<td style="border:1px solid black;background-color:#F4B484">';
    $output .= '<center><b>Date of Issue';
    $output .= '</td>';
    $output .= '<td style="border:1px solid black;background-color:#F4B484">';
    $output .= '<center><b>Expiry Date';
    $output .= '</td>';
    $output .= '</tr>';

    $output .= '<tr>';
    $output .= '<td style="border:1px solid black; width:10%;"><label>PD1586</label></td>';
    $output .= '<td style="border:1px solid black; width:20%;"><label">ECC1<label></td>';
    $output .= '<td style="border:1px solid black; width:25%;">' . $value["ECC"]. '</td>';
    $output .= '<td style="border:1px solid black; width:15%;"><center> '.$value["ECC_DOI"].'</td>';
    $output .= '<td style="border:1px solid black; width:20%;"><center> '.$value["ECC_DE"]. '</td>';
    $output .= '</tr>';

    $output .= '<tr>';
    $output .= '<td style="border:1px solid black; border-bottom: none; width:10%;"><label>RA6969</label></td>';
    $output .= '<td style="border:1px solid black; width:20%;"><label">DENR Registry ID<label></td>';
    $output .= '<td style="border:1px solid black; width:25%;">' . $value["DENRID"]. '</td>';
    $output .= '<td style="border:1px solid black; width:15%;"><center> '.$value["DENRID_DOI"].'</td>';
    $output .= '<td style="border:1px solid black; width:20%;"><center> '.$value["DENRID_DE"]. '</td>';
    $output .= '</tr>';

    $output .= '<tr>';
    $output .= '<td style="border:1px solid black; border-top: none; border-bottom: none; width:10%;"><label></label></td>';
    $output .= '<td style="border:1px solid black; width:20%;"><label">PCL Compliance Certificate<label></td>';
    $output .= '<td style="border:1px solid black; width:25%;">' . $value["PCL_Compliance"]. '</td>';
    $output .= '<td style="border:1px solid black; width:15%;"><center> '.$value["PCL_Compliance_DOI"].'</td>';
    $output .= '<td style="border:1px solid black; width:20%;"><center> '.$value["PCL_Compliance_DE"]. '</td>';
    $output .= '</tr>';

    $output .= '<tr>';
    $output .= '<td style="border:1px solid black; border-top: none; border-bottom: none; width:10%;"><label></label></td>';
    $output .= '<td style="border:1px solid black; width:20%;"><label">CCO Registry<label></td>';
    $output .= '<td style="border:1px solid black; width:25%;">' . $value["CCO_Registry"]. '</td>';
    $output .= '<td style="border:1px solid black; width:15%;"><center> '.$value["CCO_Registry_DOI"].'</td>';
    $output .= '<td style="border:1px solid black; width:20%;"><center> '.$value["CCO_Registry_DE"]. '</td>';
    $output .= '</tr>';

    $output .= '<tr>';
    $output .= '<td style="border:1px solid black; border-top: none; border-bottom: none; width:10%;"><label></label></td>';
    $output .= '<td style="border:1px solid black; width:20%;"><label">Importance Clearance No.<label></td>';
    $output .= '<td style="border:1px solid black; width:25%;">' . $value["Importation_Clearance"]. '</td>';
    $output .= '<td style="border:1px solid black; width:15%;"><center> '.$value["Importation_Clearance_DOI"].'</td>';
    $output .= '<td style="border:1px solid black; width:20%;"><center> '.$value["Importation_Clearance_DE"]. '</td>';
    $output .= '</tr>';

    $output .= '<tr>';
    $output .= '<td style="border:1px solid black; border-top: none; border-bottom: none; width:10%;"><label></label></td>';
    $output .= '<td style="border:1px solid black; width:20%;"><label">Permit to Transport<label></td>';
    $output .= '<td style="border:1px solid black; width:25%;">' . $value["Importation_Clearance"]. '</td>';
    $output .= '<td style="border:1px solid black; width:15%;"><center> '.$value["Importation_Clearance_DOI"].'</td>';
    $output .= '<td style="border:1px solid black; width:20%;"><center> '.$value["Importation_Clearance_DE"]. '</td>';
    $output .= '</tr>';

    $output .= '<tr>';
    $output .= '<td style="border:1px solid black; border-top: none; border-bottom: none; width:10%;"><label></label></td>';
    $output .= '<td style="border:1px solid black; width:20%;"><label">Copy of COT issued by licensed TSD Facility<label></td>';
    $output .= '<td style="border:1px solid black; width:25%;">' . $value["COT_Issued"]. '</td>';
    $output .= '<td style="border:1px solid black; width:15%;"><center> '.$value["COT_Issued_DOI"].'</td>';
    $output .= '<td style="border:1px solid black; width:20%;"><center> '.$value["COT_Issued_DE"]. '</td>';
    $output .= '</tr>';

    $output .= '<tr>';
    $output .= '<td style="border:1px solid black; border-top: none; border-bottom: none; width:10%;"><label></label></td>';
    $output .= '<td style="border:1px solid black; width:20%;"><label">Permit to Transport<label></td>';
    $output .= '<td style="border:1px solid black; width:25%;">' . $value["Importation_Clearance"]. '</td>';
    $output .= '<td style="border:1px solid black; width:15%;"><center> '.$value["Importation_Clearance_DOI"].'</td>';
    $output .= '<td style="border:1px solid black; width:20%;"><center> '.$value["Importation_Clearance_DE"]. '</td>';
    $output .= '</tr>';

    $output .= '<tr>';
    $output .= '<td style="border:1px solid black; border-top: none; border-bottom: none; width:10%;"><label></label></td>';
    $output .= '<td style="border:1px solid black; width:20%;"><label">TSD Registration Certificate<label></td>';
    $output .= '<td style="border:1px solid black; width:25%;">' . $value["TSD_RegistrationCert"]. '</td>';
    $output .= '<td style="border:1px solid black; width:15%;"><center> '.$value["TSD_RegistrationCert_DOI"].'</td>';
    $output .= '<td style="border:1px solid black; width:20%;"><center> '.$value["TSD_RegistrationCert_DE"]. '</td>';
    $output .= '</tr>';

    $output .= '<tr>';
    $output .= '<td style="border:1px solid black; width:10%;"><label>RA8749</label></td>';
    $output .= '<td style="border:1px solid black; width:20%;"><label">POA No.<label></td>';
    $output .= '<td style="border:1px solid black; width:25%;">' . $value["POA_No"].'</td>';
    $output .= '<td style="border:1px solid black; width:15%;"><center> '.$value["POA_No_DOI"].'</td>';
    $output .= '<td style="border:1px solid black; width:20%;"><center> '.$value["POA_No_DE"].'</td>';
    $output .= '</tr>';

    $output .= '<tr>';
    $output .= '<td style="border:1px solid black; width:10%;"><label>RA9275</label></td>';
    $output .= '<td style="border:1px solid black; width:20%;"><label">Discharge Permit<label></td>';
    $output .= '<td style="border:1px solid black; width:25%;">' . $value["Discharge_Permit"].'</td>';
    $output .= '<td style="border:1px solid black; width:15%;"><center> '.$value["Discharge_Permit_DOI"].'</td>';
    $output .= '<td style="border:1px solid black; width:20%;"><center> '.$value["Discharge_Permit_DE"].'</td>';
    $output .= '</tr>';

    $output .= '<tr>';
    $output .= '<td style="border:1px solid black; width:10%;"><label>RA9003</label></td>';
    $output .= '<td style="border:1px solid black; width:20%;"><label">With MOA/Agreement for residuals disposed off to SLF w/ ECC<label></td>';
    $output .= '<td style="border:1px solid black; width:25%;">' . $value["MOA_Agreement"].'</td>';
    $output .= '<td style="border:1px solid black; width:15%;"><center> '.$value["MOA_Agreement_DOI"].'</td>';
    $output .= '<td style="border:1px solid black; width:20%;"><center> '.$value["MOA_Agreement_DE"].'</td>';
    $output .= '</tr>';

    $output .= '</tr>';
    $output .= '</tbody>';
    $output .= '</table>';
// -----------------------------------------------------------------------------------------------------------------------------


    // ECC CONDITION
    $arrayECC = array($value["ECC_Condition"]);
    $arrayECC_ConditionSelect = array($value["ECC_ConditionSelect"]);
    $arrayECC_ConditionRemarks = array($value["ECC_ConditionRemarks"]);


    $output .='<br><br><table>';
    $output .='</thead>';
  
    $output .= '<tr>
    <td style="border: 1px solid black;width:40%; text-align:center;background-color:#F4B484" rowspan="2"><b>Compliance Requirements</td>
    <td style="border: 1px solid black;width:5%;text-align:center;background-color:#F4B484" colspan="3"><b>Complied</td>
    <td style="border: 1px solid black;width:33%;text-align:center;background-color:#F4B484" rowspan="2"><b>Remarks</td>
    </tr>';

    $output .= '<tr>
    <td style="border: 1px solid black;width:5%;text-align:center;background-color:#F4B484"><b>Yes</td>
    <td style="border: 1px solid black;width:5%;text-align:center;background-color:#F4B484"><b>No</td>
    <td style="border: 1px solid black;width:5%;text-align:center;background-color:#F4B484"><b>Partial</td>
    </tr>';
    $output .='<tr><td style="border: 1px solid black;" colspan="5"><label><b>PD 1586: Environmental Compliance Certificate (ECC) Conditionalities</label></td></tr>';
    $output .='</thead>';
    $output .='<tbody>';

    // foreach ($arrayECC as $item)
    //  { 
    //     $cells = explode(";", $item);
    //     foreach ($cells as $cell) {
    //         $output .= '<tr>';
    //         $output .= '<td style="border:1px solid black;">' . $cell . '</td>';  
    //         $output .= '<td style="border: 1px solid black;width:5%;"></td>';
    //         $output .= '<td style="border: 1px solid black;width:5%;"></td>';
    //         $output .= '<td style="border: 1px solid black;width:5%;"></td>';
    //         $output .= '<td style="border: 1px solid black;width:5%;"></td>';
    //         $output .= '</tr>';
    //     }
    //  }

    foreach ($arrayECC as $item){
        $cells = explode(";", $item);
        $select_cells = explode(";", isset($arrayECC_ConditionSelect[0]) ? $arrayECC_ConditionSelect[0] : '');
        foreach ($cells as $i => $cell) {
            $remarks = explode(";", isset($arrayECC_ConditionRemarks[0]) ? $arrayECC_ConditionRemarks[0] : '');
            $output .= '<tr>';
            $output .= '<td style="border:1px solid black;">' . $cell . '</td>';  
            // $output .= '<td style="border: 1px solid black;width:5%;">' . (isset($select_cells[$i]) ? $select_cells[$i] : '') . '</td>';
            $output .= '<td style="border: 1px solid black;width:5%;">';
            if (isset($select_cells[$i]) && $select_cells[$i] == 'Yes') { 
                $output .= '<input type="checkbox" checked name="LawCitations">';
            } else { 
                $output .= '<input type="checkbox" name="LawCitations">';
            }
            $output .= '</td>';
            $output .= '<td style="border: 1px solid black;width:5%;">';
            if (isset($select_cells[$i]) && $select_cells[$i] == 'No') { 
                $output .= '<input type="checkbox" checked name="LawCitations">';
            } else { 
                $output .= '<input type="checkbox" name="LawCitations">';
            }
            $output .= '</td>';
            $output .= '<td style="border: 1px solid black;width:5%;">';
            if (isset($select_cells[$i]) && $select_cells[$i] == 'Partial') { 
                $output .= '<input type="checkbox" checked name="LawCitations">';
            } else { 
                $output .= '<input type="checkbox" name="LawCitations">';
            }
            $output .= '</td>';
            $output .= '<td style="border: 1px solid black;width:5%;">' . (isset($remarks[$i]) ? $remarks[$i] : '') . '</td>';
            $output .= '</tr>';
        }
    }
    

     $output .='</tbody>';
     $output .='</table>';
    // ECC CONDITION END



// ----------------------------------------------------------------------------------------------- TOXIC START
    $output .= '<br><p style="font-size: 14px;font-weight:bold;">3.2 Summary of Compliance</p>';
    $output .= '<p style="font-size: 14px;">The table below summarizes the compliance of <b>'.$value["ProjectName"].'</b> to applicable laws and citations.</p>';


    $output .= '<table style="width: 100%;">';
    $output .= '<tbody>';
    $output .= '<tr>';
    $output .= '<td style="border: 1px solid black;background-color:#F4B484; width: 30%;" rowspan="2">';
    $output .= '<center><b><label>Applicable Laws and Citations<label>';
    $output .= '</td>';
    $output .= '<td style="border:1px solid black;background-color:#F4B484; width: 30%;" rowspan="2">';
    $output .=  '<center><b><label>Compliance Requirements<label>';
    $output .= '</td>';
    $output .= '<td style="border:1px solid black;background-color:#F4B484; width: 10%;" colspan="3">';
    $output .= '<center><b><label>Compliant<label>';
    $output .= '</td>';
    $output .= '<td style="border:1px solid black;background-color:#F4B484; width: 23%;" rowspan="2">';
    $output .= '<center><b><label>Remarks<label>';
    $output .= '</td>';
    $output .= '</tr>';

    $output .= '<tr>';
    $output .= '<td style="border:1px solid black;background-color:#F4B484;><center><b><label></label></td>';
    $output .= '<td style="border:1px solid black;background-color:#F4B484;><center><b><label>Yes</label></td>';
    $output .= '<td style="border:1px solid black;background-color:#F4B484;><center><b><label>C</label></td>';
    $output .= '<td style="border:1px solid black;background-color:#F4B484;><center><b><label>No</label></td>';
    $output .= '<td style="border:1px solid black;background-color:#F4B484;><center><b><label>E</label></td>';
    $output .= '<td style="border:1px solid black;background-color:#F4B484;><center><b><label>N/A</label></td>';
    $output .= '</tr>';

    $output .= '<tr>';
    $output .= '<td style="border:1px solid black;" colspan="6"><label><b>RA 6969 Toxic Substances and Hazardous and Nuclear Wastes Control Act</label></td>';
    $output .= '</tr>';
    
    $output .= '<tr>';
    $output .= '<td style="border:1px solid black;border-bottom: none;"><label>Priority Chemical List</label></td>';
    $output .= '<td style="border:1px solid black;"><label">Valid PCL Compliance <label></td>';
    $Haz_PCLCompliance1 = ($value['Haz_PCLCompliance'] == "Yes") ? 'checked' : '';
    $output .= '<td style="border:1px solid black;"><input type="checkbox" name="LawCitations" '.$Haz_PCLCompliance1.'></label></td>';
    $Haz_PCLCompliance2 = ($value['Haz_PCLCompliance'] == "No") ? 'checked' : '';
    $output .= '<td style="border:1px solid black;"><input type="checkbox" name="LawCitations" '.$Haz_PCLCompliance2.'></label><center></td>';
    $Haz_PCLCompliance3 = ($value['Haz_PCLCompliance'] == "N/A") ? 'checked' : '';
    $output .= '<td style="border:1px solid black;"><input type="checkbox" name="LawCitations" '.$Haz_PCLCompliance3.'></label><center></td>';
    $output .= '<td style="border:1px solid black;">'.$value["Haz_PCLComplianceText"].'<center></td>';
    $output .= '</tr>';

    $output .= '<tr>';
    $output .= '<td style="border:1px solid black;border-top: none; border-bottom: none;"><label"><label></td>';
    $output .= '<td style="border:1px solid black;"><label">Annual Reporting <label></td>';
    $Annual_Reporting1 = ($value['Annual_Reporting'] == "Yes") ? 'checked' : '';
    $output .= '<td style="border:1px solid black;"><input type="checkbox" name="LawCitations" '.$Annual_Reporting1.'></label></td>';
    $Annual_Reporting2 = ($value['Annual_Reporting'] == "No") ? 'checked' : '';
    $output .= '<td style="border:1px solid black;"><input type="checkbox" name="LawCitations" '.$Annual_Reporting2.'></label><center></td>';
    $Annual_Reporting3 = ($value['Annual_Reporting'] == "N/A") ? 'checked' : '';
    $output .= '<td style="border:1px solid black;"><input type="checkbox" name="LawCitations" '.$Annual_Reporting3.'></label><center></td>';
    $output .= '<td style="border:1px solid black;">'.$value["Annual_ReportingText"].'<center></td>';
    $output .= '</tr>';

    $output .= '<tr>';
    $output .= '<td style="border:1px solid black;border-bottom: none;"><label>Chemical Control Orders</label></td>';
    $output .= '<td style="border:1px solid black;"><label">Biennial Report for those chemicals that are for issuance for CCO <label></td>';
    $Biennial_Report1 = ($value['Biennial_Report'] == "Yes") ? 'checked' : '';
    $output .= '<td style="border:1px solid black;"><input type="checkbox" name="LawCitations" '.$Biennial_Report1.'></label></td>';
    $Biennial_Report2 = ($value['Biennial_Report'] == "No") ? 'checked' : '';
    $output .= '<td style="border:1px solid black;"><input type="checkbox" name="LawCitations" '.$Biennial_Report2.'></label><center></td>';
    $Biennial_Report3 = ($value['Biennial_Report'] == "N/A") ? 'checked' : '';
    $output .= '<td style="border:1px solid black;"><input type="checkbox" name="LawCitations" '.$Biennial_Report3.'></label><center></td>';
    $output .= '<td style="border:1px solid black;">'.$value["Biennial_ReportText"].'<center></td>';
    $output .= '</tr>';


    $output .= '<tr>';
    $output .= '<td style="border:1px solid black;border-top: none; border-bottom: none;"><label"><label></td>';
    $output .= '<td style="border:1px solid black;"><label">CCO Registration <label></td>';
    $CCO_Registration1 = ($value['CCO_Registration'] == "Yes") ? 'checked' : '';
    $output .= '<td style="border:1px solid black;"><input type="checkbox" name="LawCitations" '.$CCO_Registration1.'></label></td>';
    $CCO_Registration2 = ($value['CCO_Registration'] == "No") ? 'checked' : '';
    $output .= '<td style="border:1px solid black;"><input type="checkbox" name="LawCitations" '.$CCO_Registration2.'></label><center></td>';
    $CCO_Registration3 = ($value['CCO_Registration'] == "N/A") ? 'checked' : '';
    $output .= '<td style="border:1px solid black;"><input type="checkbox" name="LawCitations" '.$CCO_Registration3.'></label><center></td>';
    $output .= '<td style="border:1px solid black;">'.$value["CCO_RegistrationText"].'<center></td>';
    $output .= '</tr>';


    $output .= '<tr>';
    $output .= '<td style="border:1px solid black;border-bottom:none;"><label>Importation</label></td>';
    $output .= '<td style="border:1px solid black;"><label">Valid Small Quantity Importation Clearance<label></td>';
    $Importation1 = ($value['Importation'] == "Yes") ? 'checked' : '';
    $output .= '<td style="border:1px solid black;"><input type="checkbox" name="LawCitations" '.$Importation1.'></label></td>';
    $Importation2 = ($value['Importation'] == "No") ? 'checked' : '';
    $output .= '<td style="border:1px solid black;"><input type="checkbox" name="LawCitations" '.$Importation2.'></label><center></td>';
    $Importation3 = ($value['Importation'] == "N/A") ? 'checked' : '';
    $output .= '<td style="border:1px solid black;"><input type="checkbox" name="LawCitations" '.$Importation3.'></label><center></td>';
    $output .= '<td style="border:1px solid black;">'.$value["ImportationText"].'<center></td>';
    $output .= '</tr>';

    $output .= '<tr>';
    $output .= '<td style="border:1px solid black;border-top: none; border-bottom: none;"><label"><label></td>';
    $output .= '<td style="border:1px solid black;"><label">Valid Importation Clearance<label></td>';
    $Valid_ImportanceClearance1 = ($value['Bill_Lading'] == "Yes") ? 'checked' : '';
    $output .= '<td style="border:1px solid black;"><input type="checkbox" name="LawCitations" '.$Valid_ImportanceClearance1.'></label></td>';
    $Valid_ImportanceClearance2 = ($value['Valid_ImportanceClearance'] == "No") ? 'checked' : '';
    $output .= '<td style="border:1px solid black;"><input type="checkbox" name="LawCitations" '.$Valid_ImportanceClearance2.'></label><center></td>';
    $Valid_ImportanceClearance3 = ($value['Valid_ImportanceClearance'] == "N/A") ? 'checked' : '';
    $output .= '<td style="border:1px solid black;"><input type="checkbox" name="LawCitations" '.$Valid_ImportanceClearance3.'></label><center></td>';
    $output .= '<td style="border:1px solid black;">'.$value["Valid_ImportanceClearanceText"].'<center></td>';
    $output .= '</tr>';

    $output .= '<tr>';
    $output .= '<td style="border:1px solid black;border-top: none; border-bottom: none;"><label"><label></td>';
    $output .= '<td style="border:1px solid black;"><label">Bill of Lading <label></td>';
    $Bill_Lading1 = ($value['Bill_Lading'] == "Yes") ? 'checked' : '';
    $output .= '<td style="border:1px solid black;"><input type="checkbox" name="LawCitations" '.$Bill_Lading1.'></label></td>';
    $Bill_Lading2 = ($value['Bill_Lading'] == "No") ? 'checked' : '';
    $output .= '<td style="border:1px solid black;"><input type="checkbox" name="LawCitations" '.$Bill_Lading2.'></label><center></td>';
    $Bill_Lading3 = ($value['Bill_Lading'] == "N/A") ? 'checked' : '';
    $output .= '<td style="border:1px solid black;"><input type="checkbox" name="LawCitations" '.$Bill_Lading3.'></label><center></td>';
    $output .= '<td style="border:1px solid black;">'.$value["Bill_LadingText"].'<center></td>';
    $output .= '</tr>';



    $output .= '<tr>';
    $output .= '<td style="border:1px solid black;border-bottom:none;"><label>Hazardous Waste Generator</label></td>';
    $output .= '<td style="border:1px solid black;"><label">Registration as Hazardous Waste Generator<label></td>';
    $Registration_HWG1 = ($value['Registration_HWG'] == "Yes") ? 'checked' : '';
    $output .= '<td style="border:1px solid black;"><input type="checkbox" name="LawCitations" '.$Registration_HWG1.'></label></td>';
    $Registration_HWG2 = ($value['Registration_HWG'] == "No") ? 'checked' : '';
    $output .= '<td style="border:1px solid black;"><input type="checkbox" name="LawCitations" '.$Registration_HWG2.'></label><center></td>';
    $Registration_HWG3 = ($value['Registration_HWG'] == "N/A") ? 'checked' : '';
    $output .= '<td style="border:1px solid black;"><input type="checkbox" name="LawCitations" '.$Registration_HWG3.'></label><center></td>';
    $output .= '<td style="border:1px solid black;">'.$value["Registration_HWGText"].'<center></td>';
    $output .= '</tr>';

    $output .= '<tr>';
    $output .= '<td style="border:1px solid black;border-top: none; border-bottom: none;"><label"><label></td>';
    $output .= '<td style="border:1px solid black;"><label">With temporary Hazwaste storage facility<label></td>';
    $Temp_HazStorageFacility1 = ($value['Temp_HazStorageFacility'] == "Yes") ? 'checked' : '';
    $output .= '<td style="border:1px solid black;"><input type="checkbox" name="LawCitations" '.$Temp_HazStorageFacility1.'></label></td>';
    $Temp_HazStorageFacility2 = ($value['Temp_HazStorageFacility'] == "No") ? 'checked' : '';
    $output .= '<td style="border:1px solid black;"><input type="checkbox" name="LawCitations" '.$Temp_HazStorageFacility2.'></label><center></td>';
    $Temp_HazStorageFacility3 = ($value['Temp_HazStorageFacility'] == "N/A") ? 'checked' : '';
    $output .= '<td style="border:1px solid black;"><input type="checkbox" name="LawCitations" '.$Temp_HazStorageFacility3.'></label><center></td>';
    $output .= '<td style="border:1px solid black;">'.$value["Temp_HazStorageFacilityText"].'<center></td>';
    $output .= '</tr>';

    $output .= '<tr>';
    $output .= '<td style="border:1px solid black;border-top: none; border-bottom: none;"><label"><label></td>';
    $output .= '<td style="border:1px solid black;"><label">Reporting of hazardous waste generated <label></td>';
    $Report_HazGenerated1 = ($value['Report_HazGenerated'] == "Yes") ? 'checked' : '';
    $output .= '<td style="border:1px solid black;"><input type="checkbox" name="LawCitations" '.$Report_HazGenerated1.'></label></td>';
    $Report_HazGenerated2 = ($value['Report_HazGenerated'] == "No") ? 'checked' : '';
    $output .= '<td style="border:1px solid black;"><input type="checkbox" name="LawCitations" '.$Report_HazGenerated2.'></label><center></td>';
    $Report_HazGenerated3 = ($value['Report_HazGenerated'] == "N/A") ? 'checked' : '';
    $output .= '<td style="border:1px solid black;"><input type="checkbox" name="LawCitations" '.$Report_HazGenerated3.'></label><center></td>';
    $output .= '<td style="border:1px solid black;">'.$value["Report_HazGeneratedText"].'<center></td>';
    $output .= '</tr>';

    $output .= '<tr>';
    $output .= '<td style="border:1px solid black;border-bottom:none;"><label>Hazardous Waste Storage and Labelling</label></td>';
    $output .= '<td style="border:1px solid black;"><label">Hazardous waste properly labelled<label></td>';
    $Haz_WasteLabelled1 = ($value['Haz_WasteLabelled'] == "Yes") ? 'checked' : '';
    $output .= '<td style="border:1px solid black;"><input type="checkbox" name="LawCitations" '.$Haz_WasteLabelled1.'></label></td>';
    $Haz_WasteLabelled2 = ($value['Haz_WasteLabelled'] == "No") ? 'checked' : '';
    $output .= '<td style="border:1px solid black;"><input type="checkbox" name="LawCitations" '.$Haz_WasteLabelled2.'></label><center></td>';
    $Haz_WasteLabelled3 = ($value['Haz_WasteLabelled'] == "N/A") ? 'checked' : '';
    $output .= '<td style="border:1px solid black;"><input type="checkbox" name="LawCitations" '.$Haz_WasteLabelled3.'></label><center></td>';
    $output .= '<td style="border:1px solid black;">'.$value["Haz_WasteLabelledText"].'<center></td>';
    $output .= '</tr>';

    $output .= '<tr>';
    $output .= '<td style="border:1px solid black;border-top: none; border-bottom: none;"><label"><label></td>';
    $output .= '<td style="border:1px solid black;"><label">Valid Permit to Transport<label></td>';
    $Valid_PermitTranspo1 = ($value['Valid_PermitTranspo'] == "Yes") ? 'checked' : '';
    $output .= '<td style="border:1px solid black;"><input type="checkbox" name="LawCitations" '.$Valid_PermitTranspo1.'></label></td>';
    $Valid_PermitTranspo2 = ($value['Valid_PermitTranspo'] == "No") ? 'checked' : '';
    $output .= '<td style="border:1px solid black;"><input type="checkbox" name="LawCitations" '.$Valid_PermitTranspo2.'></label><center></td>';
    $Valid_PermitTranspo3 = ($value['Valid_PermitTranspo'] == "N/A") ? 'checked' : '';
    $output .= '<td style="border:1px solid black;"><input type="checkbox" name="LawCitations" '.$Valid_PermitTranspo3.'></label><center></td>';
    $output .= '<td style="border:1px solid black;">'.$value["Valid_PermitTranspoText"].'<center></td>';
    $output .= '</tr>';

    $output .= '<tr>';
    $output .= '<td style="border:1px solid black;border-top: none; border-bottom: none;"><label"><label></td>';
    $output .= '<td style="border:1px solid black;"><label">Valid Registration of Transporters and Treaters<label></td>';
    $Valid_RegTranspoTreaters = ($value['Valid_RegTranspoTreaters'] == "Yes") ? 'checked' : '';
    $output .= '<td style="border:1px solid black;"><input type="checkbox" name="LawCitations" '.$Valid_RegTranspoTreaters.'></label></td>';
    $Valid_RegTranspoTreaters = ($value['Valid_RegTranspoTreaters'] == "No") ? 'checked' : '';
    $output .= '<td style="border:1px solid black;"><input type="checkbox" name="LawCitations" '.$Valid_RegTranspoTreaters.'></label><center></td>';
    $Valid_RegTranspoTreaters = ($value['Valid_RegTranspoTreaters'] == "N/A") ? 'checked' : '';
    $output .= '<td style="border:1px solid black;"><input type="checkbox" name="LawCitations" '.$Valid_RegTranspoTreaters.'></label><center></td>';
    $output .= '<td style="border:1px solid black;">'.$value["Valid_RegTranspoTreatersText"].'<center></td>';
    $output .= '</tr>';

    


    $output .= '<tr>';
    $output .= '<td style="border:1px solid black; border-bottom:none;"><label>Waste Transporter; Waste Transport Record; Waste Treatment and Disposal Premises
    </label></td>';
    $output .= '<td style="border:1px solid black;"><label">Compliance with Manifest System (Waste Transport Record)<label></td>';
    $Waste_Transporter1 = ($value['Waste_Transporter'] == "Yes") ? 'checked' : '';
    $output .= '<td style="border:1px solid black;"><input type="checkbox" name="LawCitations" '.$Waste_Transporter1.'></label></td>';
    $Waste_Transporter2 = ($value['Waste_Transporter'] == "No") ? 'checked' : '';
    $output .= '<td style="border:1px solid black;"><input type="checkbox" name="LawCitations" '.$Waste_Transporter2.'></label><center></td>';
    $Waste_Transporter3 = ($value['Waste_Transporter'] == "N/A") ? 'checked' : '';
    $output .= '<td style="border:1px solid black;"><input type="checkbox" name="LawCitations" '.$Waste_Transporter3.'></label><center></td>';
    $output .= '<td style="border:1px solid black;">'.$value["Waste_TransporterText"].'<center></td>';
    $output .= '</tr>';

    $output .= '<tr>';
    $output .= '<td style="border:1px solid black;border-top: none;"><label"><label></td>';
    $output .= '<td style="border:1px solid black;"><label">Valid/completed certificate of treatment<label></td>';
    $Valid_CertTreatment1 = ($value['Valid_CertTreatment'] == "Yes") ? 'checked' : '';
    $output .= '<td style="border:1px solid black;"><input type="checkbox" name="LawCitations" '.$Valid_CertTreatment1.'></label></td>';
    $Valid_CertTreatment2 = ($value['Valid_CertTreatment'] == "No") ? 'checked' : '';
    $output .= '<td style="border:1px solid black;"><input type="checkbox" name="LawCitations" '.$Valid_CertTreatment2.'></label><center></td>';
    $Valid_CertTreatment3 = ($value['Valid_CertTreatment'] == "N/A") ? 'checked' : '';
    $output .= '<td style="border:1px solid black;"><input type="checkbox" name="LawCitations" '.$Valid_CertTreatment3.'></label><center></td>';
    $output .= '<td style="border:1px solid black;">'.$value["Valid_CertTreatmentText"].'<center></td>';
    $output .= '</tr>';
    $output .= '</tr>';
    $output .= '</tbody>';
    $output .= '</table>';



// -------------------------------------------------------------------------------- END OF TOXIC


// ------------------------------------------------------------------------------ START AIR
$output .= '<br><table style="width: 100%;">';
$output .= '<tbody>';
$output .= '<tr>';
$output .= '<td style="border: 1px solid black;background-color:#F4B484; width: 30%;" rowspan="2">';
$output .= '<center><b><label>Applicable Laws and Citations<label>';
$output .= '</td>';
$output .= '<td style="border:1px solid black;background-color:#F4B484; width: 30%;" rowspan="2">';
$output .=  '<center><b><label>Compliance Requirements<label>';
$output .= '</td>';
$output .= '<td style="border:1px solid black;background-color:#F4B484; width: 10%;" colspan="3">';
$output .= '<center><b><label>Compliant<label>';
$output .= '</td>';
$output .= '<td style="border:1px solid black;background-color:#F4B484; width: 23%;" rowspan="2">';
$output .= '<center><b><label>Remarks<label>';
$output .= '</td>';
$output .= '</tr>';

$output .= '<tr>';
$output .= '<td style="border:1px solid black;background-color:#F4B484;><center><b><label></label></td>';
$output .= '<td style="border:1px solid black;background-color:#F4B484;><center><b><label>Yes</label></td>';
$output .= '<td style="border:1px solid black;background-color:#F4B484;><center><b><label>C</label></td>';
$output .= '<td style="border:1px solid black;background-color:#F4B484;><center><b><label>No</label></td>';
$output .= '<td style="border:1px solid black;background-color:#F4B484;><center><b><label>E</label></td>';
$output .= '<td style="border:1px solid black;background-color:#F4B484;><center><b><label>N/A</label></td>';
$output .= '</tr>';


$output .= '<tr>';
$output .= '<td style="border:1px solid black;" colspan="6"><label><b>RA 8749: Philippine Clean Air Act</label></td>';
$output .= '</tr>';

$output .= '<tr>';
$output .= '<td style="border:1px solid black; border-bottom:none;"><label>Permit to Operate </label></td>';
$output .= '<td style="border:1px solid black;"><label">With Valid POA<label></td>';
$Air_ValidPOA1 = ($value['Air_ValidPOA'] == "Yes") ? 'checked' : '';
$output .= '<td style="border:1px solid black;"><input type="checkbox" name="LawCitations" '.$Air_ValidPOA1.'></label></td>';
$Air_ValidPOA2 = ($value['Air_ValidPOA'] == "No") ? 'checked' : '';
$output .= '<td style="border:1px solid black;"><input type="checkbox" name="LawCitations" '.$Air_ValidPOA2.'></label><center></td>';
$Air_ValidPOA3 = ($value['Air_ValidPOA'] == "N/A") ? 'checked' : '';
$output .= '<td style="border:1px solid black;"><input type="checkbox" name="LawCitations" '.$Air_ValidPOA3.'></label><center></td>';
$output .= '<td style="border:1px solid black;">'.$value["Air_ValidPOAText"].'</td>';
$output .= '</tr>';


$output .= '<tr>';
$output .= '<td style="border:1px solid black;border-top: none;border-bottom:none;"><label"><label></td>';
$output .= '<td style="border:1px solid black;"><label">All emission sources is covered by a valid POA <label></td>';
$Air_EmissionPOA1 = ($value['Air_EmissionPOA'] == "Yes") ? 'checked' : '';
$output .= '<td style="border:1px solid black;"><input type="checkbox" name="LawCitations" '.$Air_EmissionPOA1.'></label></td>';
$Air_EmissionPOA2 = ($value['Air_EmissionPOA'] == "No") ? 'checked' : '';
$output .= '<td style="border:1px solid black;"><input type="checkbox" name="LawCitations" '.$Air_EmissionPOA2.'></label><center></td>';
$Air_EmissionPOA3 = ($value['Air_EmissionPOA'] == "N/A") ? 'checked' : '';
$output .= '<td style="border:1px solid black;"><input type="checkbox" name="LawCitations" '.$Air_EmissionPOA3.'></label><center></td>';
$output .= '<td style="border:1px solid black;">'.$value["Air_EmissionPOAText"].'</td>';
$output .= '</tr>';

$output .= '<tr>';
$output .= '<td style="border:1px solid black;border-top: none;border-bottom:none;"><label"><label></td>';

$output .= '<td style="border:1px solid black;"><label">POA is displayed in a conspicuous place near the installation.  <label></td>';
$Air_DisplayInstallation1 = ($value['Air_DisplayInstallation'] == "Yes") ? 'checked' : '';
$output .= '<td style="border:1px solid black;"><input type="checkbox" name="LawCitations" '.$Air_DisplayInstallation1.'></label></td>';
$Air_DisplayInstallation2 = ($value['Air_DisplayInstallation'] == "No") ? 'checked' : '';
$output .= '<td style="border:1px solid black;"><input type="checkbox" name="LawCitations" '.$Air_DisplayInstallation2.'></label><center></td>';
$Air_DisplayInstallation3 = ($value['Air_DisplayInstallation'] == "N/A") ? 'checked' : '';
$output .= '<td style="border:1px solid black;"><input type="checkbox" name="LawCitations" '.$Air_DisplayInstallation3.'></label><center></td>';
$output .= '<td style="border:1px solid black;">'.$value["Air_DisplayInstallationText"].'</td>';
$output .= '</tr>';

$output .= '<tr>';
$output .= '<td style="border:1px solid black;border-top: none;border-bottom:none;"><label"><label></td>';

$output .= '<td style="border:1px solid black;"><label">All Permit Conditions are complied with <label></td>';
$Air_PermitCondition1 = ($value['Air_PermitCondition'] == "Yes") ? 'checked' : '';
$output .= '<td style="border:1px solid black;"><input type="checkbox" name="LawCitations" '.$Air_PermitCondition1.'></label></td>';
$Air_PermitCondition2 = ($value['Air_PermitCondition'] == "No") ? 'checked' : '';
$output .= '<td style="border:1px solid black;"><input type="checkbox" name="LawCitations" '.$Air_PermitCondition2.'></label><center></td>';
$Air_PermitCondition3 = ($value['Air_PermitCondition'] == "N/A") ? 'checked' : '';
$output .= '<td style="border:1px solid black;"><input type="checkbox" name="LawCitations" '.$Air_PermitCondition3.'></label><center></td>';
$output .= '<td style="border:1px solid black;">'.$value["Air_PermitConditionText"].'</td>';
$output .= '</tr>';

$output .= '<tr>';
$output .= '<td style="border:1px solid black;border-top: none;border-bottom:none;"><label"><label></td>';

$output .= '<td style="border:1px solid black;"><label">Wind direction device is installed (if applicable)<label></td>';
$Air_WindDevice1 = ($value['Air_WindDevice'] == "Yes") ? 'checked' : '';
$output .= '<td style="border:1px solid black;"><input type="checkbox" name="LawCitations" '.$Air_WindDevice1.'></label></td>';
$Air_WindDevice2 = ($value['Air_WindDevice'] == "No") ? 'checked' : '';
$output .= '<td style="border:1px solid black;"><input type="checkbox" name="LawCitations" '.$Air_WindDevice2.'></label><center></td>';
$Air_WindDevice3 = ($value['Air_WindDevice'] == "N/A") ? 'checked' : '';
$output .= '<td style="border:1px solid black;"><input type="checkbox" name="LawCitations" '.$Air_WindDevice3.'></label><center></td>';
$output .= '<td style="border:1px solid black;">'.$value["Air_WindDeviceText"].'</td>';
$output .= '</tr>';

$output .= '<tr>';
$output .= '<td style="border:1px solid black;border-top: none;border-bottom:none;"><label"><label></td>';

$output .= '<td style="border:1px solid black;"><label">Plant operational problems lasting for more than 1 hour should be reported to EMB within 24 hours <label></td>';
$Air_PlantOperationProblem1 = ($value['Air_PlantOperationProblem'] == "Yes") ? 'checked' : '';
$output .= '<td style="border:1px solid black;"><input type="checkbox" name="LawCitations" '.$Air_PlantOperationProblem1.'></label></td>';
$Air_PlantOperationProblem2 = ($value['Air_PlantOperationProblem'] == "No") ? 'checked' : '';
$output .= '<td style="border:1px solid black;"><input type="checkbox" name="LawCitations" '.$Air_PlantOperationProblem2.'></label><center></td>';
$Air_PlantOperationProblem3 = ($value['Air_PlantOperationProblem'] == "N/A") ? 'checked' : '';
$output .= '<td style="border:1px solid black;"><input type="checkbox" name="LawCitations" '.$Air_PlantOperationProblem3.'></label><center></td>';
$output .= '<td style="border:1px solid black;">'.$value["Air_PlantOperationProblemText"].'</td>';
$output .= '</tr>';

$output .= '<tr>';
$output .= '<td style="border:1px solid black;border-top: none;border-bottom:none;"><label"><label></td>';

$output .= '<td style="border:1px solid black;"><label">CCTV installed (for large sources only)<label></td>';
$Air_CCTVInstalled1 = ($value['Air_CCTVInstalled'] == "Yes") ? 'checked' : '';
$output .= '<td style="border:1px solid black;"><input type="checkbox" name="LawCitations" '.$Air_CCTVInstalled1.'></label></td>';
$Air_CCTVInstalled2 = ($value['Air_CCTVInstalled'] == "No") ? 'checked' : '';
$output .= '<td style="border:1px solid black;"><input type="checkbox" name="LawCitations" '.$Air_CCTVInstalled2.'></label><center></td>';
$Air_CCTVInstalled3 = ($value['Air_CCTVInstalled'] == "N/A") ? 'checked' : '';
$output .= '<td style="border:1px solid black;"><input type="checkbox" name="LawCitations" '.$Air_CCTVInstalled3.'></label><center></td>';
$output .= '<td style="border:1px solid black;">'.$value["Air_CCTVInstalledText"].'</td>';
$output .= '</tr>';

$output .= '<tr>';
$output .= '<td style="border:1px solid black;border-top: none;border-bottom:none;"><label"><label></td>';

$output .= '<td style="border:1px solid black;"><label">CEMS/PEMS installed (for petroleum refineries, power/cement plants or sources emitting 750 Tone/yr) <label></td>';
$Air_CEMSorPEMS1 = ($value['Air_CEMSorPEMS'] == "Yes") ? 'checked' : '';
$output .= '<td style="border:1px solid black;"><input type="checkbox" name="LawCitations" '.$Air_CEMSorPEMS1.'></label></td>';
$Air_CEMSorPEMS2 = ($value['Air_CEMSorPEMS'] == "No") ? 'checked' : '';
$output .= '<td style="border:1px solid black;"><input type="checkbox" name="LawCitations" '.$Air_CEMSorPEMS2.'></label><center></td>';
$Air_CEMSorPEMS3 = ($value['Air_CEMSorPEMS'] == "N/A") ? 'checked' : '';
$output .= '<td style="border:1px solid black;"><input type="checkbox" name="LawCitations" '.$Air_CEMSorPEMS3.'></label><center></td>';
$output .= '<td style="border:1px solid black;">'.$value["Air_CEMSorPEMSText"].'</td>';
$output .= '</tr>';

$output .= '<tr>';
$output .= '<td style="border:1px solid black;border-top: none;border-bottom:none;"><label"><label></td>';

$output .= '<td style="border:1px solid black;"><label">Yearly RATA/Quarterly CGA conducted (for sources with CEMS) <label></td>';
$Air_YearlyRATA1 = ($value['Air_YearlyRATA'] == "Yes") ? 'checked' : '';
$output .= '<td style="border:1px solid black;"><input type="checkbox" name="LawCitations" '.$Air_YearlyRATA1.'></label></td>';
$Air_YearlyRATA2 = ($value['Air_YearlyRATA'] == "No") ? 'checked' : '';
$output .= '<td style="border:1px solid black;"><input type="checkbox" name="LawCitations" '.$Air_YearlyRATA2.'></label><center></td>';
$Air_YearlyRATA3 = ($value['Air_YearlyRATA'] == "N/A") ? 'checked' : '';
$output .= '<td style="border:1px solid black;"><input type="checkbox" name="LawCitations" '.$Air_YearlyRATA3.'></label><center></td>';
$output .= '<td style="border:1px solid black;">'.$value["Air_YearlyRATAText"].'</td>';
$output .= '</tr>';


$output .= '<tr>';
$output .= '<td style="border:1px solid black;"><label">Emission Testing (if applicable) <label></td>';
$output .= '<td style="border:1px solid black;"><label">Compliance with emission standards? <label></td>';
$Air_EmissionTestStandard1 = ($value['Air_EmissionTestStandard'] == "Yes") ? 'checked' : '';
$output .= '<td style="border:1px solid black;"><input type="checkbox" name="LawCitations" '.$Air_EmissionTestStandard1.'></label></td>';
$Air_EmissionTestStandard2 = ($value['Air_EmissionTestStandard'] == "No") ? 'checked' : '';
$output .= '<td style="border:1px solid black;"><input type="checkbox" name="LawCitations" '.$Air_EmissionTestStandard2.'></label><center></td>';
$Air_EmissionTestStandard3 = ($value['Air_EmissionTestStandard'] == "N/A") ? 'checked' : '';
$output .= '<td style="border:1px solid black;"><input type="checkbox" name="LawCitations" '.$Air_EmissionTestStandard3.'></label><center></td>';
$output .= '<td style="border:1px solid black;">'.$value["Air_EmissionTestStandardText"].'</td>';
$output .= '</tr>';


$output .= '<tr>';
$output .= '<td style="border:1px solid black;"><label">Ambient Testing (if applicable)<label></td>';
$output .= '<td style="border:1px solid black;"><label">Compliance with ambient air quality standards?<label></td>';
$Air_AmbientQualityStandard1 = ($value['Air_AmbientQualityStandard'] == "Yes") ? 'checked' : '';
$output .= '<td style="border:1px solid black;"><input type="checkbox" name="LawCitations" '.$Air_AmbientQualityStandard1.'></label></td>';
$Air_AmbientQualityStandard2 = ($value['Air_AmbientQualityStandard'] == "No") ? 'checked' : '';
$output .= '<td style="border:1px solid black;"><input type="checkbox" name="LawCitations" '.$Air_AmbientQualityStandard2.'></label><center></td>';
$Air_AmbientQualityStandard3 = ($value['Air_AmbientQualityStandard'] == "N/A") ? 'checked' : '';
$output .= '<td style="border:1px solid black;"><input type="checkbox" name="LawCitations" '.$Air_AmbientQualityStandard3.'></label><center></td>';
$output .= '<td style="border:1px solid black;">'.$value["Air_AmbientQualityStandardText"].'</td>';
$output .= '</tr>';
$output .= '</tbody>';
$output .= '</table>';
// ----------------------------------------------------------------------- END OF AIR




// -------------------------------------------------------------------------- WATER START
$output .= '<br><table style="width: 100%;">';
$output .= '<tbody>';
$output .= '<tr>';
$output .= '<td style="border: 1px solid black;background-color:#F4B484; width: 30%;" rowspan="2">';
$output .= '<center><b><label>Applicable Laws and Citations<label>';
$output .= '</td>';
$output .= '<td style="border:1px solid black;background-color:#F4B484; width: 30%;" rowspan="2">';
$output .=  '<center><b><label>Compliance Requirements<label>';
$output .= '</td>';
$output .= '<td style="border:1px solid black;background-color:#F4B484; width: 10%;" colspan="3">';
$output .= '<center><b><label>Compliant<label>';
$output .= '</td>';
$output .= '<td style="border:1px solid black;background-color:#F4B484; width: 23%;" rowspan="2">';
$output .= '<center><b><label>Remarks<label>';
$output .= '</td>';
$output .= '</tr>';

$output .= '<tr>';
$output .= '<td style="border:1px solid black;background-color:#F4B484;><center><b><label></label></td>';
$output .= '<td style="border:1px solid black;background-color:#F4B484;><center><b><label>Yes</label></td>';
$output .= '<td style="border:1px solid black;background-color:#F4B484;><center><b><label>C</label></td>';
$output .= '<td style="border:1px solid black;background-color:#F4B484;><center><b><label>No</label></td>';
$output .= '<td style="border:1px solid black;background-color:#F4B484;><center><b><label>E</label></td>';
$output .= '<td style="border:1px solid black;background-color:#F4B484;><center><b><label>N/A</label></td>';
$output .= '</tr>';


$output .= '<tr>';
$output .= '<td style="border:1px solid black;" colspan="6"><label><b>RA 9275: Philippine Clean Water Act</label></td>';
$output .= '</tr>';


$output .= '<tr>';
$output .= '<td style="border:1px solid black;border-bottom:none;"><label>Discharge Permit(DP) </label></td>';
$output .= '<td style="border:1px solid black;"><label">With Valid Discharge Permit<label></td>';
$Water_ValidDP1 = ($value['Water_ValidDP'] == "Yes") ? 'checked' : '';
$output .= '<td style="border:1px solid black;"><input type="checkbox" name="LawCitations" '.$Water_ValidDP1.'></label></td>';
$Water_ValidDP2 = ($value['Water_ValidDP'] == "No") ? 'checked' : '';
$output .= '<td style="border:1px solid black;"><input type="checkbox" name="LawCitations" '.$Water_ValidDP2.'></label><center></td>';
$Water_ValidDP3 = ($value['Water_ValidDP'] == "N/A") ? 'checked' : '';
$output .= '<td style="border:1px solid black;"><input type="checkbox" name="LawCitations" '.$Water_ValidDP3.'></label><center></td>';
$output .= '<td style="border:1px solid black;">'.$value["Water_ValidDPText"].'</td>';
$output .= '</tr>';


$output .= '<tr>';
$output .= '<td style="border:1px solid black;border-top: none;border-bottom:none;"><label"><label></td>';
$output .= '<td style="border:1px solid black;"><label">Volume of discharge consistent with DP issued?<label></td>';
$Water_VolumeDP1 = ($value['Water_VolumeDP'] == "Yes") ? 'checked' : '';
$output .= '<td style="border:1px solid black;"><input type="checkbox" name="LawCitations" '.$Water_VolumeDP1.'></label></td>';
$Water_VolumeDP2 = ($value['Water_VolumeDP'] == "No") ? 'checked' : '';
$output .= '<td style="border:1px solid black;"><input type="checkbox" name="LawCitations" '.$Water_VolumeDP2.'></label><center></td>';
$Water_VolumeDP3 = ($value['Water_VolumeDP'] == "N/A") ? 'checked' : '';
$output .= '<td style="border:1px solid black;"><input type="checkbox" name="LawCitations" '.$Water_VolumeDP3.'></label><center></td>';
$output .= '<td style="border:1px solid black;">'.$value["Water_VolumeDPText"].'</td>';
$output .= '</tr>';

$output .= '<tr>';
$output .= '<td style="border:1px solid black;border-top: none;border-bottom:none;"><label"><label></td>';
$output .= '<td style="border:1px solid black;"><label">All permit conditions are complied with?<label></td>';
$Water_PermitsComplied1 = ($value['Water_PermitsComplied'] == "Yes") ? 'checked' : '';
$output .= '<td style="border:1px solid black;"><input type="checkbox" name="LawCitations" '.$Water_PermitsComplied1.'></label></td>';
$Water_PermitsComplied2 = ($value['Water_PermitsComplied'] == "No") ? 'checked' : '';
$output .= '<td style="border:1px solid black;"><input type="checkbox" name="LawCitations" '.$Water_PermitsComplied2.'></label><center></td>';
$Water_PermitsComplied3 = ($value['Water_PermitsComplied'] == "N/A") ? 'checked' : '';
$output .= '<td style="border:1px solid black;"><input type="checkbox" name="LawCitations" '.$Water_PermitsComplied3.'></label><center></td>';
$output .= '<td style="border:1px solid black;">'.$value["Water_PermitsCompliedText"].'</td>';
$output .= '</tr>';

$output .= '<tr>';
$output .= '<td style="border:1px solid black;border-top: none;border-bottom:none;"><label"><label></td>';
$output .= '<td style="border:1px solid black;"><label">With working flow metering device (if applicable)<label></td>';
$Water_FlowMeterDevice1 = ($value['Water_FlowMeterDevice'] == "Yes") ? 'checked' : '';
$output .= '<td style="border:1px solid black;"><input type="checkbox" name="LawCitations" '.$Water_FlowMeterDevice1.'></label></td>';
$Water_FlowMeterDevice2 = ($value['Water_FlowMeterDevice'] == "No") ? 'checked' : '';
$output .= '<td style="border:1px solid black;"><input type="checkbox" name="LawCitations" '.$Water_FlowMeterDevice2.'></label><center></td>';
$Water_FlowMeterDevice3 = ($value['Water_FlowMeterDevice'] == "N/A") ? 'checked' : '';
$output .= '<td style="border:1px solid black;"><input type="checkbox" name="LawCitations" '.$Water_FlowMeterDevice3.'></label><center></td>';
$output .= '<td style="border:1px solid black;">'.$value["Water_FlowMeterDeviceText"].'</td>';
$output .= '</tr>';

$output .= '<tr>';
$output .= '<td style="border:1px solid black;border-top: none;border-bottom:none;"><label"><label></td>';
$output .= '<td style="border:1px solid black;"><label">Certified septage siphoning hauled by accredited service provider. <label></td>';
$Water_CertifiedSiphoning1 = ($value['Water_CertifiedSiphoning'] == "Yes") ? 'checked' : '';
$output .= '<td style="border:1px solid black;"><input type="checkbox" name="LawCitations" '.$Water_CertifiedSiphoning1.'></label></td>';
$Water_CertifiedSiphoning2 = ($value['Water_CertifiedSiphoning'] == "No") ? 'checked' : '';
$output .= '<td style="border:1px solid black;"><input type="checkbox" name="LawCitations" '.$Water_CertifiedSiphoning2.'></label><center></td>';
$Water_CertifiedSiphoning3 = ($value['Water_CertifiedSiphoning'] == "N/A") ? 'checked' : '';
$output .= '<td style="border:1px solid black;"><input type="checkbox" name="LawCitations" '.$Water_CertifiedSiphoning3.'></label><center></td>';
$output .= '<td style="border:1px solid black;">'.$value["Water_CertifiedSiphoningText"].'</td>';
$output .= '</tr>';

$output .= '<tr>';
$output .= '<td style="border:1px solid black;"><label>Effluent Test Results (if applicable)</label></td>';
$output .= '<td style="border:1px solid black;"><label">In compliance with effluent standards<label></td>';
$Water_ComplianceEffluent1 = ($value['Water_ComplianceEffluent'] == "Yes") ? 'checked' : '';
$output .= '<td style="border:1px solid black;"><input type="checkbox" name="LawCitations" '.$Water_ComplianceEffluent1.'></label></td>';
$Water_ComplianceEffluent2 = ($value['Water_ComplianceEffluent'] == "No") ? 'checked' : '';
$output .= '<td style="border:1px solid black;"><input type="checkbox" name="LawCitations" '.$Water_ComplianceEffluent2.'></label><center></td>';
$Water_ComplianceEffluent3 = ($value['Water_ComplianceEffluent'] == "N/A") ? 'checked' : '';
$output .= '<td style="border:1px solid black;"><input type="checkbox" name="LawCitations" '.$Water_ComplianceEffluent3.'></label><center></td>';
$output .= '<td style="border:1px solid black;">'.$value["Water_ComplianceEffluentText"].'</td>';
$output .= '</tr>';


$output .= '<tr>';
$output .= '<td style="border:1px solid black;"><label>Ambient water quality monitoring (if applicable)
</label></td>';
$output .= '<td style="border:1px solid black;"><label">With ambient water quality monitoring results.<label></td>';
$Water_AmbientQualityMonitoring1 = ($value['Water_AmbientQualityMonitoring'] == "Yes") ? 'checked' : '';
$output .= '<td style="border:1px solid black;"><input type="checkbox" name="LawCitations" '.$Water_AmbientQualityMonitoring1.'></label></td>';
$Water_AmbientQualityMonitoring2 = ($value['Water_AmbientQualityMonitoring'] == "No") ? 'checked' : '';
$output .= '<td style="border:1px solid black;"><input type="checkbox" name="LawCitations" '.$Water_AmbientQualityMonitoring2.'></label><center></td>';
$Water_AmbientQualityMonitoring3 = ($value['Water_AmbientQualityMonitoring'] == "N/A") ? 'checked' : '';
$output .= '<td style="border:1px solid black;"><input type="checkbox" name="LawCitations" '.$Water_AmbientQualityMonitoring3.'></label><center></td>';
$output .= '<td style="border:1px solid black;">'.$value["Water_AmbientQualityMonitoringText"].'</td>';
$output .= '</tr>';

$output .= '<tr>';
$output .= '<td style="border:1px solid black;"><label>Wastewater charge system (if applicable)
</label></td>';
$output .= '<td style="border:1px solid black;"><label">Payment of wastewater charges<label></td>';
$Water_PaymentWastewater1 = ($value['Water_PaymentWastewater'] == "Yes") ? 'checked' : '';
$output .= '<td style="border:1px solid black;"><input type="checkbox" name="LawCitations" '.$Water_PaymentWastewater1.'></label></td>';
$Water_PaymentWastewater2 = ($value['Water_PaymentWastewater'] == "No") ? 'checked' : '';
$output .= '<td style="border:1px solid black;"><input type="checkbox" name="LawCitations" '.$Water_PaymentWastewater2.'></label><center></td>';
$Water_PaymentWastewater3 = ($value['Water_PaymentWastewater'] == "N/A") ? 'checked' : '';
$output .= '<td style="border:1px solid black;"><input type="checkbox" name="LawCitations" '.$Water_PaymentWastewater3.'></label><center></td>';
$output .= '<td style="border:1px solid black;">'.$value["Water_PaymentWastewaterText"].'</td>';
$output .= '</tr>';
$output .= '</tbody>';
$output .= '</table>';

// ---------------------------------------------------------------------------------------- WATER END



// ------------------------------------------------------------------------------------------- SWM START
$output .= '<br><table style="width: 100%;">';
$output .= '<tbody>';
$output .= '<tr>';
$output .= '<td style="border: 1px solid black;background-color:#F4B484; width: 30%;" rowspan="2">';
$output .= '<center><b><label>Applicable Laws and Citations<label>';
$output .= '</td>';
$output .= '<td style="border:1px solid black;background-color:#F4B484; width: 30%;" rowspan="2">';
$output .=  '<center><b><label>Compliance Requirements<label>';
$output .= '</td>';
$output .= '<td style="border:1px solid black;background-color:#F4B484; width: 10%;" colspan="3">';
$output .= '<center><b><label>Compliant<label>';
$output .= '</td>';
$output .= '<td style="border:1px solid black;background-color:#F4B484; width: 23%;" rowspan="2">';
$output .= '<center><b><label>Remarks<label>';
$output .= '</td>';
$output .= '</tr>';

$output .= '<tr>';
$output .= '<td style="border:1px solid black;background-color:#F4B484;><center><b><label></label></td>';
$output .= '<td style="border:1px solid black;background-color:#F4B484;><center><b><label>Yes</label></td>';
$output .= '<td style="border:1px solid black;background-color:#F4B484;><center><b><label>C</label></td>';
$output .= '<td style="border:1px solid black;background-color:#F4B484;><center><b><label>No</label></td>';
$output .= '<td style="border:1px solid black;background-color:#F4B484;><center><b><label>E</label></td>';
$output .= '<td style="border:1px solid black;background-color:#F4B484;><center><b><label>N/A</label></td>';
$output .= '</tr>';


$output .= '<tr>';
$output .= '<td style="border:1px solid black;" colspan="6"><label><b>RA 9003: Ecological Solid Waste Act</label></td>';
$output .= '</tr>';


$output .= '<tr>';
$output .= '<td style="border:1px solid black;"><label>Waste Segregation </label></td>';
$output .= '<td style="border:1px solid black;"><label">Practice of Waste Segregation<label></td>';
$SWM_WasteSegregation1 = ($value['SWM_WasteSegregation'] == "Yes") ? 'checked' : '';
$output .= '<td style="border:1px solid black;"><input type="checkbox" name="LawCitations" '.$SWM_WasteSegregation1.'></label></td>';
$SWM_WasteSegregation2 = ($value['SWM_WasteSegregation'] == "No") ? 'checked' : '';
$output .= '<td style="border:1px solid black;"><input type="checkbox" name="LawCitations" '.$SWM_WasteSegregation2.'></label><center></td>';
$SWM_WasteSegregation3 = ($value['SWM_WasteSegregation'] == "N/A") ? 'checked' : '';
$output .= '<td style="border:1px solid black;"><input type="checkbox" name="LawCitations" '.$SWM_WasteSegregation3.'></label><center></td>';
$output .= '<td style="border:1px solid black;">'.$value["SWM_WasteSegregationText"].'</td>';
$output .= '</tr>';

$output .= '<tr>';
$output .= '<td style="border:1px solid black;"><label>Solid Waste Disposal Facilities</label></td>';
$output .= '<td style="border:1px solid black;"><label">Installation of necessary controls for waste treatment and disposal facility<label></td>';
$SWM_WasteDisposalFacilities1 = ($value['SWM_WasteDisposalFacilities'] == "Yes") ? 'checked' : '';
$output .= '<td style="border:1px solid black;"><input type="checkbox" name="LawCitations" '.$SWM_WasteDisposalFacilities1.'></label></td>';
$SWM_WasteDisposalFacilities2 = ($value['SWM_WasteDisposalFacilities'] == "No") ? 'checked' : '';
$output .= '<td style="border:1px solid black;"><input type="checkbox" name="LawCitations" '.$SWM_WasteDisposalFacilities2.'></label><center></td>';
$SWM_WasteDisposalFacilities3 = ($value['SWM_WasteDisposalFacilities'] == "N/A") ? 'checked' : '';
$output .= '<td style="border:1px solid black;"><input type="checkbox" name="LawCitations" '.$SWM_WasteDisposalFacilities3.'></label><center></td>';
$output .= '<td style="border:1px solid black;">'.$value["SWM_WasteDisposalFacilitiesText"].'</td>';
$output .= '</tr>';
$output .= '<tr>';
$output .= '<td style="border:1px solid black;" colspan="6"><label><b>Pollution Control Officer Accreditation</label></td>';
$output .= '</tr>';
$output .= '<tr>';
$output .= '<td style="border:1px solid black;"><label>DAO 1992-26 or Revised Guidelines on PCO Accreditation</label></td>';
$output .= '<td style="border:1px solid black;"><label">Valid Accreditation of PCO<label></td>';
$PCO_Guidelines1 = ($value['PCO_Guidelines'] == "Yes") ? 'checked' : '';
$output .= '<td style="border:1px solid black;"><input type="checkbox" name="LawCitations" '.$PCO_Guidelines1.'></label></td>';
$PCO_Guidelines2 = ($value['PCO_Guidelines'] == "No") ? 'checked' : '';
$output .= '<td style="border:1px solid black;"><input type="checkbox" name="LawCitations" '.$PCO_Guidelines2.'></label><center></td>';
$PCO_Guidelines3 = ($value['PCO_Guidelines'] == "N/A") ? 'checked' : '';
$output .= '<td style="border:1px solid black;"><input type="checkbox" name="LawCitations" '.$PCO_Guidelines3.'></label><center></td>';
$output .= '<td style="border:1px solid black;">'.$value["PCO_GuidelinesText"].'</td>';
$output .= '</tr>';

$output .= '<tr>';
$output .= '<td style="border:1px solid black;" colspan="6"><label><b>Self-Monitoring Report</label></td>';
$output .= '</tr>';

$output .= '<tr>';
$output .= '<td style="border:1px solid black;"><label>DAO 2003-27 </label></td>';
$output .= '<td style="border:1px solid black;"><label">Complete and Timely submission of SMR’s<label></td>';
$DAO_SMRSubmission1 = ($value['DAO_SMRSubmission'] == "Yes") ? 'checked' : '';
$output .= '<td style="border:1px solid black;"><input type="checkbox" name="LawCitations" '.$DAO_SMRSubmission1.'></label></td>';
$DAO_SMRSubmission2 = ($value['DAO_SMRSubmission'] == "No") ? 'checked' : '';
$output .= '<td style="border:1px solid black;"><input type="checkbox" name="LawCitations" '.$DAO_SMRSubmission2.'></label><center></td>';
$DAO_SMRSubmission3 = ($value['DAO_SMRSubmission'] == "N/A") ? 'checked' : '';
$output .= '<td style="border:1px solid black;"><input type="checkbox" name="LawCitations" '.$DAO_SMRSubmission3.'></label><center></td>';
$output .= '<td style="border:1px solid black;">'.$value["DAO_SMRSubmissionText"].'</td>';
$output .= '</tr>';

$output .= '</tbody>';
$output .= '</table>';
// ------------------------------------------------------------------------------------------- SWM END






//------------------------------------------------------------------------------------------------- Summary Start
$output .= '<br><p style="font-size: 14px;font-weight:bold;">3.2 Summary of Findings and Observations</p>';
$output .= '<br><p style="font-size: 12px;font-weight:bold;"><i>3.3.1 Environmental Impact Statement System</i></p>';




$output .= '<table style="width: 100%">';
$output .= '<tbody>';

$output .= '<tr>';
$EIS_System = ($value['EIS_System'] == "Compliant") ? 'checked' : '';
$output .= '<div style="display: inline-block;margin-left:10%;padding-top: 12px;"><label><input type="checkbox" name="my_checkbox" '.$EIS_System.'></label></div>'; 
$output .= '<div style="display: inline-block;margin-bottom:2.5px;padding-top: 12px;"><label>Compliant</label></div>';  

$EIS_System1 = ($value['EIS_System'] == "Non-Compliant") ? 'checked' : '';
$output .= '<div style="display: inline-block;margin-left:17%;padding-top: 12px;"><label><input type="checkbox" name="my_checkbox" '.$EIS_System1.'></label></div>'; 
$output .= '<div style="display: inline-block;margin-bottom:2.5px;padding-top: 12px;"><label>Non-Compliant</label></div>';  

$EIS_System2 = ($value['EIS_System'] == "Not Applicable") ? 'checked' : '';
$output .= '<div style="display: inline-block;margin-left:15%;padding-top: 12px;"><label><input type="checkbox" name="my_checkbox" '.$EIS_System2.'></label></div>'; 
$output .= '<div style="display: inline-block;margin-bottom:2.5px;padding-top: 12px;"><label>Not Applicable</label></div>'; 

$output .= '</tr>';
$output .= '</tbody>';
$output .= '</table>';


if ($value['EIS_System'] == "Compliant" OR $value['EIS_System'] == "Non-Compliant") {
$EISS_Data =  $value["EISS_Data"];
$EISS_DataArray = explode(";", $EISS_Data);
$output .= '<table style="margin-left:12%;width:70%;">';
foreach ($EISS_DataArray as $dataEISS) {
    $output .= '<tr><td style="list-style-type: square;"><li>'.$dataEISS.'</li></td></tr>';
}
$output .= '</table>';

}
else {
    $output .= '<div style="margin-left:12%;"><li>'.$value['EIS_System'].'</li></div>';
}



// 
$output .= '<p style="font-size: 13px;font-weight:bold;"><i>3.3.2 Chemicals Management</i></p>';
$output .= '<table style="width: 100%">';
$output .= '<tbody>';

$output .= '<tr>';
$Chemical_Management = ($value['Chemical_Management'] == "Compliant") ? 'checked' : '';
$output .= '<div style="display: inline-block;margin-left:10%;padding-top: 12px;"><label><input type="checkbox" name="my_checkbox" '.$Chemical_Management.'></label></div>'; 
$output .= '<div style="display: inline-block;margin-bottom:2.5px;padding-top: 12px;"><label>Compliant</label></div>';  

$Chemical_Management1 = ($value['Chemical_Management'] == "Non-Compliant") ? 'checked' : '';
$output .= '<div style="display: inline-block;margin-left:17%;padding-top: 12px;"><label><input type="checkbox" name="my_checkbox" '.$Chemical_Management1.'></label></div>'; 
$output .= '<div style="display: inline-block;margin-bottom:2.5px;padding-top: 12px;"><label>Non-Compliant</label></div>';  

$Chemical_Management2 = ($value['Chemical_Management'] == "Not Applicable") ? 'checked' : '';
$output .= '<div style="display: inline-block;margin-left:15%;padding-top: 12px;"><label><input type="checkbox" name="my_checkbox" '.$Chemical_Management2.'></label></div>'; 
$output .= '<div style="display: inline-block;margin-bottom:2.5px;padding-top: 12px;"><label>Not Applicable</label></div>'; 

$output .= '</tr>';
$output .= '</tbody>';
$output .= '</table>';

if($value['Chemical_Management'] == "Compliant" OR $value['Chemical_Management'] == "Non-Compliant"){
    $Chemical_Management_Data =  $value["Chemical_Management_Data"];
    $Chemical_Management_DataArray = explode(";", $Chemical_Management_Data);
    $output .= '<table style="margin-left:12%;width:70%;">';
    foreach ($Chemical_Management_DataArray as $DataChem) {
        $output .= '<tr><td style="list-style-type: square;"><li>'.$DataChem.'</li></td></tr>';
       
    }
    $output .= '</table>';
    }


    
// 

// 
$output .= '<p style="font-size: 13px;font-weight:bold;"><i>3.3.3 Hazardous Waste Management</i></p>';
$output .= '<table style="width: 100%">';
$output .= '<tbody>';

$output .= '<tr>';
$HW_Management = ($value['HW_Management'] == "Compliant") ? 'checked' : '';
$output .= '<div style="display: inline-block;margin-left:10%;padding-top: 12px;"><label><input type="checkbox" name="my_checkbox" '.$HW_Management.'></label></div>'; 
$output .= '<div style="display: inline-block;margin-bottom:2.5px;padding-top: 12px;"><label>Compliant</label></div>';  

$HW_Management1 = ($value['HW_Management'] == "Non-Compliant") ? 'checked' : '';
$output .= '<div style="display: inline-block;margin-left:17%;padding-top: 12px;"><label><input type="checkbox" name="my_checkbox" '.$HW_Management1.'></label></div>'; 
$output .= '<div style="display: inline-block;margin-bottom:2.5px;padding-top: 12px;"><label>Non-Compliant</label></div>';  

$HW_Management2 = ($value['HW_Management'] == "Not Applicable") ? 'checked' : '';
$output .= '<div style="display: inline-block;margin-left:15%;padding-top: 12px;"><label><input type="checkbox" name="my_checkbox" '.$HW_Management2.'></label></div>'; 
$output .= '<div style="display: inline-block;margin-bottom:2.5px;padding-top: 12px;"><label>Not Applicable</label></div>'; 

$output .= '</tr>';
$output .= '</tbody>';
$output .= '</table>';


if($value['HW_Management'] == "Compliant" OR $value['HW_Management'] == "Non-Compliant"){
    $HW_Management_Data =  $value["HW_Management_Data"];
    $HW_Management_DataArray = explode(";", $HW_Management_Data);
    $output .= '<table style="margin-left:12%;width:70%;">';
    foreach ($HW_Management_DataArray as $DataHW) {
        $output .= '<tr><td style="list-style-type: square;"><li>'.$DataHW.'</li></td></tr>';
    }
    $output .= '</table>';
    }

    
// 


// 
$output .= '<p style="font-size: 13px;font-weight:bold;"><i>3.3.4 Air Quality Management</i></p>';
$output .= '<table style="width: 100%">';
$output .= '<tbody>';

$output .= '<tr>';
$AQ_Management = ($value['AQ_Management'] == "Compliant") ? 'checked' : '';
$output .= '<div style="display: inline-block;margin-left:10%;padding-top: 12px;"><label><input type="checkbox" name="my_checkbox" '.$AQ_Management.'></label></div>'; 
$output .= '<div style="display: inline-block;margin-bottom:2.5px;padding-top: 12px;"><label>Compliant</label></div>';  

$AQ_Management1 = ($value['AQ_Management'] == "Non-Compliant") ? 'checked' : '';
$output .= '<div style="display: inline-block;margin-left:17%;padding-top: 12px;"><label><input type="checkbox" name="my_checkbox" '.$AQ_Management1.'></label></div>'; 
$output .= '<div style="display: inline-block;margin-bottom:2.5px;padding-top: 12px;"><label>Non-Compliant</label></div>';  

$AQ_Management3 = ($value['AQ_Management'] == "Not Applicable") ? 'checked' : '';
$output .= '<div style="display: inline-block;margin-left:15%;padding-top: 12px;"><label><input type="checkbox" name="my_checkbox" '.$AQ_Management3.'></label></div>'; 
$output .= '<div style="display: inline-block;margin-bottom:2.5px;padding-top: 12px;"><label>Not Applicable</label></div>'; 

$output .= '</tr>';
$output .= '</tbody>';
$output .= '</table>';

if($value['AQ_Management'] == "Compliant" OR $value['AQ_Management'] == "Non-Compliant"){
    $AQ_Management_Data =  $value["AQ_Management_Data"];
    $AQ_Management_DataArray = explode(";", $AQ_Management_Data);
    $output .= '<table style="margin-left:12%;width:70%;">';

    foreach ($AQ_Management_DataArray as $DataAQ) {
        $output .= '<tr><td style="list-style-type: square;"><li>'.$DataAQ.'</li></td></tr>';
    }
    $output .= '</table>';
    }

// 


// 
$output .= '<p style="font-size: 13px;font-weight:bold;"><i>3.3.5 Water Quality Management</i></p>';
$output .= '<table style="width: 100%">';
$output .= '<tbody>';

$output .= '<tr>';
$WQ_Management = ($value['WQ_Management'] == "Compliant") ? 'checked' : '';
$output .= '<div style="display: inline-block;margin-left:10%;padding-top: 12px;"><label><input type="checkbox" name="my_checkbox" '.$WQ_Management.'></label></div>'; 
$output .= '<div style="display: inline-block;margin-bottom:2.5px;padding-top: 12px;"><label>Compliant</label></div>';  

$WQ_Management1 = ($value['WQ_Management'] == "Non-Compliant") ? 'checked' : '';
$output .= '<div style="display: inline-block;margin-left:17%;padding-top: 12px;"><label><input type="checkbox" name="my_checkbox" '.$WQ_Management1.'></label></div>'; 
$output .= '<div style="display: inline-block;margin-bottom:2.5px;padding-top: 12px;"><label>Non-Compliant</label></div>';  

$WQ_Management2 = ($value['WQ_Management'] == "Not Applicable") ? 'checked' : '';
$output .= '<div style="display: inline-block;margin-left:15%;padding-top: 12px;"><label><input type="checkbox" name="my_checkbox" '.$WQ_Management2.'></label></div>'; 
$output .= '<div style="display: inline-block;margin-bottom:2.5px;padding-top: 12px;"><label>Not Applicable</label></div>'; 

$output .= '</tr>';
$output .= '</tbody>';
$output .= '</table>';

if($value['WQ_Management'] == "Compliant" OR $value['WQ_Management'] == "Non-Compliant"){
    $WQ_Management_Data =  $value["WQ_Management_Data"];
    $WQ_Management_DataArray = explode(";", $WQ_Management_Data);
    $output .= '<table style="margin-left:12%;width:70%;">';

    foreach ($WQ_Management_DataArray as $DataWQ) {
        $output .= '<tr><td style="list-style-type: square;"><li>'.$DataWQ.'</li></td></tr>';
    }
    $output .= '</table>';
    }

// 


// 
$output .= '<p style="font-size: 13px;font-weight:bold;"><i>3.3.6 Solid Waste Management</i></p>';
$output .= '<table style="width: 100%">';
$output .= '<tbody>';

$output .= '<tr>';
$SW_Management = ($value['SW_Management'] == "Compliant") ? 'checked' : '';
$output .= '<div style="display: inline-block;margin-left:10%;padding-top: 12px;"><label><input type="checkbox" name="my_checkbox" '.$SW_Management.'></label></div>'; 
$output .= '<div style="display: inline-block;margin-bottom:2.5px;padding-top: 12px;"><label>Compliant</label></div>';  

$SW_Management1 = ($value['SW_Management'] == "Non-Compliant") ? 'checked' : '';
$output .= '<div style="display: inline-block;margin-left:17%;padding-top: 12px;"><label><input type="checkbox" name="my_checkbox" '.$SW_Management1.'></label></div>'; 
$output .= '<div style="display: inline-block;margin-bottom:2.5px;padding-top: 12px;"><label>Non-Compliant</label></div>';  

$SW_Management2 = ($value['SW_Management'] == "Not Applicable") ? 'checked' : '';
$output .= '<div style="display: inline-block;margin-left:15%;padding-top: 12px;"><label><input type="checkbox" name="my_checkbox" '.$SW_Management2.'></label></div>'; 
$output .= '<div style="display: inline-block;margin-bottom:2.5px;padding-top: 12px;"><label>Not Applicable</label></div>'; 

$output .= '</tr>';
$output .= '</tbody>';
$output .= '</table>';

if($value['SW_Management'] == "Compliant" OR $value['SW_Management'] == "Non-Compliant"){
    $SW_Management_Data =  $value["SW_Management_Data"];
    $SW_Management_DataArray = explode(";", $SW_Management_Data);
    $output .= '<table style="margin-left:12%;width:70%;">';
    $countSW = 1.;
    foreach ($SW_Management_DataArray as $DataSW) {
        $output .= '<tr><td style="list-style-type: square;"><li>'.$DataSW.'</li></td></tr>';
        $countSW++;
    }
    $output .= '</table>';
    }



// 

// 
$output .= '<p style="font-size: 13px;font-weight:bold;"><i>3.3.7 Commitment/s from previous Technical Conference</i></p>';
$output .= '<table style="width: 100%">';
$output .= '<tbody>';

$output .= '<tr>';
$Commitment_TechCon = ($value['Commitment_TechCon'] == "Compliant") ? 'checked' : '';
$output .= '<div style="display: inline-block;margin-left:10%;padding-top: 12px;"><label><input type="checkbox" name="my_checkbox" '.$Commitment_TechCon.'></label></div>'; 
$output .= '<div style="display: inline-block;margin-bottom:2.5px;padding-top: 12px;"><label>Compliant</label></div>';  

$Commitment_TechCon1 = ($value['Commitment_TechCon'] == "Non-Compliant") ? 'checked' : '';
$output .= '<div style="display: inline-block;margin-left:17%;padding-top: 12px;"><label><input type="checkbox" name="my_checkbox" '.$Commitment_TechCon1.'></label></div>'; 
$output .= '<div style="display: inline-block;margin-bottom:2.5px;padding-top: 12px;"><label>Non-Compliant</label></div>';  

$Commitment_TechCon2 = ($value['Commitment_TechCon'] == "Not Applicable") ? 'checked' : '';
$output .= '<div style="display: inline-block;margin-left:15%;padding-top: 12px;"><label><input type="checkbox" name="my_checkbox" '.$Commitment_TechCon2.'></label></div>'; 
$output .= '<div style="display: inline-block;margin-bottom:2.5px;padding-top: 12px;"><label>Not Applicable</label></div>'; 

$output .= '</tr>';
$output .= '</tbody>';
$output .= '</table>';

if($value['Commitment_TechCon'] == "Compliant" OR $value['Commitment_TechCon'] == "Non-Compliant"){
    $Commitment_TechCon_Data =  $value["Commitment_TechCon_Data"];
    $Commitment_TechCon_DataArray = explode(";", $Commitment_TechCon_Data);
    $output .= '<table style="margin-left:12%;width:70%;">';
    foreach ($Commitment_TechCon_DataArray as $DataTC) {
        $output .= '<tr><td style="list-style-type: square;"><li>'.$DataTC.'</li></td></tr>';
    }
    $output .= '</table>';
    }

// 


$output .= '<p style="font-size: 14px;font-weight:bold;">4. Recommendations</p>';
$output .= '<table style="width: 100%">';
$output .= '<tbody>';

$output .= '<tr>';
$Rec_ConfirmatorySampling = ($value['Rec_ConfirmatorySampling'] == "true") ? 'checked' : '';
$output .= '<div style="display: inline-block;margin-left:10%;"><label><input type="checkbox" name="my_checkbox" '.$Rec_ConfirmatorySampling.'></label></div>'; 
$output .= '<div style="display: inline-block;margin-bottom:2.5px;"><label>For confirmatory sampling/ further monitoring</label></div>';  


$output .= '</tr>';
$output .= '</tbody>';
$output .= '</table>';
if($value['Rec_ConfirmatorySampling'] == "true"){
    $Rec_ConfirmatorySampling_Data =  $value["Rec_ConfirmatorySampling_Data"];
    $Rec_ConfirmatorySampling_DataArray = explode(";", $Rec_ConfirmatorySampling_Data);
    $output .= '<table style="margin-left:15%;width:70%;">';
    foreach ($Rec_ConfirmatorySampling_DataArray as $Rec_ConfirmatorySampling_Data) {
        $output .= '<tr><td style="list-style-type: square;"><li>'.$Rec_ConfirmatorySampling_Data.'</li></td></tr>';
    }
    $output .= '</table>';
    }


$output .= '<table style="width: 100%">';
$output .= '<tbody>';
$output .= '<tr>';
$Rec_TempPtoDp = ($value['Rec_TempPtoDp'] == "true") ? 'checked' : '';
$output .= '<div style="display: inline-block;margin-left:10%;"><label><input type="checkbox" name="my_checkbox" '.$Rec_TempPtoDp.'></label></div>'; 
$output .= '<div style="display: inline-block;"><label>For issuance of Temporary/Renewal of Permit to Operate (POA) and/or Renewal  of </label></div>';  
$output .= '<div style="display: inline-block;margin-left:12.3%;"><label>Discharge Permit (DP)</label></div>';  


$output .= '</tr>';
$output .= '</tbody>';
$output .= '</table>';
if($value['Rec_TempPtoDp'] == "true"){
    $Rec_TempPtoDp_Data =  $value["Rec_TempPtoDp_Data"];
    $Rec_TempPtoDp_DataArray = explode(";", $Rec_TempPtoDp_Data);
    $output .= '<table style="margin-left:15%;width:70%;">';
    foreach ($Rec_TempPtoDp_DataArray as $DataTempPtoDp) {
        $output .= '<tr><td style="list-style-type: square;"><li>'.$DataTempPtoDp.'</li></td></tr>';
    }
    $output .= '</table>';
    }


$output .= '<table style="width: 100%">';
$output .= '<tbody>';
$output .= '<tr>';
$Rec_PcoSem = ($value['Rec_PcoSem'] == "true") ? 'checked' : '';
$output .= '<div style="display: inline-block;margin-left:10%;"><label><input type="checkbox" name="my_checkbox" '.$Rec_PcoSem.'></label></div>'; 
$output .= '<div style="display: inline-block;margin-bottom:2.5px;"><label>For accreditation of Pollution Control Officer (PCO)/Seminar requirement of Managing Head</label></div>';  


$output .= '</tr>';
$output .= '</tbody>';
$output .= '</table>';
if($value['Rec_PcoSem'] == "true"){
    $Rec_PcoSem_Data =  $value["Rec_PcoSem_Data"];
    $Rec_PcoSem_DataArray = explode(";", $Rec_PcoSem_Data);
    $output .= '<table style="margin-left:15%;width:70%;">';
    foreach ($Rec_PcoSem_DataArray as $DataRec_PcoSem) {
        $output .= '<tr><td style="list-style-type: square;"><li>'.$DataRec_PcoSem.'</li></td></tr>';
    }
    $output .= '</table>';
    }


    $output .= '<table style="width: 100%">';
$output .= '<tbody>';
$output .= '<tr>';
$Rec_SMRCMR_Submission = ($value['Rec_SMRCMR_Submission'] == "true") ? 'checked' : '';
$output .= '<div style="display: inline-block;margin-left:10%;"><label><input type="checkbox" name="my_checkbox" '.$Rec_SMRCMR_Submission.'></label></div>'; 
$output .= '<div style="display: inline-block;margin-bottom:2.5px;"><label>For submission of Self Monitoring Report (SMR)/Compliance Monitoring Report (CMR) online.</label></div>';  


$output .= '</tr>';
$output .= '</tbody>';
$output .= '</table>';
if($value['Rec_SMRCMR_Submission'] == "true"){
    $Rec_SMRCMR_Submission_Data =  $value["Rec_SMRCMR_Submission_Data"];
    $Rec_SMRCMR_Submission_DataArray = explode(";", $Rec_SMRCMR_Submission_Data);
    $output .= '<table style="margin-left:15%;width:70%;">';
    foreach ($Rec_SMRCMR_Submission_DataArray as $DataRec_SMRCMR_Submission) {
        $output .= '<tr><td style="list-style-type: square;"><li>'.$DataRec_SMRCMR_Submission.'</li></td></tr>';
    }
    $output .= '</table>';
    }







$output .= '<table style="width: 100%">';
$output .= '<tbody>';
$output .= '<tr>';
$Rec_NOMTC = ($value['Rec_NOMTC'] == "true") ? 'checked' : '';
$output .= '<div style="display: inline-block;margin-left:10%;"><label><input type="checkbox" name="my_checkbox" '.$Rec_NOMTC.'></label></div>'; 
$output .= '<div style="display: inline-block;margin-bottom:2.5px;"><label> For issuance of Notice of Meeting (NOM)/Technical Conference (TC)</label></div>';  


$output .= '</tr>';
$output .= '</tbody>';
$output .= '</table>';
if($value['Rec_NOMTC'] == "true"){
    $Rec_NOMTC_Data =  $value["Rec_NOMTC_Data"];
    $Rec_NOMTC_DataArray = explode(";", $Rec_NOMTC_Data);
    $output .= '<table style="margin-left:15%;width:70%;">';
    foreach ($Rec_NOMTC_DataArray as $DataRec_NOMTC) {
        $output .= '<tr><td style="list-style-type: square;"><li>'.$DataRec_NOMTC.'</li></td></tr>';
    }
    $output .= '</table>';
}


$output .= '<table style="width: 100%">';
$output .= '<tbody>';
$output .= '<tr>';
$Rec_NOVIssuance = ($value['Rec_NOVIssuance'] == "true") ? 'checked' : '';
$output .= '<div style="display: inline-block;margin-left:10%;"><label><input type="checkbox" name="my_checkbox" '.$Rec_NOVIssuance.'></label></div>'; 
$output .= '<div style="display: inline-block;margin-bottom:2.5px;"><label>For issuance of Notice of Violation (NOV)</label></div>';  


$output .= '</tr>';
$output .= '</tbody>';
$output .= '</table>';
if($value['Rec_NOVIssuance'] == "true"){
    $Rec_NOVIssuance_Data =  $value["Rec_NOVIssuance_Data"];
    $Rec_NOVIssuance_DataArray = explode(";", $Rec_NOVIssuance_Data);
    $output .= '<table style="margin-left:15%;width:70%;">';
    foreach ($Rec_NOVIssuance_DataArray as $DataRec_NOVIssuance) {
        $output .= '<tr><td style="list-style-type: square;"><li>'.$DataRec_NOVIssuance.'</li></td></tr>';
    }
    $output .= '</table>';
}

$output .= '<table style="width: 100%">';
$output .= '<tbody>';
$output .= '<tr>';
$Rec_Issuance5DayCDO = ($value['Rec_Issuance5DayCDO'] == "true") ? 'checked' : '';
$output .= '<div style="display: inline-block;margin-left:10%;"><label><input type="checkbox" name="my_checkbox" '.$Rec_Issuance5DayCDO.'></label></div>'; 
$output .= '<div style="display: inline-block;margin-bottom:2.5px;"><label>For issuance of suspension of ECC/ 5-day CDO</label></div>';  


$output .= '</tr>';
$output .= '</tbody>';
$output .= '</table>';
if($value['Rec_Issuance5DayCDO'] == "true"){
    $Rec_Issuance5DayCDO_Data =  $value["Rec_Issuance5DayCDO_Data"];
    $Rec_Issuance5DayCDO_DataArray = explode(";", $Rec_Issuance5DayCDO_Data);
    $output .= '<table style="margin-left:15%;width:70%;">';
    foreach ($Rec_Issuance5DayCDO_DataArray as $DataRec_Issuance5DayCDO) {
        $output .= '<tr><td style="list-style-type: square;"><li>'.$DataRec_Issuance5DayCDO.'</li></td></tr>';
    }
    $output .= '</table>';
}


$output .= '<table style="width: 100%;">';
$output .= '<tbody>';
$output .= '<tr>';
$Rec_EndorsementPAB = ($value['Rec_EndorsementPAB'] == "true") ? 'checked' : '';
$output .= '<div style="display: inline-block;margin-left:10%;"><label><input type="checkbox" name="my_checkbox" '.$Rec_EndorsementPAB.'></label></div>'; 
$output .= '<div style="display: inline-block;margin-bottom:2.5px;"><label>For endorsement to Pollution Adjudication Board (PAB)</label></div>';  


$output .= '</tr>';
$output .= '</tbody>';
$output .= '</table>';
if($value['Rec_EndorsementPAB'] == "true"){
    $Rec_EndorsementPAB_Data =  $value["Rec_EndorsementPAB_Data"];
    $Rec_EndorsementPAB_DataArray = explode(";", $Rec_EndorsementPAB_Data);
    $output .= '<table style="margin-left:15%;width:70%;">';
    foreach ($Rec_EndorsementPAB_DataArray as $DataRec_EndorsementPAB) {
        $output .= '<tr><td style="list-style-type: square;"><li>'.$DataRec_EndorsementPAB.'</li></td></tr>';
    }
    $output .= '</table>';
}




$output .= '<table style="width: 100%;">';
$output .= '<tbody>';
$output .= '<tr>';
$OtherRecommendations = ($value['OtherRecommendations'] == "true") ? 'checked' : '';
$output .= '<div style="display: inline-block;margin-left:10%;"><label><input type="checkbox" name="my_checkbox" '.$OtherRecommendations.'></label></div>'; 
$output .= '<div style="display: inline-block;margin-bottom:2.5px;"><label>Other Recommendations</label></div>';  


$output .= '</tr>';
$output .= '</tbody>';
$output .= '</table>';
if($value['OtherRecommendations'] == "true"){
    $OtherRecommendations_Data =  $value["OtherRecommendations_Data"];
    $OtherRecommendations_DataArray = explode(";", $OtherRecommendations_Data);
    $output .= '<table style="margin-left:15%;width:70%;">';
    foreach ($OtherRecommendations_DataArray as $DataOtherRecommendations) {
        $output .= '<tr><td style="list-style-type: square;"><li>'.$DataOtherRecommendations.'</li></td></tr>';
    }
    $output .= '</table>';
}

























// Signatories
switch ($value['SectionChief']) {
    case 'CARLOS A. CAYANONG':
        switch ($value["Inspector"]) {
            case 'JOSEPH R. AURE':
                $output .= '<table>';
                $output .= '<tr>';
                $output .= '<td><div style="width:50%"><br><br><br><br><label>Submitted by:</label></div></td>';
                $output .= '<td><div style="width:50%"><br><br><br><br><label>Recommending Approval:</label></div></td>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td><div><br><br><div style=""><u><b>'.$value["Inspector"].'</div></td>';
                $output .= '<td><div><br><br><div style=""><u><b>ENGR. '.$value["SectionChief"].'</div></td>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td><div style="margin-top: -20px;"><div style="">&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;EMS I</div></td>';
                $output .= '<td><div style="margin-top: -20px;"><div style="">&nbsp; &nbsp; &nbsp;Engineer IV/Chief, WAQMS</div></td>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td><div style="width:50%"><br><br><label>Approval:</label></div></td>';
                $output .= '<td><div style="width:50%"><br><br><label>Noted:</label></div></td>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td><div><br><br><div style=""><u><b>FOR. '.$value["DivisionChief"].'</div></td>';
                $output .= '<td><div><br><br><div style=""><u><b>'.$value["RegionalDirector"].'</div></td>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td><div style="margin-top: -20px;"><div style="">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;OIC Chief, EMED</div></td>';
                $output .= '<td><div style="margin-top: -20px;"><div style="">&nbsp; &nbsp; &nbsp; Regional Director</div></td>';
                $output .= '</tr>';
                $output .= '</table>';
                break;
            
                case 'JEROME C. SALVADOR':
                $output .= '<table>';
                $output .= '<tr>';
                $output .= '<td><div style="width:50%"><br><br><br><br><label>Submitted by:</label></div></td>';
                $output .= '<td><div style="width:50%"><br><br><br><br><label>Recommending Approval:</label></div></td>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td><div><br><br><div style=""><u><b>'.$value["Inspector"].'</div></td>';
                $output .= '<td><div><br><br><div style=""><u><b>ENGR. '.$value["SectionChief"].'</div></td>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td><div style="margin-top: -20px;"><div style="">&nbsp; &nbsp; &nbsp;&nbsp;Monitoring Officer</div></td>';
                $output .= '<td><div style="margin-top: -20px;"><div style="">&nbsp; &nbsp; &nbsp;Engineer IV/Chief, WAQMS</div></td>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td><div style="width:50%"><br><br><label>Approval:</label></div></td>';
                $output .= '<td><div style="width:50%"><br><br><label>Noted:</label></div></td>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td><div><br><br><div style=""><u><b>FOR. '.$value["DivisionChief"].'</div></td>';
                $output .= '<td><div><br><br><div style=""><u><b>'.$value["RegionalDirector"].'</div></td>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td><div style="margin-top: -20px;"><div style="">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;OIC Chief, EMED</div></td>';
                $output .= '<td><div style="margin-top: -20px;"><div style="">&nbsp; &nbsp; &nbsp; Regional Director</div></td>';
                $output .= '</tr>';
                $output .= '</table>';
                break;

                case 'SHARMAINE I. SILLEZA':
                $output .= '<table>';
                $output .= '<tr>';
                $output .= '<td><div style="width:50%"><br><br><br><br><label>Submitted by:</label></div></td>';
                $output .= '<td><div style="width:50%"><br><br><br><br><label>Recommending Approval:</label></div></td>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td><div><br><br><div style=""><u><b>'.$value["Inspector"].'</div></td>';
                $output .= '<td><div><br><br><div style=""><u><b>ENGR. '.$value["SectionChief"].'</div></td>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td><div style="margin-top: -20px;"><div style="">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;EMS II</div></td>';
                $output .= '<td><div style="margin-top: -20px;"><div style="">&nbsp; &nbsp; &nbsp; Engineer IV/Chief, WAQMS</div></td>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td><div style="width:50%"><br><br><label>Approval:</label></div></td>';
                $output .= '<td><div style="width:50%"><br><br><label>Noted:</label></div></td>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td><div><br><br><div style=""><u><b>FOR. '.$value["DivisionChief"].'</div></td>';
                $output .= '<td><div><br><br><div style=""><u><b>'.$value["RegionalDirector"].'</div></td>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td><div style="margin-top: -20px;"><div style="">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;OIC Chief, EMED</div></td>';
                $output .= '<td><div style="margin-top: -20px;"><div style="">&nbsp; &nbsp; &nbsp; Regional Director</div></td>';
                $output .= '</tr>';
                $output .= '</table>';
                break;

                case 'LEDANE JOY Y. LAURENTE':
                $output .= '<table>';
                $output .= '<tr>';
                $output .= '<td><div style="width:50%"><br><br><br><br><label>Submitted by:</label></div></td>';
                $output .= '<td><div style="width:50%"><br><br><br><br><label>Recommending Approval:</label></div></td>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td><div><br><br><div style=""><u><b>'.$value["Inspector"].'</div></td>';
                $output .= '<td><div><br><br><div style=""><u><b>ENGR. '.$value["SectionChief"].'</div></td>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td><div style="margin-top: -20px;"><div style="">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Engineer III</div></td>';
                $output .= '<td><div style="margin-top: -20px;"><div style="">&nbsp; &nbsp; &nbsp; Engineer IV/Chief, WAQMS</div></td>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td><div style="width:50%"><br><br><label>Approval:</label></div></td>';
                $output .= '<td><div style="width:50%"><br><br><label>Noted:</label></div></td>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td><div><br><br><div style=""><u><b>FOR. '.$value["DivisionChief"].'</div></td>';
                $output .= '<td><div><br><br><div style=""><u><b>'.$value["RegionalDirector"].'</div></td>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td><div style="margin-top: -20px;"><div style="">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;OIC Chief, EMED</div></td>';
                $output .= '<td><div style="margin-top: -20px;"><div style="">&nbsp; &nbsp; &nbsp; Regional Director</div></td>';
                $output .= '</tr>';
                $output .= '</table>';
                break;

                case 'JO ANNE JOY M. DAÑAL-VILLERO':
                $output .= '<table>';
                $output .= '<tr>';
                $output .= '<td><div style="width:50%"><br><br><br><br><label>Submitted by:</label></div></td>';
                $output .= '<td><div style="width:50%"><br><br><br><br><label>Recommending Approval:</label></div></td>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td><div><br><br><div style=""><u><b>'.$value["Inspector"].'</div></td>';
                $output .= '<td><div><br><br><div style=""><u><b>ENGR. '.$value["SectionChief"].'</div></td>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td><div style="margin-top: -20px;"><div style="">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Senior EMS</div></td>';
                $output .= '<td><div style="margin-top: -20px;"><div style="">&nbsp; &nbsp; &nbsp; Engineer IV/Chief, WAQMS</div></td>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td><div style="width:50%"><br><br><label>Approval:</label></div></td>';
                $output .= '<td><div style="width:50%"><br><br><label>Noted:</label></div></td>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td><div><br><br><div style=""><u><b>FOR. '.$value["DivisionChief"].'</div></td>';
                $output .= '<td><div><br><br><div style=""><u><b>'.$value["RegionalDirector"].'</div></td>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td><div style="margin-top: -20px;"><div style="">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;OIC Chief, EMED</div></td>';
                $output .= '<td><div style="margin-top: -20px;"><div style="">&nbsp; &nbsp; &nbsp; Regional Director</div></td>';
                $output .= '</tr>';
                $output .= '</table>';
                break;

                case 'SHARMAINE RUTH A. LAUZON':
                $output .= '<table>';
                $output .= '<tr>';
                $output .= '<td><div style="width:50%"><br><br><br><br><label>Submitted by:</label></div></td>';
                $output .= '<td><div style="width:50%"><br><br><br><br><label>Recommending Approval:</label></div></td>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td><div><br><br><div style=""><u><b>'.$value["Inspector"].'</div></td>';
                $output .= '<td><div><br><br><div style=""><u><b>ENGR. '.$value["SectionChief"].'</div></td>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td><div style="margin-top: -20px;"><div style="">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Engineer III</div></td>';
                $output .= '<td><div style="margin-top: -20px;"><div style="">&nbsp; &nbsp; &nbsp; Engineer IV/Chief, WAQMS</div></td>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td><div style="width:50%"><br><br><label>Approval:</label></div></td>';
                $output .= '<td><div style="width:50%"><br><br><label>Noted:</label></div></td>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td><div><br><br><div style=""><u><b>FOR. '.$value["DivisionChief"].'</div></td>';
                $output .= '<td><div><br><br><div style=""><u><b>'.$value["RegionalDirector"].'</div></td>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td><div style="margin-top: -20px;"><div style="">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;OIC Chief, EMED</div></td>';
                $output .= '<td><div style="margin-top: -20px;"><div style="">&nbsp; &nbsp; &nbsp; Regional Director</div></td>';
                $output .= '</tr>';
                $output .= '</table>';
                break;
                
                case 'XAVIER R. LUBIANO':
                $output .= '<table>';
                $output .= '<tr>';
                $output .= '<td><div style="width:50%"><br><br><br><br><label>Submitted by:</label></div></td>';
                $output .= '<td><div style="width:50%"><br><br><br><br><label>Recommending Approval:</label></div></td>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td><div><br><br><div style=""><u><b>'.$value["Inspector"].'</div></td>';
                $output .= '<td><div><br><br><div style=""><u><b>ENGR. '.$value["SectionChief"].'</div></td>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td><div style="margin-top: -20px;"><div style="">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; EMS I</div></td>';
                $output .= '<td><div style="margin-top: -20px;"><div style="">&nbsp; &nbsp; &nbsp; Engineer IV/Chief, WAQMS</div></td>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td><div style="width:50%"><br><br><label>Approval:</label></div></td>';
                $output .= '<td><div style="width:50%"><br><br><label>Noted:</label></div></td>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td><div><br><br><div style=""><u><b>FOR. '.$value["DivisionChief"].'</div></td>';
                $output .= '<td><div><br><br><div style=""><u><b>'.$value["RegionalDirector"].'</div></td>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td><div style="margin-top: -20px;"><div style="">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;OIC Chief, EMED</div></td>';
                $output .= '<td><div style="margin-top: -20px;"><div style="">&nbsp; &nbsp; &nbsp; Regional Director</div></td>';
                $output .= '</tr>';
                $output .= '</table>';
                break;

                // NORTHERN SAMAR
                case 'ROWENA B. PABIA':
                $output .= '<table>';
                $output .= '<tr>';
                $output .= '<td><div style="width:50%"><br><br><br><br><label>Submitted by:</label></div></td>';
                $output .= '<td><div style="width:50%"><br><br><br><br><label>Recommending Approval:</label></div></td>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td><div><br><br><div style=""><u><b>FOR. '.$value["Inspector"].'</div></td>';
                $output .= '<td><div><br><br><div style=""><u><b>ENGR. '.$value["SectionChief"].'</div></td>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td><div style="margin-top: -20px;"><div style="">&nbsp; &nbsp; SR. EMS/ OIC PEMO</div></td>';
                $output .= '<td><div style="margin-top: -20px;"><div style="">&nbsp; &nbsp; &nbsp; Engineer IV/Chief, WAQMS</div></td>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td><div style="width:50%"><br><br><label>Approval:</label></div></td>';
                $output .= '<td><div style="width:50%"><br><br><label>Noted:</label></div></td>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td><div><br><br><div style=""><u><b>FOR. '.$value["DivisionChief"].'</div></td>';
                $output .= '<td><div><br><br><div style=""><u><b>'.$value["RegionalDirector"].'</div></td>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td><div style="margin-top: -20px;"><div style="">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;OIC Chief, EMED</div></td>';
                $output .= '<td><div style="margin-top: -20px;"><div style="">&nbsp; &nbsp; &nbsp; Regional Director</div></td>';
                $output .= '</tr>';
                $output .= '</table>';
                break;


                // E Samar
            case 'GINNALYN A. ESPOSA':
                $output .= '<table>';
                $output .= '<tr>';
                $output .= '<td><div style="width:50%"><br><br><br><br><label>Submitted by:</label></div></td>';
                $output .= '<td><div style="width:50%"><br><br><br><br><label>Reviewed By: </label></div></td>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td><div><br><br><div style=""><u><b>'.$value["Inspector"].'</div></td>';
                $output .= '<td><div><br><br><div style=""><u><b>FOR. '.$value["Checkedby"].'</div></td>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td><div style="margin-top: -20px;"><div style="">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; EMS I</div></td>';
                $output .= '<td><div style="margin-top: -20px;"><div style="">&nbsp; &nbsp; SR. EMS/ OIC PEMO</div></td>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td><div style="width:50%"><br><br><label>Recommending Approval:</label></div></td>';
                $output .= '<td><div style="width:50%"><br><br><label>Approval:</label></div></td>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td><div><br><br><div style=""><u><b>ENGR. '.$value["SectionChief"].'</div></td>';
                $output .= '<td><div><br><br><div style=""><u><b>FOR. '.$value["DivisionChief"].'</div></td>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td><div style="margin-top: -20px;"><div style="">&nbsp; &nbsp; &nbsp;Engineer IV/Chief, WAQMS</div></td>';
                $output .= '<td><div style="margin-top: -20px;"><div style="">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; OIC Chief, EMED</div></td>';
                $output .= '</tr>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td>';
                $output .= '<tr>';
                $output .= '<td><div style="width:50%"><br><br><label>Noted:</label></div></td>';
                $output .= '</tr>';
                $output .= '<td><div><br><br><div style=""><u><b>'.$value["RegionalDirector"].'</div></td>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td><div style="margin-top: -20px;"><div style="">&nbsp; &nbsp; &nbsp; Regional Director</div></td>';
                $output .= '</tr>';
                $output .= '</table>';
            break;


            case 'ANAMERIE D. CAVAÑERO':
                $output .= '<table>';
                $output .= '<tr>';
                $output .= '<td><div style="width:50%"><br><br><br><br><label>Submitted by:</label></div></td>';
                $output .= '<td><div style="width:50%"><br><br><br><br><label>Recommending Approval:</label></div></td>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td><div><br><br><div style=""><u><b>'.$value["Inspector"].'</div></td>';
                $output .= '<td><div><br><br><div style=""><u><b>ENGR. '.$value["SectionChief"].'</div></td>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td><div style="margin-top: -20px;"><div style="">Supervising EMS, PEMU E. Samar</div></td>';
                $output .= '<td><div style="margin-top: -20px;"><div style="">&nbsp; &nbsp; &nbsp; Engineer IV/Chief, WAQMS</div></td>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td><div style="width:50%"><br><br><label>Approval:</label></div></td>';
                $output .= '<td><div style="width:50%"><br><br><label>Noted:</label></div></td>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td><div><br><br><div style=""><u><b>FOR. '.$value["DivisionChief"].'</div></td>';
                $output .= '<td><div><br><br><div style=""><u><b>'.$value["RegionalDirector"].'</div></td>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td><div style="margin-top: -20px;"><div style="">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;OIC Chief, EMED</div></td>';
                $output .= '<td><div style="margin-top: -20px;"><div style="">&nbsp; &nbsp; &nbsp; Regional Director</div></td>';
                $output .= '</tr>';
                $output .= '</table>';   
                break;



                //SAMAR
                case 'ROY ALEXANDER H. TABOADA':
                $output .= '<table>';
                $output .= '<tr>';
                $output .= '<td><div style="width:50%"><br><br><br><br><label>Submitted by:</label></div></td>';
                $output .= '<td><div style="width:50%"><br><br><br><br><label>Reviewed By: </label></div></td>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td><div><br><br><div style=""><u><b>'.$value["Inspector"].'</div></td>';
                $output .= '<td><div><br><br><div style=""><u><b>'.$value["Checkedby"].'</div></td>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td><div style="margin-top: -20px;"><div style="">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;EMS II/PEMU Leyte</div></td>';
                $output .= '<td><div style="margin-top: -20px;"><div style="">SR. EMS/ OIC PEMO</div></td>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td><div style="width:50%"><br><br><label>Recommending Approval:</label></div></td>';
                $output .= '<td><div style="width:50%"><br><br><label>Approval:</label></div></td>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td><div><br><br><div style=""><u><b>ENGR. '.$value["SectionChief"].'</div></td>';
                $output .= '<td><div><br><br><div style=""><u><b>FOR. '.$value["DivisionChief"].'</div></td>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td><div style="margin-top: -20px;"><div style="">&nbsp; &nbsp; &nbsp;Engineer IV/Chief, WAQMS</div></td>';
                $output .= '<td><div style="margin-top: -20px;"><div style="">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; OIC Chief, EMED</div></td>';
                $output .= '</tr>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td>';
                $output .= '<tr>';
                $output .= '<td><div style="width:50%"><br><br><label>Noted:</label></div></td>';
                $output .= '</tr>';
                $output .= '<td><div><br><br><div style=""><u><b>'.$value["RegionalDirector"].'</div></td>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td><div style="margin-top: -20px;"><div style="">&nbsp; &nbsp; &nbsp; Regional Director</div></td>';
                $output .= '</tr>';
                $output .= '</table>';
                break;

                case 'ARNEL L. IFE':
                $output .= '<table>';
                $output .= '<tr>';
                $output .= '<td><div style="width:50%"><br><br><br><br><label>Submitted by:</label></div></td>';
                $output .= '<td><div style="width:50%"><br><br><br><br><label>Recommending Approval:</label></div></td>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td><div><br><br><div style=""><u><b>'.$value["Inspector"].'</div></td>';
                $output .= '<td><div><br><br><div style=""><u><b>ENGR. '.$value["SectionChief"].'</div></td>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td><div style="margin-top: -20px;"><div style="">OIC-SEMS, PEMU Samar</div></td>';
                $output .= '<td><div style="margin-top: -20px;"><div style="">&nbsp; &nbsp; &nbsp; Engineer IV/Chief, WAQMS</div></td>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td><div style="width:50%"><br><br><label>Approval:</label></div></td>';
                $output .= '<td><div style="width:50%"><br><br><label>Noted:</label></div></td>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td><div><br><br><div style=""><u><b>FOR. '.$value["DivisionChief"].'</div></td>';
                $output .= '<td><div><br><br><div style=""><u><b>'.$value["RegionalDirector"].'</div></td>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td><div style="margin-top: -20px;"><div style="">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;OIC Chief, EMED</div></td>';
                $output .= '<td><div style="margin-top: -20px;"><div style="">&nbsp; &nbsp; &nbsp; Regional Director</div></td>';
                $output .= '</tr>';
                $output .= '</table>';
                break;
            
                // LEYTE
                case 'CYRIL ANN B. BADEO':
                $output .= '<table>';
                $output .= '<tr>';
                $output .= '<td><div style="width:50%"><br><br><br><br><label>Submitted by:</label></div></td>';
                $output .= '<td><div style="width:50%"><br><br><br><br><label>Reviewed By: </label></div></td>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td><div><br><br><div style=""><u><b>'.$value["Inspector"].'</div></td>';
                $output .= '<td><div><br><br><div style=""><u><b>'.$value["Checkedby"].'</div></td>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td><div style="margin-top: -20px;"><div style="">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; EMS II</div></td>';
                $output .= '<td><div style="margin-top: -20px;"><div style="">Senior EMS, OIC/PEMU Leyte</div></td>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td><div style="width:50%"><br><br><label>Recommending Approval:</label></div></td>';
                $output .= '<td><div style="width:50%"><br><br><label>Approval:</label></div></td>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td><div><br><br><div style=""><u><b>ENGR. '.$value["SectionChief"].'</div></td>';
                $output .= '<td><div><br><br><div style=""><u><b>FOR. '.$value["DivisionChief"].'</div></td>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td><div style="margin-top: -20px;"><div style="">&nbsp; &nbsp; &nbsp;Engineer IV/Chief, WAQMS</div></td>';
                $output .= '<td><div style="margin-top: -20px;"><div style="">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; OIC Chief, EMED</div></td>';
                $output .= '</tr>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td>';
                $output .= '<tr>';
                $output .= '<td><div style="width:50%"><br><br><label>Noted:</label></div></td>';
                $output .= '</tr>';
                $output .= '<td><div><br><br><div style=""><u><b>'.$value["RegionalDirector"].'</div></td>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td><div style="margin-top: -20px;"><div style="">&nbsp; &nbsp; &nbsp; Regional Director</div></td>';
                $output .= '</tr>';
                $output .= '</table>';
                break;

                case 'JOSEPHINE L. FUENTES':
                $output .= '<table>';
                $output .= '<tr>';
                $output .= '<td><div style="width:50%"><br><br><br><br><label>Submitted by:</label></div></td>';
                $output .= '<td><div style="width:50%"><br><br><br><br><label>Recommending Approval:</label></div></td>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td><div><br><br><div style=""><u><b>'.$value["Inspector"].', DPA</div></td>';
                $output .= '<td><div><br><br><div style=""><u><b>ENGR. '.$value["SectionChief"].'</div></td>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td><div style="margin-top: -20px;"><div style="">Senior EMS, OIC/PEMU Leyte</div></td>';
                $output .= '<td><div style="margin-top: -20px;"><div style="">&nbsp; &nbsp; &nbsp; Engineer IV/Chief, WAQMS</div></td>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td><div style="width:50%"><br><br><label>Approval:</label></div></td>';
                $output .= '<td><div style="width:50%"><br><br><label>Noted:</label></div></td>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td><div><br><br><div style=""><u><b>FOR. '.$value["DivisionChief"].'</div></td>';
                $output .= '<td><div><br><br><div style=""><u><b>'.$value["RegionalDirector"].'</div></td>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td><div style="margin-top: -20px;"><div style="">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;OIC Chief, EMED</div></td>';
                $output .= '<td><div style="margin-top: -20px;"><div style="">&nbsp; &nbsp; &nbsp; Regional Director</div></td>';
                $output .= '</tr>';
                $output .= '</table>';
                break;    

                // S.LEYTE

            case 'SWEET ADEL PRIMA':
                $output .= '<table>';
                $output .= '<tr>';
                $output .= '<td><div style="width:50%"><br><br><br><br><label>Submitted by:</label></div></td>';
                $output .= '<td><div style="width:50%"><br><br><br><br><label>Reviewed By: </label></div></td>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td><div><br><br><div style=""><u><b>'.$value["Inspector"].'</div></td>';
                $output .= '<td><div><br><br><div style=""><u><b>'.$value["Checkedby"].'</div></td>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td><div style="margin-top: -20px;"><div style="">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; EMS II</div></td>';
                $output .= '<td><div style="margin-top: -20px;"><div style="">&nbsp; Supervising EMS/PEMU S. Leyte</div></td>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td><div style="width:50%"><br><br><label>Recommending Approval:</label></div></td>';
                $output .= '<td><div style="width:50%"><br><br><label>Approval:</label></div></td>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td><div><br><br><div style=""><u><b>ENGR. '.$value["SectionChief"].'</div></td>';
                $output .= '<td><div><br><br><div style=""><u><b>FOR. '.$value["DivisionChief"].'</div></td>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td><div style="margin-top: -20px;"><div style="">&nbsp; &nbsp; &nbsp;Engineer IV/Chief, WAQMS</div></td>';
                $output .= '<td><div style="margin-top: -20px;"><div style="">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; OIC Chief, EMED</div></td>';
                $output .= '</tr>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td>';
                $output .= '<tr>';
                $output .= '<td><div style="width:50%"><br><br><label>Noted:</label></div></td>';
                $output .= '</tr>';
                $output .= '<td><div><br><br><div style=""><u><b>'.$value["RegionalDirector"].'</div></td>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td><div style="margin-top: -20px;"><div style="">&nbsp; &nbsp; &nbsp; Regional Director</div></td>';
                $output .= '</tr>';
                $output .= '</table>';
                break;

            case 'ZEUS BRYAN B. LORETO':
                $output .= '<table>';
                $output .= '<tr>';
                $output .= '<td><div style="width:50%"><br><br><br><br><label>Submitted by:</label></div></td>';
                $output .= '<td><div style="width:50%"><br><br><br><br><label>Reviewed By: </label></div></td>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td><div><br><br><div style=""><u><b>'.$value["Inspector"].'</div></td>';
                $output .= '<td><div><br><br><div style=""><u><b>'.$value["Checkedby"].'</div></td>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td><div style="margin-top: -20px;"><div style="">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; EMS II</div></td>';
                $output .= '<td><div style="margin-top: -20px;"><div style="">&nbsp; Supervising EMS/PEMU S. Leyte</div></td>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td><div style="width:50%"><br><br><label>Recommending Approval:</label></div></td>';
                $output .= '<td><div style="width:50%"><br><br><label>Approval:</label></div></td>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td><div><br><br><div style=""><u><b>ENGR. '.$value["SectionChief"].'</div></td>';
                $output .= '<td><div><br><br><div style=""><u><b>FOR. '.$value["DivisionChief"].'</div></td>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td><div style="margin-top: -20px;"><div style="">&nbsp; &nbsp; &nbsp;Engineer IV/Chief, WAQMS</div></td>';
                $output .= '<td><div style="margin-top: -20px;"><div style="">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; OIC Chief, EMED</div></td>';
                $output .= '</tr>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td>';
                $output .= '<tr>';
                $output .= '<td><div style="width:50%"><br><br><label>Noted:</label></div></td>';
                $output .= '</tr>';
                $output .= '<td><div><br><br><div style=""><u><b>'.$value["RegionalDirector"].'</div></td>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td><div style="margin-top: -20px;"><div style="">&nbsp; &nbsp; &nbsp; Regional Director</div></td>';
                $output .= '</tr>';
                $output .= '</table>';
                break;

                case 'ALEJANDROQUE G. MACATIGUE':
                $output .= '<table>';
                $output .= '<tr>';
                $output .= '<td><div style="width:50%"><br><br><br><br><label>Submitted by:</label></div></td>';
                $output .= '<td><div style="width:50%"><br><br><br><br><label>Recommending Approval:</label></div></td>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td><div><br><br><div style=""><u><b>'.$value["Inspector"].'</div></td>';
                $output .= '<td><div><br><br><div style=""><u><b>ENGR. '.$value["SectionChief"].'</div></td>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td><div style="margin-top: -20px;"><div style="">&nbsp; Supervising EMS/PEMU S. Leyte</div></td>';
                $output .= '<td><div style="margin-top: -20px;"><div style="">&nbsp; &nbsp; &nbsp; Engineer IV/Chief, WAQMS</div></td>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td><div style="width:50%"><br><br><label>Approval:</label></div></td>';
                $output .= '<td><div style="width:50%"><br><br><label>Noted:</label></div></td>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td><div><br><br><div style=""><u><b>FOR. '.$value["DivisionChief"].'</div></td>';
                $output .= '<td><div><br><br><div style=""><u><b>'.$value["RegionalDirector"].'</div></td>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td><div style="margin-top: -20px;"><div style="">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;OIC Chief, EMED</div></td>';
                $output .= '<td><div style="margin-top: -20px;"><div style="">&nbsp; &nbsp; &nbsp; Regional Director</div></td>';
                $output .= '</tr>';
                $output .= '</table>';
                break;   
                
                
                // Section Chief
                case 'CARLOS A. CAYANONG':
                $output .= '<table>';
                $output .= '<tr>';
                $output .= '<td><div style="width:50%"><br><br><br><br><label>Submitted by:</label></div></td>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td><div><br><br><div style=""><u><b>ENGR. '.$value["Inspector"].'</div></td>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td><div style="margin-top: -20px;"><div style="">&nbsp; &nbsp; Engineer IV/Chief, WAQMS</div></td>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td><div style="width:50%"><br><br><label>Approval:</label></div></td>';
                $output .= '<td><div style="width:50%"><br><br><label>Noted:</label></div></td>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td><div><br><br><div style=""><u><b>FOR. '.$value["DivisionChief"].'</div></td>';
                $output .= '<td><div><br><br><div style=""><u><b>'.$value["RegionalDirector"].'</div></td>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td><div style="margin-top: -20px;"><div style="">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;OIC Chief, EMED</div></td>';
                $output .= '<td><div style="margin-top: -20px;"><div style="">&nbsp; &nbsp; &nbsp; Regional Director</div></td>';
                $output .= '</tr>';
                $output .= '</table>';
                break;





            default:
                $output .= '<h3 style="color:red;"><center>Please check the selected inspector and section chief. Thank you!</h3>';
                break;
        }

        break;
    
        case "LIZA A. TAN";
        switch ($value["Inspector"]) {
                 case 'ALMIRA O. RIPALDA':
                $output .= '<table>';
                $output .= '<tr>';
                $output .= '<td><div style="width:50%"><br><br><br><br><label>Submitted by:</label></div></td>';
                $output .= '<td><div style="width:60%"><br><br><br><br><label>Recommending Approval:</label></div></td>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td><div><br><br><div style=""><u><b>ENGR. '.$value["Inspector"].'</div></td>';
                $output .= '<td><div><br><br><div style=""><u><b>ENGR. '.$value["SectionChief"].'</div></td>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td><div style="margin-top: -20px;"><div style="">&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Engineer II</div></td>';
                $output .= '<td><div style="margin-top: -20px;"><div style="">Supervising EMS/OIC-Chief, CHWMS</div></td>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td><div style="width:50%"><br><br><label>Approval:</label></div></td>';
                $output .= '<td><div style="width:50%"><br><br><label>Noted:</label></div></td>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td><div><br><br><div style=""><u><b>FOR. '.$value["DivisionChief"].'</div></td>';
                $output .= '<td><div><br><br><div style=""><u><b>'.$value["RegionalDirector"].'</div></td>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td><div style="margin-top: -20px;"><div style="">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;OIC Chief, EMED</div></td>';
                $output .= '<td><div style="margin-top: -20px;"><div style="">&nbsp; &nbsp; &nbsp; Regional Director</div></td>';
                $output .= '</tr>';
                $output .= '</table>';
                break;

            case 'LIZA A. TAN':
                $output .= '<table>';
                $output .= '<tr>';
                $output .= '<td><div style="width:50%"><br><br><br><br><label>Submitted by:</label></div></td>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td><div><br><br><div style=""><u><b>ENGR. '.$value["Inspector"].'</div></td>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td><div style="margin-top: -20px;"><div style="">Supervising EMS/OIC-Chief, CHWMS</div></td>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td><div style="width:50%"><br><br><label>Approval:</label></div></td>';
                $output .= '<td><div style="width:50%"><br><br><label>Noted:</label></div></td>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td><div><br><br><div style=""><u><b>FOR. '.$value["DivisionChief"].'</div></td>';
                $output .= '<td><div><br><br><div style=""><u><b>'.$value["RegionalDirector"].'</div></td>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td><div style="margin-top: -20px;"><div style="">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;OIC Chief, EMED</div></td>';
                $output .= '<td><div style="margin-top: -20px;"><div style="">&nbsp; &nbsp; &nbsp; Regional Director</div></td>';
                $output .= '</tr>';
                $output .= '</table>';
                break;  



            // NORTHERN SAMAR
            case 'ROWENA B. PABIA':
                $output .= '<table>';
                $output .= '<tr>';
                $output .= '<td><div style="width:50%"><br><br><br><br><label>Submitted by:</label></div></td>';
                $output .= '<td><div style="width:50%"><br><br><br><br><label>Recommending Approval:</label></div></td>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td><div><br><br><div style=""><u><b>FOR. '.$value["Inspector"].'</div></td>';
                $output .= '<td><div><br><br><div style=""><u><b>ENGR. '.$value["SectionChief"].'</div></td>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td><div style="margin-top: -20px;"><div style="">&nbsp; &nbsp; SR. EMS/ OIC PEMO</div></td>';
                $output .= '<td><div style="margin-top: -20px;"><div style="">Supervising EMS/OIC-Chief, CHWMS</div></td>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td><div style="width:50%"><br><br><label>Approval:</label></div></td>';
                $output .= '<td><div style="width:50%"><br><br><label>Noted:</label></div></td>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td><div><br><br><div style=""><u><b>FOR. '.$value["DivisionChief"].'</div></td>';
                $output .= '<td><div><br><br><div style=""><u><b>'.$value["RegionalDirector"].'</div></td>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td><div style="margin-top: -20px;"><div style="">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;OIC Chief, EMED</div></td>';
                $output .= '<td><div style="margin-top: -20px;"><div style="">&nbsp; &nbsp; &nbsp; Regional Director</div></td>';
                $output .= '</tr>';
                $output .= '</table>';
                break;


            // E Samar
            case 'GINNALYN A. ESPOSA':
                $output .= '<table>';
                $output .= '<tr>';
                $output .= '<td><div style="width:50%"><br><br><br><br><label>Submitted by:</label></div></td>';
                $output .= '<td><div style="width:50%"><br><br><br><br><label>Reviewed By: </label></div></td>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td><div><br><br><div style=""><u><b>'.$value["Inspector"].'</div></td>';
                $output .= '<td><div><br><br><div style=""><u><b>FOR. '.$value["Checkedby"].'</div></td>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td><div style="margin-top: -20px;"><div style="">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; EMS I</div></td>';
                $output .= '<td><div style="margin-top: -20px;"><div style="">&nbsp; &nbsp; SR. EMS/ OIC PEMO</div></td>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td><div style="width:50%"><br><br><label>Recommending Approval:</label></div></td>';
                $output .= '<td><div style="width:50%"><br><br><label>Approval:</label></div></td>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td><div><br><br><div style=""><u><b>ENGR. '.$value["SectionChief"].'</div></td>';
                $output .= '<td><div><br><br><div style=""><u><b>FOR. '.$value["DivisionChief"].'</div></td>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td><div style="margin-top: -20px;"><div style="">Supervising EMS/OIC-Chief, CHWMS</div></td>';
                $output .= '<td><div style="margin-top: -20px;"><div style="">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; OIC Chief, EMED</div></td>';
                $output .= '</tr>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td>';
                $output .= '<tr>';
                $output .= '<td><div style="width:50%"><br><br><label>Noted:</label></div></td>';
                $output .= '</tr>';
                $output .= '<td><div><br><br><div style=""><u><b>'.$value["RegionalDirector"].'</div></td>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td><div style="margin-top: -20px;"><div style="">&nbsp; &nbsp; &nbsp; Regional Director</div></td>';
                $output .= '</tr>';
                $output .= '</table>';
            break;


            case 'ANAMERIE D. CAVAÑERO':
                $output .= '<table>';
                $output .= '<tr>';
                $output .= '<td><div style="width:50%"><br><br><br><br><label>Submitted by:</label></div></td>';
                $output .= '<td><div style="width:50%"><br><br><br><br><label>Recommending Approval:</label></div></td>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td><div><br><br><div style=""><u><b>'.$value["Inspector"].'</div></td>';
                $output .= '<td><div><br><br><div style=""><u><b>ENGR. '.$value["SectionChief"].'</div></td>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td><div style="margin-top: -20px;"><div style="">Supervising EMS, PEMU E. Samar</div></td>';
                $output .= '<td><div style="margin-top: -20px;"><div style="">Supervising EMS/OIC-Chief, CHWMS</div></td>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td><div style="width:50%"><br><br><label>Approval:</label></div></td>';
                $output .= '<td><div style="width:50%"><br><br><label>Noted:</label></div></td>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td><div><br><br><div style=""><u><b>FOR. '.$value["DivisionChief"].'</div></td>';
                $output .= '<td><div><br><br><div style=""><u><b>'.$value["RegionalDirector"].'</div></td>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td><div style="margin-top: -20px;"><div style="">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;OIC Chief, EMED</div></td>';
                $output .= '<td><div style="margin-top: -20px;"><div style="">&nbsp; &nbsp; &nbsp; Regional Director</div></td>';
                $output .= '</tr>';
                $output .= '</table>';   
                break;
    


                //SAMAR
                case 'ROY ALEXANDER H. TABOADA':
                $output .= '<table>';
                $output .= '<tr>';
                $output .= '<td><div style="width:50%"><br><br><br><br><label>Submitted by:</label></div></td>';
                $output .= '<td><div style="width:50%"><br><br><br><br><label>Reviewed By: </label></div></td>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td><div><br><br><div style=""><u><b>'.$value["Inspector"].'</div></td>';
                $output .= '<td><div><br><br><div style=""><u><b>'.$value["Checkedby"].'</div></td>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td><div style="margin-top: -20px;"><div style="">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; EMS II/PEMU Leyte</div></td>';
                $output .= '<td><div style="margin-top: -20px;"><div style="">Senior EMS/PEMU Samar</div></td>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td><div style="width:50%"><br><br><label>Recommending Approval:</label></div></td>';
                $output .= '<td><div style="width:50%"><br><br><label>Approval:</label></div></td>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td><div><br><br><div style=""><u><b>ENGR. '.$value["SectionChief"].'</div></td>';
                $output .= '<td><div><br><br><div style=""><u><b>FOR. '.$value["DivisionChief"].'</div></td>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td><div style="margin-top: -20px;"><div style="">Supervising EMS/OIC-Chief, CHWMS</div></td>';
                $output .= '<td><div style="margin-top: -20px;"><div style="">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; OIC Chief, EMED</div></td>';
                $output .= '</tr>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td>';
                $output .= '<tr>';
                $output .= '<td><div style="width:50%"><br><br><label>Noted:</label></div></td>';
                $output .= '</tr>';
                $output .= '<td><div><br><br><div style=""><u><b>'.$value["RegionalDirector"].'</div></td>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td><div style="margin-top: -20px;"><div style="">&nbsp; &nbsp; &nbsp; Regional Director</div></td>';
                $output .= '</tr>';
                $output .= '</table>';
                break;

                case 'ARNEL L. IFE':
                $output .= '<table>';
                $output .= '<tr>';
                $output .= '<td><div style="width:50%"><br><br><br><br><label>Submitted by:</label></div></td>';
                $output .= '<td><div style="width:50%"><br><br><br><br><label>Recommending Approval:</label></div></td>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td><div><br><br><div style=""><u><b>'.$value["Inspector"].'</div></td>';
                $output .= '<td><div><br><br><div style=""><u><b>ENGR. '.$value["SectionChief"].'</div></td>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td><div style="margin-top: -20px;"><div style="">Senior EMS/PEMU Samar</div></td>';
                $output .= '<td><div style="margin-top: -20px;"><div style="">Supervising EMS/OIC-Chief, CHWMS</div></td>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td><div style="width:50%"><br><br><label>Approval:</label></div></td>';
                $output .= '<td><div style="width:50%"><br><br><label>Noted:</label></div></td>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td><div><br><br><div style=""><u><b>FOR. '.$value["DivisionChief"].'</div></td>';
                $output .= '<td><div><br><br><div style=""><u><b>'.$value["RegionalDirector"].'</div></td>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td><div style="margin-top: -20px;"><div style="">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;OIC Chief, EMED</div></td>';
                $output .= '<td><div style="margin-top: -20px;"><div style="">&nbsp; &nbsp; &nbsp; Regional Director</div></td>';
                $output .= '</tr>';
                $output .= '</table>';
                break;



                // LEYTE
                case 'CYRIL ANN B. BADEO':
                $output .= '<table>';
                $output .= '<tr>';
                $output .= '<td><div style="width:50%"><br><br><br><br><label>Submitted by:</label></div></td>';
                $output .= '<td><div style="width:50%"><br><br><br><br><label>Reviewed By: </label></div></td>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td><div><br><br><div style=""><u><b>'.$value["Inspector"].'</div></td>';
                $output .= '<td><div><br><br><div style=""><u><b>'.$value["Checkedby"].', DPA</div></td>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td><div style="margin-top: -20px;"><div style="">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; EMS II</div></td>';
                $output .= '<td><div style="margin-top: -20px;"><div style="">Senior EMS, OIC/PEMU Leyte</div></td>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td><div style="width:50%"><br><br><label>Recommending Approval:</label></div></td>';
                $output .= '<td><div style="width:50%"><br><br><label>Approval:</label></div></td>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td><div><br><br><div style=""><u><b>ENGR. '.$value["SectionChief"].'</div></td>';
                $output .= '<td><div><br><br><div style=""><u><b>FOR. '.$value["DivisionChief"].'</div></td>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td><div style="margin-top: -20px;"><div style="">Supervising EMS/OIC-Chief, CHWMS</div></td>';
                $output .= '<td><div style="margin-top: -20px;"><div style="">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; OIC Chief, EMED</div></td>';
                $output .= '</tr>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td>';
                $output .= '<tr>';
                $output .= '<td><div style="width:50%"><br><br><label>Noted:</label></div></td>';
                $output .= '</tr>';
                $output .= '<td><div><br><br><div style=""><u><b>'.$value["RegionalDirector"].'</div></td>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td><div style="margin-top: -20px;"><div style="">&nbsp; &nbsp; &nbsp; Regional Director</div></td>';
                $output .= '</tr>';
                $output .= '</table>';
                break;

                case 'JOSEPHINE L. FUENTES':
                $output .= '<table>';
                $output .= '<tr>';
                $output .= '<td><div style="width:50%"><br><br><br><br><label>Submitted by:</label></div></td>';
                $output .= '<td><div style="width:50%"><br><br><br><br><label>Recommending Approval:</label></div></td>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td><div><br><br><div style=""><u><b>'.$value["Inspector"].', DPA</div></td>';
                $output .= '<td><div><br><br><div style=""><u><b>ENGR. '.$value["SectionChief"].'</div></td>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td><div style="margin-top: -20px;"><div style="">Senior EMS, OIC/PEMU Leyte</div></td>';
                $output .= '<td><div style="margin-top: -20px;"><div style="">Supervising EMS/OIC-Chief, CHWMS</div></td>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td><div style="width:50%"><br><br><label>Approval:</label></div></td>';
                $output .= '<td><div style="width:50%"><br><br><label>Noted:</label></div></td>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td><div><br><br><div style=""><u><b>FOR. '.$value["DivisionChief"].'</div></td>';
                $output .= '<td><div><br><br><div style=""><u><b>'.$value["RegionalDirector"].'</div></td>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td><div style="margin-top: -20px;"><div style="">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;OIC Chief, EMED</div></td>';
                $output .= '<td><div style="margin-top: -20px;"><div style="">&nbsp; &nbsp; &nbsp; Regional Director</div></td>';
                $output .= '</tr>';
                $output .= '</table>';
                break;    
                
            // S. Leyte


            case 'SWEET ADEL PRIMA':
                $output .= '<table>';
                $output .= '<tr>';
                $output .= '<td><div style="width:50%"><br><br><br><br><label>Submitted by:</label></div></td>';
                $output .= '<td><div style="width:50%"><br><br><br><br><label>Reviewed By: </label></div></td>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td><div><br><br><div style=""><u><b>'.$value["Inspector"].'</div></td>';
                $output .= '<td><div><br><br><div style=""><u><b>'.$value["Checkedby"].'</div></td>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td><div style="margin-top: -20px;"><div style="">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; EMS II</div></td>';
                $output .= '<td><div style="margin-top: -20px;"><div style="">&nbsp; Supervising EMS/PEMU S. Leyte</div></td>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td><div style="width:50%"><br><br><label>Recommending Approval:</label></div></td>';
                $output .= '<td><div style="width:50%"><br><br><label>Approval:</label></div></td>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td><div><br><br><div style=""><u><b>ENGR. '.$value["SectionChief"].'</div></td>';
                $output .= '<td><div><br><br><div style=""><u><b>FOR. '.$value["DivisionChief"].'</div></td>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td><div style="margin-top: -20px;"><div style="">Supervising EMS/OIC-Chief, CHWMS</div></td>';
                $output .= '<td><div style="margin-top: -20px;"><div style="">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; OIC Chief, EMED</div></td>';
                $output .= '</tr>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td>';
                $output .= '<tr>';
                $output .= '<td><div style="width:50%"><br><br><label>Noted:</label></div></td>';
                $output .= '</tr>';
                $output .= '<td><div><br><br><div style=""><u><b>'.$value["RegionalDirector"].'</div></td>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td><div style="margin-top: -20px;"><div style="">&nbsp; &nbsp; &nbsp; Regional Director</div></td>';
                $output .= '</tr>';
                $output .= '</table>';
                break;

            case 'ZEUS BRYAN B. LORETO':
                $output .= '<table>';
                $output .= '<tr>';
                $output .= '<td><div style="width:50%"><br><br><br><br><label>Submitted by:</label></div></td>';
                $output .= '<td><div style="width:50%"><br><br><br><br><label>Reviewed By: </label></div></td>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td><div><br><br><div style=""><u><b>'.$value["Inspector"].'</div></td>';
                $output .= '<td><div><br><br><div style=""><u><b>'.$value["Checkedby"].'</div></td>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td><div style="margin-top: -20px;"><div style="">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; EMS II</div></td>';
                $output .= '<td><div style="margin-top: -20px;"><div style="">&nbsp; Supervising EMS/PEMU S. Leyte</div></td>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td><div style="width:50%"><br><br><label>Recommending Approval:</label></div></td>';
                $output .= '<td><div style="width:50%"><br><br><label>Approval:</label></div></td>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td><div><br><br><div style=""><u><b>ENGR. '.$value["SectionChief"].'</div></td>';
                $output .= '<td><div><br><br><div style=""><u><b>FOR. '.$value["DivisionChief"].'</div></td>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td><div style="margin-top: -20px;"><div style="">Supervising EMS/OIC-Chief, CHWMS</div></td>';
                $output .= '<td><div style="margin-top: -20px;"><div style="">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; OIC Chief, EMED</div></td>';
                $output .= '</tr>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td>';
                $output .= '<tr>';
                $output .= '<td><div style="width:50%"><br><br><label>Noted:</label></div></td>';
                $output .= '</tr>';
                $output .= '<td><div><br><br><div style=""><u><b>'.$value["RegionalDirector"].'</div></td>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td><div style="margin-top: -20px;"><div style="">&nbsp; &nbsp; &nbsp; Regional Director</div></td>';
                $output .= '</tr>';
                $output .= '</table>';
                break;

                case 'ALEJANDROQUE G. MACATIGUE':
                $output .= '<table>';
                $output .= '<tr>';
                $output .= '<td><div style="width:50%"><br><br><br><br><label>Submitted by:</label></div></td>';
                $output .= '<td><div style="width:50%"><br><br><br><br><label>Recommending Approval:</label></div></td>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td><div><br><br><div style=""><u><b>'.$value["Inspector"].'</div></td>';
                $output .= '<td><div><br><br><div style=""><u><b>ENGR. '.$value["SectionChief"].'</div></td>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td><div style="margin-top: -20px;"><div style="">&nbsp; Supervising EMS/PEMU S. Leyte</div></td>';
                $output .= '<td><div style="margin-top: -20px;"><div style="">&nbsp; &nbsp; &nbsp; Engineer IV/Chief, WAQMS</div></td>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td><div style="width:50%"><br><br><label>Approval:</label></div></td>';
                $output .= '<td><div style="width:50%"><br><br><label>Noted:</label></div></td>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td><div><br><br><div style=""><u><b>FOR. '.$value["DivisionChief"].'</div></td>';
                $output .= '<td><div><br><br><div style=""><u><b>'.$value["RegionalDirector"].'</div></td>';
                $output .= '</tr>';
                $output .= '<tr>';
                $output .= '<td><div style="margin-top: -20px;"><div style="">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;OIC Chief, EMED</div></td>';
                $output .= '<td><div style="margin-top: -20px;"><div style="">&nbsp; &nbsp; &nbsp; Regional Director</div></td>';
                $output .= '</tr>';
                $output .= '</table>';
                break;   

    default:
                 $output .= '<h3 style="color:red;"><center>Please check the selected inspector and section chief. Thank you!</h3>';
        break;
                }
}

  

    $dompdf->loadHtml($output);
    $dompdf->setPaper('Folio', 'portrait');
    $dompdf->render();

$filename = $value['ProjectName'];
$dompdf->stream($filename, array('Attachment' => false));
}

 




?>


