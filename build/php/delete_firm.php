<?php

try{


    include_once 'dbcon.php';

    $data = json_decode(file_get_contents('php://input'));

    $id = $data->id;
    $pname = $data->pname;
    $fkey = $data->fkey;

    function fileremover($src) {
        if(file_exists($src)) {
            $dir = opendir($src);
            while(false !== ($file = readdir($dir))) {
                if(($file != '.') && ($file != '..')) {
                    $full = $src . '/' . $file;
                    // $notme = $src . '/' . $excempt_file;
                    if(is_dir($full)) {
                        fileremover($full);
                    }else{
                        unlink($full);
                    }
                }
            }
            closedir($dir);
            rmdir($src);
        }
    }

    // monitoring
    // air
    $sql = "SELECT * FROM tblair WHERE ProjectID=:ID";
    $stmt = $db_con->prepare($sql);
    $stmt->bindParam(':ID', $id, PDO::PARAM_STR);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if($stmt->rowCount() > 0) {
        foreach($results as $row) {

            if(!empty($row['Filename']) || !$row['Filename']=='') {
                $filePath = str_replace($row['Filename'], '', $row['TargetPath']);
                fileremover($filePath);
            }

            $del = "DELETE FROM tblair WHERE ID=:ID";
            $stmt = $db_con->prepare($del);
            $stmt->bindParam(':ID', $row['ID'], PDO::PARAM_STR);
            $stmt->execute();

        }
    }
    // water
    $sql = "SELECT * FROM tblwater WHERE ProjectID=:ID";
    $stmt = $db_con->prepare($sql);
    $stmt->bindParam(':ID', $id, PDO::PARAM_STR);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if($stmt->rowCount() > 0) {
        foreach($results as $row) {

            if(!empty($row['Filename']) || !$row['Filename']=='') {
                $filePath = str_replace($row['Filename'], '', $row['TargetPath']);
                fileremover($filePath);
            }

            $del = "DELETE FROM tblwater WHERE ID=:ID";
            $stmt = $db_con->prepare($del);
            $stmt->bindParam(':ID', $row['ID'], PDO::PARAM_STR);
            $stmt->execute();

        }
    }
    // eia
    $sql = "SELECT * FROM tbleia WHERE ProjectID=:ID";
    $stmt = $db_con->prepare($sql);
    $stmt->bindParam(':ID', $id, PDO::PARAM_STR);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if($stmt->rowCount() > 0) {
        foreach($results as $row) {

            if(!empty($row['Filename']) || !$row['Filename']=='') {
                $filePath = str_replace($row['Filename'], '', $row['TargetPath']);
                fileremover($filePath);
            }

            $del = "DELETE FROM tbleia WHERE ID=:ID";
            $stmt = $db_con->prepare($del);
            $stmt->bindParam(':ID', $row['ID'], PDO::PARAM_STR);
            $stmt->execute();

        }
    }
    // hazwaste
    $sql = "SELECT * FROM tblhazwaste WHERE ProjectID=:ID";
    $stmt = $db_con->prepare($sql);
    $stmt->bindParam(':ID', $id, PDO::PARAM_STR);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if($stmt->rowCount() > 0) {
        foreach($results as $row) {

            if(!empty($row['Filename']) || !$row['Filename']=='') {
                $filePath = str_replace($row['Filename'], '', $row['TargetPath']);
                fileremover($filePath);
            }

            $del = "DELETE FROM tblhazwaste WHERE ID=:ID";
            $stmt = $db_con->prepare($del);
            $stmt->bindParam(':ID', $row['ID'], PDO::PARAM_STR);
            $stmt->execute();

        }
    }
    // toxic
    $sql = "SELECT * FROM tbltoxic WHERE ProjectID=:ID";
    $stmt = $db_con->prepare($sql);
    $stmt->bindParam(':ID', $id, PDO::PARAM_STR);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if($stmt->rowCount() > 0) {
        foreach($results as $row) {

            if(!empty($row['Filename']) || !$row['Filename']=='') {
                $filePath = str_replace($row['Filename'], '', $row['TargetPath']);
                fileremover($filePath);
            }

            $del = "DELETE FROM tbltoxic WHERE ID=:ID";
            $stmt = $db_con->prepare($del);
            $stmt->bindParam(':ID', $row['ID'], PDO::PARAM_STR);
            $stmt->execute();

        }
    }
    // Legal
    // nov
    $sql = "SELECT * FROM tblnotice WHERE ProjectID=:ID";
    $stmt = $db_con->prepare($sql);
    $stmt->bindParam(':ID', $id, PDO::PARAM_STR);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if($stmt->rowCount() > 0) {
        foreach($results as $row) {

            if(!empty($row['Filename']) || !$row['Filename']=='') {
                $filePath = str_replace($row['Filename'], '', $row['TargetPath']);
                fileremover($filePath);
            }

            $del = "DELETE FROM tblnotice WHERE ID=:ID";
            $stmt = $db_con->prepare($del);
            $stmt->bindParam(':ID', $row['ID'], PDO::PARAM_STR);
            $stmt->execute();

        }
    }
    $sql = "SELECT * FROM tblcdo WHERE ProjectID=:ID";
    $stmt = $db_con->prepare($sql);
    $stmt->bindParam(':ID', $id, PDO::PARAM_STR);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if($stmt->rowCount() > 0) {
        foreach($results as $row) {

            if(!empty($row['Filename']) || !$row['Filename']=='') {
                $filePath = str_replace($row['Filename'], '', $row['TargetPath']);
                fileremover($filePath);
            }

            $del = "DELETE FROM tblcdo WHERE ID=:ID";
            $stmt = $db_con->prepare($del);
            $stmt->bindParam(':ID', $row['ID'], PDO::PARAM_STR);
            $stmt->execute();

        }
    }
    // permits
    // dp
    $sql = "SELECT * FROM tbldp WHERE ForeignKey=:ForeignKey";
    $stmt = $db_con->prepare($sql);
    $stmt->bindParam(':ForeignKey', $fkey, PDO::PARAM_STR);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if($stmt->rowCount() > 0) {
        foreach($results as $row) {

            if(!empty($row['Filename']) || !$row['Filename']=='') {
                $filePath = str_replace($row['Filename'], '', $row['TargetPath']);
                fileremover($filePath);
            }

            $del = "DELETE FROM tbldp WHERE ID=:ID";
            $stmt = $db_con->prepare($del);
            $stmt->bindParam(':ID', $row['ID'], PDO::PARAM_STR);
            $stmt->execute();

        }
    }
    // pto
    $sql = "SELECT * FROM tblpto WHERE ForeignKey=:ForeignKey";
    $stmt = $db_con->prepare($sql);
    $stmt->bindParam(':ForeignKey', $fkey, PDO::PARAM_STR);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if($stmt->rowCount() > 0) {
        foreach($results as $row) {

            if(!empty($row['Filename']) || !$row['Filename']=='') {
                $filePath = str_replace($row['Filename'], '', $row['TargetPath']);
                fileremover($filePath);
            }

            $del = "DELETE FROM tblpto WHERE ID=:ID";
            $stmt = $db_con->prepare($del);
            $stmt->bindParam(':ID', $row['ID'], PDO::PARAM_STR);
            $stmt->execute();

        }
    }     
    // ccoic
    $sql = "SELECT * FROM tblccoic WHERE ForeignKey=:ForeignKey";
    $stmt = $db_con->prepare($sql);
    $stmt->bindParam(':ForeignKey', $fkey, PDO::PARAM_STR);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if($stmt->rowCount() > 0) {
        foreach($results as $row) {

            if(!empty($row['Filename']) || !$row['Filename']=='') {
                $filePath = str_replace($row['Filename'], '', $row['TargetPath']);
                fileremover($filePath);
            }

            $del = "DELETE FROM tblccoic WHERE ID=:ID";
            $stmt = $db_con->prepare($del);
            $stmt->bindParam(':ID', $row['ID'], PDO::PARAM_STR);
            $stmt->execute();

        }
    } 
    // ccorc
    $sql = "SELECT * FROM tblccorc WHERE ForeignKey=:ForeignKey";
    $stmt = $db_con->prepare($sql);
    $stmt->bindParam(':ForeignKey', $fkey, PDO::PARAM_STR);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if($stmt->rowCount() > 0) {
        foreach($results as $row) {

            if(!empty($row['Filename']) || !$row['Filename']=='') {
                $filePath = str_replace($row['Filename'], '', $row['TargetPath']);
                fileremover($filePath);
            }

            $del = "DELETE FROM tblccorc WHERE ID=:ID";
            $stmt = $db_con->prepare($del);
            $stmt->bindParam(':ID', $row['ID'], PDO::PARAM_STR);
            $stmt->execute();

        }
    }   
    // hwgid
    $sql = "SELECT * FROM tblhwgid WHERE ForeignKey=:ForeignKey";
    $stmt = $db_con->prepare($sql);
    $stmt->bindParam(':ForeignKey', $fkey, PDO::PARAM_STR);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if($stmt->rowCount() > 0) {
        foreach($results as $row) {

            if(!empty($row['Filename']) || !$row['Filename']=='') {
                $filePath = str_replace($row['Filename'], '', $row['TargetPath']);
                fileremover($filePath);
            }

            $del = "DELETE FROM tblhwgid WHERE ID=:ID";
            $stmt = $db_con->prepare($del);
            $stmt->bindParam(':ID', $row['ID'], PDO::PARAM_STR);
            $stmt->execute();

        }
    }
    // ods
    $sql = "SELECT * FROM tblods WHERE ForeignKey=:ForeignKey";
    $stmt = $db_con->prepare($sql);
    $stmt->bindParam(':ForeignKey', $fkey, PDO::PARAM_STR);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if($stmt->rowCount() > 0) {
        foreach($results as $row) {

            if(!empty($row['Filename']) || !$row['Filename']=='') {
                $filePath = str_replace($row['Filename'], '', $row['TargetPath']);
                fileremover($filePath);
            }

            $del = "DELETE FROM tblods WHERE ID=:ID";
            $stmt = $db_con->prepare($del);
            $stmt->bindParam(':ID', $row['ID'], PDO::PARAM_STR);
            $stmt->execute();

        }
    }
    // pcb
    $sql = "SELECT * FROM tblpcb WHERE ForeignKey=:ForeignKey";
    $stmt = $db_con->prepare($sql);
    $stmt->bindParam(':ForeignKey', $fkey, PDO::PARAM_STR);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if($stmt->rowCount() > 0) {
        foreach($results as $row) {

            if(!empty($row['Filename']) || !$row['Filename']=='') {
                $filePath = str_replace($row['Filename'], '', $row['TargetPath']);
                fileremover($filePath);
            }

            $del = "DELETE FROM tblpcb WHERE ID=:ID";
            $stmt = $db_con->prepare($del);
            $stmt->bindParam(':ID', $row['ID'], PDO::PARAM_STR);
            $stmt->execute();

        }
    }
    // pco
    $sql = "SELECT * FROM tblpco WHERE ForeignKey=:ForeignKey";
    $stmt = $db_con->prepare($sql);
    $stmt->bindParam(':ForeignKey', $fkey, PDO::PARAM_STR);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if($stmt->rowCount() > 0) {
        foreach($results as $row) {

            if(!empty($row['Filename']) || !$row['Filename']=='') {
                $filePath = str_replace($row['Filename'], '', $row['TargetPath']);
                fileremover($filePath);
            }

            $del = "DELETE FROM tblpco WHERE ID=:ID";
            $stmt = $db_con->prepare($del);
            $stmt->bindParam(':ID', $row['ID'], PDO::PARAM_STR);
            $stmt->execute();

        }
    }
    // ptt
    $sql = "SELECT * FROM tblptt WHERE ForeignKey=:ForeignKey";
    $stmt = $db_con->prepare($sql);
    $stmt->bindParam(':ForeignKey', $fkey, PDO::PARAM_STR);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if($stmt->rowCount() > 0) {
        foreach($results as $row) {

            if(!empty($row['Filename']) || !$row['Filename']=='') {
                $filePath = str_replace($row['Filename'], '', $row['TargetPath']);
                fileremover($filePath);
            }

            $del = "DELETE FROM tblptt WHERE ID=:ID";
            $stmt = $db_con->prepare($del);
            $stmt->bindParam(':ID', $row['ID'], PDO::PARAM_STR);
            $stmt->execute();

        }
    }
    // sqi
    $sql = "SELECT * FROM tblsqi WHERE ForeignKey=:ForeignKey";
    $stmt = $db_con->prepare($sql);
    $stmt->bindParam(':ForeignKey', $fkey, PDO::PARAM_STR);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if($stmt->rowCount() > 0) {
        foreach($results as $row) {

            if(!empty($row['Filename']) || !$row['Filename']=='') {
                $filePath = str_replace($row['Filename'], '', $row['TargetPath']);
                fileremover($filePath);
            }

            $del = "DELETE FROM tblsqi WHERE ID=:ID";
            $stmt = $db_con->prepare($del);
            $stmt->bindParam(':ID', $row['ID'], PDO::PARAM_STR);
            $stmt->execute();

        }
    }
    // trc
    $sql = "SELECT * FROM tbltrc WHERE ForeignKey=:ForeignKey";
    $stmt = $db_con->prepare($sql);
    $stmt->bindParam(':ForeignKey', $fkey, PDO::PARAM_STR);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if($stmt->rowCount() > 0) {
        foreach($results as $row) {

            if(!empty($row['Filename']) || !$row['Filename']=='') {
                $filePath = str_replace($row['Filename'], '', $row['TargetPath']);
                fileremover($filePath);
            }

            $del = "DELETE FROM tbltrc WHERE ID=:ID";
            $stmt = $db_con->prepare($del);
            $stmt->bindParam(':ID', $row['ID'], PDO::PARAM_STR);
            $stmt->execute();

        }
    }
    // tsd
    $sql = "SELECT * FROM tbltsd WHERE ForeignKey=:ForeignKey";
    $stmt = $db_con->prepare($sql);
    $stmt->bindParam(':ForeignKey', $fkey, PDO::PARAM_STR);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if($stmt->rowCount() > 0) {
        foreach($results as $row) {

            if(!empty($row['Filename']) || !$row['Filename']=='') {
                $filePath = str_replace($row['Filename'], '', $row['TargetPath']);
                fileremover($filePath);
            }

            $del = "DELETE FROM tbltsd WHERE ID=:ID";
            $stmt = $db_con->prepare($del);
            $stmt->bindParam(':ID', $row['ID'], PDO::PARAM_STR);
            $stmt->execute();

        }
    }

    // Delete FIRM
    $del = "DELETE FROM tblprojects WHERE ID=:ID";
    $stmt = $db_con->prepare($del);
    $stmt->bindParam(':ID', $id, PDO::PARAM_STR);
    $stmt->execute();

    // response
    $response = array(
        'message' => 'success'
    );
    echo json_encode($response);
    exit();

}catch(PDOException $e){
    // response error
    $response = array(
        'message' => $e->getMessage()
    );
    echo json_encode($response);
    exit();
}

       



?>