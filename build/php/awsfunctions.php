<?php

    include_once 'dbcon.php';

    $data = json_decode(file_get_contents('php://input'));
    $event_type = $data->event_type;
    $id = $data->id;
    $law = $data->law;

    switch($law){
        case 'air' :
            $sql = "SELECT * FROM tblair WHERE ID='$id'";
            $sqldel = "DELETE FROM tblair WHERE ID=:ID";
            break;
        case 'water' :
            $sql = "SELECT * FROM tblwater WHERE ID='$id'";
            $sqldel = "DELETE FROM tblwater WHERE ID=:ID";
            break;
    }

    $stmt = $db_con->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    $uniqid = $result['UniqID'];

    $fullPath = 'uploads/monitoring/' . $law . '/' . $uniqid;

    switch($event_type) {
        case 'delete' : 
            try{
                if(file_exists($fullPath)) {
                    unlink($fullPath . '/' . $result['Filename']);
                    rmdir($fullPath);
                }
            
                $stmt = $db_con->prepare($sqldel);
                $stmt->bindParam(':ID', $id, PDO::PARAM_STR);
                $stmt->execute();
                $response = array(
                    "message" => "success"
                );
                echo json_encode($response);
            }catch(PDOException $e){
                $response = array(
                    "message" => $e->getMessage()
                );
                echo json_encode($response);
            }
            break;
        case 'load' :
            try{
                $response = array(
                    "message" => "success",
                    "datemonitored" => $result['DateMonitored'],
                    "law" => $law
                );
                echo json_encode($response);
            }catch(PDOException $e){
                $response = array(
                    "message" => $e->getMessage()
                );
                echo json_encode($response);
            }
            break;
    }

?>