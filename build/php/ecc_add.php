<?php

    include_once 'dbcon.php';

    $dateMonitored = $_POST['datemonitored'];
    $eccremarks = $_POST['eccremarks'];
    $projectid = $_POST['projectid'];
    $uniqid = uniqid();
    $targetPath = 'uploads/ecc/' . $uniqid;
    $fileTransfer = $targetPath . '/' . $_FILES['eccfile']['name'];

    if(!file_exists($targetPath))
    {
        mkdir($targetPath, 0755, true);
        //Creates the directory with default user previledges
    }
    copy($_FILES['eccfile']['tmp_name'], $fileTransfer);

    try{

        $sql = "INSERT INTO tblecc (
            DateMonitored,
            Remarks,
            TargetPath,
            Filename,
            ProjectID,
            UniqID
            )VALUES(
            :DateMonitored,
            :Remarks,
            :TargetPath,
            :Filename,
            :ProjectID,
            :UniqID)";
        $stmt = $db_con->prepare($sql);
        $stmt->bindParam(':DateMonitored', $dateMonitored, PDO::PARAM_STR);
        $stmt->bindParam(':Remarks', $eccremarks, PDO::PARAM_STR);
        $stmt->bindParam(':TargetPath', $fileTransfer, PDO::PARAM_STR);
        $stmt->bindParam(':Filename', $_FILES['eccfile']['name'], PDO::PARAM_STR);
        $stmt->bindParam(':ProjectID', $projectid, PDO::PARAM_STR);
        $stmt->bindParam(':UniqID', $uniqid, PDO::PARAM_STR);
        $stmt->execute();

        echo 'success';

    }catch(PDOException $e){

        echo $e->getMessage();
        
    }


?>