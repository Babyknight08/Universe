<?php
include_once 'Database.php';
include_once 'Records.php';
include_once 'arrays.php';

$database = new Databases();
$db = $database->getConnection();
$record = new Records($db);

if(!empty($_POST['action']) && $_POST['action'] == 'listRecords') {
	$record->listRecords();
}
if(!empty($_POST['action']) && $_POST['action'] == 'addRecord') {	
	$record->name = $_POST["name"];
    $record->age = $_POST["age"];
    $record->skills = $_POST["skills"];
	$record->address = $_POST["address"];
	$record->designation = $_POST["designation"];
	$record->addRecord();
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
	$record->air = $_POST["Air"];
	$record->water = $_POST["Water"];
	$record->eia = $_POST["EIA"];
	$record->chwms = $_POST["CHWMS"];
	$record->solidwaste = $_POST["SolidWaste"];
	$record->nob = $_POST["nob"];
    $record->specificaddress = $_POST["SpecificAddress"];
	$record->psiccode = $_POST["PSICCode"];
	$record->product = $_POST["Product"];
	$record->latitude = $_POST["Latitude"];
	$record->longitude = $_POST["Longitude"];
	$record->yearestablished = $_POST["YearEstablished"];
	$record->mhead = $_POST["MHead"];
	$record->pcoaccreditation = $_POST["PCOAccreditation"];
	// $record->pco = $_POST["PCO"];
	$record->updateRecord();
}

if(!empty($_POST['action']) && $_POST['action'] == 'deleteRecord') {
	$record->id = $_POST["id"];
	$record->deleteRecord();
}

// if(!empty($_POST['action']) && $_POST['action'] == 'searchAll') {
// 	$record->searchAll();
// }

if(!empty($_POST['action1']) && $_POST['action1'] == 'createRecord') {	
	$record->reportcontrol = $_POST["reportcontrol1"];
	$record->doi = $_POST["doi1"];
	$record->missionorder = $_POST["missionorder1"];
	// $record->laws = $_POST["laws1"];
	$record->air = $_POST["Air1"];
	$record->water = $_POST["Water1"];
	$record->eia = $_POST["EIA1"];
	$record->chwms = $_POST["CHWMS1"];
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
	$record->mhead = $_POST["MHead1"];
	$record->PCOAccreditation = $_POST["PCOAccreditation1"];
	$record->VerifyAccuracy = $_POST["VerifyAccuracy"];
	$record->PMPIN_Hazardous = $_POST["PMPIN_Hazardous"];
	$record->HWIDRegistration = $_POST["HWIDRegistration"];
	$record->HWTRegistration = $_POST["HWTRegistration"];
	$record->HWTSDRegistration = $_POST["HWTSDRegistration"];
	$record->createRecord();
}

if(!empty($_POST['action']) && $_POST['action'] == 'searchRecord') {	
	$record->search();
}

// if(!empty($_POST['action']) && $_POST['action'] == 'pageLoad') {
// 	$record->pageLoad();
// }

?>

