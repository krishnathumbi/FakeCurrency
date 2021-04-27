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
    Pharmacy Management System - Invoice Search
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
        <div class="col" id="exampl">
          <div class="card shadow">
            <div class="card-header border-0">
     <form method="post"  name="search" method="post" action="">
                <p style="font-size:16px; color:red" align="left"> <?php if($msg){
    echo $msg;
  }  ?> </p>
  <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Search Invoice</label>
                        <input type="text" id="searchdata" name="searchdata" class="form-control form-control-alternative" value="" required="true" style="border:1px #000 solid;" placeholder="Search by Billing Number or Mobile Number">
                      </div>
                    </div>
                    <div class="pl-lg-4">
                 <div class="text-center">
                  <button class="btn btn-primary my-4" type="submit" name="search">Search</button>
                </div>
                </div>
                
              </form>
              <?php
if(isset($_POST['search']))
{ 

$sdata=$_POST['searchdata'];
  ?>
             <h4 align="center">Result against "<?php echo $sdata;?>" keyword </h4> 

              
<?php     

$billingid=$_POST['invoiceid'];
$ret=mysqli_query($con,"select distinct tblcustomer.BillingNumber,tblcustomer.CustomerName,tblcustomer.MobileNumber,tblcustomer.ModeofPayment,tblcustomer.BillingDate from tblcart join tblcustomer on tblcustomer.BillingNumber=tblcart.BillingId where (tblcustomer.BillingNumber='$sdata' || tblcustomer.MobileNumber='$sdata') ");

while ($row=mysqli_fetch_array($ret)) {
?>
<h3 class="mb-4">Invoice #<?php  echo $row['BillingNumber'];?></h3>
  <div class="table-responsive">
    <table class="table align-items-center" style="font-size:22px !important;" border="1">
            <tr>
<th>Customer Name:</th>
<td> <?php  echo $row['CustomerName'];?>  </td>
<th>Customer Number:</th>
<td> <?php  echo $row['MobileNumber'];?>  </td>
</tr>

<tr>
<th>Mode of Payment:</th>
<td colspan="3"> <?php  echo $row['ModeofPayment'];?>  </td>

</tr>
</table>

</div>
<?php } ?>


            </div>
            <div class="table-responsive" style="margin-top:2%">
              <table class="table align-items-center" style="font-size:22px;" border="1">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">S.NO</th>
                    <th scope="col">Medicine Name</th>
                    <th scope="col">Quantity</th>
                     <th scope="col">Price(per unit)</th>
                     <th scope="col">Total</th>
                    
                  </tr>
                </thead>
                <tbody>
                  <?php
                  
$ret=mysqli_query($con,"select tblcart.ID,tblmedicine.MedicineName,tblcart.ProductQty,tblmedicine.Priceperunit from tblcart join tblmedicine on tblcart.ProductId=tblmedicine.ID join tblcustomer on tblcustomer.BillingNumber=tblcart.BillingId where tblcustomer.BillingNumber='$sdata' || tblcustomer.MobileNumber='$sdata'");
$num=mysqli_num_rows($ret);
if($num>0){
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
              
                <tr>
                  <td><?php echo $cnt;?></td>
            
                 
                  <td><?php  echo $row['MedicineName'];?></td>
                  <td><?php  echo ($pq=$row['ProductQty']);?></td>
                  <td><?php  echo($ppu= $row['Priceperunit']);?></td>
                  <td><?php  echo($total=$pq*$ppu);?></td>

                </tr>
                
     <?php          
$gtotal+=$total;
$cnt=$cnt+1;
} ?>
<tr>
                  <th colspan="4" style="text-align: center;">Grand Total</th>
                  <th colspan="2"><?php  echo $gtotal;?></th>
                </tr>
<?php } else { ?>
  
  <tr>
    <td colspan="8"> No record found against this search</td>

  </tr>
  
<?php } }?>



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