<?php

    include_once 'dbcon.php';

    // $dateMonitored = $_POST['datemonitored'];
    $date_Monitored = $_POST['date_monitored'];
    $projectid = $_POST['projectid'];
    $uniqid = uniqid();
    $targetPath = 'uploads/monitoring/eia/' . $uniqid;
    $fileTransfer = $targetPath . '/' . $_FILES['eiafile']['name'];

    if(!file_exists($targetPath))
    {
        mkdir($targetPath, 0755, true);
        //Creates the directory with default user previledges
    }
    copy($_FILES['eiafile']['tmp_name'], $fileTransfer);

    try{

        $sql = "INSERT INTO tbleia (
            DateMonitored,
            -- Date_Monitored,
            TargetPath,
            Filename,
            ProjectID,
            UniqID
            )VALUES(
            -- :DateMonitored,
            :Date_Monitored,
            :TargetPath,
            :Filename,
            :ProjectID,
            :UniqID)";
        $stmt = $db_con->prepare($sql);
        // $stmt->bindParam(':DateMonitored', $dateMonitored, PDO::PARAM_STR);
        $stmt->bindParam(':Date_Monitored', $date_Monitored, PDO::PARAM_STR);
        $stmt->bindParam(':TargetPath', $fileTransfer, PDO::PARAM_STR);
        $stmt->bindParam(':Filename', $_FILES['eiafile']['name'], PDO::PARAM_STR);
        $stmt->bindParam(':ProjectID', $projectid, PDO::PARAM_STR);
        $stmt->bindParam(':UniqID', $uniqid, PDO::PARAM_STR);
        $stmt->execute();

        echo 'success';

    }catch(PDOException $e){

        echo $e->getMessage();
        
    }


?>