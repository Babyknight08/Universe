<?php

    include_once 'dbcon.php';
    include_once 'arrays2.php';
    include_once 'vendor/autoload.php';

    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
    use PhpOffice\PhpSpreadsheet\IOFactory;

    set_time_limit(500);
    ini_set('memory_limit', '8192M'); 

    $status_array = array(
        '0' => 'Non-Applicable',
        '1' => 'Operational',
        '2' => 'Non-Operational',
        '3' => 'Relieved',
        '4' => 'Cancelled'
    );

    $data = json_decode(file_get_contents('php://input'));
    $status = $data->status;
    $province = $data->province;
    $peiss = $data->peiss;
    $statuscheck = $data->statuscheck;
    $peisscheck = $data->peisscheck;
    $permitcheck = $data->permitcheck;
    $provincecheck = $data->provincecheck;
    $ptypecheck = $data->ptypecheck;
    $psubtypecheck = $data->psubtypecheck;
    $pstypecheck = $data->pstypecheck;
    $pssubtypecheck = $data->pssubtypecheck;
    $ptype = $data->projecttype;
    $psubtype = $data->projectsubtype;
    $pstype = $data->projectspecifictype;
    $pssubtype = $data->projectspecificsubtype;
    $permit = $data->permit;
    $datefrom = $data->datefrom;
    $dateto = $data->dateto;
    $status_len = count($status);
    $province_len = count($province);

    $province_query = '';
    $status_query = '';
    $where = ' WHERE ';
    $and = ' AND ';
    $firstCondition = 1;

    //$spreadsheet = new Spreadsheet();
    $reader = IOFactory::createReader('Xlsx');
    $spreadsheet = $reader->load('UNIVERSEFORMAT.xlsx');
    $sheet = $spreadsheet->getActiveSheet();

    $rowNo = 6;     //Start of Row in Excel Template
    $resultCount = 0;

    // HIDE CMR COLUMNS
    $fsem = array('BX', 'BZ', 'CB', 'CD', 'CF', 'CH');
    $ssem = array('BY', 'CA', 'CC', 'CE', 'CG' ,'CI');
    $year_arr = array(2018, 2019, 2020, 2021, 2022, 2023);
    for($i=0;$i<count($year_arr);$i++) {
        $sheet->getColumnDimension($fsem[$i])->setVisible(false);
        $sheet->getColumnDimension($ssem[$i])->setVisible(false);
    }

    $sql = 'SELECT * FROM tblprojects';          //Initial Query

    if($peisscheck==false || $provincecheck==false || $ptypecheck==false || $psubtypecheck==false || $pstypecheck==false || $pssubtypecheck==false){
        $sql .= $where;
        if($peisscheck==false){
            $sql .= 'PEISS="'.$peiss.'"';
            $firstCondition = 0;
        }
        //---------------------------------------------------------------
        if($provincecheck==false){
            for($x=0;$x<$province_len;$x++){
                if($x==0){
                    $province_query .= '(Province="'.$province[$x].'"';
                }else{
                    $province_query .= ' OR Province="'.$province[$x].'"';
                }
            }
            $province_query .= ')';
            if($firstCondition==0){
                $sql .= $and . $province_query;
            }else{
                $sql .= $province_query;
                $firstCondition = 0;
            }
        }
        //---------------------------------------------------------------
        if($statuscheck==false){
            for($x=0;$x<$status_len;$x++){
                if($x==0){
                    $status_query .= '(ECCStatus="'.$status[$x].'"';
                }else{
                    $status_query .= ' OR ECCStatus="'.$status[$x].'"';
                }
            }
            $status_query .= ')';
            if($firstCondition==0){
                $sql .= $and . $status_query;
            }else{
                $sql .= $status_query;
                $firstCondition = 0;
            }
        }
        //---------------------------------------------------------------
        if($ptypecheck==false){
            if($firstCondition==0){
                $sql .= $and . 'ProjectType="'.$ptype.'"';
            }else{
                $sql .= 'ProjectType="'.$ptype.'"';
                $firstCondition=0;
            }
        }
        //---------------------------------------------------------------
        if($psubtypecheck==false){
            if($firstCondition==0){
                $sql .= $and . 'ProjectSubtype="'.$psubtype.'"';
            }else{
                $sql .= 'ProjectSubtype="'.$psubtype.'"';
                $firstCondition=0;
            }
        }
        //---------------------------------------------------------------
        if($pstypecheck==false){
            if($firstCondition==0){
                $sql .= $and . 'ProjectSpecificType="'.$pstype.'"';
            }else{
                $sql .= 'ProjectSpecificType="'.$pstype.'"';
                $firstCondition=0;
            }    
        }
        //---------------------------------------------------------------
        if($pssubtypecheck==false){
            if($firstCondition==0){
                $sql .= $and . 'ProjectSpecificSubtype="'.$pssubtype.'"';
            }else{
                $sql .= 'ProjectSpecificSubtype="'.$pssubtype.'"';
                $firstCondition=0;
            }              
        }
    }

    $stmt = $db_con->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // $resultCount = $stmt->rowCount();
    if($stmt->rowCount() > 0){
        foreach($result as $row){
            $foreignKey = $row['ForeignKey'];
            $projectID = $row['ID'];
            //check per law
            if($permitcheck == false){  //IF USER IS FILTERING FOR A SPECIFIC PERMIT TYPE
                if($permit=='tblpto'){
                    $PermitNo = 'PTOCode';
                }elseif($permit=='tbldp'){
                    $PermitNo = 'WWDPCode';
                }else{
                    $PermitNo = 'PermitNumber';
                }
                $sqlpermit = 'SELECT * FROM '.$permit.' WHERE "'.$PermitNo.'" != "" AND (IssuanceDate BETWEEN "'.$datefrom.'" AND "'.$dateto.'") AND ForeignKey="'.$foreignKey.'" ORDER BY IssuanceDate DESC LIMIT 1';
                $stmt = $db_con->prepare($sqlpermit);
                $stmt->execute();
                //$res = $stmt->fetch(PDO::FETCH_ASSOC);
                if($stmt->rowCount() == 1){
                    $resultCount+=1;
                    $dateApp = new DateTime($row['DateApproved']);
                    $dateNow = new DateTime(date('Y-m-d'));
                    $diff = $dateNow->diff($dateApp);
                    $sheet->setCellValue('A'.$rowNo, $row['ReferenceNo']);
                    $sheet->setCellValue('B'.$rowNo, $row['PEISS']);
                    $sheet->setCellValue('C'.$rowNo, $row['DateApproved']);
                    $sheet->setCellValue('D'.$rowNo, $diff->y);
                    $sheet->setCellValue('E'.$rowNo, $row['Region']);
                    $sheet->setCellValue('F'.$rowNo, $row['PSICCode']);
                    $sheet->setCellValue('G'.$rowNo, $row['ProjectName']);
                    $sheet->setCellValue('H'.$rowNo, $row['Proponent']);
                    $sheet->setCellValue('I'.$rowNo, $project_type_s[$row['ProjectType']] ?? null);
                    $sheet->setCellValue('J'.$rowNo, $project_subtype_s[$row['ProjectSubtype']] ?? null);
                    $sheet->setCellValue('K'.$rowNo, $project_specific_type_s[$row['ProjectSpecificType']] ?? null);
                    $sheet->setCellValue('L'.$rowNo, $project_specific_subtype_s[$row['ProjectSpecificSubtype']] ?? null);
                    $sheet->setCellValue('M'.$rowNo, $row['SpecificAddress']);
                    $sheet->setCellValue('N'.$rowNo, $row['Municipality']);
                    $sheet->setCellValue('O'.$rowNo, $row['Province']);
                    $sheet->setCellValue('P'.$rowNo, $row['Latitude']);
                    $sheet->setCellValue('Q'.$rowNo, $row['Longitude']);
                    $sheet->setCellValue('BB'.$rowNo, $status_array[$row['ECCStatus']] ?? null);
                    if($row['PEISS']=='ECC'){
                        $sheet->setCellValue('R'.$rowNo, '1');
                    }else{
                        $sheet->setCellValue('R'.$rowNo, '0');
                    }
                    if($row['RA8749']=='true'){
                        $sheet->setCellValue('U'.$rowNo, '1');
                    }else{
                        $sheet->setCellValue('U'.$rowNo, '0');
                    }
                    if($row['RA9275']=='true'){
                        $sheet->setCellValue('AA'.$rowNo, '1');
                    }else{
                        $sheet->setCellValue('AA'.$rowNo, '0');
                    }
                    if($row['RA6969']=='true'){
                        $sheet->setCellValue('AG'.$rowNo, '1');
                    }else{
                        $sheet->setCellValue('AG'.$rowNo, '0');
                    }
                    // CMR Required
                    if($row['CMR']=='true') {
                        $sheet->setCellValue('BW'.$rowNo, '1');
                    }else{
                        $sheet->setCellValue('BW'.$rowNo, '0');
                    }
                    //PERMITS PTO
                    $sqli = 'SELECT * FROM tblpto WHERE ForeignKey="'.$foreignKey.'" ORDER BY IssuanceDate DESC LIMIT 1';
                    $stmt = $db_con->prepare($sqli);
                    $stmt->execute();
                    $rowi = $stmt->fetch(PDO::FETCH_ASSOC);
                    if($stmt->rowCount()==1){
                        $sheet->setCellValue('V'.$rowNo, $rowi['PTOCode']);
                        $sheet->setCellValue('W'.$rowNo, $rowi['IssuanceDate']);
                        $sheet->setCellValue('X'.$rowNo, $rowi['ExpirationDate']);
                    }
                    //PERMITS WWDP
                    $sqli = 'SELECT * FROM tbldp WHERE ForeignKey="'.$foreignKey.'" ORDER BY IssuanceDate DESC LIMIT 1';
                    $stmt = $db_con->prepare($sqli);
                    $stmt->execute();
                    $rowi = $stmt->fetch(PDO::FETCH_ASSOC);
                    if($stmt->rowCount()==1){
                        $sheet->setCellValue('AB'.$rowNo, $rowi['WWDPCode']);
                        $sheet->setCellValue('AC'.$rowNo, $rowi['IssuanceDate']);
                        $sheet->setCellValue('AD'.$rowNo, $rowi['ExpirationDate']);
                    }
                    //PERMITS HWGID
                    $sqli = 'SELECT * FROM tblhwgid WHERE ForeignKey="'.$foreignKey.'" ORDER BY IssuanceDate DESC LIMIT 1';
                    $stmt = $db_con->prepare($sqli);
                    $stmt->execute();
                    $rowi = $stmt->fetch(PDO::FETCH_ASSOC);
                    if($stmt->rowCount()==1){
                        $sheet->setCellValue('AH'.$rowNo, $rowi['PermitNumber']);
                        $sheet->setCellValue('AI'.$rowNo, $rowi['IssuanceDate']);
                    }
                    //PERMITS TSD
                    $sqli = 'SELECT * FROM tbltsd WHERE ForeignKey="'.$foreignKey.'" ORDER BY IssuanceDate DESC LIMIT 1';
                    $stmt = $db_con->prepare($sqli);
                    $stmt->execute();
                    $rowi = $stmt->fetch(PDO::FETCH_ASSOC);
                    if($stmt->rowCount()==1){
                        $sheet->setCellValue('AL'.$rowNo, $rowi['PermitNumber']);
                        $sheet->setCellValue('AM'.$rowNo, $rowi['IssuanceDate']);
                    }
                    //PERMITS TRC
                    $sqli = 'SELECT * FROM tbltrc WHERE ForeignKey="'.$foreignKey.'" ORDER BY IssuanceDate DESC LIMIT 1';
                    $stmt = $db_con->prepare($sqli);
                    $stmt->execute();
                    $rowi = $stmt->fetch(PDO::FETCH_ASSOC);
                    if($stmt->rowCount()==1){
                        $sheet->setCellValue('AN'.$rowNo, $rowi['PermitNumber']);
                        $sheet->setCellValue('AO'.$rowNo, $rowi['IssuanceDate']);
                    }
                    //PERMITS CCORC
                    $sqli = 'SELECT * FROM tblccorc WHERE ForeignKey="'.$foreignKey.'" ORDER BY IssuanceDate DESC LIMIT 1';
                    $stmt = $db_con->prepare($sqli);
                    $stmt->execute();
                    $rowi = $stmt->fetch(PDO::FETCH_ASSOC);
                    if($stmt->rowCount()==1){
                        $sheet->setCellValue('AP'.$rowNo, $rowi['PermitNumber']);
                        $sheet->setCellValue('AQ'.$rowNo, $rowi['IssuanceDate']);
                    }
                    //PERMITS ODS
                    $sqli = 'SELECT * FROM tblods WHERE ForeignKey="'.$foreignKey.'" ORDER BY IssuanceDate DESC LIMIT 1';
                    $stmt = $db_con->prepare($sqli);
                    $stmt->execute();
                    $rowi = $stmt->fetch(PDO::FETCH_ASSOC);
                    if($stmt->rowCount()==1){
                        $sheet->setCellValue('AR'.$rowNo, $rowi['PermitNumber']);
                        $sheet->setCellValue('AS'.$rowNo, $rowi['IssuanceDate']);
                    }
                    //PERMITS PTT
                    $sqli = 'SELECT * FROM tblptt WHERE ForeignKey="'.$foreignKey.'" ORDER BY IssuanceDate DESC LIMIT 1';
                    $stmt = $db_con->prepare($sqli);
                    $stmt->execute();
                    $rowi = $stmt->fetch(PDO::FETCH_ASSOC);
                    if($stmt->rowCount()==1){
                        $sheet->setCellValue('AT'.$rowNo, $rowi['PermitNumber']);
                        $sheet->setCellValue('AU'.$rowNo, $rowi['IssuanceDate']);
                    }
                    //PERMITS SQI
                    $sqli = 'SELECT * FROM tblsqi WHERE ForeignKey="'.$foreignKey.'" ORDER BY IssuanceDate DESC LIMIT 1';
                    $stmt = $db_con->prepare($sqli);
                    $stmt->execute();
                    $rowi = $stmt->fetch(PDO::FETCH_ASSOC);
                    if($stmt->rowCount()==1){
                        $sheet->setCellValue('AV'.$rowNo, $rowi['PermitNumber']);
                        $sheet->setCellValue('AW'.$rowNo, $rowi['IssuanceDate']);
                    }
                    //PERMITS CCOIC
                    $sqli = 'SELECT * FROM tblccoic WHERE ForeignKey="'.$foreignKey.'" ORDER BY IssuanceDate DESC LIMIT 1';
                    $stmt = $db_con->prepare($sqli);
                    $stmt->execute();
                    $rowi = $stmt->fetch(PDO::FETCH_ASSOC);
                    if($stmt->rowCount()==1){
                        $sheet->setCellValue('AX'.$rowNo, $rowi['PermitNumber']);
                        $sheet->setCellValue('AY'.$rowNo, $rowi['IssuanceDate']);
                    }
                    //PERMITS PCB
                    $sqli = 'SELECT * FROM tblpcb WHERE ForeignKey="'.$foreignKey.'" ORDER BY IssuanceDate DESC LIMIT 1';
                    $stmt = $db_con->prepare($sqli);
                    $stmt->execute();
                    $rowi = $stmt->fetch(PDO::FETCH_ASSOC);
                    if($stmt->rowCount()==1){
                        $sheet->setCellValue('AZ'.$rowNo, $rowi['PermitNumber']);
                        $sheet->setCellValue('BA'.$rowNo, $rowi['IssuanceDate']);
                    }
                    //PCO DETAILS
                    $sqli = 'SELECT * FROM tblpco WHERE ForeignKey="'.$foreignKey.'" ORDER BY IssuanceDate DESC LIMIT 1';
                    $stmt = $db_con->prepare($sqli);
                    $stmt->execute();
                    $rowi = $stmt->fetch(PDO::FETCH_ASSOC);
                    if($stmt->rowCount()==1){
                        $sheet->setCellValue('BJ'.$rowNo, $rowi['PCOCode']);
                        $sheet->setCellValue('BK'.$rowNo, $rowi['Category']);
                        $sheet->setCellValue('BL'.$rowNo, $rowi['PCOName']);
                        $sheet->setCellValue('BM'.$rowNo, $rowi['IssuanceDate']);
                        $sheet->setCellValue('BN'.$rowNo, $rowi['ExpirationDate']);
                        $sheet->setCellValue('BO'.$rowNo, $rowi['ContactNo']);
                    }
                    //NOTICE OF VIOLATIONS
                    $sqli = 'SELECT * FROM tblnotice WHERE ProjectID="'.$projectID.'" ORDER BY IssuanceDate DESC LIMIT 1';
                    $stmt = $db_con->prepare($sqli);
                    $stmt->execute();
                    $rowi = $stmt->fetch(PDO::FETCH_ASSOC);
                    if($stmt->rowCount()==1){
                        if($rowi['Law']=='PD1586'){
                            $sheet->setCellValue('T'.$rowNo, $rowi['IssuanceDate']);
                        }elseif($rowi['Law']=='RA8749'){
                            $sheet->setCellValue('Z'.$rowNo, $rowi['IssuanceDate']);
                        }elseif($rowi['Law']=='RA9275'){
                            $sheet->setCellValue('AF'.$rowNo, $rowi['IssuanceDate']);
                        }else{
                            $sheet->setCellValue('AK'.$rowNo, $rowi['IssuanceDate']);
                        }
                    }
                    //COUNT NOVS AND NOTC
                    $nRows = $db_con->query("SELECT COUNT(*) FROM tblnotice WHERE ProjectID = '$projectID'")->fetchColumn();
                    if($nRows > 0){
                        $sheet->setCellValue('BC'.$rowNo, $nRows);
                    }
                    //COUNT CDOS
                    $nRows = $db_con->query("SELECT COUNT(*) FROM tblcdo WHERE ProjectID = '$projectID'")->fetchColumn();
                    if($nRows > 0){
                        $sheet->setCellValue('BE'.$rowNo, $nRows);
                    }  
                    //COMPUTE THE NUMBER OF NONCOMPLIANCE PER NOVS ISSUED TO PROJECT
                    $noncompliance = 0;
                    $sqlx = 'SELECT * FROM tblnotice WHERE ProjectID="'.$projectID.'"';
                    $stmt = $db_con->prepare($sqlx);
                    $stmt->execute();
                    $resi = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    if($stmt->rowCount() > 0){
                        foreach($resi as $rowx){
                            $noncompliance = $noncompliance + (intval($rowx['Commitment']) - intval($rowx['Compliance']));
                        }
                        $sheet->setCellValue('BD'.$rowNo, $noncompliance);
                    }
                    //FETCH LATEST MONITORING DATES PER LAW
                    //EIA
                    $sqli = 'SELECT * FROM tbleia WHERE ProjectID="'.$projectID.'" ORDER BY DateMonitored DESC LIMIT 1';
                    $stmt = $db_con->prepare($sqli);
                    $stmt->execute();
                    $rowi = $stmt->fetch(PDO::FETCH_ASSOC);
                    if($stmt->rowCount()==1){
                        $sheet->setCellValue('S'.$rowNo, $rowi['DateMonitored']);
                    }
                    //AIR
                    $sqli = 'SELECT * FROM tblair WHERE ProjectID="'.$projectID.'" ORDER BY DateMonitored DESC LIMIT 1';
                    $stmt = $db_con->prepare($sqli);
                    $stmt->execute();
                    $rowi = $stmt->fetch(PDO::FETCH_ASSOC);
                    if($stmt->rowCount()==1){
                        $sheet->setCellValue('Y'.$rowNo, $rowi['DateMonitored']);
                    }
                    //WATER
                    $sqli = 'SELECT * FROM tblwater WHERE ProjectID="'.$projectID.'" ORDER BY DateMonitored DESC LIMIT 1';
                    $stmt = $db_con->prepare($sqli);
                    $stmt->execute();
                    $rowi = $stmt->fetch(PDO::FETCH_ASSOC);
                    if($stmt->rowCount()==1){
                        $sheet->setCellValue('AE'.$rowNo, $rowi['DateMonitored']);
                    }
                    //TOXIC HAZWASTE
                    $sqli = 'SELECT * FROM tblhazwaste WHERE ProjectID="'.$projectID.'" ORDER BY DateMonitored DESC LIMIT 1';
                    $stmt = $db_con->prepare($sqli);
                    $stmt->execute();
                    $rowi = $stmt->fetch(PDO::FETCH_ASSOC);
                    if($stmt->rowCount()==1){
                        $sheet->setCellValue('AJ'.$rowNo, $rowi['DateMonitored']);
                    }
                    //INCREMENT ME FOR ROWNUMBER
                    $rowNo+=1;
                }
            }else{  //NO SPECIFIC FILTER FOR PERMITS
                $resultCount+=1;
                $dateApp = new DateTime($row['DateApproved']);
                $dateNow = new DateTime(date('Y-m-d'));
                $diff = $dateNow->diff($dateApp);
                $sheet->setCellValue('A'.$rowNo, $row['ReferenceNo']);
                $sheet->setCellValue('B'.$rowNo, $row['PEISS']);
                $sheet->setCellValue('C'.$rowNo, $row['DateApproved']);
                $sheet->setCellValue('D'.$rowNo, $diff->y);
                $sheet->setCellValue('E'.$rowNo, $row['Region']);
                $sheet->setCellValue('F'.$rowNo, $row['PSICCode']);
                $sheet->setCellValue('G'.$rowNo, $row['ProjectName']);
                $sheet->setCellValue('H'.$rowNo, $row['Proponent']);
                $sheet->setCellValue('I'.$rowNo, $project_type_s[$row['ProjectType']] ?? null);
                $sheet->setCellValue('J'.$rowNo, $project_subtype_s[$row['ProjectSubtype']] ?? null);
                $sheet->setCellValue('K'.$rowNo, $project_specific_type_s[$row['ProjectSpecificType']] ?? null);
                $sheet->setCellValue('L'.$rowNo, $project_specific_subtype_s[$row['ProjectSpecificSubtype']] ?? null);
                $sheet->setCellValue('M'.$rowNo, $row['SpecificAddress']);
                $sheet->setCellValue('N'.$rowNo, $row['Municipality']);
                $sheet->setCellValue('O'.$rowNo, $row['Province']);
                $sheet->setCellValue('P'.$rowNo, $row['Latitude']);
                $sheet->setCellValue('Q'.$rowNo, $row['Longitude']);
                $sheet->setCellValue('BB'.$rowNo, $status_array[$row['ECCStatus']] ?? null);
                if($row['PEISS']=='ECC'){
                    $sheet->setCellValue('R'.$rowNo, '1');
                }else{
                    $sheet->setCellValue('R'.$rowNo, '0');
                }
                if($row['RA8749']=='true'){
                    $sheet->setCellValue('U'.$rowNo, '1');
                }else{
                    $sheet->setCellValue('U'.$rowNo, '0');
                }
                if($row['RA9275']=='true'){
                    $sheet->setCellValue('AA'.$rowNo, '1');
                }else{
                    $sheet->setCellValue('AA'.$rowNo, '0');
                }
                if($row['RA6969']=='true'){
                    $sheet->setCellValue('AG'.$rowNo, '1');
                }else{
                    $sheet->setCellValue('AG'.$rowNo, '0');
                }                                        
                // CMR Required
                if($row['CMR']=='true') {
                    $sheet->setCellValue('BW'.$rowNo, '1');
                }else{
                    $sheet->setCellValue('BW'.$rowNo, '0');
                }
                //PERMITS PTO
                $sqli = 'SELECT * FROM tblpto WHERE ForeignKey="'.$foreignKey.'" ORDER BY IssuanceDate DESC LIMIT 1';
                $stmt = $db_con->prepare($sqli);
                $stmt->execute();
                $rowi = $stmt->fetch(PDO::FETCH_ASSOC);
                if($stmt->rowCount()==1){
                    $sheet->setCellValue('V'.$rowNo, $rowi['PTOCode']);
                    $sheet->setCellValue('W'.$rowNo, $rowi['IssuanceDate']);
                    $sheet->setCellValue('X'.$rowNo, $rowi['ExpirationDate']);
                }
                //PERMITS WWDP
                $sqli = 'SELECT * FROM tbldp WHERE ForeignKey="'.$foreignKey.'" ORDER BY IssuanceDate DESC LIMIT 1';
                $stmt = $db_con->prepare($sqli);
                $stmt->execute();
                $rowi = $stmt->fetch(PDO::FETCH_ASSOC);
                if($stmt->rowCount()==1){
                    $sheet->setCellValue('AB'.$rowNo, $rowi['WWDPCode']);
                    $sheet->setCellValue('AC'.$rowNo, $rowi['IssuanceDate']);
                    $sheet->setCellValue('AD'.$rowNo, $rowi['ExpirationDate']);
                }
                //PERMITS HWGID
                $sqli = 'SELECT * FROM tblhwgid WHERE ForeignKey="'.$foreignKey.'" ORDER BY IssuanceDate DESC LIMIT 1';
                $stmt = $db_con->prepare($sqli);
                $stmt->execute();
                $rowi = $stmt->fetch(PDO::FETCH_ASSOC);
                if($stmt->rowCount()==1){
                    $sheet->setCellValue('AH'.$rowNo, $rowi['PermitNumber']);
                    $sheet->setCellValue('AI'.$rowNo, $rowi['IssuanceDate']);
                }
                //PERMITS TSD
                $sqli = 'SELECT * FROM tbltsd WHERE ForeignKey="'.$foreignKey.'" ORDER BY IssuanceDate DESC LIMIT 1';
                $stmt = $db_con->prepare($sqli);
                $stmt->execute();
                $rowi = $stmt->fetch(PDO::FETCH_ASSOC);
                if($stmt->rowCount()==1){
                    $sheet->setCellValue('AL'.$rowNo, $rowi['PermitNumber']);
                    $sheet->setCellValue('AM'.$rowNo, $rowi['IssuanceDate']);
                }
                //PERMITS TRC
                $sqli = 'SELECT * FROM tbltrc WHERE ForeignKey="'.$foreignKey.'" ORDER BY IssuanceDate DESC LIMIT 1';
                $stmt = $db_con->prepare($sqli);
                $stmt->execute();
                $rowi = $stmt->fetch(PDO::FETCH_ASSOC);
                if($stmt->rowCount()==1){
                    $sheet->setCellValue('AN'.$rowNo, $rowi['PermitNumber']);
                    $sheet->setCellValue('AO'.$rowNo, $rowi['IssuanceDate']);
                }
                //PERMITS CCORC
                $sqli = 'SELECT * FROM tblccorc WHERE ForeignKey="'.$foreignKey.'" ORDER BY IssuanceDate DESC LIMIT 1';
                $stmt = $db_con->prepare($sqli);
                $stmt->execute();
                $rowi = $stmt->fetch(PDO::FETCH_ASSOC);
                if($stmt->rowCount()==1){
                    $sheet->setCellValue('AP'.$rowNo, $rowi['PermitNumber']);
                    $sheet->setCellValue('AQ'.$rowNo, $rowi['IssuanceDate']);
                }
                //PERMITS ODS
                $sqli = 'SELECT * FROM tblods WHERE ForeignKey="'.$foreignKey.'" ORDER BY IssuanceDate DESC LIMIT 1';
                $stmt = $db_con->prepare($sqli);
                $stmt->execute();
                $rowi = $stmt->fetch(PDO::FETCH_ASSOC);
                if($stmt->rowCount()==1){
                    $sheet->setCellValue('AR'.$rowNo, $rowi['PermitNumber']);
                    $sheet->setCellValue('AS'.$rowNo, $rowi['IssuanceDate']);
                }
                //PERMITS PTT
                $sqli = 'SELECT * FROM tblptt WHERE ForeignKey="'.$foreignKey.'" ORDER BY IssuanceDate DESC LIMIT 1';
                $stmt = $db_con->prepare($sqli);
                $stmt->execute();
                $rowi = $stmt->fetch(PDO::FETCH_ASSOC);
                if($stmt->rowCount()==1){
                    $sheet->setCellValue('AT'.$rowNo, $rowi['PermitNumber']);
                    $sheet->setCellValue('AU'.$rowNo, $rowi['IssuanceDate']);
                }
                //PERMITS SQI
                $sqli = 'SELECT * FROM tblsqi WHERE ForeignKey="'.$foreignKey.'" ORDER BY IssuanceDate DESC LIMIT 1';
                $stmt = $db_con->prepare($sqli);
                $stmt->execute();
                $rowi = $stmt->fetch(PDO::FETCH_ASSOC);
                if($stmt->rowCount()==1){
                    $sheet->setCellValue('AV'.$rowNo, $rowi['PermitNumber']);
                    $sheet->setCellValue('AW'.$rowNo, $rowi['IssuanceDate']);
                }
                //PERMITS CCOIC
                $sqli = 'SELECT * FROM tblccoic WHERE ForeignKey="'.$foreignKey.'" ORDER BY IssuanceDate DESC LIMIT 1';
                $stmt = $db_con->prepare($sqli);
                $stmt->execute();
                $rowi = $stmt->fetch(PDO::FETCH_ASSOC);
                if($stmt->rowCount()==1){
                    $sheet->setCellValue('AX'.$rowNo, $rowi['PermitNumber']);
                    $sheet->setCellValue('AY'.$rowNo, $rowi['IssuanceDate']);
                }
                //PERMITS PCB
                $sqli = 'SELECT * FROM tblpcb WHERE ForeignKey="'.$foreignKey.'" ORDER BY IssuanceDate DESC LIMIT 1';
                $stmt = $db_con->prepare($sqli);
                $stmt->execute();
                $rowi = $stmt->fetch(PDO::FETCH_ASSOC);
                if($stmt->rowCount()==1){
                    $sheet->setCellValue('AZ'.$rowNo, $rowi['PermitNumber']);
                    $sheet->setCellValue('BA'.$rowNo, $rowi['IssuanceDate']);
                }
                //PCO DETAILS
                $sqli = 'SELECT * FROM tblpco WHERE ForeignKey="'.$foreignKey.'" ORDER BY IssuanceDate DESC LIMIT 1';
                $stmt = $db_con->prepare($sqli);
                $stmt->execute();
                $rowi = $stmt->fetch(PDO::FETCH_ASSOC);
                if($stmt->rowCount()==1){
                    $sheet->setCellValue('BJ'.$rowNo, $rowi['PCOCode']);
                    $sheet->setCellValue('BK'.$rowNo, $rowi['Category']);
                    $sheet->setCellValue('BL'.$rowNo, $rowi['PCOName']);
                    $sheet->setCellValue('BM'.$rowNo, $rowi['IssuanceDate']);
                    $sheet->setCellValue('BN'.$rowNo, $rowi['ExpirationDate']);
                    $sheet->setCellValue('BO'.$rowNo, $rowi['ContactNo']);
                }
                //NOTICE OF VIOLATIONS
                $sqli = 'SELECT * FROM tblnotice WHERE ProjectID="'.$projectID.'" ORDER BY IssuanceDate DESC LIMIT 1';
                $stmt = $db_con->prepare($sqli);
                $stmt->execute();
                $rowi = $stmt->fetch(PDO::FETCH_ASSOC);
                if($stmt->rowCount()==1){
                    if($rowi['Law']=='PD1586'){
                        $sheet->setCellValue('T'.$rowNo, $rowi['IssuanceDate']);
                    }elseif($rowi['Law']=='RA8749'){
                        $sheet->setCellValue('Z'.$rowNo, $rowi['IssuanceDate']);
                    }elseif($rowi['Law']=='RA9275'){
                        $sheet->setCellValue('AF'.$rowNo, $rowi['IssuanceDate']);
                    }else{
                        $sheet->setCellValue('AK'.$rowNo, $rowi['IssuanceDate']);
                    }
                }
                //COUNT NOVS AND NOTC
                $nRows = $db_con->query("SELECT COUNT(*) FROM tblnotice WHERE ProjectID = '$projectID'")->fetchColumn();
                if($nRows > 0){
                    $sheet->setCellValue('BC'.$rowNo, $nRows);
                }
                //COUNT CDOS
                $nRows = $db_con->query("SELECT COUNT(*) FROM tblcdo WHERE ProjectID = '$projectID'")->fetchColumn();
                if($nRows > 0){
                    $sheet->setCellValue('BE'.$rowNo, $nRows);
                }  
                //COMPUTE THE NUMBER OF NONCOMPLIANCE PER NOVS ISSUED TO PROJECT
                $noncompliance = 0;
                $sqlx = 'SELECT * FROM tblnotice WHERE ProjectID="'.$projectID.'"';
                $stmt = $db_con->prepare($sqlx);
                $stmt->execute();
                $resi = $stmt->fetchAll(PDO::FETCH_ASSOC);
                if($stmt->rowCount() > 0){
                    foreach($resi as $rowx){
                        $noncompliance = $noncompliance + (intval($rowx['Commitment']) - intval($rowx['Compliance']));
                    }
                    $sheet->setCellValue('BD'.$rowNo, $noncompliance);
                }
                //FETCH LATEST MONITORING DATES PER LAW
                //EIA
                $sqli = 'SELECT * FROM tbleia WHERE ProjectID="'.$projectID.'" ORDER BY DateMonitored DESC LIMIT 1';
                $stmt = $db_con->prepare($sqli);
                $stmt->execute();
                $rowi = $stmt->fetch(PDO::FETCH_ASSOC);
                if($stmt->rowCount()==1){
                    $sheet->setCellValue('S'.$rowNo, $rowi['DateMonitored']);
                }
                //AIR
                $sqli = 'SELECT * FROM tblair WHERE ProjectID="'.$projectID.'" ORDER BY DateMonitored DESC LIMIT 1';
                $stmt = $db_con->prepare($sqli);
                $stmt->execute();
                $rowi = $stmt->fetch(PDO::FETCH_ASSOC);
                if($stmt->rowCount()==1){
                    $sheet->setCellValue('Y'.$rowNo, $rowi['DateMonitored']);
                }
                //WATER
                $sqli = 'SELECT * FROM tblwater WHERE ProjectID="'.$projectID.'" ORDER BY DateMonitored DESC LIMIT 1';
                $stmt = $db_con->prepare($sqli);
                $stmt->execute();
                $rowi = $stmt->fetch(PDO::FETCH_ASSOC);
                if($stmt->rowCount()==1){
                    $sheet->setCellValue('AE'.$rowNo, $rowi['DateMonitored']);
                }
                //TOXIC HAZWASTE
                $sqli = 'SELECT * FROM tblhazwaste WHERE ProjectID="'.$projectID.'" ORDER BY DateMonitored DESC LIMIT 1';
                $stmt = $db_con->prepare($sqli);
                $stmt->execute();
                $rowi = $stmt->fetch(PDO::FETCH_ASSOC);
                if($stmt->rowCount()==1){
                    $sheet->setCellValue('AJ'.$rowNo, $rowi['DateMonitored']);
                }
                //INCREMENT ME FOR ROWNUMBER
                $rowNo+=1;
            }
        }
    }

    $filename = 'UNIVERSE-'.time().'.xlsx';
    // Redirect output to a client's web browser (Xlsx)
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="'.$filename.'"');
    header('Cache-Control: max-age=0');
    // If you're serving to IE 9, then the following may be needed
    header('Cache-Control: max-age=1');
     
    // If you're serving to IE over SSL, then the following may be needed
    header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
    header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
    header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
    header('Pragma: public'); // HTTP/1.
    
    $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
    ob_start();
    $writer->save('php://output');
    $xlsData = ob_get_contents();
    ob_end_clean();

    $response = array(
        'counter' => $resultCount,
        'file' => 'data:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet;base64,'.base64_encode($xlsData)
    );
    echo json_encode($response);
?>