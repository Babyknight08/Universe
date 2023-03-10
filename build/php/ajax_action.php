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
	$record->ECC_Condition = $_POST["ECC_Condition"];


	$record->Haz_PCLCompliance = $_POST["Haz_PCLCompliance"];
	$record->Haz_PCLComplianceText = $_POST["Haz_PCLComplianceText"];
	$record->Annual_Reporting = $_POST["Annual_Reporting"];
	$record->Annual_ReportingText = $_POST["Annual_ReportingText"];
	$record->Biennial_Report = $_POST["Biennial_Report"];
	$record->Biennial_ReportText = $_POST["Biennial_ReportText"];
	$record->CCO_Registration = $_POST["CCO_Registration"];
	$record->CCO_RegistrationText = $_POST["CCO_RegistrationText"];
	$record->Importation = $_POST["Importation"];
	$record->ImportationText = $_POST["ImportationText"];
	$record->Valid_ImportanceClearance = $_POST["Valid_ImportanceClearance"];
	$record->Valid_ImportanceClearanceText = $_POST["Valid_ImportanceClearanceText"];
	$record->Bill_Lading = $_POST["Bill_Lading"];
	$record->Bill_LadingText = $_POST["Bill_LadingText"];
	$record->Registration_HWG = $_POST["Registration_HWG"];
	$record->Registration_HWGText = $_POST["Registration_HWGText"];
	$record->Temp_HazStorageFacility = $_POST["Temp_HazStorageFacility"];
	$record->Temp_HazStorageFacilityText = $_POST["Temp_HazStorageFacilityText"];
	$record->Report_HazGenerated = $_POST["Report_HazGenerated"];
	$record->Report_HazGeneratedText = $_POST["Report_HazGeneratedText"];
	$record->Haz_WasteLabelled = $_POST["Haz_WasteLabelled"];
	$record->Haz_WasteLabelledText = $_POST["Haz_WasteLabelledText"];
	$record->Valid_PermitTranspo = $_POST["Valid_PermitTranspo"];
	$record->Valid_PermitTranspoText = $_POST["Valid_PermitTranspoText"];
	$record->Valid_RegTranspoTreaters = $_POST["Valid_RegTranspoTreaters"];
	$record->Valid_RegTranspoTreatersText = $_POST["Valid_RegTranspoTreatersText"];
	$record->Waste_Transporter = $_POST["Waste_Transporter"];
	$record->Waste_TransporterText = $_POST["Waste_TransporterText"];
	$record->Valid_CertTreatment = $_POST["Valid_CertTreatment"];
	$record->Valid_CertTreatmentText = $_POST["Valid_CertTreatmentText"];
	$record->Air_ValidPOA = $_POST["Air_ValidPOA"];
	$record->Air_ValidPOAText = $_POST["Air_ValidPOAText"];
	$record->Air_EmissionPOA = $_POST["Air_EmissionPOA"];
	$record->Air_EmissionPOAText = $_POST["Air_EmissionPOAText"];
	$record->Air_DisplayInstallation = $_POST["Air_DisplayInstallation"];
	$record->Air_DisplayInstallationText = $_POST["Air_DisplayInstallationText"];
	$record->Air_PermitCondition = $_POST["Air_PermitCondition"];
	$record->Air_PermitConditionText = $_POST["Air_PermitConditionText"];
	$record->Air_WindDevice = $_POST["Air_WindDevice"];
	$record->Air_WindDeviceText = $_POST["Air_WindDeviceText"];
	$record->Air_PlantOperationProblem = $_POST["Air_PlantOperationProblem"];
	$record->Air_PlantOperationProblemText = $_POST["Air_PlantOperationProblemText"];
	$record->Air_CCTVInstalled = $_POST["Air_CCTVInstalled"];
	$record->Air_CCTVInstalledText = $_POST["Air_CCTVInstalledText"];
	$record->Air_CEMSorPEMS = $_POST["Air_CEMSorPEMS"];
	$record->Air_CEMSorPEMSText = $_POST["Air_CEMSorPEMSText"];
	$record->Air_YearlyRATA = $_POST["Air_YearlyRATA"];
	$record->Air_YearlyRATAText = $_POST["Air_YearlyRATAText"];
	$record->Air_EmissionTestStandard = $_POST["Air_EmissionTestStandard"];
	$record->Air_EmissionTestStandardText = $_POST["Air_EmissionTestStandardText"];
	$record->Air_AmbientQualityStandard = $_POST["Air_AmbientQualityStandard"];
	$record->Air_AmbientQualityStandardText = $_POST["Air_AmbientQualityStandardText"];
	$record->Water_ValidDP = $_POST["Water_ValidDP"];
	$record->Water_ValidDPText = $_POST["Water_ValidDPText"];
	$record->Water_VolumeDP = $_POST["Water_VolumeDP"];
	$record->Water_VolumeDPText = $_POST["Water_VolumeDPText"];
	$record->Water_PermitsComplied = $_POST["Water_PermitsComplied"];
	$record->Water_PermitsCompliedText = $_POST["Water_PermitsCompliedText"];
	$record->Water_FlowMeterDevice = $_POST["Water_FlowMeterDevice"];
	$record->Water_FlowMeterDeviceText = $_POST["Water_FlowMeterDeviceText"];
	$record->Water_CertifiedSiphoning = $_POST["Water_CertifiedSiphoning"];
	$record->Water_CertifiedSiphoningText = $_POST["Water_CertifiedSiphoningText"];
	$record->Water_ComplianceEffluent = $_POST["Water_ComplianceEffluent"];
	$record->Water_ComplianceEffluentText = $_POST["Water_ComplianceEffluentText"];
	$record->Water_AmbientQualityMonitoring = $_POST["Water_AmbientQualityMonitoring"];
	$record->Water_AmbientQualityMonitoringText = $_POST["Water_AmbientQualityMonitoringText"];
	$record->Water_PaymentWastewater = $_POST["Water_PaymentWastewater"];
	$record->Water_PaymentWastewaterText = $_POST["Water_PaymentWastewaterText"];
	$record->SWM_WasteSegregation = $_POST["SWM_WasteSegregation"];
	$record->SWM_WasteSegregationText = $_POST["SWM_WasteSegregationText"];
	$record->SWM_WasteDisposalFacilities = $_POST["SWM_WasteDisposalFacilities"];
	$record->SWM_WasteDisposalFacilitiesText = $_POST["SWM_WasteDisposalFacilitiesText"];


	$record->PCO_Guidelines = $_POST["PCO_Guidelines"];
	$record->PCO_GuidelinesText = $_POST["PCO_GuidelinesText"];
	$record->DAO_SMRSubmission = $_POST["DAO_SMRSubmission"];
	$record->DAO_SMRSubmissionText = $_POST["DAO_SMRSubmissionText"];



	


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
	$record->ECC_Condition = $_POST["ECC_Condition1"];
	$record->Haz_PCLCompliance = $_POST["Haz_PCLCompliance1"];
	$record->Haz_PCLComplianceText = $_POST["Haz_PCLComplianceText1"];
	$record->Annual_Reporting = $_POST["Annual_Reporting1"];
	$record->Annual_ReportingText = $_POST["Annual_ReportingText1"];
	$record->Biennial_Report = $_POST["Biennial_Report1"];
	$record->Biennial_ReportText = $_POST["Biennial_ReportText1"];
	$record->CCO_Registration = $_POST["CCO_Registration1"];
	$record->CCO_RegistrationText = $_POST["CCO_RegistrationText1"];
	$record->Importation = $_POST["Importation1"];
	$record->ImportationText = $_POST["ImportationText1"];
	$record->Valid_ImportanceClearance = $_POST["Valid_ImportanceClearance1"];
	$record->Valid_ImportanceClearanceText = $_POST["Valid_ImportanceClearanceText1"];
	$record->Bill_Lading = $_POST["Bill_Lading1"];
	$record->Bill_LadingText = $_POST["Bill_LadingText1"];
	$record->Registration_HWG = $_POST["Registration_HWG1"];
	$record->Registration_HWGText = $_POST["Registration_HWGText1"];
	$record->Temp_HazStorageFacility = $_POST["Temp_HazStorageFacility1"];
	$record->Temp_HazStorageFacilityText = $_POST["Temp_HazStorageFacilityText1"];
	$record->Report_HazGenerated = $_POST["Report_HazGenerated1"];
	$record->Report_HazGeneratedText = $_POST["Report_HazGeneratedText1"];
	$record->Haz_WasteLabelled = $_POST["Haz_WasteLabelled1"];
	$record->Haz_WasteLabelledText = $_POST["Haz_WasteLabelledText1"];
	$record->Valid_PermitTranspo = $_POST["Valid_PermitTranspo1"];
	$record->Valid_PermitTranspoText = $_POST["Valid_PermitTranspoText1"];
	$record->Valid_RegTranspoTreaters = $_POST["Valid_RegTranspoTreaters1"];
	$record->Valid_RegTranspoTreatersText = $_POST["Valid_RegTranspoTreatersText1"];
	$record->Waste_Transporter = $_POST["Waste_Transporter1"];
	$record->Waste_TransporterText = $_POST["Waste_TransporterText1"];
	$record->Valid_CertTreatment = $_POST["Valid_CertTreatment1"];
	$record->Valid_CertTreatmentText = $_POST["Valid_CertTreatmentText1"];
	$record->Air_ValidPOA = $_POST["Air_ValidPOA1"];
	$record->Air_ValidPOAText = $_POST["Air_ValidPOAText1"];
	$record->Air_EmissionPOA = $_POST["Air_EmissionPOA1"];
	$record->Air_EmissionPOAText = $_POST["Air_EmissionPOAText1"];
	$record->Air_DisplayInstallation = $_POST["Air_DisplayInstallation1"];
	$record->Air_DisplayInstallationText = $_POST["Air_DisplayInstallationText1"];
	$record->Air_PermitCondition = $_POST["Air_PermitCondition1"];
	$record->Air_PermitConditionText = $_POST["Air_PermitConditionText1"];
	$record->Air_WindDevice = $_POST["Air_WindDevice1"];
	$record->Air_WindDeviceText = $_POST["Air_WindDeviceText1"];
	$record->Air_PlantOperationProblem = $_POST["Air_PlantOperationProblem1"];
	$record->Air_PlantOperationProblemText = $_POST["Air_PlantOperationProblemText1"];
	$record->Air_CCTVInstalled = $_POST["Air_CCTVInstalled1"];
	$record->Air_CCTVInstalledText = $_POST["Air_CCTVInstalledText1"];
	$record->Air_CEMSorPEMS = $_POST["Air_CEMSorPEMS1"];
	$record->Air_CEMSorPEMSText = $_POST["Air_CEMSorPEMSText1"];
	$record->Air_YearlyRATA = $_POST["Air_YearlyRATA1"];
	$record->Air_YearlyRATAText = $_POST["Air_YearlyRATAText1"];
	$record->Air_EmissionTestStandard = $_POST["Air_EmissionTestStandard1"];
	$record->Air_EmissionTestStandardText = $_POST["Air_EmissionTestStandardText1"];
	$record->Air_AmbientQualityStandard = $_POST["Air_AmbientQualityStandard1"];
	$record->Air_AmbientQualityStandardText = $_POST["Air_AmbientQualityStandardText1"];
	$record->Water_ValidDP = $_POST["Water_ValidDP1"];
	$record->Water_ValidDPText = $_POST["Water_ValidDPText1"];
	$record->Water_VolumeDP = $_POST["Water_VolumeDP1"];
	$record->Water_VolumeDPText = $_POST["Water_VolumeDPText1"];
	$record->Water_PermitsComplied = $_POST["Water_PermitsComplied1"];
	$record->Water_PermitsCompliedText = $_POST["Water_PermitsCompliedText1"];
	$record->Water_FlowMeterDevice = $_POST["Water_FlowMeterDevice1"];
	$record->Water_FlowMeterDeviceText = $_POST["Water_FlowMeterDeviceText1"];
	$record->Water_CertifiedSiphoning = $_POST["Water_CertifiedSiphoning1"];
	$record->Water_CertifiedSiphoningText = $_POST["Water_CertifiedSiphoningText1"];
	$record->Water_ComplianceEffluent = $_POST["Water_ComplianceEffluent1"];
	$record->Water_ComplianceEffluentText = $_POST["Water_ComplianceEffluentText1"];
	$record->Water_AmbientQualityMonitoring = $_POST["Water_AmbientQualityMonitoring1"];
	$record->Water_AmbientQualityMonitoringText = $_POST["Water_AmbientQualityMonitoringText1"];
	$record->Water_PaymentWastewater = $_POST["Water_PaymentWastewater1"];
	$record->Water_PaymentWastewaterText = $_POST["Water_PaymentWastewaterText1"];



	$record->SWM_WasteSegregation = $_POST["SWM_WasteSegregation1"];
	$record->SWM_WasteSegregationText = $_POST["SWM_WasteSegregationText1"];
	$record->SWM_WasteDisposalFacilities = $_POST["SWM_WasteDisposalFacilities1"];
	$record->SWM_WasteDisposalFacilitiesText = $_POST["SWM_WasteDisposalFacilitiesText1"];
	$record->PCO_Guidelines = $_POST["PCO_Guidelines1"];
	$record->PCO_GuidelinesText = $_POST["PCO_GuidelinesText1"];
	$record->DAO_SMRSubmission = $_POST["DAO_SMRSubmission1"];
	$record->DAO_SMRSubmissionText = $_POST["DAO_SMRSubmissionText1"];
	// 



	$record->SectionChief = $_POST["SectionChief1"];
	$record->DivisionChief = $_POST["DivisionChief1"];
	$record->RegionalDirector = $_POST["RegionalDirector1"];

	$record->createRecord();
}



?>

