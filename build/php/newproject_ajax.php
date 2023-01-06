<?php

    include __DIR__ . '/dbcon.php';

    //$data = json_decode(file_get_contents('php://input'));

    $peiss = $_POST['peiss'];
    $referenceno = $_POST['referenceno'];
    $status = $_POST['status'];
    $dateapproved = $_POST['dateapproved'];
    $region = $_POST['region'];
    $psiccode = $_POST['psiccode'];
    $projectname = $_POST['projectname'];
    $proponent = $_POST['proponent'];
    $projecttype = $_POST['projecttype'];
    $projectsubtype = $_POST['projectsubtype'];
    $projectstype = $_POST['projectstype'];
    $projectssubtype = $_POST['projectssubtype'];
    $address = $_POST['address'];
    $municipality = $_POST['municipality'];
    $province = $_POST['province'];
    $latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];
    $tchwcheck = $_POST['tchwcheck'];
    $ptocheck = $_POST['ptocheck'];
    $dpcheck = $_POST['dpcheck'];
    $cmrcheck = $_POST['cmrcheck'];
    //--GENERATE FOREIGNKEY
    $foreignkey = md5(uniqid());

    //--CHECK IF REFERENCE NO IS BLANK BEFORE PROCEEDING TO SAVE
    if($referenceno != '') {
        $nRows = $db_con->query("SELECT COUNT(*) FROM tblprojects WHERE ReferenceNo = '".$referenceno."'")->fetchColumn();
        if($nRows >= 1) {
            $response = array(
                "message" => "duplicate"
            );
            echo json_encode($response);
            exit();
        }
    }

    //--INSERT BASIC INFO INTO tblprojects
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
        CMR,
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
        :CMR,
        :ForeignKey)";
    $stmt = $db_con->prepare($sql);
    $stmt->bindParam(':PEISS', $peiss, PDO::PARAM_STR);
    $stmt->bindParam(':ReferenceNo', $referenceno, PDO::PARAM_STR);
    $stmt->bindParam(':ECCStatus', $status, PDO::PARAM_STR);
    $stmt->bindParam(':DateApproved', $dateapproved, PDO::PARAM_STR);
    $stmt->bindParam(':Region', $region, PDO::PARAM_STR);
    $stmt->bindParam(':PSICCode', $psiccode, PDO::PARAM_STR);
    $stmt->bindParam(':ProjectName', $projectname, PDO::PARAM_STR);
    $stmt->bindParam(':Proponent', $proponent, PDO::PARAM_STR);
    $stmt->bindParam(':ProjectType', $projecttype, PDO::PARAM_STR);
    $stmt->bindParam(':ProjectSubtype', $projectsubtype, PDO::PARAM_STR);
    $stmt->bindParam(':ProjectSpecificType', $projectstype, PDO::PARAM_STR);
    $stmt->bindParam(':ProjectSpecificSubtype', $projectssubtype, PDO::PARAM_STR);
    $stmt->bindParam(':SpecificAddress', $address, PDO::PARAM_STR);
    $stmt->bindParam(':Municipality', $municipality, PDO::PARAM_STR);
    $stmt->bindParam(':Province', $province, PDO::PARAM_STR);
    $stmt->bindParam(':Latitude', $latitude, PDO::PARAM_STR);
    $stmt->bindParam(':Longitude', $longitude, PDO::PARAM_STR);
    $stmt->bindParam(':RA8749', $ptocheck, PDO::PARAM_STR);
    $stmt->bindParam(':RA9275', $dpcheck, PDO::PARAM_STR);
    $stmt->bindParam(':RA6969', $tchwcheck, PDO::PARAM_STR);
    $stmt->bindParam(':CMR', $cmrcheck, PDO::PARAM_STR);
    $stmt->bindParam(':ForeignKey', $foreignkey, PDO::PARAM_STR);
    $stmt->execute();
    

    $response = array(
        "message" => "success"
    );
    echo json_encode($response);
    






?>