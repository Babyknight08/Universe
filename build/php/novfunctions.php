<?php

    include_once 'dbcon.php';

    $data = json_decode(file_get_contents('php://input'));
    $event_type = $data->event_type;
    $id = $data->id;

    $sql = "SELECT * FROM tblnotice WHERE ID='$id'";
    $stmt = $db_con->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    $uniqid = $result['UniqID'];

    if($result['Law']=='PD1586'){
        $folder = 'eia';
    }elseif($result['Law']=='RA9275'){
        $folder = 'water';
    }elseif($result['Law']=='RA8749'){
        $folder = 'air';
    }else{
        $folder = 'toxic';
    }

    $fullPath = 'uploads/' . $folder . '/' . $result['UniqID'];

    switch($event_type) {
        case 'delete' : 
            try{
                $nRows = $db_con->query("SELECT COUNT(*) FROM tblnotice WHERE UniqID = '$uniqid'")->fetchColumn();
                if($nRows==1){
                    if(file_exists($fullPath)) {
                        unlink($fullPath . '/' . $result['Filename']);
                        rmdir($fullPath);
                    }
                }
                $sql = "DELETE FROM tblnotice WHERE ID=:ID";
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
        case 'update' :
            try{
                $commitment = $data->commitment;
                $compliance = $data->compliance;
                $versus = intval($commitment) - intval($compliance);

                if($versus > 0){
                    $status = 'Non-compliant';
                }else{
                    $status = 'Compliant';
                }
                
                $sql = "UPDATE tblnotice SET 
                        Commitment=:Commitment,
                        Compliance=:Compliance,
                        Status=:Status
                        WHERE
                        ID=:ID";
                $stmt = $db_con->prepare($sql);
                $stmt->bindParam(':Commitment', $commitment, PDO::PARAM_STR);
                $stmt->bindParam(':Compliance', $compliance, PDO::PARAM_STR);
                $stmt->bindParam(':Status', $status, PDO::PARAM_STR);
                $stmt->bindParam(':ID', $id, PDO::PARAM_STR);
                $stmt->execute();
                $response = array(
                    "message" => 'success'
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