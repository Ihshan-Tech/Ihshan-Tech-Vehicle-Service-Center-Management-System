<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

$msg = ""; // Initialize the error message variable

if(isset($_POST['login'])) {
    $adminuser = mysqli_real_escape_string($con, $_POST['username']); // Escape special characters in the username
    $password = md5($_POST['password']); // Hash the password

    // Validate username and password
    if(empty($adminuser) || empty($password)) {
        $msg = "Please enter both username and password.";
    } else {
        // Perform SQL injection prevention by using prepared statements
        $query = mysqli_prepare($con, "SELECT ID FROM tbladmin WHERE AdminuserName=? AND Password=?");
        mysqli_stmt_bind_param($query, "ss", $adminuser, $password);
        mysqli_stmt_execute($query);
        mysqli_stmt_store_result($query);

        if(mysqli_stmt_num_rows($query) > 0) {
            mysqli_stmt_bind_result($query, $ret['ID']);
            mysqli_stmt_fetch($query);
            $_SESSION['adid'] = $ret['ID'];
            header('location: dashboard.php');
            exit();
        } else {
            $msg = "Invalid username or password.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>VSCMS | Admin Login</title>
    <!-- App css -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/icons.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/metismenu.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/style.css" rel="stylesheet" type="text/css" />
    <script src="../assets/js/modernizr.min.js"></script>

</head>

<body class="account-pages">

    <!-- Begin page -->
    <div class="accountbg" style="background: url('../assets/images/bg-3.jpg');background-size: cover;background-position: center; border:solid 1px;"></div>


    <div class="wrapper-page account-page-full">

        <div class="card">
            <div class="card-block">

                <div class="account-box">

                    <div class="card-box p-5">
                        <h3 class="text-uppercase text-center">
                            <a href="../index.php">
                                <span>ADMIN LOGIN</span>
                            </a>
                        </h3>
                        <hr color="#000" />
                        <p style="font-size:16px; color:red" align="center"><?php echo $msg; ?></p>

                        <form action="#" name="login" method="post">

                            <div class="form-group m-b-20 row">
                                <div class="col-12">
                                    <label for="emailaddress">User Name</label>
                                    <input class="form-control" type="text" id="username" name="username" required="" min="2" placeholder="User Name">
                                </div>
                            </div>

                            <div class="form-group row m-b-20">
                                <div class="col-12">
                                    <a href="forget-password.php" class="text-muted float-right"><small style="color:#000">Forgot your password?</small></a>
                                    <label for="password">Password</label>
                                    <input class="form-control" type="password" required="" id="password" name="password" placeholder="Enter your password">
                                </div>
                            </div>

                            <div class="form-group row m-b-20">
                                <div class="col-12">


                                </div>
                            </div>

                            <div class="form-group row text-center m-t-10">
                                <div class="col-12">
                                    <button class="btn btn-block btn-custom waves-effect waves-light" type="submit" name="login">Sign In</button> <br><br><br>
                                    <p class="text-muted">Back to home <a href="../index.php" class="text-dark m-l-5"><b>Home</b></a></p>
                                </div>
                            </div>

                        </form>



                    </div>
                </div>

            </div>
        </div>

        <div class="m-t-40 text-center">
            <p class="account-copyright"><?php echo date('Y'); ?> © Vehicle Service Center Managment System</p>
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
