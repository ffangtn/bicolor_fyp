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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Result</title>
    <link rel="icon" href="images/favicon.jpg">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js" type='text/javascript'></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<style>
  .form-group{
    visibility:hidden;
    font-size:1px;
  }

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
        height:550px;
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

table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
  font-size: 24px;
}

td, th {
  border: 1px solid #dddddd;
  text-align: center;
  padding: 8px;
  height:100px;
}

td:nth-child(odd) {
  background-color: lightgray;
}
    h1 {
      font-size: 48px;
    }
    h3 {
      font-size: 20px;
    }

@media (max-width: 800px) {

  .container {
		align-items: center;
		justify-content: center;
		width: 400px;
        max-height:500px;
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

    table {
      font-family: arial, sans-serif;
      border-collapse: collapse;
      width: 100%;
      font-size: 18px;
    }
    
    td, th {
      border: 1px solid #dddddd;
      text-align: center;
      height:50px;
    }
    
    td:nth-child(odd) {
      background-color: lightgray;
    }
    h1 {
      font-size: 30px;
    }
    h3 {
      font-size: 18px;
    }


}

		


</style>

<body>

<div class=" w3-display-container w3-animate-opacity w3-text-white ">
    
  <div class="bgimg">
  </div>
  
    <div class="w3-display-topleft w3-padding-large w3-xlarge">
       THANK YOU FOR COMPLETING THE TEST.
    </div>

    <div class="w3-display-middle" style="color:black;">
      

          <div class="container w3-margin-top w3-center">
          <h1 class="w3-xxlarge w3-text-white">
                <span class="w3-padding w3-black w3-opacity-min" id="descclass"><b id="desc"></b></span> 
          </h1>
          <br>
          
          <h3 class="w3-text-black">
                <span class="w3-padding" id="desctext"></span> 
          </h3>
          <br>

          <table>
          <tr>
            <td style="width:30%; ">Total correct:</td>
            <td ><b id="score"></b></td>
          </tr>
          <tr>
           <td style="width:30%; ">Acccuracy in %:</td>
           <td ><b id="percentage"></b></td>
          </tr>
        </table>
        <br>
  

        <form action="" id="form" method="post" class="rounded-3">
            <div class="d-grid">
                <button class="btn btn-secondary btn-lg" name="back" type="submit">Back Home</button>
            </div>
            <div class="d-grid">
                <button class="btn btn-secondary btn-lg" name="save" type="submit">Save Result</button>
            </div>

            <div class="form-group row">
                <label class="col-sm-4 col-form-label" for="scorep">Score</label>
                <div class="col-8">
                    <input type="text" class="form-control" name="scorep" id="scorep" readonly />
                </div>
            </div>
     
            <div class="form-group row">
                <label class="col-sm-4 col-form-label" for="descp">Description</label>
                <div class="col-8">
                    <input type="text" class="form-control" name="descp" id="descp" readonly />
                </div>
            </div>
          
            <div class="form-group row">
                <label class="col-sm-4 col-form-label" for="percenp">Percentage</label>
                <div class="col-8">
                    <input type="text" class="form-control" name="percenp" id="percenp" readonly />
                </div>
            </div>
         

            <?php
            if (isset($_POST["save"])) {
                $_SESSION['score'] = $_POST['scorep'];
                $_SESSION['desc'] = $_POST['descp'];
                $_SESSION['percentage'] = $_POST['percenp'];
                echo "<script>
                location.replace('save_result.php');</script>";
            
            }
            if (isset($_POST["back"])) {
              echo "<script>
              location.replace('home.php');</script>";
          }
            ?>
        </form>
      </div>  
</div>
</div>
     <div class="w3-display-bottommiddle ">
          <p style="color: white"> &copy  <strong>BICOLOR COLOR BLIND TEST</strong></p>
      </div>
</body>
</html>
<script>
    let score = sessionStorage.getItem("score");
    var percen = (((score / 20)*100).toFixed(2)) +"%";
    if(score >= 0 && score<=10){
      document.getElementById("score").innerHTML = score + " out of 20";
      document.getElementById("desc").innerHTML = "Severe Color Vision Deficiency";
      document.getElementById("desctext").innerHTML = "It seems like you have severe disability to see the colors. You may seek helps from professional assistants for special glasses and contact lenses to fix the color blind. You might also want to understand your condition, inform others, use labeling for colors, utilize technology, consider career choices, collaborate, and communicate with people.";
      document.getElementById("percentage").innerHTML = percen;
      document.getElementById("scorep").value = score;
      document.getElementById("descp").value = "Severe Color Vision Deficiency";
      document.getElementById("percenp").value = percen;
      document.getElementById("descclass").classList.add('w3-red');
      document.getElementById("descclass").classList.remove('w3-black');
    }else if(score > 10 && score<=15){
      document.getElementById("score").innerHTML = score + " out of 20";
      document.getElementById("desc").innerHTML = "Moderate Color Vision";
       document.getElementById("desctext").innerHTML = "It seems like you have moderate color vision and have disability to see some of the colors. You may refer to professional assistants to seek help for adjustment. ";
      document.getElementById("percentage").innerHTML = percen;
      document.getElementById("scorep").value = score ;
      document.getElementById("descp").value = "Moderate Color Vision";
      document.getElementById("percenp").value = percen;
      document.getElementById("descclass").classList.add('w3-blue');
      document.getElementById("descclass").classList.remove('w3-black');
    }
    else if(score > 15 && score<=20){
      document.getElementById("score").innerHTML = score + " out of 20";
      document.getElementById("desc").innerHTML = "Normal Color Vision";
      document.getElementById("desctext").innerHTML = "Congratulations! You have normal color vision and can see colors as normal people do. Enjoy the world!";
      document.getElementById("percentage").innerHTML = percen;
      document.getElementById("scorep").value = score;
      document.getElementById("descp").value = "Normal Color Vision";
      document.getElementById("percenp").value = percen;
      document.getElementById("descclass").classList.add('w3-green');
      document.getElementById("descclass").classList.remove('w3-black');
    }
</script>