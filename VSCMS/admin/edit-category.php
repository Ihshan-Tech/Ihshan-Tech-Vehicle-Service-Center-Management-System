<?php  
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['adid']==0)) {
  header('location:logout.php');
  } else{
if(isset($_POST['submit']))
  {
    $catname=$_POST['catename'];
    $eid=substr(base64_decode($_GET['editid']),0,-5);
     
    $query=mysqli_query($con, "update tblcategory set VehicleCat = '$catname' where ID=$eid"  );
    if ($query) {
    $msg="Category has been update.";
  }else{
      $msg="Something Went Wrong. Please try again";
    }}
  ?>


<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>Vehicle Service Center Managment System</title>
        <link href="../assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="../assets/css/metismenu.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/css/style.css" rel="stylesheet" type="text/css" />
        <script src="../assets/js/modernizr.min.js"></script>

    </head>


    <body>

        <!-- Begin page -->
        <div id="wrapper">

          <?php include_once('includes/sidebar.php');?>

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->

            <div class="content-page">

                 <?php include_once('includes/header.php');?>

                <!-- Start Page content -->
                <div class="content">
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-12">
                                <div class="card-box">
                                    <h4 class="m-t-0 header-title">Update Vehicle Category</h4>
                                    <p class="text-muted m-b-30 font-14">
                                       
                                    </p>

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="p-20">

<p style="font-size:16px; color:red" align="center"> <?php if($msg){ echo $msg; }  ?> </p>
<?php
 $cid=substr(base64_decode($_GET['editid']),0,-5);
$ret=mysqli_query($con,"select * from tblcategory where ID='$cid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {
?>


<form class="form-horizontal" role="form" method="post" name="submit">
                                                   
 <div class="form-group row">
<label class="col-2 col-form-label" for="example-email">Category Name</label>
<div class="col-10">
<input type="text" id="catename" name="catename" class="form-control" placeholder="Vehicle Category" required="true"  value="<?php echo $row['VehicleCat'];?>">
</div>
</div>
                                                   
<?php } ?>
                                                    
                                                    
<div class="form-group row">
<div class="col-12">
<p style="text-align: center;">  <button type="submit" name="submit" class="btn btn-info btn-min-width mr-1 mb-1">Update</button></p>
</div>
</div>
</form>
</div>
</div>

                                    </div>

                                </div> <!-- end card-box -->
                            </div><!-- end col -->
                        </div>

                    </div> <!-- container -->

                </div> <!-- content -->

             <?php include_once('includes/footer.php');?>
            </div>
        </div>
        <!-- END wrapper -->



        <!-- jQuery  -->
        <script src="../assets/js/jquery.min.js"></script>
        <script src="../assets/js/bootstrap.bundle.min.js"></script>
        <script src="../assets/js/metisMenu.min.js"></script>
        <script src="../assets/js/waves.js"></script>
        <script src="../assets/js/jquery.slimscroll.js"></script>

        <!-- App js -->
        <script src="../assets/js/jquery.core.js"></script>
        <script src="../assets/js/jquery.app.js"></script>

    </body>
</html>
<?php }  ?>