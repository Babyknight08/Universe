<?php

session_start();
include_once 'arrays.php';
include_once 'dologin.php';

class Records {	
   
	private $tblreports = 'tblreports';
	public $id;
    public $name;
    public $specificaddress;
    public $address;
	public $designation;
	public $municipality;
	public $name1;
	public $userid;
	public $datecreated;
	public $reportcontrol;
	public $doi;
	public $missionorder;
	public $psiccode;
	public $product;
	public $latitude;
	public $longitude;
	public $yearestablished;
	public $pco;
	public $nob;
	public $laws;
	public $air;
	public $water;
	public $eia;
	public $chwms;
	public $solidwaste;
	public $operating_day;
	public $operating_week;
	public $operating_year;
	public $mhead;
	public $pcoaccreditation;
	public $VerifyAccuracy;
	public $PMPIN_Hazardous;
	public $HWIDRegistration;
	public $HWTRegistration;
	public $HWTSDRegistration;
	public $PTOAPCI;
	public $PCOA_Date;
	public $ContactNumber;
	public $EmailAddress;
	public $DischargePermit;
	public $OthersPV;
	public $otherspv_text;
	public $DetermineCompliance;
	public $InvestigateComplaints;
	public $StatusCommitments;
	public $EwatchProgram;
	public $PEPP;
	public $PAB;
	public $Others;
	public $Others_Text;
	public $ECC;
	public $ECC_DOI;
	public $ECC_DE;
	public $DENRID;
	public $DENRID_DOI;
	public $DENRID_DE;
	public $PCL_Compliance;
	public $PCL_Compliance_DOI;
	public $PCL_Compliance_DE;
	public $CCO_Registry;
	public $CCO_Registry_DOI;
	public $CCO_Registry_DE;
	public $Importation_Clearance;
	public $Importation_Clearance_DOI;
	public $Importation_Clearance_DE;
	public $COT_Issued;
	public $COT_Issued_DOI;
	public $COT_Issued_DE;
	public $TSD_RegistrationCert;
	public $TSD_RegistrationCert_DOI;
	public $TSD_RegistrationCert_DE;
	public $POA_No;
	public $POA_No_DOI;
	public $POA_No_DE;
	public $Discharge_Permit;
	public $Discharge_Permit_DOI;
	public $Discharge_Permit_DE;
	public $MOA_Agreement;
	public $MOA_Agreement_DOI;
	public $MOA_Agreement_DE;
	public $ECC_Condition;
	public $SectionChief;
	public $DivisionChief;
	public $RegionalDirector;



	private $conn;
	
	public function __construct($db){
        $this->conn = $db;
    }	    
	
	public function listRecords(){
		$userid = $_SESSION['userid'];
		$sqlQuery = "SELECT * FROM tblreports INNER JOIN tblprojects ON tblreports.ProjectName = tblprojects.ID WHERE userid = '$userid' ";
		// $sqlQuery = "SELECT * FROM ".$this->tblreports." WHERE userid = '$userid' ";
		if(!empty($_POST["search"]["value"])){
			$sqlQuery .= 'AND (tblreports.id LIKE "%'.$_POST["search"]["value"].'%"';
			$sqlQuery .= ' OR tblprojects.ProjectName LIKE "%'.$_POST["search"]["value"].'%" ';
			$sqlQuery .= ' OR tblprojects.ReferenceNo LIKE "%'.$_POST["search"]["value"].'%" ';
			$sqlQuery .= ' OR tblprojects.SpecificAddress LIKE "%'.$_POST["search"]["value"].'%")';
		}
		

		if(!empty($_POST["order"])){
			$sqlQuery .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
		} else {
			$sqlQuery .= 'ORDER BY tblreports.id DESC ';
		}
		
		if($_POST["length"] != -1){
			$sqlQuery .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
		}
		
		$stmt = $this->conn->prepare($sqlQuery);
		$stmt->execute();
		$result = $stmt->get_result();	
		
		$stmtTotal = $this->conn->prepare("SELECT * FROM tblreports WHERE userid = '$userid'");
		$stmtTotal->execute();
		$allResult = $stmtTotal->get_result();
		$allRecords = $allResult->num_rows;
		
		$displayRecords = $result->num_rows;
		$records = array();		
		while ($record = $result->fetch_assoc()) { 				
			$rows = array();			
			$rows[] = $record['id'];
			$rows[] = ucfirst($record['ProjectName']);
			$rows[] = $record['SpecificAddress']. ", " .$record['Municipality']. ", " .$record['Province'];	
			$rows[] = $record['ReferenceNo'];
			$rows[] = $record['DateofInspection'];	
			$rows[] = $record['datecreated'];					
			$rows[] = '<div class="d-flex justify-content-around"><button type="button" name="update" id="'.$record["id"].'" class="btn btn-success btn update" >Update</button><button type="button" name="delete" id="'.$record["id"].'" class="btn btn-danger btn delete" >Delete</button></div>';
			$rows[] = '<div class="d-flex justify-content-center"><a href="ExportPDF.php?id='.$record['id'].'" target="_blank" class="fa fa-file-pdf pdf" name="pdf" id="'.$record["id"].'" style="font-size:36px;color:red" ></a></div>';
			$records[] = $rows;
		}
		
		$output = array(
			"draw"	=>	intval($_POST["draw"]),			
			"iTotalRecords"	=> 	$displayRecords,
			"iTotalDisplayRecords"	=>  $allRecords,
			"data"	=> 	$records
		);
		echo json_encode($output);
		
	}
	
	public function getRecord(){

		if($this->id) {
			$sqlQuery = "SELECT * FROM tblreports INNER JOIN tblprojects ON tblreports.ProjectName = tblprojects.ID WHERE tblreports.id = ?";			
			$stmt = $this->conn->prepare($sqlQuery);
			$stmt->bind_param("i", $this->id);	
			$stmt->execute();
			$result = $stmt->get_result();
			$record = $result->fetch_assoc();
			echo json_encode($record);
		}
	}

	public function updateRecord(){
		
		if($this->id) {	
			
			$stmt = $this->conn->prepare("
			UPDATE tblreports SET Reportcontrol = ?, DateofInspection = ?, MissionOrder = ?,ReportPD1586 =?, ReportRA6969 =?, ReportRA8749 =?, ReportRA9275 =?,  ReportRA9003 =?,  SpecificAddress = ?,NatureofBusiness = ?,PSIC = ?, Product = ?, Latitude = ?, Longitude = ?, YearEstablished = ?, OperatingDay = ?, OperatingWeek = ?, OperatingYear = ?, ManagingHead = ?, PCOAccreditation = ?, PCOA_Date = ?, ContactNumber = ?, EmailAddress = ?, VerifyAccuracy = ?, PMPIN_Hazardous = ? ,HWIDRegistration = ?, HWTRegistration = ?, HWTSDRegistration = ?, PTOAPCI = ?, DischargePermit = ?, OthersPV = ?, OthersPV_Text = ?, DetermineCompliance = ?, InvestigateComplaints = ?, StatusCommitments = ?, EwatchProgram = ?, PEPP = ?, PAB = ?, Others =?, Others_Text = ?, ECC = ?, ECC_DOI = ?, ECC_DE = ?, DENRID = ?, DENRID_DOI = ?, DENRID_DE = ?, PCL_Compliance = ?, PCL_Compliance_DOI = ?, PCL_Compliance_DE = ?, CCO_Registry = ?, CCO_Registry_DOI = ?, CCO_Registry_DE = ?, Importation_Clearance = ?, Importation_Clearance_DOI = ?, Importation_Clearance_DE = ?, COT_Issued =?, COT_Issued_DOI = ?, COT_Issued_DE = ?, TSD_RegistrationCert = ?, TSD_RegistrationCert_DOI = ?, TSD_RegistrationCert_DE = ?, POA_No = ?, POA_No_DOI = ?, POA_No_DE = ?, Discharge_Permit = ?, Discharge_Permit_DOI = ?, Discharge_Permit_DE = ?, MOA_Agreement = ?, MOA_Agreement_DOI = ?, MOA_Agreement_DE = ? WHERE id = ?");
	 
			$this->id = htmlspecialchars(strip_tags($this->id));
			$this->reportcontrol = htmlspecialchars(strip_tags($this->reportcontrol));
			$this->doi = htmlspecialchars(strip_tags($this->doi));
			$this->missionorder = htmlspecialchars(strip_tags($this->missionorder));
			$this->eia = htmlspecialchars(strip_tags($this->eia));
			$this->chwms = htmlspecialchars(strip_tags($this->chwms));
			$this->air = htmlspecialchars(strip_tags($this->air));
			$this->water = htmlspecialchars(strip_tags($this->water));
			$this->solidwaste = htmlspecialchars(strip_tags($this->solidwaste));
			$this->specificaddress = htmlspecialchars(strip_tags($this->specificaddress));
			$this->nob = htmlspecialchars(strip_tags($this->nob));
			$this->psiccode = htmlspecialchars(strip_tags($this->psiccode));
			$this->product = htmlspecialchars(strip_tags($this->product));
			$this->latitude = htmlspecialchars(strip_tags($this->latitude));
			$this->longitude = htmlspecialchars(strip_tags($this->longitude));
			$this->yearestablished = htmlspecialchars(strip_tags($this->yearestablished));
			$this->operating_day = htmlspecialchars(strip_tags($this->operating_day));
			$this->operating_week = htmlspecialchars(strip_tags($this->operating_week));
			$this->operating_year = htmlspecialchars(strip_tags($this->operating_year));
			$this->mhead = htmlspecialchars(strip_tags($this->mhead));
			$this->pcoaccreditation = htmlspecialchars(strip_tags($this->pcoaccreditation));
			$this->pcoaccreditation = htmlspecialchars(strip_tags($this->PCOA_Date));
			$this->ContactNumber = htmlspecialchars(strip_tags($this->ContactNumber));
			$this->EmailAddress = htmlspecialchars(strip_tags($this->EmailAddress));
			$this->VerifyAccuracy = htmlspecialchars(strip_tags($this->VerifyAccuracy));
			$this->PMPIN_Hazardous = htmlspecialchars(strip_tags($this->PMPIN_Hazardous));
			$this->HWIDRegistration = htmlspecialchars(strip_tags($this->HWIDRegistration));
			$this->HWTRegistration = htmlspecialchars(strip_tags($this->HWTRegistration));
			$this->HWTSDRegistration = htmlspecialchars(strip_tags($this->HWTSDRegistration));
			$this->PTOAPCI = htmlspecialchars(strip_tags($this->PTOAPCI));
			$this->DischargePermit = htmlspecialchars(strip_tags($this->DischargePermit));
			$this->OthersPV = htmlspecialchars(strip_tags($this->OthersPV));
			$this->otherspv_text = htmlspecialchars(strip_tags($this->otherspv_text));
			$this->DetermineCompliance = htmlspecialchars(strip_tags($this->DetermineCompliance));
			$this->InvestigateComplaints = htmlspecialchars(strip_tags($this->InvestigateComplaints));
			$this->StatusCommitments = htmlspecialchars(strip_tags($this->StatusCommitments));
			$this->EwatchProgram = htmlspecialchars(strip_tags($this->EwatchProgram));
			$this->PEPP = htmlspecialchars(strip_tags($this->PEPP));
			$this->PAB = htmlspecialchars(strip_tags($this->PAB));
			$this->Others = htmlspecialchars(strip_tags($this->Others));
			$this->Others_Text = htmlspecialchars(strip_tags($this->Others_Text));
			$this->ECC = htmlspecialchars(strip_tags($this->ECC));
			$this->ECC_DOI = htmlspecialchars(strip_tags($this->ECC_DOI));
			$this->ECC_DE = htmlspecialchars(strip_tags($this->ECC_DE));
			$this->DENRID = htmlspecialchars(strip_tags($this->DENRID));
			$this->DENRID_DOI = htmlspecialchars(strip_tags($this->DENRID_DOI));
			$this->DENRID_DE = htmlspecialchars(strip_tags($this->DENRID_DE));
			$this->PCL_Compliance = htmlspecialchars(strip_tags($this->PCL_Compliance));
			$this->PCL_Compliance_DOI = htmlspecialchars(strip_tags($this->PCL_Compliance_DOI));
			$this->PCL_Compliance_DE = htmlspecialchars(strip_tags($this->PCL_Compliance_DE));
			$this->CCO_Registry = htmlspecialchars(strip_tags($this->CCO_Registry));
			$this->CCO_Registry_DOI = htmlspecialchars(strip_tags($this->CCO_Registry_DOI));
			$this->CCO_Registry_DE = htmlspecialchars(strip_tags($this->CCO_Registry_DE));
			$this->Importation_Clearance = htmlspecialchars(strip_tags($this->Importation_Clearance));
			$this->Importation_Clearance_DOI = htmlspecialchars(strip_tags($this->Importation_Clearance_DOI));
			$this->Importation_Clearance_DE = htmlspecialchars(strip_tags($this->Importation_Clearance_DE));
			$this->COT_Issued = htmlspecialchars(strip_tags($this->COT_Issued));
			$this->COT_Issued_DOI = htmlspecialchars(strip_tags($this->COT_Issued_DOI));
			$this->COT_Issued_DE = htmlspecialchars(strip_tags($this->COT_Issued_DE));
			$this->TSD_RegistrationCert = htmlspecialchars(strip_tags($this->TSD_RegistrationCert));
			$this->TSD_RegistrationCert_DOI = htmlspecialchars(strip_tags($this->TSD_RegistrationCert_DOI));
			$this->TSD_RegistrationCert_DE = htmlspecialchars(strip_tags($this->TSD_RegistrationCert_DE));
			$this->POA_No = htmlspecialchars(strip_tags($this->POA_No));
			$this->POA_No_DOI = htmlspecialchars(strip_tags($this->POA_No_DOI));
			$this->POA_No_DE = htmlspecialchars(strip_tags($this->POA_No_DE));
			$this->Discharge_Permit = htmlspecialchars(strip_tags($this->Discharge_Permit));
			$this->Discharge_Permit_DOI = htmlspecialchars(strip_tags($this->Discharge_Permit_DOI));
			$this->Discharge_Permit_DE = htmlspecialchars(strip_tags($this->Discharge_Permit_DE));
			$this->MOA_Agreement = htmlspecialchars(strip_tags($this->MOA_Agreement));
			$this->MOA_Agreement_DOI = htmlspecialchars(strip_tags($this->MOA_Agreement_DOI));
			$this->MOA_Agreement_DE = htmlspecialchars(strip_tags($this->MOA_Agreement_DE));

			

			
			$stmt->bind_param("sssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss",$this->reportcontrol, $this->doi, $this->missionorder,$this->eia,$this->chwms,$this->air,$this->water,$this->solidwaste, $this->specificaddress, $this->nob, $this->psiccode, $this->product, $this->latitude, $this->longitude,$this->yearestablished,$this->operating_day,$this->operating_week,$this->operating_year,$this->mhead,$this->pcoaccreditation,$this->PCOA_Date,$this->ContactNumber,$this->EmailAddress,$this->VerifyAccuracy,$this->PMPIN_Hazardous,$this->HWIDRegistration,$this->HWTRegistration,$this->HWTSDRegistration, $this->PTOAPCI, $this->DischargePermit,$this->OthersPV ,$this->otherspv_text,$this->DetermineCompliance,$this->InvestigateComplaints,$this->StatusCommitments,$this->EwatchProgram,$this->PEPP,$this->PAB,$this->Others,$this->Others_Text,	$this->ECC,$this->ECC_DOI,$this->ECC_DE,$this->DENRID,$this->DENRID_DOI,$this->DENRID_DE,$this->PCL_Compliance,$this->PCL_Compliance_DOI,$this->PCL_Compliance_DE,$this->CCO_Registry,$this->CCO_Registry_DOI,$this->CCO_Registry_DE,$this->Importation_Clearance,$this->Importation_Clearance_DOI,$this->Importation_Clearance_DE,$this->COT_Issued,$this->COT_Issued_DOI,$this->COT_Issued_DE,$this->TSD_RegistrationCert, $this->TSD_RegistrationCert_DOI, $this->TSD_RegistrationCert_DE,$this->POA_No, $this->POA_No_DOI, $this->POA_No_DE, $this->Discharge_Permit, $this->Discharge_Permit_DOI, $this->Discharge_Permit_DE, $this->MOA_Agreement, $this->MOA_Agreement_DOI, $this->MOA_Agreement_DE, $this->id);
			if($stmt->execute()){
				return true;
			}	
		}	
	}

	public function deleteRecord(){
		if($this->id) {			

			$stmt = $this->conn->prepare("
				DELETE FROM ".$this->tblreports." 
				WHERE id = ?");

			$this->id = htmlspecialchars(strip_tags($this->id));

			$stmt->bind_param("i", $this->id);

			if($stmt->execute()){
				return true;
			}
		}
	}

	public function createRecord(){
		
		$userid = $_SESSION['userid'];
		

		if($this->name) {

			date_default_timezone_set('Asia/Manila');
			$this->datecreated = date("Y/m/d h:i:s"); 	
			$conditions = join(" ",$this->ECC_Condition);

			$query = "
			INSERT INTO ".$this->tblreports."(`ID`,`Reportcontrol`,`DateofInspection`,`MissionOrder`,`ReportPD1586`,`ReportRA6969`,`ReportRA8749`,`ReportRA9275`,`ReportRA9003`,`ProjectName`, `SpecificAddress`,`NatureofBusiness`,`PSIC`,`Product`,`Latitude`,`Longitude`,`YearEstablished`,`PCOName`,`OperatingDay`,`OperatingWeek`,`OperatingYear`,`ManagingHead`,`PCOAccreditation`,`PCOA_Date`,`ContactNumber`,`EmailAddress`,`VerifyAccuracy`,`PMPIN_Hazardous`,`HWIDRegistration`,`HWTRegistration`,`HWTSDRegistration`,`PTOAPCI`,`DischargePermit`,`OthersPV`,`OthersPV_text`,`DetermineCompliance`,`InvestigateComplaints`,`StatusCommitments`,`EwatchProgram`,`PEPP`,`PAB`,`Others`,`Others_Text`,`ECC`,`ECC_DOI`,`ECC_DE`,`DENRID`,`DENRID_DOI`,`DENRID_DE`,`PCL_Compliance`,`PCL_Compliance_DOI`,`PCL_Compliance_DE`,`CCO_Registry`,`CCO_Registry_DOI`,`CCO_Registry_DE`,`Importation_Clearance`,`Importation_Clearance_DOI`,`Importation_Clearance_DE`,`COT_Issued`,`COT_Issued_DOI`,`COT_Issued_DE`,`TSD_RegistrationCert`,`TSD_RegistrationCert_DOI`,`TSD_RegistrationCert_DE`,`POA_No`,`POA_No_DOI`,`POA_No_DE`,`Discharge_Permit`,`Discharge_Permit_DOI`,`Discharge_Permit_DE`,`MOA_Agreement`,`MOA_Agreement_DOI`,`MOA_Agreement_DE`,`ECC_Condition`,`SectionChief`,`DivisionChief`,`RegionalDirector`,`datecreated`,`userid`)
			VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,$userid)";
			$stmt = $this->conn->prepare($query);
			
			$this->id = htmlspecialchars(strip_tags(strtoupper($this->id)));
			$this->reportcontrol = htmlspecialchars(strip_tags(strtoupper($this->reportcontrol)));
			$this->doi = htmlspecialchars(strip_tags($this->doi));
			$this->missionorder = htmlspecialchars(strip_tags(strtoupper($this->missionorder)));
			$this->name = htmlspecialchars(strip_tags($this->name));
			$this->eia = htmlspecialchars(strip_tags($this->eia));
			$this->chwms = htmlspecialchars(strip_tags($this->chwms));
			$this->air = htmlspecialchars(strip_tags($this->air));
			$this->water = htmlspecialchars(strip_tags($this->water));
			$this->solidwaste = htmlspecialchars(strip_tags($this->solidwaste));
			$this->specificaddress = htmlspecialchars(strip_tags($this->specificaddress));
			$this->nob = htmlspecialchars(strip_tags($this->nob));
			$this->psiccode = htmlspecialchars(strip_tags($this->psiccode));
			$this->product = htmlspecialchars(strip_tags($this->product));
			$this->latitude = htmlspecialchars(strip_tags($this->latitude));
			$this->longitude = htmlspecialchars(strip_tags($this->longitude));
			$this->yearestablished = htmlspecialchars(strip_tags($this->yearestablished));
			$this->pco = htmlspecialchars(strip_tags($this->pco));
			$this->datecreated = htmlspecialchars(strip_tags($this->datecreated));
			$this->operating_day = htmlspecialchars(strip_tags($this->operating_day));
			$this->operating_week = htmlspecialchars(strip_tags($this->operating_week));
			$this->operating_year = htmlspecialchars(strip_tags($this->operating_year));
			$this->mhead = htmlspecialchars(strip_tags(ucwords($this->mhead)));
			$this->pcoaccreditation = htmlspecialchars(strip_tags($this->pcoaccreditation));
			$this->pcoaccreditation = htmlspecialchars(strip_tags($this->PCOA_Date));
			$this->ContactNumber = htmlspecialchars(strip_tags($this->ContactNumber));
			$this->EmailAddress = htmlspecialchars(strip_tags($this->EmailAddress));
			$this->VerifyAccuracy = htmlspecialchars(strip_tags($this->VerifyAccuracy));
			$this->PMPIN_Hazardous = htmlspecialchars(strip_tags($this->PMPIN_Hazardous));
			$this->HWIDRegistration = htmlspecialchars(strip_tags($this->HWIDRegistration));
			$this->HWTRegistration = htmlspecialchars(strip_tags($this->HWTRegistration));
			$this->HWTSDRegistration = htmlspecialchars(strip_tags($this->HWTSDRegistration));
			$this->PTOAPCI = htmlspecialchars(strip_tags($this->PTOAPCI));
			$this->DischargePermit = htmlspecialchars(strip_tags($this->DischargePermit));
			$this->OthersPV = htmlspecialchars(strip_tags($this->OthersPV));
			$this->otherspv_text = htmlspecialchars(strip_tags($this->otherspv_text));
			$this->DetermineCompliance = htmlspecialchars(strip_tags($this->DetermineCompliance));
			$this->InvestigateComplaints = htmlspecialchars(strip_tags($this->InvestigateComplaints));
			$this->StatusCommitments = htmlspecialchars(strip_tags($this->StatusCommitments));
			$this->EwatchProgram = htmlspecialchars(strip_tags($this->EwatchProgram));
			$this->PEPP = htmlspecialchars(strip_tags($this->PEPP));
			$this->PAB = htmlspecialchars(strip_tags($this->PAB));
			$this->Others = htmlspecialchars(strip_tags($this->Others));
			$this->Others_Text = htmlspecialchars(strip_tags($this->Others_Text));
			$this->ECC = htmlspecialchars(strip_tags($this->ECC));
			$this->ECC_DOI = htmlspecialchars(strip_tags($this->ECC_DOI));
			$this->ECC_DE = htmlspecialchars(strip_tags($this->ECC_DE));
			$this->DENRID = htmlspecialchars(strip_tags($this->DENRID));
			$this->DENRID_DOI = htmlspecialchars(strip_tags($this->DENRID_DOI));
			$this->DENRID_DE = htmlspecialchars(strip_tags($this->DENRID_DE));
			$this->PCL_Compliance = htmlspecialchars(strip_tags($this->PCL_Compliance));
			$this->PCL_Compliance_DOI = htmlspecialchars(strip_tags($this->PCL_Compliance_DOI));
			$this->PCL_Compliance_DE = htmlspecialchars(strip_tags($this->PCL_Compliance_DE));
			$this->CCO_Registry = htmlspecialchars(strip_tags($this->CCO_Registry));
			$this->CCO_Registry_DOI = htmlspecialchars(strip_tags($this->CCO_Registry_DOI));
			$this->CCO_Registry_DE = htmlspecialchars(strip_tags($this->CCO_Registry_DE));
			$this->Importation_Clearance = htmlspecialchars(strip_tags($this->Importation_Clearance));
			$this->Importation_Clearance_DOI = htmlspecialchars(strip_tags($this->Importation_Clearance_DOI));
			$this->Importation_Clearance_DE = htmlspecialchars(strip_tags($this->Importation_Clearance_DE));
			$this->COT_Issued = htmlspecialchars(strip_tags($this->COT_Issued));
			$this->COT_Issued_DOI = htmlspecialchars(strip_tags($this->COT_Issued_DOI));
			$this->COT_Issued_DE = htmlspecialchars(strip_tags($this->COT_Issued_DE));
			$this->TSD_RegistrationCert = htmlspecialchars(strip_tags($this->TSD_RegistrationCert));
			$this->TSD_RegistrationCert_DOI = htmlspecialchars(strip_tags($this->TSD_RegistrationCert_DOI));
			$this->TSD_RegistrationCert_DE = htmlspecialchars(strip_tags($this->TSD_RegistrationCert_DE));
			$this->POA_No = htmlspecialchars(strip_tags($this->POA_No));
			$this->POA_No_DOI = htmlspecialchars(strip_tags($this->POA_No_DOI));
			$this->POA_No_DE = htmlspecialchars(strip_tags($this->POA_No_DE));
			$this->Discharge_Permit = htmlspecialchars(strip_tags($this->Discharge_Permit));
			$this->Discharge_Permit_DOI = htmlspecialchars(strip_tags($this->Discharge_Permit_DOI));
			$this->Discharge_Permit_DE = htmlspecialchars(strip_tags($this->Discharge_Permit_DE));
			$this->MOA_Agreement = htmlspecialchars(strip_tags($this->MOA_Agreement));
			$this->MOA_Agreement_DOI = htmlspecialchars(strip_tags($this->MOA_Agreement_DOI));
			$this->MOA_Agreement_DE = htmlspecialchars(strip_tags($this->MOA_Agreement_DE));
			$this->SectionChief = htmlspecialchars(strip_tags($this->SectionChief));
			$this->DivisionChief = htmlspecialchars(strip_tags($this->DivisionChief));
			$this->RegionalDirector = htmlspecialchars(strip_tags($this->RegionalDirector));
			
			$stmt->bind_param("ssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss",$this->id,$this->reportcontrol,$this->doi,$this->missionorder,$this->eia,$this->chwms,$this->air,$this->water,$this->solidwaste,$this->name, $this->specificaddress,$this->nob,$this->psiccode,$this->product,$this->latitude,$this->longitude,$this->yearestablished,$this->pco,$this->operating_day,$this->operating_week,$this->operating_year,$this->mhead,$this->pcoaccreditation,$this->PCOA_Date,$this->ContactNumber,$this->EmailAddress,$this->VerifyAccuracy,$this->PMPIN_Hazardous,$this->HWIDRegistration,$this->HWTRegistration,$this->HWTSDRegistration,$this->PTOAPCI,$this->DischargePermit,$this->OthersPV,$this->otherspv_text,$this->DetermineCompliance,$this->InvestigateComplaints,$this->StatusCommitments,$this->EwatchProgram,$this->PEPP,$this->PAB,$this->Others,$this->Others_Text,$this->ECC,$this->ECC_DOI,$this->ECC_DE,$this->DENRID,$this->DENRID_DOI,$this->DENRID_DE,$this->PCL_Compliance,$this->PCL_Compliance_DOI,$this->PCL_Compliance_DE,$this->CCO_Registry,$this->CCO_Registry_DOI,$this->CCO_Registry_DE,$this->Importation_Clearance,$this->Importation_Clearance_DOI,$this->Importation_Clearance_DE,$this->COT_Issued,$this->COT_Issued_DOI,$this->COT_Issued_DE,$this->TSD_RegistrationCert,$this->TSD_RegistrationCert_DOI,$this->TSD_RegistrationCert_DE,$this->POA_No,$this->POA_No_DOI,$this->POA_No_DE,$this->Discharge_Permit,$this->Discharge_Permit_DOI,$this->Discharge_Permit_DE,$this->MOA_Agreement,$this->MOA_Agreement_DOI,$this->MOA_Agreement_DE,$conditions,$this->SectionChief,$this->DivisionChief,$this->RegionalDirector,$this->datecreated);
				if($stmt->execute()){
				return true;
			}	
			

	}
		else{
			echo "no record";
		}
	}


	public function pageLoad() {
		$sqlQuery = "SELECT * FROM tblprojects ORDER BY ProjectName";			
		$stmt = $this->conn->prepare($sqlQuery);
		$stmt->execute();
		$result = $stmt->get_result();
		$data = $result->fetch_all();

		return $data;
	}

	public function fetchData($project_id) {
		$sqlQuery = "SELECT * FROM tblprojects INNER JOIN tblpco ON tblprojects.ForeignKey = tblpco.ForeignKey WHERE tblprojects.ID = {$project_id}";				
		$stmt = $this->conn->prepare($sqlQuery);
		$stmt->execute();
		$result = $stmt->get_result();
		$data = $result->fetch_assoc();
		if($result->num_rows > 0) {
			return $data;
		}else{
			return 'none';
		}
	}

	public function pdfRecord($recordid){

		// if($this->id) {

			// include "../../pages/universe/fpdf.php";
			// $pdf = new FPDF;
			// $pdf->Output();
			
			$query = "SELECT * FROM tblreports INNER JOIN tblprojects ON tblreports.ProjectName = tblprojects.ID WHERE tblreports.ID = $recordid";
			$stmt = $this->conn->prepare($query);
    		$stmt->execute();
			$result = $stmt->get_result();
			$aahh = $result->fetch_assoc();
			while ($row = $result->fetch_assoc()) {
			
			}
			return $aahh;
			
	}
	
}

?>

