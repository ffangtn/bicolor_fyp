<?php
include_once("dbconnect.php");

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}

print "<link href='https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css' rel='stylesheet'
integrity='sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT' crossorigin='anonymous'>";

print "<link rel='stylesheet' href='https://www.w3schools.com/w3css/4/w3.css'>";
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
<html>
<head>
<title>BICOLOR COLOR BLIND TEST</title>
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
            /* background-color: #E5E4E2; */
            background-color: white;
            font-family: "Inter", Arial, Helvetica, sans-serif;
        }
        
        .container {
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .text {
            padding: 30px;
        }
        
        .copyright {
            font-size: 15px;
            text-align: center;
        }
        
        .w3-grid-template {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            padding: 30px;
            grid-gap: 30px;
        }
        
        .w3-card-4, w3-container {
            border-radius: 10px;
        }
        
        .w3-container {
            border-radius: 10px;
        }
        
        .h3 {
            text-align: center;
        }
        
        .p {
            font-size: 30px;
        }
        
        .large-font{
            font-size:xxx-large;
        }
        
        ion-icon{
            fill:transparent;
            stroke:black;
            stroke-width:30;
            transition:all 0.5s;
        }
        
        ion-icon.active{
            animation:like 0.5s 1;
            fill:red;
            stroke:none;
        }

        .topnav {
            overflow: hidden;
            background-color: dark;
        }

        /* Style the topnav links */
        .topnav a {
            float: right;
            color: grey;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
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
  <div class="w3-bar w3-white w3-wide w3-padding w3-card" id="myNavbar">
     <a class="w3-bar-item w3-button w3-hover-black w3-hide-medium w3-hide-large w3-right" href="javascript:void(0);" onclick="toggleFunction()" title="Toggle Navigation Menu">
      <i class="fa fa-bars"></i>   </a>
    <a href="index.php" class="w3-bar-item w3-button"><b>BICOLOR</b> COLOR BLIND TEST</a>
    <!-- Float links to the right. Hide them on small screens -->
    <div class="w3-right w3-hide-small">
    <a href="index.php" class="w3-bar-item w3-button">Welcome</a>
    <a href="register.php" class="w3-bar-item w3-button">Sign Up</a>
    <a href="login.php" class="w3-bar-item w3-button">Login</a>
    </div>
  </div>
  
  <div id="navDemo" class="w3-bar-block w3-white w3-hide w3-hide-large w3-hide-medium">
    <a href="register.php" class="w3-bar-item w3-button">Sign Up</a>
    <a href="login.php" class="w3-bar-item w3-button">Login</a>
  </div>
</div>

<!-- Header -->
<header class="w3-display-container w3-content w3-wide" style="max-width:1500px;" id="home">
  <img class="w3-image" src="images/topbanner.jpg"  style=" min-height:400px">
  <div class="w3-display-middle w3-margin-top w3-center">
    <h1 class="w3-xxlarge w3-text-white"><span class="w3-padding w3-black w3-opacity-min"><b>BICOLOR</b></span> <span class="w3-hide-small w3-text-light-grey">COLOR BLIND TEST</span></h1>
  </div>
</header>

            <hr>
            <div class=" copyright">
                <p>Copyright &copy reserved by <strong>BICOLOR COLOR BLIND TEST</strong></p>
            </div>
            <hr>

</body>
</html>

