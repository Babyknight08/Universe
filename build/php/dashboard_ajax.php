<?php

    include_once 'dbcon.php';

    $data = json_decode(file_get_contents('php://input'));
    $fromyr = $data->datefrom;
    $toyr = $data->dateto;
    $permit = $data->permit;

    // if($fromyr != 'All' && $toyr != 'All'){

    // }

    if($permit == 'ECC' || $permit == 'CNC'){
        for($x=intval($fromyr); $x<=intval($toyr); $x++){
            $selectedYear = $x;
            $nRows = $db_con->query("SELECT COUNT(*) FROM tblprojects WHERE PEISS = '".$permit."' AND ReferenceNo != '' AND YEAR(DateApproved ) = '" .$selectedYear. "'")->fetchColumn();
            $obj[$selectedYear] = intval($nRows);
        }
    }else{
        switch ($permit) {
            case 'PTO' :
                //$sql = 'SELECT YEAR(IssuanceDate) as PerYear FROM tblpto WHERE YEAR(IssuanceDate) BETWEEN "'.$fromyr.'" AND "'.$toyr.'" ';
                $table = 'tblpto';
                break;
            case 'WWDP' :
                $table = 'tbldp';
                break;
            case 'PTT' :
                $table = 'tblptt';
                break;
            case 'SQI' :
                $table = 'tblsqi';
                break;
            case 'CCO-RC' :
                $table = 'tblccorc';
                break;
            case 'CCO-IC' :
                $table = 'tblccoic';
                break;
            case 'TSD' :
                $table = 'tbltsd';
                break;
            case 'TRC' :
                $table = 'tbltrc';
                break;
            case 'ODS' :
                $table = 'tblods';
                break;
            case 'PCB' :
                $table = 'tblpcb';
                break;
            case 'HWGID' :
                $table = 'tblhwgid';
                break;
            case 'PCO' :
                $table = 'tblpco';
                break;
        }
    
        for($x=intval($fromyr); $x<=intval($toyr); $x++){
            $selectedYear = $x;
            $nRows = $db_con->query("SELECT COUNT(*) FROM $table WHERE YEAR(IssuanceDate) = '" .$selectedYear. "'")->fetchColumn();
            $obj[$selectedYear] = intval($nRows);
        }
    }

    echo json_encode($obj);

    // $stmt = $db_con->prepare($sql);
    // $stmt->execute();
    // $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // if($stmt->rowCount() > 0){
    //     foreach($result as $row){
    //         $nRows = $db_con->query("SELECT COUNT(*) FROM $table WHERE YEAR(IssuanceDate) = '" .$row['PerYear']. "'")->fetchColumn();
    //         $obj[$row['PerYear']] = intval($nRows);
    //         //$response[] = $obj;
    //     }
        
    //     echo json_encode($obj);
    // }

?>