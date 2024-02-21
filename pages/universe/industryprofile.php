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
    <!-- DataTables -->
  <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
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
            <h1>Industry Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../../index.php">Home</a></li>
              <li class="breadcrumb-item"><a href="projectlist.php">Project Listing</a></li>
              <li class="breadcrumb-item active">Industry Profile</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                  <h3 class="card-title text-success" id="label-projectname">%PROJECT NAME%</h3>
                  <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                      <i class="fas fa-minus"></i>
                      </button>
                  </div>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="form-group col-md-4">
                      <strong><i class="fas fa-dot-circle mr-1"></i> Reference No</strong>
                      <p class="text-muted" id="label-referenceno">
                        %Reference Number%
                      </p>
                      <strong><i class="fas fa-dot-circle mr-1"></i> ECC Status</strong>
                      <p class="text-muted" id="label-eccstatus">
                        %ECC Status%
                      </p>
                      <strong><i class="fas fa-dot-circle mr-1"></i> Date Approved</strong>
                      <p class="text-muted" id="label-dateapproved">
                        %Date Approved%
                      </p>
                      <strong><i class="fas fa-dot-circle mr-1"></i> Proponent</strong>
                      <p class="text-muted" id="label-proponent">
                        %Proponent%
                      </p>
                  </div>
                  <div class="form-group col-md-4">
                      <strong><i class="fas fa-dot-circle mr-1"></i> Project Type</strong>
                      <p class="text-muted" id="label-ptype">
                        %Project Type%
                      </p>
                      <strong><i class="fas fa-dot-circle mr-1"></i> Project Subtype</strong>
                      <p class="text-muted" id="label-psubtype">
                        %Project Subtype%
                      </p>
                      <strong><i class="fas fa-dot-circle mr-1"></i> Project Specific Type</strong>
                      <p class="text-muted" id="label-projectstype">
                        %Project Specific Type%
                      </p>
                      <strong><i class="fas fa-dot-circle mr-1"></i> Project Specific Subtype</strong>
                      <p class="text-muted" id="label-pssubtype">
                        %Project Specific Subtype%
                      </p>
                  </div>
                  <div class="form-group col-md-4">
                      <strong><i class="fas fa-dot-circle mr-1"></i> Project Address</strong>
                      <p class="text-muted" id="label-address">
                        %Project Address%
                      </p>
                      <strong><i class="fas fa-dot-circle mr-1"></i> Geocoordinates</strong>
                      <p class="text-primary" id="label-geocoordinates">
                        %latlng%
                      </p>
                      <strong><i class="fas fa-dot-circle mr-1"></i> Laws Covered</strong>
                      <p class="text-success" id="label-laws">
                        %Laws%
                      </p>
                      <strong><i class="fas fa-dot-circle mr-1"></i> CMR Required</strong>
                      <p class="text-primary" id="label-cmr">
                        %CMR%
                      </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- left column -->
          <div class="col-12 col-md-12">
            <div class="card">
              <div class="card-header p-2 pt-1">
                <ul class="nav nav-tabs" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-one-legal-tab" data-toggle="tab" href="#custom-tabs-one-legal" role="tab" aria-controls="custom-tabs-one-legal" aria-selected="true">Legal</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-cmr-tab" data-toggle="tab" href="#custom-tabs-one-cmr" role="tab" aria-controls="custom-tabs-one-cmr" aria-selected="false">Compliance Monitoring Report</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-eia-tab" data-toggle="tab" href="#custom-tabs-one-eia" role="tab" aria-controls="custom-tabs-one-eia" aria-selected="false">Environmental Impact Assessment</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-toxic-tab" data-toggle="tab" href="#custom-tabs-one-toxic" role="tab" aria-controls="custom-tabs-one-toxic" aria-selected="false">Toxic Chemicals and Hazardous Waste</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-aws-tab" data-toggle="tab" href="#custom-tabs-one-aws" role="tab" aria-controls="custom-tabs-one-aws" aria-selected="false">Air and Water</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-ecc-tab" data-toggle="tab" href="#custom-tabs-one-ecc" role="tab" aria-controls="custom-tabs-one-ecc" aria-selected="false">Environmental Compliance Certificate</a>
                  </li>
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content">
                  <div class="tab-pane fade active show" id="custom-tabs-one-legal" role="tabpanel" aria-labelledby="custom-tabs-one-legal-tab">
                      <?php include_once 'legal.php'; ?>
                  </div>
                  <div class="tab-pane fade" id="custom-tabs-one-cmr" role="tabpanel" aria-labelledby="custom-tabs-one-cmr-tab">
                    <?php include_once 'cmr.php'; ?>
                  </div>
                  <div class="tab-pane fade" id="custom-tabs-one-eia" role="tabpanel" aria-labelledby="custom-tabs-one-eia-tab">
                    <?php include_once 'eia.php'; ?>
                  </div>
                  <div class="tab-pane fade" id="custom-tabs-one-toxic" role="tabpanel" aria-labelledby="custom-tabs-one-toxic-tab">
                    <?php include_once 'toxic.php'; ?>
                  </div>
                  <div class="tab-pane fade" id="custom-tabs-one-aws" role="tabpanel" aria-labelledby="custom-tabs-one-aws-tab">
                    <?php include_once 'aws.php'; ?>
                  </div>
                  <div class="tab-pane fade" id="custom-tabs-one-ecc" role="tabpanel" aria-labelledby="custom-tabs-one-ecc-tab">
                  <?php include_once 'ecc.php'; ?>
                  </div>
                </div>
              </div>
              <!-- /.card -->
            </div>
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
    <div class="modal fade" data-backdrop="static" id="modal-delete-haz" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title text-danger">Delete Record</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
              <p>Are you sure you want to delete record?</p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" id="button-dismiss-haz" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-danger" id="button-delete-haz">Confirm Delete</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
        <!-- Modals -->
    <div class="modal fade" data-backdrop="static" id="modal-delete-aws" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title text-danger">Delete Record</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
              <p>Are you sure you want to delete record?</p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" id="button-dismiss-aws" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-danger" id="button-delete-aws">Confirm Delete</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- Modals -->
    <div class="modal fade" data-backdrop="static" id="modal-delete-permits" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title text-danger">Delete Record</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
              <p>Are you sure you want to delete record?</p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" id="button-dismiss-permits" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-danger" id="button-delete-permits">Confirm Delete</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- Prompt -->
      <div class="modal fade" data-backdrop="static" id="modal-cmr" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title text-warning"></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
              <p>
                <i class="fas fa-exclamation-triangle text-warning"></i> 
                Company is not covered by <b>PD1586</b>, update company profile to proceed
              </p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-warning" data-dismiss="modal">OK</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

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
<script src="../../build/js/notice.js"></script>
<script src="../../build/js/eia.js"></script>
<script src="../../build/js/aws.js"></script>
<script src="../../build/js/toxic.js"></script>
<script src="../../build/js/permits.js"></script>
<script src="../../build/js/coverage.js"></script>
<script src="../../build/js/industryprofile.js"></script>
<script src="../../build/js/cmr.js"></script>
<script src="../../build/js/ecc.js"></script>
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