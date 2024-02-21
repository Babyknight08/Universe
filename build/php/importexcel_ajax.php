<?php

    session_start();
    require_once ( dirname(__FILE__) . '/dbconn.php');
    require_once ( dirname(__FILE__) . '/public_functions.php');
    require_once ( '../vendor/autoload.php');
    require_once ( dirname(__FILE__) . '/dologin.php');
   // require_once ( '../vendor/SpreadsheetReader.php');
   
   date_default_timezone_set('Asia/Manila');
   $login = new USER();

   if ($login->is_loggedin()!=NULL)
   {
       $ActionTaker = $_SESSION['fullname'];
       $DateActed = date('Y/m/d');
       $TimeActed = date('h:i:s');
       $FormName = "Import Excel Data";
       $ActionDesc = "Performed Bulk Upload";
   }   

   use PhpOffice\PhpSpreadsheet\Spreadsheet;
   use PhpOffice\PhpSpreadsheet\Reader\Xlsx; 

    $success = "success";
    $allowedFileType = ['application/vnd.ms-excel','text/xls','text/xlsx','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];
  
  //if(in_array($_FILES["ImportedExcel"]["type"][0],$allowedFileType)){

        $targetPath = 'uploads/'.$_FILES['ImportedExcel']['name'][0];
        move_uploaded_file($_FILES['ImportedExcel']['tmp_name'][0], $targetPath);
        
        //$targetPath = 'uploads/Book1.xlsx';

        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        if ($reader) 
        {
            $reader->setReadDataOnly(true);
            $spreadsheet = $reader->load($targetPath);
            $sheetdata = $spreadsheet->getActiveSheet()->toArray();

            foreach ($sheetdata as $row)
            {

                $FirmName = isset($row[0]) ? $row[0] : "";
                $IndustryType = isset($row[1]) ? $row[1] : "";
                $Address = isset($row[2]) ? $row[2] : "";
                $City = isset($row[3]) ? $row[3] : "";
                $Province = isset($row[4]) ? $row[4] : "";
                $Latitude = isset($row[5]) ? $row[5] : "";
                $Longitude = isset($row[6]) ? $row[6] : "";
                $CellphoneNo = isset($row[7]) ? $row[7] : "";
                $TelephoneNo = isset($row[8]) ? $row[8] : "";
                $EmailAd = isset($row[9]) ? $row[9] : "";
                $PCO = isset($row[10]) ? $row[10] : "";
                $Operator = isset($row[11]) ? $row[11] : "";
                $PCONo = isset($row[12]) ? $row[12] : "";
                $Status = isset($row[13]) ? $row[13] : "";

                //Generate a FileName by getting the initials of the Firm Name
                $filedirectory = getFirmInitials($FirmName);
                //Append a 6 digit random generated number to the getFirmInitials result
                $filedirectory .= strval(random_int(100000, 999999));
                
                $oldmask = umask(000);
                mkdir('../cc_files/'.$filedirectory.'/Permits', 0777, true); //Create the directory for permits
                mkdir('../cc_files/'.$filedirectory.'/Surveys', 0777, true); //Create the directory for surveys
                mkdir('../cc_files/'.$filedirectory.'/Monitoring', 0777, true); //Create the directory for monitoring
                mkdir('../cc_files/'.$filedirectory.'/Communications', 0777, true); //Create the directory for communications
                umask($oldmask);

                $sqladd = "INSERT INTO tblfirms (
                    FirmName,
                    IndustryType,
                    Address,
                    City,
                    Province,
                    Latitude,
                    Longitude,
                    CellphoneNo,
                    TelephoneNo,
                    EmailAd,
                    PCO,
                    Operator,
                    PCONo,
                    FileDirectory,
                    Status)
                    VALUES
                    (:FirmName,
                    :IndustryType,
                    :Address,
                    :City,
                    :Province,
                    :Latitude,
                    :Longitude,
                    :CellphoneNo,
                    :TelephoneNo,
                    :EmailAd,
                    :PCO,
                    :Operator,
                    :PCONo,
                    :FileDirectory,
                    :Status)";

                $stmt = $db_con->prepare($sqladd);

                $stmt->bindParam(':FirmName', $FirmName, PDO::PARAM_STR);  
                $stmt->bindParam(':IndustryType', $IndustryType, PDO::PARAM_STR);
                $stmt->bindParam(':Address', $Address, PDO::PARAM_STR);
                $stmt->bindParam(':City', $City, PDO::PARAM_STR);
                $stmt->bindParam(':Province', $Province, PDO::PARAM_STR);
                $stmt->bindParam(':Latitude', $Latitude, PDO::PARAM_STR);
                $stmt->bindParam(':Longitude', $Longitude, PDO::PARAM_STR);
                $stmt->bindParam(':CellphoneNo', $CellphoneNo, PDO::PARAM_STR);
                $stmt->bindParam(':TelephoneNo', $TelephoneNo, PDO::PARAM_STR);
                $stmt->bindParam(':EmailAd', $EmailAd, PDO::PARAM_STR);
                $stmt->bindParam(':PCO', $PCO, PDO::PARAM_STR);
                $stmt->bindParam(':Operator', $Operator, PDO::PARAM_STR);
                $stmt->bindParam(':PCONo', $PCONo, PDO::PARAM_STR);
                $stmt->bindparam(':FileDirectory', $filedirectory, PDO::PARAM_STR);
                $stmt->bindParam(':Status', $Status, PDO::PARAM_STR);

                $stmt->execute();

            }

            //insert log
            $sqllog = "INSERT INTO tbllog(
                        ActionDate,
                        ActionTime,
                        ActionTaker,
                        Action,
                        ActionDescription
                        )VALUES(
                        :ActionDate,
                        :ActionTime,
                        :ActionTaker,
                        :Action,
                        :ActionDescription)";

            $stmt = $db_con->prepare($sqllog);

            $stmt->bindParam(':ActionDate', $DateActed, PDO::PARAM_STR);
            $stmt->bindParam(':ActionTime', $TimeActed, PDO::PARAM_STR);
            $stmt->bindParam(':ActionTaker', $ActionTaker, PDO::PARAM_STR);
            $stmt->bindParam(':Action', $FormName, PDO::PARAM_STR);
            $stmt->bindParam(':ActionDescription', $ActionDesc, PDO::PARAM_STR);

            $stmt->execute();

            echo json_encode($success);
        }

?>