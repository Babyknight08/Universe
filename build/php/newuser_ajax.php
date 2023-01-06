<?php

    include_once 'dbcon.php';

    $data = json_decode(file_get_contents('php://input'));
    $lastname = $data->lastname;
    $firstname = $data->firstname;
    $middlename = $data->middlename;
    $extension = $data->extension;
    $division = $data->division;
    $section = $data->section;
    $usertype = $data->usertype;

    $username = $data->username;
    $userpass = password_hash("123456", PASSWORD_DEFAULT);

    $nRows = $db_con->query("SELECT COUNT(*) FROM tblemployees WHERE LastName = '".$lastname."' AND FirstName = '".$firstname."' AND MiddleName = '".$middlename."' AND NameExtension = '".$extension."'")->fetchColumn();
    if($nRows >=1) {
        $response = array(
            "message" => "duplicate"
        );
        echo json_encode($response);
    }else{
        $sql = "INSERT INTO tblemployees (
                LastName,
                FirstName,
                MiddleName,
                NameExtension,
                Division,
                Section,
                Username,
                Userpass,
                UserType
                )VALUES(
                :LastName,
                :FirstName,
                :MiddleName,
                :NameExtension,
                :Division,
                :Section,
                :Username,
                :Userpass,
                :UserType)";
        $stmt = $db_con->prepare($sql);
        $stmt->bindParam(':LastName', $lastname, PDO::PARAM_STR);
        $stmt->bindParam(':FirstName', $firstname, PDO::PARAM_STR);
        $stmt->bindParam(':MiddleName', $middlename, PDO::PARAM_STR);
        $stmt->bindParam(':NameExtension', $extension, PDO::PARAM_STR);
        $stmt->bindParam(':Division', $division, PDO::PARAM_STR);
        $stmt->bindParam(':Section', $section, PDO::PARAM_STR);
        $stmt->bindParam(':Username', $username, PDO::PARAM_STR);
        $stmt->bindParam(':Userpass', $userpass, PDO::PARAM_STR);
        $stmt->bindParam(':UserType', $usertype, PDO::PARAM_STR);
        $stmt->execute();
        $response = array(
            "message" => "success"
        );
        echo json_encode($response);
    }


?>