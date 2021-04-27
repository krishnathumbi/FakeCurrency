<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['pmsaid']==0)) {
  header('location:logout.php');
  } else{

if(isset($_POST['submit']))
  {
  $compname=$_POST['compname'];
    $medname=$_POST['medname'];
    $batchnumber=$_POST['batchnumber'];
    $mgfdate=$_POST['mgfdate'];
    $expirydate=$_POST['expirydate'];
    $quantity=$_POST['quantity'];
    $price=$_POST['price'];
    
     $eid=$_GET['editid'];
     
    $query=mysqli_query($con,"update tblmedicine set MedicineCompany='$compname',MedicineName='$medname',MedicineBatchno='$batchnumber',MgfDate='$mgfdate',ExpiryDate='$expirydate',Quantity='$quantity',Priceperunit='$price' where ID='$eid'");
    if ($query) {
    $msg="medicine detail has been updated.";
  }
  else
    {
      $msg="Something Went Wrong. Please try again";
    }

  
}
  ?>

<!DOCTYPE html>
<html lang="en">

<head>
 
  <title>
     Pharmacy Management System - Manage Medicine
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
    <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="min-height: 30px; background-image: url(assets/img/theme/profile-cover.jpg); background-size: cover; background-position: center top;">
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
       
        <div class="col-xl-12 order-xl-1">
          <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0"> Update Medicine</h3>
                </div>
                
              </div>
            </div>
            <div class="card-body">
              <form method="post">
                <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
  <?php
 $cid=$_GET['editid'];
$ret=mysqli_query($con,"select * from  tblmedicine where ID='$cid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>              

  
                <h6 class="heading-small text-muted mb-4">Manage Medicine</h6>
                <div class="pl-lg-12">
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Medicine Company</label>

  <select class="form-control m-bot15" name="compname" id="compname" style="border:1px #000 solid;">
 <option value="<?php echo $row['MedicineCompany'];?>"><?php echo $row['MedicineCompany'];?></option>
                                <?php $query1=mysqli_query($con,"select * from tblcompany");
              while($row1=mysqli_fetch_array($query1))
              {
              ?>    
              <option value="<?php echo $row1['CompanyName'];?>"><?php echo $row1['CompanyName'];?></option>
                  <?php } ?> 
                            </select>


                      </div>
                    </div>
                    
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Medicine Name</label>
                        <input type="text" id="medname" name="medname"  class="form-control form-control-alternative" value="<?php  echo $row['MedicineName'];?>" required="true" style="border:1px #000 solid;">
                      </div>
                    </div>
                     <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Medicine Batch Number</label>
                        <input type="text" id="batchnumber" name="batchnumber" class="form-control form-control-alternative" value="<?php  echo $row['MedicineBatchno'];?>" required="true"style="border:1px #000 solid;">
                      </div>
                    </div>

                 
                          
                       
                     <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">MgfDate</label>
                        <input type="date" id="mgfdate" name="mgfdate" class="form-control form-control-alternative" value="<?php  echo $row['MgfDate'];?>" required="true" style="border:1px #000 solid;">
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Expiry Date</label>
                        <input type="date" id="expirydate" name="expirydate" class="form-control form-control-alternative" value="<?php  echo $row['ExpiryDate'];?>" required="true" style="border:1px #000 solid;">
                      </div>
                    </div>
                  <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Quantity</label>
                        <input type="text" id="quantity" name="quantity" class="form-control form-control-alternative" value="<?php  echo $row['Quantity'];?>" required="true" style="border:1px #000 solid;">
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Price per Unit</label>
                        <input type="text" id="price" name="price" class="form-control form-control-alternative" value="<?php  echo $row['Priceperunit'];?>" required="true" style="border:1px #000 solid;">
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
<?php } ?>