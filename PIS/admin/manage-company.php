<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['pmsaid']==0)) {
  header('location:logout.php');
  } else{



  ?>
<!DOCTYPE html>
<html lang="en">

<head>
 
  <title>
    Pharmacy Management System - Manage Company
  </title>
  
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
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
      <div class="container-fluid">
        <div class="header-body">
          <!-- Card stats -->
          
        </div>
      </div>
    </div>
    <div class="container-fluid mt--7">
      <!-- Table -->
      <div class="row">
        <div class="col">
          <div class="card shadow">
            <div class="card-header border-0">
              <h3 class="mb-0">Manage Pharmacy Company</h3>
            </div>
            <div class="table-responsive" style="margin-top:2%">
              <table class="table align-items-center" style="font-size:22px;" border="2">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">S.NO</th>
                    <th scope="col">Manage Pharmacy Company</th>
                    <th scope="col">Action</th>
                    
                  </tr>
                </thead>
                <tbody>
                  <?php
$ret=mysqli_query($con,"select *from  tblcompany");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
              
                <tr>
                  <td><?php echo $cnt;?></td>
            
                 
                  <td><?php  echo $row['CompanyName'];?></td>
                  
                  <td><a href="edit-company.php?editid=<?php echo $row['ID'];?>">Edit Details</a></td>
                </tr>
                <?php 
$cnt=$cnt+1;
}?>
                </tbody>
              </table>
            </div>
            <div class="card-footer py-4">
           
            </div>
          </div>
        </div>
      </div>
      <!-- Dark table -->
     
      <!-- Footer -->
    <?php include_once('includes/footer.php');?>
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
<?php }  ?>