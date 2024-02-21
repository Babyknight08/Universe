<?php

    $data=json_decode(file_get_contents('php://input'));

    $year_arr = array(
        2018, 2019, 2020, 2021, 2022
    );

    $response = array();
    foreach($year_arr as $year) {
        $current_data = 'y'.$year;
        foreach($data->$current_data as $sem) {
            if($sem!=[]) {
                $response[] = $sem;
            }
        }
    }

    echo json_encode($response);


?>