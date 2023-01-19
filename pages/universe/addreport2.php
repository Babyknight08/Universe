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
    					<!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
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
              <input type="text" name="reportcontrol" class="form-control" id="reportcontrol" placeholder="Report Control No." autocomplete="off">
            </div>

            <div class="form-group col-md-4">
              <label for="doi">Date of Inspection</label>
              <input type="date" name="doi" class="form-control" id="doi" placeholder="Date of Inspection" required>
            </div>

            <div class="form-group col-md-4">
              <label for="missionorder">Mission Order No.</label>
              <input type="text" name="missionorder" class="form-control" id="missionorder" placeholder="Mission Order No." autocomplete="off">
            </div>
            </div>

            <div class="row d-flex justify-content-around p-3">
            <div class="">				
              <input type="hidden" name="Air" value ="false">
              <input type="checkbox" name="Air" id="Air" value ="true">
							<label for="Air" class="control-label"><strong>RA8749(AIR)</strong></label>
						</div>
                    
            <div class="">				
              <input type="hidden" name="Water" value ="false">
              <input type="checkbox" name="Water" id="Water" value ="true">
							<label for="Water" class="control-label"><strong>RA9275(WATER)</strong></label>
						</div>

            <div class="">				
              <input type="hidden" name="EIA" value ="false">
              <input type="checkbox" name="EIA" id="EIA" value ="true">
							<label for="EIA" class="control-label"><strong>PD1586(EIA)</strong></label>
						</div>

            <div class="">				
              <input type="hidden" name="CHWMS" value ="false">
              <input type="checkbox" name="CHWMS" id="CHWMS" value ="true">
							<label for="CHWMS" class="control-label"><strong>RA6969(HAZARDOUS WASTE)</strong></label>
						</div>

            <div class="">				
              <input type="hidden" name="SolidWaste" value ="false">
              <input type="checkbox" name="SolidWaste" id="SolidWaste" value ="true">
							<label for="SolidWaste" class="control-label"><strong>RA9003(SOLID WASTE)</strong></label>
						</div>
            </div>       

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
							<select class="form-control" name="Product" id="Product">
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
							<input type="date" class="form-control"  id="YearEstablished" name="YearEstablished" placeholder="Year Established" required>							
						</div>
          </div>


          <div class="row">
            
          <div class="form-group col-md-4" >
							<label for="Mhead" class="control-label">Managing Head</label>							
							<input type="text" class="form-control"  id="MHead" name="MHead" placeholder="Managing Head" >							
						</div>		

            <div class="form-group col-md-4" >
							<label for="PCO" class="control-label">PCO</label>							
							<input type="text" class="form-control"  id="PCO" name="PCO" placeholder="PCO" readonly required>							
						</div>	

            <div class="form-group col-md-4" >
							<label for="PCOAccreditation" class="control-label">PCO Accreditation</label>							
							<input type="text" class="form-control"  id="PCOAccreditation" name="PCOAccreditation" placeholder="PCO Accreditation" >							
						</div>	
          </div>
          <div class="row">
            <div class="col-md-12">
              <h4 class="text-secondary"><em>2. Purpose of Verification</em></h4>
            </div>
          </div>

          <div class="row">
          <div class="">
              <input type="hidden" value="false" name="VerifyAccuracy">
              <input type="checkbox" id="verify" value="true" name="VerifyAccuracy"/>
              <label for="verify">Verify accuracy of information submitted by the establishment pertaining to new permit
                    applications, renewals, or modifications.</label>
            </div>
          </div>


          <div class="row justify-content-around m-2">
            <div class="form-group d-flex flex-row bd-highlight justify-content-around">
              <label for="" style="width:20rem">&nbsp; PERMIT</label>
              </div>
              <div class = "p-2">
             <label for="">NEW/</label>
             <label for="">RENEW/</label>
             <label for="">NOT APPLICABLE</label>
              </div>
          </div>

          <div class="row justify-content-around">
            <div class="form-group d-flex flex-row bd-highlight justify-content-around mb-3">
             
              <label for="" style="width:20rem">PMPIN Hazardous </label>
              </div>
              <div>
              <input type="radio" name="PMPIN_Hazardous" id="PMPIN_HazardousNew" value="NEW" class="mr-5">
              <input type="radio" name="PMPIN_Hazardous" id="PMPIN_HazardousRenew" value="RENEW" class="mr-5">
              <input type="radio" name="PMPIN_Hazardous" id="PMPIN_HazardousNA" value="NOT APPLICABLE" class="mr-5">
              </div>
          </div>


          <div class="row justify-content-around">
            <div class="form-group d-flex flex-row bd-highlight justify-content-around mb-3">
             
              <label for="" style="width:20rem">Hazardous Waste ID Registration </label>
              </div>
              <div>
              <input type="radio" name="HWIDRegistration" id = "HWIDRegistrationNew" value="NEW" class="mr-5">
              <input type="radio" name="HWIDRegistration" id = "HWIDRegistrationRenew" value="RENEW" class="mr-5">
              <input type="radio" name="HWIDRegistration" id = "HWIDRegistrationNA" value="NOT APPLICABLE" class="mr-5">
              </div>
          </div>


          
          <div class="row justify-content-around">
            <div class="form-group d-flex flex-row bd-highlight justify-content-around mb-3">
             
              <label for="" style="width:20rem">Hazardous Waste Transporter Registration </label>
              </div>
              <div>
              <input type="radio" name="HWTRegistration" id = "HWTRegistrationNew" value="NEW" class="mr-5">
              <input type="radio" name="HWTRegistration" id = "HWTRegistrationRenew" value="RENEW" class="mr-5">
              <input type="radio" name="HWTRegistration" id = "HWTRegistrationNA" value="NOT APPLICABLE" class="mr-5">
              </div>
          </div>

          
          <div class="row justify-content-around">
            <div class="form-group d-flex flex-row bd-highlight justify-content-around mb-3">
             
              <label for="" style="width:20rem">HAZARDOUS WASTE TSD REGISTRATION </label>
              </div>
              <div>
              <input type="radio" name="HWTSDRegistration" id ="HWTSDRegistrationNew" value="NEW" class="mr-5">
              <input type="radio" name="HWTSDRegistration" id ="HWTSDRegistrationRenew"value="RENEW" class="mr-5">
              <input type="radio" name="HWTSDRegistration" id ="HWTSDRegistrationNA" value="NOT APPLICABLE" class="mr-5">
              </div>
          </div>

             <div class="row justify-content-around">
            <div class="form-group d-flex flex-row bd-highlight justify-content-around mb-3">
             
              <label for="" style="width:20rem"> Permit to Operate Air Pollution Control Installation </label>
              </div>
              <div>
              <input type="radio" name="PTOAPCI" id="PTOAPCINew" value="NEW" class="mr-5">
              <input type="radio" name="PTOAPCI" id="PTOAPCIRenew" value="RENEW" class="mr-5">
              <input type="radio" name="PTOAPCI" id="PTOAPCINA" value="NOT APPLICABLE" class="mr-5">
              </div>
          </div>

          <div class="row justify-content-around">
            <div class="form-group d-flex flex-row bd-highlight justify-content-around mb-3">
             
              <label for="" style="width:20rem"> Discharge Permit </label>
              </div>
              <div>
              <input type="radio" name="DischargePermit" id="DischargePermitNew" value="NEW" class="mr-5">
              <input type="radio" name="DischargePermit" id="DischargePermitRenew" value="RENEW" class="mr-5">
              <input type="radio" name="DischargePermit" id="DischargePermitNA" value="NOT APPLICABLE" class="mr-5">
              </div>
          </div>

          <div class="justify-content-center" style="width: 72%; margin-left: 8.7rem;">
            <input type="checkbox" id="otherspv" name="otherspv" onclick="others()" value="true">
            <label for="">Others: &nbsp; </label>
            <input type="text" class="form-control" style="display:none" id="otherspv_text" name="otherspv_text">
          </div>
          <div class="row">
              <div class="form-group">
                    <div class="icheck-success">
                        <input type="checkbox" id="determinecompliance1">
                        <label for="determinecompliance1">Determine compliance status with environmental regulation, permit conditions, and other requirements</label>
                    </div>                              
                </div>
            </div>

          <div class="row">
            <div class="form-group">
                  <div class="icheck-success">
                      <input type="checkbox" id="investigatecomplaints1" value="false">
                      <label for="investigatecomplaints1">Investigate community complaints</label>
                  </div>                              
              </div>
          </div>

          <div class="row">
            <div class="form-group">
                  <div class="icheck-success">
                      <input type="checkbox" id="statuscommitments1">
                      <label for="statuscommitments1">Check status of commitment(s)</label>
                  </div>                              
              </div>
          </div>

          <div class="row ml-4">
            <div class="form-group">
                  <div class="icheck-success">
                      <input type="checkbox" id="ewatchprogram1">
                      <label for="ewatchprogram1">Industrial EcoWatch Program</label>
                  </div>                              
              </div>
          </div>
          
          <div class="row ml-4">
            <div class="form-group">
                  <div class="icheck-success">
                      <input type="checkbox" id="PEPP1">
                      <label for="PEPP1">Philippine Environmental Partnership Program (PEPP)</label>
                  </div>                              
            </div>
          </div>
          
          <div class="row ml-4">
            <div class="form-group">
                  <div class="icheck-success">
                      <input type="checkbox" id="pab1">
                      <label for="pab1">Pollution Adjudication Board (PAB)</label>
                  </div>                              
              </div>
          </div>
          
          <div class="row ml-4">
            <div class="form-group">
                  <div class="icheck-success">
                      <input type="checkbox" id="others1">
                      <!-- <label for="others1">Others</label> -->
                      <input type="text" class="form-control">
                  </div>                              
              </div>
          </div>


   

        
          
          

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

    

      <!------------------------------------------------->
      <div id="searchModal" class="modal fade" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true" >
	<div class="modal-dialog modal-xl modal-body ui-front">
    		<form method="post" id="searchForm">
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
              <label for="reportcontrol">Report Control No.<span style="color:red">*</span></label>
              <input type="text" name="reportcontrol1" class="form-control" id="reportcontrol1" placeholder="Report Control No." autocomplete="off" style="text-transform:uppercase">
            </div>

            <div class="form-group col-md-4">
              <label for="doi">Date of Inspection<span style="color:red">*</span></label>
              <input type="date" name="doi1" class="form-control" id="doi1" placeholder="Date of Inspection" required>
            </div>

            <div class="form-group col-md-4">
              <label for="missionorder">Mission Order No.<span style="color:red">*</span></label>
              <input type="text" name="missionorder1" class="form-control" id="missionorder1" placeholder="Mission Order No." autocomplete="off" style="text-transform:uppercase">
            </div>
            </div>

                    
  

            <div class="row d-flex justify-content-around p-3">
            <div class="">				
              <input type="hidden" name="Air1" value ="false">
              <input type="checkbox" name="Air1" value = "true">
							<label for="Air1" class="control-label"><strong>RA8749(AIR)</strong></label>
						</div>


            <div class="">				
              <input type="hidden" name="Water1" value ="false">
              <input type="checkbox" name="Water1" value ="true">
							<label for="Water1" class="control-label"><strong>RA9275(WATER)</strong></label>
						</div>

            <div class="">				
              <input type="hidden" name="EIA1" value ="false"> 
              <input type="checkbox" name="EIA1" value ="true">
							<label for="EIA1" class="control-label"><strong>PD1586(EIA)</strong></label>
      
						</div>

            <div class="">				
              <input type="hidden" name="CHWMS1" value ="false">
              <input type="checkbox" name="CHWMS1" value ="true">
							<label for="CHWMS1" class="control-label"><strong>RA6969(HAZARDOUS WASTE)</strong></label>
						</div>

            <div class="">				
              <input type="hidden" name="SolidWaste1" value ="false">
              <input type="checkbox" name="SolidWaste1" value ="true">
							<label for="SolidWaste1" class="control-label"><strong>RA9003(SOLID WASTE)</strong></label>
						</div>
					</div>



            <div class="form-group">				
							<label for="name1" class="control-label"><strong>Establishment Name<span style="color:red">*</span></strong></label>
              <select name="name1" id="name1" class="form-select select2" required></select>
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
							<select class="form-control select2" name="PSICCode1" id="PSICCode1">
              <option value="">--Select PSIC Code--</option>
              <option value="014">014</option>
              <option value="032">032</option>
              <option value="05">05</option>
              <option value="06">06</option>
              <option value="07100">07100</option>
              <option value="0722">0722</option>
              </select>
						</div>	

            <div class="form-group col-md-4">
              <label for="Product" class="control-label">Product<span style="color:red">*</span></label>		
							<select class="form-control select2" name="Product1" id="Product1">
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
							<input type="text" class="form-control"  id="Latitude1" name="Latitude1" placeholder="Latitude" readonly required>							
						</div>	
            <div class="form-group col-md-4">
							<label for="Longitude" class="control-label">Longitude</label>							
							<input type="text" class="form-control"  id="Longitude1" name="Longitude1" placeholder="Longitude" readonly required>							
						</div>	
            <div class="form-group col-md-4">
							<label for="YearEstablished" class="control-label">Year Established<span style="color:red">*</span></label>							
							<input type="date" class="form-control"  id="YearEstablished1" name="YearEstablished1" placeholder="Year Established" required>							
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
                      <div class="col-md-12">
                        <h4 class="text-secondary"><em>2. Purpose of Verification</em></h4>
                      </div>
            </div>

            <div class="">
              <input type="hidden" value="false" name="VerifyAccuracy1">
               <input type="checkbox" checked id="verify1" value="true" name="VerifyAccuracy1"/>
              <label for="verify">Verify accuracy of information submitted by the establishment pertaining to new permit
                    applications, renewals, or modifications.</label>
            </div>

      
        <div class="row justify-content-around m-2">
            <div class="form-group d-flex flex-row bd-highlight justify-content-around">
              <label for="" style="width:20rem">&nbsp; PERMIT</label>
              </div>
              <div>
             <label for="">NEW/</label>
             <label for="">RENEW/</label>
             <label for="">NOT APPLICABLE</label>
              </div>
          </div>

          <div class="row justify-content-around">
            <div class="form-group d-flex flex-row bd-highlight justify-content-around mb-3">
             
              <label for="" style="width:20rem">PMPIN Hazardous </label>
              </div>
              <div>
              <input type="radio" name="PMPIN_Hazardous1" id="PMPIN_Hazardous1New" value="NEW" class="mr-5">
              <input type="radio" name="PMPIN_Hazardous1" id="PMPIN_Hazardous1Renew" value="RENEW" class="mr-5">
              <input type="radio" name="PMPIN_Hazardous1" id="PMPIN_Hazardous1NA" value="NOT APPLICABLE" class="mr-5">
              </div>
          </div>


          <div class="row justify-content-around">
            <div class="form-group d-flex flex-row bd-highlight justify-content-around mb-3">
             
              <label for="" style="width:20rem">Hazardous Waste ID Registration </label>
              </div>
              <div>
              <input type="radio" name="HWIDRegistration1" value="NEW" class="mr-5">
              <input type="radio" name="HWIDRegistration1" value="RENEW" class="mr-5">
              <input type="radio" name="HWIDRegistration1" value="NOT APPLICABLE" class="mr-5">
              </div>
          </div>


          
          <div class="row justify-content-around">
            <div class="form-group d-flex flex-row bd-highlight justify-content-around mb-3">
             
              <label for="" style="width:20rem">Hazardous Waste Transporter Registration </label>
              </div>
              <div>
              <input type="radio" name="HWTRegistration1" value="NEW" class="mr-5">
              <input type="radio" name="HWTRegistration1" value="RENEW" class="mr-5">
              <input type="radio" name="HWTRegistration1" value="NOT APPLICABLE" class="mr-5">
              </div>
          </div>
   
          <div class="row justify-content-around">
            <div class="form-group d-flex flex-row bd-highlight justify-content-around mb-3">
             
              <label for="" style="width:20rem">Hazardous Waste TSD Registration </label>
              </div>
              <div>
              <input type="radio" name="HWTSDRegistration1" value="NEW" class="mr-5">
              <input type="radio" name="HWTSDRegistration1" value="RENEW" class="mr-5">
              <input type="radio" name="HWTSDRegistration1" value="NOT APPLICABLE" class="mr-5">
              </div>
          </div>
          <div class="row justify-content-around">
            <div class="form-group d-flex flex-row bd-highlight justify-content-around mb-3">
             
              <label for="" style="width:20rem"> Permit to Operate Air Pollution Control Installation </label>
              </div>
              <div>
              <input type="radio" name="PTOAPCI1" id="PTOAPCI1New" value="NEW" class="mr-5">
              <input type="radio" name="PTOAPCI1" id="PTOAPCI1Renew" value="RENEW" class="mr-5">
              <input type="radio" name="PTOAPCI1" id="PTOAPCI1NA" value="NOT APPLICABLE" class="mr-5">
              </div>
          </div>

            <div class="row justify-content-around">
              <div class="form-group d-flex flex-row bd-highlight justify-content-around mb-3">
              
                <label for="" style="width:20rem"> Discharge Permit </label>
                </div>
                <div class="">
                <input type="radio" name="DischargePermit1" id="DischargePermit1New" value="NEW" class="mr-5">
                <input type="radio" name="DischargePermit1" id="DischargePermit1Renew" value="RENEW" class="mr-5">
                <input type="radio" name="DischargePermit1" id="DischargePermit1NA" value="NOT APPLICABLE" class="mr-5">
                </div>
            </div>

          <div class="justify-content-center" style="width: 72%; margin-left: 8.7rem;">
            <input type="hidden" name="otherspv1" value="false">
            <input type="checkbox" id="otherspv1" name="otherspv1" onclick="others()" value="true">
            <label for="">Others: &nbsp;</label><br>
            <input type="text" class="form-control" style="display:none" id="otherspv1_text" name="otherspv1_text">
          </div><br>

          <div class="row">
              <div class="form-group">
                        <input type="hidden" name = "determinecompliance1" value = "false">
                        <input type="checkbox" name = "determinecompliance1" value = "true">
                        <label for="determinecompliance">Determine compliance status with environmental regulation, permit conditions, and other requirements</label>                   
              </div>
            </div>

          <div class="row">
            <div class="form-group">
                      <input type="hidden" name = "investigatecomplaints1" value = "false">
                      <input type="checkbox" name = "investigatecomplaints1" value = "true">
                      <label for="investigatecomplaints">Investigate community complaints</label>                          
            </div>
          </div>

          <div class="row">
            <div class="form-group">
                      <input type="hidden" name = "statuscommitments1" value = "false">
                      <input type="checkbox" name = "statuscommitments1" value = "true">
                      <label for="statuscommitments">Check status of commitment(s)</label>                           
            </div>
          </div>

          <div class="row ml-4">
            <div class="form-group">
                     <input type="hidden" name = "ewatchprogram1" value = "false">
                      <input type="checkbox" name = "ewatchprogram1" value = "true">
                      <label for="ewatchprogram">Industrial EcoWatch Program</label>                            
            </div>
          </div>
          
          <div class="row ml-4">
            <div class="form-group">
                     <input type="hidden" name = "PEPP1" value = "false">
                      <input type="checkbox" name = "PEPP1" value = "true">
                      <label for="PEPP">Philippine Environmental Partnership Program (PEPP)</label>                       
            </div>
          </div>
          
          <div class="row ml-4">
            <div class="form-group">
                      <input type="hidden" name = "pab1" value = "false">
                      <input type="checkbox" name = "pab1" value = "true">
                      <label for="pab">Pollution Adjudication Board (PAB)</label>                     
              </div>
          </div>
          
          <div class="row ml-4">
            <div class="form-group">
                      <input type="checkbox" id="others2" onclick="others()">
                      <label for="others">Others</label>
                      <input type="text" class="form-control" style="display:none" id="display2">                       
            </div>
          </div>

   

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
<script
      src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"
      integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    ></script>
	 <!-- CSS -->
	 <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">


