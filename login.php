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
    <link rel="icon" href="images/favicon.jpg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Login Page</title>
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
        
        .divchange { 
          display: inline-block;
          cursor: pointer;
        
        }
        
        @media (max-width: 800px) {
         .col-10 { 
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
        function password() {
            var x = document.getElementById("user_password");
            var y = document.getElementById("icon");
            const togglePassword = document.querySelector('#icon');
            if (x.type === "password") {
                x.type = "text";
                y.innerHTML ="HIDE";
            } else {
                x.type = "password";
                y.innerHTML ="SHOW";
            }
        }
        
        function rememberMe() {
            var email = document.forms["form"]["user_email"].value;
            var pass = document.forms["form"]["user_password"].value;
            var rememberme = document.forms["form"]["idremember"].checked;
            console.log("Form data:" + rememberme + "," + email + "," + pass);
            if (!rememberme) {
                setCookies("cemail", "", 0);
                setCookies("cpass", "", 0);
                setCookies("crem", false, 0);
                document.forms["form"]["user_email"].value = "";
                document.forms["form"]["user_password"].value = "";
                document.forms["form"]["idremember"].checked = false;
                alert("Credentials removed");
            } else {
                if (email == "" || pass == "") {
                    document.forms["form"]["idremember"].checked = false;
                    alert("Please enter your credentials");
                    return false;
                } else {
                    setCookies("cemail", email, 30);
                    setCookies("cpass", pass, 30);
                    setCookies("crem", rememberme, 30);
                    alert("Credentials Stored Success");
                }
            }
}

        function setCookies(cookiename, cookiedata, exdays) {
            var d = new Date();
            d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
            var expires = "expires=" + d.toUTCString();
            document.cookie = cookiename + "=" + cookiedata + ";" + expires + ";path=/";
        }

        function loadCookies() {
            var username = getCookie("cemail");
            var password = getCookie("cpass");
            var rememberme = getCookie("crem");
            console.log("COOKIES:" + username, password, rememberme);
            document.forms["form"]["user_email"].value = username;
            document.forms["form"]["user_password"].value = password;
            if (rememberme) {
                document.forms["form"]["idremember"].checked = true;
            } else {
                document.forms["form"]["idremember"].checked = false;
            }
        }

        function getCookie(cname) {
            var name = cname + "=";
            var decodedCookie = decodeURIComponent(document.cookie);
            var ca = decodedCookie.split(';');
            for (var i = 0; i < ca.length; i++) {
                var c = ca[i];
                while (c.charAt(0) == ' ') {
                    c = c.substring(1);
                }
                if (c.indexOf(name) == 0) {
                    return c.substring(name.length, c.length);
                }
            }
            return "";
        }

        function deleteCookie(cname) {
            const d = new Date();
            d.setTime(d.getTime() + (24 * 60 * 60 * 1000));
            let expires = "expires=" + d.toUTCString();
            document.cookie = cname + "=;" + expires + ";path=/";
        }
    </script>
    
</head>
<body onload="loadCookies()">
    <div class="d-flex justify-content-center">
        <form action="" id="form" method="post" class="rounded-3">
            <div class="row g-0">
                <div class="col-md-6 col-lg-5 d-none d-md-block">
                    <img src="images/banner.jpg" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
                </div>
                <div class="col-md-6 col-lg-7 d-flex align-items-center">
                    <div class="card-body p-1 p-lg-5 text-black">
                        <div class="container1">
                            <img class="float-left" src="images/logo.jpg" style = "width: 150; height: 150;">
                            <div class="text">
                                <h4><strong>Welcome to Bicolor Color Blind Test</strong></h4>
                            </div>
                        </div>
                        <hr><br>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="email">Email:</label>
                            <div class="col-10">
                                <input type="email" class="form-control" name="user_email" id="user_email" placeholder="Your email address" required>
                            </div>
                        </div>

                        <br>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="password">Password:</label>
                            <div class="col-10"  style="position: relative;">
                                  <input type="password" class="form-control"  name="user_password" id="user_password" placeholder="Your password" required >
                                <span><div class="divchange" style="position: absolute;top: 10px;right: 20px; color:gray; font-size:13px;" id="icon" onclick="password()">SHOW</div></span>
                            </div>
                        </div>
                        
                        <br>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" ></label>
                            <div class="col-10 ">
                                <input class="form-check-input" name="rememberme" type="checkbox" value="" id="idremember" onclick="rememberMe()">
                                <label class="form-check-label">Remember Me</label>
                            </div>
                        </div>

                        <br>
                        <div class="d-grid">
                            <button class="btn btn-secondary btn-lg" name="login" type="submit">Login</button>
                        </div>
                        
                        <?php
                            
                            if (isset($_POST['login'])) {
                                $user_email = $_POST['user_email'];
                                $user_password = sha1($_POST['user_password']);
                                $sqllogin = "SELECT * FROM tbl_users WHERE user_email = '$user_email' AND user_password = '$user_password'";
                                $result = $conn->query($sqllogin);
                                
                                if ($result->num_rows > 0) {
                                    $row = mysqli_fetch_assoc($result);
                                    $_SESSION['user_id'] = $row['user_id'];
                                    $_SESSION['user_name'] = $row['user_name'];
                                    echo "<script>alert('Login Successful!');
                                    location.replace('home.php');</script>";
                                } else {
                                    echo "<script>alert('Incorrect Email or Password');</script>";
                                }
                            }
                        ?>

                        <br>
                        <p class="pb-lg-2 text-center" style="color: #393f81;">Don't have an account? <a href="register.php" style="color: #393f81;"><b>Register here</b></a></p>
                        <p class="mb-5 pb-lg-2 text-center" style="color: #393f81;">Forgot Password? <a href="resetpassword.php" style="color: #393f81;"><b>Reset Now</b></a></p>
                        <div class="copyright">
                            <p>Copyright &copy reserved by <strong>BICOLOR COLOR BLIND TEST</strong></p>
                        </div>

                    </div>
                </div>
            </div>
        </form>
    </div>
</body>
</html>