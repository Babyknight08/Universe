<?php

    include_once 'dbcon.php';

    $event_type = $_POST['event_type'];
    $dateMonitored = $_POST['datemonitored'];
    $projectid = $_POST['projectid'];
    $uniqid = uniqid();

    switch($event_type) {
        case 'air' :
            try{

                $targetPath = 'uploads/monitoring/air/' . $uniqid;
                $fileTransfer = $targetPath . '/' . $_FILES['awsfile']['name'];

                if(!file_exists($targetPath))
                {
                    mkdir($targetPath, 0755, true);
                    //Creates the directory with default user previledges
                }
                copy($_FILES['awsfile']['tmp_name'], $fileTransfer);

                $sql = "INSERT INTO tblair (
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
                $stmt->bindParam(':Filename', $_FILES['awsfile']['name'], PDO::PARAM_STR);
                $stmt->bindParam(':ProjectID', $projectid, PDO::PARAM_STR);
                $stmt->bindParam(':UniqID', $uniqid, PDO::PARAM_STR);
                $stmt->execute();
        
                echo 'success';
            }catch(PDOException $e){
                echo $e->getMessage();
            }
            break;

        case 'water' :
            try{

                $targetPath = 'uploads/monitoring/water/' . $uniqid;
                $fileTransfer = $targetPath . '/' . $_FILES['awsfile']['name'];

                if(!file_exists($targetPath))
                {
                    mkdir($targetPath, 0755, true);
                    //Creates the directory with default user previledges
                }
                copy($_FILES['awsfile']['tmp_name'], $fileTransfer);

                $sql = "INSERT INTO tblwater (
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
                $stmt->bindParam(':Filename', $_FILES['awsfile']['name'], PDO::PARAM_STR);
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