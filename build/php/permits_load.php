<?php

    include_once 'dbcon.php';

    $data = json_decode(file_get_contents('php://input'));
    $event_type = $data->event_type;
    $permit = $data->permit;
    $id = $data->id;

    switch($event_type){
        case 'load' :

            switch($permit) {
                case 'pco' :
                    $sql = "SELECT * FROM tblpco WHERE ID=:ID";
                    $stmt = $db_con->prepare($sql);
                    $stmt->bindParam(':ID', $id, PDO::PARAM_STR);
                    $stmt->execute();
                    $result = $stmt->fetch(PDO::FETCH_ASSOC);
                    $pcocode = $result['PCOCode'];
                    $category = $result['Category'];
                    $pconame = $result['PCOName'];
                    $contactno = $result['ContactNo'];
                    $issuedate = $result['IssuanceDate'];
                    $expiredate = $result['ExpirationDate'];
                    $response = array(
                        'message' => 'success',
                        'pcocode' => $pcocode,
                        'category' => $category,
                        'pconame' => $pconame,
                        'contactno' => $contactno,
                        'issuedate' => $issuedate,
                        'expiredate' => $expiredate
                    );
                    echo json_encode($response);
                break;  
                case 'pto' :
                    $sql = "SELECT * FROM tblpto WHERE ID=:ID";
                    $stmt = $db_con->prepare($sql);
                    $stmt->bindParam(':ID', $id, PDO::PARAM_STR);
                    $stmt->execute();
                    $result = $stmt->fetch(PDO::FETCH_ASSOC);
                    $ptocode = $result['PTOCode'];
                    $issuedate = $result['IssuanceDate'];
                    $expiredate = $result['ExpirationDate'];
                    $response = array(
                        'message' => 'success',
                        'ptocode' => $ptocode,
                        'issuedate' => $issuedate,
                        'expiredate' => $expiredate
                    );
                    echo json_encode($response);
                break;
                case 'dp' :
                    $sql = "SELECT * FROM tbldp WHERE ID=:ID";
                    $stmt = $db_con->prepare($sql);
                    $stmt->bindParam(':ID', $id, PDO::PARAM_STR);
                    $stmt->execute();
                    $result = $stmt->fetch(PDO::FETCH_ASSOC);
                    $dpcode = $result['WWDPCode'];
                    $issuedate = $result['IssuanceDate'];
                    $expiredate = $result['ExpirationDate'];
                    $response = array(
                        'message' => 'success',
                        'dpcode' => $dpcode,
                        'issuedate' => $issuedate,
                        'expiredate' => $expiredate
                    );
                    echo json_encode($response);
                break;
                case 'tchw' :
                    $type = $data->type;
                    switch($type){
                        case 'HWG-ID' :
                            $sql = "SELECT * FROM tblhwgid WHERE ID=:ID";
                        break;
                        case 'PTT' :
                            $sql = "SELECT * FROM tblptt WHERE ID=:ID";
                        break;
                        case 'SQI' :
                            $sql = "SELECT * FROM tblsqi WHERE ID=:ID";
                        break;
                        case 'CCO-RC' :
                            $sql = "SELECT * FROM tblccorc WHERE ID=:ID";
                        break;
                        case 'CCO-IC' :
                            $sql = "SELECT * FROM tblccoic WHERE ID=:ID";
                        break;
                        case 'TSD' :
                            $sql = "SELECT * FROM tbltsd WHERE ID=:ID";
                        break;
                        case 'TRC' :
                            $sql = "SELECT * FROM tbltrc WHERE ID=:ID";
                        break;
                        case 'ODS' :
                            $sql = "SELECT * FROM tblods WHERE ID=:ID";
                        break;
                        case 'PCB' :
                            $sql = "SELECT * FROM tblpcb WHERE ID=:ID";
                        break;
                    }
                    $stmt = $db_con->prepare($sql);
                    $stmt->bindParam(':ID', $id, PDO::PARAM_STR);
                    $stmt->execute();
                    $result = $stmt->fetch(PDO::FETCH_ASSOC);
                    $tchwcode = $result['PermitNumber'];
                    $type = $result['Type'];
                    $issuedate = $result['IssuanceDate'];
                    $expiredate = $result['ExpirationDate'];
                    $response = array(
                        'message' => 'success',
                        'type' => $type,
                        'tchwcode' => $tchwcode,
                        'issuedate' => $issuedate,
                        'expiredate' => $expiredate
                    );
                    echo json_encode($response);
                break;
            }

        break;    
    }

?>