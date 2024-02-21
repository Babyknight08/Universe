<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>EMB8 IIMS</title>
  
<!-- Wheel event -->
  <script type="text/javascript" src="https://unpkg.com/default-passive-events"></script>
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
  .swal-wide{
    width:850px !important;
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
            <h1>Projects</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../../index.php">Home</a></li>
              <li class="breadcrumb-item active">Projects</li>
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
        <li class="breadcrumb-item active"><a href="#" name="searchBtn" id="searchBtn" data-target="#staticBackdrop"><i class="fas fa-plus"></i> Add Report</a></li>
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
                <h3 class="card-title"><small>Report Created</small></h3>
              </div>
              <!-- /.card-header -->
                <div class="card-body">
                <table id="recordListing" width="100%" class="table table-hover">
                    <thead>
                    <tr>
                    <th>Report Control No.</th>
                      <th>Project/Establishment Name</th>					
                      <th>Address</th>					
                      <th>ECC</th>
                      <th>Date of Inspection</th>
                      <th>Date and Time Created</th>					
                      <th>Actions</th>
                      <th>Export</th>	
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
                <!-- /.card-body -->
              </form>
         
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

    <div id="recordModal" class="modal fade" id="staticBackdrop" data-backdrop="static">
	    <div class="modal-dialog modal-xl">
    		<form method="post" id="recordForm">
    			<div class="modal-content">
    				<div class="modal-header">
					  	<h4 class="modal-title"><i class="fa fa-plus"></i> Edit Record</h4>
    					<button type="button" class="close" data-dismiss="modal">&times;</button>
    				</div>
    				<div class="modal-body">

            <div class="row">
                <div class="col-md-12">
                  <h4 class="text-secondary"><em>1. General Information</em></h4>
                </div>
            </div>

            <div class="row">
            <div class="form-group col-md-4">
              <label for="reportcontrol">Report Control No.</label>
              <!-- <input type="text" name="reportcontrol" class="form-control" id="reportcontrol" placeholder="Report Control No." autocomplete="off"> -->
              <select name="reportcontrol" id="reportcontrol" class="form-control select2">
                <option value="EIA Monitoring">EIA Monitoring</option>
                <option value="Air Monitoring">Air Monitoring</option>
                <option value="Air Survey">Air Survey</option>
                <option value="Water Monitoring">Water Monitoring</option>
                <option value="Water Survey">Water Survey</option>
              </select>
            </div>

            <div class="form-group col-md-4">
              <label for="doi">Date of Inspection</label>
              <input type="date" name="doi" class="form-control" id="doi" placeholder="Date of Inspection" required>
            </div>

            <div class="form-group col-md-4">
              <label for="missionorder">Mission Order No.</label>
              <!-- <input type="text" name="missionorder" class="form-control" id="missionorder" placeholder="Mission Order No." autocomplete="off"> -->
              <select name="missionorder" id="missionorder" class="form-control select2">
                <option value="Site Monitoring">Site Monitoring</option>
                <option value="Desk Monitoring">Desk Monitoring</option>
              </select>
            </div>
            </div>

          

            <!-- --------------------------- -->
            <div class="row justify-content-center">
            <div class="col-xs m-2">
              <div class="">
              <input type="hidden" name="EIA" value="false" checked style="display:none;">
              </div>
              </div>
              <div class="col-xs m-2">
              <div class="icheck-primary">
              <input type="checkbox" name="EIA" id="EIA" value="true">
              <label for="EIA"><strong>PD1586</strong></label>
              </div>
            </div>


            <div class="col-xs m-2">
              <div class="">
              <input type="hidden" name="CHWMS" value="false" checked style="display:none;">
              </div>
              </div>
              <div class="col-xs m-2">
              <div class="icheck-primary">
              <input type="checkbox" name="CHWMS" id="CHWMS" value="true">
              <label for="CHWMS"><strong>RA6969</strong></label>
              </div>
            </div>


            <div class="col-xs m-2">
              <div class="">
              <input type="hidden" name="Air" value="false" checked style="display:none;">
              </div>
              </div>
              <div class="col-xs m-2">
              <div class="icheck-primary">
              <input type="checkbox" name="Air" id="Air" value="true">
              <label for="Air"><strong>RA8749</strong></label>
              </div>
            </div>


            <div class="col-xs m-2">
              <div class="">
              <input type="hidden" name="Water" value="false" checked style="display:none;">
              </div>
              </div>
              <div class="col-xs m-2">
              <div class="icheck-primary">
              <input type="checkbox" name="Water" id="Water" value="true">
              <label for="Water"><strong>RA9275</strong></label>
              </div>
            </div>


            <div class="col-xs m-2">
              <div class="">
              <input type="hidden" name="SolidWaste" value="false" checked style="display:none;">
              </div>
              </div>
              <div class="col-xs m-2">
              <div class="icheck-primary">
              <input type="checkbox" name="SolidWaste" id="SolidWaste" value="true">
              <label for="SolidWaste"><strong>RA9003</strong></label>
              </div>
            </div>
            </div>
            <!-- --------------------------- -->

            
						<div class="form-group">
							<label for="name" class="control-label">Name of Establishment</label>
							<input type="text" class="form-control" id="name" name="name" placeholder="Name" readonly required>			
						</div>


						<div class="form-group">
							<label for="SpecificAddress" class="control-label">Address</label>							
							<input type="text" class="form-control"  id="SpecificAddress" name="SpecificAddress" placeholder="Specific Address" readonly required>							
						</div>	

          <div class="row">
            <div class="form-grou col-md-4">
							<label for="nob" class="control-label">Nature of Business</label>							
							<input type="text" class="form-control"  id="nob" name="nob" placeholder="Nature of Business" readonly>							
						</div>	
            
            <div class="form-group col-md-4">
              <label for="PSICCode" class="control-label">PSIC Code</label>		
							<select class="form-control select2 js-example-basic-single" name="PSICCode" id="PSICCode">
              <option value="">--Select PSIC Code--</option>
              <option value="Aquaculture (Excluding Fish Pens)">Aquaculture (Excluding Fish Pens)</option>
              <option value="014">014</option>
              <option value="032">032</option>
              <option value="05">05</option>
              <option value="06">06</option>
              <option value="07100">07100</option>
              <option value="0722">0722</option>
              </select>
						</div>	


            <div class="form-group col-md-4">
              <label for="Product" class="control-label">Product</label>		
							<select class="form-control select2" name="Product" id="Product">
              <!-- <option value="">--Select Product--</option> -->
              <option value="">--Select Product--</option>
              <option value="Animal Production">Animal Production</option>
              <option value="Aquaculture (Excluding Fish Pens)">Aquaculture (Excluding Fish Pens)</option>
              <option value="Mining of Coal and Lignite">Mining of Coal and Lignite</option>
              <option value="Extraction of Crude and Petroleum and Natural Gas, and Support Activities">Extraction of Crude and Petroleum and Natural Gas, and Support Activities</option>
              <option value="Mining of Iron Ores">Mining of Iron Ores</option>
              <option value="Mining of Precious Metal Ores">Mining of Precious Metal Ores</option>
              </select>
						</div>
          </div>


          
          <div class="row">
            <div class="form-group col-md-4" >
							<label for="Latitude" class="control-label">Latitude</label>							
							<input type="text" class="form-control"  id="Latitude" name="Latitude" placeholder="Latitude" readonly required>							
						</div>	
            <div class="form-group col-md-4">
							<label for="Longitude" class="control-label">Longitude</label>							
							<input type="text" class="form-control"  id="Longitude" name="Longitude" placeholder="Longitude" readonly required>							
						</div>	
            <div class="form-group col-md-4">
							<label for="YearEstablished" class="control-label">Year Established</label>							
							<input type="date" class="form-control"  id="YearEstablished" name="YearEstablished" placeholder="Year Established">							
						</div>
          </div>

          <div class="row">
              <div class="form-group col-md-4">
                <label for="operating_day">Operating Hours/Day </label>
                <input type="text" class="form-control" name="operating_day" id="operating_day" placeholder="Operation Hours/Day">
              </div>
              <div class="form-group col-md-4">
                <label for="operating_week">Operating Days/Week </label>
                <input type="text" class="form-control" name="operating_week" id="operating_week" placeholder="Operation Days/Week">
              </div>
              <div class="form-group col-md-4">
                <label for="operating_year">Operating Days/Year </label>
                <input type="text" class="form-control" name="operating_year" id="operating_year" placeholder="Operation Days/Year">
              </div>
            </div>




            <div class="row">
              <div class="form-group col-md-4">
                <label for="Product_Line">Product Line </label>
                <input type="text" class="form-control" name="Product_Line" id="Product_Line" placeholder="Product_Line">
              </div>
              <div class="form-group col-md-4">
                <label for="ProdRateECCDeclared">Production Rate ECC Declared(Unit/Day) </label>
                <input type="text" class="form-control" name="ProdRateECCDeclared" id="ProdRateECCDeclared" placeholder="Production Rate Declared">
              </div>
              <div class="form-group col-md-4">
                <label for="ActualProdRate">Actual Production Rate</label>
                <input type="text" class="form-control" name="ActualProdRate" id="ActualProdRate" placeholder="Actual Production Rate">
              </div>
            </div>






          <div class="row">
            <div class="form-group col-md-4" >
                <label for="Mhead" class="control-label">Managing Head</label>							
                <input type="text" class="form-control"  id="MHead" name="MHead" placeholder="Managing Head" >							
              </div>		

              <div class="form-group col-md-4" >
                <label for="PCO" class="control-label">PCO</label>							
                <input type="text" class="form-control"  id="PCO" name="PCO" placeholder="PCO">							
              </div>	

              <div class="form-group col-md-4" >
                <label for="PCOAccreditation" class="control-label">PCO Accreditation</label>							
                <input type="text" class="form-control"  id="PCOAccreditation" name="PCOAccreditation" placeholder="PCO Accreditation" >							
              </div>	
          </div>


          <div class="row">
              <div class="form-group col-md-4">
                <label for="PCOA_Date" class="control-label">Date of Effectivity (PCO Accreditation)</label>							
                <input type="date" class="form-control"  id="PCOA_Date" name="PCOA_Date" placeholder="Date of Effectivity">
              </div>
              <div class="form-group col-md-4">
                <label for="contactnumber" class="control-label">Phone/Fax: </label>							
                <input type="text" class="form-control"  id="contactnumber" name="contactnumber" placeholder="Contact Number">
              </div>
              <div class="form-group col-md-4">
                <label for="email_address" class="control-label">Email Address: </label>							
                <input type="email" class="form-control"  id="email_address" name="email_address" placeholder="Email Address">
              </div>
            </div>



          <div class="row">
            <div class="col-md-12">
              <h4 class="text-secondary"><em>2. Purpose of Verification</em></h4>
            </div>
          </div>

          <div class="row">
            <div class="col-xs m-2">
              <div class="">
              <input type="hidden" name="VerifyAccuracy" value="false" checked style="display:none;">
              </div>
              </div>
              <div class="col-xs m-2">
              <div class="icheck-primary">
              <input type="checkbox" name="VerifyAccuracy" id="verify" value="true">
              <label for="verify">Verify accuracy of information submitted by the establishment pertaining to new permit
                    applications, renewals, or modifications.</label>
              </div>
            </div>
            </div>




  <table class="table table-borderless mx-auto" style="width:70%;">
  <thead>
    <tr>
      <th colspan="3">Permit</th>
      <th>NEW</th>
      <th>RENEW</th>
    </tr>
  </thead>
  <tbody>

    <tr>
      <td>PMPIN Hazardous</td>
      <td></td>
      <td></td>
      <td style="width:15%; display:none;"> 
            <div class="col-md-4">
              <div class="icheck-primary">
                <input type="checkbox" name="PMPIN_Hazardous" id="PMPIN_HazardousNone" value="" checked>
                <label for="PMPIN_HazardousNone"></label>
              </div>
            </div>
      </td>
      <td style="width:15%;"> 
            <div class="col-md-4">
              <div class="icheck-primary">
                <input type="checkbox" name="PMPIN_Hazardous" id="PMPIN_HazardousNew" value="NEW">
                <label for="PMPIN_HazardousNew"></label>
              </div>
            </div>
      </td>
      <td style="width:15%;">
            <div class="col-md-4">
              <div class="icheck-primary">
                <input type="checkbox" name="PMPIN_Hazardous" id="PMPIN_HazardousRenew" value="RENEW">
                <label for="PMPIN_HazardousRenew"></label>
              </div>
            </div>
       </td>
    </tr>

    <tr>
      <td>Hazardous Waste ID Registration</td>
      <td></td>
      <td></td>
      <td style="width:15%; display:none;"> 
            <div class="col-md-4">
              <div class="icheck-primary">
                <input type="checkbox" name="HWIDRegistration" id="HWIDRegistrationNone" value="" checked>
                <label for="HWIDRegistrationNone"></label>
              </div>
            </div>
      </td>
      <td style="width:15%;"> 
            <div class="col-md-4">
              <div class="icheck-primary">
                <input type="checkbox" name="HWIDRegistration" id="HWIDRegistrationNew" value="NEW">
                <label for="HWIDRegistrationNew"></label>
              </div>
            </div>
      </td>
      <td style="width:15%;">
            <div class="col-md-4">
              <div class="icheck-primary">
                <input type="checkbox" name="HWIDRegistration" id="HWIDRegistrationRenew" value="RENEW">
                <label for="HWIDRegistrationRenew"></label>
              </div>
            </div>
       </td>
    </tr>

    <tr>
      <td>Hazardous Waste Transporter Registration</td>
      <td></td>
      <td></td>
      <td style="width:15%; display:none;"> 
            <div class="col-md-4">
              <div class="icheck-primary">
                <input type="checkbox" name="HWTRegistration" id="HWTRegistrationNone" value="" checked>
                <label for="HWTRegistrationNone"></label>
              </div>
            </div>
      </td>
      <td style="width:15%;"> 
            <div class="col-md-4">
              <div class="icheck-primary">
                <input type="checkbox" name="HWTRegistration" id="HWTRegistrationNew" value="NEW">
                <label for="HWTRegistrationNew"></label>
              </div>
            </div>
      </td>
      <td style="width:15%;">
            <div class="col-md-4">
              <div class="icheck-primary">
                <input type="checkbox" name="HWTRegistration" id="HWTRegistrationRenew" value="RENEW">
                <label for="HWTRegistrationRenew"></label>
              </div>
            </div>
       </td>
    </tr>

    <tr>
      <td>HAZARDOUS WASTE TSD REGISTRATION</td>
      <td></td>
      <td></td>
      <td style="width:15%; display:none;"> 
            <div class="col-md-4">
              <div class="icheck-primary">
                <input type="checkbox" name="HWTSDRegistration" id="HWTSDRegistrationNone" value="" checked>
                <label for="HWTSDRegistrationNone"></label>
              </div>
            </div>
      </td>
      <td style="width:15%;"> 
            <div class="col-md-4">
              <div class="icheck-primary">
                <input type="checkbox" name="HWTSDRegistration" id="HWTSDRegistrationNew" value="NEW">
                <label for="HWTSDRegistrationNew"></label>
              </div>
            </div>
      </td>
      <td style="width:15%;">
            <div class="col-md-4">
              <div class="icheck-primary">
                <input type="checkbox" name="HWTSDRegistration" id="HWTSDRegistrationRenew" value="RENEW">
                <label for="HWTSDRegistrationRenew"></label>
              </div>
            </div>
       </td>
    </tr>

    <tr>
      <td>Permit to Operate Air Pollution Control Installation</td>
      <td></td>
      <td></td>
      <td style="width:15%; display:none;"> 
            <div class="col-md-4">
              <div class="icheck-primary">
                <input type="checkbox" name="PTOAPCI" id="PTOAPCINewNone" value="" checked>
                <label for="PTOAPCINewNone"></label>
              </div>
            </div>
      </td>
      <td style="width:15%;"> 
            <div class="col-md-4">
              <div class="icheck-primary">
                <input type="checkbox" name="PTOAPCI" id="PTOAPCINew" value="NEW">
                <label for="PTOAPCINew"></label>
              </div>
            </div>
      </td>
      <td style="width:15%;">
            <div class="col-md-4">
              <div class="icheck-primary">
                <input type="checkbox" name="PTOAPCI" id="PTOAPCIRenew" value="RENEW">
                <label for="PTOAPCIRenew"></label>
              </div>
            </div>
       </td>
    </tr>

    <tr>
      <td>DischargePermit</td>
      <td></td>
      <td></td>
      <td style="width:15%; display:none;"> 
            <div class="col-md-4">
              <div class="icheck-primary">
                <input type="checkbox" name="DischargePermit" id="DischargePermitNone" value="" checked>
                <label for="DischargePermitNone"></label>
              </div>
            </div>
      </td>
      <td style="width:15%;"> 
            <div class="col-md-4">
              <div class="icheck-primary">
                <input type="checkbox" name="DischargePermit" id="DischargePermitNew" value="NEW">
                <label for="DischargePermitNew"></label>
              </div>
            </div>
      </td>
      <td style="width:15%;">
            <div class="col-md-4">
              <div class="icheck-primary">
                <input type="checkbox" name="DischargePermit" id="DischargePermitRenew" value="RENEW">
                <label for="DischargePermitRenew"></label>
              </div>
            </div>
       </td>
    </tr>
    <tr>
      <td>
      <div class="row">
            <div class="col-xs">
              <div class="">
              <input type="hidden" name="otherspv" value="false" checked style="display:none;">
              </div>
              </div>
              <div class="col-xs">
              <div class="icheck-primary">
              <input type="checkbox" name="otherspv" id="otherspv" value="true">
              <label for="otherspv">Others</label>
              </div>
              <div class="col-xs">
              <input type="text" class="form-control" style="display:none" id="otherspv_text" name="otherspv_text">
              </div>
            </div>
          </div>
      </td>
      <td></td>
      <td></td>
      <td></td>
    </tr>
  </tbody>
</table>

   



            <div class="row"> 
            <div class="col-xs ml-2">
              <div class="">
              <input type="hidden" name="determinecompliance" value="false" checked style="display:none;">
              </div>
              </div>
              <div class="col-xs ml-2">
              <div class="icheck-primary">
              <input type="checkbox" name="determinecompliance" id="determinecompliance" value="true" checked>
              <label for="determinecompliance">Determine compliance status with environmental regulation, permit conditions, and other requirements</label>
              </div>
            </div>
            </div>

            <div class="row">
            <div class="col-xs ml-2">
              <div class="">
              <input type="hidden" name="investigatecomplaints" value="false" checked style="display:none;">
              </div>
              </div>
              <div class="col-xs ml-2">
              <div class="icheck-primary">
              <input type="checkbox" name="investigatecomplaints" id="investigatecomplaints" value="true">
              <label for="investigatecomplaints">Investigate community complaints</label>
              </div>
            </div>
            </div>

            <div class="row">
            <div class="col-xs ml-2">
              <div class="">
              <input type="hidden" name="statuscommitments" value="false" checked style="display:none;">
              </div>
              </div>
              <div class="col-xs ml-2">
              <div class="icheck-primary">
              <input type="checkbox" name="statuscommitments" id="statuscommitments" value="true">
              <label for="statuscommitments">Check status of commitment(s)</label>
              </div>
            </div>
            </div>

            <div class="row">
            <div class="col-xs ml-2">
              <div class="">
              <input type="hidden" name="ewatchprogram" value="false" checked style="display:none;">
              </div>
              </div>
              <div class="col-xs ml-2">
              <div class="icheck-primary">
              <input type="checkbox" name="ewatchprogram" id="ewatchprogram" value="true">
              <label for="ewatchprogram">Industrial Ecowatch Program</label>
              </div>
            </div>
            </div>

            <div class="row">
            <div class="col-xs ml-2">
              <div class="">
              <input type="hidden" name="PEPP" value="false" checked style="display:none;">
              </div>
              </div>
              <div class="col-xs ml-2">
              <div class="icheck-primary">
              <input type="checkbox" name="PEPP" id="PEPP" value="true">
              <label for="PEPP">Philippine Environmental Partnership Program (PEPP)</label>
              </div>
            </div>
            </div>

     
          
            <div class="row">
            <div class="col-xs ml-2">
              <div class="">
              <input type="hidden" name="pab" value="false" checked style="display:none;">
              </div>
              </div>
              <div class="col-xs ml-2">
              <div class="icheck-primary">
              <input type="checkbox" name="pab" id="pab" value="true">
              <label for="pab">Pollution Adjudication Board (PAB)</label>
              </div>
            </div>
            </div>
          


            
           <div class="row">
            <div class="col-xs ml-2">
              <div class="">
              <input type="hidden" name="others" value="false" style="display:none;">
              </div>
              </div>
              <div class="col-xs ml-2">
              <div class="icheck-primary">
              <input type="checkbox" name="others" id="others" value="true">
              <label for="others">Others</label>
              </div>
              <div class="col-xs">
              <input type="text" class="form-control" name="others_text" style="display:none" id="others_text"> 
              </div>
            </div>
            </div>



      


            
            <div class="row">
                <div class="col-md-12">
                  <h4 class="text-secondary"><em>3. Compliance Status</em></h4>
                  <p class="text-secondary"><em>3.1 DENR Permits/Licenses/Clearances</em></p>
                </div>
          </div>


          <table class="table">
            <thead>
                  <tr>
                      <th scope="col">Environmental Laws</th>
                      <th scope="col">Permits</th> 
                      <th scope="col">Permit No.</th> 
                      <th scope="col">Date of Issue</th>
                      <th scope="col">Expiry Date</th>
                  </tr>
            </thead>

            <tbody>
                  <tr>
                      <td>PD1586</td>
                      <td>ECC</td>
                      <td><input type="text" class="form-control ECC" id="ECC" name="ECC"></td>
                      <td><input type="date" class="form-control ECC_DOI" id="ECC_DOI" name="ECC_DOI"></td>
                      <td><input type="date" class="form-control ECC_DE" id="ECC_DE" name="ECC_DE"></td>
                  </tr>
                  <tr>
                      <td>RA6969</td>
                      <td>DENR Registry ID</td>
                      <td><input type="text" class="form-control DENRID" id="DENRID" name="DENRID"></td>
                      <td><input type="date" class="form-control DENRID_DOI" id="DENRID_DOI" name="DENRID_DOI"></td>
                      <td><input type="date" class="form-control DENRID_DE" id="DENRID_DE" name="DENRID_DE"></td>
                  </tr>
                  <tr>
                      <td></td>
                      <td>PCL Compliance Certificate</td>            
                      <td><input type="text" class="form-control PCL_Compliance" id="PCL_Compliance" name="PCL_Compliance"></td>
                      <td><input type="date" class="form-control PCL_Compliance_DOI" id="PCL_Compliance_DOI" name="PCL_Compliance_DOI"></td>
                      <td><input type="date" class="form-control PCL_Compliance_DE" id="PCL_Compliance_DE" name="PCL_Compliance_DE"></td>
                  </tr>
                  <tr>
                      <td></td>
                      <td>CCO Registry</td>            
                      <td><input type="text" class="form-control CCO_Registry" id="CCO_Registry" name="CCO_Registry"></td>
                      <td><input type="date" class="form-control CCO_Registry_DOI" id="CCO_Registry_DOI" name="CCO_Registry_DOI"></td>
                      <td><input type="date" class="form-control CCO_Registry_DE" id="CCO_Registry_DE" name="CCO_Registry_DE"></td>
                  </tr>
                  <tr>
                      <td></td>
                      <td>Importation Clearance No.</td>            
                      <td><input type="text" class="form-control Importation_Clearance" id="Importation_Clearance" name="Importation_Clearance"></td>
                      <td><input type="date" class="form-control Importation_Clearance_DOI" id="Importation_Clearance_DOI" name="Importation_Clearance_DOI"></td>
                      <td><input type="date" class="form-control Importation_Clearance_DE" id="Importation_Clearance_DE" name="Importation_Clearance_DE"></td>
                  </tr>
                  <tr>
                      <td></td>
                      <td>Copy of COT issued by licensed TSD Facility</td>            
                      <td><input type="text" class="form-control COT_Issued" id="COT_Issued" name="COT_Issued"></td>
                      <td><input type="date" class="form-control COT_Issued_DOI" id="COT_Issued_DOI" name="COT_Issued_DOI"></td>
                      <td><input type="date" class="form-control COT_Issued_DE" id="COT_Issued_DE" name="COT_Issued_DE"></td>
                  </tr>
                  <tr>
                      <td></td>
                      <td>TSD Registration Certificate</td>            
                      <td><input type="text" class="form-control TSD_RegistrationCert" id="TSD_RegistrationCert" name="TSD_RegistrationCert"></td>
                      <td><input type="date" class="form-control TSD_RegistrationCert_DOI" id="TSD_RegistrationCert_DOI" name="TSD_RegistrationCert_DOI"></td>
                      <td><input type="date" class="form-control TSD_RegistrationCert_DE" id="TSD_RegistrationCert_DE" name="TSD_RegistrationCert_DE"></td>
                  </tr>
                  <tr>
                      <td>RA8749</td>
                      <td>POA No.</td>            
                      <td><input type="text" class="form-control POA_No" id="POA_No" name="POA_No"></td>
                      <td><input type="date" class="form-control POA_No_DOI" id="POA_No_DOI" name="POA_No_DOI"></td>
                      <td><input type="date" class="form-control POA_No_DE" id="POA_No_DE" name="POA_No_DE"></td>
                  </tr>
                  <tr>
                      <td>RA9275</td>
                      <td>Discharge Permit No.</td>            
                      <td><input type="text" class="form-control Discharge_Permit" id="Discharge_Permit" name="Discharge_Permit"></td>
                      <td><input type="date" class="form-control Discharge_Permit_DOI" id="Discharge_Permit_DOI" name="Discharge_Permit_DOI"></td>
                      <td><input type="date" class="form-control Discharge_Permit_DE" id="Discharge_Permit_DE" name="Discharge_Permit_DE"></td>
                  </tr>
                  <tr>
                      <td scope="row">RA9003</td>
                      <td>With MOA/Agreement for residuals disposed off to SLF w/ ECC</td>            
                      <td><input type="text" class="form-control MOA_Agreement" id="MOA_Agreement" name="MOA_Agreement"></td>
                      <td><input type="date" class="form-control MOA_Agreement_DOI" id="MOA_Agreement_DOI" name="MOA_Agreement_DOI"></td>
                      <td><input type="date" class="form-control MOA_Agreement_DE" id="MOA_Agreement_DE" name="MOA_Agreement_DE"></td>
                  </tr>
            </tbody>
        </table>




        <div class="form-group">
				<form name="add_name" id="add_name">
					<div class="table-responsive" >
						<table class="table table-bordered " id="dynamic_field" >
              <thead>
                  <th>ECC Conditions</th>
                  <th>Status</th>
                  <th>ECC Remarks</th>
                  <th>Action</th>
              </thead>
              <tbody>

              </tbody>
						</table>
            <button type="button" class="btn btn-success m-1" id="eccAddrow">Add Conditions</button>
					</div>
				</form>
			</div>






      <div class="row">
        <table class="table">
          <thead>
            <th class="col-sm-3">Applicable Laws and Citation</th>
            <th class="col-sm-3">Compliance Requirements</th>
            <th class="col-sm-2">Compliance</th>
            <th class="col-sm-4">Remarks</th>
          </thead>
        
        
          <tbody>
            <tr><td colspan="6"><p><em>6969 Toxic Substances and Hazardous and Nuclear Wastes Control Act.</em> </p></td></tr>
            <td rowspan="2" class="font-weight-bold">Priority Chemical List</td>
            <td>Valid PCL Compliance</td>
            <td>
              <select class="form-select select2" name="Haz_PCLCompliance" id="Haz_PCLCompliance">
              <Option value="N/A">N/A</Option>
              <Option value="Yes">Yes</Option>
              <Option value = "No">No</Option>
            </select>
            <td> <textarea class="form-control" rows="3" name="Haz_PCLComplianceText" id="Haz_PCLComplianceText"></textarea></td>
            </td>
            </tr>
            <tr>
              <td>Annual Reporting</td>
              <td>
              <select class="form-select select2" name="Annual_Reporting" id="Annual_Reporting">
              <Option value="N/A">N/A</Option>
              <Option value="Yes">Yes</Option>
              <Option value = "No">No</Option>
            </select>
            <td> <textarea class="form-control" rows="3" name="Annual_ReportingText" id="Annual_ReportingText"></textarea></td>

            <td></td>
            </td>
            </tr>



            <tr>
            <td rowspan="2" class="font-weight-bold">Chemical Control Orders</td>
            <td>Biennial Report for those chemicals that are for issuance for CCO</td>
            <td>
              <select class="form-select select2" name="Biennial_Report" id="Biennial_Report">
              <Option value="N/A">N/A</Option>
              <Option value="Yes">Yes</Option>
              <Option value = "No">No</Option>
            </select>
            <td> <textarea class="form-control" rows="3" name="Biennial_ReportText" id="Biennial_ReportText"></textarea></td>
            </td>
            </tr>
            <tr>
              <td>CCO Registration </td>
              <td>
              <select class="form-select select2" name="CCO_Registration" id="CCO_Registration">
              <Option value="N/A">N/A</Option>
              <Option value="Yes">Yes</Option>
              <Option value = "No">No</Option>
            </select>
            <td><textarea class="form-control" rows="3" name="CCO_RegistrationText" id="CCO_RegistrationText"></textarea></td>
            <td></td>
            </td>
            </tr>



            <tr>
            <td rowspan="3" class="font-weight-bold">Importation</td>
            <td>Valid Small Quantity</td>
            <td>
              <select class="form-select select2" name="Importation" id="Importation">
              <Option value="N/A">N/A</Option>
              <Option value="Yes">Yes</Option>
              <Option value = "No">No</Option>
            </select>
            <td> <textarea class="form-control" rows="3" name="ImportationText" id="ImportationText"></textarea></td>
            </td>
            </tr>
            <tr>
              <td>Valid Importance Clearance</td>
              <td>
              <select class="form-select select2" name="Valid_ImportanceClearance" id="Valid_ImportanceClearance">
              <Option value="N/A">N/A</Option>
              <Option value="Yes">Yes</Option>
              <Option value = "No">No</Option>
            </select>
            <td><textarea class="form-control" rows="3" name="Valid_ImportanceClearanceText" id="Valid_ImportanceClearanceText"></textarea></td>
            <td></td>
            </td>
            </tr>
            <tr>
              <td>Bill of Lading</td>
              <td>
              <select class="form-select select2" name="Bill_Lading" id="Bill_Lading">
              <Option value="N/A">N/A</Option>
              <Option value="Yes">Yes</Option>
              <Option value = "No">No</Option>
            </select>
            <td><textarea class="form-control" rows="3" name="Bill_LadingText" id="Bill_LadingText"></textarea></td>
            <td></td>
            </td>
            </tr>

            <tr>
            <td rowspan="3" class="font-weight-bold">Hazardous Waste Generator</td>
            <td>Registration as Hazardous Waste Generator</td>
            <td>
              <select class="form-select select2" name="Registration_HWG" id="Registration_HWG">
              <Option value="N/A">N/A</Option>
              <Option value="Yes">Yes</Option>
              <Option value = "No">No</Option>
            </select>
            <td> <textarea class="form-control" rows="3" name="Registration_HWGText" id="Registration_HWGText"></textarea></td>
            </td>
            </tr>
            <tr>
              <td>With temporary Hazwaste storage facility</td>
              <td>
              <select class="form-select select2" name="Temp_HazStorageFacility" id="Temp_HazStorageFacility">
              <Option value="N/A">N/A</Option>
              <Option value="Yes">Yes</Option>
              <Option value = "No">No</Option>
            </select>
            <td><textarea class="form-control" rows="3" name="Temp_HazStorageFacilityText" id="Temp_HazStorageFacilityText"></textarea></td>
            <td></td>
            </td>
            </tr>
            <tr>
              <td>Reporting of hazardouswaste generated</td>
              <td>
              <select class="form-select select2" name="Report_HazGenerated" id="Report_HazGenerated">
              <Option value="N/A">N/A</Option>
              <Option value="Yes">Yes</Option>
              <Option value = "No">No</Option>
            </select>
            <td><textarea class="form-control" rows="3" name="Report_HazGeneratedText" id="Report_HazGeneratedText"></textarea></td>
            <td></td>
            </td>
            </tr>



            <tr>
            <td rowspan="3" class="font-weight-bold">Hazardous Waste and Labelling </td>
            <td>Hazardous Waste Properly Labelled</td>
            <td>
              <select class="form-select select2" name="Haz_WasteLabelled" id="Haz_WasteLabelled">
              <Option value="N/A">N/A</Option>
              <Option value="Yes">Yes</Option>
              <Option value = "No">No</Option>
            </select>
            <td> <textarea class="form-control" rows="3" name="Haz_WasteLabelledText" id="Haz_WasteLabelledText"></textarea></td>
            </td>
            </tr>
            <tr>
              <td>Valid Permit to Transport</td>
              <td>
              <select class="form-select select2" name="Valid_PermitTranspo" id="Valid_PermitTranspo">
              <Option value="N/A">N/A</Option>
              <Option value="Yes">Yes</Option>
              <Option value = "No">No</Option>
            </select>
            <td><textarea class="form-control" rows="3" name="Valid_PermitTranspoText" id="Valid_PermitTranspoText"></textarea></td>
            <td></td>
            </td>
            </tr>
            <tr>
              <td>Valid Registration of Transporters and Treaters</td>
              <td>
              <select class="form-select select2" name="Valid_RegTranspoTreaters" id="Valid_RegTranspoTreaters">
              <Option value="N/A">N/A</Option>
              <Option value="Yes">Yes</Option>
              <Option value = "No">No</Option>
            </select>
            <td><textarea class="form-control" rows="3" name="Valid_RegTranspoTreatersText" id="Valid_RegTranspoTreatersText"></textarea></td>
            <td></td>
            </td>
            </tr>




            <tr>
            <td rowspan="2" class="font-weight-bold">Waste Transporter; Waste Transport Record; Waste Treatment and Disposal Premises </td>
            <td>Compliance with Manifest System (Waste Transport Record)</td>
            <td>
              <select class="form-select select2" name="Waste_Transporter" id="Waste_Transporter">
              <Option value="N/A">N/A</Option>
              <Option value="Yes">Yes</Option>
              <Option value = "No">No</Option>
            </select>
            <td> <textarea class="form-control" rows="3" name="Waste_TransporterText" id="Waste_TransporterText"></textarea></td>
            </td>
            </tr>
            <tr>
              <td>Valid/completed certificate of treatment</td>
              <td>
              <select class="form-select select2" name="Valid_CertTreatment" id="Valid_CertTreatment">
              <Option value="N/A">N/A</Option>
              <Option value="Yes">Yes</Option>
              <Option value = "No">No</Option>
            </select>
            <td><textarea class="form-control" rows="3" name="Valid_CertTreatmentText" id="Valid_CertTreatmentText"></textarea></td>
            <td></td>
            </td>
            </tr>

          </tbody>
        </table>
      </div>







      <div class="row">
        <table class="table">
          <thead>
            <th class="col-sm-3">Applicable Laws and Citation</th>
            <th class="col-sm-3">Compliance Requirements</th>
            <th class="col-sm-2">Compliance</th>
            <th class="col-sm-4">Remarks</th>
          </thead>
        
        
          <tbody>
            <tr><td colspan="6"><p><em>RA 8749: Philippine Clean Air Act.</em> </p></td></tr>
            <td rowspan="9" class="font-weight-bold">Permit to Operate Air</td>
            <td>With Valid POA</td>
            <td>
              <select class="form-select select2" name="Air_ValidPOA" id="Air_ValidPOA">
              <Option value="N/A">N/A</Option>
              <Option value="Yes">Yes</Option>
              <Option value = "No">No</Option>
            </select>
            <td> <textarea class="form-control" rows="3" name="Air_ValidPOAText" id="Air_ValidPOAText"></textarea></td>
            </td>
            </tr>

            <tr>
              <td>All emission sources is covered by a valid POA</td>
              <td>
              <select class="form-select select2" name="Air_EmissionPOA" id="Air_EmissionPOA">
              <Option value="N/A">N/A</Option>
              <Option value="Yes">Yes</Option>
              <Option value = "No">No</Option>
              </select>
              <td> <textarea class="form-control" rows="3" name="Air_EmissionPOAText" id="Air_EmissionPOAText"></textarea></td>
              </td>
            </tr>

            <tr>
              <td>POA is displayed in a conspicuous place near the installation</td>
              <td>
              <select class="form-select select2" name="Air_DisplayInstallation" id="Air_DisplayInstallation">
              <Option value="N/A">N/A</Option>
              <Option value="Yes">Yes</Option>
              <Option value = "No">No</Option>
              </select>
              <td> <textarea class="form-control" rows="3" name="Air_DisplayInstallationText" id="Air_DisplayInstallationText"></textarea></td>
              </td>
            </tr>

            <tr>
              <td>All permit conditions are complied with</td>
              <td>
              <select class="form-select select2" name="Air_PermitCondition" id="Air_PermitCondition">
              <Option value="N/A">N/A</Option>
              <Option value="Yes">Yes</Option>
              <Option value = "No">No</Option>
              </select>
              <td> <textarea class="form-control" rows="3" name="Air_PermitConditionText" id="Air_PermitConditionText"></textarea></td>
              </td>
            </tr>

            <tr>
              <td>Wind direction device is installed (if applicable)</td>
              <td>
              <select class="form-select select2" name="Air_WindDevice" id="Air_WindDevice">
              <Option value="N/A">N/A</Option>
              <Option value="Yes">Yes</Option>
              <Option value = "No">No</Option>
              </select>
              <td> <textarea class="form-control" rows="3" name="Air_WindDeviceText" id="Air_WindDeviceText"></textarea></td>
              </td>
            </tr>

            <tr>
              <td>Plant operational problems lasting for more than 1 hour should be reported to EMB within 24 hours</td>
              <td>
              <select class="form-select select2" name="Air_PlantOperationProblem" id="Air_PlantOperationProblem">
              <Option value="N/A">N/A</Option>
              <Option value="Yes">Yes</Option>
              <Option value = "No">No</Option>
              </select>
              <td> <textarea class="form-control" rows="3" name="Air_PlantOperationProblemText" id="Air_PlantOperationProblemText"></textarea></td>
              </td>
            </tr>

            <tr>
              <td>CCTV installed (for large sources only)</td>
              <td>
              <select class="form-select select2" name="Air_CCTVInstalled" id="Air_CCTVInstalled">
              <Option value="N/A">N/A</Option>
              <Option value="Yes">Yes</Option>
              <Option value = "No">No</Option>
              </select>
              <td> <textarea class="form-control" rows="3" name="Air_CCTVInstalledText" id="Air_CCTVInstalledText"></textarea></td>
              </td>
            </tr>

            <tr>
              <td>CEMS/PEMS installed (for petroleum refineries, power/cement plants or sources emitting 750 Tone/yr)</td>
              <td>
              <select class="form-select select2" name="Air_CEMSorPEMS" id="Air_CEMSorPEMS">
              <Option value="N/A">N/A</Option>
              <Option value="Yes">Yes</Option>
              <Option value = "No">No</Option>
              </select>
              <td> <textarea class="form-control" rows="3" name="Air_CEMSorPEMSText" id="Air_CEMSorPEMSText"></textarea></td>
              </td>
            </tr>

            <tr>
              <td>Yearly RATA/Quarterly CGA conducted (for sources with CEMS)</td>
              <td>
              <select class="form-select select2" name="Air_YearlyRATA" id="Air_YearlyRATA">
              <Option value="N/A">N/A</Option>
              <Option value="Yes">Yes</Option>
              <Option value = "No">No</Option>
              </select>
              <td> <textarea class="form-control" rows="3" name="Air_YearlyRATAText" id="Air_YearlyRATAText"></textarea></td>
              </td>
            </tr>

            
            <td class="font-weight-bold">Emission Testing (If applicable)</td>
            <td>Compliance with emission standards?</td>
            <td>
              <select class="form-select select2" name="Air_EmissionTestStandard" id="Air_EmissionTestStandard">
              <Option value="N/A">N/A</Option>
              <Option value="Yes">Yes</Option>
              <Option value = "No">No</Option>
            </select>
            <td> <textarea class="form-control" rows="3" name="Air_EmissionTestStandardText" id="Air_EmissionTestStandardText"></textarea></td>
            </td>
            </tr>

            <td class="font-weight-bold">Ambient Testing (if applicable)</td>
            <td>Compliance with ambient air quality standards?</td>
            <td>
              <select class="form-select select2" name="Air_AmbientQualityStandard" id="Air_AmbientQualityStandard">
              <Option value="N/A">N/A</Option>
              <Option value="Yes">Yes</Option>
              <Option value = "No">No</Option>
              </select>
            <td> <textarea class="form-control" rows="3" name="Air_AmbientQualityStandardText" id="Air_AmbientQualityStandardText"></textarea></td>
            </td>
            </tr>

        

          </tbody>
        </table>
      </div>




      <div class="row">
        <table class="table">
          <thead>
            <th class="col-sm-3">Applicable Laws and Citation</th>
            <th class="col-sm-3">Compliance Requirements</th>
            <th class="col-sm-2">Compliance</th>
            <th class="col-sm-4">Remarks</th>
          </thead>
        
        
          <tbody>
            <tr><td colspan="5"><p><em>RA 9275: Philippine Clean Water Act</em> </p></td></tr>
            <td rowspan="5" class="font-weight-bold">Discharge Permit (DP)</td>
            <td>With valid Discharge Permit </td>
            <td>
              <select class="form-select select2" name="Water_ValidDP" id="Water_ValidDP">
              <Option value="N/A">N/A</Option>
              <Option value="Yes">Yes</Option>
              <Option value = "No">No</Option>
            </select>
            <td> <textarea class="form-control" rows="3" name="Water_ValidDPText" id="Water_ValidDPText"></textarea></td>
            </td>
            </tr>

            <tr>
              <td>Volume of discharge consistent with DP issued?</td>
              <td>
              <select class="form-select select2" name="Water_VolumeDP" id="Water_VolumeDP">
              <Option value="N/A">N/A</Option>
              <Option value="Yes">Yes</Option>
              <Option value = "No">No</Option>
              </select>
              <td> <textarea class="form-control" rows="3" name="Water_VolumeDPText" id="Water_VolumeDPText"></textarea></td>
              </td>
            </tr>

            <tr>
              <td>All permit conditions are complied with?</td>
              <td>
              <select class="form-select select2" name="Water_PermitsComplied" id="Water_PermitsComplied">
              <Option value="N/A">N/A</Option>
              <Option value="Yes">Yes</Option>
              <Option value = "No">No</Option>
              </select>
              <td> <textarea class="form-control" rows="3" name="Water_PermitsCompliedText" id="Water_PermitsCompliedText"></textarea></td>
              </td>
            </tr>

            <tr>
              <td>With working flow metering device (if applicable)</td>
              <td>
              <select class="form-select select2" name="Water_FlowMeterDevice" id="Water_FlowMeterDevice">
              <Option value="N/A">N/A</Option>
              <Option value="Yes">Yes</Option>
              <Option value = "No">No</Option>
              </select>
              <td><textarea class="form-control" rows="3" name="Water_FlowMeterDeviceText" id="Water_FlowMeterDeviceText"></textarea></td>
              </td>
            </tr>

            <tr>
              <td>Certified septage siphoning hauled by accredited service provider. </td>
              <td>
              <select class="form-select select2" id="Water_CertifiedSiphoning" name="Water_CertifiedSiphoning">
              <Option value="N/A">N/A</Option>
              <Option value="Yes">Yes</Option>
              <Option value = "No">No</Option>
              </select>
              <td> <textarea class="form-control" rows="3" id="Water_CertifiedSiphoningText" name="Water_CertifiedSiphoningText"></textarea></td>
              </td>
            </tr>

            

            <td class="font-weight-bold">Effluent Test Results (if applicable)</td>
            <td>In compliance with effluent standards</td>
            <td>
              <select class="form-select select2" name="Water_ComplianceEffluent" id="Water_ComplianceEffluent">
              <Option value="N/A">N/A</Option>
              <Option value="Yes">Yes</Option>
              <Option value = "No">No</Option>
            </select>
            <td> <textarea class="form-control" rows="3" name="Water_ComplianceEffluentText" id="Water_ComplianceEffluentText"></textarea></td>
            </td>
            
            </tr>


            <td class="font-weight-bold">Ambient water quality monitoring (if applicable)</td>
            <td>With ambient water quality monitoring results</td>
            <td>
              <select class="form-select select2" name="Water_AmbientQualityMonitoring" id="Water_AmbientQualityMonitoring">
              <Option value="N/A">N/A</Option>
              <Option value="Yes">Yes</Option>
              <Option value = "No">No</Option>
            </select>
            <td><textarea class="form-control" rows="3" name="Water_AmbientQualityMonitoringText" id="Water_AmbientQualityMonitoringText"></textarea></td>
            </td>
            
            </tr>

            <td class="font-weight-bold">Wastewater charge system (if applicable)</td>
            <td>Payment of wastewater charges</td>
            <td>
              <select class="form-select select2" name="Water_PaymentWastewater" id="Water_PaymentWastewater">
              <Option value="N/A">N/A</Option>
              <Option value="Yes">Yes</Option>
              <Option value = "No">No</Option>
            </select>
            <td> <textarea class="form-control" rows="3" name="Water_PaymentWastewaterText" id="Water_PaymentWastewaterText"></textarea></td>
            </td>
            
            </tr>

          </tbody>
        </table>
      </div>


      <div class="row">
        <table class="table">
          <thead>
            <th class="col-sm-3">Applicable Laws and Citation</th>
            <th class="col-sm-3">Compliance Requirements</th>
            <th class="col-sm-2">Compliance</th>
            <th class="col-sm-4">Remarks</th>
          </thead>
        
        
          <tbody>
            <tr><td colspan="5"><p><em>RA 9003 Ecological Solid Waste Management</em> </p></td></tr>
            <td class="font-weight-bold">Waste Segregation</td>
            <td>Practice of Waste Segregation </td>
            <td>
              <select class="form-select select2" name="SWM_WasteSegregation" id="SWM_WasteSegregation">
              <Option value="N/A">N/A</Option>
              <Option value="Yes">Yes</Option>
              <Option value = "No">No</Option>
            </select>
            <td> <textarea class="form-control" rows="3" name="SWM_WasteSegregationText" id="SWM_WasteSegregationText"></textarea></td>
            </td>
            </tr>
            <tr>
            <td class="font-weight-bold">Solid Waste Disposal Facilities</td>
            <td>Installation of necessary controls for waste treatment and disposal facility</td>
            <td>
              <select class="form-select select2" name="SWM_WasteDisposalFacilities" id="SWM_WasteDisposalFacilities">
              <Option value="N/A">N/A</Option>
              <Option value="Yes">Yes</Option>
              <Option value = "No">No</Option>
            </select>
            <td> <textarea class="form-control" rows="3" name="SWM_WasteDisposalFacilitiesText" id="SWM_WasteDisposalFacilitiesText"></textarea></td>
            </td>
            </tr>
            </tbody>
        </table>
       </div>


       <div class="row">
        <table class="table">
          <thead>
            <th class="col-sm-3">Applicable Laws and Citation</th>
            <th class="col-sm-3">Compliance Requirements</th>
            <th class="col-sm-2">Compliance</th>
            <th class="col-sm-4">Remarks</th>
          </thead>
        
        
          <tbody>
            <tr><td colspan="5"><p><em>Pollution Control Officer Accreditation</em> </p></td></tr>
            <td class="font-weight-bold">DAO 1992-26 or Revised Guidelines on PCO Accreditation</td>
            <td>Valid Accreditation of PCO </td>
            <td>
              <select class="form-select select2" name="PCO_Guidelines" id="PCO_Guidelines">
              <Option value="N/A">N/A</Option>
              <Option value="Yes">Yes</Option>
              <Option value = "No">No</Option>
            </select>
            <td> <textarea class="form-control" rows="3" name="PCO_GuidelinesText" id="PCO_GuidelinesText"></textarea></td>
            </td>
            </tr>
           
            </tbody>
        </table>
       </div>

       <div class="row">
        <table class="table">
          <thead>
            <th class="col-sm-3">Applicable Laws and Citation</th>
            <th class="col-sm-3">Compliance Requirements</th>
            <th class="col-sm-2">Compliance</th>
            <th class="col-sm-4">Remarks</th>
          </thead>
        
        
          <tbody>
            <tr><td colspan="5"><p><em>Self Monitoring Report</em> </p></td></tr>
            <td class="font-weight-bold">DAO 2003-27</td>
            <td>Complete and Timely submission of SMR's</td>
            <td>
              <select class="form-select select2" name="DAO_SMRSubmission" id="DAO_SMRSubmission">
              <Option value="N/A">N/A</Option>
              <Option value="Yes">Yes</Option>
              <Option value = "No">No</Option>
            </select>
            <td> <textarea class="form-control" rows="3" name="DAO_SMRSubmissionText" id="DAO_SMRSubmissionText"></textarea></td>
            </td>
            </tr>
            </tbody>
        </table>
       </div>



       <div class="row">
                <div class="col-md-12">
                  <h4 class="text-secondary"><em>3.3 Summary of Findings and Observations</em></h4>
                  <p class="text-secondary"><em>3.3.1 Environmental Impact System</em></p>
                </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="icheck-success">
                <input type="radio" name="EIS_System" id="checkboxEIS_SystemA" value="Compliant">
                <label for="checkboxEIS_SystemA">Compliant</label>
              </div>
            </div>
            <div class="col-md-4">
              <div class="icheck-success">
                <input type="radio" name="EIS_System" id="checkboxEIS_SystemB" value="Non-Compliant">
                <label for="checkboxEIS_SystemB">Non-Compliant</label>
              </div>
            </div>
            <div class="col-md-4">
              <div class="icheck-success">
                <input type="radio" name="EIS_System" id="checkboxEIS_SystemC" value="Not Applicable" checked>
                <label for="checkboxEIS_SystemC">Not Applicable</label>
              </div>
            </div>
          </div>


          <div class="container mt-3" id="eissDataContainer" style="display:none;">
                  <div class="row">
                    <div class="col-12">
           
                      <table class="table table-bordered" id="table_eiss">
                        <thead>
                          <tr>
                            <th>Recommendations</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                        </tbody>
                      </table>
                      <td><input type="text" class="form-control" name="eissData[]" style="display:none;"></td>
                      <button type="button" class="btn btn-success mb-2" id="add_eiss">Add</button>
                    </div>
                  </div>
                </div>




          <div class="row">
                <div class="col-md-12">
                  <p class="text-secondary"><em>3.3.2 Chemical Management</em></p>
                </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="icheck-success">
                <input type="radio" name="Chemical_Management" id="Chemical_ManagementA" value="Compliant">
                <label for="Chemical_ManagementA">Compliant</label>
              </div>
            </div>
            <div class="col-md-4">
              <div class="icheck-success">
                <input type="radio" name="Chemical_Management" id="Chemical_ManagementB" value="Non-Compliant">
                <label for="Chemical_ManagementB">Non-Compliant</label>
              </div>
            </div>
            <div class="col-md-4">
              <div class="icheck-success">
                <input type="radio" name="Chemical_Management" id="Chemical_ManagementC" value="Not Applicable" checked>
                <label for="Chemical_ManagementC">Not Applicable</label>
              </div>
            </div>
          </div>


          <div class="container mt-3" id="Chemical_ManagementContainer" style="display:none;">
            <div class="row">
              <div class="col-12">

                <table class="table table-bordered" id="table_Chemical_Management">
                  <thead>
                    <tr>
                      <th>Recommendations</th>
                      <th>Actions</th>
                    </tr>
                  </thead>

                  <tbody id = "tbody_chem_management">
                  </tbody>
                </table>               
                      <td><input type="text" name="Chemical_Management_Data[]" id="Chemical_Management_Data[]" class="form-contdol" style="display:none;"/></td>
                      <button type="button" class="btn btn-success mb-2" id="add_Chemical_Management">Add</button>
              </div>
            </div>
          </div>


          <div class="row">
                <div class="col-md-12">
                  <p class="text-secondary"><em>3.3.3 Hazardous Waste Management</em></p>
                </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="icheck-success">
                <input type="radio" name="HW_Management" id="HW_ManagementA" value="Compliant">
                <label for="HW_ManagementA">Compliant</label>
              </div>
            </div>
            <div class="col-md-4">
              <div class="icheck-success">
                <input type="radio" name="HW_Management" id="HW_ManagementB" value="Non-Compliant">
                <label for="HW_ManagementB">Non-Compliant</label>
              </div>
            </div>
            <div class="col-md-4">
              <div class="icheck-success">
                <input type="radio" name="HW_Management" id="HW_ManagementC" value="Not Applicable" checked>
                <label for="HW_ManagementC">Not Applicable</label>
              </div>
            </div>
          </div>

          <div class="container mt-3" id="HW_ManagementContainer" style="display:none;">
            <div class="row">
              <div class="col-12">
                <table class="table table-bordered" id="table_HW_Management">
                  <thead>
                    <tr>
                      <th>Recommendations</th>
                      <th>Actions</th>
                    </tr>
                  </thead>

                  <tbody id= "tbody_hw_management">
                  </tbody>
                </table>
                      <td><input type="text" name="HW_Management_Data[]" id="HW_Management_Data[]" class="form-control" style="display:none;" /></td>
                      <button type="button" class="btn btn-success mb-2" id="add_HW_Management" name="add_HW_Management">Add</button>
              </div>
            </div>
          </div>



          <div class="row">
                <div class="col-md-12">
                  <p class="text-secondary"><em>3.3.4 Air Quality Management</em></p>
                </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="icheck-success">
                <input type="radio" name="AQ_Management" id="AQ_ManagementA" value="Compliant">
                <label for="AQ_ManagementA">Compliant</label>
              </div>
            </div>
            <div class="col-md-4">
              <div class="icheck-success">
                <input type="radio" name="AQ_Management" id="AQ_ManagementB" value="Non-Compliant">
                <label for="AQ_ManagementB">Non-Compliant</label>
              </div>
            </div>
            <div class="col-md-4">
              <div class="icheck-success">
                <input type="radio" name="AQ_Management" id="AQ_ManagementC" value="Not Applicable" checked>
                <label for="AQ_ManagementC">Not Applicable</label>
              </div>
            </div>
          </div>

          
          <div class="container mt-3" id="AQ_ManagementContainer" style="display:none;">
            <div class="row">
              <div class="col-12">
                <table class="table table-bordered" id="table_AQ_Management">
                  <thead>
                    <tr>
                      <th>Recommendations</th>
                      <th>Actions</th>
                    </tr>
                  </thead>

                  <tbody id="tbody_aq_management">
                  </tbody>
                  </table>

                  <td><input type="text" name="AQ_Management_Data[]" id="AQ_Management_Data[]" class="form-control" style="display:none;"/></td>
                  <button type="button" class="btn btn-success mb-2" id="add_AQ_Management">Add</button>
              </div>
            </div>
          </div>



          <div class="row">
                <div class="col-md-12">
                  <p class="text-secondary"><em>3.3.5 Water Quality Management</em></p>
                </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="icheck-success">
                <input type="radio" name="WQ_Management" id="WQ_ManagementA" value="Compliant">
                <label for="WQ_ManagementA">Compliant</label>
              </div>
            </div>
            <div class="col-md-4">
              <div class="icheck-success">
                <input type="radio" name="WQ_Management" id="WQ_ManagementB" value="Non-Compliant">
                <label for="WQ_ManagementB">Non-Compliant</label>
              </div>
            </div>
            <div class="col-md-4">
              <div class="icheck-success">
                <input type="radio" name="WQ_Management" id="WQ_ManagementC" value="Not Applicable" checked>
                <label for="WQ_ManagementC">Not Applicable</label>
              </div>
            </div>
          </div>

          <div class="container mt-3" id="WQ_ManagementContainer" style="display:none;">
            <div class="row">
              <div class="col-12">
                <table class="table table-bordered" id="table_WQ_Management">
                  <thead>
                    <tr>
                      <th>Recommendations</th>
                      <th>Actions</th>
                    </tr>
                  </thead>

                  <tbody id="tbody_wq_management">
                  </tbody>
                </table>

                <td><input type="text" name="WQ_Management_Data[]" id="WQ_Management_Data[]" class="form-control" style="display:none"/></td>
                <button type="button" class="btn btn-success mb-2" id="add_WQ_Management">Add</button>
                <!-- <button type="button" name="remove" class="btn btn-danger btn-sm WQ_Management_remove" id="WQ_Management_remove">X</button> -->
              </div>
            </div>
          </div>

          <div class="row">
                <div class="col-md-12">
                  <p class="text-secondary"><em>3.3.6 Solid Waste Management</em></p>
                </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="icheck-success">
                <input type="radio" name="SW_Management" id="SW_ManagementA" value="Compliant">
                <label for="SW_ManagementA">Compliant</label>
              </div>
            </div>
            <div class="col-md-4">
              <div class="icheck-success">
                <input type="radio" name="SW_Management" id="SW_ManagementB" value="Non-Compliant">
                <label for="SW_ManagementB">Non-Compliant</label>
              </div>
            </div>
            <div class="col-md-4">
              <div class="icheck-success">
                <input type="radio" name="SW_Management" id="SW_ManagementC" value="Not Applicable" checked>
                <label for="SW_ManagementC">Not Applicable</label>
              </div>
            </div>
          </div>


          <div class="container mt-3" id="SW_ManagementContainer" style="display:none;">
            <div class="row">
              <div class="col-12">
                <table class="table table-bordered" id="table_SW_Management">
                  <thead>
                    <tr>
                      <th>Recommendations</th>
                      <th>Actions</th>
                    </tr>
                  </thead>

                  <tbody id="tbody_sw_management">
                  </tbody>
                </table>
    
                      <td><input type="text" name="SW_Management_Data[]" id="SW_Management_Data[]" class="form-control" style="display:none;"/></td>
                      <!-- <td><button type="button" name="remove" class="btn btn-danger btn-sm SW_Management1_remove" id="SW_Management1_remove">X</button></td> -->
                     <button type="button" class="btn btn-success mb-2" id="add_SW_Management">Add</button>
   
              </div>
            </div>
          </div>



          <div class="row">
                <div class="col-md-12">
                  <p class="text-secondary"><em>3.3.7 Commitment/s from the previous Technical Conference</em></p>
                </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="icheck-success">
                <input type="radio" name="Commitment_TechCon" id="Commitment_TechConA" value="Compliant">
                <label for="Commitment_TechConA">Compliant</label>
              </div>
            </div>
            <div class="col-md-4">
              <div class="icheck-success">
                <input type="radio" name="Commitment_TechCon" id="Commitment_TechConB" value="Non-Compliant">
                <label for="Commitment_TechConB">Non-Compliant</label>
              </div>
            </div>
            <div class="col-md-4">
              <div class="icheck-success">
                <input type="radio" name="Commitment_TechCon" id="Commitment_TechConC" value="Not Applicable" checked>
                <label for="Commitment_TechConC">Not Applicable</label>
              </div>
            </div>
          </div>

          <div class="container mt-3" id="Commitment_TechConAContainer" style="display:none;">
            <div class="row">
              <div class="col-12">
                <table class="table table-bordered" id="table_TechCon">
                  <thead>
                    <tr>
                      <th>Recommendations</th>
                      <th>Actions</th>
                    </tr>
                  </thead>

                  <tbody id="tbody_tc_management">
                  </tbody>
                </table>

                      <td><input type="text" name="Commitment_TechCon_Data[]" id="Commitment_TechCon_Data[]" class="form-control" style="display:none"/></td>
                      <button type="button" class="btn btn-success mb-2" id="add_Commitment_TechConA">Add</button>
                      <!-- <button type="button" name="remove" class="btn btn-danger btn-sm Commitment_TechCon_remove" id="Commitment_TechCon_remove">X</button> -->
              </div>
            </div>
          </div>
          <!-- --------------------------- -->

          <div class="row mt-4 ml-2"><h4>Recommendations</h4></div>
            <div class="row">
            <div class="col-xs ml-2">
              <div class="">
              <input type="hidden" name="Rec_confirmatorysampling" value="false" checked style="display:none;">
              </div>
              </div>
              <div class="col-xs ml-2">
              <div class="icheck-primary">
              <input type="checkbox" name="Rec_confirmatorysampling" id="Rec_confirmatorysampling" value="true">
              <label for="Rec_confirmatorysampling">For confirmatory sampling/ further monitoring</label>
              </div>
            </div>
            </div>


            <div class="container mt-3" id="Rec_confirmatorysamplingContainer" style="display:none;">
            <div class="row">
              <div class="col-12">
                <table class="table table-bordered" id="table_Rec_confirmatorysampling">
                  <thead>
                    <tr>
                      <th>Others</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody id="tbody_rec_confirmatorysampling">
                  </tbody>
                 </table>
           
                  <input type="text" name="Rec_confirmatorysampling_Data[]" style="display:none;">
                  <button type="button" class="btn btn-success mb-2" id="add_Rec_confirmatorysampling">Add</button>               

              </div>
            </div>
          </div>


        
          <div class="row">
            <div class="col-xs ml-2">
              <div class="">
              <input type="hidden" name="Rec_tempPtoDp" value="false" checked style="display:none;">
              </div>
              </div>
              <div class="col-xs ml-2">
              <div class="icheck-primary">
              <input type="checkbox" name="Rec_tempPtoDp" id="Rec_tempPtoDp" value="true">
              <label for="Rec_tempPtoDp">For issuance of Temporary/Renewal of Permit to Operate (POA) and/or Renewal of Discharge Permit(DP)</label>
              </div>
            </div>
            </div>

            <div class="container mt-3" id="Rec_tempPtoDpContainer" style="display:none;">
            <div class="row">
              <div class="col-12">
                <table class="table table-bordered" id="table_Rec_tempPtoDp">
                  <thead>
                    <tr>
                      <th>Others</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody id="tbody_tempPtoDp">
                  </tbody>
                </table>
                      <td><textarea type="text" name="Rec_tempPtoDp_Data[]" id="Rec_tempPtoDp_Data[]" class="form-control" style="display:none;"></textarea></td>
                      <button type="button" class="btn btn-success mb-2" id="add_Rec_tempPtoDp">Add</button>
                      <!-- <td><button type="button" name="remove" class="btn btn-danger btn-sm Rec_tempPtoDp_remove" id="Rec_tempPtoDp_remove">X</button></td> -->

              </div>
            </div>
          </div>


            <div class="row">
            <div class="col-xs ml-2">
              <div class="">
              <input type="hidden" name="Rec_PCOSem" value="false" checked style="display:none;">
              </div>
              </div>
              <div class="col-xs ml-2">
              <div class="icheck-primary">
              <input type="checkbox" name="Rec_PCOSem" id="Rec_PCOSem" value="true">
              <label for="Rec_PCOSem">For accreditation of Pollution Control Officer (PCO)/Seminar requirement of Managing Head</label>
              </div>
            </div>
            </div>


            <div class="container mt-3" id="Rec_PCOSemContainer" style="display:none;">
            <div class="row">
              <div class="col-12">
                <table class="table table-bordered" id="table_Rec_PCOSem">
                  <thead>
                    <tr>
                      <th>Others</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody id="tbody_Rec_PCOSem">
                  </tbody>
                </table>
                      <td><input type="text" name="Rec_PCOSem_Data[]" id="Rec_PCOSem_Data[]" class="form-control" style="display:none;"></td>
                      <button type="button" class="btn btn-success mb-2" id="add_Rec_PCOSem">Add</button>
              </div>
            </div>
          </div>




          <div class="row">
            <div class="col-xs ml-2">
              <div class="">
              <input type="hidden" name="Rec_SMRCMR_Submission" value="false" checked style="display:none;">
              </div>
              </div>
              <div class="col-xs ml-2">
              <div class="icheck-primary">
              <input type="checkbox" name="Rec_SMRCMR_Submission" id="Rec_SMRCMR_Submission" value="true">
              <label for="Rec_SMRCMR_Submission">For submission of Self Monitoring Report (SMR)/Compliance Monitoring Report (CMR) online</label>
              </div>
            </div>
            </div>


            <div class="container mt-3" id="Rec_SMRCMR_SubmissionContainer" style="display:none;">
            <div class="row">
              <div class="col-12">
                <table class="table table-bordered" id="table_Rec_SMRCMR_Submission">
                  <thead>
                    <tr>
                      <th>Others</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody id="tbody_Rec_SMRCMR_Submission">
                  </tbody>
                </table>
                      <td><input type="text" name="Rec_SMRCMR_Submission_Data[]" id="Rec_SMRCMR_Submission_Data[]" class="form-control" style="display:none;"></td>
                      <button type="button" class="btn btn-success mb-2" id="add_Rec_SMRCMR_Submission">Add</button>

              </div>
            </div>
          </div>



          <div class="row">
            <div class="col-xs ml-2">
              <div class="">
              <input type="hidden" name="Rec_NOMTC" value="false" checked style="display:none;">
              </div>
              </div>
              <div class="col-xs ml-2">
              <div class="icheck-primary">
              <input type="checkbox" name="Rec_NOMTC" id="Rec_NOMTC" value="true">
              <label for="Rec_NOMTC">For issuance of Notice of Meeting (NOM)/Technical Conference (TC)</label>
              </div>
            </div>
            </div>


            <div class="container mt-3" id="Rec_NOMTCContainer" style="display:none;">
            <div class="row">
              <div class="col-12">
                <table class="table table-bordered" id="table_Rec_NOMTC">
                  <thead>
                    <tr>
                      <th>Others</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody id="tbody_Rec_NOMTC">
                  </tbody>
                  </table>
          
                    <td><input type="text" name="Rec_NOMTC_Data[]" id="Rec_NOMTC_Data[]" class="form-control" style="display:none;"></td>
                    <button type="button" class="btn btn-success mb-2" id="add_Rec_NOMTC">Add</button>
                   <!-- <button type="button" name="remove" class="btn btn-danger btn-sm Rec_NOMTC_remove" id="Rec_NOMTC_remove">X</button> -->           
              </div>
            </div>
          </div>


          <div class="row">
            <div class="col-xs ml-2">
              <div class="">
              <input type="hidden" name="Rec_NOVIssuance" value="false" checked style="display:none;">
              </div>
              </div>
              <div class="col-xs ml-2">
              <div class="icheck-primary">
              <input type="checkbox" name="Rec_NOVIssuance" id="Rec_NOVIssuance" value="true">
              <label for="Rec_NOVIssuance">For issuance of Notice of Violation (NOV)</label>
              </div>
            </div>
            </div>
            
            <div class="container mt-3" id="Rec_NOVIssuanceContainer" style="display:none;">
            <div class="row">
              <div class="col-12">
                <table class="table table-bordered" id="table_Rec_NOVIssuance">
                  <thead>
                    <tr>
                      <th>Others</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody id="tbody_Rec_NOVIssuance">
                  </tbody>
                  </table>
                      <td><input type="text" name="Rec_NOVIssuance_Data[]" id="Rec_NOVIssuance_Data[]" class="form-control" style="display:none;"/></td>
                      <button type="button" class="btn btn-success mb-2" id="add_Rec_NOVIssuance">Add</button>
                      <!-- <td><button type="button" name="remove" class="btn btn-danger btn-sm Rec_NOVIssuance_remove" id="Rec_NOVIssuance_remove">X</button></td> -->
         
              </div>
            </div>
          </div>



          <div class="row">
            <div class="col-xs ml-2">
              <div class="">
              <input type="hidden" name="Rec_Issuance5DayCDO" value="false" checked style="display:none;">
              </div>
              </div>
              <div class="col-xs ml-2">
              <div class="icheck-primary">
              <input type="checkbox" name="Rec_Issuance5DayCDO" id="Rec_Issuance5DayCDO" value="true">
              <label for="Rec_Issuance5DayCDO">For issuance of suspension of ECC/5-day CDO </label>
              </div>
            </div>
            </div>

            <div class="container mt-3" id="Rec_Issuance5DayCDOContainer" style="display:none;">
            <div class="row">
              <div class="col-12">
                <table class="table table-bordered" id="table_Rec_Issuance5DayCDO">
                  <thead>
                    <tr>
                      <th>Others</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody id="tbody_Rec_Issuance5DayCDO">
                  </tbody>
                </table>
                      <td><input type="text" name="Rec_Issuance5DayCDO_Data[]" id="Rec_Issuance5DayCDO_Data[]" class="form-control" style="display:none;"></td>
                      <!-- <td><button type="button" name="remove" class="btn btn-danger btn-sm Rec_Issuance5DayCDO_remove" id="Rec_Issuance5DayCDO_remove">X</button></td> -->
                      <button type="button" class="btn btn-success mb-2" id="add_Rec_Issuance5DayCDO">Add</button>
              </div>
            </div>
          </div>



          <div class="row">
            <div class="col-xs ml-2">
              <div class="">
              <input type="hidden" name="Rec_EndorsementPAB" value="false" checked style="display:none;">
              </div>
              </div>
              <div class="col-xs ml-2">
              <div class="icheck-primary">
              <input type="checkbox" name="Rec_EndorsementPAB" id="Rec_EndorsementPAB" value="true">
              <label for="Rec_EndorsementPAB">For endorsement to Pollution Adjudication Board (PAB)</label>
              </div>
            </div>
            </div>

            

            <div class="container mt-3" id="Rec_EndorsementPABContainer" style="display:none;">
            <div class="row">
              <div class="col-12">
                <table class="table table-bordered" id="table_Rec_EndorsementPAB">
                  <thead>
                    <tr>
                      <th>Others</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody id="tbody_Rec_EndorsementPAB">
                  </tbody>
                </table>

                      <td><input type="text" name="Rec_EndorsementPAB_Data[]" id="Rec_EndorsementPAB_Data[]" class="form-control" style="display:none;"></td>
                      <!-- <td><button type="button" name="remove" class="btn btn-danger btn-sm Rec_EndorsementPAB_remove" id="Rec_EndorsementPAB_remove">X</button></td> -->
                      <button type="button" class="btn btn-success mb-2" id="add_Rec_EndorsementPAB">Add</button>

          
              </div>
            </div>
          </div>




          <div class="row">
            <div class="col-xs ml-2">
              <div class="">
              <input type="hidden" name="OtherRecommendations" value="false" checked style="display:none;">
              </div>
              </div>
              <div class="col-xs ml-2">
              <div class="icheck-primary">
              <input type="checkbox" name="OtherRecommendations" id="OtherRecommendations" value="true">
              <label for="OtherRecommendations">Other Recommendations</label>
              </div>
            </div>
            </div>


            <div class="container mt-3" id="OtherRecommendationsContainer" style="display:none;">
            <div class="row" >
              <div class="col-12">
                <table class="table table-bordered" id="table_OtherRecommendations">
                  <thead>
                    <tr>
                      <th>Others Recommendations</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody id="tbody_OtherRecommendations">
                  </tbody>
                </table>
                      <td><input type="text" name="OtherRecommendations_Data[]" id="OtherRecommendations_Data[]" class="form-control" style="display:none;"></td>
                      <!-- <td><button type="button" name="remove" class="btn btn-danger btn-sm OtherRecommendations_remove" id="OtherRecommendations_remove">X</button></td> -->
                      <button type="button" class="btn btn-success mb-2" id="add_recommendation">Add</button>
              </div>
            </div>
          </div>

          <div class="Inspector">
            <label for="submitted">Submitted by: </label>
            <select id="Inspector" class="select2 Inspector" name="Inspector" required>
              <option value="">Select an option</option>
              <option value="ALMIRA O. RIPALDA">Almira O. Ripalda</option>
              <option value="ALEJANDROQUE G. MACATIGUE">Alejandroque G. Macatigue</option>
              <option value="ANAMARIE D. CAVAÑERO">Anamarie D. Cavañero</option>
              <option value="ARNEL L. IFE">Arnel L. Ife</option>
              <option value="CYRIL ANN B. BADEO">Cyril Ann B. Badeo</option>
              <option value="GINNALYN A. ESPOSA">Ginnalyn A. Esposa</option>
              <option value="JANET T. POLEA">Janet T. Polea</option>
              <option value="JEROME C. SALVADOR">Jerome C. Salvador</option>
              <option value="JO ANNE JOY M. DAÑAL-VILLERO">Jo Anne Joy, M. Dañal-Villero</option>
              <option value="JOSEPH R. AURE">Joseph R. Aure</option>
              <option value="JOSEPHINE L. FUENTES">Josephine L. Fuentes</option>
              <option value="LEDANE JOY Y. LAURENTE">Ledane Joy Y. Laurente</option>
              <option value="LIZA A. TAN">Liza A. Tan</option>
              <option value="ROWENA B. PABIA">Rowena B. Pabia</option>
              <option value="ROY ALEXANDER H. TABOADA">Roy Alexander H. Taboada</option>
              <option value="SHARMAINE I. SILLEZA">Sharmaine I. Silleza</option>
              <option value="SHARMAINE RUTH A. LAUZON">Sharmaine Ruth A. Lauzon</option>
              <option value="SWEET ADEL PRIMA">Sweet Adel Prima</option>
              <option value="XAVIER R. LUBIANO">Xavier R. Lubiano</option>
              <option value="ZEUS BRYAN B. LORETO">Zeus Bryan B. Loreto</option>
            </select>
            <br>
            </div>

            <div><input type="checkbox" name="" id="BtnSecondaryInspector">&nbsp; <label for="#" style="font-size:15px;"><i>(Check for secondary inspector)</i></label></div>

            <div id="DivSecondayInspectorContainer" style="display:none;">
            <select id="SecondaryInspector" class="select2 SecondaryInspector" name="SecondaryInspector">
              <option value="">Select an option</option>
              <option value="ALMIRA O. RIPALDA">Almira O. Ripalda</option>
              <option value="ALEJANDROQUE G. MACATIGUE">Alejandroque G. Macatigue</option>
              <option value="ANAMARIE D. CAVAÑERO">Anamarie D. Cavañero</option>
              <option value="ARNEL L. IFE">Arnel L. Ife</option>
              <option value="CYRIL ANN B. BADEO">Cyril Ann B. Badeo</option>
              <option value="GINNALYN A. ESPOSA">Ginnalyn A. Esposa</option>
              <option value="JANET T. POLEA">Janet T. Polea</option>
              <option value="JEROME C. SALVADOR">Jerome C. Salvador</option>
              <option value="JO ANNE JOY M. DAÑAL-VILLERO">Jo Anne Joy, M. Dañal-Villero</option>
              <option value="JOSEPH R. AURE">Joseph R. Aure</option>
              <option value="JOSEPHINE L. FUENTES">Josephine L. Fuentes</option>
              <option value="LEDANE JOY Y. LAURENTE">Ledane Joy Y. Laurente</option>
              <option value="LIZA A. TAN">Liza A. Tan</option>
              <option value="ROWENA B. PABIA">Rowena B. Pabia</option>
              <option value="ROY ALEXANDER H. TABOADA">Roy Alexander H. Taboada</option>
              <option value="SHARMAINE I. SILLEZA">Sharmaine I. Silleza</option>
              <option value="SHARMAINE RUTH A. LAUZON">Sharmaine Ruth A. Lauzon</option>
              <option value="SWEET ADEL PRIMA">Sweet Adel Prima</option>
              <option value="XAVIER R. LUBIANO">Xavier R. Lubiano</option>
              <option value="ZEUS BRYAN B. LORETO">Zeus Bryan B. Loreto</option>
              </select>
            </div>

 


            <div id="DivSignatories">
              <div id="DivCheckedby" style="display:none;">
              <label for="checkedby">Checked by: <span style="color:red">*</span></label>
              <select class="select2" id="SelectCheckedby" name="SelectCheckedby">
              <option value="">Please Select: </option>
              <option value="JOSEPHINE L. FUENTES">Josephine L. Fuentes</option>
              <option value="ARNEL L. IFE">Arnel L. Ife</option>
              <option value="ROWENA B. PABIA">Rowena B. Pabia</option>
              <option value="ALEJANDROQUE G. MACATIGUE">Alejandroque G. Macatigue</option>
              <option value="ANAMARIE D. CAVAÑERO">Anamarie D. Cavañero</option>
            </select>
              </div>

              <div id="DivSectionChief" style="display:none;">
              <label for="sectionchief">Recommending Approval: <span style="color:red">*</span></label>
              <select class="select2" name="SectionChief" id="SelectSectionChief">
              <option value="">Please Select</option>
              <option value="JANET T. POLEA">Janet T. Polea</option>
              <option value="LIZA A. TAN">Liza A. Tan</option>
              <option value="REGGIE R. URMENETA">Reggie R. Urmeneta</option>
            </select>
              </div>
              <div id="DivDivisionChief" style="display:none;">
              <label for="divisionchief">Approval: </label>
              <select class="select2" name="DivisionChief" id="SelectDivisionChief">
              <option value="MANUEL J. SACEDA JR.">Manuel J. Saceda Jr.</option>
              </select>
              </div>
              <div id="DivRD" style="display:none;">
              <label for="RD">Noted: </label>
              <select class="select2" name="RegionalDirector" id="SelectRD">
              <option value="MARTIN JOSE V. DESPI">Martin Jose V. Despi</option>
              </select>
              </div>
            </div>
      


          <!-- --------------------------- -->



    				</div>
    				<div class="modal-footer">
    					<input type="hidden" name="id" id="id" />
    					<input type="hidden" name="action" id="action" value="" />
    					<input type="submit" name="save" id="save" class="btn btn-info" value="Save" />
    					<button type="button" class="btn btn-default" id="closebtn" data-dismiss="modal">Close</button>
    				</div>
    			</div>

    		</form>
    	</div>
    </div>



   
    













<!-- Insert Form -->
      <!-- --------------------------------------------- -->
      <div id="searchModal" class="modal fade" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true" >
	<div class="modal-dialog modal-xl modal-body ui-front">
    		<form enctype="multipart/form-data" method="post" id="searchForm">
    			<div class="modal-content">
    				<div class="modal-header">
						<h4 class="modal-title"><i class="fa fa-plus"></i> Edit Record</h4>
    					<button type="button" class="close" data-dismiss="modal">&times;</button>
    				</div>
    				<div class="modal-body">

            <div class="row">
                      <div class="col-md-12">
                        <h4 class="text-secondary"><em>1. General Information</em></h4>
                      </div>
            </div>
            <div class="row">
            <div class="form-group col-md-4">
              <label for="reportcontrol">Type of Monitoring<span style="color:red">*</span></label>
              <select name="reportcontrol1" id="reportcontrol1" class="select2">
                <option value="EIA Monitoring">EIA Monitoring</option>
                <option value="Air Monitoring">Air Monitoring</option>
                <option value="Air Survey">Air Survey</option>
                <option value="Water Monitoring">Water Monitoring</option>
                <option value="Water Survey">Water Survey</option>
              </select>
            </div>

            <div class="form-group col-md-4">
              <label for="doi">Date of Inspection<span style="color:red">*</span></label>
              <input type="date" name="doi1" class="form-control" id="doi1" placeholder="Date of Inspection" required>
            </div>

            <div class="form-group col-md-4">
              <label for="missionorder">Mission Order No.<span style="color:red">*</span></label>
              <select name="missionorder1" id="missionorder1" class="select2">
                <option value="Site Monitoring">Site Monitoring</option>
                <option value="Desk Monitoring">Desk Monitoring</option>
              </select>
            </div>
            </div>

                    


            <div class="row justify-content-center">
            <div class="col-xs m-2">
              <div class="">
              <input type="hidden" name="EIA1" value="false" checked style="display:none;">
              </div>
              </div>
              <div class="col-xs m-2">
              <div class="icheck-primary">
              <input type="checkbox" name="EIA1" id="EIA1" value="true">
              <label for="EIA1"><strong>PD1586</strong></label>
              </div>
            </div>


            <div class="col-xs m-2">
              <div class="">
              <input type="hidden" name="CHWMS1" value="false" checked style="display:none;">
              </div>
              </div>
              <div class="col-xs m-2">
              <div class="icheck-primary">
              <input type="checkbox" name="CHWMS1" id="CHWMS1" value="true">
              <label for="CHWMS1"><strong>RA6969</strong></label>
              </div>
            </div>


            <div class="col-xs m-2">
              <div class="">
              <input type="hidden" name="Air1" value="false" checked style="display:none;">
              </div>
              </div>
              <div class="col-xs m-2">
              <div class="icheck-primary">
              <input type="checkbox" name="Air1" id="Air1" value="true">
              <label for="Air1"><strong>RA8749</strong></label>
              </div>
            </div>


            <div class="col-xs m-2">
              <div class="">
              <input type="hidden" name="Water1" value="false" checked style="display:none;">
              </div>
              </div>
              <div class="col-xs m-2">
              <div class="icheck-primary">
              <input type="checkbox" name="Water1" id="Water1" value="true">
              <label for="Water1"><strong>RA9275</strong></label>
              </div>
            </div>


            <div class="col-xs m-2">
              <div class="">
              <input type="hidden" name="SolidWaste1" value="false" checked style="display:none;">
              </div>
              </div>
              <div class="col-xs m-2">
              <div class="icheck-primary">
              <input type="checkbox" name="SolidWaste1" id="SolidWaste1" value="true">
              <label for="SolidWaste1"><strong>RA9003</strong></label>
              </div>
            </div>
            </div>


            <div class="form-group">				
							<label for="name1" class="control-label"><strong>Establishment Name<span style="color:red">*</span></strong></label>
              <select name="name1" id="name1" class="form-select select2" required>
            </select>
            
							<span class="success"></span>	
						</div>           
           

						<div class="form-group">
							<label for="SpecificAddress" class="control-label">Address</label>							
							<input type="text" class="form-control"  id="SpecificAddress1" name="SpecificAddress1" placeholder="Specific Address" readonly required>							
						</div>	

            <div class="row">
            <div class="form-group col-md-4">
              <label for="SpecificAddress" class="control-label">Nature of Business</label>							
							<input type="text" class="form-control"  id="nob1" name="nob1" placeholder="Nature of Business" readonly>	
						</div>	

            <div class="form-group col-md-4">
              <label for="PSICCode" class="control-label">PSIC Code<span style="color:red">*</span></label>		
							<select class="form-control select2 PSICCode1" name="PSICCode1" id="PSICCode1">
              <option value="">--Select PSIC Code--</option>
              <option value="014">014</option>
              <option value="032">032</option>
              <option value="05">05</option>
              <option value="06">06</option>
              <option value="07100">07100</option>
              <option value="0722">0722</option>
              <option value="07291">07291</option>
              <option value="07292">07292</option>
              <option value="07293">07293</option>
              <option value="07294">07294</option>
              <option value="08913">08913</option>
              <option value="08914">08914</option>
              <option value="10110">10110</option>
              <option value="10120">10120</option>
              <option value="1020">1020</option>
              <option value="10205">10205</option>
              <option value="1030">1030</option>
              <option value="104">104</option>
              <option value="105">105</option>
              <option value="106">106</option>
              <option value="10610">10610</option>
              <option value="10621">10621</option>
              <option value="107">107</option>
              <option value="1072">1072</option>
              <option value="10800">10800</option>
              <option value="11">11</option>
              <option value="12">12</option>
              <option value="13">13</option>
              <option value="14">14</option>
              <option value="1621">1621</option>
              <option value="17012">17012</option>
              <option value="17013">17013</option>
              <option value="18110">18110</option>
              <option value="19100">19100</option>
              <option value="19200">19200</option>
              <option value="19900">19900</option>
              <option value="20111">20111</option>
              <option value="20114">20114</option>
              <option value="20112">20112</option>
              <option value="20113">20113</option>
              <option value="20116">20116</option>
              <option value="20117">20117</option>
              <option value="20119">20119</option>
              <option value="20115">20115</option>
              <option value="20120">20120</option>
              <option value="2013">2013</option>
              <option value="20210">20210</option>
              <option value="2022">2022</option>
              <option value="20293">20293</option>
              <option value="2023">2023</option>
              <option value="20294">20294</option>
              <option value="20299">20299</option>
              <option value="2030">2030</option>
              <option value="21001">21001</option>
              <option value="2310">2310</option>
              <option value="239">239</option>
              <option value="23940">23940</option>
              <option value="241">241</option>
              <option value="2431">2431</option>
              <option value="24210">24210</option>
              <option value="24220">24220</option>
              <option value="24230">24230</option>
              <option value="24240">24240</option>
              <option value="24290">24290</option>
              <option value="2431">2431</option>
              <option value="2432">2432</option>
              <option value="25920">25920</option>
              <option value="261">261</option>
              <option value="2720">2720</option>
              <option value="35100">35100</option>
              <option value="35200">35200</option>
              <option value="35300">35300</option>
              <option value="36000">36000</option>
              <option value="37000">37000</option>
              <option value="38210">38210</option>
              <option value="38220">38220</option>
              <option value="39000">39000</option>
              <option value="452">452</option>
              <option value="454">454</option>
              <option value="47300">47300</option>
              <option value="4661">4661</option>
              <option value="52104">52104</option>
              <option value="55">55</option>
              <option value="56">56</option>
              <option value="681">681</option>
              <option value="71200">71200</option>
              <option value="7210">7210</option>
              <option value="75">75</option>
              <option value="85">85</option>
              <option value="86">86</option>
              <option value="87">87</option>
              <option value="86900">86900</option>
              <option value="96210">96210</option>
              <option value="96300">96300</option>
              </select>
						</div>	

            <div class="form-group col-md-4">
              <label for="Product" class="control-label">Product<span style="color:red">*</span></label>		
							<select class="form-control select2 Product1" name="Product1" id="Product1">
              <option value="">--Select Product--</option>
              <option value="Animal Production">Animal Production</option>
              <option value="Aquaculture (excluding fish pens)">Aquaculture (excluding fish pens)</option>
              <option value="Mining of coal and lignite">Mining of coal and lignite</option>
              <option value="Extraction of crude petroleum and natural gas, and support activities">Extraction of crude petroleum and natural gas, and support activities</option>
              <option value="Mining of iron ores">Mining of iron ores</option>
              <option value="Mining of precious metal ores - gold, silver, platinum">Mining of precious metal ores - gold, silver, platinum</option>
              <option value="Copper ore mining">Copper ore mining</option>
              <option value="Chromite ore mining">Chromite ore mining</option>
              <option value="Manganese ore mining">Manganese ore mining</option>
              <option value="Nickel ore mining">Nickel ore mining</option>
              <option value="Pyrite mining">Pyrite mining</option>
              <option value="Rock phosphate mining">Rock phosphate mining</option>
              <option value="Slaughtering and meat packing">Slaughtering and meat packing</option>
              <option value="Production processing and preserving of meat and meat products">Production processing and preserving of meat and meat products</option>
              <option value="Processing and preserving of fish, crustaceans and mollusks (except carrageenan)">Processing and preserving of fish, crustaceans and mollusks (except carrageenan)</option>
              <option value="Processing of seaweeds; manufacture of agar-agar or carrageenan">Processing of seaweeds; manufacture of agar-agar or carrageenan</option>
              <option value="Processing and preserving of fruits and vegetables">Processing and preserving of fruits and vegetables</option>
              <option value="Manufacture of vegetable and animal oils and fats">Manufacture of vegetable and animal oils and fats</option>
              <option value="Manufacture of dairy products">Manufacture of dairy products</option>
              <option value="Manufacture of grain mill, products, starches and starch products (except rice, corn, and cassava flour milling)">Manufacture of grain mill, products, starches and starch products (except rice, corn, and cassava flour milling)</option>
              <option value="Rice/ corn milling">Rice/ corn milling</option>
              <option value="Cassava flour milling">Cassava flour milling</option>
              <option value="Manufacture of other food products (except sugar)">Manufacture of other food products (except sugar)</option>
              <option value="Manufacture of sugar - milling and refining">Manufacture of sugar - milling and refining</option>
              <option value="Manufacture of prepared animal feeds">Manufacture of prepared animal feeds</option>
              <option value="Manufacture of beverages">Manufacture of beverages</option>
              <option value="Manufacture of tobacco products">Manufacture of tobacco products</option>
              <option value="Manufacture of textiles">Manufacture of textiles</option>
              <option value="Tanning and dressing of leather">Tanning and dressing of leather</option>
              <option value="Manufacture of veneer sheets; manufacture of plywood, laminated board, particle board and other panels and board; wooden window and screens">Manufacture of veneer sheets; manufacture of plywood, laminated board, particle board and other panels and board; wooden window and screens</option>
              <option value="Pulp milling including manufacture of pulp, paper, and paperboard">Pulp milling including manufacture of pulp, paper, and paperboard</option>
              <option value="Paper and paperboard milling">Paper and paperboard milling</option>
              <option value="Printing">Printing</option>
              <option value="Manufacture of coke oven products">Manufacture of coke oven products</option>
              <option value="Manufacture of refined petroleum products">Manufacture of refined petroleum products</option>
              <option value="Manufacture of other fuel products (biodiesel)">Manufacture of other fuel products (biodiesel)</option>
              <option value="Manufacture of ethanol; Manufacture of ethanol for food, beverage and fuel application; Blending of ethanol for antiseptic and solvent (denatured)">Manufacture of ethanol; Manufacture of ethanol for food, beverage and fuel application; Blending of ethanol for antiseptic and solvent (denatured)</option>
              <option value="Manufacture of industrial (compressed/ liquefied) gases">Manufacture of industrial (compressed/ liquefied) gases</option>
              <option value="Manufacture of inorganic, organic and other basic chemicals">Manufacture of inorganic, organic and other basic chemicals</option>
              <option value="Manufacture of alcohol except ethyl alcohol">Manufacture of alcohol except ethyl alcohol</option>
              <option value="Manufacture of fertilizers and nitrogen compounds">Manufacture of fertilizers and nitrogen compounds</option>
              <option value="Manufacturing of plastics and synthetic rubber in primary forms">Manufacturing of plastics and synthetic rubber in primary forms</option>
              <option value="Manufacture of pesticides and other agro-chemical products">Manufacture of pesticides and other agro-chemical products</option>
              <option value="Manufacture of paints, ink, varnishes and similar coating materials">Manufacture of paints, ink, varnishes and similar coating materials</option>
              <option value="Manufacture of soap and detergents, cleaning and polishing preparations, perfumes and toilet preparations">Manufacture of soap and detergents, cleaning and polishing preparations, perfumes and toilet preparations</option>
              <option value="Manufacture of glues and adhesives; synthetic glues and adhesives; animal/plant derived glues and adhesives">Manufacture of glues and adhesives; synthetic glues and adhesives; animal/plant derived glues and adhesives</option>
              <option value="Manufacture of miscellaneous chemical products, not elsewhere classified">Manufacture of miscellaneous chemical products, not elsewhere classified</option>
              <option value="Manufacture of man-made fibers (except glass fibers)">Manufacture of man-made fibers (except glass fibers)</option>
              <option value="Manufacture of drugs and medicines includingbiological products such as bacterial and virus vaccines, sera and plasma">Manufacture of drugs and medicines includingbiological products such as bacterial and virus vaccines, sera and plasma</option>
              <option value="Manufacture of glass and glass products">Manufacture of glass and glass products</option>
              <option value="Manufacture of ceramics, clay products, construction aggregates, asphalt, asbestos, and other non-metallic minerals (except cement)">Manufacture of ceramics, clay products, construction aggregates, asphalt, asbestos, and other non-metallic minerals (except cement)</option>
              <option value="Manufacture of cement">Manufacture of cement</option>
              <option value="Manufacture of iron and steel">Manufacture of iron and steel</option>
              <option value="Manufacture of precious metals">Manufacture of precious metals</option>
              <option value="Non-ferrous smelting and refining, except precious metals">Non-ferrous smelting and refining, except precious metals</option>
              <option value="Non-ferrous rolling, drawing and extrusion mills">Non-ferrous rolling, drawing and extrusion mills</option>
              <option value="Manufacture of pipe fittings of non-ferrous metal">Manufacture of pipe fittings of non-ferrous metal</option>
              <option value="Manufacture of basic precious and non-ferrous metal, not elsewhere classified">Manufacture of basic precious and non-ferrous metal, not elsewhere classified</option>
              <option value="Casting/ foundry of iron and steel">Casting/ foundry of iron and steel</option>
              <option value="Casting of Non-ferrous metal casting such as aluminum, copper and zinc alloys">Casting of Non-ferrous metal casting such as aluminum, copper and zinc alloys</option>
              <option value="Treatment, coating and machining of metals">Treatment, coating and machining of metals</option>
              <option value="Manufacture of electronic components">Manufacture of electronic components</option>
              <option value="Manufacture of batteries and accumulators">Manufacture of batteries and accumulators</option>
              <option value="Electric power generation (except transmission and distribution): coal, natural">gas; oil (petroleum); geothermal; hydro; biomass;</option>
              <option value="Manufacture of gas; distribution of gaseous fuels through mains">Manufacture of gas; distribution of gaseous fuels through mains</option>
              <option value="Air conditioning supply and production of ice (except steam production)">Air conditioning supply and production of ice (except steam production)</option>
              <option value="Water collection, treatment and supply (except those intended to prevent pollution)">Water collection, treatment and supply (except those intended to prevent pollution)</option>
              <option value="Sewerage (operation of sewer systems or sewage treatment facilities that collect, treat, and dispose of sewage)">Sewerage (operation of sewer systems or sewage treatment facilities that collect, treat, and dispose of sewage)</option>
              <option value="Treatment and disposal of non-hazardous waste">Treatment and disposal of non-hazardous waste</option>
              <option value="Treatment and disposal of hazardous waste">Treatment and disposal of hazardous waste</option>
              <option value="Remediation activities and other waste management services">Remediation activities and other waste management services</option>
              <option value="Maintenance and repair of vehicles, their parts and components (excluding vulcanizing/ tire related preparations)">Maintenance and repair of vehicles, their parts and components (excluding vulcanizing/ tire related preparations)</option>
              <option value="Wholesale and retail sale of automotive fuels">Wholesale and retail sale of automotive fuels</option>
              <option value="Cold Storage">Cold Storage</option>
              <option value="Hotels, motels, resorts, dormitories, and other accommodation services">Hotels, motels, resorts, dormitories, and other accommodation services</option>
              <option value="Restaurants, food chains, bars and other food/ beverage services">Restaurants, food chains, bars and other food/ beverage services</option>
              <option value="Real Estate activities with own or leased property">Real Estate activities with own or leased property</option>
              <option value="Technical Testing and analysis">Technical Testing and analysis</option>
              
              
              
              
              <option value="Research and experimental development and natural sciences and engineering">Research and experimental development and natural sciences and engineering</option>
              <option value="Veterinary activities">Veterinary activities</option>
              <option value="Public and private education (including support activities)">Public and private education (including support activities)</option>
              <option value="Hospitals, clinics, nursing homes and other human health and residential care activities">Hospitals, clinics, nursing homes and other human health and residential care activities</option>
              <option value="Other human health activities- medical laboratories inside and outside of medical facilities">Other human health activities- medical laboratories inside and outside of medical facilities</option>
              <option value="Washing and dry cleaning of textile and fur products">Washing and dry cleaning of textile and fur products</option>
              <option value="Funeral and related activities">Funeral and related activities</option>
             
            </select>
						</div>
            </div>


            <div class="row">
            <div class="form-group col-md-4" >
							<label for="Latitude" class="control-label">Latitude</label>							
							<input type="text" class="form-control"  id="Latitude1" name="Latitude1" placeholder="Latitude" readonly required>							
						</div>	
            <div class="form-group col-md-4">
							<label for="Longitude" class="control-label">Longitude</label>							
							<input type="text" class="form-control"  id="Longitude1" name="Longitude1" placeholder="Longitude" readonly required>							
						</div>	
            <div class="form-group col-md-4">
							<label for="YearEstablished" class="control-label">Year Established<span style="color:red">*</span></label>							
							<input type="date" class="form-control"  id="YearEstablished1" name="YearEstablished1" placeholder="Year Established">							
						</div>
            </div>
 


            <div class="row">
              <div class="form-group col-md-4">
                <label for="operating_day1">Operating Hours/Day </label>
                <input type="text" class="form-control" name="operating_day1" id="operating_day1" placeholder="Operation Hours/Day">
              </div>
              <div class="form-group col-md-4">
                <label for="operating_week1">Operating Days/Week </label>
                <input type="text" class="form-control" name="operating_week1" id="operating_week1" placeholder="Operation Days/Week">
              </div>
              <div class="form-group col-md-4">
                <label for="operating_year1">Operating Days/Year </label>
                <input type="text" class="form-control" name="operating_year1" id="operating_year1" placeholder="Operation Days/Year">
              </div>
            </div>




                
            <div class="row">
                <div class="form-group col-md-4">
                <label for="Product_Line1">Product Line </label>
                <input type="text" class="form-control" name="Product_Line1" id="Product_Line1" placeholder="Product_Line">
                </div>
                 <div class="form-group col-md-4">
                <label for="ProdRateECCDeclared1">Production Rate ECC Declared(Unit/Day) </label>
                <input type="text" class="form-control" name="ProdRateECCDeclared1" id="ProdRateECCDeclared1" placeholder="Production Rate Declared">
                </div>
                <div class="form-group col-md-4">
                <label for="ActualProdRate1">Actual Production Rate</label>
                <input type="text" class="form-control" name="ActualProdRate1" id="ActualProdRate1" placeholder="Actual Production Rate">
                </div>
            </div>



            <div class="row">
            <div class="form-group col-md-4" >
							<label for="Mhead1" class="control-label">Managing Head<span style="color:red">*</span></label>							
							<input type="text" class="form-control"  id="MHead1" name="MHead1" placeholder="Managing Head" >							
						</div>	

            <div class="form-group col-md-4" >
							<label for="PCO1" class="control-label">PCO</label>							
							<input type="text" class="form-control"  id="PCO1" name="PCO1" placeholder="PCO">							
						</div>	

            <div class="form-group col-md-4" >
							<label for="PCOAccreditation1" class="control-label">PCO Accreditation<span style="color:red">*</span></label>							
							<input type="text" class="form-control"  id="PCOAccreditation1" name="PCOAccreditation1" placeholder="PCO Accreditation" >							
						</div>	
            </div>

            <div class="row">
              <div class="form-group col-md-4">
                <label for="PCOA_Date1" class="control-label">Date of Effectivity (PCO Accreditation)</label>							
                <input type="date" class="form-control"  id="PCOA_Date1" name="PCOA_Date1" placeholder="Date of Effectivity">
              </div>
              <div class="form-group col-md-4">
                <label for="contactnumber1" class="control-label">Phone/Fax: </label>							
                <input type="text" class="form-control"  id="contactnumber1" name="contactnumber1" placeholder="Contact Number">
              </div>
              <div class="form-group col-md-4">
                <label for="email_address1" class="control-label">Email Address: </label>							
                <input type="email" class="form-control"  id="email_address1" name="email_address1" placeholder="Email Address">
              </div>
            </div>

            <div class="row">
            <div class="col-md-12">
              <h4 class="text-secondary"><em>2. Purpose of Verification</em></h4>
            </div>
            </div>

      
            <div class="row">
            <div class="col-xs m-2">
              <div class="">
              <input type="hidden" name="VerifyAccuracy1" value="false" checked style="display:none;">
              </div>
              </div>
              <div class="col-xs m-2">
              <div class="icheck-primary">
              <input type="checkbox" name="VerifyAccuracy1" id="VerifyAccuracy1" value="true">
              <label for="VerifyAccuracy1">Verify accuracy of information submitted by the establishment pertaining to new permit
                    applications, renewals, or modifications.</label>
              </div>
            </div>
            </div>

              <table class="table table-borderless mx-auto" style="width:70%;">
              <thead>
                <tr>
                  <th colspan="3">Permit</th>
                  <th>NEW</th>
                  <th>RENEW</th>
                </tr>
              </thead>
              <tbody>

                <tr>
                  <td>PMPIN Hazardous</td>
                  <td></td>
                  <td></td>
                  <td style="width:15%; display:none;"> 
                        <div class="col-md-4">
                          <div class="icheck-primary">
                            <input type="checkbox" name="PMPIN_Hazardous1" id="PMPIN_HazardousNone1" value="" checked>
                            <label for="PMPIN_HazardousNone1"></label>
                          </div>
                        </div>
                  </td>
                  <td style="width:15%;"> 
                        <div class="col-md-4">
                          <div class="icheck-primary">
                            <input type="checkbox" name="PMPIN_Hazardous1" id="PMPIN_HazardousNew1" value="NEW">
                            <label for="PMPIN_HazardousNew1"></label>
                          </div>
                        </div>
                  </td>
                  <td style="width:15%;">
                        <div class="col-md-4">
                          <div class="icheck-primary">
                            <input type="checkbox" name="PMPIN_Hazardous1" id="PMPIN_HazardousRenew1" value="RENEW">
                            <label for="PMPIN_HazardousRenew1"></label>
                          </div>
                        </div>
                  </td>
                </tr>

                <tr>
                  <td>Hazardous Waste ID Registration</td>
                  <td></td>
                  <td></td>
                  <td style="width:15%; display:none;"> 
                        <div class="col-md-4">
                          <div class="icheck-primary">
                            <input type="checkbox" name="HWIDRegistration1" id="HWIDRegistrationNone1" value="" checked>
                            <label for="HWIDRegistrationNone1"></label>
                          </div>
                        </div>
                  </td>
                  <td style="width:15%;"> 
                        <div class="col-md-4">
                          <div class="icheck-primary">
                            <input type="checkbox" name="HWIDRegistration1" id="HWIDRegistrationNew1" value="NEW">
                            <label for="HWIDRegistrationNew1"></label>
                          </div>
                        </div>
                  </td>
                  <td style="width:15%;">
                        <div class="col-md-4">
                          <div class="icheck-primary">
                            <input type="checkbox" name="HWIDRegistration1" id="HWIDRegistrationRenew1" value="RENEW">
                            <label for="HWIDRegistrationRenew1"></label>
                          </div>
                        </div>
                  </td>
                </tr>

                <tr>
                  <td>Hazardous Waste Transporter Registration</td>
                  <td></td>
                  <td></td>
                  <td style="width:15%; display:none;"> 
                        <div class="col-md-4">
                          <div class="icheck-primary">
                            <input type="checkbox" name="HWTRegistration1" id="HWTRegistrationNone1" value="" checked>
                            <label for="HWTRegistrationNone1"></label>
                          </div>
                        </div>
                  </td>
                  <td style="width:15%;"> 
                        <div class="col-md-4">
                          <div class="icheck-primary">
                            <input type="checkbox" name="HWTRegistration1" id="HWTRegistrationNew1" value="NEW">
                            <label for="HWTRegistrationNew1"></label>
                          </div>
                        </div>
                  </td>
                  <td style="width:15%;">
                        <div class="col-md-4">
                          <div class="icheck-primary">
                            <input type="checkbox" name="HWTRegistration1" id="HWTRegistrationRenew1" value="RENEW">
                            <label for="HWTRegistrationRenew1"></label>
                          </div>
                        </div>
                  </td>
                </tr>

                <tr>
                  <td>HAZARDOUS WASTE TSD REGISTRATION</td>
                  <td></td>
                  <td></td>
                  <td style="width:15%; display:none;"> 
                        <div class="col-md-4">
                          <div class="icheck-primary">
                            <input type="checkbox" name="HWTSDRegistration1" id="HWTSDRegistrationNone1" value="" checked>
                            <label for="HWTSDRegistrationNone1"></label>
                          </div>
                        </div>
                  </td>
                  <td style="width:15%;"> 
                        <div class="col-md-4">
                          <div class="icheck-primary">
                            <input type="checkbox" name="HWTSDRegistration1" id="HWTSDRegistrationNew1" value="NEW">
                            <label for="HWTSDRegistrationNew1"></label>
                          </div>
                        </div>
                  </td>
                  <td style="width:15%;">
                        <div class="col-md-4">
                          <div class="icheck-primary">
                            <input type="checkbox" name="HWTSDRegistration1" id="HWTSDRegistrationRenew1" value="RENEW">
                            <label for="HWTSDRegistrationRenew1"></label>
                          </div>
                        </div>
                  </td>
                </tr>

                <tr>
                  <td>Permit to Operate Air Pollution Control Installation</td>
                  <td></td>
                  <td></td>
                  <td style="width:15%; display:none;"> 
                        <div class="col-md-4">
                          <div class="icheck-primary">
                            <input type="checkbox" name="PTOAPCI1" id="PTOAPCINewNone1" value="" checked>
                            <label for="PTOAPCINewNone1"></label>
                          </div>
                        </div>
                  </td>
                  <td style="width:15%;"> 
                        <div class="col-md-4">
                          <div class="icheck-primary">
                            <input type="checkbox" name="PTOAPCI1" id="PTOAPCINew1" value="NEW">
                            <label for="PTOAPCINew1"></label>
                          </div>
                        </div>
                  </td>
                  <td style="width:15%;">
                        <div class="col-md-4">
                          <div class="icheck-primary">
                            <input type="checkbox" name="PTOAPCI1" id="PTOAPCIRenew1" value="RENEW">
                            <label for="PTOAPCIRenew1"></label>
                          </div>
                        </div>
                  </td>
                </tr>

                <tr>
                  <td>DischargePermit</td>
                  <td></td>
                  <td></td>
                  <td style="width:15%; display:none;"> 
                        <div class="col-md-4">
                          <div class="icheck-primary">
                            <input type="checkbox" name="DischargePermit1" id="DischargePermitNone1" value="" checked>
                            <label for="DischargePermitNone1"></label>
                          </div>
                        </div>
                  </td>
                  <td style="width:15%;"> 
                        <div class="col-md-4">
                          <div class="icheck-primary">
                            <input type="checkbox" name="DischargePermit1" id="DischargePermitNew1" value="NEW">
                            <label for="DischargePermitNew1"></label>
                          </div>
                        </div>
                  </td>
                  <td style="width:15%;">
                        <div class="col-md-4">
                          <div class="icheck-primary">
                            <input type="checkbox" name="DischargePermit1" id="DischargePermitRenew1" value="RENEW">
                            <label for="DischargePermitRenew1"></label>
                          </div>
                        </div>
                  </td>
                </tr>
                <tr>
                  <td>
                  <div class="row">
                      <div class="col-xs">
                        <div class="">
                        <input type="hidden" name="otherspv1" value="false" checked style="display:none;">
                        </div>
                        </div>
                        <div class="col-xs">
                        <div class="icheck-primary">
                        <input type="checkbox" name="otherspv1" id="otherspv1" onclick="others();" value="true">
                        <label for="otherspv1">Others</label>
                        </div>
                        <div class="col-xs">
                        <input type="text" class="form-control" style="display:none" id="otherspv1_text" name="otherspv1_text">
                        </div>
                      </div>
                    </div>
                  </td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
                
              </tbody>
            </table>







            <div class="row">
            <div class="col-xs ml-2">
              <div class="">
              <input type="hidden" name="determinecompliance1" value="false" checked style="display:none;">
              </div>
              </div>
              <div class="col-xs ml-2">
              <div class="icheck-primary">
              <input type="checkbox" name="determinecompliance1" id="determinecompliance1" value="true" checked>
              <label for="determinecompliance1">Determine compliance status with environmental regulation, permit conditions, and other requirements</label>
              </div>
            </div>
            </div>


            <div class="row">
            <div class="col-xs ml-2">
              <div class="">
              <input type="hidden" name="investigatecomplaints1" value="false" checked style="display:none;">
              </div>
              </div>
              <div class="col-xs ml-2">
              <div class="icheck-primary">
              <input type="checkbox" name="investigatecomplaints1" id="investigatecomplaints1" value="true">
              <label for="investigatecomplaints1">Investigate community complaints</label>
              </div>
            </div>
            </div>

            <div class="row">
            <div class="col-xs ml-2">
              <div class="">
              <input type="hidden" name="statuscommitments1" value="false" checked style="display:none;">
              </div>
              </div>
              <div class="col-xs ml-2">
              <div class="icheck-primary">
              <input type="checkbox" name="statuscommitments1" id="statuscommitments1" value="true">
              <label for="statuscommitments1">Check status of commitment(s)</label>
              </div>
            </div>
            </div>

            <div class="row">
            <div class="col-xs ml-2">
              <div class="">
              <input type="hidden" name="ewatchprogram1" value="false" checked style="display:none;">
              </div>
              </div>
              <div class="col-xs ml-2">
              <div class="icheck-primary">
              <input type="checkbox" name="ewatchprogram1" id="ewatchprogram1" value="true">
              <label for="ewatchprogram1">Industrial Ecowatch Program</label>
              </div>
            </div>
            </div>

            <div class="row">
            <div class="col-xs ml-2">
              <div class="">
              <input type="hidden" name="PEPP1" value="false" checked style="display:none;">
              </div>
              </div>
              <div class="col-xs ml-2">
              <div class="icheck-primary">
              <input type="checkbox" name="PEPP1" id="PEPP1" value="true">
              <label for="PEPP1">Philippine Environmental Partnership Program (PEPP)</label>
              </div>
            </div>
            </div>

            <div class="row">
            <div class="col-xs ml-2">
              <div class="">
              <input type="hidden" name="pab1" value="false" checked style="display:none;">
              </div>
              </div>
              <div class="col-xs ml-2">
              <div class="icheck-primary">
              <input type="checkbox" name="pab1" id="pab1" value="true">
              <label for="pab1">Pollution Adjudication Board (PAB)</label>
              </div>
            </div>
            </div>


            <div class="row">
            <div class="col-xs ml-2">
              <div class="">
              <input type="hidden" name="others1" value="false" checked style="display:none;">
              </div>
              </div>
              <div class="col-xs  ml-2">
              <div class="icheck-primary">
              <input type="checkbox" name="others1" id="others1" onclick="others();" value="true">
              <label for="others1">Others</label>
              </div>
              <div class="col-xs">
              <input type="text" class="form-control" style="display:none" id="others1_text" name="others1_text">
              </div>
            </div>
          </div>

          <div class="row">
                <div class="col-md-12">
                  <h4 class="text-secondary"><em>3. Compliance Status</em></h4>
                  <p class="text-secondary"><em>3.1 DENR Permits/Licenses/Clearances</em></p>
                </div>
          </div>
           
          <table class="table">
            <thead>
                  <tr>
                      <th scope="col">Environmental Laws</th>
                      <th scope="col">Permits</th> 
                      <th scope="col">Permit No.</th> 
                      <th scope="col">Date of Issue</th>
                      <th scope="col">Expiry Date</th>
                  </tr>
            </thead>

            <tbody>
                  <tr>
                      <td>PD1586</td>
                      <td>ECC</td>
                      <td><input type="text" class="form-control ECC1" id="ECC1" name="ECC1" readonly></td>
                      <td><input type="date" class="form-control ECC_DOI1" id="ECC_DOI1" name="ECC_DOI1"></td>
                      <td><input type="date" class="form-control ECC_DE1" id="ECC_DE1" name="ECC_DE1"></td>
                  </tr>
                  <tr>
                      <td>RA6969</td>
                      <td>DENR Registry ID</td>
                      <td><input type="text" class="form-control DENRID1" id="DENRID1" name="DENRID1"></td>
                      <td><input type="date" class="form-control DENRID_DOI1" id="DENRID_DOI1" name="DENRID_DOI1"></td>
                      <td><input type="date" class="form-control DENRID_DE1" id="DENRID_DE1" name="DENRID_DE1"></td>
                  </tr>
                  <tr>
                      <td></td>
                      <td>PCL Compliance Certificate</td>            
                      <td><input type="text" class="form-control PCL_Compliance1" id="PCL_Compliance1" name="PCL_Compliance1"></td>
                      <td><input type="date" class="form-control PCL_Compliance1" id="PCL_Compliance_DOI1" name="PCL_Compliance_DOI1"></td>
                      <td><input type="date" class="form-control PCL_Compliance1" id="PCL_Compliance_DE1" name="PCL_Compliance_DE1"></td>
                  </tr>
                  <tr>
                      <td></td>
                      <td>CCO Registry</td>            
                      <td><input type="text" class="form-control CCO_Registry1" id="CCO_Registry1" name="CCO_Registry1"></td>
                      <td><input type="date" class="form-control CCO_Registry_DOI1" id="CCO_Registry_DOI1" name="CCO_Registry_DOI1"></td>
                      <td><input type="date" class="form-control CCO_Registry_DE1" id="CCO_Registry_DE1" name="CCO_Registry_DE1"></td>
                  </tr>
                  <tr>
                      <td></td>
                      <td>Importation Clearance No.</td>            
                      <td><input type="text" class="form-control Importation_Clearance1" id="Importation_Clearance1" name="Importation_Clearance1"></td>
                      <td><input type="date" class="form-control Importation_Clearance_DOI1" id="Importation_Clearance_DOI1" name="Importation_Clearance_DOI1"></td>
                      <td><input type="date" class="form-control Importation_Clearance_DE1" id="Importation_Clearance_DE1" name="Importation_Clearance_DE1"></td>
                  </tr>
                  <tr>
                      <td></td>
                      <td>Copy of COT issued by licensed TSD Facility</td>            
                      <td><input type="text" class="form-control COT_Issued1" id="COT_Issued1" name="COT_Issued1"></td>
                      <td><input type="date" class="form-control COT_Issued_DOI1" id="COT_Issued_DOI1" name="COT_Issued_DOI1"></td>
                      <td><input type="date" class="form-control COT_Issued_DE1" id="COT_Issued_DE1" name="COT_Issued_DE1"></td>
                  </tr>
                  <tr>
                      <td></td>
                      <td>TSD Registration Certificate</td>            
                      <td><input type="text" class="form-control TSD_RegistrationCert1" id="TSD_RegistrationCert1" name="TSD_RegistrationCert1"></td>
                      <td><input type="date" class="form-control TSD_RegistrationCert_DOI1" id="TSD_RegistrationCert_DOI1" name="TSD_RegistrationCert_DOI1"></td>
                      <td><input type="date" class="form-control TSD_RegistrationCert_DE1" id="TSD_RegistrationCert_DE1" name="TSD_RegistrationCert_DE1"></td>
                  </tr>
                  <tr>
                      <td>RA8749</td>
                      <td>POA No.</td>            
                      <td><input type="text" class="form-control POA_No1" id="POA_No1" name="POA_No1"></td>
                      <td><input type="date" class="form-control POA_No_DOI1" id="POA_No_DOI1" name="POA_No_DOI1"></td>
                      <td><input type="date" class="form-control POA_No_DE1" id="POA_No_DE1" name="POA_No_DE1"></td>
                  </tr>
                  <tr>
                      <td>RA9275</td>
                      <td>Discharge Permit No.</td>            
                      <td><input type="text" class="form-control Discharge_Permit1" id="Discharge_Permit1" name="Discharge_Permit1"></td>
                      <td><input type="date" class="form-control Discharge_Permit_DOI1" id="Discharge_Permit_DOI1" name="Discharge_Permit_DOI1"></td>
                      <td><input type="date" class="form-control Discharge_Permit_DE1" id="Discharge_Permit_DE1" name="Discharge_Permit_DE1"></td>
                  </tr>
                  <tr>
                      <td scope="row">RA9003</td>
                      <td>With MOA/Agreement for residuals disposed off to SLF w/ ECC</td>            
                      <td><input type="text" class="form-control MOA_Agreement1" id="MOA_Agreement1" name="MOA_Agreement1"></td>
                      <td><input type="date" class="form-control MOA_Agreement_DOI1" id="MOA_Agreement_DOI1" name="MOA_Agreement_DOI1"></td>
                      <td><input type="date" class="form-control MOA_Agreement_DE1" id="MOA_Agreement_DE1" name="MOA_Agreement_DE1"></td>
                  </tr>
            </tbody>
        </table>
  
      

        <div class="form-group">
				<form name="add_name" id="add_name">
					<div class="table-responsive">
						<table class="table table-bordered" id="dynamic_field1">
              <thead id = "eccthead">
                <tr>
                  <th>ECC Condition</th>
                  <th>Compliance</th>
                  <th>Remarks</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <!-- <tr>
                  <td><textarea name="ECC_Condition1[]" id="ECC_Condition1[]" placeholder="ECC Condition" class="form-control name_list" ></textarea></td>
                  <td>
                    <select class="select2" name="ECC_ConditionSelect1[]" id="ECC_ConditionSelect1[]">
                    <Option values="Yes">Yes</Option>
                    <Option value="No">No</Option>
                    <Option value="Partial">Partial</Option></select></td>
                  <td><textarea class="form-control" name="ECC_ConditionRemarks1[]" id="ECC_ConditionRemarks1[]"></textarea></td>
                  <td><button type="button" name="remove" id="" class="btn btn-danger btn_remove">X</button></td>
                </tr> -->
              </tbody>
						</table>
					</div>
				</form>
			</div>
      <div class="form-group">
        <button type="button" name="add1" id="add1" class="btn btn-success">Add ECC Conditions</button><br>
        </div>

      <div class="row">
        <table class="table">
          <thead>
            <th class="col-sm-3">Applicable Laws and Citation</th>
            <th class="col-sm-3">Compliance Requirements</th>
            <th class="col-sm-2">Compliance</th>
            <th class="col-sm-4">Remarks</th>
          </thead>
                
          <tbody>
            <tr><td colspan="6"><p><em>6969 Toxic Substances and Hazardous and Nuclear Wastes Control Act.</em> </p></td></tr>
            <td rowspan="2" class="font-weight-bold">Priority Chemical List</td>
            <td>Valid PCL Compliance</td>
            <td>
              <select class="form-select select2" name="Haz_PCLCompliance1">
              <Option value="N/A">N/A</Option>
              <Option value="Yes">Yes</Option>
              <Option value = "No">No</Option>
            </select>
            <td> <textarea class="form-control" rows="3" name="Haz_PCLComplianceText1" id="Haz_PCLComplianceText1"></textarea></td>
            </td>
            </tr>
            <tr>
              <td>Annual Reporting</td>
              <td>
              <select class="form-select select2" name="Annual_Reporting1">
              <Option value="N/A">N/A</Option>
              <Option value="Yes">Yes</Option>
              <Option value = "No">No</Option>
            </select>
            <td> <textarea class="form-control" rows="3" name="Annual_ReportingText1" id="Annual_ReportingText1"></textarea></td>
            <td></td>
            </td>
            </tr>



            <tr>
            <td rowspan="2" class="font-weight-bold">Chemical Control Orders</td>
            <td>Biennial Report for those chemicals that are for issuance for CCO</td>
            <td>
              <select class="form-select select2" name="Biennial_Report1">
              <Option value="N/A">N/A</Option>
              <Option value="Yes">Yes</Option>
              <Option value = "No">No</Option>
            </select>
            <td> <textarea class="form-control" rows="3" name="Biennial_ReportText1" id="Biennial_ReportText1"></textarea></td>
            </td>
            </tr>
            <tr>
              <td>CCO Registration </td>
              <td>
              <select class="form-select select2" name="CCO_Registration1">
              <Option value="N/A">N/A</Option>
              <Option value="Yes">Yes</Option>
              <Option value = "No">No</Option>
            </select>
            <td><textarea class="form-control" rows="3" id="CCO_RegistrationText1" name="CCO_RegistrationText1"></textarea></td>
            <td></td>
            </td>
            </tr>



            <tr>
            <td rowspan="3" class="font-weight-bold">Importation</td>
            <td>Valid Small Quantity</td>
            <td>
              <select class="form-select select2" name="Importation1">
              <Option value="N/A">N/A</Option>
              <Option value="Yes">Yes</Option>
              <Option value = "No">No</Option>
            </select>
            <td> <textarea class="form-control" rows="3" name="ImportationText1" id="ImportationText1"></textarea></td>
            </td>
            </tr>
            <tr>
              <td>Valid Importance Clearance</td>
              <td>
              <select class="form-select select2" name="Valid_ImportanceClearance1">
              <Option value="N/A">N/A</Option>
              <Option value="Yes">Yes</Option>
              <Option value = "No">No</Option>
            </select>
            <td><textarea class="form-control" rows="3" name="Valid_ImportanceClearanceText1" id="Valid_ImportanceClearanceText1"></textarea></td>
            <td></td>
            </td>
            </tr>
            <tr>
              <td>Bill of Lading</td>
              <td>
              <select class="form-select select2" name="Bill_Lading1">
              <Option value="N/A">N/A</Option>
              <Option value="Yes">Yes</Option>
              <Option value = "No">No</Option>
            </select>
            <td><textarea class="form-control" rows="3" name="Bill_LadingText1" id="Bill_LadingText1"></textarea></td>
            <td></td>
            </td>
            </tr>

            <tr>
            <td rowspan="3" class="font-weight-bold">Hazardous Waste Generator</td>
            <td>Registration as Hazardous Waste Generator</td>
            <td>
              <select class="form-select select2" name="Registration_HWG1">
              <Option value="N/A">N/A</Option>
              <Option value="Yes">Yes</Option>
              <Option value = "No">No</Option>
            </select>
            <td> <textarea class="form-control" rows="3" name="Registration_HWGText1" id="Registration_HWGText1"></textarea></td>
            </td>
            </tr>
            <tr>
              <td>With temporary Hazwaste storage facility</td>
              <td>
              <select class="form-select select2" name="Temp_HazStorageFacility1">
              <Option value="N/A">N/A</Option>
              <Option value="Yes">Yes</Option>
              <Option value = "No">No</Option>
            </select>
            <td><textarea class="form-control" rows="3" name="Temp_HazStorageFacilityText1" id="Temp_HazStorageFacilityText1"></textarea></td>
            <td></td>
            </td>
            </tr>
            <tr>
              <td>Reporting of hazardouswaste generated</td>
              <td>
              <select class="form-select select2" name="Report_HazGenerated1">
              <Option value="N/A">N/A</Option>
              <Option value="Yes">Yes</Option>
              <Option value = "No">No</Option>
            </select>
            <td><textarea class="form-control" rows="3" name="Report_HazGeneratedText1" id="Report_HazGeneratedTextText1"></textarea></td>
            <td></td>
            </td>
            </tr>



            <tr>
            <td rowspan="3" class="font-weight-bold">Hazardous Waste and Labelling </td>
            <td>Hazardous Waste Properly Labelled</td>
            <td>
              <select class="form-select select2" name="Haz_WasteLabelled1">
              <Option value="N/A">N/A</Option>
              <Option value="Yes">Yes</Option>
              <Option value = "No">No</Option>
            </select>
            <td> <textarea class="form-control" rows="3" name="Haz_WasteLabelledText1" id="Haz_WasteLabelledText1"></textarea></td>
            </td>
            </tr>
            <tr>
              <td>Valid Permit to Transport</td>
              <td>
              <select class="form-select select2" name="Valid_PermitTranspo1">
              <Option value="N/A">N/A</Option>
              <Option value="Yes">Yes</Option>
              <Option value = "No">No</Option>
            </select>
            <td><textarea class="form-control" rows="3" name="Valid_PermitTranspoText1" id="Valid_PermitTranspoText1"></textarea></td>
            <td></td>
            </td>
            </tr>
            <tr>
              <td>Valid Registration of Transporters and Treaters</td>
              <td>
              <select class="form-select select2" name="Valid_RegTranspoTreaters1">
              <Option value="N/A">N/A</Option>
              <Option value="Yes">Yes</Option>
              <Option value = "No">No</Option>
            </select>
            <td><textarea class="form-control" rows="3" name="Valid_RegTranspoTreatersText1" id="Valid_RegTranspoTreatersText1"></textarea></td>
            <td></td>
            </td>
            </tr>




            <tr>
            <td rowspan="2" class="font-weight-bold">Waste Transporter; Waste Transport Record; Waste Treatment and Disposal Premises </td>
            <td>Compliance with Manifest System (Waste Transport Record)</td>
            <td>
              <select class="form-select select2" name="Waste_Transporter1">
              <Option value="N/A">N/A</Option>
              <Option value="Yes">Yes</Option>
              <Option value = "No">No</Option>
            </select>
            <td> <textarea class="form-control" rows="3" name="Waste_TransporterText1" id="Waste_TransporterText1"></textarea></td>
            </td>
            </tr>
            <tr>
              <td>Valid/completed certificate of treatment</td>
              <td>
              <select class="form-select select2" name="Valid_CertTreatment1">
              <Option value="N/A">N/A</Option>
              <Option value="Yes">Yes</Option>
              <Option value = "No">No</Option>
            </select>
            <td><textarea class="form-control" rows="3" name="Valid_CertTreatmentText1" id="Valid_CertTreatmentText1"></textarea></td>
            <td></td>
            </td>
            </tr>

          </tbody>
        </table>
      </div>







      <div class="row">
        <table class="table">
          <thead>
            <th class="col-sm-3">Applicable Laws and Citation</th>
            <th class="col-sm-3">Compliance Requirements</th>
            <th class="col-sm-2">Compliance</th>
            <th class="col-sm-4">Remarks</th>
          </thead>
        
        
          <tbody>
            <tr><td colspan="6"><p><em>RA 8749: Philippine Clean Air Act.</em> </p></td></tr>
            <td rowspan="9" class="font-weight-bold">Permit to Operate Air</td>
            <td>With Valid POA</td>
            <td>
              <select class="form-select select2" name="Air_ValidPOA1" id="Air_ValidPOA1">
              <Option value="N/A">N/A</Option>
              <Option value="Yes">Yes</Option>
              <Option value = "No">No</Option>
            </select>
            <td> <textarea class="form-control" rows="3" name="Air_ValidPOAText1" id="Air_ValidPOAText1"></textarea></td>
            </td>
            </tr>

            <tr>
              <td>All emission sources is covered by a valid POA</td>
              <td>
              <select class="form-select select2" name="Air_EmissionPOA1" id="Air_EmissionPOA1">
              <Option value="N/A">N/A</Option>
              <Option value="Yes">Yes</Option>
              <Option value = "No">No</Option>
              </select>
              <td> <textarea class="form-control" rows="3" name="Air_EmissionPOAText1" id="Air_EmissionPOAText1"></textarea></td>
              </td>
            </tr>

            <tr>
              <td>POA is displayed in a conspicuous place near the installation</td>
              <td>
              <select class="form-select select2" name="Air_DisplayInstallation1" id="Air_DisplayInstallation1">
              <Option value="N/A">N/A</Option>
              <Option value="Yes">Yes</Option>
              <Option value = "No">No</Option>
              </select>
              <td> <textarea class="form-control" rows="3" name="Air_DisplayInstallationText1" id="Air_DisplayInstallationText1"></textarea></td>
              </td>
            </tr>

            <tr>
              <td>All permit conditions are complied with</td>
              <td>
              <select class="form-select select2" name="Air_PermitCondition1" id="Air_PermitCondition1">
              <Option value="N/A">N/A</Option>
              <Option value="Yes">Yes</Option>
              <Option value = "No">No</Option>
              </select>
              <td> <textarea class="form-control" rows="3" name="Air_PermitConditionText1" id="Air_PermitConditionText1"></textarea></td>
              </td>
            </tr>

            <tr>
              <td>Wind direction device is installed (if applicable)</td>
              <td>
              <select class="form-select select2" name="Air_WindDevice1" id="Air_WindDevice1">
              <Option value="N/A">N/A</Option>
              <Option value="Yes">Yes</Option>
              <Option value = "No">No</Option>
              </select>
              <td> <textarea class="form-control" rows="3" name="Air_WindDeviceText1" id="Air_WindDeviceText1"></textarea></td>
              </td>
            </tr>

            <tr>
              <td>Plant operational problems lasting for more than 1 hour should be reported to EMB within 24 hours</td>
              <td>
              <select class="form-select select2" name="Air_PlantOperationProblem1" id="Air_PlantOperationProblem1">
              <Option value="N/A">N/A</Option>
              <Option value="Yes">Yes</Option>
              <Option value = "No">No</Option>
              </select>
              <td> <textarea class="form-control" rows="3" name="Air_PlantOperationProblemText1" id="Air_PlantOperationProblemText1"></textarea></td>
              </td>
            </tr>

            <tr>
              <td>CCTV installed (for large sources only)</td>
              <td>
              <select class="form-select select2" name="Air_CCTVInstalled1" id="Air_CCTVInstalled1">
              <Option value="N/A">N/A</Option>
              <Option value="Yes">Yes</Option>
              <Option value = "No">No</Option>
              </select>
              <td> <textarea class="form-control" rows="3" name="Air_CCTVInstalledText1" id="Air_CCTVInstalledText1"></textarea></td>
              </td>
            </tr>

            <tr>
              <td>CEMS/PEMS installed (for petroleum refineries, power/cement plants or sources emitting 750 Tone/yr)</td>
              <td>
              <select class="form-select select2" name="Air_CEMSorPEMS1" id="Air_CEMSorPEMS1">
              <Option value="N/A">N/A</Option>
              <Option value="Yes">Yes</Option>
              <Option value = "No">No</Option>
              </select>
              <td> <textarea class="form-control" rows="3" name="Air_CEMSorPEMSText1" id="Air_CEMSorPEMSText1"></textarea></td>
              </td>
            </tr>

            <tr>
              <td>Yearly RATA/Quarterly CGA conducted (for sources with CEMS)</td>
              <td>
              <select class="form-select select2" name="Air_YearlyRATA1" id="Air_YearlyRATA1">
              <Option value="N/A">N/A</Option>
              <Option value="Yes">Yes</Option>
              <Option value = "No">No</Option>
              </select>
              <td> <textarea class="form-control" rows="3" name="Air_YearlyRATAText1" id="Air_YearlyRATAText1"></textarea></td>
              </td>
            </tr>

            
            <td class="font-weight-bold">Emission Testing (If applicable)</td>
            <td>Compliance with emission standards?</td>
            <td>
              <select class="form-select select2" name="Air_EmissionTestStandard1" id="Air_EmissionTestStandard1">
              <Option value="N/A">N/A</Option>
              <Option value="Yes">Yes</Option>
              <Option value = "No">No</Option>
            </select>
            <td> <textarea class="form-control" rows="3" name="Air_EmissionTestStandardText1" id="Air_EmissionTestStandardText1"></textarea></td>
            </td>
            </tr>

            <td class="font-weight-bold">Ambient Testing (if applicable)</td>
            <td>Compliance with ambient air quality standards?</td>
            <td>
              <select class="form-select select2" name="Air_AmbientQualityStandard1" id="Air_AmbientQualityStandard1">
              <Option value="N/A">N/A</Option>
              <Option value="Yes">Yes</Option>
              <Option value = "No">No</Option>
              </select>
            <td> <textarea class="form-control" rows="3" name="Air_AmbientQualityStandardText1" id="Air_AmbientQualityStandardText1"></textarea></td>
            </td>
            </tr>

        

          </tbody>
        </table>
      </div>




      <div class="row">
        <table class="table">
          <thead>
            <th class="col-sm-3">Applicable Laws and Citation</th>
            <th class="col-sm-3">Compliance Requirements</th>
            <th class="col-sm-2">Compliance</th>
            <th class="col-sm-4">Remarks</th>
          </thead>
        
        
          <tbody>
            <tr><td colspan="5"><p><em>RA 9275: Philippine Clean Water Act</em> </p></td></tr>
            <td rowspan="5" class="font-weight-bold">Discharge Permit (DP)</td>
            <td>With valid Discharge Permit </td>
            <td>
              <select class="form-select select2" name="Water_ValidDP1" id="Water_ValidDP1">
              <Option value="N/A">N/A</Option>
              <Option value="Yes">Yes</Option>
              <Option value = "No">No</Option>
            </select>
            <td> <textarea class="form-control" rows="3" name="Water_ValidDPText1" id="Water_ValidDPText1"></textarea></td>
            </td>
            </tr>

            <tr>
              <td>Volume of discharge consistent with DP issued?</td>
              <td>
              <select class="form-select select2" name="Water_VolumeDP1" id="Water_VolumeDP1">
              <Option value="N/A">N/A</Option>
              <Option value="Yes">Yes</Option>
              <Option value = "No">No</Option>
              </select>
              <td> <textarea class="form-control" rows="3" name="Water_VolumeDPText1" id="Water_VolumeDPText1"></textarea></td>
              </td>
            </tr>

            <tr>
              <td>All permit conditions are complied with?</td>
              <td>
              <select class="form-select select2" name="Water_PermitsComplied1" id="Water_PermitsComplied1">
              <Option value="N/A">N/A</Option>
              <Option value="Yes">Yes</Option>
              <Option value = "No">No</Option>
              </select>
              <td> <textarea class="form-control" rows="3" name="Water_PermitsCompliedText1" id="Water_PermitsCompliedText1"></textarea></td>
              </td>
            </tr>

            <tr>
              <td>With working flow metering device (if applicable)</td>
              <td>
              <select class="form-select select2" name="Water_FlowMeterDevice1" id="Water_FlowMeterDevice1">
              <Option value="N/A">N/A</Option>
              <Option value="Yes">Yes</Option>
              <Option value = "No">No</Option>
              </select>
              <td><textarea class="form-control" rows="3" name="Water_FlowMeterDeviceText1" id="Water_FlowMeterDeviceText1"></textarea></td>
              </td>
            </tr>

            <tr>
              <td>Certified septage siphoning hauled by accredited service provider. </td>
              <td>
              <select class="form-select select2" name="Water_CertifiedSiphoning1" id="Water_CertifiedSiphoning1">
              <Option value="N/A">N/A</Option>
              <Option value="Yes">Yes</Option>
              <Option value = "No">No</Option>
              </select>
              <td> <textarea class="form-control" rows="3" name="Water_CertifiedSiphoningText1" id="Water_CertifiedSiphoningText1"></textarea></td>
              </td>
            </tr>

            

            <td class="font-weight-bold">Effluent Test Results (if applicable)</td>
            <td>In compliance with effluent standards</td>
            <td>
              <select class="form-select select2" name="Water_ComplianceEffluent1" id="Water_ComplianceEffluent1">
              <Option value="N/A">N/A</Option>
              <Option value="Yes">Yes</Option>
              <Option value = "No">No</Option>
            </select>
            <td> <textarea class="form-control" rows="3" name="Water_ComplianceEffluentText1" id="Water_ComplianceEffluentText1"></textarea></td>
            </td>
            </tr>


            <td class="font-weight-bold">Ambient water quality monitoring (if applicable)</td>
            <td>With ambient water quality monitoring results</td>
            <td>
              <select class="form-select select2" name="Water_AmbientQualityMonitoring1" id="Water_AmbientQualityMonitoring1">
              <Option value="N/A">N/A</Option>
              <Option value="Yes">Yes</Option>
              <Option value = "No">No</Option>
            </select>
            <td> <textarea class="form-control" rows="3" name="Water_AmbientQualityMonitoringText1" id="Water_AmbientQualityMonitoringText1"></textarea></td>
            </td>
            
            </tr>

            <td class="font-weight-bold">Wastewater charge system (if applicable)</td>
            <td>Payment of wastewater charges</td>
            <td>
              <select class="form-select select2" name="Water_PaymentWastewater1" id="Water_PaymentWastewater1">
              <Option value="N/A">N/A</Option>
              <Option value="Yes">Yes</Option>
              <Option value = "No">No</Option>
            </select>
            <td> <textarea class="form-control" rows="3" name="Water_PaymentWastewaterText1" id="Water_PaymentWastewaterText1"></textarea></td>
            </td>
            
            </tr>

          </tbody>
        </table>
      </div>


      <div class="row">
        <table class="table">
          <thead>
            <th class="col-sm-3">Applicable Laws and Citation</th>
            <th class="col-sm-3">Compliance Requirements</th>
            <th class="col-sm-2">Compliance</th>
            <th class="col-sm-4">Remarks</th>
          </thead>
        
        
          <tbody>
            <tr><td colspan="5"><p><em>RA 9003 Ecological Solid Waste Management</em> </p></td></tr>
            <td class="font-weight-bold">Waste Segregation</td>
            <td>Practice of Waste Segregation </td>
            <td>
              <select class="form-select select2" name="SWM_WasteSegregation1" id="SWM_WasteSegregation1">
              <Option value="N/A">N/A</Option>
              <Option value="Yes">Yes</Option>
              <Option value = "No">No</Option>
            </select>
            <td> <textarea class="form-control" rows="3" name="SWM_WasteSegregationText1" id="SWM_WasteSegregationText1"></textarea></td>
            </td>
            </tr>
            <tr>
            <td class="font-weight-bold">Solid Waste Disposal Facilities</td>
            <td>Installation of necessary controls for waste treatment and disposal facility</td>
            <td>
              <select class="form-select select2" name="SWM_WasteDisposalFacilities1" id="SWM_WasteDisposalFacilities1">
              <Option value="N/A">N/A</Option>
              <Option value="Yes">Yes</Option>
              <Option value = "No">No</Option>
            </select>
            <td> <textarea class="form-control" rows="3" name="SWM_WasteDisposalFacilitiesText1" name="SWM_WasteDisposalFacilitiesText1"></textarea></td>
            </td>
            </tr>
            </tbody>
        </table>
       </div>


       <div class="row">
        <table class="table">
          <thead>
            <th class="col-sm-3">Applicable Laws and Citation</th>
            <th class="col-sm-3">Compliance Requirements</th>
            <th class="col-sm-2">Compliance</th>
            <th class="col-sm-4">Remarks</th>
          </thead>
        
        
          <tbody>
            <tr><td colspan="5"><p><em>Pollution Control Officer Accreditation</em> </p></td></tr>
            <td class="font-weight-bold">DAO 1992-26 or Revised Guidelines on PCO Accreditation</td>
            <td>Valid Accreditation of PCO </td>
            <td>
              <select class="form-select select2" name="PCO_Guidelines1" id="PCO_Guidelines1">
              <Option value="N/A">N/A</Option>
              <Option value="Yes">Yes</Option>
              <Option value = "No">No</Option>
            </select>
            <td> <textarea class="form-control" rows="3" name="PCO_GuidelinesText1" id="PCO_GuidelinesText1"></textarea></td>
            </td>
            </tr>
           
            </tbody>
        </table>
       </div>

       <div class="row">
        <table class="table">
          <thead>
            <th class="col-sm-3">Applicable Laws and Citation</th>
            <th class="col-sm-3">Compliance Requirements</th>
            <th class="col-sm-2">Compliance</th>
            <th class="col-sm-4">Remarks</th>
          </thead>
        
        
          <tbody>
            <tr><td colspan="5"><p><em>Self Monitoring Report</em> </p></td></tr>
            <td class="font-weight-bold">DAO 2003-27</td>
            <td>Complete and Timely submission of SMR's</td>
            <td>
              <select class="form-select select2" name="DAO_SMRSubmission1" id="DAO_SMRSubmission1">
              <Option value="N/A">N/A</Option>
              <Option value="Yes">Yes</Option>
              <Option value = "No">No</Option>
            </select>
            <td> <textarea class="form-control" rows="3" name="DAO_SMRSubmissionText1" id="DAO_SMRSubmissionText1"></textarea></td>
            </td>
            </tr>
          </tbody>
        </table>
       </div>


          <div class="row">
                <div class="col-md-12">
                  <h4 class="text-secondary"><em>3.3 Summary of Findings and Observations</em></h4>
                  <p class="text-secondary"><em>3.3.1 Environmental Impact System</em></p>
                </div>
          </div>

          <div class="row">
            <div class="col-md-4">
              <div class="icheck-success">
                <input type="radio" name="EIS_System1" id="checkboxEIS_SystemA1" value="Compliant">
                <label for="checkboxEIS_SystemA1">Compliant</label>
              </div>
            </div>
            <div class="col-md-4">
              <div class="icheck-success">
                <input type="radio" name="EIS_System1" id="checkboxEIS_SystemB1" value="Non-Compliant">
                <label for="checkboxEIS_SystemB1">Non-Compliant</label>
              </div>
            </div>
            <div class="col-md-4">
              <div class="icheck-success">
                <input type="radio" name="EIS_System1" id="checkboxEIS_SystemC1" value="Not Applicable" checked>
                <label for="checkboxEIS_SystemC1">Not Applicable</label>
              </div>
            </div>
          </div>

                 


          <div class="container mt-3" id="eissData1Container" style="display:none;">
            <div class="row">
              <div class="col-12">
                <button type="button" class="btn btn-success mb-2" id="add_eiss1">Add</button>
                <table class="table table-bordered" id="table_eiss1">
                  <thead>
                    <tr>
                      <th>Recommendations</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr id="row">
                      <td><textarea name="eissData1[]" id="eissData1[]" class="form-control"></textarea></td>
                      <td><button type="button" name="remove" class="btn btn-danger btn-sm eiss_remove1" id="eiss_remove1">X</button></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

    


          <div class="row">
                <div class="col-md-12">
                  <p class="text-secondary"><em>3.3.2 Chemical Management</em></p>
                </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="icheck-success">
                <input type="radio" name="Chemical_Management1" id="Chemical_ManagementA1" value="Compliant">
                <label for="Chemical_ManagementA1">Compliant</label>
              </div>
            </div>
            <div class="col-md-4">
              <div class="icheck-success">
                <input type="radio" name="Chemical_Management1" id="Chemical_ManagementB1" value="Non-Compliant">
                <label for="Chemical_ManagementB1">Non-Compliant</label>
              </div>
            </div>
            <div class="col-md-4">
              <div class="icheck-success">
                <input type="radio" name="Chemical_Management1" id="Chemical_ManagementC1" value="Not Applicable" checked>
                <label for="Chemical_ManagementC1">Not Applicable</label>
              </div>
            </div>
          </div>


          <div class="container mt-3" id="Chemical_Management1Container" style="display:none;">
                  <div class="row">
                    <div class="col-12">
                      <button type="button" class="btn btn-success mb-2" id="add_Chemical_Management1">Add</button>
                      <table class="table table-bordered" id="table_Chemical_Management1">
                        <thead>
                          <tr>
                            <th>Recommendations</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr id="row">
                            <td><textarea name="Chemical_Management1_Data[]" id="Chemical_Management1_Data[]" class="form-control"></textarea></td>
                            <td><button type="button" name="remove" class="btn btn-danger btn-sm Chemical_Management1_remove" id="Chemical_Management1_remove">X</button></td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>



          <div class="row">
                <div class="col-md-12">
                  <p class="text-secondary"><em>3.3.3 Hazardous Waste Management</em></p>
                </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="icheck-success">
                <input type="radio" name="HW_Management1" id="HW_ManagementA1" value="Compliant">
                <label for="HW_ManagementA1">Compliant</label>
              </div>
            </div>
            <div class="col-md-4">
              <div class="icheck-success">
                <input type="radio" name="HW_Management1" id="HW_ManagementB1" value="Non-Compliant">
                <label for="HW_ManagementB1">Non-Compliant</label>
              </div>
            </div>
            <div class="col-md-4">
              <div class="icheck-success">
                <input type="radio" name="HW_Management1" id="HW_ManagementC1" value="Not Applicable" checked>
                <label for="HW_ManagementC1">Not Applicable</label>
              </div>
            </div>
          </div>


          
          <div class="container mt-3" id="HW_ManagementA1Container" style="display:none;">
            <div class="row">
              <div class="col-12">
                <button type="button" class="btn btn-success mb-2" id="add_HW_Management1">Add</button>
                <table class="table table-bordered" id="table_HW_Management1">
                  <thead>
                    <tr>
                      <th>Recommendations</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr id="row1">
                      <td><textarea name="HW_Management1_Data[]" id="HW_Management1_Data[]" class="form-control"></textarea></td>
                      <td><button type="button" name="remove" class="btn btn-danger btn-sm HW_Management1_remove" id="HW_Management1_remove">X</button></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>



          <div class="row">
                <div class="col-md-12">
                  <p class="text-secondary"><em>3.3.4 Air Quality Management</em></p>
                </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="icheck-success">
                <input type="radio" name="AQ_Management1" id="AQ_ManagementA1" value="Compliant">
                <label for="AQ_ManagementA1">Compliant</label>
              </div>
            </div>
            <div class="col-md-4">
              <div class="icheck-success">
                <input type="radio" name="AQ_Management1" id="AQ_ManagementB1" value="Non-Compliant">
                <label for="AQ_ManagementB1">Non-Compliant</label>
              </div>
            </div>
            <div class="col-md-4">
              <div class="icheck-success">
                <input type="radio" name="AQ_Management1" id="AQ_ManagementC1" value="Not Applicable" checked>
                <label for="AQ_ManagementC1">Not Applicable</label>
              </div>
            </div>
          </div>


          <div class="container mt-3" id="AQ_Management1Container" style="display:none;">
            <div class="row">
              <div class="col-12">
                <button type="button" class="btn btn-success mb-2" id="add_AQ_Management1">Add</button>
                <table class="table table-bordered" id="table_AQ_Management1">
                  <thead>
                    <tr>
                      <th>Recommendations</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr id="row1">
                      <td><textarea name="AQ_Management1_Data[]" id="AQ_Management1_Data[]" class="form-control"></textarea></td>
                      <td><button type="button" name="remove" class="btn btn-danger btn-sm AQ_Management1_remove" id="AQ_Management1_remove">X</button></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>


          <div class="row">
                <div class="col-md-12">
                  <p class="text-secondary"><em>3.3.5 Water Quality Management</em></p>
                </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="icheck-success">
                <input type="radio" name="WQ_Management1" id="WQ_ManagementA1" value="Compliant">
                <label for="WQ_ManagementA1">Compliant</label>
              </div>
            </div>
            <div class="col-md-4">
              <div class="icheck-success">
                <input type="radio" name="WQ_Management1" id="WQ_ManagementB1" value="Non-Compliant">
                <label for="WQ_ManagementB1">Non-Compliant</label>
              </div>
            </div>
            <div class="col-md-4">
              <div class="icheck-success">
                <input type="radio" name="WQ_Management1" id="WQ_ManagementC1" value="Not Applicable" checked>
                <label for="WQ_ManagementC1">Not Applicable</label>
              </div>
            </div>
          </div>


          <div class="container mt-3" id="WQ_Management1Container" style="display:none;">
            <div class="row">
              <div class="col-12">
                <button type="button" class="btn btn-success mb-2" id="add_WQ_Management1">Add</button>
                <table class="table table-bordered" id="table_WQ_Management1">
                  <thead>
                    <tr>
                      <th>Recommendations</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr id="row1">
                      <td><textarea name="WQ_Management1_Data[]" id="WQ_Management1_Data[]" class="form-control"></textarea></td>
                      <td><button type="button" name="remove" class="btn btn-danger btn-sm WQ_Management1_remove" id="WQ_Management1_remove">X</button></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

          <div class="row">
                <div class="col-md-12">
                  <p class="text-secondary"><em>3.3.6 Solid Waste Management</em></p>
                </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="icheck-success">
                <input type="radio" name="SW_Management1" id="SW_ManagementA1" value="Compliant">
                <label for="SW_ManagementA1">Compliant</label>
              </div>
            </div>
            <div class="col-md-4">
              <div class="icheck-success">
                <input type="radio" name="SW_Management1" id="SW_ManagementB1" value="Non-Compliant">
                <label for="SW_ManagementB1">Non-Compliant</label>
              </div>
            </div>
            <div class="col-md-4">
              <div class="icheck-success">
                <input type="radio" name="SW_Management1" id="SW_ManagementC1" value="Not Applicable" checked>
                <label for="SW_ManagementC1">Not Applicable</label>
              </div>
            </div>
          </div>
          

          
          <div class="container mt-3" id="SW_Management1Container" style="display:none;">
            <div class="row">
              <div class="col-12">
                <button type="button" class="btn btn-success mb-2" id="add_SW_Management1">Add</button>
                <table class="table table-bordered" id="table_SW_Management1">
                  <thead>
                    <tr>
                      <th>Recommendations</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr id="row1">
                      <td><textarea name="SW_Management1_Data[]" id="SW_Management1_Data[]" class="form-control"></textarea></td>
                      <td><button type="button" name="remove" class="btn btn-danger btn-sm SW_Management1_remove" id="SW_Management1_remove">X</button></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>


          <div class="row">
                <div class="col-md-12">
                  <p class="text-secondary"><em>3.3.7 Commitment/s from the previous Technical Conference</em></p>
                </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="icheck-success">
                <input type="radio" name="Commitment_TechCon1" id="Commitment_TechConA1" value="Compliant">
                <label for="Commitment_TechConA1">Compliant</label>
              </div>
            </div>
            <div class="col-md-4">
              <div class="icheck-success">
                <input type="radio" name="Commitment_TechCon1" id="Commitment_TechConB1" value="Non-Compliant">
                <label for="Commitment_TechConB1">Non-Compliant</label>
              </div>
            </div>
            <div class="col-md-4">
              <div class="icheck-success">
                <input type="radio" name="Commitment_TechCon1" id="Commitment_TechConC1" value="Not Applicable" checked>
                <label for="Commitment_TechConC1">Not Applicable</label>
              </div>
            </div>
          </div>


          <div class="container mt-3" id="Commitment_TechConA1Container" style="display:none;">
            <div class="row">
              <div class="col-12">
                <button type="button" class="btn btn-success mb-2" id="add_Commitment_TechConA1">Add</button>
                <table class="table table-bordered" id="table_Chemical_Management1">
                  <thead>
                    <tr>
                      <th>Recommendations</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody id = "tbody_tc_management1">
                    <tr id="row1">
                      <td><textarea name="Commitment_TechCon1_Data[]" id="Commitment_TechCon1_Data[]" class="form-control"></textarea></td>
                      <td><button type="button" name="remove" class="btn btn-danger btn-sm Commitment_TechCon1_remove" id="Commitment_TechCon1_remove">X</button></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          

          

<!-- --------------------------------------------------REMARKS START---------------------------------------------- -->
            <div class="row mt-4 ml-2"><h4>Recommendations</h4></div>
            <div class="row">
            <div class="col-xs ml-2">
              <div class="">
              <input type="hidden" name="Rec_confirmatorysampling1" value="false" checked style="display:none;">
              </div>
              </div>
              <div class="col-xs ml-2">
              <div class="icheck-primary">
              <input type="checkbox" name="Rec_confirmatorysampling1" id="Rec_confirmatorysampling1" value="true">
              <label for="Rec_confirmatorysampling1">For confirmatory sampling/ further monitoring</label>
              </div>
            </div>
            </div>


            <div class="container mt-3" id="Rec_confirmatorysampling1Container" style="display:none;">
            <div class="row">
              <div class="col-12">
                <button type="button" class="btn btn-success mb-2" id="add_Rec_confirmatorysampling1">Add</button>
                <table class="table table-bordered" id="table_Rec_confirmatorysampling1">
                  <thead>
                    <tr>
                      <th>Others</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr id="row1">
                      <td><input type="text" name="Rec_confirmatorysampling1_Data[]" id="Rec_confirmatorysampling1_Data[]" class="form-control" /></td>
                      <td><button type="button" name="remove" class="btn btn-danger btn-sm Rec_confirmatorysampling1_remove" id="Rec_confirmatorysampling1_remove">X</button></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>




            <div class="row">
            <div class="col-xs ml-2">
              <div class="">
              <input type="hidden" name="Rec_tempPtoDp1" value="false" checked style="display:none;">
              </div>
              </div>
              <div class="col-xs ml-2">
              <div class="icheck-primary">
              <input type="checkbox" name="Rec_tempPtoDp1" id="Rec_tempPtoDp1" value="true">
              <label for="Rec_tempPtoDp1">For issuance of Temporary/Renewal of Permit to Operate (POA) and/or Renewal of Discharge Permit(DP)</label>
              </div>
            </div>
            </div>



            <div class="container mt-3" id="Rec_tempPtoDp1Container" style="display:none;">
            <div class="row">
              <div class="col-12">
                <button type="button" class="btn btn-success mb-2" id="add_Rec_tempPtoDp1">Add</button>
                <table class="table table-bordered" id="table_Rec_tempPtoDp1">
                  <thead>
                    <tr>
                      <th>Others</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr id="row1">
                      <td><input type="text" name="Rec_tempPtoDp1_Data[]" id="Rec_tempPtoDp1_Data[]" class="form-control" /></td>
                      <td><button type="button" name="remove" class="btn btn-danger btn-sm Rec_tempPtoDp1_remove" id="Rec_tempPtoDp1_remove">X</button></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>



            <div class="row">
            <div class="col-xs ml-2">
              <div class="">
              <input type="hidden" name="Rec_PCOSem1" value="false" checked style="display:none;">
              </div>
              </div>
              <div class="col-xs ml-2">
              <div class="icheck-primary">
              <input type="checkbox" name="Rec_PCOSem1" id="Rec_PCOSem1" value="true">
              <label for="Rec_PCOSem1">For accreditation of Pollution Control Officer (PCO)/Seminar requirement of Managing Head</label>
              </div>
            </div>
            </div>


            <div class="container mt-3" id="Rec_PCOSem1Container" style="display:none;">
            <div class="row">
              <div class="col-12">
                <button type="button" class="btn btn-success mb-2" id="add_Rec_PCOSem1">Add</button>
                <table class="table table-bordered" id="table_Rec_PCOSem1">
                  <thead>
                    <tr>
                      <th>Others</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr id="row1">
                      <td><input type="text" name="Rec_PCOSem1_Data[]" id="Rec_PCOSem1_Data[]" class="form-control" /></td>
                      <td><button type="button" name="remove" class="btn btn-danger btn-sm Rec_PCOSem1_remove" id="Rec_PCOSem1_remove">X</button></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>



          <div class="row">
            <div class="col-xs ml-2">
              <div class="">
              <input type="hidden" name="Rec_SMRCMR_Submission1" value="false" checked style="display:none;">
              </div>
              </div>
              <div class="col-xs ml-2">
              <div class="icheck-primary">
              <input type="checkbox" name="Rec_SMRCMR_Submission1" id="Rec_SMRCMR_Submission1" value="true">
              <label for="Rec_SMRCMR_Submission1">For submission of Self Monitoring Report (SMR)/Compliance Monitoring Report (CMR) online</label>
              </div>
            </div>
            </div>


            <div class="container mt-3" id="Rec_SMRCMR_SubmissionContainer1" style="display:none;">
            <div class="row">
              <div class="col-12">
                <button type="button" class="btn btn-success mb-2" id="add_Rec_SMRCMR_Submission1">Add</button>
                <table class="table table-bordered" id="table_Rec_SMRCMR_Submission1">
                  <thead>
                    <tr>
                      <th>Others</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr id="row1">
                      <td><input type="text" name="Rec_SMRCMR_Submission1_Data[]" id="Rec_SMRCMR_Submission1_Data[]" class="form-control" /></td>
                      <td><button type="button" name="remove" class="btn btn-danger btn-sm Rec_SMRCMR_Submission1_remove" id="Rec_SMRCMR_Submission1_remove">X</button></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>






          <div class="row">
            <div class="col-xs ml-2">
              <div class="">
              <input type="hidden" name="Rec_NOMTC1" value="false" checked style="display:none;">
              </div>
              </div>
              <div class="col-xs ml-2">
              <div class="icheck-primary">
              <input type="checkbox" name="Rec_NOMTC1" id="Rec_NOMTC1" value="true">
              <label for="Rec_NOMTC1">For issuance of Notice of Meeting (NOM)/Technical Conference (TC)</label>
              </div>
            </div>
            </div>


            <div class="container mt-3" id="Rec_NOMTCContainer1" style="display:none;">
            <div class="row">
              <div class="col-12">
                <button type="button" class="btn btn-success mb-2" id="add_Rec_NOMTC1">Add</button>
                <table class="table table-bordered" id="table_Rec_NOMTC1">
                  <thead>
                    <tr>
                      <th>Others</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr id="row1">
                      <td><input type="text" name="Rec_NOMTC1_Data[]" id="Rec_NOMTC_Data1[]" class="form-control" /></td>
                      <td><button type="button" name="remove" class="btn btn-danger btn-sm Rec_NOMTC1_remove" id="Rec_NOMTC1_remove">X</button></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>


            <div class="row">
            <div class="col-xs ml-2">
              <div class="">
              <input type="hidden" name="Rec_NOVIssuance1" value="false" checked style="display:none;">
              </div>
              </div>
              <div class="col-xs ml-2">
              <div class="icheck-primary">
              <input type="checkbox" name="Rec_NOVIssuance1" id="Rec_NOVIssuance1" value="true">
              <label for="Rec_NOVIssuance1">For issuance of Notice of Violation (NOV)</label>
              </div>
            </div>
            </div>


            
            <div class="container mt-3" id="Rec_NOVIssuanceContainer1" style="display:none;">
            <div class="row">
              <div class="col-12">
                <button type="button" class="btn btn-success mb-2" id="add_Rec_NOVIssuance1">Add</button>
                <table class="table table-bordered" id="table_Rec_NOVIssuance1">
                  <thead>
                    <tr>
                      <th>Others</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr id="row1">
                      <td><input type="text" name="Rec_NOVIssuance1_Data[]" id="Rec_NOVIssuance1_Data[]" class="form-control" /></td>
                      <td><button type="button" name="remove" class="btn btn-danger btn-sm Rec_NOVIssuance1_remove" id="Rec_NOVIssuance1_remove">X</button></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>






            <div class="row">
            <div class="col-xs ml-2">
              <div class="">
              <input type="hidden" name="Rec_Issuance5DayCDO1" value="false" checked style="display:none;">
              </div>
              </div>
              <div class="col-xs ml-2">
              <div class="icheck-primary">
              <input type="checkbox" name="Rec_Issuance5DayCDO1" id="Rec_Issuance5DayCDO1" value="true">
              <label for="Rec_Issuance5DayCDO1">For issuance of suspension of ECC/5-day CDO </label>
              </div>
            </div>
            </div>



            <div class="container mt-3" id="Rec_Issuance5DayCDOContainer1" style="display:none;">
            <div class="row">
              <div class="col-12">
                <button type="button" class="btn btn-success mb-2" id="add_Rec_Issuance5DayCDO1">Add</button>
                <table class="table table-bordered" id="table_Rec_Issuance5DayCDO1">
                  <thead>
                    <tr>
                      <th>Others</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr id="row1">
                      <td><input type="text" name="Rec_Issuance5DayCDO1_Data[]" id="Rec_Issuance5DayCDO1_Data[]" class="form-control" /></td>
                      <td><button type="button" name="remove" class="btn btn-danger btn-sm Rec_Issuance5DayCDO1_remove" id="Rec_Issuance5DayCDO1_remove">X</button></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>




            <div class="row">
            <div class="col-xs ml-2">
              <div class="">
              <input type="hidden" name="Rec_EndorsementPAB1" value="false" checked style="display:none;">
              </div>
              </div>
              <div class="col-xs ml-2">
              <div class="icheck-primary">
              <input type="checkbox" name="Rec_EndorsementPAB1" id="Rec_EndorsementPAB1" value="true">
              <label for="Rec_EndorsementPAB1">For endorsement to Pollution Adjudication Board (PAB)</label>
              </div>
            </div>
            </div>

            

            <div class="container mt-3" id="Rec_EndorsementPABContainer1" style="display:none;">
            <div class="row">
              <div class="col-12">
                <button type="button" class="btn btn-success mb-2" id="add_Rec_EndorsementPAB1">Add</button>
                <table class="table table-bordered" id="table_Rec_EndorsementPAB1">
                  <thead>
                    <tr>
                      <th>Others</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr id="row1">
                      <td><input type="text" name="Rec_EndorsementPAB1_Data[]" id="Rec_EndorsementPAB1_Data[]" class="form-control" /></td>
                      <td><button type="button" name="remove" class="btn btn-danger btn-sm Rec_EndorsementPAB1_remove" id="Rec_EndorsementPAB1_remove">X</button></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>




            <div class="row">
            <div class="col-xs ml-2">
              <div class="">
              <input type="hidden" name="OtherRecommendations1" value="false" checked style="display:none;">
              </div>
              </div>
              <div class="col-xs ml-2">
              <div class="icheck-primary">
              <input type="checkbox" name="OtherRecommendations1" id="OtherRecommendations1" value="true">
              <label for="OtherRecommendations1">Other Recommendations</label>
              </div>
            </div>
            </div>


            <div class="container mt-3" id="OtherRecommendations1Container" style="display:none;">
            <div class="row" >
              <div class="col-12">
                <button type="button" class="btn btn-success mb-2" id="add_recommendation1">Add</button>
                <table class="table table-bordered" id="table_OtherRecommendations1">
                  <thead>
                    <tr>
                      <th>Others Recommendations</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr id="row1">
                      <td><input type="text" name="OtherRecommendations1_Data[]" id="OtherRecommendations1_Data[]" class="form-control" /></td>
                      <td><button type="button" name="remove" class="btn btn-danger btn-sm OtherRecommendations1_remove" id="OtherRecommendations1_remove">X</button></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>




 <!-- --------------------------------------------------REMARKS END---------------------------------------------- -->


<br>
<h3><i>Images</i></h3>
<br>
    <div class="form-group">
    <label for="imageupload" class="form-label">Upload Image</label>
    <input type="file" accept="image/*" name="imageupload" id="imageupload">
    </div>





<!-- ------------------------------------------------------------------------------- -->
            <div class="Inspector1">
            <label for="submitted">Submitted by: </label>
            <select id="Inspector1" class="select2 multiple Inspector1" name="Inspector1" required>
              <option value="">Select an option</option>
              <option value="ALMIRA O. RIPALDA">Almira O. Ripalda</option>
              <option value="ALEJANDROQUE G. MACATIGUE">Alejandroque G. Macatigue</option>
              <option value="ANAMARIE D. CAVAÑERO">Anamarie D. Cavañero</option>
              <option value="ARNEL L. IFE">Arnel L. Ife</option>
              <option value="CYRIL ANN B. BADEO">Cyril Ann B. Badeo</option>
              <option value="GINNALYN A. ESPOSA">Ginnalyn A. Esposa</option>
              <option value="JANET T. POLEA">Janet T. Polea</option>
              <option value="JEROME C. SALVADOR">Jerome C. Salvador</option>
              <option value="JO ANNE JOY M. DAÑAL-VILLERO">Jo Anne Joy, M. Dañal-Villero</option>
              <option value="JOSEPH R. AURE">Joseph R. Aure</option>
              <option value="JOSEPHINE L. FUENTES">Josephine L. Fuentes</option>
              <option value="LEDANE JOY Y. LAURENTE">Ledane Joy Y. Laurente</option>
              <option value="LIZA A. TAN">Liza A. Tan</option>
              <option value="ROWENA B. PABIA">Rowena B. Pabia</option>
              <option value="ROY ALEXANDER H. TABOADA">Roy Alexander H. Taboada</option>
              <option value="SHARMAINE I. SILLEZA">Sharmaine I. Silleza</option>
              <option value="SHARMAINE RUTH A. LAUZON">Sharmaine Ruth A. Lauzon</option>
              <option value="SWEET ADEL PRIMA">Sweet Adel Prima</option>
              <option value="XAVIER R. LUBIANO">Xavier R. Lubiano</option>
              <option value="ZEUS BRYAN B. LORETO">Zeus Bryan B. Loreto</option>
            </select>
            </div>
            <div><input type="checkbox" name="" id="BtnSecondaryInspector1">&nbsp; <label for="#" style="font-size:15px;"><i>(Check for secondary inspector)</i></label></div>

           <div id="DivSecondayInspector" style="display:none">
           <select id="SecondaryInspector1" class="select2 SecondaryInspector1" name="SecondaryInspector1">
              <option value="">Select an option</option>
              <option value="ALMIRA O. RIPALDA">Almira O. Ripalda</option>
              <option value="ALEJANDROQUE G. MACATIGUE">Alejandroque G. Macatigue</option>
              <option value="ANAMARIE D. CAVAÑERO">Anamarie D. Cavañero</option>
              <option value="ARNEL L. IFE">Arnel L. Ife</option>
              <option value="CYRIL ANN B. BADEO">Cyril Ann B. Badeo</option>
              <option value="GINNALYN A. ESPOSA">Ginnalyn A. Esposa</option>
              <option value="JANET T. POLEA">Janet T. Polea</option>
              <option value="JEROME C. SALVADOR">Jerome C. Salvador</option>
              <option value="JO ANNE JOY M. DAÑAL-VILLERO">Jo Anne Joy, M. Dañal-Villero</option>
              <option value="JOSEPH R. AURE">Joseph R. Aure</option>
              <option value="JOSEPHINE L. FUENTES">Josephine L. Fuentes</option>
              <option value="LEDANE JOY Y. LAURENTE">Ledane Joy Y. Laurente</option>
              <option value="LIZA A. TAN">Liza A. Tan</option>
              <option value="ROWENA B. PABIA">Rowena B. Pabia</option>
              <option value="ROY ALEXANDER H. TABOADA">Roy Alexander H. Taboada</option>
              <option value="SHARMAINE I. SILLEZA">Sharmaine I. Silleza</option>
              <option value="SHARMAINE RUTH A. LAUZON">Sharmaine Ruth A. Lauzon</option>
              <option value="SWEET ADEL PRIMA">Sweet Adel Prima</option>
              <option value="XAVIER R. LUBIANO">Xavier R. Lubiano</option>
              <option value="ZEUS BRYAN B. LORETO">Zeus Bryan B. Loreto</option>
            </select>
           </div>
      
            <div id="DivSignatories1">
              <div id="DivCheckedby1" style="display:none;">
              <label for="checkedby">Checked by: <span style="color:red">*</span></label>
              <select class="select2" id="SelectCheckedby1" name="SelectCheckedby1">
              <option value="">Please Select: </option>
              <option value="JOSEPHINE L. FUENTES">Josephine L. Fuentes</option>
              <option value="ARNEL L. IFE">Arnel L. Ife</option>
              <option value="ROWENA B. PABIA">Rowena B. Pabia</option>
              <option value="ALEJANDROQUE G. MACATIGUE">Alejandroque G. Macatigue</option>
              <option value="ANAMARIE D. CAVAÑERO">Anamarie D. Cavañero</option>
            </select>
              </div>
              <div id="DivSectionChief1" style="display:none;">
              <label for="sectionchief">Recommending Approval: <span style="color:red">*</span></label>
              <select class="select2" name="SectionChief1" id="SelectSectionChief1">
              <option value="">Please Select</option>
              <option value="JANET T. POLEA">Janet T. Polea</option>
              <option value="LIZA A. TAN">Liza A. Tan</option>
              <option value="REGGIE R. URMENETA">Reggie R. Urmeneta</option>
            </select>
              </div>
              <div id="DivDivisionChief1" style="display:none;">
              <label for="divisionchief">Approval: </label>
              <select class="select2" name="DivisionChief1" id="SelectDivisionChief1">
              <option value="MANUEL J. SACEDA JR.">Manuel J. Saceda Jr.</option>
              </select>
              </div>
              <div id="DivRD1" style="display:none;">
              <label for="RD">Noted: </label>
              <select class="select2" name="RegionalDirector1" id="DivRD1">
              <option value="WILSON L. TRAJECO">WILSON L. TRAJECO</option>
              </select>
              </div>
            </div>
      

<!-- ------------------------------------------------------------------------------- -->

          <!-- <input type="hidden" name="SectionChief1" value="Engr. CARLOS A. CAYANONG">
          <input type="hidden" name="DivisionChief1" value="FOR. MANUEL J. SACEDA JR.">
          <input type="hidden" name="RegionalDirector1" value="MARTIN JOSE V. DESPI"> -->
      
          <div class="form-group">						
            <input type="hidden" class="form-control" id="userid" name="userid" placeholder="Age">							
          </div>		
          </div>
          <div class="modal-footer">
            <input type="hidden" name="id1" id="id1" />
            <input type="hidden" name="action1" id="action1" value=""/>
            <input type="submit" name="save1" id="save1" class="btn btn-info" value="Save" />
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>

    		</form>
    	</div>
    	</div>

    <!------------------------------------------------->

      

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
<!-- <script src="../../build/js/projectlist.js"></script> -->
<!-- <script src="../../build/js/filterlist.js"></script> -->
<script src="../../build/js/filterreport.js"></script>
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
<script src="../../build/js/ajax.js"></script>
<script src="../../build/js/validation.js"></script>
<script src="../../build/js/recommendations.js"></script>
<!-- <script
      src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"
      integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    ></script> -->
	 <!-- CSS -->
	 <!-- <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css"> -->