<?php

    include_once 'dbcon.php';
    include_once 'arrays.php';
    include_once 'dologin.php';

    session_start();
    $login = new USER();

    if(!$login->is_loggedin()) {
      header('Location: ../../login.php');      //check if user is logged in
    }
  
    $usertype = $_SESSION['usertype'];
    $section = $_SESSION['section'];

    $status_array = array(
        '0' => 'Non-Applicable',
        '1' => 'Operational',
        '2' => 'Non-Operational',
        '3' => 'Relieved',
        '4' => 'Cancelled'
    );

    $numrows=0;
    $sql = "SELECT * FROM tblprojects";
    $stmt = $db_con->prepare($sql);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if($stmt->rowCount() > 0)
    {
        foreach($results as $row)
        {
            $numrows+=1;
            $subarray = array();
            $profile = '<button data-id='.$row['ID'].' data-fkey="'.$row['ForeignKey'].'" class="btn btn-link" onclick="projectLink(this)">'.$row['ProjectName'].'</button>'; 
            $status = $status_array[$row['ECCStatus']] ?? null;
            $actions = '<div class="btn-group">';
            if($usertype == 'a' || $section=='1') {
                $actions .= '<button type="button" class="btn btn-warning" data-id="'.$row['ID'].'" data-fkey="'.$row['ForeignKey'].'" onclick="updateProj(this)"><i class="fas fa-pencil-alt"></i> update</button>';
            }
            if($usertype == 'a') {
                $actions .= '<button type="button" data-toggle="modal" data-target="#modal-delete" class="btn btn-danger" data-fkey="'.$row['ForeignKey'].'" data-pname="'.$row['ProjectName'].'" data-id="'.$row['ID'].'"><i class="fas fa-trash-alt"></i> delete</button>';
            }
            $actions .= '</div>';
            $address = $row['SpecificAddress'] . ", " . $row['Municipality'] . ", " . $row['Province'];
            $subarray[] = $row['PEISS'];
            $subarray[] = $row['ReferenceNo'];
            $subarray[] = $status;
            $subarray[] = $row['DateApproved'];
            $subarray[] = $row['PSICCode'];
            $subarray[] = $profile;
            $subarray[] = $row['Proponent'];
            $subarray[] = $project_type_s[$row['ProjectType']] ?? null;
            $subarray[] = $project_subtype_s[$row['ProjectSubtype']] ?? null;
            $subarray[] = $project_specific_type_s[$row['ProjectSpecificType']] ?? null;
            $subarray[] = $project_specific_subtype_s[$row['ProjectSpecificSubtype']] ?? null;
            $subarray[] = $address;
            $subarray[] = $actions;
            $data[] = $subarray;
        }
        $table_proj = array(
            'draw' => $_POST,
            'recordsTotal' => $numrows,
            'data' => $data
        );
        echo json_encode($table_proj);
    }
    else
    {
        $table_proj = array(
            'draw' => $_POST,
            'recordsTotal' => 0,
            'data' => []
        );
        echo json_encode($table_proj);       //indicates that the json_response is empty
    } 

?>