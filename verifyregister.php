 <?php
include_once("dbconnect.php");

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}
session_start();

?>
 <?php
                if ($_GET['submit'] == "send") {
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
                    
       
                    $user_email = $_GET['user_email'];
                    $otp = rand(10000,99999);
                    $to   =  $user_email;
                    $from = 'bicolor@moneymoney12345.com';
                    $name = 'Bicolor';
                    $subj = 'Bicolor Account Registration OTP';
                    $msg = "One-Time OTP: <b> $otp </b> <br><br>Please do not share this OTP with anyone.<br> <br>Thank you.";
                    
      
                                    $error=smtpmailer($to,$from, $name ,$subj, $msg);
                                    if ($error=='Success') {
                                        $_SESSION['otpregister'] = $otp;
                                        $return_arr="OTP sent successfully. Please check your email.";
                                        echo $return_arr;
                                    }else{
                                        $return_arr= "Please try Later, Error Occured while Processing...";
                                        echo $return_arr;
                                         
                                    }
                    }
                 
                                
                  
                ?>