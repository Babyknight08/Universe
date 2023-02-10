<?php
include 'Database.php';
include 'Records.php';
include 'arrays.php';

$database = new Databases();
$db = $database->getConnection();
$record = new Records($db);

if(!empty($_POST['action']) && $_POST['action'] == 'listRecords') {
	$record->listRecords();
}

if(!empty($_POST['action']) && $_POST['action'] == 'getRecord') {
	$record->id = $_POST["id"];
	$record->getRecord();
}

if(!empty($_POST['action']) && $_POST['action'] == 'updateRecord') {
	$record->id = $_POST["id"];
	$record->reportcontrol = $_POST["reportcontrol"];
	$record->doi = $_POST["doi"];
	$record->missionorder = $_POST["missionorder"];
	$record->name = $_POST["name"];
	$record->eia = $_POST["EIA"];
	$record->chwms = $_POST["CHWMS"];
	$record->air = $_POST["Air"];
	$record->water = $_POST["Water"];
	$record->solidwaste = $_POST["SolidWaste"];
	$record->nob = $_POST["nob"];
    $record->specificaddress = $_POST["SpecificAddress"];
	$record->psiccode = $_POST["PSICCode"];
	$record->product = $_POST["Product"];
	$record->latitude = $_POST["Latitude"];
	$record->longitude = $_POST["Longitude"];
	$record->yearestablished = $_POST["YearEstablished"];
	$record->operating_day = $_POST["operating_day"];
	$record->operating_week = $_POST["operating_week"];
	$record->operating_year = $_POST["operating_year"];
	$record->mhead = $_POST["MHead"];
	$record->pcoaccreditation = $_POST["PCOAccreditation"];
	$record->PCOA_Date = $_POST["PCOA_Date"];
	$record->ContactNumber = $_POST["contactnumber"];
	$record->EmailAddress = $_POST["email_address"];
	$record->VerifyAccuracy = $_POST["VerifyAccuracy"];
	$record->PMPIN_Hazardous = $_POST["PMPIN_Hazardous"];
	$record->HWIDRegistration = $_POST["HWIDRegistration"];
	$record->HWTRegistration = $_POST["HWTRegistration"];
	$record->HWTSDRegistration = $_POST["HWTSDRegistration"];
	$record->PTOAPCI = $_POST["PTOAPCI"];
	$record->DischargePermit = $_POST["DischargePermit"];
	$record->OthersPV = $_POST["otherspv"];
	$record->otherspv_text = $_POST["otherspv_text"];
	$record->DetermineCompliance = $_POST["determinecompliance"];
	$record->InvestigateComplaints = $_POST["investigatecomplaints"];
	$record->StatusCommitments = $_POST["statuscommitments"];
	$record->EwatchProgram = $_POST["ewatchprogram"];
	$record->PEPP = $_POST["PEPP"];
	$record->PAB = $_POST["pab"];
	$record->Others = $_POST["others"];
	$record->Others_Text = $_POST["others_text"];

	$record->updateRecord();
}

if(!empty($_POST['action']) && $_POST['action'] == 'deleteRecord') {
	$record->id = $_POST["id"];
	$record->deleteRecord();
}

if(!empty($_POST['action1']) && $_POST['action1'] == 'createRecord') {	
	$record->reportcontrol = $_POST["reportcontrol1"];
	$record->doi = $_POST["doi1"];
	$record->missionorder = $_POST["missionorder1"];
	$record->eia = $_POST["EIA1"];
	$record->chwms = $_POST["CHWMS1"];
	$record->air = $_POST["Air1"];
	$record->water = $_POST["Water1"];
	$record->solidwaste = $_POST["SolidWaste1"];
	$record->name = $_POST["name1"];
    $record->specificaddress = $_POST["SpecificAddress1"];
	$record->nob = $_POST["nob1"];
	$record->psiccode = $_POST["PSICCode1"];
	$record->product = $_POST["Product1"];
	$record->latitude = $_POST["Latitude1"];
	$record->longitude = $_POST["Longitude1"];
	$record->yearestablished = $_POST["YearEstablished1"];
	$record->pco = $_POST["PCO1"];
	$record->operating_day = $_POST["operating_day1"];
	$record->operating_week = $_POST["operating_week1"];
	$record->operating_year = $_POST["operating_year1"];
	$record->mhead = $_POST["MHead1"];
	$record->pcoaccreditation = $_POST["PCOAccreditation1"];
	$record->PCOA_Date = $_POST["PCOA_Date1"];
	$record->ContactNumber = $_POST["contactnumber1"];
	$record->EmailAddress = $_POST["email_address1"];
	$record->VerifyAccuracy = $_POST["VerifyAccuracy1"];
	$record->PMPIN_Hazardous = $_POST["PMPIN_Hazardous1"];
	$record->HWIDRegistration = $_POST["HWIDRegistration1"];
	$record->HWTRegistration = $_POST["HWTRegistration1"];
	$record->HWTSDRegistration = $_POST["HWTSDRegistration1"];
	$record->PTOAPCI = $_POST["PTOAPCI1"];
	$record->DischargePermit = $_POST["DischargePermit1"];
	$record->OthersPV = $_POST["otherspv1"];
	$record->otherspv_text = $_POST["otherspv1_text"];
	$record->DetermineCompliance = $_POST["determinecompliance1"];
	$record->InvestigateComplaints = $_POST["investigatecomplaints1"];
	$record->StatusCommitments = $_POST["statuscommitments1"];
	$record->EwatchProgram = $_POST["ewatchprogram1"];
	$record->PEPP = $_POST["PEPP1"];
	$record->PAB = $_POST["pab1"];
	$record->Others = $_POST["others1"];
	$record->Others_Text = $_POST["others1_text"];
	$record->createRecord();
}



?>

