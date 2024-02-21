<?php

    include_once 'dbcon.php';

    $data = json_decode(file_get_contents('php://input'));

    $cmrcheck = $data->cmrcheck;
    $projectid = $data->projectid;

    // CHECK IF FIRM BEING UPDATED IS COVERED BY PD1586
    // ONLY IF CMR HAS BEEN SET TO TRUE
    if($cmrcheck==true) {
        $nRows=$db_con->query(
            "SELECT COUNT(*) FROM tblprojects
            WHERE ID='".$projectid."' AND PEISS!='ECC'"
        )->fetchColumn();
        if($nRows>=1){
            $res = array(
                'message' => 'invalid'
            );
            echo json_encode($res);
            exit();
        }
    }

    $cmrval = $cmrcheck=true ? "true" : "false"; 

    $sql="UPDATE tblprojects SET CMR=:CMR WHERE ID=:ID";
    $stmt=$db_con->prepare($sql);
    $stmt->bindParam(':CMR', $cmrval, PDO::PARAM_STR);
    $stmt->bindParam(':ID', $projectid, PDO::PARAM_STR);
    $stmt->execute();
    $res = array(
        'message' => 'success',
        'cmrcheck' => $cmrval
    );
    echo json_encode($res);
    exit();


?>