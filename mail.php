<?php
include_once("dbconnect.php");

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}

 session_start();
 $user_email = $_SESSION['user_email'];
?>

<?php

require "PHPMailer/PHPMailerAutoload.php";
function smtpmailer($to, $from, $from_name, $subject, $body)
    {
        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->SMTPAuth = true; 
 
        $mail->SMTPSecure = 'ssl'; 
        $mail->Host = 'mail.moneymoney12345.com';
        $mail->Port = 465;  
        $mail->Username = 'bicolor@moneymoney12345.com';
        $mail->Password = 'lj2&r[O]Tw*J';   

   
        $mail->IsHTML(true);
        $mail->From="bicolor@moneymoney12345.com";
        $mail->FromName=$from_name;
        $mail->Sender=$from;
        $mail->AddReplyTo($from, $from_name);
        $mail->Subject = $subject;
        $mail->Body = $body;
        $mail->AddAddress($to);
        if(!$mail->Send())
        {
             $error='Fail';
             return $error;
        }
        else 
        {
             $error='Success';
             return $error;
        }
    }
    $otp = rand(10000,99999);
    $to   =  $user_email;
    $from = 'bicolor@moneymoney12345.com';
    $name = 'Bicolor';
    $subj = 'Bicolor Account Password Reset OTP';
    $msg = "One-Time OTP: <b> $otp </b> <br><br>Please do not share this OTP with anyone.<br> <br>Thank you.";
    
   
    
                $select = mysqli_query ($conn, "SELECT user_email FROM tbl_users WHERE user_email = '$user_email' ");
                if (mysqli_num_rows($select) == 0) {
                    echo "<script>alert('Email not exist. Please register first.');
                      location.replace('register.php');
                    </script>";
                } else {
                    $error=smtpmailer($to,$from, $name ,$subj, $msg);
                    if ($error=='Success') {
                        $_SESSION['otp'] = $otp;
                        echo "<script>alert('OTP sent successfully. Please check your email.');
                        location.replace('verifyotp.php');
                        </script>";
                    }else{
                        echo "<script>alert('Please try Later, Error Occured while Processing...');
                        location.replace('resetpassword.php');</script>"; 
                    }
                }
  
?>


