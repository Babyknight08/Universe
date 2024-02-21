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
            <h1>Projects</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../../index.php">Home</a></li>
              <li class="breadcrumb-item active">Project Listing</li>
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
            <?php if($usertype == 'a' || $section == '1') { ?>
              <li class="breadcrumb-item active"><a href="newproject.php"><i class="fas fa-plus"></i> New Project</a></li>
            <?php } ?>
            <?php if($usertype == 'a') { ?>
              <li class="breadcrumb-item active"><a href="#" data-toggle="modal" data-target="#modal-import"><i class="fas fa-file-import"></i> Import Data</a></li>
            <?php } ?>
              <li class="breadcrumb-item active"><a href="#" data-toggle="modal" data-target="#modal-export"><i class="fas fa-file-export"></i> Generate Excel Report</a></li>
            </ol>
          </div>
        </div>
        <hr>
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><small>Project List</small></h3>
              </div>
              <!-- /.card-header -->
                <div class="card-body">
                  <table id="projects-table" class="table table-hover">
                    <thead>
                    <tr>
                      <th>PEISS</th>
                      <th>Reference No.</th>
                      <th>ECC Status</th>
                      <th>Date Approved</th>
                      <th>PSIC Code</th>
                      <th>Project Name</th>
                      <th>Proponent</th>
                      <th>Project Type</th>
                      <th>Project Subtype</th>
                      <th>Project Specific Type</th>
                      <th>Project Specific Subtype</th>
                      <th>Project Address</th>
                      <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>

                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </form>
              <div class="card-footer">
              </div>
            </div>
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
      <div class="modal fade" data-backdrop="static" id="modal-delete" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title text-danger">Delete Record</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="alert alert-danger" id="modal-delete-alert" role="alert" style="display:none">
                A simple danger alert—check it out!
              </div>
              <p id="modal-delete-prompt">Are you sure you want to delete employee/user?</p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-danger" id="button-delete">Confirm Delete</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!------------------------------------------------->
      <div class="modal fade" data-backdrop="static" id="modal-reset" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title text-success">Password Reset</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
              <p>Reset user password? <br> <small>(This will take effect the next time the user tries to login.)</small></p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-success" id="button-reset">Confirm Reset</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!------------------------------------------------->
      <div class="modal fade" data-backdrop="static" id="modal-import" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div id="overlays">
              
            </div>
            <div class="modal-header">
              <h4 class="modal-title text-success">Import Excel Data</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <form action="../../build/php/import_ajax.php" method="post" id="form-upload" enctype="multipart/form-data">
              <div class="modal-body">
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="upload-excel" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet">
                    <label class="custom-file-label" for="upload-excel">Choose Excel File . . .</label>
                  </div>
                  <div class="input-group-append">
                    <span class="input-group-text text-success"><i class="fas fa-upload"></i></span>
                  </div>
                </div>
                <div class="form-group">
                  <small><em><span id="span-prompt" class="text-danger">No file selected</span><b></em> | <span id="span-size">0</span>MB</b></small>
                </div>
              </div>
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Import Data</button>
              </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
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

                      <!-- didi -->
                      <option value="11">2023 First Semester</option>
                      <option value="12">2023 Second Semester</option>
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
<!-- Toastr -->
<script src="../../plugins/toastr/toastr.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- Page specific script -->
<script src="../../build/js/projectlist.js"></script>
<script src="../../build/js/filterlist.js"></script>
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
