<?php

    include_once 'database.php';
    include_once 'Records.php';
    include_once 'arrays.php';

    $database = new Databases();
    $db = $database->getConnection();
    $record = new Records($db);

    if($_POST['action'] == 'loadPage') {
        $values = $record->pageLoad();
        echo json_encode($values);
    }

    if($_POST['action'] == 'fetchData') {
        $project_id = $_POST['project_id'];
        $return_val = $record->fetchData($project_id);
        $nob = $project_specific_subtype_s[$return_val['ProjectSpecificSubtype']];
        $return_val['nob'] = $nob;
		// var_dump($data['ProjectSpecificSubtype']);
		// var_dump($project_specific_subtype_s);
        echo json_encode($return_val);
        // var_dump($return_val);
    }

?>