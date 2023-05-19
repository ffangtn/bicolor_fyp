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
<title>History</title>
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

        /* Second image (Portfolio) */
        .bgimg-2 {
        background-image: url("images/aboutbg.jpg");
        min-height: 200px;
        }

        .form {
			align-items: center;
			justify-content: center;
			width: 1200px;
            height:600px;
			margin: 15px;
			padding: 100px;
			border: 2px solid #ccc;
			border-radius: 10px;
            background: white;
            opacity: 0.8;
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

<br>
<br>

<div class="w3-padding-large">
    <?php
        $sqlload = "SELECT * FROM tbl_history WHERE user_id=$user_id";
        $result = $conn->query($sqlload);
        if ($result->num_rows == 0){
            echo "<div class='w3-display-middle w3-margin-top w3-center'>";
          echo "<h2>No history for now.</h2>";
          echo "</div>";
        }
            else if ($result->num_rows >= 0){
                echo "<h2>History</h2>";
                while ($row = mysqli_fetch_assoc($result)) {
                    $history_id = $row["history_id"];
                    $user_name = $row["user_name"];
                    $user_age = $row["user_age"];
                    $score = $row["score"];
                    $percentage = $row["percentage"];
                    $description = $row["description"];
                    $user_id = $row["user_id"];
                
                    echo "<div class='w3-container w3-padding-32 w3-light-gray w3-padding-large'>";
                    echo "<div class='w3-row-padding'>";
                    echo "<div class='w3-third w3-center w3-padding-large'>";
                    echo "<form action='' id='form' method='post' class='rounded-3'>";
                    echo "<label>Name: <b>$user_name</b> </label><br>";
                    echo "<label>Age: $user_age</label><br>";
                    echo "</div>";
                    echo "<div class='w3-third w3-center'>";
                    // echo "<table style='width: 100%;text-align: center;'>";
                    //  echo "<tr>";
                    //     echo "<td>Score:</td>";
                    //     echo "<td>$score out of 20</td>";
                    // echo "</tr>";
                    //  echo "<tr>";
                    //     echo "<td>Accuracy:</td>";
                    //     echo "<td>$percentage</td>";
                    // echo "</tr>";
                    //  echo "<tr>";
                    //     echo "<td>Result:</td>";
                    //     echo "<td>$description</td>";
                    // echo "</tr>";
                    // echo "</table>";
                    echo "<label>Score:    $score out of 20</label><br>";
                    echo "<label>Accuracy: $percentage</label><br>";
                    echo "<label>Result:   $description</label><br>";
                    echo "</div>";
                    echo "<div class='w3-third w3-center'>";
                    echo "<button style='font-size: 16px;' type='submit' class='btn btn-outline-danger btn-sm' name='delete' value='" . $row["history_id"] ."'  onclick=\"return confirm('Are you sure to delete?')\">Delete</button>";
                    echo "</div>";
                    echo "</form>";
                    echo "</div>";//row padding
                    echo "</div>";//container
                    echo "<br>";
         }
        }
     
         if (isset($_POST["delete"])) {
            $sqldelete = "DELETE FROM tbl_history WHERE history_id=". $_POST["delete"];
                if ($conn->query($sqldelete) === TRUE) {
                    echo "<script>alert('Hsitory Deleted Successful!');
                    location.replace('history.php');</script>";
                 } 
                 else {
                     echo "<script>alert('Delete Fail!');
                    </script>";
                 }
         }
    ?>
</div>
      

</body>
</html>
