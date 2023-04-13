<?php 

  session_start();
  include_once 'build/php/dologin.php';
  $login = new USER();

  if(!$login->is_loggedin()) {
    header('Location: login.php');
  }

  $usertype = $_SESSION['usertype'];
  $section = $_SESSION['section'];
  $userid = $_SESSION['userid'];
  $username = $_SESSION['fullname'];


?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
      <img src="dist/img/EMBLogo.png" alt="DENR-EMB Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">EMB-R8 IIMS</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/avatar4.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $_SESSION['fullname']; ?></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item">
                <a href="index.php" class="nav-link active" id="objdashboard">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Dashboard
                    </p>
                </a>
            </li> 
            <li class="nav-header" <?php if($usertype!='a') { echo 'hidden'; } ?>><small>USERS MANAGEMENT</small></li>
            <li class="nav-item" <?php if($usertype!='a'){ echo 'hidden'; } ?>>
                <a href="#" class="nav-link active" id="objusers">
                <i class="nav-icon far fa-user"></i>
                <p>
                    Employees
                    <i class="fas fa-angle-left right"></i>
                </p>
                </a>
                <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="pages/employees/userlist.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <small><p>Users List</p></small>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="pages/employees/userconfiguration.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <small><p>Configuration</p></small>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="pages/employees/userlogs.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <small><p>User Logs</p></small>
                    </a>
                </li>
                </ul>
            </li>
            <li class="nav-header"><small>UNIVERSE</small></li>
            <li class="nav-item">
                <a href="#" class="nav-link active" id="objuniverse">
                <i class="nav-icon far fa-building"></i>
                <p>
                    Industries
                    <i class="fas fa-angle-left right"></i>
                </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="pages/universe/projectclass.php" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <small><p>Project Classifications</p></small>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="pages/universe/projectlist.php" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <small><p>List of Projects</p></small>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="pages/universe/addreport2.php" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <small><p>Monitoring Report</p></small>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="pages/universe/expiredpermits.php" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <small><p>Expired Permits</p></small>
                      <span class="right badge badge-danger">!</span>
                    </a>
                  </li>
                </ul>
            </li>
            <li class="nav-header" hidden><small>SOLID WASTE MANAGEMENT</small></li>
            <li class="nav-item" hidden>
                <a href="#" class="nav-link">
                <i class="nav-icon far fa-trash-alt"></i>
                <p>
                    Open Dumpsites
                    <i class="fas fa-angle-left right"></i>
                </p>
                </a>
                <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="pages/mailbox/mailbox.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <small><p>Local Government Units</p></small>
                    </a>
                </li>
                </ul>
            </li>
            <li class="nav-header"><small>OTHERS</small></li>
            <li class="nav-item">
              <a href="#" data-toggle="modal" data-target="#modal-patch" class="nav-link" id="objlogs">
                  <i class="far fa-sticky-note nav-icon"></i>
                  <p>
                      Patch Notes
                    <span class="right badge badge-primary">!</span>
                  </p>
              </a>
            </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

          <!------------------------------------------------->
        <div class="modal fade" data-backdrop="static" id="modal-patch" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title text-primary"><i class="fas fa-sticky-note"></i> Patch Notes</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
              <ul class="list-unstyled text-secondary">
                <li><b>AUGUST 11, 2022</b>
                    <ul>
                        <li><small> <b>CMR Submissions</b> is now part of filter options when exporting excel report</small></li>
                        <li><small> Rows exported prompt when generating universe listing now returns the exact number of filtered firms</small></li>
                        <li><small> Added <b>Expired Permits</b> tab under <b>Industries</b></small></li>
                        <li><small> Added a <b>Map of the Universe</b> feature in Dashboard that can be filtered by <b>All Projects</b>, <b>Permits</b> and <b>Project Type</b></small></li>
                        <li><small> Added <b>Compliance Monitoring Report</b> tab under <b>Industry Profile</b> to view CMR submission of firms</small></li>
                        <li><small> <b>CMR Submissions</b> bar chart can be viewed under Dashboard page</b></small></li>
                    </ul>
                </li>
                <li><b>FEBRUARY 14, 2022</b>
                    <ul>
                        <li><small> Added a google map feature when adding/updating a project</small></li>
                    </ul>
                </li>
                <li><b>FEBRUARY 08, 2022</b>
                    <ul>
                        <li><small> Administrator Type accounts can now delete a firm</small></li>
                        <li><small> Accounts under Provincial Environmental Management Unit (PEMU) now has full access to EIA Monitoring Tab</small></li>
                    </ul>
                </li>
                <li><b>NOVEMBER 03, 2021</b>
                    <ul>
                        <li><small> Fixed a bug where <b>NOV</b> issuance dates are being displayed in the <b>RA9275</b> covered column of the generated excel document</small></li>
                        <li><small> EMBR8 Universe system is now offically called <b>Industry Information Management System (IIMS)</b></small></li>
                    </ul>
                </li>
                <li><b>JULY 09, 2021</b>
                  <ul>
                    <li><small> Addressed a bug preventing the fields <b>Project Type, Project Subtype, Project Specific Type & Project Specific Subtype</b> from loading correctly in <b>Update Project Form.</b></small></li>
                    <li><small> Added <b>ECC, CNC, HWG-ID & PCO</b> to the list of options that can be filtered to display a <b>line chart</b> in <b>Dashboard</b> page.</small></li>
                    <li><small> Fixed an issue where the values being displayed for columns <b>ECC Covered</b> & <b>CNC Covered</b> in <b>Summary Report</b> were incorrect.</small></li>
                  </ul>
                </li>
              </ul>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-primary btn-block" data-dismiss="modal"><i class="fas fa-thumbs-up"></i></button>
              <!-- <button type="button" class="btn btn-success" id="button-reset">Confirm Reset</button> -->
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!------------------------------------------------->