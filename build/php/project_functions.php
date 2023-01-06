<?php

    include_once 'dbcon.php';
    //include_once 'arrays.php';

    $data = json_decode(file_get_contents('php://input'));
    $id = $data->id;
    $event_type = $data->event_type;

    switch($event_type) {
        case 'load' :
            $sql = "SELECT * FROM tblprojects WHERE ID=:ID";
            $stmt = $db_con->prepare($sql);
            $stmt->bindParam(':ID', $id, PDO::PARAM_STR);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if($stmt->rowCount() == 1){

                $foreignKey = $row['ForeignKey'];
                $pto = $row['RA8749'];
                $dp = $row['RA9275'];
                $hazwaste = $row['RA6969'];

                // $sqlpco = "SELECT * FROM tblpco WHERE ForeignKey=:ForeignKey";
                // $stmt = $db_con->prepare($sqlpco);
                // $stmt->bindParam(':ForeignKey', $foreignKey, PDO::PARAM_STR);
                // $stmt->execute();
                // $pcorow = $stmt->fetch(PDO::FETCH_ASSOC);
                // $pcocode = $pcorow['PCOCode'];
                // $category = $pcorow['Category'];
                // $pconame = $pcorow['PCOName'];
                // $contactno = $pcorow['ContactNo'];
                // $pcoidate = $pcorow['IssuanceDate'];
                // $pcoedate = $pcorow['ExpirationDate'];

                $response = array(
                    'message' => 'success',
                    'peiss' => $row['PEISS'],
                    'referenceno' => $row['ReferenceNo'],
                    'eccstatus' => $row['ECCStatus'],
                    'dateapproved' => $row['DateApproved'],
                    'psiccode' => $row['PSICCode'],
                    'projectname' => $row['ProjectName'],
                    'proponent' => $row['Proponent'],
                    'projecttype' => $row['ProjectType'],
                    'projectsubtype' => $row['ProjectSubtype'],
                    'projectspecifictype' => $row['ProjectSpecificType'],
                    'projectspecificsubtype' => $row['ProjectSpecificSubtype'],
                    'specificaddress' => $row['SpecificAddress'],
                    'municipality' => $row['Municipality'],
                    'province' => $row['Province'],
                    'latitude' => $row['Latitude'],
                    'longitude' => $row['Longitude'],
                    'pto' => $pto,
                    'dp' => $dp,
                    'hazwaste' => $hazwaste,
                    'foreignkey' => $foreignKey
                );
                echo json_encode($response);

            }
            break;
    }


?>