<?php 
session_start();
error_reporting(0);
include('includes/dbconnection.php');

// Include Twilio PHP SDK and PHPMailer
/*require 'vendor/autoload.php';
use Twilio\Rest\Client;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Twilio credentials
$account_sid = 'your_account_sid';
$auth_token = 'your_auth_token';
$twilio_number = 'your_twilio_number';

// Function to send OTP via SMS
function sendSMS($number, $message) {
    global $account_sid, $auth_token, $twilio_number;
    $client = new Client($account_sid, $auth_token);
    $client->messages->create(
        $number,
        array(
            'from' => $twilio_number,
            'body' => $message
        )
    );
}

// Function to send OTP via Email
function sendEmail($email, $otp) {
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host       = 'smtp.example.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'your_email@example.com';
        $mail->Password   = 'your_email_password';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        $mail->setFrom('your_email@example.com', 'Vehicle Service Center');
        $mail->addAddress($email);

        $mail->isHTML(true);
        $mail->Subject = 'Your OTP Code';
        $mail->Body    = 'Your OTP code is: ' . $otp;

        $mail->send();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}*/
if(isset($_POST['submit'])) {
    $fname = $_POST['fullname'];
    $mobno = $_POST['mobilenumber'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $ret = mysqli_query($con, "select Email from tbluser where Email='$email' || MobileNo='$mobno'");
    $result = mysqli_fetch_array($ret);
    if($result > 0){
        $msg = "This email or Contact Number already associated with another account";
    } else {
        $query = mysqli_query($con, "insert into tbluser(FullName, MobileNo, Email, Password) value('$fname', '$mobno', '$email', '$password')");
        if ($query) {
            $msg = "You have successfully registered!!!";
        } else {
            $msg = "Something Went Wrong. Please try again!!!";
        }
        /*else {
            $otp = rand(100000, 999999);
            $_SESSION['otp'] = $otp;
            $_SESSION['fullname'] = $fname;
            $_SESSION['mobilenumber'] = $mobno;
            $_SESSION['email'] = $email;
            $_SESSION['password'] = $password;
    
            sendSMS($mobno, "Your OTP code is: $otp");
            sendEmail($email, $otp);
            header('location: verify_otp.php');
        }*/
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

    <script type="text/javascript">
        function checkpass() {
            if (document.signup.password.value != document.signup.repeatpassword.value) {
                alert('Password and Repeat Password field do not match');
                document.signup.repeatpassword.focus();
                return false;
            }
            return true;
        }

        function validateForm() {
            let fullname = document.signup.fullname.value;
            let mobilenumber = document.signup.mobilenumber.value;
            let email = document.signup.email.value;
            let password = document.signup.password.value;
            let repeatpassword = document.signup.repeatpassword.value;

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
            if (!/^\d{10}$/.test(mobilenumber)) {
                alert('Mobile Number should be exactly 10 digits');
                document.signup.mobilenumber.focus();
                return false;
            }

            if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
                alert('Please enter a valid Email address');
                document.signup.email.focus();
                return false;
            }

            if (!/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/.test(password)) {
                alert('Password should be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, one number, and one special character');
                document.signup.password.focus();
                return false;
            }

            return checkpass();
        }

        function onlyNumberKey(evt) {
            // Only ASCII character in that range allowed
            var ASCIICode = (evt.which) ? evt.which : evt.keyCode
            if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
                return false;
            return true;
        }
    </script>
</head>

<body class="account-pages">

    <!-- Begin page -->
    <div class="accountbg" style="background: url('../assets/images/bg-2.jpg');background-position: center; height: 750px;"></div>

    <div class="wrapper-page account-page-full">

        <div class="card">
            <div class="card-block">

                <div class="account-box">

                    <div class="card-box p-5">
                        <h3 class="text-uppercase text-center pb-4">
                            <a href="../index.php">
                                <span>USER REGISTRATION FORM</span>
                            </a>
                        </h3>
                        <hr color="#000" />
                        <p style="font-size:16px; color:red" align="center"> <?php if($msg) { echo $msg; } ?> </p>

                        <form class="form-horizontal" action="" name="signup" method="post" onsubmit="return validateForm();">

                            <div class="form-group row m-b-20">
                                <div class="col-12">
                                    <label for="fullname">Full Name</label>
                                    <input class="form-control" type="text" id="fullname" name="fullname" required="" placeholder="Enter Your Full Name" pattern="[a-zA-Z ]{2,}">
                                </div>
                            </div>

                            <div class="form-group row m-b-20">
                                <div class="col-12">
                                    <label for="mobilenumber">Mobile Number</label>
                                    <input class="form-control" type="tel" id="mobilenumber" name="mobilenumber" required="" placeholder="Enter Your Mobile Number" maxlength="10" pattern="\d{10}" inputmode="numeric" onkeypress="return onlyNumberKey(event)">
                                </div>
                            </div>

                            <div class="form-group row m-b-20">
                                <div class="col-12">
                                    <label for="email">Email address</label>
                                    <input class="form-control" type="email" id="email" name="email" required="" placeholder="abc@gmail.com">
                                </div>
                            </div>

                            <div class="form-group row m-b-20">
                                <div class="col-12">
                                    <label for="password">Password</label>
                                    <input class="form-control" type="password" required="" id="password" name="password" placeholder="Enter your password" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$" title="Password should be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, one number, and one special character">
                                </div>
                            </div>
                            <div class="form-group row m-b-20">
                                <div class="col-12">
                                    <label for="repeatpassword">Repeat Password</label>
                                    <input class="form-control" type="password" required="" id="repeatpassword" name="repeatpassword" placeholder="Repeat your password" minlength="8">
                                </div>
                            </div>

                            <div class="form-group row m-b-20">
                                <div class="col-12">
                                    <div class="checkbox checkbox-custom">
                                        <input id="remember" type="checkbox" required>
                                        <label for="remember">
                                            I accept <a href="terms-conditions.php" class="text-custom">Terms and Conditions</a>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row text-center m-t-10">
                                <div class="col-12">
                                    <button class="btn btn-block btn-custom waves-effect waves-light" type="submit" name="submit">Sign Up Free</button>
                                </div>
                            </div>

                        </form>

                        <div class="row m-t-50">
                            <div class="col-sm-12 text-center">
                                <p class="text-muted">Already have an account? <a href="index.php" class="text-dark m-l-5"><b>Sign In</b></a></p><br>
                                <p class="text-muted">Back to home <a href="../index.php" class="text-dark m-l-5"><b>Home</b></a></p>
                            </div>
                        </div>

                        <div class="m-t-40 text-center">
                            <p class="account-copyright"><?php echo date('Y');?> © Vehicle Service Center Managment System</p>
                        </div>
                    </div>
                </div>

            </div>
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

