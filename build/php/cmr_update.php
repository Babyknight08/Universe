<?php

    include_once 'dbcon.php';

    $data = json_decode(file_get_contents('php://input'));

    $id = $data->updateid;
    $year = $data->year;
    $semester = $data->semester;
    $date_submission = $data->date_submission;

    try {

        $sql = "UPDATE tblcmr SET 
                YearSubmission = :YearSubmission,
                DateSubmission = :DateSubmission,
                Semester = :Semester
                WHERE ID=:ID";
        $stmt = $db_con->prepare($sql);
        $stmt->bindParam(':YearSubmission', $year, PDO::PARAM_STR);
        $stmt->bindParam(':DateSubmission', $date_submission, PDO::PARAM_STR);
        $stmt->bindParam(':Semester', $semester, PDO::PARAM_STR);
        $stmt->bindParam(':ID', $id, PDO::PARAM_STR);
        $stmt->execute();
        
        $response = array(
            "message" => "success"
        );
        echo json_encode($response);
        exit();

    }catch(PDOException $e) {

        $response = array(
            "message" => $e->getMessage()
        );
        echo json_encode($response);
        exit();
        
    }




?>