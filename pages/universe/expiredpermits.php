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
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="../../plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="../../plugins/toastr/toastr.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">

  <style>
    .scroll {
        max-height: 800px;
        overflow-y: auto;
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
            <h1>Expired Permits</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../../index.php">Home</a></li>
              <li class="breadcrumb-item active">Expired Permits</li>
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
                <h3 class="card-title"><small>Companies</small></h3>
              </div>
              <!-- /.card-header -->
                <div class="card-body">
                  <ul class="nav nav-tabs" role="tablist" id="tabexpired">
                    <li class="nav-item" role="presentation">
                      <a class="nav-link active" id="pto-tab" data-toggle="tab" href="#pto" role="tab" aria-selected="true">
                        Permit To Operate
                      </a>
                    </li>
                    <li class="nav-item" role="presentation">
                      <a class="nav-link" id="wwdp-tab" data-toggle="tab" href="#wwdp" role="tab" aria-selected="true">
                        Wastewater Discharge Permit
                      </a>
                    </li>
                    <li class="nav-item" role="presentation">
                      <a class="nav-link" id="pco-tab" data-toggle="tab" href="#pco" role="tab" aria-selected="true">
                        Pollution Control Officer
                      </a>
                    </li>
                    <li class="nav-item" role="presentation">
                      <a class="nav-link" id="ods-tab" data-toggle="tab" href="#ods" role="tab" aria-selected="true">
                        Ozone Depleting Substances Clearance
                      </a>
                    </li>
                    <li class="nav-item" role="presentation">
                      <a class="nav-link" id="ptt-tab" data-toggle="tab" href="#ptt" role="tab" aria-selected="true">
                        Permit To Transport
                      </a>
                    </li>
                  </ul>
                  <div class="tab-content" id="tabexpiredcontent">
                    <!-- PTO -->
                    <div class="tab-pane fade show active" id="pto" role="tabpanel" aria-labelledby="pto-tab">
                      <div class="row pt-4">
                        <div class="mx-auto h4 text-muted">
                          PERMIT TO OPERATE
                        </div>
                      </div>
                      <div class="table-responsive">
                        <table id="expired-pto" class="table table-hover" style="width: 100%;">
                          <thead>
                            <tr>
                              <td><strong>PROJECT</strong></td>
                              <td><strong>PROPONENT</strong></td>
                              <td><strong>PROJECT ADDRESS</strong></td>
                              <td><strong>PTO CODE</strong></td>
                              <td><strong>ISSUANCE DATE</strong></td>
                              <td><strong>EXPIRATION DATE</strong></td>
                              <td><strong>ATTACHMENT</strong></td>
                            </tr>
                          </thead>
                          <tbody>
                            <!-- Data Loaded from tblpto -->
                          </tbody>
                        </table>
                      </div>
                    </div>
                    <!-- WWDP -->
                    <div class="tab-pane fade" id="wwdp" role="tabpanel" aria-labelledby="wwdp-tab">
                      <div class="row pt-4">
                        <div class="mx-auto h4 text-muted">
                          WASTEWATER DISCHARGE PERMIT
                        </div>
                      </div>
                      <div class="table-responsive">
                        <table id="expired-wwdp" class="table table-hover" style="width: 100%;">
                          <thead>
                            <tr>
                              <td><strong>PROJECT</strong></td>
                              <td><strong>PROPONENT</strong></td>
                              <td><strong>PROJECT ADDRESS</strong></td>
                              <td><strong>WWDP CODE</strong></td>
                              <td><strong>ISSUANCE DATE</strong></td>
                              <td><strong>EXPIRATION DATE</strong></td>
                              <td><strong>ATTACHMENT</strong></td>
                            </tr>
                          </thead>
                          <tbody>
                            <!-- Data Loaded from tblpto -->
                          </tbody>
                        </table>
                      </div>
                    </div>
                    <!-- PCO -->
                    <div class="tab-pane fade" id="pco" role="tabpanel" aria-labelledby="pco-tab">
                      <div class="row pt-4">
                        <div class="mx-auto h4 text-muted">
                          POLLUTION CONTROLLER OFFICER
                        </div>
                      </div>
                      <div class="table-responsive">
                        <table id="expired-pco" class="table table-hover" style="width: 100%;">
                          <thead>
                            <tr>
                              <td><strong>PROJECT</strong></td>
                              <td><strong>PROPONENT</strong></td>
                              <td><strong>PROJECT ADDRESS</strong></td>
                              <td><strong>PCO CODE</strong></td>
                              <td><strong>CATEGORY</strong></td>
                              <td><strong>PCO</strong></td>
                              <td><strong>ISSUANCE DATE</strong></td>
                              <td><strong>EXPIRATION DATE</strong></td>
                              <td><strong>ATTACHMENT</strong></td>
                            </tr>
                          </thead>
                          <tbody>
                            <!-- Data Loaded from tblpto -->
                          </tbody>
                        </table>
                      </div>
                    </div>
                    <!-- ODS -->
                    <div class="tab-pane fade" id="ods" role="tabpanel" aria-labelledby="ods-tab">
                      <div class="row pt-4">
                        <div class="mx-auto h4 text-muted">
                          OZONE DEPLETING SUBSTANCES CLEARANCE
                        </div>
                      </div>
                      <div class="table-responsive">
                        <table id="expired-ods" class="table table-hover" style="width: 100%;">
                          <thead>
                            <tr>
                              <td><strong>PROJECT</strong></td>
                              <td><strong>PROPONENT</strong></td>
                              <td><strong>PROJECT ADDRESS</strong></td>
                              <td><strong>PERMIT NUMBER</strong></td>
                              <td><strong>ISSUANCE DATE</strong></td>
                              <td><strong>EXPIRATION DATE</strong></td>
                              <td><strong>ATTACHMENT</strong></td>
                            </tr>
                          </thead>
                          <tbody>
                            <!-- Data Loaded from tblpto -->
                          </tbody>
                        </table>
                      </div>
                    </div>
                    <!-- PTT -->
                    <div class="tab-pane fade" id="ptt" role="tabpanel" aria-labelledby="ptt-tab">
                      <div class="row pt-4">
                        <div class="mx-auto h4 text-muted">
                          PERMIT TO TRANSPORT
                        </div>
                      </div>
                      <div class="table-responsive">
                        <table id="expired-ptt" class="table table-hover" style="width: 100%;">
                          <thead>
                            <tr>
                              <td><strong>PROJECT</strong></td>
                              <td><strong>PROPONENT</strong></td>
                              <td><strong>PROJECT ADDRESS</strong></td>
                              <td><strong>PERMIT NUMBER</strong></td>
                              <td><strong>ISSUANCE DATE</strong></td>
                              <td><strong>EXPIRATION DATE</strong></td>
                              <td><strong>ATTACHMENT</strong></td>
                            </tr>
                          </thead>
                          <tbody>
                            <!-- Data Loaded from tblpto -->
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                  <!-- /////////////////////////////////////////// -->
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
<script src="../../build/js/authentication.js"></script>
<script src="../../build/js/expired.js"></script>
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
