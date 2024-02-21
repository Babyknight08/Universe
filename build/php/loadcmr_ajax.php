<?php

    include_once 'dbcon.php';
    include_once 'dologin.php';

    session_start();
    $login = new USER();

    if(!$login->is_loggedin()) {
      header('Location: ../../login.php');      //check if user is logged in
    }
  
    $usertype = $_SESSION['usertype'];
    $section = $_SESSION['section'];

    $numrows=0;
    $ProjectID = $_POST['id'];

    $sql = "SELECT * FROM tblcmr WHERE ProjectID = :ProjectID";
    $stmt = $db_con->prepare($sql);
    $stmt->bindParam(':ProjectID', $ProjectID, PDO::PARAM_STR);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if($stmt->rowCount() > 0){
        foreach($results as $row) {
            $numrows+=1;
            $subarray = array();
            $actions = '<div class="btn-group">';
            if($usertype == 'a' || $section == '3') {
            $actions .= '<button type="button" class="btn btn-warning" data-id="'.$row['ID'].'" onclick="updateCMR(this)"><i class="fas fa-pencil-alt"></i> update</button>';
            $actions .= '<button type="button" data-toggle="modal" data-target="#modal-delete-cmr" class="btn btn-danger" data-id="'.$row['ID'].'"><i class="fas fa-trash-alt"></i> delete</button>';
            }
            $actions .= '</div>';
            $subarray[] = $row['YearSubmission'];
            $subarray[] = $row['DateSubmission'];
            $subarray[] = $row['Semester'];
            $subarray[] = $actions;
            $data[] = $subarray;
        }
        $table_cmr = array(
            'draw' => $_POST,
            'recordsTotal' => $numrows,
            'data' => $data
        );
        echo json_encode($table_cmr);
    }else{
        $table_cmr = array(
            'draw' => $_POST,
            'recordsTotal' => 0,
            'data' => []
        );
        echo json_encode($table_cmr);
    }



?>