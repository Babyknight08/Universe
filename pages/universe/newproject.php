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
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="../../plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="../../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="../../plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="../../plugins/toastr/toastr.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
    <style>
        #map {
          height: 500px;
        }
    </style>
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
            <h1>Insert Project</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../../index.php">Home</a></li>
              <li class="breadcrumb-item"><a href="projectlist.php">Universe</a></li>
              <li class="breadcrumb-item active">Insert Project</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><small>PROJECT INFORMATION</small></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="newproject-form">
                <div class="card-body">
                    <div class="row">
                      <div class="col-md-12">
                        <h4 class="text-secondary"><em>Basic Information</em></h4>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="form-group col-md-2">
                        <label for="peiss-select">PEISS Requirement</label>  
                        <select class="form-control select2" style="width: 100%" id="peiss-select">
                          <option selected="selected" value="ECC">ECC</option>
                          <option value="CNC">CNC</option>
                          <option value="NONE">NONE</option>
                        </select>
                      </div>
                      <div class="form-group col-md-2">
                        <label for="referenceno-input">Reference No.</label>
                        <input type="text" name="referenceno-input" class="form-control" id="referenceno-input" placeholder="Reference Number">
                      </div>
                      <div class="form-group col-md-2">
                        <label for="status-select">ECC Status</label>
                        <select class="form-control select2" style="width: 100%;" id="status-select" required>
                          <option selected="selected" value="0">Not Applicable</option>
                          <option value=1>Operational</option>
                          <option value=2>Non-Operational</option>
                          <option value=3>Relieved</option>
                          <option value=4>Cancelled</option>
                        </select>
                      </div>
                      <div class="form-group col-md-2">
                        <label for="approved-date">Date Approved</label>
                        <input type="date" name="approved-date" class="form-control" id="approved-date" placeholder="Date Approved" required>
                      </div>
                      <div class="form-group col-md-1">
                        <label for="region-input">Region</label>
                        <input type="text" name="region-input" class="form-control" id="region-input" placeholder="Name Extension (e.g. jr)" value="R08" disabled>
                      </div>
                      <div class="form-group col-md-1">
                        <label for="psic-input">PSIC Code</label>
                        <input type="text" name="psic-input" class="form-control" id="psic-input" placeholder="Optional">
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-md-6">
                        <label for="projectname-input">Project Name</label>
                        <input type="text" name="projectname-input" class="form-control" id="projectname-input" placeholder="Project Name" required>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="proponent-input">Proponent</label>
                        <input type="text" name="proponent-input" class="form-control" id="proponent-input" placeholder="Proponent" required>
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-md-6">
                        <label for="ptype-select">Project Type</label>
                        <select class="form-control select2" style="width: 100%;" id="ptype-select" required>
                          
                        </select>                        
                      </div>
                      <div class="form-group col-md-6">
                        <label for="psubtype-select">Project Subtype</label>
                        <select class="form-control select2" style="width: 100%;" id="psubtype-select" required>

                        </select>                        
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-md-6">
                        <label for="pstype-select">Project Specific Type</label>
                        <select class="form-control select2" style="width: 100%;" id="pstype-select" required>

                        </select>                        
                      </div>
                      <div class="form-group col-md-6">
                        <label for="pssubtype-select">Project Specific Subtype</label>
                        <select class="form-control select2" style="width: 100%;" id="pssubtype-select" required>

                        </select>                        
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-md-12">
                        <h4 class="text-secondary"><em>Project Address</em></h4>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="form-group col-md-6">
                        <label for="address-input">Specific Address</label>
                        <input type="text" name="address-input" class="form-control" id="address-input" placeholder="Specific Address" required>
                      </div>
                      <div class="form-group col-md-3">
                        <label for="city-input">City/Municipality</label>
                        <input type="text" name="city-input" class="form-control" id="city-input" placeholder="City/Municipality" required>
                      </div>
                      <div class="form-group col-md-3">
                        <label for="province-select">Province</label>
                        <select class="form-control select2" style="width: 100%;" id="province-select" required>
                          <option selected="selected" value="Leyte">Leyte</option>
                          <option value="Southern Leyte">Southern Leyte</option>
                          <option value="Biliran">Biliran</option>
                          <option value="Samar">Samar</option>
                          <option value="Eastern Samar">Eastern Samar</option>
                          <option value="Western Samar">Western Samar</option>
                          <option value="Northern Samar">Northern Samar</option>
                        </select>   
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-md-5">
                        <label for="latitude-input">Latitude</label>
                        <input type="text" name="latitude-input" class="form-control" id="latitude-input" placeholder="Latitude" required>
                      </div>
                      <div class="form-group col-md-5">
                        <label for="longitude-input">Longitude</label>
                        <input type="text" name="longitude-input" class="form-control" id="longitude-input" placeholder="Longitude" required>
                      </div>
                      <div class="form-group cold-md-2">
                        <label for="btn-geoloc">&nbsp;</label>
                        <button type="button" title="pin location" id="btn-geoloc" data-toggle="modal" data-target="#modal-map" class="btn btn-block btn-outline-danger">
                          <i class="fas fa-map-marker-alt"></i> Geolocation
                        </button>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-md-12">
                        <h4 class="text-secondary"><em>Permits and Clearances</em></h4>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <!-- PERMITS DESIGN -->
                        <div class="form-group col-sm-4">
                            <div class="icheck-danger d-inline">
                                <input type="checkbox" id="tchw-check">
                                <label for="tchw-check">Covered by RA6969 <em>(Toxic Chemicals and Hazardous Waste)</em></label>
                            </div>                              
                        </div>
                        <div class="form-group col-sm-4">
                            <div class="icheck-danger d-inline">
                                <input type="checkbox" id="pto-check">
                                <label for="pto-check">Covered by RA8749 <em>(Permit to Operate)</em></label>
                            </div>                              
                        </div>
                        <div class="form-group col-sm-4">
                            <div class="icheck-danger d-inline">
                                <input type="checkbox" id="dp-check">
                                <label for="dp-check">Covered by RA9275 <em>(Wastewater Discharge Permit)</em></label>
                            </div>                              
                        </div>
                      <!-- PERMITS DESIGN -->
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-md-12">
                        <h4 class="text-secondary"><em>Compliance Monitoring Report</em></h4>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="form-group col-sm-4">
                        <div class="icheck-primary d-inline">
                          <input type="checkbox" id="cmr-check" checked>
                          <label for="cmr-check">Is required to submit <em>(CMR)</em></label>
                        </div>
                      </div>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-block btn-primary"><i class="far fa-paper-plane"></i> Save Record</button>
                </div>
              </form>
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
  
  <!-- Modal -->
      <div class="modal fade" data-backdrop="static" id="modal-map" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title text-danger"><i class="fas fa-map-marker-alt"></i> Locator</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
              <!-- <div class="alert alert-danger" id="modal-delete-alert" role="alert" style="display:none">
                A simple danger alert—check it out!
              </div> -->
              <!-- google maps -->
              <div class="row">
                <div class="col-md-12">
                  <h4 id="map-place">Label Here</h4>
                  <span class="text-primary" id="map-latlng">11.26888368831821, 124.93714892889646</span>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div id="map"></div>
                </div>
              </div>
              
              <!--  -->
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary" id="button-map-confirm"><i class="fas fa-check"></i> Confirm Geocoordinates</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
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
<script src="../../build/js/newproject.js"></script>
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
<script async
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCca2vCoK2BA1mHXfQISbEPi8PmeD_xpgo&callback=initMap">
</script>
</body>
</html>
