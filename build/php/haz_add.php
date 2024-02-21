<?php

    include_once 'dbcon.php';

    $event_type = $_POST['event_type'];
    $dateMonitored = $_POST['datemonitored'];
    $projectid = $_POST['projectid'];
    $uniqid = uniqid();

    switch($event_type) {
        case 'toxic' :
            try{

                $targetPath = 'uploads/monitoring/toxic/' . $uniqid;
                $fileTransfer = $targetPath . '/' . $_FILES['hazfile']['name'];

                if(!file_exists($targetPath))
                {
                    mkdir($targetPath, 0755, true);
                    //Creates the directory with default user previledges
                }
                copy($_FILES['hazfile']['tmp_name'], $fileTransfer);

                $sql = "INSERT INTO tbltoxic (
                    DateMonitored,
                    TargetPath,
                    Filename,
                    ProjectID,
                    UniqID
                    )VALUES(
                    :DateMonitored,
                    :TargetPath,
                    :Filename,
                    :ProjectID,
                    :UniqID)";
                $stmt = $db_con->prepare($sql);
                $stmt->bindParam(':DateMonitored', $dateMonitored, PDO::PARAM_STR);
                $stmt->bindParam(':TargetPath', $fileTransfer, PDO::PARAM_STR);
                $stmt->bindParam(':Filename', $_FILES['hazfile']['name'], PDO::PARAM_STR);
                $stmt->bindParam(':ProjectID', $projectid, PDO::PARAM_STR);
                $stmt->bindParam(':UniqID', $uniqid, PDO::PARAM_STR);
                $stmt->execute();
        
                echo 'success';
            }catch(PDOException $e){
                echo $e->getMessage();
            }
            break;

        case 'hazwaste' :
            try{

                $targetPath = 'uploads/monitoring/hazwaste/' . $uniqid;
                $fileTransfer = $targetPath . '/' . $_FILES['hazfile']['name'];

                if(!file_exists($targetPath))
                {
                    mkdir($targetPath, 0755, true);
                    //Creates the directory with default user previledges
                }
                copy($_FILES['hazfile']['tmp_name'], $fileTransfer);

                $sql = "INSERT INTO tblhazwaste (
                    DateMonitored,
                    TargetPath,
                    Filename,
                    ProjectID,
                    UniqID
                    )VALUES(
                    :DateMonitored,
                    :TargetPath,
                    :Filename,
                    :ProjectID,
                    :UniqID)";
                $stmt = $db_con->prepare($sql);
                $stmt->bindParam(':DateMonitored', $dateMonitored, PDO::PARAM_STR);
                $stmt->bindParam(':TargetPath', $fileTransfer, PDO::PARAM_STR);
                $stmt->bindParam(':Filename', $_FILES['hazfile']['name'], PDO::PARAM_STR);
                $stmt->bindParam(':ProjectID', $projectid, PDO::PARAM_STR);
                $stmt->bindParam(':UniqID', $uniqid, PDO::PARAM_STR);
                $stmt->execute();
        
                echo 'success';
            }catch(PDOException $e){
                echo $e->getMessage();
            }
            break;
    }


?>