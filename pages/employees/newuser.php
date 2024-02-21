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
  <!-- Select2 -->
  <link rel="stylesheet" href="../../plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="../../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
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
            <h1>Insert User</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../../index.php">Home</a></li>
              <li class="breadcrumb-item"><a href="userlist.php">Users List</a></li>
              <li class="breadcrumb-item active">Insert User</li>
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
                <h3 class="card-title"><small>EMPLOYEE INFORMATION</small></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="newuser-form">
                <div class="card-body">
                    <div class="row">
                      <div class="form-group col-md-3">
                        <label for="lastname-input">Last Name</label>
                        <input type="text" name="lastname-input" class="form-control" id="lastname-input" placeholder="Last Name" required>
                      </div>
                      <div class="form-group col-md-3">
                        <label for="first-input">First Name</label>
                        <input type="text" name="firstname-input" class="form-control" id="firstname-input" placeholder="First Name" required>
                      </div>
                      <div class="form-group col-md-3">
                        <label for="middle-input">Middle Name</label>
                        <input type="text" name="middlename-input" class="form-control" id="middlename-input" placeholder="Middle Name" required>
                      </div>
                      <div class="form-group col-md-3">
                        <label for="extension-input">Name Extension <small>(Optional)</small></label>
                        <input type="text" name="extension-input" class="form-control" id="extension-input" placeholder="Name Extension (e.g. jr)">
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-md-6">
                        <label for="division-select">Division</label>
                        <select class="form-control select2" style="width: 100%;" id="division-select" required>
                          <option selected="selected" value="0">Clearance and Permitting Division</option>
                          <option value="1">Environmental Monitoring and Enforcement Division</option>
                          <option value="2">Office of the Regional Director</option>
                        </select>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="section-select">Section</label>
                        <select class="form-control select2" style="width: 100%;" id="section-select" required>
                          <option selected="selected" value="0">Air and Water Permitting Section</option>
                          <option value="1">Environmental Impact Assessment Permitting Section</option>
                          <option value="2">Toxic Chemicals and Hazardous Waste Permitting Section</option>
                          <option value="3">Air and Water Monitoring Section</option>
                          <option value="4">Ambient Monitoring Section and Laboratory</option>
                          <option value="5">Solid Waste Management Section</option>
                          <option value="6">Toxic Chemicals and Hazardous Waste Monitoring Section</option>
                          <option value="7">Planning and Information Systems Management Unit</option>
                          <option value="8">Legal Unit</option>
                          <option value="9">Provincial Environmental Management Unit</option>
                        </select>
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-md-2">
                        <label for="usertype-select">User Type</label>
                        <select class="form-control is-warning" id="usertype-select" required>
                          <option select="selected" value="u">User</option>
                          <option value="a">Administrator</option>
                        </select>
                      </div>
                    </div>


                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary"><i class="far fa-paper-plane"></i> Save Record</button>
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

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<?php 
    include_once 'authentication.php';
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
<script src="../../build/js/newuser.js"></script>
<script src="../../build/js/authentication.js"></script>
<script>
      //Initialize Select2 Elements
      $('.select2').select2()
      var objdashboard = document.getElementById('objdashboard')
      var objusers = document.getElementById('objusers')
      var objuniverse = document.getElementById('objuniverse')
      objuniverse.classList.remove('active')
      objdashboard.classList.remove('active')
      objusers.classList.add('active')
</script>
</body>
</html>
