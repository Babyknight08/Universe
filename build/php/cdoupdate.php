<?php

    include_once 'dbcon.php';

    $issuanceDate = $_POST['issuancedate'];
    $id = $_POST['id'];

    if (isset($_FILES['cdofile']['size']) == 0 && isset($_FILES['cdofile']['error']) == 0){
        $sql = "UPDATE tblcdo SET IssuanceDate = :IssuanceDate WHERE ID=:ID";
        $stmt = $db_con->prepare($sql);
        $stmt->bindParam(':IssuanceDate', $issuanceDate, PDO::PARAM_STR);
        $stmt->bindParam(':ID', $id, PDO::PARAM_STR);
        $stmt->execute();
        
        echo 'success';

        exit();

    }else{
        //REMOVE CURRENT UPLOAD FILE FIRST
        $sql = "SELECT * FROM tblcdo WHERE ID=:ID";
        $stmt = $db_con->prepare($sql);
        $stmt->bindParam(':ID', $id, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        $uniqid = $result['UniqID'];
        $fullPath = 'uploads/cdo/' . $uniqid;
        $targetPath = $fullPath . '/' . $_FILES['cdofile']['name'];

        if(file_exists($fullPath)) {
            unlink($fullPath . '/' . $result['Filename']);
        }
        //UPDATE TABLE RECORD AND FILE
        if(!file_exists($fullPath))
        {
            mkdir($fullPath, 0755, true);
            //Creates the directory with default user previledges
        }
        move_uploaded_file($_FILES['cdofile']['tmp_name'], $targetPath);
        $sql = "UPDATE tblcdo SET
                IssuanceDate=:IssuanceDate,
                TargetPath=:TargetPath,
                Filename=:Filename
                WHERE
                ID=:ID";
        $stmt = $db_con->prepare($sql);
        $stmt->bindParam(':IssuanceDate', $issuanceDate, PDO::PARAM_STR);
        $stmt->bindParam(':TargetPath', $targetPath, PDO::PARAM_STR);
        $stmt->bindParam(':Filename', $_FILES['cdofile']['name'], PDO::PARAM_STR);
        $stmt->bindParam(':ID', $id, PDO::PARAM_STR);
        $stmt->execute();

        echo 'success';

        exit();
    }

    

?>