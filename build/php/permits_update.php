<?php

    include_once 'dbcon.php';

    $event_type = $_POST['event_type'];

    $id = $_POST['id'];
    $foreignkey = $_POST['foreignkey'];

    switch($event_type){
        case 'pco' :

            $pcocode = $_POST['pcocode'];
            $category = $_POST['pcocategory'];
            $pconame = $_POST['pconame'];
            $contactno = $_POST['pcocontactno'];
            $issuedate = $_POST['pcoissuedate'];
            $expiredate = $_POST['pcoexpiredate'];

            if(isset($_FILES['pcofile']['size']) == 0 && isset($_FILES['pcofile']['error']) == 0){
                $sql = "UPDATE tblpco SET 
                        PCOCode = :PCOCode,
                        Category = :Category,
                        PCOName = :PCOName,
                        ContactNo = :ContactNo,
                        IssuanceDate = :IssuanceDate,
                        ExpirationDate = :ExpirationDate
                        WHERE ID=:ID";
                $stmt = $db_con->prepare($sql);
                $stmt->bindParam(':PCOCode', $pcocode, PDO::PARAM_STR);
                $stmt->bindParam(':Category', $category, PDO::PARAM_STR);
                $stmt->bindParam(':PCOName', $pconame, PDO::PARAM_STR);
                $stmt->bindParam(':ContactNo', $contactno, PDO::PARAM_STR);
                $stmt->bindParam(':IssuanceDate', $issuedate, PDO::PARAM_STR);
                $stmt->bindParam(':ExpirationDate', $expiredate, PDO::PARAM_STR);
                $stmt->bindParam(':ID', $id, PDO::PARAM_STR);
                $stmt->execute();
                echo 'success';
                exit();

            }else{

                $sql = "SELECT * FROM tblpco WHERE ID=:ID";
                $stmt = $db_con->prepare($sql);
                $stmt->bindParam(':ID', $id, PDO::PARAM_STR);
                $result = $stmt->fetch(PDO::FETCH_ASSOC);

                $folder = $foreignkey;
                $fullPath = 'uploads/pco/' . $foreignkey;
                $targetPath = $fullPath . '/' . $_FILES['pcofile']['name'];

                if(file_exists($fullPath)) {
                    unlink($fullPath . '/' . $result['Filename']);
                }

                if(!file_exists($fullPath))
                {
                    mkdir($fullPath, 0755, true);
                    //Creates the directory with default user previledges
                }
                move_uploaded_file($_FILES['pcofile']['tmp_name'], $targetPath);

                $sql = "UPDATE tblpco SET 
                        PCOCode = :PCOCode,
                        Category = :Category,
                        PCOName = :PCOName,
                        ContactNo = :ContactNo,
                        IssuanceDate = :IssuanceDate,
                        ExpirationDate = :ExpirationDate,
                        Filename = :Filename,
                        Targetpath = :TargetPath
                        WHERE ID=:ID";
                $stmt = $db_con->prepare($sql);
                $stmt->bindParam(':PCOCode', $pcocode, PDO::PARAM_STR);
                $stmt->bindParam(':Category', $category, PDO::PARAM_STR);
                $stmt->bindParam(':PCOName', $pconame, PDO::PARAM_STR);
                $stmt->bindParam(':ContactNo', $contactno, PDO::PARAM_STR);
                $stmt->bindParam(':IssuanceDate', $issuedate, PDO::PARAM_STR);
                $stmt->bindParam(':ExpirationDate', $expiredate, PDO::PARAM_STR);
                $stmt->bindParam(':Filename', $_FILES['pcofile']['name'], PDO::PARAM_STR);
                $stmt->bindParam(':TargetPath', $targetPath, PDO::PARAM_STR);
                $stmt->bindParam(':ID', $id, PDO::PARAM_STR);
                $stmt->execute();
                echo 'success';
                exit();

            }

        break;
        case 'pto' :

            $ptocode = $_POST['ptocode'];
            $issuedate = $_POST['ptoissuedate'];
            $expiredate = $_POST['ptoexpiredate'];

            if(isset($_FILES['ptofile']['size']) == 0 && isset($_FILES['ptofile']['error']) == 0){
                $sql = "UPDATE tblpto SET 
                        PTOCode = :PTOCode,
                        IssuanceDate = :IssuanceDate,
                        ExpirationDate = :ExpirationDate
                        WHERE ID=:ID";
                $stmt = $db_con->prepare($sql);
                $stmt->bindParam(':PTOCode', $ptocode, PDO::PARAM_STR);
                $stmt->bindParam(':IssuanceDate', $issuedate, PDO::PARAM_STR);
                $stmt->bindParam(':ExpirationDate', $expiredate, PDO::PARAM_STR);
                $stmt->bindParam(':ID', $id, PDO::PARAM_STR);
                $stmt->execute();
                echo 'success';
                exit();

            }else{

                $sql = "SELECT * FROM tblpto WHERE ID=:ID";
                $stmt = $db_con->prepare($sql);
                $stmt->bindParam(':ID', $id, PDO::PARAM_STR);
                $result = $stmt->fetch(PDO::FETCH_ASSOC);

                $folder = $foreignkey;
                $fullPath = 'uploads/permits/pto/' . $foreignkey;
                $targetPath = $fullPath . '/' . $_FILES['ptofile']['name'];

                if(file_exists($fullPath)) {
                    unlink($fullPath . '/' . $result['Filename']);
                }

                if(!file_exists($fullPath))
                {
                    mkdir($fullPath, 0755, true);
                    //Creates the directory with default user previledges
                }
                move_uploaded_file($_FILES['ptofile']['tmp_name'], $targetPath);

                $sql = "UPDATE tblpto SET 
                        PTOCode = :PTOCode,
                        IssuanceDate = :IssuanceDate,
                        ExpirationDate = :ExpirationDate,
                        Filename = :Filename,
                        Targetpath = :TargetPath
                        WHERE ID=:ID";
                $stmt = $db_con->prepare($sql);
                $stmt->bindParam(':PTOCode', $pcocode, PDO::PARAM_STR);
                $stmt->bindParam(':IssuanceDate', $issuedate, PDO::PARAM_STR);
                $stmt->bindParam(':ExpirationDate', $expiredate, PDO::PARAM_STR);
                $stmt->bindParam(':Filename', $_FILES['ptofile']['name'], PDO::PARAM_STR);
                $stmt->bindParam(':TargetPath', $targetPath, PDO::PARAM_STR);
                $stmt->bindParam(':ID', $id, PDO::PARAM_STR);
                $stmt->execute();
                echo 'success';
                exit();

            }            

        break;
        case 'dp' :

            $dpcode = $_POST['dpcode'];
            $issuedate = $_POST['dpissuedate'];
            $expiredate = $_POST['dpexpiredate'];

            if(isset($_FILES['dpfile']['size']) == 0 && isset($_FILES['dpfile']['error']) == 0){
                $sql = "UPDATE tbldp SET 
                        WWDPCode = :WWDPCode,
                        IssuanceDate = :IssuanceDate,
                        ExpirationDate = :ExpirationDate
                        WHERE ID=:ID";
                $stmt = $db_con->prepare($sql);
                $stmt->bindParam(':WWDPCode', $dpcode, PDO::PARAM_STR);
                $stmt->bindParam(':IssuanceDate', $issuedate, PDO::PARAM_STR);
                $stmt->bindParam(':ExpirationDate', $expiredate, PDO::PARAM_STR);
                $stmt->bindParam(':ID', $id, PDO::PARAM_STR);
                $stmt->execute();
                echo 'success';
                exit();

            }else{

                $sql = "SELECT * FROM tbldp WHERE ID=:ID";
                $stmt = $db_con->prepare($sql);
                $stmt->bindParam(':ID', $id, PDO::PARAM_STR);
                $result = $stmt->fetch(PDO::FETCH_ASSOC);

                $folder = $foreignkey;
                $fullPath = 'uploads/permits/dp/' . $foreignkey;
                $targetPath = $fullPath . '/' . $_FILES['dpfile']['name'];

                if(file_exists($fullPath)) {
                    unlink($fullPath . '/' . $result['Filename']);
                }

                if(!file_exists($fullPath))
                {
                    mkdir($fullPath, 0755, true);
                    //Creates the directory with default user previledges
                }
                move_uploaded_file($_FILES['dpfile']['tmp_name'], $targetPath);

                $sql = "UPDATE tbldp SET 
                        WWDPCode = :WWDPCode,
                        IssuanceDate = :IssuanceDate,
                        ExpirationDate = :ExpirationDate,
                        Filename = :Filename,
                        Targetpath = :TargetPath
                        WHERE ID=:ID";
                $stmt = $db_con->prepare($sql);
                $stmt->bindParam(':WWDPCode', $dpcode, PDO::PARAM_STR);
                $stmt->bindParam(':IssuanceDate', $issuedate, PDO::PARAM_STR);
                $stmt->bindParam(':ExpirationDate', $expiredate, PDO::PARAM_STR);
                $stmt->bindParam(':Filename', $_FILES['dpcode']['name'], PDO::PARAM_STR);
                $stmt->bindParam(':TargetPath', $targetPath, PDO::PARAM_STR);
                $stmt->bindParam(':ID', $id, PDO::PARAM_STR);
                $stmt->execute();
                echo 'success';
                exit();

            }            

        break;
        case 'tchw' :

            $permittype = $_POST['permittype'];
            $permitno = $_POST['permitno'];
            $issuedate = $_POST['tchwissuedate'];
            $expiredate = $_POST['tchwexpiredate'];
            switch($permittype){
                case 'HWG-ID' :
                    $tblname = "tblhwgid";
                    $folder = 'hwgid';
                break;
                case 'PTT' :
                    $tblname = "tblptt";
                    $folder = 'ptt';
                break;
                case 'SQI' :
                    $tblname = "tblsqi";
                    $folder = 'sqi';
                break;
                case 'CCO-RC' :
                    $tblname = "tblccorc";
                    $folder = 'ccorc';
                break;
                case 'CCO-IC' :
                    $tblname = "tblccoic";
                    $folder = 'ccoic';
                break;
                case 'TSD' :
                    $tblname = "tbltsd";
                    $folder = 'tsd';
                break;
                case 'TRC' :
                    $tblname = "tbltrc";
                    $folder = 'trc';
                break;
                case 'ODS' :
                    $tblname = "tblods";
                    $folder = 'ods';
                break;
                case 'PCB' :
                    $tblname = "tblpcb";
                    $folder = 'pcb';
                break;
            }

            if(isset($_FILES['tchwfile']['size']) == 0 && isset($_FILES['tchwfile']['error']) == 0){
                $sql = "UPDATE $tblname SET 
                        PermitNumber = :PermitNumber,
                        IssuanceDate = :IssuanceDate,
                        ExpirationDate = :ExpirationDate
                        WHERE ID=:ID";
                $stmt = $db_con->prepare($sql);
                $stmt->bindParam(':PermitNumber', $permitno, PDO::PARAM_STR);
                $stmt->bindParam(':IssuanceDate', $issuedate, PDO::PARAM_STR);
                $stmt->bindParam(':ExpirationDate', $expiredate, PDO::PARAM_STR);
                $stmt->bindParam(':ID', $id, PDO::PARAM_STR);
                $stmt->execute();
                echo 'success';
                exit();

            }else{

                $sql = "SELECT * FROM $tblname WHERE ID=:ID";
                $stmt = $db_con->prepare($sql);
                $stmt->bindParam(':ID', $id, PDO::PARAM_STR);
                $result = $stmt->fetch(PDO::FETCH_ASSOC);

                $folder = $foreignkey;
                $fullPath = 'uploads/permits/' . $folder . '/' . $foreignkey;
                $targetPath = $fullPath . '/' . $_FILES['tchwfile']['name'];

                if(file_exists($fullPath)) {
                    unlink($fullPath . '/' . $result['Filename']);
                }

                if(!file_exists($fullPath))
                {
                    mkdir($fullPath, 0755, true);
                    //Creates the directory with default user previledges
                }
                move_uploaded_file($_FILES['tchwfile']['tmp_name'], $targetPath);

                $sql = "UPDATE $tblname SET 
                        PermitNumber = :PermitNumber,
                        IssuanceDate = :IssuanceDate,
                        ExpirationDate = :ExpirationDate,
                        Filename = :Filename,
                        Targetpath = :TargetPath
                        WHERE ID=:ID";
                $stmt = $db_con->prepare($sql);
                $stmt->bindParam(':PermitNumber', $permitno, PDO::PARAM_STR);
                $stmt->bindParam(':IssuanceDate', $issuedate, PDO::PARAM_STR);
                $stmt->bindParam(':ExpirationDate', $expiredate, PDO::PARAM_STR);
                $stmt->bindParam(':Filename', $_FILES['tchwfile']['name'], PDO::PARAM_STR);
                $stmt->bindParam(':TargetPath', $targetPath, PDO::PARAM_STR);
                $stmt->bindParam(':ID', $id, PDO::PARAM_STR);
                $stmt->execute();
                echo 'success';
                exit();

            }            

        break;
    }

?>