<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['pmsaid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {
    $adminid=$_SESSION['pmsaid'];
    $aname=$_POST['adminname'];
  $mobno=$_POST['contactnumber'];
  
     $query=mysqli_query($con, "update tbladmin set AdminName ='$aname', MobileNumber='$mobno' where ID='$adminid'");
    if ($query) {
    $msg="Admin profile has been updated.";
  }
  else
    {
      $msg="Something Went Wrong. Please try again.";
    }
  }
  ?>


<!DOCTYPE html>
<html lang="en">

<head>
 
  <title>
     Pharmacy Management System - Admin Profile
  </title>
  <!-- Favicon -->
  <link href="assets/img/brand/favicon.png" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="assets/js/plugins/nucleo/css/nucleo.css" rel="stylesheet" />
  <link href="assets/js/plugins/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link href="assets/css/argon-dashboard.css?v=1.1.0" rel="stylesheet" />
</head>

<body class="">
  <?php include_once('includes/navbar.php');?>
  <div class="main-content">
    <!-- Navbar -->
     <?php include_once('includes/sidebar.php');?>
    <!-- End Navbar -->
    <!-- Header -->
    <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="min-height: 600px; background-image: url(assets/img/theme/profile-cover.jpg); background-size: cover; background-position: center top;">
      <!-- Mask -->
      <span class="mask bg-gradient-default opacity-8"></span>
      <!-- Header container -->
      <div class="container-fluid d-flex align-items-center">
        <div class="row">
         
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--7">
      <div class="row">
       
        <div class="col-xl-8 order-xl-1">
          <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Admin Profile</h3>
                </div>
                
              </div>
            </div>
            <div class="card-body">
              <form method="post">
                <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>

  <?php
$adminid=$_SESSION['pmsaid'];
$ret=mysqli_query($con,"select * from tbladmin where ID='$adminid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
                <h6 class="heading-small text-muted mb-4">Admin Detail</h6>
                <div class="pl-lg-12">
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Admin Name</label>
                        <input type="text" id="adminname" name="adminname" type="text" class="form-control form-control-alternative" value="<?php  echo $row['AdminName'];?>" >
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">User Name</label>
                        <input type="text" id="username" name="username" type="text" class="form-control form-control-alternative" value="<?php  echo $row['UserName'];?>" readonly="true">
                      </div>
                    </div>
                     <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Contact Number</label>
                        <input type="text" id="contactnumber" name="contactnumber" type="text" class="form-control form-control-alternative" value="<?php  echo $row['MobileNumber'];?>">
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Email address</label>
                        <input type="email" id="email" name="email" class="form-control form-control-alternative" value="<?php  echo $row['Email'];?>" readonly='true'>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    
                  
                  </div>
                </div>
                              
                <hr class="my-4" />
                <!-- Description -->
                <?php } ?>
                <div class="pl-lg-4">
                 <div class="text-center">
                  <button class="btn btn-primary my-4" type="submit" name="submit">Update</button>
                </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- Footer -->
      <footer class="footer">
        <div class="row align-items-center justify-content-xl-between">
          <div class="col-xl-6">
            <div class="copyright text-center text-xl-left text-muted">
              &copy; 2018 <a href="https://www.creative-tim.com" class="font-weight-bold ml-1" target="_blank">Creative Tim</a>
            </div>
          </div>
          <div class="col-xl-6">
            <ul class="nav nav-footer justify-content-center justify-content-xl-end">
              <li class="nav-item">
                <a href="https://www.creative-tim.com" class="nav-link" target="_blank">Creative Tim</a>
              </li>
              <li class="nav-item">
                <a href="https://www.creative-tim.com/presentation" class="nav-link" target="_blank">About Us</a>
              </li>
              <li class="nav-item">
                <a href="http://blog.creative-tim.com" class="nav-link" target="_blank">Blog</a>
              </li>
              <li class="nav-item">
                <a href="https://github.com/creativetimofficial/argon-dashboard/blob/master/LICENSE.md" class="nav-link" target="_blank">MIT License</a>
              </li>
            </ul>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <!--   Core   -->
  <script src="assets/js/plugins/jquery/dist/jquery.min.js"></script>
  <script src="assets/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!--   Optional JS   -->
  <!--   Argon JS   -->
  <script src="assets/js/argon-dashboard.min.js?v=1.1.0"></script>
  <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
  <script>
    window.TrackJS &&
      TrackJS.install({
        token: "ee6fab19c5a04ac1a32a645abde4613a",
        application: "argon-dashboard-free"
      });
  </script>
</body>

</html>
<?php } ?>