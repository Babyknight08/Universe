<?php

    include_once 'dbcon.php';

    $data = json_decode(file_get_contents('php://input'));
    $event_type = $data->event_type;
    $id = $data->id;
    $fkey = $data->fkey;

    switch($event_type){
        case 'pco' :

            try{
                $sql = "SELECT * FROM tblpco WHERE ID='$id'";
                $stmt = $db_con->prepare($sql);
                $stmt->execute();
                $result = $stmt->fetch(PDO::FETCH_ASSOC);

                $fullPath = 'uploads/pco/' . $fkey;
                if(file_exists($fullPath)){
                    unlink($fullPath . '/' . $result['Filename']);
                    rmdir($fullPath);
                }
            
                $sql = "DELETE FROM tblpco WHERE ID=:ID";
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

        case 'pto' :

            try{
                $sql = "SELECT * FROM tblpto WHERE ID='$id'";
                $stmt = $db_con->prepare($sql);
                $stmt->execute();
                $result = $stmt->fetch(PDO::FETCH_ASSOC);

                $fullPath = 'uploads/permits/pto/' . $fkey;
                if(file_exists($fullPath)){
                    unlink($fullPath . '/' . $result['Filename']);
                    rmdir($fullPath);
                }
            
                $sql = "DELETE FROM tblpto WHERE ID=:ID";
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

        case 'dp' :

            try{
                $sql = "SELECT * FROM tbldp WHERE ID='$id'";
                $stmt = $db_con->prepare($sql);
                $stmt->execute();
                $result = $stmt->fetch(PDO::FETCH_ASSOC);

                $fullPath = 'uploads/permits/wwdp/' . $fkey;
                if(file_exists($fullPath)){
                    unlink($fullPath . '/' . $result['Filename']);
                    rmdir($fullPath);
                }
            
                $sql = "DELETE FROM tbldp WHERE ID=:ID";
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

        case 'tchw' :
            
            $permit = $data->permit;

            switch($permit) {
                case 'HWG-ID' :
                    $folder = 'hwgid';
                    $sql = "SELECT * FROM tblhwgid WHERE ID='$id'";
                    $sqldel = "DELETE FROM tblhwgid WHERE ID=:ID";
                    break;
                case 'PTT' :
                    $folder = 'ptt';
                    $sql = "SELECT * FROM tblptt WHERE ID='$id'";
                    $sqldel = "DELETE FROM tblptt WHERE ID=:ID";
                    break;
                case 'SQI' :
                    $folder = 'sqi';
                    $sql = "SELECT * FROM tblsqi WHERE ID='$id'";
                    $sqldel = "DELETE FROM tblsqi WHERE ID=:ID";
                    break;
                case 'CCO-RC' :
                    $folder = 'ccorc';
                    $sql = "SELECT * FROM tblccorc WHERE ID='$id'";
                    $sqldel = "DELETE FROM tblccorc WHERE ID=:ID";
                    break;
                case 'CCO-IC' :
                    $folder = 'ccoic';
                    $sql = "SELECT * FROM tblccoic WHERE ID='$id'";
                    $sqldel = "DELETE FROM tblccoic WHERE ID=:ID";
                    break;
                case 'TSD' :
                    $folder = 'tsd';
                    $sql = "SELECT * FROM tbltsd WHERE ID='$id'";
                    $sqldel = "DELETE FROM tbltsd WHERE ID=:ID";
                    break;
                case 'TRC' :
                    $folder = 'trc';
                    $sql = "SELECT * FROM tbltrc WHERE ID='$id'";
                    $sqldel = "DELETE FROM tbltrc WHERE ID=:ID";
                    break;
                case 'ODS' :
                    $folder = 'ods';
                    $sql = "SELECT * FROM tblods WHERE ID='$id'";
                    $sqldel = "DELETE FROM tblods WHERE ID=:ID";
                    break;
                case 'PCB' :
                    $folder = 'pcb';
                    $sql = "SELECT * FROM tblpcb WHERE ID='$id'";
                    $sqldel = "DELETE FROM tblpcb WHERE ID=:ID";
                    break;
            }

            try{
                $stmt = $db_con->prepare($sql);
                $stmt->execute();
                $result = $stmt->fetch(PDO::FETCH_ASSOC);

                $fullPath = 'uploads/permits/' . $folder . '/' . $fkey;
                if(file_exists($fullPath)){
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

    }

?>