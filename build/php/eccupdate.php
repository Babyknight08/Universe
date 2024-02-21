<?php

    include_once 'dbcon.php';

    $dateMonitored = $_POST['datemonitored'];
    $id = $_POST['id'];
    $eccremarks = $_POST['eccremarks'];

    if (isset($_FILES['eccfile']['size']) == 0 && isset($_FILES['eccfile']['error']) == 0){
        $sql = "UPDATE tblecc SET DateMonitored = :DateMonitored WHERE ID=:ID";
        $stmt = $db_con->prepare($sql);
        $stmt->bindParam(':DateMonitored', $dateMonitored, PDO::PARAM_STR);
        $stmt->bindParam(':ID', $id, PDO::PARAM_STR);
        $stmt->execute();
        
        echo 'success';

        exit();

    }else{
        //REMOVE CURRENT UPLOAD FILE FIRST
        $sql = "SELECT * FROM tblecc WHERE ID=:ID";
        $stmt = $db_con->prepare($sql);
        $stmt->bindParam(':ID', $id, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        $uniqid = $result['UniqID'];
        $fullPath = 'uploads/ecc/' . $uniqid;
        $targetPath = $fullPath . '/' . $_FILES['eccfile']['name'];

        if(file_exists($fullPath)) {
            unlink($fullPath . '/' . $result['Filename']);
        }
        //UPDATE TABLE RECORD AND FILE
        if(!file_exists($fullPath))
        {
            mkdir($fullPath, 0755, true);
            //Creates the directory with default user previledges
        }
        move_uploaded_file($_FILES['eccfile']['tmp_name'], $targetPath);
        $sql = "UPDATE tblecc SET
                DateMonitored=:DateMonitored,
                Remarks=:Remarks,
                TargetPath=:TargetPath,
                Filename=:Filename
                WHERE
                ID=:ID";
        $stmt = $db_con->prepare($sql);
        $stmt->bindParam(':DateMonitored', $dateMonitored, PDO::PARAM_STR);
        $stmt->bindParam(':Remarks', $eccremarks, PDO::PARAM_STR);
        $stmt->bindParam(':TargetPath', $targetPath, PDO::PARAM_STR);
        $stmt->bindParam(':Filename', $_FILES['eccfile']['name'], PDO::PARAM_STR);
        $stmt->bindParam(':ID', $id, PDO::PARAM_STR);
        $stmt->execute();

        echo 'success';

        exit();
    }

    

?>