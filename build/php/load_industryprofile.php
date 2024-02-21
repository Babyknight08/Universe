<?php

    include_once 'dbcon.php';
    include_once 'arrays2.php';

    $status_array = array(
        '0' => 'Non-Applicable',
        '1' => 'Operational',
        '2' => 'Non-Operational',
        '3' => 'Relieved',
        '4' => 'Cancelled'
    );

    $data = json_decode(file_get_contents('php://input'));
    $projectID = $data->projectid;

    $sql = "SELECT * FROM tblprojects WHERE ID=:ID LIMIT 1";
    $stmt = $db_con->prepare($sql);
    $stmt->bindParam(':ID', $projectID, PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($stmt->rowCount() == 1){
        $response = array(
            'projectname' => $result['ProjectName'],
            'refno' => $result['ReferenceNo'],
            'eccstatus' => $status_array[$result['ECCStatus']] ?? null, 
            'dateapproved' => $result['DateApproved'],
            'proponent' => $result['Proponent'],
            'projecttype' => $project_type_s[$result['ProjectType']] ?? null,
            'projectsubtype' => $project_subtype_s[$result['ProjectSubtype']] ?? null,
            'projectspecifictype' => $project_specific_type_s[$result['ProjectSpecificType']] ?? null,
            'projectspecificsubtype' => $project_specific_subtype_s[$result['ProjectSpecificSubtype']] ?? null,
            'address' => $result['SpecificAddress'] . ' ' . $result['Municipality'] . ', ' . $result['Province'],
            'latitude' => $result['Latitude'],
            'longitude' => $result['Longitude'],
            'RA8749' => $result['RA8749'],
            'RA9275' => $result['RA9275'],
            'RA6969' => $result['RA6969'],
            'CMR' => $result['CMR']
        );
        echo json_encode($response);
    }
    

?>