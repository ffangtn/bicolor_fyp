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
  $user_id = $_SESSION['user_id'];
  $user_name = $_SESSION['user_name'];

  if($user_id==null){
    echo "<script>location.replace('index.php');
    alert('Please log in first');
    </script>";
  }
 
?>

<!DOCTYPE html>
<html>
<head>
<title>Profile</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href="images/favicon.jpg">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body {
            background-color: #E5E4E2;
            font-family: "Inter", Arial, Helvetica, sans-serif;
        }
        
        p.mb-0 {
            padding: 5px 0;
        }
        
        .copyright {
            font-size: 15px;
            text-align: center;
        }
        .d-grid {
          float: left;
          width: 50%;
          padding: 10px;
    
    }
    
    @media (max-width: 800px) {

      .d-grid {
          float: left;
          width: 50%;
          padding: 10px;
    
        }
    
     
    
    
    }

        
        
    </style>
      <script>
        var check = function() {
            if (document.getElementById('new_password').value !=
                document.getElementById('confirm_new_password').value) {
                document.getElementById('message').style.color = 'red';
                document.getElementById('message').innerHTML = 'Both password is not matching!';
            } else {
                document.getElementById('message').style.color = 'green';
                document.getElementById('message').innerHTML = 'Password OK!';
            }
        }
  
        function password() {
            var x = document.getElementById("old_password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
        
        function password1() {
            var x = document.getElementById("new_password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
     
      function password2() {
            var x = document.getElementById("confirm_new_password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    
        
    </script>
</head>


<body>

<!-- Navbar (sit on top) -->
<div class="w3-top">
  <div class="w3-bar w3-white w3-wide w3-padding w3-card">
        <a href="home.php" class="w3-bar-item w3-button"><b>BICOLOR</b> COLOR BLIND TEST</a>
        <!-- Float links to the right. Hide them on small screens -->
        <div class="w3-right w3-hide-small">
            <a href="test.php" class="w3-bar-item w3-button">Test</a>
            <a href="history.php" class="w3-bar-item w3-button">History</a>
            <a href="profile.php" class="w3-bar-item w3-button">Profile</a>
            <a href="logout.php" class="w3-bar-item w3-button" onclick="return confirm('Are you sure to logout?')">Logout</a>
        </div>
  </div>
</div>

<!-- Header -->
<header class="w3-display-container w3-content w3-wide" style="max-width:1500px;" id="home">
<img class="w3-image" src="images/profilebg.jpg" style=" min-height:300px" >
  <div class="w3-display-middle w3-margin-top w3-center">
    <h1 class="w3-xxlarge w3-text-white"><span class="w3-padding w3-black w3-opacity-min"><b>BICOLOR</b></span> <span class="w3-hide-small w3-text-light-grey">COLOR BLIND TEST</span></h1>
  </div>
</header>

<div class="container py-5">
        <div class="row">
           <?php
                $sqlread = "SELECT * FROM tbl_users WHERE user_id = '$user_id'";
                $result = $conn->query($sqlread);
                if ($result->num_rows > 0) {
                    $row = mysqli_fetch_assoc($result);
                }
            ?>                 
                                
                    <div class='col-lg-12'>
                        <div class='card mb-4'>
                            <div class='card-body'>
                                <?php
                                  
                                
                                            echo "<form method='POST'><div class='row' >";
                                            echo "<div class='col-sm-3'><p class='mb-0'>Old Password</p></div>";
                                            echo "<div class='col-sm-9'><input type='password' class='form-control form-control-sm' id='old_password'  name='oldpassword' placeholder='Your old password' required>";
                                            echo" <br><input class='form-check-input' type='checkbox' value='' id='flexCheckDefault' onclick='password()'  style='margin-right: 10px;'>";   
                                            echo"<label class='form-check-label' for='flexCheckDefault'>Show Old Password</label>"; 
                                            echo"</div>";
                                            echo"</div>";
                                           
                                            
                                            echo "<hr><div class='row'>";
                                            echo "<div class='col-sm-3'><p class='mb-0'>New Password</p></div>";
                                            echo "<div class='col-sm-9'><input type='password' class='form-control form-control-sm' id='new_password' name='newpassword' onkeyup='check();' placeholder='Your new password' required>";
                                             echo" <br><input class='form-check-input' type='checkbox' value='' id='flexCheckDefault' onclick='password1()'  style='margin-right: 10px;'>";   
                                            echo"<label class='form-check-label' for='flexCheckDefault'>Show Password</label>"; 
                                            echo"</div>";
                                            echo"</div>";
                                            
                                            echo "<hr><div class='row'>";
                                            echo "<div class='col-sm-3'><p class='mb-0'>Confirm New Password</p></div>";
                                            echo "<div class='col-sm-9'><input type='password' class='form-control form-control-sm' id='confirm_new_password' name='confirmnewpassword' onkeyup='check();' placeholder='Confirm new password' required>";
                                            echo" <br><input class='form-check-input' type='checkbox' value='' id='flexCheckDefault' onclick='password2()'  style='margin-right: 10px;'>";   
                                            echo"<label class='form-check-label' for='flexCheckDefault'>Show Confirm Password</label>"; 
                                            echo"<br><br><span id='message'></span>";
                                            echo"</div>";
                                            echo"</div>";
                                            echo "<div class='d-grid gap-2 col-12 mx-auto'>";
                                            echo "<a href='profile.php' class='btn btn-secondary btn-lg btn-block'>Cancel</a></div>";
                                            echo "<div class='d-grid gap-2 col-12 mx-auto'>";
                                            echo "<button type='submit' class='btn btn-secondary btn-lg btn-block' name='process_editPassword'>Submit</button> </div> </div>";
                      
                                            echo "</form>";
                                    
                                   
                                   
                                
                                    if (isset($_POST["process_editPassword"])) {
                                        $user_oldpassword = $_POST['oldpassword'];
                                         $user_newpassword = $_POST['newpassword'];
                                         $confirm_newpassword = $_POST['confirmnewpassword'];
                                         $newpassword = sha1($user_newpassword);
                                         $confirmpassword = sha1($confirm_newpassword);
                                         
                                          $sqlselectpassword = "SELECT user_password FROM tbl_users WHERE user_id = '$user_id'";
                                            $result = $conn->query($sqlselectpassword);
                                           
                                            if ($result->num_rows > 0) {
                                                $row = $result->fetch_assoc();
                                                $userpass = $row["user_password"];
                                        
                                                  if($newpassword!= $confirmpassword ){
                                                         echo "<script>alert('Registration Fail! Passwords not matched!');</script>";
                                                    } 
                                                 
                                                    else if ($userpass == sha1($user_oldpassword)) {
                                                   $sqlupdate = "UPDATE tbl_users set user_password ='$newpassword' where user_id = '$user_id' ";
                                                    if ($conn->query($sqlupdate) === TRUE) {
                                                            echo "<script>alert('Password updated successfully!');
                                                            location.replace('profile.php');</script>";
                                                    
                                                    } else {
                                                        echo "<script>alert('Password updated failed!');
                                                            location.replace('profile.php');</script>";
                                               
                                                } 
                                                }else {
                                                     echo "<script>alert('Wrong old password!');
                                                            location.replace('profile.php');</script>";
                                                
                                             }
                                     }
                                    }
                                   

                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
            </div>

            <hr>
            <div class=" copyright">
                <p>Copyright &copy reserved by <strong>BICOLOR COLOR BLIND TEST</strong></p>
            </div>
            <hr>

</body>
</html>
