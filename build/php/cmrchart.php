<?php

    include_once 'dbcon.php';
    include_once 'dologin.php';

    date_default_timezone_set('Asia/Manila');

    session_start();
    $login = new USER();

    if(!$login->is_loggedin()) {
      header('Location: login.php');      //check if user is logged in
      exit();
    }

    // GET YEAR OF THE CURRENT YEAR HAHAHA DOESN'T MAKE SENSE BUT OK
    $yearnow = date('Y');

    for($i=2018;$i<=$yearnow;$i++) {
        $sem1_cutoff = $i . '-06-30';
        $sem2_cutoff = $i . '-12-31';
        $ecc_status = 1;
        $fsem = 'First Semester';
        $ssem = 'Second Semester';

        // FOR FIRST SEMESTER
        // fetch project count
        $sql = "SELECT COUNT(*) AS ProjectCount FROM tblprojects WHERE DateApproved<=:DateApproved AND ECCStatus=:ECCStatus";
        $stmt = $db_con->prepare($sql);
        $stmt->bindParam(':DateApproved', $sem1_cutoff, PDO::PARAM_STR);
        $stmt->bindParam(':ECCStatus', $ecc_status, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if($stmt->rowCount() > 0) {
            $subarr = array(
                "project_count" => intval($result['ProjectCount'])
            );
        }
        // fetch cmr count
        $sql = "SELECT COUNT(*) AS CMRCount, YearSubmission, Semester FROM tblcmr WHERE YearSubmission=:YearSubmission AND Semester=:Semester";
        $stmt = $db_con->prepare($sql);
        $stmt->bindParam(':YearSubmission', $i, PDO::PARAM_STR);
        $stmt->bindParam(':Semester', $fsem, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if($stmt->rowCount() > 0) {
            $subarr["cmr_count"] = $result['CMRCount'];
            $subarr["year_submission"] = $i;
            $subarr["semester"] = "1st Sem";
        }
        // =================================================================
        // FOR SECOND SEMESTER
        // fetch project count
        $sql = "SELECT COUNT(*) AS ProjectCount FROM tblprojects WHERE DateApproved<=:DateApproved AND ECCStatus=:ECCStatus";
        $stmt = $db_con->prepare($sql);
        $stmt->bindParam(':DateApproved', $sem2_cutoff, PDO::PARAM_STR);
        $stmt->bindParam(':ECCStatus', $ecc_status, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if($stmt->rowCount() > 0) {
            $subarr2 = array(
                "project_count" => intval($result['ProjectCount'])
            );
        }
        // fetch cmr count
        $sql = "SELECT COUNT(*) AS CMRCount, YearSubmission, Semester FROM tblcmr WHERE YearSubmission=:YearSubmission AND Semester=:Semester";
        $stmt = $db_con->prepare($sql);
        $stmt->bindParam(':YearSubmission', $i, PDO::PARAM_STR);
        $stmt->bindParam(':Semester', $ssem, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if($stmt->rowCount() > 0) {
            $subarr2["cmr_count"] = $result['CMRCount'];
            $subarr2["year_submission"] = $i;
            $subarr2["semester"] = "2nd Sem";
        }
        // =================================================================

        $data[] = $subarr;
        $data[] = $subarr2;
    }
    echo json_encode($data);

?>