

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
  <link href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet" />
</head>

<style>

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
              <!-- <li class="breadcrumb-item active"><a href="#" data-toggle="modal" data-target="#recordModal" id="addRecord"><i class="fas fa-plus"></i> Add Monitoring Report</a></li> -->
              <li class="breadcrumb-item active"><a href="#" data-toggle="modal" id="searchBtn"><i class="fas fa-plus"></i> Add Report</a></li>
            </ol>
          </div>
        </div>
        <hr>
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <table id="recordListing" class="table table-bordered table-striped" style="width:100%">
			<thead>
				<tr>
					<th>ID</th>
					<th>Name</th>					
					<th>Age</th>					
					<th>Skills</th>
					<th>Address</th>
					<th>Designation</th>					
					<th>Actions</th>
					<th></th>					
				</tr>
			</thead>
		</table>

    <!-- delete from here -->

        <!-- delete to here -->
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

    <div id="recordModal" class="modal fade">
	    <div class="modal-dialog modal-xl">
    		<form method="post" id="recordForm">
    			<div class="modal-content">
    				<div class="modal-header">
					  	<h4 class="modal-title"><i class="fa fa-plus"></i> Edit Record</h4>
    					<button type="button" class="close" data-dismiss="modal">&times;</button>
    				</div>
    				<div class="modal-body">
						<div class="form-group"
							<label for="name" class="control-label">Name</label>
							<input type="text" class="form-control" id="name" name="name" placeholder="Name" required>			
						</div>
						<div class="form-group">
							<label for="age" class="control-label">Age</label>							
							<input type="number" class="form-control" id="age" name="age" placeholder="Age">							
						</div>	   	
						<div class="form-group">
							<label for="lastname" class="control-label">Skills</label>							
							<input type="text" class="form-control"  id="skills" name="skills" placeholder="Skills" required>							
						</div>	 
						<div class="form-group">
							<label for="address" class="control-label">Address</label>							
							<textarea class="form-control" rows="5" id="address" name="address"></textarea>							
						</div>
						<div class="form-group">
							<label for="lastname" class="control-label">Designation</label>							
							<input type="text" class="form-control" id="designation" name="designation" placeholder="Designation">			
						</div>						
    				</div>
    				<div class="modal-footer">
    					<input type="hidden" name="id" id="id" />
    					<input type="hidden" name="action" id="action" value="" />
    					<input type="submit" name="save" id="save" class="btn btn-info" value="Save" />
    					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    				</div>
    			</div>
    		</form>
    	</div>
    </div>

      <!------------------------------------------------->



      <!------------------------------------------------->
<!-- delete from here -->
<div id="searchModal" class="modal fade">
	<div class="modal-dialog modal-xl modal-body ui-front">
    		<form method="post" id="searchForm">
    			<div class="modal-content">
    				<div class="modal-header">
    				
						<h4 class="modal-title"><i class="fa fa-plus"></i> Edit Record</h4>
    				</div>
    				<div class="modal-body">
						<div class="form-group"
							<label for="name" class="control-label">Names</label>
							<input type="text" class="form-control" id="name1" name="name1" placeholder="Name" required>	
							<span class="success"></span>	
						</div>	
						<div class="form-group">
							<label for="lastname" class="control-label">Skills</label>							
							<input type="text" class="form-control"  id="skills1" name="skills1" placeholder="Skills" required>							
						</div>	
						<div class="form-group">
							<label for="age" class="control-label">Age</label>							
							<input type="number" class="form-control" id="age1" name="age1" placeholder="Age">							
						</div>	 			
    				</div>
    				<div class="modal-footer">
    					<input type="hidden" name="id1" id="id1" />
    					<input type="hidden" name="action1" id="action1" value="" />
    					<input type="submit" name="save1" id="save1" class="btn btn-info" value="Save" />
    					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    				</div>
					
    			</div>
				

    		</form>
    	</div>
<!-- delete to here -->

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
<script src="../../build/js/projectlist.js"></script>
<script src="../../build/js/filterlist.js"></script>
<script src="../../build/js/addreport.js"></script>
<script src="../../build/js/authentication.js"></script>
<script src="../../build/js/ajax.js"></script>	
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

<script
      src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"
      integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    ></script>
	 <!-- CSS -->
	 <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">


