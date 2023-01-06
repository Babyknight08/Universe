<?php

    include_once 'dbcon.php';

    $dateMonitored = $_POST['datemonitored'];
    $id = $_POST['id'];

    if (isset($_FILES['eiafile']['size']) == 0 && isset($_FILES['eiafile']['error']) == 0){
        $sql = "UPDATE tbleia SET DateMonitored = :DateMonitored WHERE ID=:ID";
        $stmt = $db_con->prepare($sql);
        $stmt->bindParam(':DateMonitored', $dateMonitored, PDO::PARAM_STR);
        $stmt->bindParam(':ID', $id, PDO::PARAM_STR);
        $stmt->execute();
        
        echo 'success';

        exit();

    }else{
        //REMOVE CURRENT UPLOAD FILE FIRST
        $sql = "SELECT * FROM tbleia WHERE ID=:ID";
        $stmt = $db_con->prepare($sql);
        $stmt->bindParam(':ID', $id, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        $uniqid = $result['UniqID'];
        $fullPath = 'uploads/monitoring/eia/' . $uniqid;
        $targetPath = $fullPath . '/' . $_FILES['eiafile']['name'];

        if(file_exists($fullPath)) {
            unlink($fullPath . '/' . $result['Filename']);
        }
        //UPDATE TABLE RECORD AND FILE
        if(!file_exists($fullPath))
        {
            mkdir($fullPath, 0755, true);
            //Creates the directory with default user previledges
        }
        move_uploaded_file($_FILES['eiafile']['tmp_name'], $targetPath);
        $sql = "UPDATE tbleia SET
                DateMonitored=:DateMonitored,
                TargetPath=:TargetPath,
                Filename=:Filename
                WHERE
                ID=:ID";
        $stmt = $db_con->prepare($sql);
        $stmt->bindParam(':DateMonitored', $dateMonitored, PDO::PARAM_STR);
        $stmt->bindParam(':TargetPath', $targetPath, PDO::PARAM_STR);
        $stmt->bindParam(':Filename', $_FILES['eiafile']['name'], PDO::PARAM_STR);
        $stmt->bindParam(':ID', $id, PDO::PARAM_STR);
        $stmt->execute();

        echo 'success';

        exit();
    }

    

?>