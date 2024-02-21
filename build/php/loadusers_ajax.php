<?php

    include_once 'dbcon.php';

    $numrows=0;

    $divisions = array(
        "Clearance and Permitting Division",
        "Environmental Management and Enforcement Division",
        "Office of the Regional Director"
    );
    $sections = array(
        "Waste Water Permitting Section",
        "Environmental Impact Assessment Permitting Section",
        "Toxic Chemicals and Hazardous Waste Permitting Section",
        "Air and Water Monitoring Section",
        "Ambient Monitoring Section and Laboratory",
        "Solid Waste Management Section",
        "Toxic Chemicals and Hazardous Waste Monitoring Section",
        "Planning and Information Systems Management Unit",
        "Legal Unit",
        "Provincial Environmental Management Unit"
    );

    $sql = "SELECT * FROM tblemployees WHERE UserType!='a'";
    $stmt = $db_con->prepare($sql);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if($stmt->rowCount() > 0)
    {
        foreach($results as $row)
        {
            $numrows+=1;
            $subarray = array();
            $actions = '<div class="btn-group">';
            $actions .= '<button type="button" data-toggle="modal" data-target="#modal-reset" class="btn btn-success" data-id="'.$row['ID'].'"><i class="fas fa-sync"></i> reset password</button>';
            $actions .= '<a href="updateuser.php" class="btn btn-warning button-update" data-id="'.$row['ID'].'"><i class="fas fa-pencil-alt"></i> update user</a>';
            $actions .= '<button type="button" data-toggle="modal" data-target="#modal-delete" class="btn btn-danger" data-id="'.$row['ID'].'"><i class="fas fa-trash-alt"></i> delete user</button>';
            $actions .= '</div>';
            $employee = $row['LastName'] . ", " . $row['FirstName'] . " " . $row['MiddleName'] . " " . $row['NameExtension'];
            $subarray[] = $employee;
            $subarray[] = $divisions[intval($row['Division'])];
            $subarray[] = $sections[intval($row['Section'])];
            $subarray[] = $row['Username'];
            $subarray[] = "User"; 
            $subarray[] = $actions;
            $data[] = $subarray;
        }
        $table_emp = array(
            'draw' => $_POST,
            'recordsTotal' => $numrows,
            'data' => $data
        );
        echo json_encode($table_emp);
    }
    else
    {
        $table_emp = array(
            'draw' => $_POST,
            'recordsTotal' => 0,
            'data' => []
        );
        echo json_encode($table_emp);       //indicates that the json_response is empty
    }    

?>