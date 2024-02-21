<?php

    include_once 'dbcon.php';

    $dateMonitored = $_POST['datemonitored'];
    $law = $_POST['law'];
    $id = $_POST['id'];

    if (isset($_FILES['hazfile']['size']) == 0 && isset($_FILES['hazfile']['error']) == 0){
        switch($law){
            case 'air' :
                $sql = "UPDATE tbltoxic SET DateMonitored = :DateMonitored WHERE ID=:ID";
                break;
            case 'water' :
                $sql = "UPDATE tblhazwaste SET DateMonitored = :DateMonitored WHERE ID=:ID";
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
        switch($law) {
            case 'toxic' :
                $sql = "SELECT * FROM tbltoxic WHERE ID=:ID";
                break;
            case 'hazwaste' :
                $sql = "SELECT * FROM tblhazwaste WHERE ID=:ID";
                break;
        }
        $stmt = $db_con->prepare($sql);
        $stmt->bindParam(':ID', $id, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        $uniqid = $result['UniqID'];
        $fullPath = 'uploads/monitoring/' . $law . '/' . $uniqid;
        $targetPath = $fullPath . '/' . $_FILES['hazfile']['name'];

        if(file_exists($fullPath)) {
            unlink($fullPath . '/' . $result['Filename']);
        }
        //UPDATE TABLE RECORD AND FILE
        if(!file_exists($fullPath))
        {
            mkdir($fullPath, 0755, true);
            //Creates the directory with default user previledges
        }
        move_uploaded_file($_FILES['hazfile']['tmp_name'], $targetPath);
        switch($law) {
            case 'toxic' :
                $sql = "UPDATE tbltoxic SET
                DateMonitored=:DateMonitored,
                TargetPath=:TargetPath,
                Filename=:Filename
                WHERE
                ID=:ID";
                break;
            case 'hazwaste' :
                $sql = "UPDATE tblhazwaste SET
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
        $stmt->bindParam(':Filename', $_FILES['hazfile']['name'], PDO::PARAM_STR);
        $stmt->bindParam(':ID', $id, PDO::PARAM_STR);
        $stmt->execute();

        echo 'success';

        exit();
    }

    

?>