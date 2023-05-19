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
<title>BICOLOR COLOR BLIND TEST</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href="images/favicon.jpg">
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
    <script src="https://kit.fontawesome.com/73f89a0d52.js" crossorigin="anonymous"></script>
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

        /* Second image (Portfolio) */
        .bgimg-2 {
        background-image: url("images/aboutbg.jpg");
        min-height: 200px;
        }
        
    </style>
    
    <script>
    function onClick(element) {
            document.getElementById("img01").src = element.src;
            document.getElementById("modal01").style.display = "block";
            var captionText = document.getElementById("caption");
            captionText.innerHTML = element.alt;
            }
            
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
    <a href="home.php" class="w3-bar-item w3-button">Hi,<?php echo "$user_name"?></a>
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
<header class="w3-display-container w3-content w3-wide" style="max-width:1500px;" id="home">
  <img class="w3-image" src="images/topbanner.jpg"  style=" min-height:400px"  >
        <div class="w3-display-middle w3-margin-top w3-center">
            <h1 class="w3-xxlarge w3-text-white">
                <span class="w3-padding w3-black w3-opacity-min"><b>BICOLOR</b></span> 
                <span class="w3-hide-small w3-text-light-grey">COLOR BLIND TEST</span>
            </h1>
        </div>

        <div class="w3-display-bottommiddle w3-margin-top w3-center">
            <span class="w3-text-light-grey">
                <p><a href="test.php" class="w3-button w3-white w3-padding-large w3-large w3-margin-top">Start Test</a></p>
            </span>   
        </div>
        
</header>

<br>

<!-- Preparation Section -->
<div class="w3-container" style="padding:128px 16px" id="about">
  <h3 class="w3-center">BEFORE THE TEST</h3>
  <p class="w3-center w3-large">Do The Following</p>
  <div class="w3-row-padding w3-center" style="margin-top:64px">
    <div class="w3-third">
      <i class="fa-solid fa-glasses w3-margin-bottom w3-jumbo w3-center"></i>
      <p class="w3-large">1. REMOVE ALL GLASSES WITH COLORED LENSES</p>
      <p>The test is only designed to be taken with the naked eye, and it will work only without colored lenses of any type and lead to accurate results.</p>
    </div>
    <div class="w3-third">
      <i class="fa fa-check w3-margin-bottom w3-jumbo"></i>
      <p class="w3-large">2. TURN OFF THE COLORED EYE CARE FILTER</p>
      <p>Colored light fliter such as bluelight filter or eye care setting may affect the accuracy of color you see.</p>
    </div>
    <div class="w3-third">
      <i class="fa fa-lightbulb-o w3-margin-bottom w3-jumbo"></i>
      <p class="w3-large">3. TURN BRIGHTNESS ON SCREEN TO HIGH</p>
      <p>Dim light affects color & the ability to perceive differentiation.</p>
    </div>
  </div>
</div>


    <div class="bgimg-2 w3-display-container w3-opacity-min">
        <div class="w3-display-middle">
            <span class="w3-xxlarge w3-text-white w3-wide">ABOUT</span>
        </div>
    </div>


    <!-- Container (About Section) -->
<div class="w3-content w3-container w3-padding-64" id="about">
  <h3 class="w3-center">ISHIHARA TEST</h3>
  <p class="w3-center"><em>Ishihara color plates are used in this color blind test <br>Below are some example of the ishihara color plates.</em></p><br>


  <!-- Responsive Grid. Four columns on tablets, laptops and desktops. Will stack on mobile devices/small screens (100% width) -->
  <div class="w3-row-padding w3-center">
    <div class="w3-col m3">
      <img src="images/1-dark.png" style="width:100%" onclick="onClick(this)" class="w3-hover-opacity" alt="1-dark">
    </div>

    <div class="w3-col m3">
      <img src="images/2-light.png" style="width:100%" onclick="onClick(this)" class="w3-hover-opacity" alt="2-light">
    </div>

    <div class="w3-col m3">
      <img src="images/3-light.png" style="width:100%" onclick="onClick(this)" class="w3-hover-opacity" alt="3-light">
    </div>

    <div class="w3-col m3">
      <img src="images/4-light2.png" style="width:100%" onclick="onClick(this)" class="w3-hover-opacity" alt="4-light2">
    </div>
  </div>

  <div class="w3-row-padding w3-center w3-section">
    <div class="w3-col m3">
      <img src="images/5.png" style="width:100%" onclick="onClick(this)" class="w3-hover-opacity" alt="5">
    </div>

    <div class="w3-col m3">
      <img src="images/6-light2.png" style="width:100%" onclick="onClick(this)" class="w3-hover-opacity" alt="6-light2">
    </div>

    <div class="w3-col m3">
      <img src="images/7-med.png" style="width:100%" onclick="onClick(this)" class="w3-hover-opacity" alt="7-med">
    </div>

    <div class="w3-col m3">
      <img src="images/9.png" style="width:100%" onclick="onClick(this)" class="w3-hover-opacity" alt="9">
    </div>
  </div>
</div>

<!-- Modal for full size images on click-->
<div id="modal01" class="w3-modal w3-black" onclick="this.style.display='none'">
  <span class="w3-button w3-large w3-black w3-display-topright" title="Close Modal Image"><i class="fa fa-remove"></i></span>
  <div class="w3-modal-content w3-animate-zoom w3-center w3-transparent w3-padding-64">
    <img id="img01" class="w3-image">
    <p id="caption" class="w3-opacity w3-large"></p>
  </div>
</div>


  
  <!-- Contact Section -->
  <div class="w3-container w3-padding-large w3-light-grey ">
    <h4 id="contact"><b>Contact Us</b></h4>
    <div class="w3-row-padding w3-center w3-padding-large" style="margin:0 -50px">

      <div class="w3-half w3-dark-grey w3-padding-large " >
        <p><i class="fa fa-envelope w3-xxlarge w3-text-light-grey"></i></p>
        <p>bicolor@moneymoney12345.com</p>
      </div>

      <div class="w3-half w3-teal w3-padding-large">
        <p><i class="fas fa-map-marker-alt w3-xxlarge w3-text-light-grey"></i></p>
        <p>Malaysia</p>
      </div>

    </div>
  </div>

  <!-- Footer -->
  <footer class="w3-container w3-padding-32 w3-grey">
  <div class="w3-row-padding">
    <div class="w3-third w3-center">
      <img class="float-left" src="images/logo.jpg" style = "width: 150; height: 150;">
    </div>
  

    <div class="w3-half">
      <h3>DISCLAIMER: </h3>
      <p  style="text-align: justify;">
     This website is created for <strong>STUDY PURPOSE</strong> and is not intended to be taken as a professional or formal source of information. The content provided here may not be completely accurate, and should not be used as a substitute for professional advice. This website is not responsible for any actions taken based on the information provided herein.
      </p>
    </div>

  </div>
  </footer>

    
        <hr>
            <div class=" copyright">
                <p>Copyright &copy reserved by <strong>BICOLOR COLOR BLIND TEST</strong></p>
            </div>
        <hr>

</body>
</html>
