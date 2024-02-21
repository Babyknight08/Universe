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
    $filter_data = $data->selected_categories;
    $filter_count = count($filter_data);
    $numrows = 0;

    $reader = IOFactory::createReader('Xlsx');
    $spreadsheet = $reader->load('SUMMARY.xlsx');
    $sheet = $spreadsheet->getActiveSheet();
    $rowNo = 3;

    for($x=0;$x<$filter_count;$x++){
        
        // $subarray = array();
        $category = $project_specific_subtype_s[$filter_data[$x]] ?? null;
        $univcount = $db_con->query("SELECT COUNT(*) FROM tblprojects WHERE ProjectSpecificSubtype = ".$filter_data[$x]."")->fetchColumn();
        $eccissued = $db_con->query("SELECT COUNT(*) FROM tblprojects WHERE ProjectSpecificSubtype = ".$filter_data[$x]." AND PEISS = 'ECC'")->fetchColumn();
        $cncissued = $db_con->query("SELECT COUNT(*) FROM tblprojects WHERE ProjectSpecificSubtype = ".$filter_data[$x]." AND PEISS = 'CNC'")->fetchColumn();
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
        $sheet->setCellValue('A'.$rowNo, $category);
        $sheet->setCellValue('B'.$rowNo, intval($univcount));
        $sheet->setCellValue('C'.$rowNo, intval($eccissued));
        $sheet->setCellValue('D'.$rowNo, intval($novecc));
        $sheet->setCellValue('E'.$rowNo, intval($eccissued));
        $sheet->setCellValue('F'.$rowNo, intval($noeccwithpermits));
        $sheet->setCellValue('G'.$rowNo, intval($monitoredecc));
        $sheet->setCellValue('H'.$rowNo, intval($cncissued));
        $sheet->setCellValue('I'.$rowNo, intval($novcnc));
        $sheet->setCellValue('J'.$rowNo, intval($cncissued));
        $sheet->setCellValue('K'.$rowNo, intval($monitoredcnc));
        //---------------------------------
        $sheet->setCellValue('L'.$rowNo, intval($dpissued));
        $sheet->setCellValue('M'.$rowNo, intval($novdp));
        $sheet->setCellValue('N'.$rowNo, intval($dpcovered));
        $sheet->setCellValue('O'.$rowNo, intval($dpnot));
        $sheet->setCellValue('P'.$rowNo, intval($monitoreddp));
        //---------------------------------
        $sheet->setCellValue('Q'.$rowNo, intval($ptoissued));
        $sheet->setCellValue('R'.$rowNo, intval($novpto));
        $sheet->setCellValue('S'.$rowNo, intval($ptocovered));
        $sheet->setCellValue('T'.$rowNo, intval($ptonot));
        $sheet->setCellValue('U'.$rowNo, intval($monitoredpto));
        //---------------------------------
        $sheet->setCellValue('V'.$rowNo, intval($hwgissued));
        $sheet->setCellValue('W'.$rowNo, intval($novhwg));
        $sheet->setCellValue('X'.$rowNo, intval($hwcovered));
        $sheet->setCellValue('Y'.$rowNo, intval($hwnot));
        $sheet->setCellValue('Z'.$rowNo, intval($monitoredwhg));
        //---------------------------------
        $sheet->setCellValue('AA'.$rowNo, intval($operational));
        $sheet->setCellValue('AB'.$rowNo, intval($notop));
        //---------------------------------
        $sheet->setCellValue('AC'.$rowNo, intval($cmrrequired));
        $sheet->setCellValue('AD'.$rowNo, intval($f2018));
        $sheet->setCellValue('AE'.$rowNo, intval($s2018));
        $sheet->setCellValue('AF'.$rowNo, intval($f2019));
        $sheet->setCellValue('AG'.$rowNo, intval($s2019));
        $sheet->setCellValue('AH'.$rowNo, intval($f2020));
        $sheet->setCellValue('AI'.$rowNo, intval($s2020));
        $sheet->setCellValue('AJ'.$rowNo, intval($f2021));
        $sheet->setCellValue('AK'.$rowNo, intval($s2021));
        $sheet->setCellValue('AL'.$rowNo, intval($f2022));
        $sheet->setCellValue('AM'.$rowNo, intval($s2022));

        $numrows++;
        $rowNo+=1;
        
    }
    $sheet->getStyle('A'.$rowNo.':AM'.$rowNo)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('000000');
    $sheet->getStyle('A'.$rowNo.':AM'.$rowNo)->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_WHITE);
    $sheet->getStyle('A'.$rowNo.':AM'.$rowNo)->getFont()->setSize(20);
    $sheet->setCellValue('A'.$rowNo, 'TOTAL');
    $sheet->setCellValue('B'.$rowNo, '=SUM(B3:B'.intval($rowNo-1).')');
    $sheet->setCellValue('C'.$rowNo, '=SUM(C3:C'.intval($rowNo-1).')');
    $sheet->setCellValue('D'.$rowNo, '=SUM(D3:D'.intval($rowNo-1).')');
    $sheet->setCellValue('E'.$rowNo, '=SUM(E3:E'.intval($rowNo-1).')');
    $sheet->setCellValue('F'.$rowNo, '=SUM(F3:F'.intval($rowNo-1).')');
    $sheet->setCellValue('G'.$rowNo, '=SUM(G3:G'.intval($rowNo-1).')');
    $sheet->setCellValue('H'.$rowNo, '=SUM(H3:H'.intval($rowNo-1).')');
    $sheet->setCellValue('I'.$rowNo, '=SUM(I3:I'.intval($rowNo-1).')');
    $sheet->setCellValue('J'.$rowNo, '=SUM(J3:J'.intval($rowNo-1).')');
    $sheet->setCellValue('K'.$rowNo, '=SUM(K3:K'.intval($rowNo-1).')');
    $sheet->setCellValue('L'.$rowNo, '=SUM(L3:L'.intval($rowNo-1).')');
    $sheet->setCellValue('M'.$rowNo, '=SUM(M3:M'.intval($rowNo-1).')');
    $sheet->setCellValue('N'.$rowNo, '=SUM(N3:N'.intval($rowNo-1).')');
    $sheet->setCellValue('O'.$rowNo, '=SUM(O3:O'.intval($rowNo-1).')');
    $sheet->setCellValue('P'.$rowNo, '=SUM(P3:P'.intval($rowNo-1).')');
    $sheet->setCellValue('Q'.$rowNo, '=SUM(Q3:Q'.intval($rowNo-1).')');
    $sheet->setCellValue('R'.$rowNo, '=SUM(R3:R'.intval($rowNo-1).')');
    $sheet->setCellValue('S'.$rowNo, '=SUM(S3:S'.intval($rowNo-1).')');
    $sheet->setCellValue('T'.$rowNo, '=SUM(T3:T'.intval($rowNo-1).')');
    $sheet->setCellValue('U'.$rowNo, '=SUM(U3:U'.intval($rowNo-1).')');
    $sheet->setCellValue('V'.$rowNo, '=SUM(V3:V'.intval($rowNo-1).')');
    $sheet->setCellValue('W'.$rowNo, '=SUM(W3:W'.intval($rowNo-1).')');
    $sheet->setCellValue('X'.$rowNo, '=SUM(X3:X'.intval($rowNo-1).')');
    $sheet->setCellValue('Y'.$rowNo, '=SUM(Y3:Y'.intval($rowNo-1).')');
    $sheet->setCellValue('Z'.$rowNo, '=SUM(Z3:Z'.intval($rowNo-1).')');
    $sheet->setCellValue('AA'.$rowNo, '=SUM(AA3:AA'.intval($rowNo-1).')');
    $sheet->setCellValue('AB'.$rowNo, '=SUM(AB3:AB'.intval($rowNo-1).')');
    $sheet->setCellValue('AC'.$rowNo, '=SUM(AC3:AC'.intval($rowNo-1).')');
    $sheet->setCellValue('AD'.$rowNo, '=SUM(AD3:AD'.intval($rowNo-1).')');
    $sheet->setCellValue('AE'.$rowNo, '=SUM(AE3:AE'.intval($rowNo-1).')');
    $sheet->setCellValue('AF'.$rowNo, '=SUM(AF3:AF'.intval($rowNo-1).')');
    $sheet->setCellValue('AG'.$rowNo, '=SUM(AG3:AG'.intval($rowNo-1).')');
    $sheet->setCellValue('AH'.$rowNo, '=SUM(AH3:AH'.intval($rowNo-1).')');
    $sheet->setCellValue('AI'.$rowNo, '=SUM(AI3:AI'.intval($rowNo-1).')');
    $sheet->setCellValue('AJ'.$rowNo, '=SUM(AJ3:AJ'.intval($rowNo-1).')');
    $sheet->setCellValue('AK'.$rowNo, '=SUM(AK3:AK'.intval($rowNo-1).')');
    $sheet->setCellValue('AL'.$rowNo, '=SUM(AL3:AL'.intval($rowNo-1).')');
    $sheet->setCellValue('AM'.$rowNo, '=SUM(AM3:AM'.intval($rowNo-1).')');

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
        'file' => 'data:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet;base64,'.base64_encode($xlsData)
    );
    echo json_encode($response);

?>