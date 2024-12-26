<?php  
session_start();
error_reporting(0);
include('includes/dbconnection.php');

/*require 'vendor/autoload.php'; // Include Composer autoload file

use Twilio\Rest\Client;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;*/

if (strlen($_SESSION['adid']==0)) {
  header('location:logout.php');
  } else{

    /*function sendOTPSMS($phoneNumber, $otp) {
        $sid = 'your_twilio_sid'; // Your Twilio SID
        $token = 'your_twilio_token'; // Your Twilio token
        $twilioNumber = 'your_twilio_phone_number'; // Your Twilio phone number
    
        $client = new Client($sid, $token);
        $message = "Your OTP is: " . $otp;
    
        $client->messages->create(
            $phoneNumber,
            array(
                'from' => $twilioNumber,
                'body' => $message
            )
        );
    }
    
    function sendOTPEmail($email, $otp) {
        $mail = new PHPMailer(true);
    
        try {
            // Server settings
            $mail->SMTPDebug = 0; // Disable verbose debug output
            $mail->isSMTP();
            $mail->Host = 'smtp.example.com'; // Set the SMTP server to send through
            $mail->SMTPAuth = true;
            $mail->Username = 'your_email@example.com'; // SMTP username
            $mail->Password = 'your_email_password'; // SMTP password
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;
    
            // Recipients
            $mail->setFrom('your_email@example.com', 'Vehicle Service Center');
            $mail->addAddress($email);
    
            // Content
            $mail->isHTML(true);
            $mail->Subject = 'Your OTP Code';
            $mail->Body    = "Your OTP is: " . $otp;
    
            $mail->send();
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }*/
    
    

?>
<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>Vehicle Service Center Managment System</title>
        <!-- App css -->
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
            <div class="content-page">

                 <?php include_once('includes/header.php');?>

                <!-- Start Page content -->
                <div class="content">
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-12">
                                <div class="card-box">
                                    <h4 class="m-t-0 header-title">Pending Services</h4>
                                    <p class="text-muted m-b-30 font-14">
                                       
                                    </p>

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="p-20">
                                               <table class="table mb-0">
 <thead>
                <tr>
                  <th>S.NO</th>
                  <th>Service number</th>
                  <th>Vehicle Category</th>
                  <th>Service Number</th>
                  <th>Full Name</th>
                 <th>Mobile Number</th>
                  <th>Email</th>
                   <th>Action</th>
                </tr>
              </thead>
               <?php
               $sernumber = mt_rand(100000000, 999999999);
$ret=mysqli_query($con,"select tblservicerequest.Category,tblservicerequest.ServiceNumber,tblservicerequest.ID as apid, tbluser.FullName,tbluser.MobileNo,tbluser.Email,tbluser.RegDate from  tblservicerequest inner join tbluser on tbluser.ID=tblservicerequest.UserId where tblservicerequest.AdminStatus is null");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {
    //$otp = mt_rand(100000, 999999); // Generate a random OTP
    //sendOTPSMS($row['MobileNo'], $otp);
    //sendOTPEmail($row['Email'], $otp);

?>
              
                <tr>
                  <td><?php echo $cnt;?></td>
                      <td><?php  echo $row['ServiceNumber'];?></td>
                  <td><?php  echo $row['Category'];?></td>
                  <td><?php  echo $row['ServiceNumber'];?></td>              
                  <td><?php  echo $row['FullName'];?></td>
                  <td><?php  echo $row['MobileNo'];?></td>
                  <td><?php  echo $row['Email'];?></td>
                  <td><a href="view-service-request.php?aticid=<?php echo $row['apid'];?>">View Details</a></td>
                </tr>
                <?php 
$cnt=$cnt+1;
}?>
   


</table>

                                                
                                            </div>
                                        </div>

                                    </div>
                                    <!-- end row -->

                                </div> <!-- end card-box -->
                            </div><!-- end col -->
                        </div>
                        <!-- end row -->
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