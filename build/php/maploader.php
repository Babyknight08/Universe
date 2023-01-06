<?php

    include_once 'dbcon.php';
    include_once 'arrays2.php';

    $data = json_decode(file_get_contents('php://input'));

    $type = $data->type;

    $counter_array = [0, 0, 0, 0, 0];

    switch($type) {
        case 'firm':

            $sql = "SELECT * FROM tblprojects";
            $stmt = $db_con->prepare($sql);
            $stmt->execute();
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if($stmt->rowCount() > 0) {
                foreach($results as $row) {
                    if($row['ECCStatus'] == 0) {
                        $counter_array[0] += 1;
                    }else if($row['ECCStatus'] == 1) {
                        $counter_array[1] += 1;
                    }else if($row['ECCStatus'] == 2) {
                        $counter_array[2] += 1;
                    }else if($row['ECCStatus'] == 3) {
                        $counter_array[3] += 1;
                    }else if($row['ECCStatus'] == 4) {
                        $counter_array[4] += 1;
                    }
                    $subarray = array();
                    $subarray[] = $row['ProjectName'];
                    $subarray[] = $row['Latitude'];
                    $subarray[] = $row['Longitude'];
                    $subarray[] = $row['SpecificAddress'];
                    $subarray[] = $row['Municipality'];
                    $subarray[] = $row['Province'];
                    $subarray[] = $row['Proponent'];
                    $subarray[] = $project_type_s[$row['ProjectType']] ?? null;
                    $subarray[] = $project_subtype_s[$row['ProjectSubtype']] ?? null;
                    $subarray[] = $project_specific_type_s[$row['ProjectSpecificType']] ?? null;
                    $subarray[] = $project_specific_subtype_s[$row['ProjectSpecificSubtype']] ?? null;
                    $array[] = $subarray;
                }
                $response = array(
                    'data' => $array,
                    'counters' => $counter_array
                );
                echo json_encode($response);
            }

        break;

        case 'permit':

            $and = " AND ";
            $where = " WHERE ";

            $check_peiss = $data->check_peiss;
            $check_permit = $data->check_permit;
            $select_peiss = $data->select_peiss;
            $select_permit = $data->select_permit;
            $date_from = $data->date_from;
            $date_to = $data->date_to;

            if($check_permit == true) {

                $sql = "SELECT * FROM tblprojects";
                
                if($check_peiss == false) {
                    $sql = $sql . $where . "PEISS = '".$select_peiss."'";
                }

            }else{

                $tbl = $select_permit;
                if($tbl=="tblpto") {
                    $permitno = "PTOCode";
                }else if($tbl=="tbldp") {
                    $permitno = "WWDPCode";
                }else if($tbl=="tblpco") {
                    $permitno = "PCOCode";
                }else{
                    $permitno = "PermitNumber";
                }

                $sql = "SELECT DISTINCT tblprojects.ProjectName,
                                tblprojects.ECCStatus, 
                                tblprojects.Latitude,
                                tblprojects.Longitude,
                                tblprojects.SpecificAddress,
                                tblprojects.Municipality,
                                tblprojects.Province,
                                tblprojects.Proponent,
                                tblprojects.ProjectType,
                                tblprojects.ProjectSubtype,
                                tblprojects.ProjectSpecificType,
                                tblprojects.ProjectSpecificSubtype,
                                {$tbl}.{$permitno},
                                {$tbl}.IssuanceDate,
                                {$tbl}.ExpirationDate
                                FROM tblprojects
                                INNER JOIN {$tbl} ON tblprojects.ForeignKey = {$tbl}.ForeignKey
                                WHERE
                                ({$tbl}.IssuanceDate BETWEEN '{$date_from}' AND '{$date_to}')";
                
                if($check_peiss == false) {
                    $sql .= $and . "(tblprojects.PEISS = '{$select_peiss}')";
                }

                $sql .= " GROUP BY tblprojects.ProjectName";    //GROUP THE RESULTS SO THAT ONLY DISTINCT VALUES WILL BE COUNTED

            }

            $stmt = $db_con->prepare($sql);
            $stmt->execute();
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if($stmt->rowCount() > 0) {
                foreach($results as $row) {
                    if($row['ECCStatus'] == 0) {
                        $counter_array[0] += 1;
                    }else if($row['ECCStatus'] == 1) {
                        $counter_array[1] += 1;
                    }else if($row['ECCStatus'] == 2) {
                        $counter_array[2] += 1;
                    }else if($row['ECCStatus'] == 3) {
                        $counter_array[3] += 1;
                    }else if($row['ECCStatus'] == 4) {
                        $counter_array[4] += 1;
                    }
                    $subarray = array();
                    $subarray[] = $row['ProjectName'];
                    $subarray[] = $row['Latitude'];
                    $subarray[] = $row['Longitude'];
                    $subarray[] = $row['SpecificAddress'];
                    $subarray[] = $row['Municipality'];
                    $subarray[] = $row['Province'];
                    $subarray[] = $row['Proponent'];
                    $subarray[] = $project_type_s[$row['ProjectType']] ?? null;
                    $subarray[] = $project_subtype_s[$row['ProjectSubtype']] ?? null;
                    $subarray[] = $project_specific_type_s[$row['ProjectSpecificType']] ?? null;
                    $subarray[] = $project_specific_subtype_s[$row['ProjectSpecificSubtype']] ?? null;
                    $subarray[] = $sql;
                    $array[] = $subarray;
                }
                $response = array(
                    'data' => $array,
                    'counters' => $counter_array
                );
                echo json_encode($response);
            }

        break;   

        case 'project':

            $and = " AND ";
            $where = " WHERE ";
            $firstCondition = 1;

            $check_ptype = $data->check_ptype;
            $projecttype = $data->projecttype;
            $check_psubtype = $data->check_psubtype;
            $psubtype = $data->psubtype;
            $check_psstype = $data->check_psstype;
            $psstype = $data->psstype;
            $check_pssubtype = $data->check_pssubtype;
            $pssubtype = $data->pssubtype;

            $sql = "SELECT * FROM tblprojects";

            if($check_ptype==false){
                if($firstCondition==0){
                    $sql .= $and . "ProjectType=:ProjectType";
                }else{
                    $sql .= $where . "ProjectType=:ProjectType";
                    $firstCondition=0;
                }
            }

            if($check_psubtype==false){
                if($firstCondition==0){
                    $sql .= $and . "ProjectSubtype=:ProjectSubtype";
                }else{
                    $sql .= $where . "ProjectSubtype=:ProjectSubtype";
                    $firstCondition=0;
                }
            }

            if($check_psstype==false){
                if($firstCondition==0){
                    $sql .= $and . "ProjectSpecificType=:ProjectSpecificType";
                }else{
                    $sql .= $where . "ProjectSpecificType=:ProjectSpecificType";
                    $firstCondition=0;
                }
            }

            if($check_pssubtype==false){
                if($firstCondition==0){
                    $sql .= $and . "ProjectSpecificSubtype=:ProjectSpecificSubtype";
                }else{
                    $sql .= $where . "ProjectSpecificSubtype=:ProjectSpecificSubtype";
                    $firstCondition=0;
                }
            }

            $stmt = $db_con->prepare($sql);
            if($check_ptype==false) $stmt->bindParam(':ProjectType', $projecttype, PDO::PARAM_STR);
            if($check_psubtype==false) $stmt->bindParam(':ProjectSubtype', $psubtype, PDO::PARAM_STR);
            if($check_psstype==false) $stmt->bindParam(':ProjectSpecificType', $psstype, PDO::PARAM_STR);
            if($check_pssubtype==false) $stmt->bindParam(':ProjectSpecificSubtype', $pssubtype, PDO::PARAM_STR);
            $stmt->execute();
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if($stmt->rowCount() > 0) {
                foreach($results as $row) {
                    if($row['ECCStatus'] == 0) {
                        $counter_array[0] += 1;
                    }else if($row['ECCStatus'] == 1) {
                        $counter_array[1] += 1;
                    }else if($row['ECCStatus'] == 2) {
                        $counter_array[2] += 1;
                    }else if($row['ECCStatus'] == 3) {
                        $counter_array[3] += 1;
                    }else if($row['ECCStatus'] == 4) {
                        $counter_array[4] += 1;
                    }
                    $subarray = array();
                    $subarray[] = $row['ProjectName'];
                    $subarray[] = $row['Latitude'];
                    $subarray[] = $row['Longitude'];
                    $subarray[] = $row['SpecificAddress'];
                    $subarray[] = $row['Municipality'];
                    $subarray[] = $row['Province'];
                    $subarray[] = $row['Proponent'];
                    $subarray[] = $project_type_s[$row['ProjectType']] ?? null;
                    $subarray[] = $project_subtype_s[$row['ProjectSubtype']] ?? null;
                    $subarray[] = $project_specific_type_s[$row['ProjectSpecificType']] ?? null;
                    $subarray[] = $project_specific_subtype_s[$row['ProjectSpecificSubtype']] ?? null;
                    $array[] = $subarray;
                }
                $response = array(
                    'data' => $array,
                    'counters' => $counter_array
                );
                echo json_encode($response);
            }            

        break;
    }



?>