<?php

    session_start();
    include_once 'dbcon.php';
    include_once 'vendor/autoload.php';
    include_once 'arrays.php';

    use PHPOffice\PhpSpreadsheet\Spreadsheet;
    use PHPOffice\PhpSpreadsheet\Reader\Xlsx;

    set_time_limit(500);
    ini_set('memory_limit', '8192M'); 

    $status_array = array(
        '0' => 'Non-Applicable',
        '1' => 'Operational',
        '2' => 'Non-Operational',
        '3' => 'Relieved',
        '4' => 'Cancelled'
    );

    $importedRows = 0;

    $targetFile = 'uploads/' . $_FILES['fileAjax']['name'];
    move_uploaded_file($_FILES['fileAjax']['tmp_name'], $targetFile);

    //ob_start();     //JUST TO CLEAN STUFF LOL

    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
    if($reader) {
        $reader->setReadDataOnly(true);
        $spreadsheet = $reader->load($targetFile);
        $worksheet = $spreadsheet->getActiveSheet()->toArray();

        foreach($worksheet as $column){
            $importedRows += 1;
            //BASIC INFORMATION
            $refno = isset($column[0]) ? $column[0] : "";
            if(is_null($column[1])){
                $peiss = "NONE"; //'Non-Coverage';
            }else{
                $peiss = $column[1];
            }
            if(is_null($column[2])) {
                $dateapproved = '';
            }else{
                //$dateapproved = date_create($column[2]);
            $dateapproved = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($column[2]);
            $dateapproved = date_format($dateapproved, 'Y-m-d');
            }
            $region = isset($column[4]) ? $column[4] : "";
            if(is_null($column[5])){
                $psiccode = '';
            }else{
                $psiccode = $column[5];
            }
            $projectname = isset($column[6]) ? $column[6] : "";
            $proponent = isset($column[7]) ? $column[7] : "";
            $projecttype = array_search($column[8], $project_type_s);
            $projectsubtype = array_search($column[9], $project_subtype_s);
            $projectspecifictype = array_search($column[10], $project_specific_type_s);
            $projectspecificsubtype = array_search($column[11], $project_specific_subtype_s);
            $address = isset($column[12]) ? $column[12] : "";
            $municipality = isset($column[13]) ? $column[13] : "";
            $province = isset($column[14]) ? $column[14] : "";
            $latitude = isset($column[15]) ? $column[15] : "";
            $longitude = isset($column[16]) ? $column[16] : "";
            $foreignkey = md5(uniqid());
            if(is_null($column[20]) || $column[20]=='0'){
                $ra8749 = 'false';
            }else{
                $ra8749 = 'true';
            }
            if(is_null($column[26]) || $column[26]=='0'){
                $ra9275 = 'false';
            }else{
                $ra9275 = 'true';
            }
            if(is_null($column[32]) || $column[32]=='0'){
                $ra6969 = 'false';
            }else{
                $ra6969 = 'true';
            }    
            if(is_null($column[45])){
                $eccstatus = 'Operational';
            }else{
                $eccstatus = $column[45];
            }
            $eccstatus = array_search($eccstatus, $status_array);
            //BASIC INFORMATION
            //INSERT BASIC INFO TO tblprojects
            $sql = "INSERT INTO tblprojects (
                    PEISS,
                    ReferenceNo,
                    ECCStatus,
                    DateApproved,
                    Region,
                    PSICCode,
                    ProjectName,
                    Proponent,
                    ProjectType,
                    ProjectSubtype,
                    ProjectSpecificType,
                    ProjectSpecificSubtype,
                    SpecificAddress,
                    Municipality,
                    Province,
                    Latitude,
                    Longitude,
                    RA8749,
                    RA9275,
                    RA6969,
                    ForeignKey
                    )VALUES(
                    :PEISS,
                    :ReferenceNo,
                    :ECCStatus,
                    :DateApproved,
                    :Region,
                    :PSICCode,
                    :ProjectName,
                    :Proponent,
                    :ProjectType,
                    :ProjectSubtype,
                    :ProjectSpecificType,
                    :ProjectSpecificSubtype,
                    :SpecificAddress,
                    :Municipality,
                    :Province,
                    :Latitude,
                    :Longitude,
                    :RA8749,
                    :RA9275,
                    :RA6969,
                    :ForeignKey)";
            $stmt = $db_con->prepare($sql);
            $stmt->bindParam(':PEISS', $peiss, PDO::PARAM_STR);
            $stmt->bindParam(':ReferenceNo', $refno, PDO::PARAM_STR);
            $stmt->bindParam(':ECCStatus', $eccstatus, PDO::PARAM_STR);
            $stmt->bindParam(':DateApproved', $dateapproved, PDO::PARAM_STR);
            $stmt->bindParam(':Region', $region, PDO::PARAM_STR);
            $stmt->bindParam(':PSICCode', $psiccode, PDO::PARAM_STR);
            $stmt->bindParam(':ProjectName', $projectname, PDO::PARAM_STR);
            $stmt->bindParam(':Proponent', $proponent, PDO::PARAM_STR);
            $stmt->bindParam(':ProjectType', $projecttype, PDO::PARAM_STR);
            $stmt->bindParam(':ProjectSubtype', $projectsubtype, PDO::PARAM_STR);
            $stmt->bindParam(':ProjectSpecificType', $projectspecifictype, PDO::PARAM_STR);
            $stmt->bindParam(':ProjectSpecificSubtype', $projectspecificsubtype, PDO::PARAM_STR);
            $stmt->bindParam(':SpecificAddress', $address, PDO::PARAM_STR);
            $stmt->bindParam(':Municipality', $municipality, PDO::PARAM_STR);
            $stmt->bindParam(':Province', $province, PDO::PARAM_STR);
            $stmt->bindParam(':Latitude', $latitude, PDO::PARAM_STR);
            $stmt->bindParam(':Longitude', $longitude, PDO::PARAM_STR);
            $stmt->bindParam(':RA8749', $ra8749, PDO::PARAM_STR);
            $stmt->bindParam(':RA9275', $ra9275, PDO::PARAM_STR);
            $stmt->bindParam(':RA6969', $ra6969, PDO::PARAM_STR);
            $stmt->bindParam(':ForeignKey', $foreignkey, PDO::PARAM_STR);
            $stmt->execute();
            //INSERT BASIC INFO TO tblprojects
            //FETCH LAST ENTRY TO DATABASE
            $sql = "SELECT * FROM tblprojects ORDER BY ID DESC LIMIT 1";
            $stmt = $db_con->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $projectid = $result['ID'];
            $uniqid = uniqid();
            //FETCH LAST ENTRY TO DATABASE
            //INSERT INTO tbleia
            if($column[18] != null) {
                $datemonitored = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($column[18]);
                $datemonitored = date_format($datemonitored, 'Y-m-d');
                $sql = "INSERT INTO tbleia (
                        DateMonitored,
                        ProjectID,
                        UniqID
                        )VALUES(
                        :DateMonitored,
                        :ProjectID,
                        :UniqID)";
                $stmt = $db_con->prepare($sql);
                $stmt->bindParam(':DateMonitored', $datemonitored, PDO::PARAM_STR);
                $stmt->bindParam(':ProjectID', $projectid, PDO::PARAM_STR);
                $stmt->bindParam(':UniqID', $uniqid, PDO::PARAM_STR);
                $stmt->execute();
            }
            //INSERT INTO tbleia
            //INSERT INTO tblair
            if($column[24] != null){
                $datemonitored = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($column[24]);
                $datemonitored = date_format($datemonitored, 'Y-m-d');
                $sql = "INSERT INTO tblair (
                        DateMonitored,
                        ProjectID,
                        UniqID
                        )VALUES(
                        :DateMonitored,
                        :ProjectID,
                        :UniqID)";
                $stmt = $db_con->prepare($sql);
                $stmt->bindParam(':DateMonitored', $datemonitored, PDO::PARAM_STR);
                $stmt->bindParam(':ProjectID', $projectid, PDO::PARAM_STR);
                $stmt->bindParam(':UniqID', $uniqid, PDO::PARAM_STR);
                $stmt->execute();
            }
            //INSERT INTO tblair
            //INSERT INTO tblwater
            if($column[30] != null){
                $datemonitored = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($column[30]);
                $datemonitored = date_format($datemonitored, 'Y-m-d');
                $sql = "INSERT INTO tblwater (
                        DateMonitored,
                        ProjectID,
                        UniqID
                        )VALUES(
                        :DateMonitored,
                        :ProjectID,
                        :UniqID)";
                $stmt = $db_con->prepare($sql);
                $stmt->bindParam(':DateMonitored', $datemonitored, PDO::PARAM_STR);
                $stmt->bindParam(':ProjectID', $projectid, PDO::PARAM_STR);
                $stmt->bindParam(':UniqID', $uniqid, PDO::PARAM_STR);
                $stmt->execute();
            }
            //INSERT INTO tblwater
            //INSERT INTO tblhazwaste
            if($column[35] != null){
                $datemonitored = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($column[35]);
                $datemonitored = date_format($datemonitored, 'Y-m-d');
                $sql = "INSERT INTO tblhazwaste (
                        DateMonitored,
                        ProjectID,
                        UniqID
                        )VALUES(
                        :DateMonitored,
                        :ProjectID,
                        :UniqID)";
                $stmt = $db_con->prepare($sql);
                $stmt->bindParam(':DateMonitored', $datemonitored, PDO::PARAM_STR);
                $stmt->bindParam(':ProjectID', $projectid, PDO::PARAM_STR);
                $stmt->bindParam(':UniqID', $uniqid, PDO::PARAM_STR);
                $stmt->execute();
            }
            //INSERT INTO tblhazwaste
            //INSERT INTO tblpco
            if($column[53] != null){
                $issuanceDate = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($column[56]);
                $issuanceDate = date_format($issuanceDate, 'Y-m-d');
                $expirationDate = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($column[57]);
                $expirationDate = date_format($expirationDate, 'Y-m-d');
                if(is_null($column[58])) {
                    $contactNo = ' ';
                }else{
                    $contactNo = $column[58];
                }
                if(is_null($column[55])) {
                    $pconame = ' ';
                }else{
                    $pconame = $column[55];
                }
                if(is_null($column[54])) {
                    $category = ' ';
                }else{
                    $category = $column[54];
                }
                $sql = "INSERT INTO tblpco (
                    PCOCode,
                    Category,
                    PCOName,
                    ContactNo,
                    IssuanceDate,
                    ExpirationDate,
                    ForeignKey
                    )VALUES(
                    :PCOCode,
                    :Category,
                    :PCOName,
                    :ContactNo,
                    :IssuanceDate,
                    :ExpirationDate,
                    :ForeignKey)";
                $stmt = $db_con->prepare($sql);
                $stmt->bindParam(':PCOCode', $column[53], PDO::PARAM_STR);
                $stmt->bindParam(':Category', $category, PDO::PARAM_STR);
                $stmt->bindParam(':PCOName', $pconame, PDO::PARAM_STR);
                $stmt->bindParam(':ContactNo', $contactNo, PDO::PARAM_STR);
                $stmt->bindParam(':IssuanceDate', $issuanceDate, PDO::PARAM_STR);
                $stmt->bindParam(':ExpirationDate', $expirationDate, PDO::PARAM_STR);
                $stmt->bindParam(':ForeignKey', $foreignkey, PDO::PARAM_STR);
                $stmt->execute();
            }
            //INSERT INTO tblpco
            //INSERT INTO tblpto
            if($column[21] != null){
                $issuanceDate = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($column[22]);
                $issuanceDate = date_format($issuanceDate, 'Y-m-d');
                $expirationDate = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($column[23]);
                $expirationDate = date_format($expirationDate, 'Y-m-d');
                $sql = "INSERT INTO tblpto (
                        ForeignKey,
                        PTOCode,
                        IssuanceDate,
                        ExpirationDate
                        ) VALUES (
                        :ForeignKey,
                        :PTOCode,
                        :IssuanceDate,
                        :ExpirationDate)";
                $stmt = $db_con->prepare($sql);
                $stmt->bindParam(':ForeignKey', $foreignkey, PDO::PARAM_STR);
                $stmt->bindParam(':PTOCode', $column[21], PDO::PARAM_STR);
                $stmt->bindParam(':IssuanceDate', $issuanceDate, PDO::PARAM_STR);
                $stmt->bindParam(':ExpirationDate', $expirationDate, PDO::PARAM_STR);
                $stmt->execute();
            }
            //INSERT INTO tblpto
            //INSERT INTO tbldp
            if($column[27] != null) {
                $issuanceDate = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($column[28]);
                $issuanceDate = date_format($issuanceDate, 'Y-m-d');
                $expirationDate = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($column[29]);
                $expirationDate = date_format($expirationDate, 'Y-m-d');
                $sql = "INSERT INTO tbldp (
                        ForeignKey,
                        WWDPCode,
                        IssuanceDate,
                        ExpirationDate
                        ) VALUES (
                        :ForeignKey,
                        :WWDPCode,
                        :IssuanceDate,
                        :ExpirationDate)";
                $stmt = $db_con->prepare($sql);
                $stmt->bindParam(':ForeignKey', $foreignkey, PDO::PARAM_STR);
                $stmt->bindParam(':WWDPCode', $column[27], PDO::PARAM_STR);
                $stmt->bindParam(':IssuanceDate', $issuanceDate, PDO::PARAM_STR);
                $stmt->bindParam(':ExpirationDate', $expirationDate, PDO::PARAM_STR);
                $stmt->execute();
            }
            //INSERT INTO tbldp
            //INSERT INTO tblhwgid
            if($column[33] != null) {
                $issuanceDate = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($column[34]);
                $issuanceDate = date_format($issuanceDate, 'Y-m-d');
                $expirationDate = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($column[35]);
                $expirationDate = date_format($expirationDate, 'Y-m-d');
                $permittype = 'HWG-ID';
                $sql = "INSERT INTO tblhwgid (
                        ForeignKey,
                        PermitNumber,
                        IssuanceDate,
                        ExpirationDate,
                        Type
                        ) VALUES (
                        :ForeignKey,
                        :PermitNumber,
                        :IssuanceDate,
                        :ExpirationDate,
                        :Type)";
                $stmt = $db_con->prepare($sql);
                $stmt->bindParam(':ForeignKey', $foreignkey, PDO::PARAM_STR);
                $stmt->bindParam(':PermitNumber', $column[33], PDO::PARAM_STR);
                $stmt->bindParam(':IssuanceDate', $issuanceDate, PDO::PARAM_STR);
                $stmt->bindParam(':ExpirationDate', $expirationDate, PDO::PARAM_STR);
                $stmt->bindParam(':Type', $permittype, PDO::PARAM_STR);
                $stmt->execute();
            }
            //INSERT INTO tblhwgid
            //INSERT INTO tbltsd
            if($column[37] != null) {
                $issuanceDate = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($column[38]);
                $issuanceDate = date_format($issuanceDate, 'Y-m-d');
                $expirationDate = date_add(date_create($issuanceDate), date_interval_create_from_date_string("1 year"));
                $expirationDate = date_format($expirationDate, 'Y-m-d');
                $permittype = 'TSD';
                $sql = "INSERT INTO tbltsd (
                        ForeignKey,
                        PermitNumber,
                        IssuanceDate,
                        ExpirationDate,
                        Type
                        ) VALUES (
                        :ForeignKey,
                        :PermitNumber,
                        :IssuanceDate,
                        :ExpirationDate,
                        :Type)";
                $stmt = $db_con->prepare($sql);
                $stmt->bindParam(':ForeignKey', $foreignkey, PDO::PARAM_STR);
                $stmt->bindParam(':PermitNumber', $column[37], PDO::PARAM_STR);
                $stmt->bindParam(':IssuanceDate', $issuanceDate, PDO::PARAM_STR);
                $stmt->bindParam(':ExpirationDate', $expirationDate, PDO::PARAM_STR);
                $stmt->bindParam(':Type', $permittype, PDO::PARAM_STR);
                $stmt->execute();
            }
            //INSERT INTO tbltsd
            //INSERT INTO tbltrc
            if($column[39] != null) {
                $issuanceDate = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($column[40]);
                $issuanceDate = date_format($issuanceDate, 'Y-m-d');
                $expirationDate = '';
                $permittype = 'TRC';
                $sql = "INSERT INTO tbltrc (
                        ForeignKey,
                        PermitNumber,
                        IssuanceDate,
                        ExpirationDate,
                        Type
                        ) VALUES (
                        :ForeignKey,
                        :PermitNumber,
                        :IssuanceDate,
                        :ExpirationDate,
                        :Type)";
                $stmt = $db_con->prepare($sql);
                $stmt->bindParam(':ForeignKey', $foreignkey, PDO::PARAM_STR);
                $stmt->bindParam(':PermitNumber', $column[39], PDO::PARAM_STR);
                $stmt->bindParam(':IssuanceDate', $issuanceDate, PDO::PARAM_STR);
                $stmt->bindParam(':ExpirationDate', $expirationDate, PDO::PARAM_STR);
                $stmt->bindParam(':Type', $permittype, PDO::PARAM_STR);
                $stmt->execute();
            }
            //INSERT INTO tbltrc
            //INSERT INTO tblccorc
            if($column[41] != null) {
                $issuanceDate = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($column[42]);
                $issuanceDate = date_format($issuanceDate, 'Y-m-d');
                $expirationDate = '';
                $permittype = 'CCO-RC';
                $sql = "INSERT INTO tblccorc (
                        ForeignKey,
                        PermitNumber,
                        IssuanceDate,
                        ExpirationDate,
                        Type
                        ) VALUES (
                        :ForeignKey,
                        :PermitNumber,
                        :IssuanceDate,
                        :ExpirationDate,
                        :Type)";
                $stmt = $db_con->prepare($sql);
                $stmt->bindParam(':ForeignKey', $foreignkey, PDO::PARAM_STR);
                $stmt->bindParam(':PermitNumber', $column[41], PDO::PARAM_STR);
                $stmt->bindParam(':IssuanceDate', $issuanceDate, PDO::PARAM_STR);
                $stmt->bindParam(':ExpirationDate', $expirationDate, PDO::PARAM_STR);
                $stmt->bindParam(':Type', $permittype, PDO::PARAM_STR);
                $stmt->execute();
            }
            //INSERT INTO tblccorc
            //INSERT INTO tblods
            if($column[43] != null) {
                $issuanceDate = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($column[44]);
                $issuanceDate = date_format($issuanceDate, 'Y-m-d');
                $expirationDate = '';
                $permittype = 'ODS';
                $sql = "INSERT INTO tblods (
                        ForeignKey,
                        PermitNumber,
                        IssuanceDate,
                        ExpirationDate,
                        Type
                        ) VALUES (
                        :ForeignKey,
                        :PermitNumber,
                        :IssuanceDate,
                        :ExpirationDate,
                        :Type)";
                $stmt = $db_con->prepare($sql);
                $stmt->bindParam(':ForeignKey', $foreignkey, PDO::PARAM_STR);
                $stmt->bindParam(':PermitNumber', $column[41], PDO::PARAM_STR);
                $stmt->bindParam(':IssuanceDate', $issuanceDate, PDO::PARAM_STR);
                $stmt->bindParam(':ExpirationDate', $expirationDate, PDO::PARAM_STR);
                $stmt->bindParam(':Type', $permittype, PDO::PARAM_STR);
                $stmt->execute();
            }
            //INSERT INTO tblods
            //INSERT INTO tblnotice eia
            if($column[19] != null){
                $issuanceDate = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($column[19]);
                $issuanceDate = date_format($issuanceDate, 'Y-m-d');
                $law = 'PD1586';
                $nov = 'NOV';
                $commitment = 1;
                $compliance = 0;
                $status = 'Non-compliant';
                $sql = "INSERT INTO tblnotice (
                        ProjectID,
                        Notice,
                        IssuanceDate,
                        Law,
                        Commitment,
                        Compliance,
                        Status,
                        UniqID
                        ) VALUES (
                        :ProjectID,
                        :Notice,
                        :IssuanceDate,
                        :Law,
                        :Commitment,
                        :Compliance,
                        :Status,
                        :UniqID)";
                $stmt = $db_con->prepare($sql);
                $stmt->bindParam(':ProjectID', $projectid, PDO::PARAM_STR);
                $stmt->bindParam(':Notice', $nov, PDO::PARAM_STR);
                $stmt->bindParam(':IssuanceDate', $issuanceDate, PDO::PARAM_STR);
                $stmt->bindParam(':Law', $law, PDO::PARAM_STR);
                $stmt->bindParam(':Commitment', $commitment, PDO::PARAM_STR);
                $stmt->bindParam(':Compliance', $compliance, PDO::PARAM_STR);
                $stmt->bindParam(':Status', $status, PDO::PARAM_STR);
                $stmt->bindParam(':UniqID', $uniqid, PDO::PARAM_STR);
                $stmt->execute();
            }
            //INSERT INTO tblnotice eia
            //INSERT INTO tblnotice air
            if($column[25] != null) {
                $issuanceDate = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($column[25]);
                $issuanceDate = date_format($issuanceDate, 'Y-m-d');
                $law = 'RA8749';
                $nov = 'NOV';
                $commitment = 1;
                $compliance = 0;
                $status = 'Non-compliant';
                $sql = "INSERT INTO tblnotice (
                        ProjectID,
                        Notice,
                        IssuanceDate,
                        Law,
                        Commitment,
                        Compliance,
                        Status,
                        UniqID
                        ) VALUES (
                        :ProjectID,
                        :Notice,
                        :IssuanceDate,
                        :Law,
                        :Commitment,
                        :Compliance,
                        :Status,
                        :UniqID)";
                $stmt = $db_con->prepare($sql);
                $stmt->bindParam(':ProjectID', $projectid, PDO::PARAM_STR);
                $stmt->bindParam(':Notice', $nov, PDO::PARAM_STR);
                $stmt->bindParam(':IssuanceDate', $issuanceDate, PDO::PARAM_STR);
                $stmt->bindParam(':Law', $law, PDO::PARAM_STR);
                $stmt->bindParam(':Commitment', $commitment, PDO::PARAM_STR);
                $stmt->bindParam(':Compliance', $compliance, PDO::PARAM_STR);
                $stmt->bindParam(':Status', $status, PDO::PARAM_STR);
                $stmt->bindParam(':UniqID', $uniqid, PDO::PARAM_STR);
                $stmt->execute();                
            }
            //INSERT INTO tblnotice air
            //INSERT INTO tblnotice water
            if($column[31] != null) {
                $issuanceDate = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($column[31]);
                $issuanceDate = date_format($issuanceDate, 'Y-m-d');
                $law = 'RA9275';
                $nov = 'NOV';
                $commitment = 1;
                $compliance = 0;
                $status = 'Non-compliant';
                $sql = "INSERT INTO tblnotice (
                        ProjectID,
                        Notice,
                        IssuanceDate,
                        Law,
                        Commitment,
                        Compliance,
                        Status,
                        UniqID
                        ) VALUES (
                        :ProjectID,
                        :Notice,
                        :IssuanceDate,
                        :Law,
                        :Commitment,
                        :Compliance,
                        :Status,
                        :UniqID)";
                $stmt = $db_con->prepare($sql);
                $stmt->bindParam(':ProjectID', $projectid, PDO::PARAM_STR);
                $stmt->bindParam(':Notice', $nov, PDO::PARAM_STR);
                $stmt->bindParam(':IssuanceDate', $issuanceDate, PDO::PARAM_STR);
                $stmt->bindParam(':Law', $law, PDO::PARAM_STR);
                $stmt->bindParam(':Commitment', $commitment, PDO::PARAM_STR);
                $stmt->bindParam(':Compliance', $compliance, PDO::PARAM_STR);
                $stmt->bindParam(':Status', $status, PDO::PARAM_STR);
                $stmt->bindParam(':UniqID', $uniqid, PDO::PARAM_STR);
                $stmt->execute();                
            }
            //INSERT INTO tblnotice water
            //INSERT INTO tblnotice hazwaste
            if($column[36] != null) {
                $issuanceDate = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($column[36]);
                $issuanceDate = date_format($issuanceDate, 'Y-m-d');
                $law = 'RA6969';
                $nov = 'NOV';
                $commitment = 1;
                $compliance = 0;
                $status = 'Non-compliant';
                $sql = "INSERT INTO tblnotice (
                        ProjectID,
                        Notice,
                        IssuanceDate,
                        Law,
                        Commitment,
                        Compliance,
                        Status,
                        UniqID
                        ) VALUES (
                        :ProjectID,
                        :Notice,
                        :IssuanceDate,
                        :Law,
                        :Commitment,
                        :Compliance,
                        :Status,
                        :UniqID)";
                $stmt = $db_con->prepare($sql);
                $stmt->bindParam(':ProjectID', $projectid, PDO::PARAM_STR);
                $stmt->bindParam(':Notice', $nov, PDO::PARAM_STR);
                $stmt->bindParam(':IssuanceDate', $issuanceDate, PDO::PARAM_STR);
                $stmt->bindParam(':Law', $law, PDO::PARAM_STR);
                $stmt->bindParam(':Commitment', $commitment, PDO::PARAM_STR);
                $stmt->bindParam(':Compliance', $compliance, PDO::PARAM_STR);
                $stmt->bindParam(':Status', $status, PDO::PARAM_STR);
                $stmt->bindParam(':UniqID', $uniqid, PDO::PARAM_STR);
                $stmt->execute();                
            }
            //ob_end_clean();
            //INSERT INTO tblnotice hazwaste
            $array = array(
                'importedRows' => $importedRows
            );
            //$data[] = $array;
        }
        
    }
    echo json_encode($array);
?>