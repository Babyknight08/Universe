<?php

include_once 'dbcon.php';
include_once 'arrays.php';
include_once 'dologin.php';

session_start();
$login = new USER();

if(!$login->is_loggedin()) {
    header('Location: ../../login.php');      //check if user is logged in
  }

$numrows=0;

$type = $_POST['type'];
// echo $data;

  $dateNow = date('Y-m-d');

  switch ($type) {
    case 'pto':

        $sql = "SELECT * FROM tblprojects
                INNER JOIN tblpto
                ON tblprojects.ForeignKey = tblpto.ForeignKey
                WHERE
                tblpto.ExpirationDate < NOW()
                ORDER BY 
                tblpto.ExpirationDate ASC";
                // {$dateNow} > tblpto.ExpirationDate";
        $stmt = $db_con->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if($stmt->rowCount() > 0){
            foreach($results as $row){
                $numrows+=1;
                $subarray=array();
                $attachment = '<a href="../../build/php/' . $row['TargetPath'] . '" class="btn btn-link btn-sm" download>'.$row['Filename'].'</a>';
                $subarray[] = $row['ProjectName'];
                $subarray[] = $row['Proponent'];
                $subarray[] = $row['SpecificAddress'] . " " . $row['Municipality'] . ", " . $row['Province'];
                $subarray[] = $row['PTOCode'];
                $subarray[] = $row['IssuanceDate'];
                $subarray[] = "<span class='text-danger'>" . $row['ExpirationDate'] . "</span>";
                $subarray[] = $attachment;
                $data[] = $subarray;
            }
            $table_exp = array(
                'draw' => $_POST,
                'recordsTotal' => $numrows,
                'data' => $data
            );
            echo json_encode($table_exp);
        }else{
            $table_exp = array(
                'draw' => $_POST,
                'recordsTotal' => 0,
                'data' => []
            );
            echo json_encode($table_exp);
        }

    break;
    case 'wwdp' : 
        $sql = "SELECT * FROM tblprojects
        INNER JOIN tbldp
        ON tblprojects.ForeignKey = tbldp.ForeignKey
        WHERE
        tbldp.ExpirationDate < NOW()
        ORDER BY 
        tbldp.ExpirationDate ASC";
        // {$dateNow} > tblpto.ExpirationDate";
        $stmt = $db_con->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if($stmt->rowCount() > 0){
            foreach($results as $row){
                $numrows+=1;
                $subarray=array();
                $attachment = '<a href="../../build/php/' . $row['TargetPath'] . '" class="btn btn-link btn-sm" download>'.$row['Filename'].'</a>';
                $subarray[] = $row['ProjectName'];
                $subarray[] = $row['Proponent'];
                $subarray[] = $row['SpecificAddress'] . " " . $row['Municipality'] . ", " . $row['Province'];
                $subarray[] = $row['WWDPCode'];
                $subarray[] = $row['IssuanceDate'];
                $subarray[] = "<span class='text-danger'>" . $row['ExpirationDate'] . "</span>";
                $subarray[] = $attachment;
                $data[] = $subarray;
            }
            $table_exp = array(
                'draw' => $_POST,
                'recordsTotal' => $numrows,
                'data' => $data
            );
            echo json_encode($table_exp);
        }else{
            $table_exp = array(
                'draw' => $_POST,
                'recordsTotal' => 0,
                'data' => []
            );
            echo json_encode($table_exp);
        }
    break;
    case 'pco':

        $sql = "SELECT * FROM tblprojects
        INNER JOIN tblpco
        ON tblprojects.ForeignKey = tblpco.ForeignKey
        WHERE
        tblpco.ExpirationDate < NOW()
        ORDER BY 
        tblpco.ExpirationDate ASC";
        // {$dateNow} > tblpto.ExpirationDate";
        $stmt = $db_con->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if($stmt->rowCount() > 0){
            foreach($results as $row){
                $numrows+=1;
                $subarray=array();
                $attachment = '<a href="../../build/php/' . $row['TargetPath'] . '" class="btn btn-link btn-sm" download>'.$row['Filename'].'</a>';
                $subarray[] = $row['ProjectName'];
                $subarray[] = $row['Proponent'];
                $subarray[] = $row['SpecificAddress'] . " " . $row['Municipality'] . ", " . $row['Province'];
                $subarray[] = $row['PCOCode'];
                $subarray[] = $row['Category'];
                $subarray[] = $row['PCOName'];
                $subarray[] = $row['IssuanceDate'];
                $subarray[] = "<span class='text-danger'>" . $row['ExpirationDate'] . "</span>";
                $subarray[] = $attachment;
                $data[] = $subarray;
            }
            $table_exp = array(
                'draw' => $_POST,
                'recordsTotal' => $numrows,
                'data' => $data
            );
            echo json_encode($table_exp);
        }else{
            $table_exp = array(
                'draw' => $_POST,
                'recordsTotal' => 0,
                'data' => []
            );
            echo json_encode($table_exp);
        }  

    break;
    case 'ods':

        $sql = "SELECT * FROM tblprojects
        INNER JOIN tblods
        ON tblprojects.ForeignKey = tblods.ForeignKey
        WHERE
        tblods.ExpirationDate < NOW()
        ORDER BY 
        tblods.ExpirationDate ASC";
        // {$dateNow} > tblpto.ExpirationDate";
        $stmt = $db_con->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if($stmt->rowCount() > 0){
            foreach($results as $row){
                $numrows+=1;
                $subarray=array();
                $attachment = '<a href="../../build/php/' . $row['TargetPath'] . '" class="btn btn-link btn-sm" download>'.$row['Filename'].'</a>';
                $subarray[] = $row['ProjectName'];
                $subarray[] = $row['Proponent'];
                $subarray[] = $row['SpecificAddress'] . " " . $row['Municipality'] . ", " . $row['Province'];
                $subarray[] = $row['PermitNumber'];
                $subarray[] = $row['IssuanceDate'];
                $subarray[] = "<span class='text-danger'>" . $row['ExpirationDate'] . "</span>";
                $subarray[] = $attachment;
                $data[] = $subarray;
            }
            $table_exp = array(
                'draw' => $_POST,
                'recordsTotal' => $numrows,
                'data' => $data
            );
            echo json_encode($table_exp);
        }else{
            $table_exp = array(
                'draw' => $_POST,
                'recordsTotal' => 0,
                'data' => []
            );
            echo json_encode($table_exp);
        }  

    break;
    case 'ptt':

        $sql = "SELECT * FROM tblprojects
        INNER JOIN tblptt
        ON tblprojects.ForeignKey = tblptt.ForeignKey
        WHERE
        tblptt.ExpirationDate < NOW()
        ORDER BY 
        tblptt.ExpirationDate ASC";
        // {$dateNow} > tblpto.ExpirationDate";
        $stmt = $db_con->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if($stmt->rowCount() > 0){
            foreach($results as $row){
                $numrows+=1;
                $subarray=array();
                $attachment = '<a href="../../build/php/' . $row['TargetPath'] . '" class="btn btn-link btn-sm" download>'.$row['Filename'].'</a>';
                $subarray[] = $row['ProjectName'];
                $subarray[] = $row['Proponent'];
                $subarray[] = $row['SpecificAddress'] . " " . $row['Municipality'] . ", " . $row['Province'];
                $subarray[] = $row['PermitNumber'];
                $subarray[] = $row['IssuanceDate'];
                $subarray[] = "<span class='text-danger'>" . $row['ExpirationDate'] . "</span>";
                $subarray[] = $attachment;
                $data[] = $subarray;
            }
            $table_exp = array(
                'draw' => $_POST,
                'recordsTotal' => $numrows,
                'data' => $data
            );
            echo json_encode($table_exp);
        }else{
            $table_exp = array(
                'draw' => $_POST,
                'recordsTotal' => 0,
                'data' => []
            );
            echo json_encode($table_exp);
        } 

    break;
  }

?>