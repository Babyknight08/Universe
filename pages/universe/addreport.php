<?php

$connect = new PDO("mysql:host=localhost;dbname=testing", "root", "");
$message = '';

if(isset($_POST["rcn"]))
{


  $query = "
 INSERT INTO tbl_login 
 (rcn, doi,m_o,noe,address, geo_c,nob,psic,year_est,product,ohd,odw,ody,pl,pr,apr,nomh,npco,pf,pa,doef,email,first_name,address1) VALUES 
 (:rcn, :doi,:m_o,:noe,:address, :geo_c,:nob,:psic,:year_est,:product,:ohd,:odw,:ody,:pl,:pr,:apr,:nomh,:npco,:pf,:pa,:doef,:email,:first_name,:address1)
 ";

 $user_data = array(
  ':rcn'   => $_POST["rcn"],
  ':doi'   => $_POST["doi"],
  ':m_o'  => $_POST["m_o"],
  ':noe'  => $_POST["noe"],
  ':address'  => $_POST["address"],
  ':geo_c'  => $_POST["geo_c"],
  ':nob'  => $_POST["nob"],
  ':psic'  => $_POST["psic"],
  ':year_est'  => $_POST["year_est"],
  ':product'  => $_POST["product"],
  ':ohd'  => $_POST["ohd"],
  ':odw'  => $_POST["odw"],
  ':ody'  => $_POST["ody"],
  ':pl'  => $_POST["pl"],
  ':pr'  => $_POST["pr"],
  ':apr'  => $_POST["apr"],
  ':nomh'  => $_POST["nomh"],
  ':npco'  => $_POST["npco"],
  ':pf'   => $_POST["pf"],
  ':pa'   => $_POST["pa"],
  ':doef'  => $_POST["doef"],
  ':email'  => $_POST["email"],
  ':first_name'  => $_POST["first_name"],
  ':address1'   => $_POST["address1"],
 
  
 );

 $statement = $connect->prepare($query);
 if($statement->execute($user_data))
 {
  
echo '<script>alert("hello world!")</script>';
 }
 else
 {
  $message = '
  <div class="alert alert-success">
  There is an error in Registration
  </div>
  ';
 }
}

?>




<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>EMB8 IIMS</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- IonIcons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="../../plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="../../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="../../plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="../../plugins/toastr/toastr.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>

<style>
  .active_tab1
  {
   background-color: white;
   color:#333;
   font-weight: bold;
  }

</style>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="../../index.php" class="nav-link">Home</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="true">
          <i class="fas fa-cog"></i>
          <!-- <span class="badge badge-warning navbar-badge">15</span> -->
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="left: inherit; right: 0px;">
          <span class="dropdown-item dropdown-header">User Settings</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item" data-toggle="modal" data-target="#modal-user">
            <i class="fas fa-user mr-2"></i> Authentication
            <span class="float-right text-muted text-sm">Change Password</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="../../logout.php" class="dropdown-item">
            <i class="fas fa-power-off mr-2"></i> Logout
            <span class="float-right text-muted text-sm">End Session</span>
          </a>
        </div>
      </li>

      <!-- Messages Dropdown Menu -->

      <!-- Notifications Dropdown Menu -->
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
    <?php
        include_once '../administrator-nav.php';
    ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Monitoring Report</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../../index.php">Home</a></li>
              <li class="breadcrumb-item active">Monitoring Report</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <hr>
        <div class="row mb-2">
          <div class="col-sm-12">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item active"><a href="#" data-toggle="modal" data-target="#addReport" ><i class="fas fa-plus"></i> Add Monitoring Report</a></li>
            </ol>
          </div>
        </div>
        <hr>
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <?php include_once 'report_table.php' ?>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">

          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.1.0-rc
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

    <!-- Modals -->

      <!------------------------------------------------->



      <!------------------------------------------------->

  <!-- Modal -->
  <div class="modal fade" id="addReport" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title w-100 text-center" id="exampleModalLabel">Integrated Information System</h5>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          
          <div class="modal-body">
            <form method="post" id="register_form">
          
      <!-- START OF NAVIGATION -->
                <ul class="nav nav-tabs" >
                <li class="nav-item">
                  <a class="nav-link active_tab1 active" style="border:1px solid #ccc" id="list_genInfo">General Information</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link inactive_tab1" id="list_purposeVerif" style="border:1px solid #ccc">Purpose of Verification</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link inactive_tab1" id="list_compliantStatus" style="border:1px solid #ccc">Compliant Status</a>
                </li>
                </ul>

          <div class="tab-content" style="margin-top:16px;">
            <div class="tab-pane active" id="genInfo">
              <div class="panel panel-default">
                <div class="panel-heading p-1"><i>Others</i></div>

                <div class="row d-flex justify-content-around">
                  <div class="form-group col-md-3">
                    <label>Report Control Number</label>
                    <input type="text" name="rcn" id="rcn" class="form-control" placeholder="Report Control Number"/>
                    <span id="error_rcn" class="text-danger"></span>
                   </div>
                  <div class="form-group col-md-3">
                  <label>Date of Inspection<span style="color:red">*</span></label>
                  <input type="date" name="doi" id="doi" class="form-control" placeholder="Address"/>
                  <span id="error_doi" class="text-danger"></span>
                  </div>
                  <div class="form-group col-md-3">
                  <label>Mission Order No.</label>
                  <input type="text" name="m_o" id="m_o" class="form-control" placeholder="Mission Order Number"/>
                  <span id="error_m_o" class="text-danger"></span>
                  </div>
              </div>

              <div class="panel-heading p-2 "><i>General Information</i></div>
                <div class="row d-flex justify-content-around p-2">
                      <div class="form-group">
                      <label class="checkbox-inline p-3">
                        <input type="checkbox" value="PD1586" name="laws[]">PD1586(EIA)
                      </label>
                      <label class="checkbox-inline mr-3">
                        <input type="checkbox" value="RA6969" name="laws[]">RA6969(CHEMICAL)
                      </label>
                      <label class="checkbox-inline mr-3">
                        <input type="checkbox" value="RA8749" name="laws[]">RA8749(AIR)
                      </label>
                      <label class="checkbox-inline mr-3">
                        <input type="checkbox" value="RA9275" name="laws[]">RA9275(WATER)
                      </label>
                      <label class="checkbox-inline mr-3">
                        <input type="checkbox" value="RA9003" name="laws[]">RA9003(SOLID WASTE)
                      </label>
                      <span id="error_checkbox" class="text-danger"></span>
                      </div>
                </div>
               
                

                <div class="row d-flex justify-content-around mt-3">
                  <div class="form-group col-md-3">
                    <label>Name of Establishment<span style="color:red">*</span></label>
                    <input type="text" name="noe" id="noe" class="form-control" placeholder="Name of Establishment" />
                    <span id="error_noe" class="text-danger"></span>
                  </div>
                  <div class="form-group col-md-3">
                    <label>Address<span style="color:red">*</span></label>
                    <input type="text" name="address" id="address" class="form-control" placeholder="Address"/>
                    <span id="error_address" class="text-danger"></span>
                  </div>
                  <div class="form-group col-md-3">
                    <label>Geo Coordinates<span style="color:red">*</span></label>
                    <input type="text" name="geo_c" id="geo_c" class="form-control" placeholder="10.0123456, 124.0123456"/>
                    <span id="error_geo_c" class="text-danger"></span>
                  </div>
                  <div class="form-group col-md-3">
                    <label>Nature of Business<span style="color:red">*</span></label>
                    <input type="text" name="nob" id="nob" class="form-control" placeholder="Sand and Gravel Extraction"/>
                    <span id="error_nob" class="text-danger"></span>
                  </div>
                </div>
         

                <div class="row d-flex justify-content-around">
                  <div class="form-group col-md-3">
                  <label>PSIC Code<span style="color:red">*</span></label>
                  <input type="number" name="psic" id="psic" class="form-control" placeholder="   Code"/>
                  <span id="error_psic" class="text-danger"></span>
                 </div>
                  <div class="form-group col-md-3">
                    <label>Year Established<span style="color:red">*</span></label>
                    <input type="date" name="year_est" id="year_est" class="form-control" placeholder="Year Established"/>
                    <span id="error_year_est" class="text-danger"></span>
                  </div>
                  <div class="form-group col-md-3">
                    <label>Product<span style="color:red">*</span></label>
                    <input type="text" name="product" id="product" class="form-control" placeholder="SAG Aggregates"/>
                    <span id="error_product" class="text-danger"></span>
                  </div>
                  <div class="form-group col-md-3">
                    <label>Operating Hours/Day<span style="color:red">*</span></label>
                    <select name="ohd" id="ohd" class="form-control">
                    <option value="">Select Status</option>
                    <option value="Operational">Operational</option>
                    <option value="Non-Operational">Non-Operational</option>
                    <option value="Project Not Implemented">Project Not Implemented</option>
                    <span id="error_ohd" class="text-danger"></span>
                  </select>
                  </div>
                </div>
   
                <div class="row d-flex justify-content-around">
                  <div class="form-group col-md-3">
                   <label>Operating Hours/Weeks<span style="color:red">*</span></label>
                   <select name="odw" id="odw" class="form-control">
                    <option value="">Select Status</option>
                    <option value="Operational">Operational</option>
                    <option value="Non-Operational">Non-Operational</option>
                    <option value="Project Not Implemented">Project Not Implemented</option>
                    <span id="error_odw" class="text-danger"></span>
                    </select>
                  </div>
                  <div class="form-group col-md-3">
                    <label>Operating Days/Years<span style="color:red">*</span></label>
                    <select name="ody" id="ody" class="form-control">
                    <option value="">Select Status</option>
                    <option value="Operational">Operational</option>
                    <option value="Non-Operational">Non-Operational</option>
                    <option value="Project Not Implemented">Project Not Implemented</option>
                    <span id="error_ody" class="text-danger"></span>
                    </select>
                  </div>
                  <div class="form-group col-md-3">
                    <label>Product Lines <span style="color:red">*</span></label>
                    <input type="text" name="pl" id="pl" class="form-control" placeholder="Product Lines"/>
                    <span id="error_pl" class="text-danger"></span>
                  </div>
                  <div class="form-group col-md-3">
                    <label>Production Rate <span style="color:red">*</span></label>
                    <input type="number" name="pr" id="pr" class="form-control" placeholder="(Unit/day) Declared in ECC" autocomplete="off"/>
                    <span id="error_pr" class="text-danger"></span>
                  </div>
                </div>
                <div class="panel-heading p-2"><i>Others</i></div>
                  <div class="row d-flex justify-content-around">
                    <div class="form-group col-md-3">
                      <label>Actual Production Rate<span style="color:red">*</span></label>
                      <input type="number" name="apr" id="apr" class="form-control" placeholder="Actual Production Rate" autocomplete="off"/>
                      <span id="error_apr" class="text-danger"></span>
                    </div>
                    <div class="form-group col-md-3">
                      <label>Name of Managing Head<span style="color:red">*</span></label>
                      <input type="text" name="nomh" id="nomh" class="form-control" placeholder="Managing Head" />
                      <span id="error_nomh" class="text-danger"></span>
                    </div>
                    <div class="form-group col-md-3">
                      <label>Name of PCO<span style="color:red">*</span></label>
                      <input type="text" name="npco" id="npco" class="form-control" placeholder="PCO Name" />
                      <span id="error_npco" class="text-danger"></span>
                    </div>
                    <div class="form-group col-md-3">
                      <label>Phone/Fax<span style="color:red">*</span></label>
                      <input type="text" name="pf" id="pf" class="form-control" placeholder="Phone/Fax Number" />
                      <span id="error_pf" class="text-danger"></span>
                    </div>
                  </div>
    
      
          
                  <div class="row d-flex justify-content-around mb-3">
                    <div class="form-group col-md-3">
                      <label>PCO Accreditation<span style="color:red">*</span></label>
                      <input type="text" name="pa" id="pa" class="form-control" placeholder="PCO Accreditation" />
                      <span id="error_pa" class="text-danger"></span>
                    </div>
                    <div class="form-group col-md-3">
                      <label>Date of Effectivity<span style="color:red">*</span></label>
                      <input type="date" name="doef" id="doef" class="form-control" placeholder="Date Of Effectivity" />
                      <span id="error_doef" class="text-danger"></span>
                    </div>
                      <div class="form-group col-md-3">
                      <label>Email<span style="color:red">*</span></label>
                      <input type="email" name="email" id="email" class="form-control" placeholder="Email Address" />
                      <span id="error_email" class="text-danger"></span>
                    </div>
                  </div>
            </div><!-- default panel -->


            <div align="center ">
            <button type="button" name="btn_genInfo" id="btn_genInfo" class="btn btn-info">Next</button>
          </div>
          </div> <!-- login_details -->
          <!-- end page1 -->

          

        <div class="tab-pane" id="purposeVerif">
          <div class="panel panel-default">
            <div class="panel-heading">Fill Personal Details</div>
              <div class="panel-body">
                <div class="row">
                  <div class="form-group col-md-2">
                    <input type="text" name="first_name" id="first_name">
                    <span id="error_first_name" class="text-danger"></span>
                  </div>
                </div>
              </div>
          </div>
                  <div align="center">
                    <button type="button" name="previous_btn_purposeVerif" id="previous_btn_purposeVerif" class="btn btn-default btn-lg prvbtn">Previous</button>
                    <button type="button" name="btn_purposeVerif" id="btn_purposeVerif" class="btn btn-info btn-lg">Next</button>
                  </div>
        </div>

          

          <div class="tab-pane" id="compliantStatus">
            <div class="panel panel-default">
              <div class="panel-heading">Fill Contact Details</div>
                <div class="panel-body">

                  <div class="form-group">
                  <label>Enter Address</label>
                  <textarea name="address1" id="address1" class="form-control"></textarea>
                  <span id="error_address1" class="text-danger"></span>
                  </div>

                  <div align="center">
                  <button type="button" name="previous_btn_compliantStatus" id="previous_btn_compliantStatus" class="btn btn-default btn-lg">Previous</button>
                  <button type="button" name="btn_compliantStatus" id="btn_compliantStatus" class="btn btn-success btn-lg">Submit</button>
                  </div>

                </div>
            </div>
          </div>
  
         </div> <!-- tab content -->
        </div> <!-- modal body -->
      </div> <!-- modal content -->
     </div>  <!-- modal dialog -->
    </div> <!-- modal -->



      <!------------------------------------------------->





      <!------------------------------------------------->
      <div class="modal fade" data-backdrop="static" id="modal-export" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title text-success"><i class="fa fa-file-excel"></i> Generate Excel Report</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <form action="../../build/php/export_ajax.php" method="post" id="form-export" enctype="multipart/form-data">
              <div class="modal-body">
                <div class="row">
                  <div class="form-group col-md-2">
                    <div class="icheck-success d-inline">
                        <input type="checkbox" id="peiss-check">
                        <label for="peiss-check"><em>Check to Select All</em></label>
                    </div> 
                  </div>
                  <div class="form-group col-md-2">
                    <label for="peiss-select">PEISS Requirement</label>  
                    <select class="form-control select2" style="width: 100%" id="peiss-select">
                      <option selected="selected" value="ECC">ECC</option>
                      <option value="CNC">CNC</option>
                      <option value="NONE">NONE</option>
                    </select>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="form-group col-md-2">
                    <div class="icheck-success d-inline">
                        <input type="checkbox" id="permit-check">
                        <label for="permit-check"><em>Check to Select All</em></label>
                    </div> 
                  </div>
                  <div class="form-group col-md-4">
                    <label for="permit-select">Permits</label>  
                    <select class="form-control select2" style="width: 100%" id="permit-select">
                      <option selected="selected" value="tblhwgid">Hazardous Waste Generator ID (HWG-ID)</option>
                      <option value="tblptt">Permit to Transport (PTT)</option>
                      <option value="tblsqi">Small Quantity Importation (SQI)</option>
                      <option value="tblccorc">Chemical Control Order - Registration Certificate (CCO-RC)</option>
                      <option value="tblccoic">Chemical Control Order - Importation Clearance (CCO-IC)</option>
                      <option value="tbltsd">Treatment Storage and Disposal (TSD)</option>
                      <option value="tbltrc">Transporter Certificate (TRC)</option>
                      <option value="tblods">Ozone Depleting Substances Clearance (ODS)</option>
                      <option value="tblpcb">PCB Management Plan</option>
                      <option value="tblpto">Permit To Operate (PTO)</option>
                      <option value="tbldp">Wastewater Discharge Permit (WWDP)</option>
                      <option value="tblpco">Pollution Control Officer (PCO)</option>
                    </select>
                  </div>
                  <div class="form-group col-md-3">
                    <label for="date-from">Date From</label>
                    <input type="date" name="date-from" class="form-control" id="date-from" placeholder="Date From" required>
                  </div>
                  <div class="form-group col-md-3">
                    <label for="date-to">Date To</label>
                    <input type="date" name="date-to" class="form-control" id="date-to" placeholder="Date To" required>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="form-group col-md-2">
                    <div class="icheck-success d-inline">
                        <input type="checkbox" id="province-check">
                        <label for="province-check"><em>Check to Select All</em></label>
                    </div> 
                  </div>
                  <div class="form-group col-md-10">
                    <label for="province-select">Province</label>  
                    <select class="form-control select2" style="width: 100%" id="province-select" multiple>
                        <option selected="selected" value="Leyte">Leyte</option>
                        <option value="Southern Leyte">Southern Leyte</option>
                        <option value="Biliran">Biliran</option>
                        <option value="Samar">Samar</option>
                        <option value="Eastern Samar">Eastern Samar</option>
                        <option value="Northern Samar">Northern Samar</option>
                    </select>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="form-group col-md-2">
                    <div class="icheck-success d-inline">
                        <input type="checkbox" id="status-check">
                        <label for="status-check"><em>Check to Select All</em></label>
                    </div> 
                  </div>
                  <div class="form-group col-md-10">
                    <label for="status-select">ECC Status</label>
                    <select class="form-control select2" style="width: 100%;" id="status-select" required multiple>
                      <option selected="selected" value="0">Not Applicable</option>
                      <option value=1>Operational</option>
                      <option value=2>Non-Operational</option>
                      <option value=3>Relieved</option>
                      <option value=4>Cancelled</option>
                    </select>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="form-group col-md-2">
                    <div class="icheck-success d-inline">
                        <input type="checkbox" id="ptype-check">
                        <label for="ptype-check"><em>Check to Select All</em></label>
                    </div> 
                  </div>
                  <div class="form-group col-md-10">
                    <label for="ptype-select">Project Type</label>
                    <select class="form-control select2" style="width: 100%;" id="ptype-select" required>
  
                    </select>                        
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-2">
                    <div class="icheck-success d-inline">
                        <input type="checkbox" id="psubtype-check">
                        <label for="psubtype-check"><em>Check to Select All</em></label>
                    </div> 
                  </div>
                  <div class="form-group col-md-10">
                    <label for="psubtype-select">Project Subtype</label>
                    <select class="form-control select2" style="width: 100%;" id="psubtype-select" required>

                    </select>                        
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-2">
                    <div class="icheck-success d-inline">
                        <input type="checkbox" id="pstype-check">
                        <label for="pstype-check"><em>Check to Select All</em></label>
                    </div> 
                  </div>
                  <div class="form-group col-md-10">
                    <label for="pstype-select">Project Specific Type</label>
                    <select class="form-control select2" style="width: 100%;" id="pstype-select" required>

                    </select>                        
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-2">
                    <div class="icheck-success d-inline">
                        <input type="checkbox" id="pssubtype-check">
                        <label for="pssubtype-check"><em>Check to Select All</em></label>
                    </div> 
                  </div>
                  <div class="form-group col-md-10">
                    <label for="pssubtype-select">Project Specific Subtype</label>
                    <select class="form-control select2" style="width: 100%;" id="pssubtype-select" required>

                    </select>                        
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="form-group col-md-2">
                    <div class="icheck-success d-inline p-2">
                      <input type="checkbox" id="check-cmr">
                      <label for="check-cmr"><em>Check to Select All</em></label>
                    </div>
                  </div>
                  <div class="form-group col-md-2">
                    <div class="icheck-danger d-inline p-2">
                      <input type="checkbox" id="check-ignore">
                      <label for="check-ignore"><em class="text-danger">Ignore CMR</em></label>
                    </div>
                  </div>
                  <div class="form-group col-md-8">
                    <label for="select-cmr-submission">CMR Submission</label>
                    <select id="select-cmr-submission" style="width: 100%;" class="form-control select2" multiple required>
                      <option value="1">2018 First Semester</option>
                      <option value="2">2018 Second Semester</option>
                      <option value="3">2019 First Semester</option>
                      <option value="4">2019 Second Semester</option>
                      <option value="5">2020 First Semester</option>
                      <option value="6">2020 Second Semester</option>
                      <option value="7">2021 First Semester</option>
                      <option value="8">2021 Second Semester</option>
                      <option value="9">2022 First Semester</option>
                      <option value="10">2022 Second Semester</option>
                    </select>
                  </div>
                </div>
                <div class="row">
                  <div id="success-prompt" class="alert alert-success alert-dismissible col-md-12" style="display: none;">
                    <h5><i class="icon fas fa-info"></i>
                      <span id="dlprompt"></span> <!-- Display number of rows returned by ajax call -->
                    </h5>
                    <div id="dllink"></div> <!-- Display the download link for the generated excel file -->
                  </div>
                </div>
              </div>
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success" id="button-generator"><i class="fa fa-file-excel"></i> Generate Listing</button>
              </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

<?php
  include_once '../employees/authentication.php';
?>
<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- jquery-validation -->
<script src="../../plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="../../plugins/jquery-validation/additional-methods.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../../plugins/jszip/jszip.min.js"></script>
<script src="../../plugins/pdfmake/pdfmake.min.js"></script>
<script src="../../plugins/pdfmake/vfs_fonts.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- Select2 -->
<script src="../../plugins/select2/js/select2.full.min.js"></script>
<!-- SweetAlert2 -->
<script src="../../plugins/sweetalert2/sweetalert2.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<!-- Toastr -->
<script src="../../plugins/toastr/toastr.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- Page specific script -->
<!-- <script src="../../build/js/projectlist.js"></script> -->
<!-- <script src="../../build/js/filterlist.js"></script> -->
<script src="../../build/js/addreport.js"></script>
<script src="../../build/js/authentication.js"></script>
<script>
      //Initialize Select2 Elements
      $('.select2').select2()

      var objdashboard = document.getElementById('objdashboard')
      var objusers = document.getElementById('objusers')
      var objuniverse = document.getElementById('objuniverse')
      objuniverse.classList.add('active')
      objdashboard.classList.remove('active')
      objusers.classList.remove('active')

</script>
</body>
</html>
