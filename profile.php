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

        
        
    </style>
    
    <script>
    function toggleFunction() {
    var x = document.getElementById("navDemo");
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else {
        x.className = x.className.replace(" w3-show", "");
    }
}
    </script>
</head>


<body>

<!-- Navbar (sit on top) -->
<div class="w3-top">
  <div class="w3-bar w3-white w3-wide w3-padding w3-card"  id="myNavbar">
       <a class="w3-bar-item w3-button w3-hover-black w3-hide-medium w3-hide-large w3-right" href="javascript:void(0);" onclick="toggleFunction()" title="Toggle Navigation Menu">
      <i class="fa fa-bars"></i>   </a>
  <a href="home.php" class="w3-bar-item w3-button"><b>BICOLOR</b> COLOR BLIND TEST</a>
    <!-- Float links to the right. Hide them on small screens -->
    <div class="w3-right w3-hide-small">
    <a href="test.php" class="w3-bar-item w3-button">Test</a>
    <a href="history.php" class="w3-bar-item w3-button">History</a>
    <a href="profile.php" class="w3-bar-item w3-button">Profile</a>
    <a href="logout.php" class="w3-bar-item w3-button" onclick="return confirm('Are you sure to logout?')">Logout</a>
    </div>
  </div>
  
   <div id="navDemo" class="w3-bar-block w3-white w3-hide w3-hide-large w3-hide-medium">
    <a href="test.php" class="w3-bar-item w3-button">Test</a>
    <a href="history.php" class="w3-bar-item w3-button" >History</a>
     <a href="profile.php" class="w3-bar-item w3-button">Profile</a>
    <a href="logout.php" class="w3-bar-item w3-button"onclick="return confirm('Are you sure to logout?')">Logout</a>
  </div>
</div>

<!-- Header -->
<header class="w3-display-container w3-content w3-wide" style="max-width:1500px;" >
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
                                 $user_password = sha1($row["user_id"]);
                            }
                        ?>

            <div class="col-lg-12">
            
                <form action="edit.php" enctype="multipart/form-data" id="form" method="post">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Full Name</p>
                                </div>
                                <div class="col-sm-6">
                                    <p class="text-muted mb-0"><?php echo $row["user_name"]; ?></p>
                                </div>
                                <div class="col-sm-2">
                                    <?php echo "<button type='submit' class='btn btn-outline-secondary btn-sm' name='editName' value='" . $row["user_id"] . "'>Change Name</button>"; ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Email Address</p>
                                </div>
                                <div class="col-sm-6">
                                    <p class="text-muted mb-0"><?php echo $row['user_email']; ?></p>
                                </div>
                                <!--<div class="col-sm-2">-->
                                <!--    <?php echo "<button type='submit' class='btn btn-outline-secondary btn-sm' name='editEmail' value='" . $row["user_id"] . "'>Change Email</button>"; ?>-->
                                <!--</div>-->
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Contact Number</p>
                                </div>
                                <div class="col-sm-6">
                                    <p class="text-muted mb-0"><?php echo $row['user_phone']; ?></p>
                                </div>
                                <div class="col-sm-2">
                                    <?php echo "<button type='submit' class='btn btn-outline-secondary btn-sm' name='editPhone' value='" . $row["user_id"] . "'>Change Phone</button>"; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
         <form action="changepassword.php" enctype="multipart/form-data" id="form" method="post">
            <div class="d-grid gap-2 col-12 mx-auto">
                <button type="submit" class="btn btn-secondary btn-lg btn-block">Change password</button>
            </div>
        </form>
    </div>


            <hr>
            <div class=" copyright">
                <p>Copyright &copy reserved by <strong>BICOLOR COLOR BLIND TEST</strong></p>
            </div>
            <hr>

</body>
</html>
