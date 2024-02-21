<?php

    include_once 'dbcon.php';
    include_once 'arrays.php';

    set_time_limit(1000);
    ini_set('memory_limit', '8192M'); 
    
    $filter_data = $_POST['selected_categories'];
    $filter_count = count($filter_data);
    $numrows = 0;

    for($x=0;$x<$filter_count;$x++){
        $numrows++;
        $subarray = array();
        $category = $project_specific_subtype_s[$filter_data[$x]] ?? null;
        $univcount = $db_con->query("SELECT COUNT(*) FROM tblprojects WHERE ProjectSpecificSubtype = ".$filter_data[$x]."")->fetchColumn();
        $eccissued = $db_con->query("SELECT COUNT(*) FROM tblprojects WHERE ProjectSpecificSubtype = ".$filter_data[$x]." AND PEISS = 'ECC'")->fetchColumn();
        $ecccovered = $db_con->query("SELECT COUNT(*) FROM tblprojects WHERE ProjectSpecificSubtype = ".$filter_data[$x]." AND PEISS = 'ECC' AND ReferenceNo != ''")->fetchColumn();
        $cncissued = $db_con->query("SELECT COUNT(*) FROM tblprojects WHERE ProjectSpecificSubtype = ".$filter_data[$x]." AND PEISS = 'CNC'")->fetchColumn();
        $cnccovered = $db_con->query("SELECT COUNT(*) FROM tblprojects WHERE ProjectSpecificSubtype = ".$filter_data[$x]." AND PEISS = 'CNC' AND ReferenceNo != ''")->fetchColumn();
        $novecc = 0;
        $novcnc = 0;
        $monitoredecc = 0;
        $monitoredcnc = 0;
        $noeccwithpermits = 0;
        //-------------------------------------------------------------------------------------
        $sql = "SELECT * FROM tblprojects WHERE ProjectSpecificSubtype = ".$filter_data[$x]." AND (PEISS = 'ECC' OR PEISS = 'CNC')";
        $stmt = $db_con->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if($stmt->rowCount() > 0){
            foreach($result as $row){
                $projectid = $row['ID'];
                $foreignKey = $row['ForeignKey'];
                if($row['PEISS'] == 'ECC'){
                    $novecc = $novecc + $db_con->query("SELECT COUNT(*) FROM tblnotice WHERE ProjectID = ".$projectid." AND Law = 'PD1586'")->fetchColumn(); //COUNT NOVS
                    $monitoredecc = $monitoredecc + $db_con->query("SELECT COUNT(*) FROM tbleia WHERE ProjectID = ".$projectid."")->fetchColumn();
                }else{
                    $novcnc = $novcnc + $db_con->query("SELECT COUNT(*) FROM tblnotice WHERE ProjectID = ".$projectid." AND Law = 'PD1586'")->fetchColumn();
                    $monitoredcnc = $monitoredcnc + $db_con->query("SELECT COUNT(*) FROM tbleia WHERE ProjectID = ".$projectid."")->fetchColumn();
                }   
            }
        }
        //-------------------------------------------------------------------------------------
        $sql = "SELECT * FROM tblprojects WHERE ProjectSpecificSubtype = ".$filter_data[$x]." AND (PEISS = 'CNC' OR PEISS = '')";
        $stmt = $db_con->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if($stmt->rowCount() > 0){
            foreach($result as $row){
                $projectid = $row['ID'];
                $foreignKey = $row['ForeignKey'];
                $noeccwithpermits = $noeccwithpermits + $db_con->query("SELECT COUNT(*) FROM tblpto WHERE ForeignKey = '$foreignKey' AND PTOCode != ''")->fetchColumn();
                $noeccwithpermits = $noeccwithpermits + $db_con->query("SELECT COUNT(*) FROM tbldp WHERE ForeignKey = '$foreignKey' AND WWDPCode != ''")->fetchColumn();
                $noeccwithpermits = $noeccwithpermits + $db_con->query("SELECT COUNT(*) FROM tblccoic WHERE ForeignKey = '$foreignKey' AND PermitNumber != ''")->fetchColumn();
                $noeccwithpermits = $noeccwithpermits + $db_con->query("SELECT COUNT(*) FROM tblccorc WHERE ForeignKey = '$foreignKey' AND PermitNumber != ''")->fetchColumn();
                $noeccwithpermits = $noeccwithpermits + $db_con->query("SELECT COUNT(*) FROM tblhwgid WHERE ForeignKey = '$foreignKey' AND PermitNumber != ''")->fetchColumn();
                $noeccwithpermits = $noeccwithpermits + $db_con->query("SELECT COUNT(*) FROM tblods WHERE ForeignKey = '$foreignKey' AND PermitNumber != ''")->fetchColumn();
                $noeccwithpermits = $noeccwithpermits + $db_con->query("SELECT COUNT(*) FROM tblpcb WHERE ForeignKey = '$foreignKey' AND PermitNumber != ''")->fetchColumn();
                $noeccwithpermits = $noeccwithpermits + $db_con->query("SELECT COUNT(*) FROM tblptt WHERE ForeignKey = '$foreignKey' AND PermitNumber != ''")->fetchColumn();
                $noeccwithpermits = $noeccwithpermits + $db_con->query("SELECT COUNT(*) FROM tblsqi WHERE ForeignKey = '$foreignKey' AND PermitNumber != ''")->fetchColumn();
                $noeccwithpermits = $noeccwithpermits + $db_con->query("SELECT COUNT(*) FROM tbltrc WHERE ForeignKey = '$foreignKey' AND PermitNumber != ''")->fetchColumn();
                $noeccwithpermits = $noeccwithpermits + $db_con->query("SELECT COUNT(*) FROM tbltsd WHERE ForeignKey = '$foreignKey' AND PermitNumber != ''")->fetchColumn();
            }
        }   
        //----------------------------------------------------------------------------------------
        //------------------------DP
        $dpcovered = $db_con->query("SELECT COUNT(*) FROM tblprojects WHERE ProjectSpecificSubtype = ".$filter_data[$x]." AND RA9275='true'")->fetchColumn();
        $dpnot = $db_con->query("SELECT COUNT(*) FROM tblprojects WHERE ProjectSpecificSubtype = ".$filter_data[$x]." AND RA9275='false'")->fetchColumn();
        $dpissued = 0;
        $novdp = 0;
        $monitoreddp = 0;
        //------------------------PTO
        $ptocovered = $db_con->query("SELECT COUNT(*) FROM tblprojects WHERE ProjectSpecificSubtype = ".$filter_data[$x]." AND RA8749='true'")->fetchColumn();
        $ptonot = $db_con->query("SELECT COUNT(*) FROM tblprojects WHERE ProjectSpecificSubtype = ".$filter_data[$x]." AND RA8749='false'")->fetchColumn();
        $ptoissued = 0;
        $novpto = 0;
        $monitoredpto = 0;
        //------------------------HWG
        $hwcovered = $db_con->query("SELECT COUNT(*) FROM tblprojects WHERE ProjectSpecificSubtype = ".$filter_data[$x]." AND RA6969='true'")->fetchColumn();
        $hwnot = $db_con->query("SELECT COUNT(*) FROM tblprojects WHERE ProjectSpecificSubtype = ".$filter_data[$x]." AND RA6969='false'")->fetchColumn();
        $hwgissued = 0;
        $novhwg = 0;
        $monitoredwhg = 0;
        //---------------------------
        $sql = "SELECT * FROM tblprojects WHERE ProjectSpecificSubtype = ".$filter_data[$x]."";
        $stmt = $db_con->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if($stmt->rowCount() > 0){
            foreach($result as $row){
                $projectid = $row['ID'];
                $foreignKey = $row['ForeignKey'];
                //-------------------DP
                $dpissued = $dpissued + $db_con->query("SELECT COUNT(*) FROM tbldp WHERE ForeignKey = '$foreignKey' AND WWDPCode != ''")->fetchColumn();
                $monitoreddp = $monitoreddp + $db_con->query("SELECT COUNT(*) FROM tblwater WHERE ProjectID = ".$projectid."")->fetchColumn();
                $novdp = $novdp + $db_con->query("SELECT COUNT(*) FROM tblnotice WHERE ProjectID = ".$projectid." AND Law='RA9275'")->fetchColumn();
                //-------------------PTO
                $ptoissued = $ptoissued + $db_con->query("SELECT COUNT(*) FROM tblpto WHERE ForeignKey = '$foreignKey' AND PTOCode != ''")->fetchColumn();
                $monitoredpto = $monitoredpto + $db_con->query("SELECT COUNT(*) FROM tblair WHERE ProjectID = ".$projectid."")->fetchColumn();
                $novpto = $novpto + $db_con->query("SELECT COUNT(*) FROM tblnotice WHERE ProjectID = ".$projectid." AND Law='RA8749'")->fetchColumn();
                //-------------------HWG
                $hwgissued = $hwgissued + $db_con->query("SELECT COUNT(*) FROM tblhwgid WHERE ForeignKey = '$foreignKey' AND PermitNumber != ''")->fetchColumn();
                $monitoredwhg = $monitoredwhg + $db_con->query("SELECT COUNT(*) FROM tblhazwaste WHERE ProjectID = ".$projectid."")->fetchColumn();
                $novhwg = $novhwg + $db_con->query("SELECT COUNT(*) FROM tblnotice WHERE ProjectID = ".$projectid." AND Law='RA6969'")->fetchColumn();
            }
        }
        //--------------------------
        $operational = $db_con->query("SELECT COUNT(*) FROM tblprojects WHERE ProjectSpecificSubtype = ".$filter_data[$x]." AND ECCStatus=1")->fetchColumn();
        $notop = $db_con->query("SELECT COUNT(*) FROM tblprojects WHERE ProjectSpecificSubtype = ".$filter_data[$x]." AND ECCStatus=0")->fetchColumn();
        //--------------------------
        $cmrrequired = 0;
        $f2018=0;
        $s2018=0;
        $f2019=0;
        $s2019=0;
        $f2020=0;
        $s2020=0;
        $f2021=0;
        $s2021=0;
        $f2022=0;
        $s2022=0;
        $cmrrequired = $db_con->query("SELECT COUNT(*) FROM tblprojects WHERE ProjectSpecificSubtype = ".$filter_data[$x]." AND CMR='true'")->fetchColumn();
        $sql = "SELECT * FROM tblprojects INNER JOIN tblcmr ON tblprojects.ID=tblcmr.ProjectID WHERE ProjectSpecificSubtype = ".$filter_data[$x]." AND tblprojects.CMR='true'";
        $stmt = $db_con->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if($stmt->rowCount() > 0) {
            foreach($result as $row) {
                $projectid = $row['ProjectID'];
                $f2018 = $f2018 + $db_con->query("SELECT COUNT(*) FROM tblcmr WHERE YearSubmission='2018' AND Semester='First Semester' AND ProjectID=".$projectid."")->fetchColumn();
                $s2018 = $s2018 + $db_con->query("SELECT COUNT(*) FROM tblcmr WHERE YearSubmission='2018' AND Semester='Second Semester' AND ProjectID=".$projectid."")->fetchColumn();
                $f2019 = $f2019 + $db_con->query("SELECT COUNT(*) FROM tblcmr WHERE YearSubmission='2019' AND Semester='First Semester' AND ProjectID=".$projectid."")->fetchColumn();
                $s2019 = $s2019 + $db_con->query("SELECT COUNT(*) FROM tblcmr WHERE YearSubmission='2019' AND Semester='Second Semester' AND ProjectID=".$projectid."")->fetchColumn();
                $f2020 = $f2020 + $db_con->query("SELECT COUNT(*) FROM tblcmr WHERE YearSubmission='2020' AND Semester='First Semester' AND ProjectID=".$projectid."")->fetchColumn();
                $s2020 = $s2020 + $db_con->query("SELECT COUNT(*) FROM tblcmr WHERE YearSubmission='2020' AND Semester='Second Semester' AND ProjectID=".$projectid."")->fetchColumn();
                $f2021 = $f2021 + $db_con->query("SELECT COUNT(*) FROM tblcmr WHERE YearSubmission='2021' AND Semester='First Semester' AND ProjectID=".$projectid."")->fetchColumn();
                $s2021 = $s2021 + $db_con->query("SELECT COUNT(*) FROM tblcmr WHERE YearSubmission='2021' AND Semester='Second Semester' AND ProjectID=".$projectid."")->fetchColumn();
                $f2022 = $f2022 + $db_con->query("SELECT COUNT(*) FROM tblcmr WHERE YearSubmission='2022' AND Semester='First Semester' AND ProjectID=".$projectid."")->fetchColumn();
                $s2022 = $s2022 + $db_con->query("SELECT COUNT(*) FROM tblcmr WHERE YearSubmission='2022' AND Semester='Second Semester' AND ProjectID=".$projectid."")->fetchColumn();
            }
        }
        //--------------------------
        $subarray[] = $category;
        $subarray[] = intval($univcount);
        $subarray[] = intval($eccissued);
        $subarray[] = intval($novecc);
        $subarray[] = intval($ecccovered);
        $subarray[] = intval($noeccwithpermits);
        $subarray[] = intval($monitoredecc);
        $subarray[] = intval($cncissued);
        $subarray[] = intval($novcnc);
        $subarray[] = intval($cnccovered);
        $subarray[] = intval($monitoredcnc);
        //----------------------------------------------------------------------------------------
        $subarray[] = intval($dpissued);
        $subarray[] = intval($novdp);
        $subarray[] = intval($dpcovered);
        $subarray[] = intval($dpnot);
        $subarray[] = intval($monitoreddp);
        //----------------------------------------------------------------------------------------
        $subarray[] = intval($ptoissued);
        $subarray[] = intval($novpto);
        $subarray[] = intval($ptocovered);
        $subarray[] = intval($ptonot);
        $subarray[] = intval($monitoredpto);
        //----------------------------------------------------------------------------------------
        $subarray[] = intval($hwgissued);
        $subarray[] = intval($novhwg);
        $subarray[] = intval($hwcovered);
        $subarray[] = intval($hwnot);
        $subarray[] = intval($monitoredwhg);
        //----------------------------------------------------------------------------------------
        $subarray[] = intval($operational);
        $subarray[] = intval($notop);
        //----------------------------------------------------------------------------------------
        $subarray[] = intval($cmrrequired);
        $subarray[] = intval($f2018);
        $subarray[] = intval($s2018);
        $subarray[] = intval($f2019);
        $subarray[] = intval($s2019);
        $subarray[] = intval($f2020);
        $subarray[] = intval($s2020);
        $subarray[] = intval($f2021);
        $subarray[] = intval($s2021);
        $subarray[] = intval($f2022);
        $subarray[] = intval($s2022);
        //---hehe
        $data[] = $subarray;
    }
    $table_summary = array(
        'draw' => $_POST,
        'recordsTotal' => $numrows,
        'data' => $data
    );
    echo json_encode($table_summary);

?>