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
  $score = $_SESSION['score'];
  $desc = $_SESSION['desc'];
  $percentage = $_SESSION['percentage'];


  
  if($user_id==null){
    echo "<script>location.replace('index.php');
    alert('Please log in first');
    </script>";
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Save Result</title>
    <link rel="icon" href="images/favicon.jpg">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js" type='text/javascript'></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>



  <style>

  body,h1 {
    font-family: "Raleway", sans-serif;

  }

  body, html {height: 100%}

  .bgimg {
    background-image: url('images/resultbg.jpg');
    min-height: 100%;
    background-position: center;
    background-size: cover;
    opacity: 0.8;
  }

  .container {
			align-items: center;
			justify-content: center;
			width: 1200px;
            height:450px;
			margin: 15px;
			padding: 50px;
			border: 2px solid #ccc;
			border-radius: 10px;
      background: white;
      opacity: 0.8;
		}

  .d-grid {
      float: left;
      width: 50%;
      padding: 10px;

}
@media (max-width: 800px) {



   .container {
			align-items: center;
			justify-content: center;
			width: 400px;
            height:500px;
			margin: 15px;
			padding: 25px;
			border: 2px solid #ccc;
			border-radius: 10px;
      background: white;
      opacity: 0.8;
		}

  .d-grid {
      float: left;
      width: 50%;
      padding: 10px;

}
.col-8 {
      width: 100%;
     

}
h1 {
     font-size:20px;
     

}
 


}

</style>



<body>

<div class=" w3-display-container w3-animate-opacity w3-text-white ">
    
  <div class="bgimg">
    </div>
  
    <div class="w3-display-topleft w3-padding-large w3-xlarge">
      PLEASE ENTER THE FOLLOWING DETAILS.
    </div>

    <div class="w3-display-middle" style="color:black;">
      

          <div class="container w3-margin-top w3-center">
          <h1 class="w3-xxlarge w3-text-white">
                <span class="w3-padding " style="color:black; font-size: 48px;"><b >Save Result Form</b></span> 
         </h1>
         <br>

        <form action="" id="form" method="post" class="rounded-3">

        <div class="form-group row">
                <label class="col-sm-4 col-form-label" style="font-size:20px;" for="name">Name:</label>
                <div class="col-8">
                    <input type="name" class="form-control" name="name" id="name" placeholder="Your name" required>
                </div>
            </div>
            <br>
            <div class="form-group row">
                <label class="col-sm-4 col-form-label" style="font-size:20px;" for="age">Age:</label>
                <div class="col-8">
                    <input type="tel" class="form-control" name="age"  id="age" placeholder="Your age" required>
                </div>
            </div>
            <br>

            <div class="d-grid">
                <button class="btn btn-secondary btn-lg" onclick="location.href = 'home.php'" name="back" >Back Home</button>
            </div>
            <div class="d-grid">
                <button class="btn btn-secondary btn-lg" name="save" type="submit">Save Result</button>
            </div>

            <?php
            if (isset($_POST["save"])) {
                $name = $_POST['name'];
                $age = $_POST['age'];
           
                    $sqlinsert = "INSERT INTO tbl_history (user_name,user_age,score,percentage,description,user_id) VALUES ('" . $name . "', '" . $age . "', '" . $score . "' , '" . $percentage . "','" . $desc . "', '" . $user_id . "' )";
                    if ($conn->query($sqlinsert) === TRUE) {
                        echo "<script>alert('Save Successful!');
                        location.replace('home.php');</script>";
                    } else {
                        echo "<script>alert('Save Fail!');
                        </script>";
                    }
            }
            ?>
            
            <br>
        </form>
      </div>  
</div>
</div>

     <div class="w3-display-bottommiddle">
          <p style="color: white"> &copy  <strong>BICOLOR COLOR BLIND TEST</strong></p>
      </div>

</body>



</html>