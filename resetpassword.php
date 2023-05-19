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
 
    </script>
</head>
<body>
    <div class="d-flex justify-content-center">
        <form action="" id="form" method="post" class="rounded-3">
            <div class="row g-0">
                <div class="col-md-6 col-lg-12 d-flex align-items-center">
                    <div class="card-body p-4 p-lg-5 text-black">
                        <div class="container1">
                            <img class="float-right" src="images/logo.jpg" style = "width: 150; height: 150;">
                            <div class="text">
                                <h4><strong>Reset Password</strong></h4>
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

                        <br>
                        <div class="d-grid">
                            <button class="btn btn-secondary btn-lg" name="reset" type="submit">Submit</button>
                        </div>
                        
                        <?php
                            if (isset($_POST['reset'])) {
                                    $_SESSION['user_email'] = $_POST['user_email'];
                                    echo "<script>location.replace('mail.php');</script>";
                            }
                        ?>

                        <br>
                        <p class="pb-lg-2 text-center" style="color: #393f81;"><a href="login.php" style="color: #393f81;"><b>Back</b></a></p>
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