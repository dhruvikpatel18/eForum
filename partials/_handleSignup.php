<?php
$showError = "false";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
function sendmail($email,$v_code){
    require("PHPMailer/PHPMailer.php");
    require("PHPMailer/SMTP.php");
    require("PHPMailer/Exception.php");

    $mail = new PHPMailer(true);

    try {
        //Server settings
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;        
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'dhruvikmalaviya18@gmail.com';                     //SMTP username
        $mail->Password   = 'okaoqrsxritbubdd';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        //Recipients
        $mail->setFrom('dhruvikmalaviya18@gmail.com', 'eDiscuss');
        $mail->addAddress($email);     //Add a recipient
         
    
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Email verification from eDiscuss';
        $mail->Body    = "Thanks for registration!
        Click the link below to verify the email address
        <a href='http://localhost/eForum/verify.php?email=$email&v_code=$v_code'>click here</a>";
        
        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }

}
if($_SERVER["REQUEST_METHOD"] == "POST") {
    include '_dbconnect.php';
    $user_email = $_POST['signupEmail'];
    $pass = $_POST['signupPassword'];
    $cpass = $_POST['signupcPassword'];

    //check whether this email is already used or not
    $existSql = "SELECT * from `users` WHERE user_email = '$user_email'";
    $result = mysqli_query($conn, $existSql);
    $numRows = mysqli_num_rows($result);
    if ($numRows > 0) {
        $showError = "Email is already used, Please enter correct email!";
    } else {
        if ($pass == $cpass) {
            $hash = password_hash($pass, PASSWORD_DEFAULT);
            $v_code = bin2hex(random_bytes(16));
            $sql = "INSERT INTO `users` (`user_email`, `user_password`, `timestamp`, `verification_code`, `is_verified`) VALUES ('$user_email', '$hash', current_timestamp(),'$v_code','0')";
            $result = mysqli_query($conn, $sql);
            if ($result && sendmail($_POST['signupEmail'],$v_code)) {
                
                // echo"<script>
                //     alert('Registration Successful');   
                // </script>";
                $showAlert = true;
                //redirect to home page
                header("Location: /eForum/index.php?signupsuccess=true");
                exit();
            }
        } else {
            
            echo"<script>
            alert('Server down');
            window.location.href='index.php';
        </script>";
        $showError = "Your passwords do no matched!!";
    header("Location: /eForum/index.php?signupsuccess=false&error=$showError");
        }
    }
}
?>