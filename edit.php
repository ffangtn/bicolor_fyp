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
                                    if (isset($_POST["editName"])) {
                                        $sqlread = "SELECT user_name FROM tbl_users WHERE user_id=" . $_POST["editName"];
                                        $result = $conn->query($sqlread);
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $sqlread = "SELECT * FROM tbl_users WHERE user_id = '$user_id'";
                                            $result = $conn->query($sqlread);
                                            if ($result->num_rows > 0) {
                                                $row = mysqli_fetch_assoc($result);
                                            }
                                            
                                            echo "<form method='POST'><div class='row'>";
                                            echo "<div class='col-sm-3'><p class='mb-0'>Full Name</p></div>";
                                            echo "<div class='col-sm-6'><input type='name' class='form-control form-control-sm' name='user_name' value='" . $row['user_name'] . "' placeholder='Your name' required></div>";
                                            echo "<div class='col-sm-1'><button type='submit' class='btn btn-outline-primary btn-sm' name='process_editName' value='" . $_POST["editName"] . "'>Submit</button></div>";
                                            echo "<div class='col-sm-1'><button type='submit' class='btn btn-outline-danger btn-sm' name='process_cancelName' value='" . $_POST["editName"] . "'>Cancel</button></div>";
                                            echo "</div></form>";
                                        
                                            echo "<hr><div class='row'>";
                                            echo "<div class='col-sm-3'><p class='mb-0'>Email Address</p></div>";
                                            echo "<div class='col-sm-6'><p class='text-muted mb-0'>" . $row['user_email'] . "</p></div>";
                                            // echo "<div class='col-sm-2'><button type='button' class='btn btn-outline-secondary btn-sm' disabled>Change Email</button></div>";
                                            echo"</div>";
                                            
                                            echo "<hr><div class='row'>";
                                            echo "<div class='col-sm-3'><p class='mb-0'>Contact Number</p></div>";
                                            echo "<div class='col-sm-6'><p class='text-muted mb-0'>" . $row['user_phone'] . "</p></div>";
                                            echo "<div class='col-sm-2'><button type='button' class='btn btn-outline-secondary btn-sm' disabled>Change Phone</button></div></div>";
                                        }
                                    }
                                    // else if (isset($_POST["editEmail"])) {
                                    //     $sqlread = "SELECT user_email FROM tbl_users WHERE user_id=" . $_POST["editEmail"];
                                    //     $result = $conn->query($sqlread);
                                    //     while ($row = mysqli_fetch_assoc($result)) {
                                    //         $sqlread = "SELECT * FROM tbl_users WHERE user_id = '$user_id'";
                                    //         $result = $conn->query($sqlread);
                                    //         if ($result->num_rows > 0) {
                                    //             $row = mysqli_fetch_assoc($result);
                                    //         }
                                            
                                    //         echo "<div class='row'>";
                                    //         echo "<div class='col-sm-3'><p class='mb-0'>Full Name</p></div>";
                                    //         echo "<div class='col-sm-6'><p class='text-muted mb-0'>" . $row['user_name'] . "</p></div>";
                                    //         echo "<div class='col-sm-2'><button type='button' class='btn btn-outline-secondary btn-sm' disabled>Change Name</button></div></div>";
                                        
                                    //         echo "<form method='POST'><hr><div class='row'>";
                                    //         echo "<div class='col-sm-3'><p class='mb-0'>Email Address</p></div>";
                                    //         echo "<div class='col-sm-6'><input type='email' class='form-control form-control-sm' name='user_email' value='" . $row['user_email'] . "' placeholder='Your email address' required></div>";
                                    //         echo "<div class='col-sm-1'><button type='submit' class='btn btn-outline-primary btn-sm' name='process_editEmail' value='" . $_POST["editEmail"] . "'>Submit</button></div>";
                                    //         echo "<div class='col-sm-1'><button type='submit' class='btn btn-outline-danger btn-sm' name='process_cancelEmail' value='" . $_POST["editEmail"] . "'>Cancel</button></div>";
                                    //         echo "</div></form>";
                                            
                                    //         echo "<hr><div class='row'>";
                                    //         echo "<div class='col-sm-3'><p class='mb-0'>Contact Number</p></div>";
                                    //         echo "<div class='col-sm-6'><p class='text-muted mb-0'>" . $row['user_phone'] . "</p></div>";
                                    //         echo "<div class='col-sm-2'><button type='button' class='btn btn-outline-secondary btn-sm' disabled>Change Phone</button></div></div>";
                                    //     }
                                    // }
                                    else if (isset($_POST["editPhone"])) {
                                        $sqlread = "SELECT user_phone FROM tbl_users WHERE user_id=" . $_POST["editPhone"];
                                        $result = $conn->query($sqlread);
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $sqlread = "SELECT * FROM tbl_users WHERE user_id = '$user_id'";
                                            $result = $conn->query($sqlread);
                                            if ($result->num_rows > 0) {
                                                $row = mysqli_fetch_assoc($result);
                                            }
                                            
                                            echo "<div class='row'>";
                                            echo "<div class='col-sm-3'><p class='mb-0'>Full Name</p></div>";
                                            echo "<div class='col-sm-6'><p class='text-muted mb-0'>" . $row['user_name'] . "</p></div>";
                                            echo "<div class='col-sm-2'><button type='button' class='btn btn-outline-secondary btn-sm' disabled>Change Name</button></div></div>";
                                        
                                            echo "<hr><div class='row'>";
                                            echo "<div class='col-sm-3'><p class='mb-0'>Email Address</p></div>";
                                            echo "<div class='col-sm-6'><p class='text-muted mb-0'>" . $row['user_email'] . "</p></div>";
                                            // echo "<div class='col-sm-2'><button type='button' class='btn btn-outline-secondary btn-sm' disabled>Change Email</button></div></div>";
                                            echo"</div>";
                                            
                                            echo "<form method='POST'><hr><div class='row'>";
                                            echo "<div class='col-sm-3'><p class='mb-0'>Contact Number</p></div>";
                                            echo "<div class='col-sm-6'><input type='tel' class='form-control form-control-sm' name='user_phone' value='" . $row['user_phone'] . "' placeholder='Your phone number' required></div>";
                                            echo "<div class='col-sm-1'><button type='submit' class='btn btn-outline-primary btn-sm' name='process_editPhone' value='" . $_POST["editPhone"] . "'>Submit</button></div>";
                                            echo "<div class='col-sm-1'><button type='submit' class='btn btn-outline-danger btn-sm' name='process_cancelPhone' value='" . $_POST["editPhone"] . "'>Cancel</button></div>";
                                            echo "</div></form>";
                                        }
                                    }
                                
                                    if (isset($_POST["process_editName"])) {
                                        $user_id = $_POST["process_editName"];
                                        $user_name = $_POST['user_name'];
            
                                        $sqlupdate = "UPDATE tbl_users set user_name ='$user_name' where user_id = '$user_id' ";
            
                                        if ($conn->query($sqlupdate) === TRUE) {
                                            $_SESSION['user_name'] = $user_name;
                                            echo "<script>alert('Name updated successfully!');
                                            location.replace('profile.php');</script>";
                                        }
                                    }
                                    else if (isset($_POST["process_cancelName"])) {
                                        echo "<script>alert('You have canceled to update name.');
                                        location.replace('profile.php');</script>";
                                    }
                                    // else if (isset($_POST["process_editEmail"])) {
                                    //     $user_id = $_POST["process_editEmail"];
                                    //     $user_email = $_POST['user_email'];
            
                                    //     $select = mysqli_query ($conn, "SELECT user_email FROM tbl_users WHERE user_email = '$user_email'");
                                    //     if (mysqli_num_rows($select) > 0) {
                                    //         echo "<script>alert('Email already exist!');
                                    //          location.replace('profile.php');</script>";
                                    //     } else {
                                    //       $sqlupdate = "UPDATE tbl_users set user_email ='$user_email' where user_id = '$user_id' ";
            
                                    //             if ($conn->query($sqlupdate) === TRUE) {
                                    //                 echo "<script>alert('Email address updated successfully!');
                                    //                 location.replace('profile.php');</script>";
                                    //             }
                                               
                                    //     }
                                    // }
                                    // else if (isset($_POST["process_cancelEmail"])) {
                                    //     echo "<script>alert('You have canceled to update email address.');
                                    //     location.replace('profile.php');</script>";
                                    // }
                                    else if (isset($_POST["process_editPhone"])) {
                                        $user_id = $_POST["process_editPhone"];
                                        $user_phone = $_POST['user_phone'];
            
                                        $sqlupdate = "UPDATE tbl_users set user_phone ='$user_phone' where user_id = '$user_id' ";
            
                                        if ($conn->query($sqlupdate) === TRUE) {
                                            echo "<script>alert('Contact number updated successfully!');
                                            location.replace('profile.php');</script>";
                                        }
                                    }
                                    else if (isset($_POST["process_cancelPhone"])) {
                                        echo "<script>alert('You have canceled to update contact number.');
                                        location.replace('profile.php');</script>";
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
