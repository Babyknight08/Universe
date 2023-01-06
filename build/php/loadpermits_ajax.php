<?php

    include_once 'dbcon.php';
    include_once 'dologin.php';

    session_start();
    $login = new USER();

    if(!$login->is_loggedin()) {
      header('Location: ../../login.php');      //check if user is logged in
    }
  
    $usertype = $_SESSION['usertype'];
    $section = $_SESSION['section'];

    $numrows=0;

    $RA6969 = array(
        "HWG-ID" => "Hazardous Waste Generator ID (HWG-ID)",
        "PTT" => "Permit to Transport (PTT)",
        "SQI" => "Small Quantity Importation (SQI)",
        "CCO-RC" => "Chemical Control Order - Registration Certificate (CCO-RC)",
        "CCO-IC" => "Chemical Control Order - Importation Clearance (CCO-IC)",
        "TSD" => "Treatment Storage and Disposal (TSD)",
        "TRC" => "Transporter Certificate (TRC)",
        "ODS" => "Ozone Depleting Substances Clearance (ODS)",
        "PCB" => "PCB Management Plan"
    );


    $projectfkey = $_POST['projectfkey'];
    $type = $_POST['loadtype'];

    switch($type){
        case 'pto' :
            $sql = "SELECT * FROM tblpto WHERE ForeignKey=:ForeignKey";
            break;
        case 'dp' :
            $sql = "SELECT * FROM tbldp WHERE ForeignKey=:ForeignKey";
            break;
        case 'pco' :
            $sql = "SELECT * FROM tblpco WHERE ForeignKey=:ForeignKey";
            break;
        case 'tchw' :
            $sql = "SELECT * FROM tblhwgid WHERE ForeignKey=:ForeignKey
                    UNION ALL
                    SELECT * FROM tblccoic WHERE ForeignKey=:ForeignKey
                    UNION ALL
                    SELECT * FROM tblccorc WHERE ForeignKey=:ForeignKey
                    UNION ALL
                    SELECT * FROM tblods WHERE ForeignKey=:ForeignKey
                    UNION ALL
                    SELECT * FROM tblpcb WHERE ForeignKey=:ForeignKey
                    UNION ALL
                    SELECT * FROM tblptt WHERE ForeignKey=:ForeignKey
                    UNION ALL
                    SELECT * FROM tblsqi WHERE ForeignKey=:ForeignKey
                    UNION ALL
                    SELECT * FROM tbltrc WHERE ForeignKey=:ForeignKey
                    UNION ALL
                    SELECT * FROM tbltsd WHERE ForeignKey=:ForeignKey";
            break;
    }

    $stmt = $db_con->prepare($sql);
    $stmt->bindParam(':ForeignKey', $projectfkey, PDO::PARAM_STR);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if($stmt->rowCount() > 0){
        foreach($results as $row){

            $numrows+=1;
            $subarray = array();

            $download = '<a href="../../build/php/' . $row['TargetPath'] . '" class="btn btn-link btn-sm" download>'.$row['Filename'].'</a>';

            switch($type){
                case 'pco' :
                    $actions = '<div class="btn-group">';
                    if($usertype == 'a' || $section == '0') {
                        $actions .= '<button type="button" class="btn btn-warning" data-id="'.$row['ID'].'" onclick="updatePCO(this)"><i class="fas fa-pencil-alt"></i> update</button>';
                        $actions .= '<button type="button" data-toggle="modal" data-target="#modal-delete-permits" class="btn btn-danger" data-id="'.$row['ID'].'" data-type="pco"><i class="fas fa-trash-alt"></i> delete</button>';
                    }
                    $actions .= '</div>';
                    $subarray[] = $row['PCOCode'];
                    $subarray[] = $row['Category'];
                    $subarray[] = $row['PCOName'];
                    $subarray[] = $row['ContactNo'];
                    break;
                case 'pto' :
                    $actions = '<div class="btn-group">';
                    if($usertype == 'a' || $section == '0') {
                        $actions .= '<button type="button" class="btn btn-warning" data-id="'.$row['ID'].'" onclick="updatePTO(this)"><i class="fas fa-pencil-alt"></i> update</button>';
                        $actions .= '<button type="button" data-toggle="modal" data-target="#modal-delete-permits" class="btn btn-danger" data-id="'.$row['ID'].'" data-type="pto"><i class="fas fa-trash-alt"></i> delete</button>';
                    }
                    $actions .= '</div>';
                    $subarray[] = $row['PTOCode'];
                    break;
                case 'dp' :
                    $actions = '<div class="btn-group">';
                    if($usertype == 'a' || $section == '0') {
                        $actions .= '<button type="button" class="btn btn-warning" data-id="'.$row['ID'].'" onclick="updateDP(this)"><i class="fas fa-pencil-alt"></i> update</button>';
                        $actions .= '<button type="button" data-toggle="modal" data-target="#modal-delete-permits" class="btn btn-danger" data-id="'.$row['ID'].'" data-type="dp"><i class="fas fa-trash-alt"></i> delete</button>';
                    }
                    $actions .= '</div>';
                    $subarray[] = $row['WWDPCode'];
                    break;
                case 'tchw' :
                    $actions = '<div class="btn-group">';
                    if($usertype == 'a' || $section == '2') {
                        $actions .= '<button type="button" class="btn btn-warning" data-id="'.$row['ID'].'" data-permit="'.$row['Type'].'" onclick="updateTCHW(this)"><i class="fas fa-pencil-alt"></i> update</button>';
                        $actions .= '<button type="button" data-toggle="modal" data-target="#modal-delete-permits" class="btn btn-danger" data-id="'.$row['ID'].'" data-permit="'.$row['Type'].'" data-type="tchw"><i class="fas fa-trash-alt"></i> delete</button>';
                    }
                    $actions .= '</div>';
                    $subarray[] = $RA6969[$row['Type']] ?? null;
                    $subarray[] = $row['PermitNumber'];
            }

            $subarray[] = $row['IssuanceDate'];
            $subarray[] = $row['ExpirationDate'];
            $subarray[] = $download;
            $subarray[] = $actions;
            $data[] = $subarray;
        }
        $table_permits = array(
            'draw' => $_POST,
            'recordsTotal' => $numrows,
            'data' => $data
        );
        echo json_encode($table_permits);
    }else{
        $table_permits = array(
            'draw' => $_POST,
            'recordsTotal' => 0,
            'data' => []
        );
        echo json_encode($table_permits);
    }

?>