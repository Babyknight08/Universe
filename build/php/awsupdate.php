<?php

    include_once 'dbcon.php';

    $dateMonitored = $_POST['datemonitored'];
    $law = $_POST['law'];
    $id = $_POST['id'];

    if (isset($_FILES['awsfile']['size']) == 0 && isset($_FILES['awsfile']['error']) == 0){
        switch($law){
            case 'air' :
                $sql = "UPDATE tblair SET DateMonitored = :DateMonitored WHERE ID=:ID";
                break;
            case 'water' :
                $sql = "UPDATE tblwater SET DateMonitored = :DateMonitored WHERE ID=:ID";
                break;
        }
        
        $stmt = $db_con->prepare($sql);
        $stmt->bindParam(':DateMonitored', $dateMonitored, PDO::PARAM_STR);
        $stmt->bindParam(':ID', $id, PDO::PARAM_STR);
        $stmt->execute();
        
        echo 'success';

        exit();

    }else{
        //REMOVE CURRENT UPLOAD FILE FIRST
        switch($law){
            case 'air' :
                $sql = "SELECT * FROM tblair WHERE ID=:ID";
                break;
            case 'water' :
                $sql = "SELECT * FROM tblwater WHERE ID=:ID";
                break;
        }
        
        $stmt = $db_con->prepare($sql);
        $stmt->bindParam(':ID', $id, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        $uniqid = $result['UniqID'];
        $fullPath = 'uploads/monitoring/' . $law . '/' . $uniqid;
        $targetPath = $fullPath . '/' . $_FILES['awsfile']['name'];

        if(file_exists($fullPath)) {
            unlink($fullPath . '/' . $result['Filename']);
        }
        //UPDATE TABLE RECORD AND FILE
        if(!file_exists($fullPath))
        {
            mkdir($fullPath, 0755, true);
            //Creates the directory with default user previledges
        }
        move_uploaded_file($_FILES['awsfile']['tmp_name'], $targetPath);
        switch($law) {
            case 'air' :
                $sql = "UPDATE tblair SET
                DateMonitored=:DateMonitored,
                TargetPath=:TargetPath,
                Filename=:Filename
                WHERE
                ID=:ID";
                break;
            case 'water' :
                $sql = "UPDATE tblwater SET
                DateMonitored=:DateMonitored,
                TargetPath=:TargetPath,
                Filename=:Filename
                WHERE
                ID=:ID";
                break;
        }
        $stmt = $db_con->prepare($sql);
        $stmt->bindParam(':DateMonitored', $dateMonitored, PDO::PARAM_STR);
        $stmt->bindParam(':TargetPath', $targetPath, PDO::PARAM_STR);
        $stmt->bindParam(':Filename', $_FILES['awsfile']['name'], PDO::PARAM_STR);
        $stmt->bindParam(':ID', $id, PDO::PARAM_STR);
        $stmt->execute();

        echo 'success';

        exit();
    }

    

?>