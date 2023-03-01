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
	$record->ECC = $_POST["ECC"];
	$record->ECC_DOI = $_POST["ECC_DOI"];
	$record->ECC_DE = $_POST["ECC_DE"];
	$record->DENRID = $_POST["DENRID"];
	$record->DENRID_DOI = $_POST["DENRID_DOI"];
	$record->DENRID_DE = $_POST["DENRID_DE"];
	$record->PCL_Compliance = $_POST["PCL_Compliance"];
	$record->PCL_Compliance_DOI = $_POST["PCL_Compliance_DOI"];
	$record->PCL_Compliance_DE = $_POST["PCL_Compliance_DE"];
	$record->CCO_Registry = $_POST["CCO_Registry"];
	$record->CCO_Registry_DOI = $_POST["CCO_Registry_DOI"];
	$record->CCO_Registry_DE = $_POST["CCO_Registry_DE"];
	$record->Importation_Clearance = $_POST["Importation_Clearance"];
	$record->Importation_Clearance_DOI = $_POST["Importation_Clearance_DOI"];
	$record->Importation_Clearance_DE = $_POST["Importation_Clearance_DE"];
	$record->COT_Issued = $_POST["COT_Issued"];
	$record->COT_Issued_DOI = $_POST["COT_Issued_DOI"];
	$record->COT_Issued_DE = $_POST["COT_Issued_DE"];
	$record->TSD_RegistrationCert = $_POST["TSD_RegistrationCert"];
	$record->TSD_RegistrationCert_DOI = $_POST["TSD_RegistrationCert_DOI"];
	$record->TSD_RegistrationCert_DE = $_POST["TSD_RegistrationCert_DE"];
	$record->POA_No = $_POST["POA_No"];
	$record->POA_No_DOI = $_POST["POA_No_DOI"];
	$record->POA_No_DE = $_POST["POA_No_DE"];
	$record->Discharge_Permit = $_POST["Discharge_Permit"];
	$record->Discharge_Permit_DOI = $_POST["Discharge_Permit_DOI"];
	$record->Discharge_Permit_DE = $_POST["Discharge_Permit_DE"];
	$record->MOA_Agreement = $_POST["MOA_Agreement"];
	$record->MOA_Agreement_DOI = $_POST["MOA_Agreement_DOI"];
	$record->MOA_Agreement_DE = $_POST["MOA_Agreement_DE"];

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
	$record->ECC = $_POST["ECC1"];
	$record->ECC_DOI = $_POST["ECC_DOI1"];
	$record->ECC_DE = $_POST["ECC_DE1"];
	$record->DENRID = $_POST["DENRID1"];
	$record->DENRID_DOI = $_POST["DENRID_DOI1"];
	$record->DENRID_DE = $_POST["DENRID_DE1"];
	$record->PCL_Compliance = $_POST["PCL_Compliance1"];
	$record->PCL_Compliance_DOI = $_POST["PCL_Compliance_DOI1"];
	$record->PCL_Compliance_DE = $_POST["PCL_Compliance_DE1"];
	$record->CCO_Registry = $_POST["CCO_Registry1"];
	$record->CCO_Registry_DOI = $_POST["CCO_Registry_DOI1"];
	$record->CCO_Registry_DE = $_POST["CCO_Registry_DE1"];
	$record->Importation_Clearance = $_POST["Importation_Clearance1"];
	$record->Importation_Clearance_DOI = $_POST["Importation_Clearance_DOI1"];
	$record->Importation_Clearance_DE = $_POST["Importation_Clearance_DE1"];
	$record->COT_Issued = $_POST["COT_Issued1"];
	$record->COT_Issued_DOI = $_POST["COT_Issued_DOI1"];
	$record->COT_Issued_DE = $_POST["COT_Issued_DE1"];
	$record->TSD_RegistrationCert = $_POST["TSD_RegistrationCert1"];
	$record->TSD_RegistrationCert_DOI = $_POST["TSD_RegistrationCert_DOI1"];
	$record->TSD_RegistrationCert_DE = $_POST["TSD_RegistrationCert_DE1"];
	$record->POA_No = $_POST["POA_No1"];
	$record->POA_No_DOI = $_POST["POA_No_DOI1"];
	$record->POA_No_DE = $_POST["POA_No_DE1"];
	$record->Discharge_Permit = $_POST["Discharge_Permit1"];
	$record->Discharge_Permit_DOI = $_POST["Discharge_Permit_DOI1"];
	$record->Discharge_Permit_DE = $_POST["Discharge_Permit_DE1"];
	$record->MOA_Agreement = $_POST["MOA_Agreement1"];
	$record->MOA_Agreement_DOI = $_POST["MOA_Agreement_DOI1"];
	$record->MOA_Agreement_DE = $_POST["MOA_Agreement_DE1"];
	$record->ECC_Condition = $_POST["ECC_Condition"];

	$record->SectionChief = $_POST["SectionChief1"];
	$record->DivisionChief = $_POST["DivisionChief1"];
	$record->RegionalDirector = $_POST["RegionalDirector1"];

	$record->createRecord();
}



?>

