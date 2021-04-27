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
    Pharmacy Management System - Pharmacist Report
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
              <h4 class="m-t-0 header-title">Pharmacist Reports</h4>
              <?php
$fdate=$_POST['fromdate'];
$tdate=$_POST['todate'];
$pharname=$_POST['pharname'];
$sql=mysqli_query($con,"select FullName from tblpharmacist where ID='$pharname'");
$row=mysqli_fetch_array($sql);
$pname=$row['FullName'];
?>
<h4 align="center" style="color:blue">Report from <?php echo $fdate?> to <?php echo $tdate?>  Sold By <?php echo $pname?></h4>
              <table class="table align-items-center " border="2">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">S.NO</th>
                    <th scope="col"> Medicine (Batch no.)</th>
                     <th scope="col"> Qty Sold</th>
                     <th scope="col"> Per Unit Price</th>
                     <th scope="col"> Total</th>
                    
                   
                    
                  </tr>
                </thead>
                
                <tbody>
                  <?php
$pharname=$_POST['pharname'];
$ret=mysqli_query($con,"Select tblmedicine.MedicineName,tblmedicine.MedicineBatchno,sum(tblcart.ProductQty) as ProductQty,tblmedicine.Priceperunit
 from tblcart 
  join tblmedicine  on tblmedicine.ID=tblcart.ProductId
 where date(tblcart.CartDate) between '$fdate' and '$tdate' and tblcart.PharmacistId='$pharname' 
group by tblmedicine.MedicineName,tblmedicine.MedicineBatchno

  ");
$qty=$result['selledqty'];
$num=mysqli_num_rows($ret);
if($num>0){
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {
$qty=$row['selledqty'];
?>
              
                <tr>
                  <input type="hidden" name="mid" value="<?php echo $row['ID'];?>">
                  <td><?php echo $cnt;?></td>
            
<td><?php  echo $row['MedicineName'];?> (<?php  echo $row['MedicineBatchno'];?>)</td>
                  <td><?php  echo $qty=$row['ProductQty'];?></td>
                  <td><?php  echo $ppunit=$row['Priceperunit'];?></td>
                  <td><?php  echo ($total=$qty*$ppunit)?></td>
                  
                  
                  
                </tr>
                <?php 
$gtotal+=$total;                
$cnt=$cnt+1;
}?>
<tr>
<th colspan="4" style="text-align: center">Grand Total</th>  
<th><?php echo $gtotal;?></th>  
</tr>

<?php } else { ?>
  <tr>
    <td colspan="5"> No record found .</td>

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