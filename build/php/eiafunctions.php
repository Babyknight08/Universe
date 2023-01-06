<?php

    include_once 'dbcon.php';

    $data = json_decode(file_get_contents('php://input'));
    $event_type = $data->event_type;
    $id = $data->id;

    $sql = "SELECT * FROM tbleia WHERE ID='$id'";
    $stmt = $db_con->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    $uniqid = $result['UniqID'];

    $fullPath = 'uploads/monitoring/eia/' . $uniqid;

    switch($event_type) {
        case 'delete' : 
            try{
                if(file_exists($fullPath)) {
                    unlink($fullPath . '/' . $result['Filename']);
                    rmdir($fullPath);
                }
                $sql = "DELETE FROM tbleia WHERE ID=:ID";
                $stmt = $db_con->prepare($sql);
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
                    "datemonitored" => $result['DateMonitored']
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