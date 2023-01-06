<?php

    include_once 'dbcon.php';

    $counter = 0;
    $notice = $_POST['notice'];
    $issuancedate = $_POST['issuancedate'];
    $eiacheck = $_POST['eiacheck'];
    $watercheck = $_POST['watercheck'];
    $aircheck = $_POST['aircheck'];
    $toxiccheck = $_POST['toxiccheck'];
    $eiacommit = $_POST['eiacommit'];
    $eiacomply = $_POST['eiacomply'];
    $watercommit = $_POST['watercommit'];
    $watercomply = $_POST['watercomply'];
    $aircommit = $_POST['aircommit'];
    $aircomply = $_POST['aircomply'];
    $toxiccommit = $_POST['toxiccommit'];
    $toxiccomply = $_POST['toxiccomply'];
    $projectid = $_POST['projectid'];

    $folders = array(
        1 => 'eia',
        2 => 'water',
        3 => 'air',
        4 => 'toxic'
    );

    $laws = array(
        1 => 'PD1586',
        2 => 'RA9275',
        3 => 'RA8749',
        4 => 'RA6969'
    );

    $checker = array(
        1 => $eiacheck,
        2 => $watercheck,
        3 => $aircheck,
        4 => $toxiccheck
    );

    $commitments = array(
        1 => $eiacommit,
        2 => $watercommit,
        3 => $aircommit,
        4 => $toxiccommit
    );

    $compliance = array(
        1 => $eiacomply,
        2 => $watercomply,
        3 => $aircomply,
        4 => $toxiccomply
    );

    $uniqid = uniqid();

    for($i=1;$i<=4;$i++) {
        if($checker[$i] == 'true') {

            $specificPath = 'uploads/' . $folders[$i] . '/' . $uniqid;
            if(!file_exists($specificPath))
            {
                mkdir($specificPath, 0755, true);
                //Creates the directory with default user previledges
            }
            $targetPath = $specificPath . '/' . $_FILES['noticefile']['name'];
            copy($_FILES['noticefile']['tmp_name'], $targetPath);

            $versus = intval($commitments[$i]) - intval($compliance[$i]);
            
            if($versus > 0){
                $status = 'Non-compliant';
            }else{
                $status = 'Compliant';
            }

            $sql = "INSERT INTO tblnotice (
                    ProjectID,
                    Notice,
                    IssuanceDate,
                    Filename,
                    TargetPath,
                    Law,
                    Commitment,
                    Compliance,
                    Status,
                    UniqID
                    )VALUES(
                    :ProjectID,
                    :Notice,
                    :IssuanceDate,
                    :Filename,
                    :TargetPath,
                    :Law,
                    :Commitment,
                    :Compliance,
                    :Status,
                    :UniqID)";
            $stmt = $db_con->prepare($sql);
            $stmt->bindParam(':ProjectID', $projectid, PDO::PARAM_STR);
            $stmt->bindParam(':Notice', $notice, PDO::PARAM_STR);
            $stmt->bindParam(':IssuanceDate', $issuancedate, PDO::PARAM_STR);
            $stmt->bindParam(':Filename', $_FILES['noticefile']['name'], PDO::PARAM_STR);
            $stmt->bindParam(':TargetPath', $targetPath, PDO::PARAM_STR);
            $stmt->bindParam(':Law', $laws[$i], PDO::PARAM_STR);
            $stmt->bindParam(':Commitment', $commitments[$i], PDO::PARAM_STR);
            $stmt->bindParam(':Compliance', $compliance[$i], PDO::PARAM_STR);
            $stmt->bindParam(':Status', $status, PDO::PARAM_STR);
            $stmt->bindParam(':UniqID', $uniqid, PDO::PARAM_STR);
            $stmt->execute();
            
        }
    }

    echo 'success';


?>