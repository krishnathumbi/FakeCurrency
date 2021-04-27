 <nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
      <!-- Toggler -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- Brand -->
      <a class="navbar-brand pt-0" href="index.html">
        <img src="assets/img/brand/blue.png" class="navbar-brand-img" alt="...">
      </a>
      <!-- User -->
      <ul class="nav align-items-center d-md-none">
        <li class="nav-item dropdown">
          <a class="nav-link nav-link-icon" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="ni ni-bell-55"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right" aria-labelledby="navbar-default_dropdown_1">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <div class="media align-items-center">
              <span class="avatar avatar-sm rounded-circle">
                <img alt="Image placeholder" src="assets/img/theme/team-1-800x800.jpg
">
              </span>
            </div>
          </a>
          <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
            <div class=" dropdown-header noti-title">
              <h6 class="text-overflow m-0">Welcome!</h6>
            </div>
            <a href="profile.html" class="dropdown-item">
              <i class="ni ni-single-02"></i>
              <span>My profile</span>
            </a>
            <a href="profile.html" class="dropdown-item">
              <i class="ni ni-settings-gear-65"></i>
              <span>Settings</span>
            </a>
            <a href="profile.html" class="dropdown-item">
              <i class="ni ni-calendar-grid-58"></i>
              <span>Activity</span>
            </a>
            <a href="profile.html" class="dropdown-item">
              <i class="ni ni-support-16"></i>
              <span>Support</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="index.php" class="dropdown-item">
              <i class="ni ni-user-run"></i>
              <span>Logout</span>
            </a>
          </div>
        </li>
      </ul>
      <!-- Collapse -->
      <div class="collapse navbar-collapse" id="sidenav-collapse-main">
        <!-- Collapse header -->
        <div class="navbar-collapse-header d-md-none">
          <div class="row">
            <div class="col-6 collapse-brand">
              <a href="index.html">
                <img src="assets/img/brand/blue.png">
              </a>
            </div>
            <div class="col-6 collapse-close">
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                <span></span>
                <span></span>
              </button>
            </div>
          </div>
        </div>
        <!-- Form -->
        <form class="mt-4 mb-3 d-md-none">
          <div class="input-group input-group-rounded input-group-merge">
            <input type="search" class="form-control form-control-rounded form-control-prepended" placeholder="Search" aria-label="Search">
            <div class="input-group-prepend">
              <div class="input-group-text">
                <span class="fa fa-search"></span>
              </div>
            </div>
          </div>
        </form>
        <!-- Navigation -->
        
        <ul class="navbar-nav">
          <li class="nav-item">
          <a class=" nav-link active " href="dashboard.php"> <i class="ni ni-tv-2 text-primary"></i> Dashboard
            </a>
          </li>

         
          <li class="nav-item dropdown">
            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                               <span class="nav-link"><i class="ni ni-bullet-list-67 text-red"></i>      Pharmacy Company</span>
              
            </a>
            <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
              
              <a href="add-pharmacy-company.php" class="dropdown-item">
                <i class="ni ni-fat-add"></i>
                <span>Add Company</span>
              </a>
              <a href="manage-company.php" class="dropdown-item">
                <i class="ni ni-collection"></i>
                <span>Manage Company</span>
              </a>
              
              
              
            </div>
          </li>

       

       
          <li class="nav-item dropdown">
            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                               <span class="nav-link"><i class="ni ni-single-02 text-yellow"></i>      Pharmacist</span>
              
            </a>
            <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
              
              <a href="add-pharmacist.php" class="dropdown-item">
                <i class="ni ni-fat-add"></i>
                <span>Add Pharmacist</span>
              </a>
              <a href="manage-pharmacist.php" class="dropdown-item">
                <i class="ni ni-collection"></i>
                <span>Manage Pharmacist</span>
              </a>
              
              
              
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="nav-link"><i class="ni ni-palette text-blue"></i>      Medicine</span>
              
            </a>
            <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
              
              <a href="add-medicine.php" class="dropdown-item">
                <i class="ni ni-fat-add"></i>
                <span>Add Medicine</span>
              </a>
              <a href="manage-medicine.php" class="dropdown-item">
                <i class="ni ni-collection"></i>
                <span>Manage Medicine</span>
              </a>
              
              
              
            </div>
          </li>
        
          <li class="nav-item">
            <a class="nav-link " href="invoice-search.php">
              <i class="fa fa-search text-orange"></i> Invoice Search
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="medicine-inventory.php">
              <i class="ni ni-fat-add text-blue"></i> Medicine Inventory
            </a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                               <span class="nav-link"><i class="ni ni-palette text-blue"></i>      Reports</span>
              
            </a>
            <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
              
              <a href="bwdates-reports-ds.php" class="dropdown-item">
                <i class="ni ni-fat-add"></i>
                <span>Stock Reports</span>
              </a>
              <a href="pharmacist-report-ds.php" class="dropdown-item">
                <i class="ni ni-collection"></i>
                <span>Pharmacist wise Reports</span>
              </a>
               <a href="sales-reports.php" class="dropdown-item">
                <i class="ni ni-collection"></i>
                <span>Sales Report</span>
              </a>
              
              
              
            </div>
          </li>
         
        </ul>
        <h6 class="navbar-heading text-muted">Reports</h6>
        <!-- Navigation -->
        <ul class="navbar-nav mb-md-3">
          <li class="nav-item">
            <a class="nav-link" href="bwdates-reports-ds.php">
              <i class="ni ni-spaceship"></i> Stock Reports
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pharmacist-report-ds.php">
              <i class="ni ni-palette"></i> Pharmacist wise Reports
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="sales-reports.php">
              <i class="ni ni-ui-04"></i> Sales Report
            </a>
          </li>
        </ul>
        <!-- Divider -->
       
        <!-- Heading -->
       
        <!-- Navigation -->
      
      </div>
    </div>
  </nav>