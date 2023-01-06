<?php

    include_once 'dbcon.php';

    $data = json_decode(file_get_contents('php://input'));
    $userid = $data->userid;
    $oldpass = $data->oldpass;
    $newpass = $data->newpass;
    $confpass = $data->confpass;

    $sql = "SELECT * FROM tblemployees WHERE ID=:ID";
    $stmt = $db_con->prepare($sql);
    $stmt->bindParam(':ID', $userid, PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    if($stmt->rowCount() == 1){
        if(password_verify($oldpass, $result['Userpass'])){
            $userpass = password_hash($newpass, PASSWORD_DEFAULT);
            $sql = "UPDATE tblemployees SET Userpass=:Userpass WHERE ID=:ID";
            $stmt=$db_con->prepare($sql);
            $stmt->bindParam(':Userpass', $userpass, PDO::PARAM_STR);
            $stmt->bindParam(':ID', $userid, PDO::PARAM_STR);
            $stmt->execute();
            $response = array(
                'message' => 'success'
            );
            echo json_encode($response);
        }else{
            $response = array(
                'message' => 'nomatch'
            );
            echo json_encode($response);
        }
    }

?>