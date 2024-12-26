<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if(isset($_POST['login']))
  {
    $emailcon=$_POST['emailcont'];
    $password=md5($_POST['password']);
    $query=mysqli_query($con,"select ID from tbluser where  (Email='$emailcon' || MobileNo='$emailcon') && Password='$password' ");
    $ret=mysqli_fetch_array($query);
    if($ret>0){
      $_SESSION['sid']=$ret['ID'];
     header('location:welcome.php');
    }
    else{
    $msg="Invalid Details.";
    }
  }
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>VSCMS | Login</title>
    <!-- App css -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/icons.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/metismenu.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/style.css" rel="stylesheet" type="text/css" />
    <script src="../assets/js/modernizr.min.js"></script>
    <script type="text/javascript">
        
        function validateForm() {
            let emailcont = document.login.emailcont.value;
            let password = document.login.password.value;

            if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(emailcont) && !/^\d{10}$/.test(emailcont)) {
                alert('Please enter a valid Email address or Contact Number');
                document.login.emailcont.focus();
                return false;
            }

            if (!/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/.test(password)) {
                alert('Password should be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, one number, and one special character');
                document.login.password.focus();
                return false;
            }

            return true;
        }
    </script>
</head>

<body class="account-pages">

    <!-- Begin page -->
    <div class="accountbg" style="background: url('../assets/images/bg-2.jpg');background-size: cover;background-position: center; border:solid 1px;"></div>

    <div class="wrapper-page account-page-full">

        <div class="card">
            <div class="card-block">

                <div class="account-box">

                    <div class="card-box p-5">
                        <h3 class="text-uppercase text-center pb-4">
                            <a href="../index.php" ><span>USER LOGIN FORM</span></a>
                        </h3>
                        <hr color="#000" />
                        <p style="font-size:16px; color:red" align="center"> <?php if($msg){
                            echo $msg;
                        }  ?> </p>

                        <form class="" action="#" name="login" method="post" onsubmit="return validateForm();">

                            <div class="form-group m-b-20 row">
                                <div class="col-12">
                                    <label for="emailaddress">Email address or Contact Number</label>
                                    <input class="form-control" type="text" id="emailcont" name="emailcont" required="" placeholder="Registered Email or Contact Number">
                                </div>
                            </div>

                            <div class="form-group row m-b-20">
                                <div class="col-12">
                                    <a href="forget-password.php" class="text-muted float-right"><small>Forgot your password?</small></a>
                                    <label for="password">Password</label>
                                    <input class="form-control" type="password" required="" id="password" name="password" placeholder="Enter your password">
                                </div>
                            </div>

                            <div class="form-group row m-b-20">
                                <div class="col-12"></div>
                            </div>

                            <div class="form-group row text-center m-t-10">
                                <div class="col-12">
                                    <button class="btn btn-block btn-custom waves-effect waves-light" type="submit" name="login">Sign In</button>
                                </div>
                            </div>

                        </form>

                        <div class="row m-t-50">
                            <div class="col-sm-12 text-center">
                                <p class="text-muted">Don't have an account? <a href="register.php" class="text-dark m-l-5"><b>Sign Up</b></a></p><br>
                                <p class="text-muted">Back to home <a href="../index.php" class="text-dark m-l-5"><b>Home</b></a></p>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>

        <div class="m-t-40 text-center">
            <p class="account-copyright"><?php echo date('Y');?> © Vehicle Service Center Managment System</p>
        </div>

    </div>

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
