<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

$msg = ""; // Initialize the error message variable

if (strlen($_SESSION['adid'] == 0)) {
    header('location:logout.php');
} else {
    /*function generateOTP() {
        return rand(100000, 999999);
    }

    function sendEmailOTP($email, $otp) {
        $subject = "Your OTP Code";
        $message = "Your OTP code is $otp.";
        $headers = "From: no-reply@yourdomain.com";
        
        mail($email, $subject, $message, $headers);
    }

    function sendSMSOTP($phone, $otp) {
        $apiKey = 'YOUR_API_KEY';
        $apiURL = 'https://sms-gateway-api-url.com/send';

        $message = "Your OTP code is $otp.";
        $data = [
            'apiKey' => $apiKey,
            'to' => $phone,
            'message' => $message
        ];

        $options = [
            'http' => [
                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                'method'  => 'POST',
                'content' => http_build_query($data),
            ],
        ];
        $context  = stream_context_create($options);
        $result = file_get_contents($apiURL, false, $context);
        return $result;
    }*/

    if (isset($_POST['submit'])) {
        $macname = $_POST['macname'];
        $mobno = $_POST['mobilenumber'];
        $email = $_POST['email'];
        $address = $_POST['macadd'];

        // Validate inputs
        if (empty($macname) || empty($mobno) || empty($email) || empty($address)) {
            $msg = "All fields are required.";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $msg = "Invalid email format.";
        } elseif (!preg_match("/^[0-9]{10}$/", $mobno)) {
            $msg = "Invalid mobile number format.";
        } else {
             // Generate OTP
             /*$otp = generateOTP();
             $_SESSION['otp'] = $otp;
             $_SESSION['email'] = $email;
             $_SESSION['mobilenumber'] = $mobno;
 
             // Send OTP to email and phone
             sendEmailOTP($email, $otp);
             sendSMSOTP($mobno, $otp);
 
             // Redirect to OTP verification page
             header('location: verify-otp.php');
             exit();*/
            // Insert data into database
            $query = mysqli_query($con, "INSERT INTO tblmechanics (FullName, MobileNumber, Email, Address) VALUES ('$macname', '$mobno', '$email', '$address')");

            if ($query) {
                echo "<script>alert('Mechanic Details have been added.');</script>";
                echo "<script>window.location.href ='manage-mechanics.php'</script>";
                exit();
            } else {
                $msg = "Something went wrong. Please try again.";
            }
        }
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Vehicle Service Center Management System</title>

    <!-- App css -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/icons.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/metismenu.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/style.css" rel="stylesheet" type="text/css" />

    <script src="../assets/js/modernizr.min.js"></script>

    <!-- Custom JavaScript for input validation -->
    <script>
        if (!/^[a-zA-Z]{2,}( [a-zA-Z]+)*$/.test(fullname)) {
            alert('Full Name should only contain letters and spaces, and be at least two characters long');
            document.signup.fullname.focus();
            return false;
            }
            if (/[0-9!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]+/.test(fullname)) {
                alert('Full Name should only contain letters and spaces');
                document.signup.fullname.focus();
                return false;
            }

        function validateMobileNumber(input) {
            input.value = input.value.replace(/\D/g, '');
            if (input.value.length > 10) {
                input.value = input.value.slice(0, 10);
            }
        }
        
        function validateMechanicName(input) {
            input.value = input.value.replace(/[^a-zA-Z\s]/g, '');
            

        }
    </script>

</head>

<body>

    <!-- Begin page -->
    <div id="wrapper">

        <?php include_once('includes/sidebar.php');?>

        <div class="content-page">

            <?php include_once('includes/header.php');?>

            <!-- Start Page content -->
            <div class="content">
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-12">
                            <div class="card-box">
                                <h4 class="m-t-0 header-title">Add VSCMS Mechanics</h4>
                                <p class="text-muted m-b-30 font-14">
                                </p>

                                <div class="row">
                                    <div class="col-12">
                                        <div class="p-20">
                                            <p style="font-size:16px; color:red" align="center">
                                                <?php if($msg){ echo $msg;} ?>
                                            </p>

                                            <form class="form-horizontal" role="form" method="post" name="submit">

                                                <div class="form-group row">
                                                    <label class="col-2 col-form-label" for="macname">Mechanic Name</label>
                                                    <div class="col-10">
                                                        <input type="text" id="macname" name="macname" class="form-control" required minlength="2" oninput="validateMechanicName(this)">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-2 col-form-label" for="mobilenumber">Mechanic Contact Number</label>
                                                    <div class="col-10">
                                                        <input type="tel" id="mobilenumber" name="mobilenumber" class="form-control" required pattern="[0-9]{10}" title="Please enter a valid 10-digit mobile number" oninput="validateMobileNumber(this)">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-2 col-form-label" for="email">Mechanic Email</label>
                                                    <div class="col-10">
                                                        <input type="email" id="email" name="email" class="form-control" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Please enter a valid email address">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-2 col-form-label" for="macadd">Mechanic Address</label>
                                                    <div class="col-10">
                                                        <input type="text" id="macadd" name="macadd" class="form-control" required>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-12">
                                                        <p style="text-align: center;">
                                                            <button type="submit" name="submit" class="btn btn-info btn-min-width mr-1 mb-1">Add</button>
                                                        </p>
                                                    </div>
                                                </div>

                                            </form>
                                        </div>
                                    </div>

                                </div>
                                <!-- end row -->

                            </div> <!-- end card-box -->
                        </div><!-- end col -->
                    </div>

                </div> <!-- container -->
            </div> <!-- content -->
            <?php include_once('includes/footer.php');?>
        </div>

    </div>
    <!-- jQuery  -->
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/metisMenu.min.js"></script>
    <script src="assets/js/waves.js"></script>
    <script src="../assets/js/jquery.slimscroll.js"></script>

    <!-- App js -->
    <script src="../assets/js/jquery.core.js"></script>
    <script src="../assets/js/jquery.app.js"></script>

</body>

</html>
<?php ?>

