<?php

    include_once 'dbcon.php';

    $data = json_decode(file_get_contents('php://input'));

    $year = $data->year;
    $date_submission = $data->date_submission;
    $semester = $data->semester;
    $projectid = $data->projectid;
    $uniqid = uniqid();

    try{

        $sql = "INSERT INTO tblcmr (
            YearSubmission,
            DateSubmission,
            Semester,
            ProjectID,
            UniqID
            )VALUES(
            :YearSubmission,
            :DateSubmission,
            :Semester,
            :ProjectID,
            :UniqID)";
        $stmt = $db_con->prepare($sql);
        $stmt->bindParam(':YearSubmission', $year, PDO::PARAM_STR);
        $stmt->bindParam(':DateSubmission', $date_submission, PDO::PARAM_STR);
        $stmt->bindParam(':Semester', $semester, PDO::PARAM_STR);
        $stmt->bindParam(':ProjectID', $projectid, PDO::PARAM_STR);
        $stmt->bindParam(':UniqID', $uniqid, PDO::PARAM_STR);
        $stmt->execute();

        $response = array(
            'message' => 'success'
        );
        echo json_encode($response);

    }catch(PDOException $e){

        $response = array(
            'message' => $e->getMessage()
        );
        echo json_encode($response);
        
    }


?>