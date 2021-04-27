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
    Pharmacy Management System - B/W dates Reports
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

            <div class="table-responsive">
              <h4 class="m-t-0 header-title">Between Dates Reports</h4>
              <?php
$fdate=$_POST['fromdate'];
$tdate=$_POST['todate'];
?>
<h5 align="center" style="color:blue">Report from <?php echo $fdate?> to <?php echo $tdate?></h5>
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">S.NO</th>
                    <th scope="col"> Company</th>
                    <th scope="col"> Name</th>
                     <th scope="col"> Batch Number</th>
                     <th scope="col"> Qty</th>
                     <th scope="col"> Sold Qty</th>
                    
                   
                    
                  </tr>
                </thead>
                
                <tbody>
                  <?php

$ret=mysqli_query($con,"Select tblmedicine.MedicineName,tblmedicine.MedicineBatchno,sum(tblcart.ProductQty) as totalsellqty, tblmedicine.* from tblcart    join tblmedicine  on tblmedicine.ID=tblcart.ProductId where date(CartDate) between '$fdate' and '$tdate' group by tblmedicine.MedicineName,tblmedicine.MedicineBatchno");
$num=mysqli_num_rows($ret);
if($num>0){
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {
$qty=$row['selledqty'];
?>
              
                <tr>
                  <input type="hidden" name="mid" value="<?php echo $row['ID'];?>">
                  <td><?php echo $cnt;?></td>
            
                 
                  <td><?php  echo $row['MedicineCompany'];?></td>
                  <td><?php  echo $row['MedicineName'];?></td>
                  <td><?php  echo $row['MedicineBatchno'];?></td>
                  <td><?php  echo $row['Quantity'];?></td>
                <td><?php  echo $row['totalsellqty'];?></td>
                  
                  
                  
                </tr>
                <?php 
$cnt=$cnt+1;
} } else { ?>
  <tr>
    <td colspan="8"> No record found .</td>

  </tr>
   
<?php } ?>
                </tbody>
                
              </table>
            </div>
            <div class="card-footer py-4">
           
            </div>
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