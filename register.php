<?php
include_once("dbconnect.php");

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}

print "<link href='https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css' rel='stylesheet'
integrity='sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT' crossorigin='anonymous'>";
echo '
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
  ';
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="icon" href="images/favicon.jpg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Register Now</title>
    <style>
        body {
            background-color: #E5E4E2;
            font-family: "Inter", Arial, Helvetica, sans-serif;
        }

        form {
            width: 90%;
            margin: 20px;
            padding: 40px;
            background: #f4f7f8;
        }
        
        .container1 {
            display: flex;
            align-items: center;
        }
        
        .text {
            padding: 15px;
        }
        
        .copyright {
            font-size: 15px;
            text-align: center;
        }
        
        .divchange { 
          display: inline-block;
          cursor: pointer;
        
        }
        small {
           padding-left: 10px;
        }
        
        @media (max-width: 800px) {
         .col-9 { 
          width:100%;
        
        }
        form {
            width: 90%;
            margin: 20px;
            padding: 20px;
        }
        
        small {
           padding-left: 0px;
        }
        /*img { */
        /*    display: none; */
        /*  }*/
    

        }

    </style>
    <script>
        var check = function() {
          if (document.getElementById('user_password').value !=
                document.getElementById('confirm_password').value) {
                document.getElementById('message').style.color = 'red';
                document.getElementById('message').innerHTML = 'Both password is not matching!';
            } else {
                document.getElementById('message').style.color = 'green';
                document.getElementById('message').innerHTML = 'Password OK!';
            }
        }
        
        function preview() {
                frame.src = URL.createObjectURL(event.target.files[0]);
        }
        
        function password() {
            var x = document.getElementById("user_password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
        
        function password1() {
            var x = document.getElementById("confirm_password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
        function sendotp() {
            if(document.getElementById("user_email").value == '') {
                document.getElementById("messageotp").style.color = 'red';
                document.getElementById("messageotp").innerHTML = 'Please enter an valid email!';
            } else {
            //  window.location = "verifyregister.php?user_email="+ document.getElementById("user_email").value;
            sendemail(document.getElementById("user_email").value);
            document.getElementById("messageotp").innerHTML = '';
            }
        }
        
        function sendemail(user_email) {
    	 $.ajax({
          url: "verifyregister.php",
          type: "GET",
          data: { user_email: user_email,
    			submit: 'send', },
          success: function(response) {
              var sentences = response.split("> ");
            var lastSentence = sentences[sentences.length - 1];
            alert(lastSentence); // Display the response in an alert
          },
          error: function(xhr, status, error) {
            console.log(error);
          }
        });
    }
 
    
     
        
        
    </script>
</head>
<body>
<div class="d-flex justify-content-center">
        <form action="" id="form" method="post" class="rounded-3" enctype="multipart/form-data">
            <div class="container1">
                      <img class="float-right" src="images/logo.jpg" style = "width: 150; height: 150;">
                <div class="text">
                    <h1><strong>Registration Form</strong></h1>
                </div>
            </div>
            <hr><br>
            <div class="form-group row">
                <label class="col-sm-3 col-form-label" for="name">Full Name:</label>
                <div class="col-9">
                    <input type="name" class="form-control" name="user_name" placeholder="Your name" required>
                </div>
            </div>
            <br>
            <div class="form-group row">
                <label class="col-sm-3 col-form-label" for="phone">Contact Number:</label>
                <div class="col-9">
                    <input type="tel" class="form-control" name="user_phone" placeholder="Your phone number" required>
                </div>
            </div>
            <br>
            <div class="form-group row">
                <label class="col-sm-3 col-form-label" for="email">Email Address:</label>
                <div class="col-9">
                    <input type="email" class="form-control" style="margin-bottom: 10px;"id="user_email" name="user_email" placeholder="Your email address" required>
                     <small class="form-text text-muted" >Please note that you are not able to change email address after success registration.</small>
                </div>
            </div>
            <br>
            <div class="form-group row">
                <label class="col-sm-3 col-form-label" for="password">Password:</label>
                <div class="col-9">
                    <input type="password" class="form-control" name="user_password" id="user_password" onkeyup='check();' placeholder="Your password" required>
                    <br><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" onclick="password()">
                    <label class="form-check-label" for="flexCheckDefault">Show Password</label>
                </div>
            </div>
            <br>
            <div class="form-group row">
                <label class="col-sm-3 col-form-label" for="password">Confirm Password:</label>
                <div class="col-9">
                    <input type="password" class="form-control" id="confirm_password" name="confirm_password" onkeyup='check();' placeholder="Confirm password" required>
                    <br><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" onclick="password1()">
                    <label class="form-check-label" for="flexCheckDefault">Show Confirm Password</label>
                    <br><br><span id='message'></span>
                </div>
            </div>
            <br>
            <div class="form-group row">
                <label class="col-sm-3 col-form-label" for="phone">OTP:</label>
                <div class="col-9"  style="position: relative;">
                    <input type="text" class="form-control" id="otp" name="otp" placeholder="OTP" required>
                       <span><div class="divchange" style="position: absolute;top: 10px;right: 20px; color:gray; font-size:13px;" name="otp" onclick="sendotp();">Get OTP</div></span>
                        <br><span id='messageotp'></span>  
                </div>
            </div>
            <br>
            <div class="d-grid">
                <button class="btn btn-secondary btn-lg" name="register" type="submit">Register Now</button>
            </div>
            <br>

            <?php
            if (isset($_POST["register"])) {
                $otp = $_SESSION['otpregister'];
                $otpinput = $_POST['otp'];
                $user_name = $_POST['user_name'];
                $user_email = $_POST['user_email'];
                $user_password = sha1($_POST['user_password']);
                $confirm_password = sha1($_POST['confirm_password']);
                $user_phone = $_POST['user_phone'];
            
                
                $select = mysqli_query ($conn, "SELECT user_email FROM tbl_users WHERE user_email = '$user_email'");
                if (mysqli_num_rows($select) > 0) {
                    echo "<script>alert('Registration Fail! Email already exist!');</script>";
                }else if( $otp!=$otpinput){
                     echo "<script>alert('Registration Fail! OTP not matched!');</script>";
                } 
                else if($user_password!= $confirm_password ){
                     echo "<script>alert('Registration Fail! Passwords not matched!');</script>";
                } 
                else {
                    $sqlinsert = "INSERT INTO tbl_users (user_name,user_email,user_password,user_phone) VALUES ('" . $user_name . "', '" . $user_email . "', '" . $user_password . "' , '" . $user_phone . "')";
                    if ($conn->query($sqlinsert) === TRUE) {
                        echo "<script>alert('Registration Successful!');
                        location.replace('login.php');</script>";
                    } else {
                        echo "<script>alert('Registration Fail!');</script>";
                    }
                }
            }
            ?>
            
            
            <br>
            <div class="text-center">
                <p class="mb-5 pb-lg-2" style="color: #393f81;">Already have an account? <a href="login.php" style="color: #393f81;"><b>Login now</b></a></p>
            </div>
                <div class="copyright">
                    <p>Copyright &copy reserved by <strong>BICOLOR COLOR BLIND TEST</strong></p>
                </div>
        </form>
    </div>
</body>
</html>