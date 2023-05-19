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
   $user_email = $_SESSION['user_email'];
    $user_otp= $_SESSION['user_otp'];
    
    if($user_otp ==null ){
        echo "<script>location.replace('index.php');
        </script>";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            padding: 30px;
        }
        
        .copyright {
            font-size: 15px;
            text-align: center;
        }
        
         @media (max-width: 800px) {
         .col-8 { 
          width:100%;
        
        }
        form {
            width: 90%;
            margin: 20px;
            padding: 10px;
        }
    

        }

    </style>
    <script>
        var check = function() {
            if(document.getElementById('user_password').value.length < 5) {
                document.getElementById('message').style.color = 'red';
                document.getElementById('message').innerHTML = 'Password must at least 6 characters!';
            } else if (document.getElementById('user_password').value !=
                document.getElementById('confirm_password').value) {
                document.getElementById('message').style.color = 'red';
                document.getElementById('message').innerHTML = 'Both password is not matching!';
            } else {
                document.getElementById('message').style.color = 'green';
                document.getElementById('message').innerHTML = 'Password OK!';
            }
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
    </script>
</head>
<body>
<div class="d-flex justify-content-center">
        <form action="" id="form" method="post" class="rounded-3" enctype="multipart/form-data">
            <div class="container1">
                 <img class="float-right" src="images/logo.jpg" style = "width: 150; height: 150;">
                <div class="text">
                    <h1><strong>New Password</strong></h1>
                </div>
            </div>
            <hr><br>
            <div class="form-group row">
                <label class="col-sm-4 col-form-label" for="password">Password:</label>
                <div class="col-8">
                    <input type="password" class="form-control" name="user_password" id="user_password" onkeyup='check();' placeholder="Your password" required>
                    <br><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" onclick="password()">
                    <label class="form-check-label" for="flexCheckDefault">Show Password</label>
                </div>
            </div>
            <br>
            <div class="form-group row">
                <label class="col-sm-4 col-form-label" for="password">Confirm Password:</label>
                <div class="col-8">
                    <input type="password" class="form-control" id="confirm_password" onkeyup='check();' placeholder="Confirm password" required>
                    <br><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" onclick="password1()">
                    <label class="form-check-label" for="flexCheckDefault">Show Confirm Password</label>
                    <br><br><span id='message'></span>
                </div>
            </div>
            <br>
            <div class="d-grid">
                <button class="btn btn-secondary btn-lg" name="resetpassword" type="submit">Submit</button>
            </div>
            <br>

            <?php
            if (isset($_POST["resetpassword"])) {
                $user_password = sha1($_POST['user_password']);
    
                $sqlupdate = "UPDATE tbl_users set user_password ='$user_password' where user_email = '$user_email' ";
            
                    if ($conn->query($sqlupdate) === TRUE) {
                        echo "<script>alert('Password reset successfully!');
                         location.replace('login.php');</script>";
                    }else {
                        echo "<script>alert('Reset Fail!');</script>";
                    }
            }
            
            ?>
            
            <br>
            <div class="text-center">
                <p class="mb-5 pb-lg-2" style="color: #393f81;"><a href="index.php" style="color: #393f81;" onclick="return confirm('Are you sure to cancel reset password?')"><b>Cancel</b></a></p>
            </div>
                <div class="copyright">
                    <p>Copyright &copy reserved by <strong>BICOLOR COLOR BLIND TEST</strong></p>
                </div>
        </form>
    </div>
</body>
</html>