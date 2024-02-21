<?php


    include_once 'dbcon.php';

    $data = json_decode(file_get_contents('php://input'));
    $event_type = $data->event_type;
    $id = $data->id;

    switch($event_type) {
        case "delete" :
            try {
                $sql = "DELETE FROM tblemployees WHERE ID=:ID";
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
        case "reset" :
            try {
                $resetpass = password_hash("123456", PASSWORD_DEFAULT);
                $sql = "UPDATE tblemployees SET Userpass=:Userpass WHERE ID=:ID";
                $stmt = $db_con->prepare($sql);
                $stmt->bindParam(':Userpass', $resetpass, PDO::PARAM_STR);
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
        case "load" : 
            try {
                $sql = "SELECT * FROM tblemployees WHERE ID=:ID";
                $stmt = $db_con->prepare($sql);
                $stmt->bindParam(':ID', $id, PDO::PARAM_STR);
                $stmt->execute();
                $row=$stmt->fetch(PDO::FETCH_ASSOC);    
                if($stmt->rowCount() == 1){
                    $response = array(
                        "message" => "success",
                        "id" => $row['ID'],
                        "lastname" => $row['LastName'],
                        "firstname" => $row['FirstName'],
                        "middlename" => $row['MiddleName'],
                        "extension" => $row['NameExtension'],
                        "division" => $row['Division'],
                        "section" => $row['Section'],
                        "usertype" => $row['UserType']
                    );
                    echo json_encode($response);
                }
            }catch(PDOException $e){
                $response = array(
                    "message" => $e->getMessage()
                );
                echo json_encode($response);
            }
            break;
        case "update" : 
            try {
                $lastname = $data->lastname;
                $firstname = $data->firstname;
                $middlename = $data->middlename;
                $extension = $data->extension;
                $division = $data->division;
                $section = $data->section;
                $usertype = $data->usertype;
                $username = $data->username;
                $nRows = $db_con->query("SELECT COUNT(*) FROM tblemployees 
                                        WHERE LastName = '".$lastname."' 
                                        AND FirstName = '".$firstname."' 
                                        AND MiddleName = '".$middlename."' 
                                        AND NameExtension = '".$extension."'
                                        AND ID != '".$id."'")->fetchColumn();
                if($nRows >= 1) {
                    $response = array(
                        "message" => "duplicate"
                    );
                    echo json_encode($response);
                }else{
                     //substr(strtolower($firstname),0,1) . substr(strtolower($middlename),0,1) . strtolower($lastname);
                    $sql = "UPDATE tblemployees SET
                            LastName=:LastName,
                            FirstName=:FirstName,
                            MiddleName=:MiddleName,
                            NameExtension=:NameExtension,
                            Division=:Division,
                            Section=:Section,
                            UserType=:UserType,
                            Username=:Username
                            WHERE
                            ID=:ID";
                    $stmt = $db_con->prepare($sql);
                    $stmt->bindParam(':LastName', $lastname, PDO::PARAM_STR);
                    $stmt->bindParam(':FirstName', $firstname, PDO::PARAM_STR);
                    $stmt->bindParam(':MiddleName', $middlename, PDO::PARAM_STR);
                    $stmt->bindParam(':NameExtension', $extension, PDO::PARAM_STR);
                    $stmt->bindParam(':Division', $division, PDO::PARAM_STR);
                    $stmt->bindParam(':Section', $section, PDO::PARAM_STR);
                    $stmt->bindParam(':UserType', $usertype, PDO::PARAM_STR);
                    $stmt->bindParam(':ID', $id, PDO::PARAM_STR);
                    $stmt->bindParam(':Username', $username, PDO::PARAM_STR);
                    $stmt->execute();
                    $response = array(
                        "message" => "success",
                    );
                    echo json_encode($response);
                }
            }catch(PDOException $e){
                $response = array(
                    "message" => $e->getMessage()
                );
                echo json_encode($response);
            }
            break;
    }



    


?>