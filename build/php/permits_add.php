<?php

    include_once 'dbcon.php';

    $event_type = $_POST['event_type'];

    switch($event_type){
        case 'pco' :
            
            $targetPath = 'uploads/pco/' . $_POST['foreignkey'];
            $filePath = $targetPath . '/' . $_FILES['pcofile']['name'];

            if(!file_exists($targetPath)){
                mkdir($targetPath, 0755, true);
            }
            move_uploaded_file($_FILES['pcofile']['tmp_name'], $filePath);

            try{

                $sql = "INSERT INTO tblpco (
                    ForeignKey,
                    PCOCode,
                    Category,
                    PCOName,
                    ContactNo,
                    IssuanceDate,
                    ExpirationDate,
                    Filename,
                    TargetPath
                    )VALUES(
                    :ForeignKey,
                    :PCOCode,
                    :Category,
                    :PCOName,
                    :ContactNo,
                    :IssuanceDate,
                    :ExpirationDate,
                    :Filename,
                    :TargetPath)";
                $stmt = $db_con->prepare($sql);
                $stmt->bindParam(':ForeignKey', $_POST['foreignkey'], PDO::PARAM_STR);
                $stmt->bindParam(':PCOCode', $_POST['pcocode'], PDO::PARAM_STR);
                $stmt->bindParam(':Category', $_POST['pcocategory'], PDO::PARAM_STR);
                $stmt->bindParam(':PCOName', $_POST['pconame'], PDO::PARAM_STR);
                $stmt->bindParam(':ContactNo', $_POST['pcocontactno'], PDO::PARAM_STR);
                $stmt->bindParam(':IssuanceDate', $_POST['pcoissuedate'], PDO::PARAM_STR);
                $stmt->bindParam(':ExpirationDate', $_POST['pcoexpiredate'], PDO::PARAM_STR);
                $stmt->bindParam(':Filename', $_FILES['pcofile']['name'], PDO::PARAM_STR);
                $stmt->bindParam(':TargetPath', $filePath, PDO::PARAM_STR);
                $stmt->execute();

                echo 'success';

            }catch(PDOException $e){

                echo $e->getMessage();

            }
        break;
        case 'pto' :

            $targetPath = 'uploads/permits/pto/' . $_POST['foreignkey'];
            $filePath = $targetPath . '/' . $_FILES['ptofile']['name'];

            if(!file_exists($targetPath)){
                mkdir($targetPath, 0755, true);
            }
            move_uploaded_file($_FILES['ptofile']['tmp_name'], $filePath);

            try{

                $sql = "INSERT INTO tblpto (
                    ForeignKey,
                    PTOCode,
                    IssuanceDate,
                    ExpirationDate,
                    Filename,
                    TargetPath
                    )VALUES(
                    :ForeignKey,
                    :PTOCode,
                    :IssuanceDate,
                    :ExpirationDate,
                    :Filename,
                    :TargetPath)";
                $stmt = $db_con->prepare($sql);
                $stmt->bindParam(':ForeignKey', $_POST['foreignkey'], PDO::PARAM_STR);
                $stmt->bindParam(':PTOCode', $_POST['ptocode'], PDO::PARAM_STR);
                $stmt->bindParam(':IssuanceDate', $_POST['ptoissuedate'], PDO::PARAM_STR);
                $stmt->bindParam(':ExpirationDate', $_POST['ptoexpiredate'], PDO::PARAM_STR);
                $stmt->bindParam(':Filename', $_FILES['ptofile']['name'], PDO::PARAM_STR);
                $stmt->bindParam(':TargetPath', $filePath, PDO::PARAM_STR);
                $stmt->execute();

                echo 'success';

            }catch(PDOException $e){

                echo $e->getMessage();

            }

        break;
        case 'dp' :

            $targetPath = 'uploads/permits/wwdp/' . $_POST['foreignkey'];
            $filePath = $targetPath . '/' . $_FILES['dpfile']['name'];

            if(!file_exists($targetPath)){
                mkdir($targetPath, 0755, true);
            }
            move_uploaded_file($_FILES['dpfile']['tmp_name'], $filePath);

            try{

                $sql = "INSERT INTO tbldp (
                    ForeignKey,
                    WWDPCode,
                    IssuanceDate,
                    ExpirationDate,
                    Filename,
                    TargetPath
                    )VALUES(
                    :ForeignKey,
                    :WWDPCode,
                    :IssuanceDate,
                    :ExpirationDate,
                    :Filename,
                    :TargetPath)";
                $stmt = $db_con->prepare($sql);
                $stmt->bindParam(':ForeignKey', $_POST['foreignkey'], PDO::PARAM_STR);
                $stmt->bindParam(':WWDPCode', $_POST['dpcode'], PDO::PARAM_STR);
                $stmt->bindParam(':IssuanceDate', $_POST['dpissuedate'], PDO::PARAM_STR);
                $stmt->bindParam(':ExpirationDate', $_POST['dpexpiredate'], PDO::PARAM_STR);
                $stmt->bindParam(':Filename', $_FILES['dpfile']['name'], PDO::PARAM_STR);
                $stmt->bindParam(':TargetPath', $filePath, PDO::PARAM_STR);
                $stmt->execute();

                echo 'success';

            }catch(PDOException $e){

                echo $e->getMessage();

            }


        break;
        case 'tchw' :
            
            try{
                $sql='';
                switch($_POST['permittype']){
                    case 'HWG-ID' :
                        $folder = 'hwgid';
                        $sql = "INSERT INTO tblhwgid (
                            ForeignKey,
                            PermitNumber,
                            IssuanceDate,
                            ExpirationDate,
                            Filename,
                            TargetPath,
                            Type
                            )VALUES(
                            :ForeignKey,
                            :PermitNumber,
                            :IssuanceDate,
                            :ExpirationDate,
                            :Filename,
                            :TargetPath,
                            :Type)";
                        break;
                    case 'PTT' :
                        $folder = 'ptt';
                        $sql = "INSERT INTO tblptt (
                            ForeignKey,
                            PermitNumber,
                            IssuanceDate,
                            ExpirationDate,
                            Filename,
                            TargetPath,
                            Type
                            )VALUES(
                            :ForeignKey,
                            :PermitNumber,
                            :IssuanceDate,
                            :ExpirationDate,
                            :Filename,
                            :TargetPath,
                            :Type)";
                        break;
                    case 'SQI' :
                        $folder = 'sqi';
                        $sql = "INSERT INTO tblsqi (
                            ForeignKey,
                            PermitNumber,
                            IssuanceDate,
                            ExpirationDate,
                            Filename,
                            TargetPath,
                            Type
                            )VALUES(
                            :ForeignKey,
                            :PermitNumber,
                            :IssuanceDate,
                            :ExpirationDate,
                            :Filename,
                            :TargetPath,
                            :Type)";
                        break;
                    case 'CCO-RC' :
                        $folder = 'ccorc';
                        $sql = "INSERT INTO tblccorc (
                            ForeignKey,
                            PermitNumber,
                            IssuanceDate,
                            ExpirationDate,
                            Filename,
                            TargetPath,
                            Type
                            )VALUES(
                            :ForeignKey,
                            :PermitNumber,
                            :IssuanceDate,
                            :ExpirationDate,
                            :Filename,
                            :TargetPath,
                            :Type)";
                        break;
                    case 'CCO-IC' :
                        $folder = 'ccoic';
                        $sql = "INSERT INTO tblccoic (
                            ForeignKey,
                            PermitNumber,
                            IssuanceDate,
                            ExpirationDate,
                            Filename,
                            TargetPath,
                            Type
                            )VALUES(
                            :ForeignKey,
                            :PermitNumber,
                            :IssuanceDate,
                            :ExpirationDate,
                            :Filename,
                            :TargetPath,
                            :Type)";
                        break;
                    case 'TSD' :
                        $folder = 'tsd';
                        $sql = "INSERT INTO tbltsd (
                            ForeignKey,
                            PermitNumber,
                            IssuanceDate,
                            ExpirationDate,
                            Filename,
                            TargetPath,
                            Type
                            )VALUES(
                            :ForeignKey,
                            :PermitNumber,
                            :IssuanceDate,
                            :ExpirationDate,
                            :Filename,
                            :TargetPath,
                            :Type)";
                        break;
                    case 'TRC' :
                        $folder = 'trc';
                        $sql = "INSERT INTO tbltrc (
                            ForeignKey,
                            PermitNumber,
                            IssuanceDate,
                            ExpirationDate,
                            Filename,
                            TargetPath,
                            Type
                            )VALUES(
                            :ForeignKey,
                            :PermitNumber,
                            :IssuanceDate,
                            :ExpirationDate,
                            :Filename,
                            :TargetPath,
                            :Type)";
                        break;
                    case 'ODS' :
                        $folder = 'ods';
                        $sql = "INSERT INTO tblods (
                            ForeignKey,
                            PermitNumber,
                            IssuanceDate,
                            ExpirationDate,
                            Filename,
                            TargetPath,
                            Type
                            )VALUES(
                            :ForeignKey,
                            :PermitNumber,
                            :IssuanceDate,
                            :ExpirationDate,
                            :Filename,
                            :TargetPath,
                            :Type)";
                        break;
                    case 'PCB' :
                        $folder = 'pcb';
                        $sql = "INSERT INTO tblpcb (
                            ForeignKey,
                            PermitNumber,
                            IssuanceDate,
                            ExpirationDate,
                            Filename,
                            TargetPath,
                            Type
                            )VALUES(
                            :ForeignKey,
                            :PermitNumber,
                            :IssuanceDate,
                            :ExpirationDate,
                            :Filename,
                            :TargetPath,
                            :Type)";
                        break;
                }

                $targetPath = 'uploads/permits/' . $folder . '/' . $_POST['foreignkey'];
                $filePath = $targetPath . '/' . $_FILES['tchwfile']['name'];

                if(!file_exists($targetPath)){
                    mkdir($targetPath, 0755, true);
                }
                move_uploaded_file($_FILES['tchwfile']['tmp_name'], $filePath);

                $stmt = $db_con->prepare($sql);
                $stmt->bindParam(':ForeignKey', $_POST['foreignkey'], PDO::PARAM_STR);
                $stmt->bindParam(':PermitNumber', $_POST['permitno'], PDO::PARAM_STR);
                $stmt->bindParam(':IssuanceDate', $_POST['tchwissuedate'], PDO::PARAM_STR);
                $stmt->bindParam(':ExpirationDate', $_POST['tchwexpiredate'], PDO::PARAM_STR);
                $stmt->bindParam(':Filename', $_FILES['tchwfile']['name'], PDO::PARAM_STR);
                $stmt->bindParam(':TargetPath', $filePath, PDO::PARAM_STR);
                $stmt->bindParam(':Type', $_POST['permittype'], PDO::PARAM_STR);
                $stmt->execute();

                echo 'success';  

            }catch(PDOException $e){

                echo $e->getMessage();

            }

        break;
    }

?>