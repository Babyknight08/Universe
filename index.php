<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>EMB8 IIMS</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- IonIcons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="plugins/toastr/toastr.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <style>
        #dashmap {
          height: 650px;
        }
    </style>
</head>
<!--
`body` tag options:

  Apply one or more of the following classes to to the body tag
  to get the desired effect

  * sidebar-collapse
  * sidebar-mini
-->
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
        <a href="index.php" class="nav-link">Home</a>
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
          <a href="logout.php" class="dropdown-item">
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
        include_once 'administrator-nav.php';
    ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <!-- MAP -->
        <div class="row">
          <div class="col-lg-3">
            <div class="card">
              <div class="card-body">
                <form id="form-mapfilter">
                  <label for="map-filter">Filter By:</label>
                  <select class="form-control select2" style="width: 100%" id="map-filter" required>
                    <option value="firm" selected>All Projects</option>
                    <option value="permit">Permits</option>
                    <option value="project">Project Type</option>
                  </select>
                  <hr>
                  <div id="ptype-container" style="display:none">
                    <div class="my-2">
                      <div class="icheck-primary d-inline small">
                          <input type="checkbox" id="ptype-check">
                          <label for="ptype-check"><em>Check to Select All</em></label>
                      </div>
                      <div class="form-group">
                        <label for="filter-ptype">PROJECT TYPE</label>
                        <select id="filter-ptype" class="form-control select2" data-dropdown-css-class="select2" style="width: 100%;">
                          
                        </select>
                      </div>
                    </div>
                    <div class="my-2">
                      <div class="icheck-primary d-inline small">
                          <input type="checkbox" id="pstype-check">
                          <label for="pstype-check"><em>Check to Select All</em></label>
                      </div>
                      <div class="form-group">
                        <label for="filter-pstype">PROJECT SUBTYPE</label>
                        <select id="filter-pstype" class="form-control select2" data-dropdown-css-class="select2" style="width: 100%;">
                          
                        </select>
                      </div>
                    </div>
                    <div class="my-2">
                      <div class="icheck-primary d-inline small">
                          <input type="checkbox" id="psstype-check">
                          <label for="psstype-check"><em>Check to Select All</em></label>
                      </div>                      
                      <div class="form-group">
                        <label for="filter-psstype">PROJECT SPECIFIC TYPE</label>
                        <select id="filter-psstype" class="form-control select2" data-dropdown-css-class="select2" style="width: 100%;">
                          
                        </select>
                      </div>
                    </div>
                    <div class="my-2">
                      <div class="icheck-primary d-inline small">
                          <input type="checkbox" id="pssubtype-check">
                          <label for="pssubtype-check"><em>Check to Select All</em></label>
                      </div>  
                      <div class="form-group">
                        <label for="filter-pssubtype">PROJECT SPECIFIC SUBTYPE</label>
                        <select id="filter-pssubtype" class="form-control select2" data-dropdown-css-class="select2" style="width: 100%;">
                          
                        </select>
                      </div>
                    </div>
                  </div>
                  <div id="permit-container" style="display:none">
                    <div class="my-2">
                      <div class="icheck-primary d-inline small">
                          <input type="checkbox" id="peiss-check">
                          <label for="peiss-check"><em>Check to Select All</em></label>
                      </div>
                      <div class="form-group">
                        <label for="filter-peiss">PEISS REQUIREMENT</label>
                        <select id="filter-peiss" class="form-control select2" data-dropdown-css-class="select2" style="width: 100%;">
                          <option value="ECC">ECC</option>
                          <option value="CNC">CNC</option>
                          <option value="NONE">NONE</option>
                        </select>
                      </div>
                    </div>
                    <div class="my-2">
                      <div class="icheck-primary d-inline small">
                          <input type="checkbox" id="permits-check">
                          <label for="permits-check"><em>Check to Select All</em></label>
                      </div>
                      <div class="form-group">
                        <label for="filter-permits">PERMITS</label>
                        <select id="filter-permits" class="form-control select2" data-dropdown-css-class="select2" style="width: 100%">
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
                      <div class="form-group">
                        <label for="filter-from">DATE FROM</label>
                        <input type="date" id="filter-from" class="form-control">
                      </div>
                      <div class="form-group">
                        <label for="filter-to">DATE TO</label>
                        <input type="date" id="filter-to" class="form-control">
                      </div>
                    </div>
                  </div>
                  <hr>
                  <button type="submit" class="btn btn-primary btn-block">
                    <i class="fas fa-filter"></i> Filter
                  </button>
                </form>
              </div>
            </div>
          </div>
          <div class="col-lg-9">
            <div class="card">
              <div class="card-body">
                <div class="col-md-12">
                  <div class="card">
                    <div class="card-header">
                      <div class="card-title">
                        <i class="fa fa-globe"></i>
                        MAP OF THE UNIVERSE
                      </div>
                      <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-plus"></i>
                      </button>
                      </div>
                    </div>
                    <div class="card-body" style="display:none;">
                      <div class="row">
                        <div class="col-md-3">
                          <div class="description-block">
                            <h1 class="text-primary pt-3" id="label-totalfirms">0</h1>
                            <span>COMPANIES</span>
                          </div>
                        </div>
                        <div class="col-md-9">
                          <div class="description-block col-md-12">
                            <div class="description-header">
                              <canvas id="myChart" style="height:30vh; width:80vw"></canvas>
                            </div>
                          </div>
                        </div>
                      </div>
                      
                    </div>
                  </div>
                </div>
                <div id="dashmap">
                  <!-- THIS SHIT RIGHT HERE IS WHERE THE MAP MAGICALLY APPEARS OUT OF NOWHERE -->
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- CMR -->
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-header border-0">
                <div class="d-flex justify-content-center">
                  <h3>CMR SUBMISSION</h3>
                </div>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-sm-12">
                    <canvas id="cmr-chart" height="200"></canvas>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- PERMITS -->
        <div class="row">
          <div class="col-lg-3">
            <div class="card">
              <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                </div>
              </div>
              <div class="card-body">
                <form id="form-dashboard">
                  <div class="row">
                    <div class="col-sm-6">
                      <label for="year1-select">Year From</label>
                      <select class="form-control select2 select2-purple" data-dropdown-css-class="select2-purple" style="width: 100%;" id="year1-select" required>
                          <!--YEARS WILL BE ADDED VIA JAVASCRIPT-->
                      </select>
                    </div>
                    <div class="col-sm-6">
                      <label for="year2-select">Year To</label>
                      <select class="form-control select2 select2-purple" data-dropdown-css-class="select2-purple" style="width: 100%;" id="year2-select" required>
                          <!--YEARS WILL BE ADDED VIA JAVASCRIPT-->
                      </select>
                    </div> 
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-12">
                      <label for="permits-select">Filter by Permits</label>
                      <select class="form-control select2 select2-purple" data-dropdown-css-class="select2-purple" style="width: 100%;" id="permits-select" required>
                        <option value="ECC" selected>Environmental Compliance Certificate (ECC)</option>
                        <option value="CNC">Certificate of Non-Coverage (CNC)</option>
                        <option value="HWGID">Hazardous Waste Generator ID (HWG-ID)</option>
                        <option value="PTO">Permit to Operate (PTO)</option>
                        <option value="WWDP">Waterwaste Discharge Permit (WWDP)</option>
                        <option value="PCO">Pollution Control Officer (PCO)</option>
                        <option value="PTT">Permit to Transport (PTT)</option>
                        <option value="SQI">Small Quantity Importation (SQI)</option>
                        <option value="CCO-RC">Chemical Control Order - Registration Certificate (CCO-RC)</option>
                        <option value="CCO-IC">Chemical Control Order - Importation Clearance (CCO-IC)</option>
                        <option value="TSD">Treatment Storage and Disposal (TSD)</option>
                        <option value="TRC">Transporter Certificate (TRC)</option>
                        <option value="ODS">Ozone Depleting Substances Clearance (ODS)</option>
                        <option value="PCB">PCB Management Plan (PCB)</option>
                      </select>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-12">
                      <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-search"></i> FILTER</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <div class="col-lg-9">
            <div class="card">
              <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                </div>
              </div>
                <div class="card-body">
                  <div class="d-flex">
                    <!-- <p class="d-flex flex-column">
                      <span class="text-bold text-lg">820</span>
                      <span>Visitors Over Time</span>
                    </p>
                    <p class="ml-auto d-flex flex-column text-right">
                      <span class="text-success">
                        <i class="fas fa-arrow-up"></i> 12.5%
                      </span>
                      <span class="text-muted">Since last week</span>
                    </p> -->
                  </div>
                  <!-- /.d-flex -->

                  <div class="position-relative mb-4">
                    <canvas id="permits-chart" height="200"></canvas>
                  </div>

                  <div class="d-flex flex-row justify-content-end">
                    <!-- <span class="mr-2">
                      <i class="fas fa-square text-primary"></i> This Week
                    </span>

                    <span>
                      <i class="fas fa-square text-gray"></i> Last Week
                    </span> -->
                  </div>
                </div>
            </div>
            <!-- /.card -->
            <!-- /.card -->
          </div>
        </div>
        <div class="row">
          <div class="col-lg-3">
            <div class="card">
              <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                </div>
              </div>
              <div class="card-body">
                <form id="form-subtypes">
                  <div class="row">
                    <div class="form-group col-sm-12">
                        <div class="icheck-purple d-inline">
                            <input type="checkbox" id="all-check" checked>
                            <label for="all-check">Display All</label>
                        </div>                              
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12">
                      <label for="categories-select">Filter by Specific Subtypes</label>
                      <select class="form-control select2 select2-purple" data-dropdown-css-class="select2-purple" style="width: 100%;" id="categories-select" multiple disabled>
                        <!-- FILL OPTIONS THRU AJAX -->
                      </select>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-12">
                      <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-search"></i> FILTER</button>
                      <button type="button" class="btn btn-success btn-block" id="button-summary"><i class="fas fa-file-excel"></i> DOWNLOAD SUMMARY REPORT</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <div class="col-lg-9">
            <div class="card">
              <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                  
                </div>
              </div>
              <div class="card-body table-responsive">
                <small>
                <table class="table table-hover text-nowrap" id="summary-table">
                  <thead>
                    <tr>
                      <th></th>
                      <th colspan=10 style="background-color: orange; text-align: center;">PD 1586</th>
                      <th colspan=5 style="background-color: 	#87CEEB; text-align: center;">RA 9275</th>
                      <th colspan=5 style="background-color: 	#00BFFF; text-align: center;">RA 8749</th>
                      <th colspan=5 style="background-color: 	#C0C0C0; text-align: center;">RA 6969</th>
                      <th colspan=2 style="background-color: 	#00FF7F; text-align: center;">STATUS</th>
                      <th colspan=11 style="background-color: #79a6d2; text-align: center;">COMPLIANCE MONITORING REPORT (CMR)</th>
                    </tr>
                    <tr>
                      <th style="background-color: #FF8C00;">CATEGORIES</th>
                      <th style="background-color: #32CD32;">UNIVERSE</th>
                      <th style="background-color: #32CD32;">ECC ISSUED</th>
                      <th style="background-color: #32CD32;">NOV</th>
                      <th style="background-color: #32CD32;">COVERED</th>
                      <th style="background-color: #32CD32;">WITHOUT ECC BUT WITH PERMITS</th>
                      <th style="background-color: #32CD32;">MONITORED</th>
                      <th style="background-color: #32CD32;">CNC ISSUED</th>
                      <th style="background-color: #32CD32;">NOV</th>
                      <th style="background-color: #32CD32;">COVERED</th>
                      <th style="background-color: #32CD32;">MONITORED</th>
                      <th style="background-color: #90EE90;">WWDP ISSUED</th>
                      <th style="background-color: #90EE90;">NOV</th>
                      <th style="background-color: #90EE90;">COVERED</th>
                      <th style="background-color: #90EE90;">NOT COVERED</th>
                      <th style="background-color: #90EE90;">MONITORED</th>
                      <th style="background-color: #98FB98;">PTO ISSUED</th>
                      <th style="background-color: #98FB98;">NOV</th>
                      <th style="background-color: #98FB98;">COVERED</th>
                      <th style="background-color: #98FB98;">NOT COVERED</th>
                      <th style="background-color: #98FB98;">MONITORED</th>
                      <th style="background-color: #00FA9A;">HWG-ID ISSUED</th>
                      <th style="background-color: #00FA9A;">NOV</th>
                      <th style="background-color: #00FA9A;">COVERED</th>
                      <th style="background-color: #00FA9A;">NOT COVERED</th>
                      <th style="background-color: #00FA9A;">MONITORED</th>
                      <th style="background-color: #F0E68C;">OPERATIONAL</th>
                      <th style="background-color: #F0E68C;">NOT OPERATIONAL</th>
                      <th style="background-color: #79a6d2;">REQUIRED</th>
                      <th style="background-color: #79a6d2;">2018 FIRST SEM</th>
                      <th style="background-color: #79a6d2;">2018 SECOND SEM</th>
                      <th style="background-color: #79a6d2;">2019 FIRST SEM</th>
                      <th style="background-color: #79a6d2;">2019 SECOND SEM</th>
                      <th style="background-color: #79a6d2;">2020 FIRST SEM</th>
                      <th style="background-color: #79a6d2;">2020 SECOND SEM</th>
                      <th style="background-color: #79a6d2;">2021 FIRST SEM</th>
                      <th style="background-color: #79a6d2;">2021 SECOND SEM</th>
                      <th style="background-color: #79a6d2;">2022 FIRST SEM</th>
                      <th style="background-color: #79a6d2;">2022 SECOND SEM</th>
                    </tr>
                  </thead>
                  <tbody>
                          <!-- AJAX CONTENT -->
                  </tbody>
                  <tfoot>
                    <tr>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                    </tr>
                  </tfoot>
                </table>
                </small>
              </div>
            </div>
          </div>
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.1.0-rc
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<?php 
  include_once 'pages/employees/authentication.php';
?>
<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE -->
<script src="dist/js/adminlte.js"></script>
<!-- SweetAlert2 -->
<script src="plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="plugins/toastr/toastr.min.js"></script>
<!-- OPTIONAL SCRIPTS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Select2 -->
<script src="plugins/select2/js/select2.full.min.js"></script>

<!-- DataTables  & Plugins -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="build/js/dashboard.js"></script>
<script src="build/js/maploader.js"></script>
<script src="build/js/cmrchart.js"></script>
<!-- <script src="dist/js/pages/dashboard3.js"></script> -->
<script>
      //Initialize Select2 Elements
      $('.select2').select2()

      var objdashboard = document.getElementById('objdashboard')
      var objusers = document.getElementById('objusers')
      var objuniverse = document.getElementById('objuniverse')

      objdashboard.classList.add('active')
      objusers.classList.remove('active')
      objuniverse.classList.remove('active')

</script>
<script async
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCca2vCoK2BA1mHXfQISbEPi8PmeD_xpgo&callback=initMap">
</script>
</body>
</html>
