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
    <title>Bicolor Color Blind Test</title>
    <link rel="icon" href="images/favicon.jpg">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js" type='text/javascript'></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <script>
		var currentQuestion = null;
    var j;
    var nums = [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19];
    var ranNums = []; 
    var i = nums.length;

    function shuffle() {
    
      if(nums.length>0){
        j = Math.floor(Math.random()*nums.length); 
      }else{
        j=100;
      }

        console.log(nums);
        console.log(ranNums);
        console.log(j);
  
 
   return j;

   
}


function getRandomQuestion() {
     shuffle();
			var questions = document.getElementsByClassName("question");
      var randomQuestion = questions[nums[j]];
  

      if(j >=0 && j !=100){
            ranNums.push(nums[j]);
            nums.splice(j,1);
          if (currentQuestion !== null) {
           currentQuestion.style.display = "none";
        }
 
       randomQuestion.style.display = "block";
       currentQuestion = randomQuestion;

      }
      
      if(j==100){
         calculateScore();
      }
      
      var elems = document.getElementsByClassName("num");
        for(var i = 0; i < elems.length; i++) {
            elems[i].innerHTML = "Trial " + ranNums.length;
        }
   

 }

 function calculateScore() {
        var score = 0;
        var q1 = document.querySelector('input[name="q1"]:checked').value;
        var q2 = document.querySelector('input[name="q2"]:checked').value;
        var q3 = document.querySelector('input[name="q3"]:checked').value;
        var q4 = document.querySelector('input[name="q4"]:checked').value;
        var q5 = document.querySelector('input[name="q5"]:checked').value;
        var q6 = document.querySelector('input[name="q6"]:checked').value;
        var q7 = document.querySelector('input[name="q7"]:checked').value;
        var q8 = document.querySelector('input[name="q8"]:checked').value;
        var q9 = document.querySelector('input[name="q9"]:checked').value;
        var q10 = document.querySelector('input[name="q10"]:checked').value;
        var q11 = document.querySelector('input[name="q11"]:checked').value;
        var q12 = document.querySelector('input[name="q12"]:checked').value;
        var q13 = document.querySelector('input[name="q13"]:checked').value;
        var q14 = document.querySelector('input[name="q14"]:checked').value;
        var q15 = document.querySelector('input[name="q15"]:checked').value;
        var q16 = document.querySelector('input[name="q16"]:checked').value;
        var q17 = document.querySelector('input[name="q17"]:checked').value;
        var q18 = document.querySelector('input[name="q18"]:checked').value;
        var q19 = document.querySelector('input[name="q19"]:checked').value;
        var q20 = document.querySelector('input[name="q20"]:checked').value;

        if (q1 ==="1") {
        score++;
        }
        if (q2 === "1") {
        score++;
        }
        if (q3 === "1") {
        score++;
        }
        if (q4 ==="2") {
        score++;
        }
        if (q5 === "2") {
        score++;
        }
        if (q6 === "3") {
        score++;
        }
        if (q7 ==="3") {
        score++;
        }
        if (q8 === "4") {
        score++;
        }
        if (q9 === "4") {
        score++;
        }
        if (q10 ==="5") {
        score++;
        }
        if (q11 === "5") {
        score++;
        }
        if (q12 === "6") {
        score++;
        }
        if (q13 ==="6") {
        score++;
        }
        if (q14 === "6") {
        score++;
        }
        if (q15 === "7") {
        score++;
        }
        if (q16 ==="7") {
        score++;
        }
        if (q17 === "8") {
        score++;
        }
        if (q18 === "8") {
        score++;
        }
        if (q19 ==="9") {
        score++;
        }
        if (q20 === "9") {
        score++;
        }
      
        sessionStorage.setItem("score", score);
        window.location.href = "result.php";
        }
        
     
	</script>

<style>

  body,h1 {
    font-family: "Raleway", sans-serif;

  }

  body, html {height: 100%}

  .bgimg {
    background-image: url('images/testbg.jpg');
    min-height: 100%;
    background-position: center;
    background-size: cover;
    opacity: 0.8;
  }

    form {
	    display: flex;
		flex-direction: row;
		align-items: center;
		justify-content: center;
		width: 1200px;
        height:580px; //550px
		margin: 15px;
		padding: 100px;
		border: 2px solid #ccc;
		border-radius: 10px;
        background: white;
	}
		
	img {
      flex: 0.6;
	    width: 50%;
        margin-right: 30px;
	    border-radius: 10px;
         justify-content: center;
	}

	.options {
      justify-content: space-evenly;
      flex-direction: row;
    
	}

	input[type="radio"] {
      opacity: 0;
     width: 1px;
     height: 1px;
    }

    label {
      display: inline-block;
      width: 100px; 
	    height: 50px;
		margin: 10px;
		background-color: #f2f2f2;
		text-align: center;
		line-height: 50px;
		font-size: 20px;
        color: black;
		border-radius: 5px;
		cursor: pointer;
	}

    label:hover {
      background-color: grey;
    }
    
    /* Responsive layout - makes a one column-layout instead of two-column layout */
    @media (max-width: 800px) {
  form {
    flex-direction: column;
        width:400px;
        height:600px;
		margin: 15px;
		padding: 50px;
  }
  
  img {
	    width: 80%;
	    margin-right: 0;
	}
	
	label {
      display: inline-block;
      width: 75px;
      max-width: 115px; 
	    height: 50px;
		margin: 5px;
		background-color: #f2f2f2;
		text-align: center;
		line-height: 50px;
		font-size: 20px;
        color: black;
		border-radius: 5px;
		cursor: pointer;
	}

}

</style>


</head>
<body>

<div class=" w3-display-container w3-animate-opacity w3-text-white ">
    
  <div class="bgimg">
    </div>
  
    <div class="w3-display-topleft w3-xlarge w3-padding-small">
    <a href="home.php" class="w3-bar-item w3-button">BICOLOR COLOR BLIND TEST</a>
    </div>

    <div class="w3-display-middle">
        <h1 class="w3-xxlarge w3-animate-top w3-center w3-button w3-round w3-padding-large w3-large" onclick="getRandomQuestion() ,style.display = 'none'" >CLICK HERE TO START</h1>
    </div>

    <div class="w3-display-middle">
      
      <div class="d-flex justify-content-center">

      <!-- question 1 -->
        <div id="question1" class="question" style="display:none;">
          <form>
            <!-- exit button -->
          <div class="w3-display-topleft w3-padding-large">
            <span class="w3-text-light-grey">
                <p><a href="home.php" class="w3-button w3-white w3-large w3-margin-top" onclick="return confirm('Are you sure to exit?')">Exit</a></p>
            </span>   
        </div>

          <!-- restart button -->
        <div class="w3-display-topright w3-padding-large">
            <span class="w3-text-light-grey">
                <p><a href="test.php" class="w3-button w3-white w3-large w3-margin-top" onclick="return confirm('Are you sure to restart?')">Restart</a></p>
            </span>   
        </div>

          <!-- trial button -->
        <div class="w3-display-topmiddle w3-padding-large">
            <span class="w3-text-light-grey">
                <p class=" num w3-button w3-white w3-large w3-margin-top"></p>
            </span>   
        </div>
          <img class="w3-image" src="images/1-dark.png"  >
            <div class="options"> 
                
		            <label >
                  <input type="radio" name="q1" value="1" onclick="getRandomQuestion()">1
                </label>
                <label>
                  <input type="radio" name="q1" value="2" onclick="getRandomQuestion()">2
                </label>
                <label >
                  <input type="radio" name="q1" value="3" onclick="getRandomQuestion()">3
                </label>
                <br>

                <label>
                  <input type="radio"  name="q1" value="4" onclick="getRandomQuestion()">4
                </label>
                <label  >
                  <input type="radio"  name="q1" value="5" onclick="getRandomQuestion()">5
                </label>
                <label  >
                  <input type="radio"  name="q1" value="6" onclick="getRandomQuestion()">6
                </label>
                <br>

                <label >
                  <input type="radio"  name="q1" value="7" onclick="getRandomQuestion()">7
                </label>
                <label>
                  <input type="radio"  name="q1" value="8" onclick="getRandomQuestion()">8
                </label>
                <label >
                  <input type="radio"  name="q1" value="9" onclick="getRandomQuestion()">9
                </label>
                <br>
                <label style="width: 160px; margin-right: 15px; ">
                <input type="radio"  name="q1" value="10" onclick="getRandomQuestion()">Not Sure
                </label>
                <label style="width: 160px; ">
                  <input type="radio" name="q1" value="11" onclick="getRandomQuestion()">Skip
                </label>
                <br>
            </div>
          </form>  
        </div>


          <!-- question 2 -->
          <div id="question2" class="question" style="display:none;">
          <form>
            <!-- exit button -->
          <div class="w3-display-topleft w3-padding-large">
            <span class="w3-text-light-grey">
                <p><a href="home.php" class="w3-button w3-white w3-large w3-margin-top" onclick="return confirm('Are you sure to exit?')">Exit</a></p>
            </span>   
        </div>

          <!-- restart button -->
        <div class="w3-display-topright w3-padding-large">
            <span class="w3-text-light-grey">
                <p><a href="test.php" class="w3-button w3-white w3-large w3-margin-top" onclick="return confirm('Are you sure to restart?')">Restart</a></p>
            </span>   
        </div>

          <!-- trial button -->
        <div class="w3-display-topmiddle w3-padding-large">
            <span class="w3-text-light-grey">
                <p class=" num w3-button w3-white w3-large w3-margin-top"></p>
            </span>   
        </div>
          <img class="w3-image" src="images/1-light.png"  >
            <div class="options"> 
                
		            <label >
                  <input type="radio"  name="q2" value="1" onclick="getRandomQuestion()">1
                </label>
                <label >
                  <input type="radio"  name="q2" value="2" onclick="getRandomQuestion()">2
                </label>
                <label  >
                  <input type="radio"  name="q2" value="3" onclick="getRandomQuestion()">3
                </label>
                <br>

                <label>
                  <input type="radio"  name="q2" value="4" onclick="getRandomQuestion()">4
                </label>
                <label >
                  <input type="radio"  name="q2" value="5" onclick="getRandomQuestion()">5
                </label>
                <label >
                  <input type="radio"  name="q2" value="6" onclick="getRandomQuestion()">6
                </label>
                <br>

                <label >
                  <input type="radio"  name="q2" value="7" onclick="getRandomQuestion()">7
                </label>
                <label >
                  <input type="radio"  name="q2" value="8" onclick="getRandomQuestion()">8
                </label>
                <label>
                  <input type="radio"  name="q2" value="9" onclick="getRandomQuestion()">9
                </label>
                <br>

                <label style="width: 160px; margin-right: 15px; ">
                <input type="radio"  name="q2" value="10" onclick="getRandomQuestion()">Not Sure
                </label>
                <label style="width: 160px; ">
                  <input type="radio" name="q2" value="11" onclick="getRandomQuestion()">Skip
                </label>
                <br>
            </div>
          </form>  
        </div>


         <!-- question 3 -->
         <div id="question3" class="question" style="display:none;">
          <form>
            <!-- exit button -->
          <div class="w3-display-topleft w3-padding-large">
            <span class="w3-text-light-grey">
                <p><a href="home.php" class="w3-button w3-white w3-large w3-margin-top" onclick="return confirm('Are you sure to exit?')">Exit</a></p>
            </span>   
        </div>

          <!-- restart button -->
        <div class="w3-display-topright w3-padding-large">
            <span class="w3-text-light-grey">
                <p><a href="test.php" class="w3-button w3-white w3-large w3-margin-top" onclick="return confirm('Are you sure to restart?')">Restart</a></p>
            </span>   
        </div>

          <!-- trial button -->
        <div class="w3-display-topmiddle w3-padding-large">
            <span class="w3-text-light-grey">
                <p class="num w3-button w3-white w3-large w3-margin-top"></p>
            </span>   
        </div>
          <img class="w3-image" src="images/1-light2.png"  >
            <div class="options"> 
                
		            <label>
                  <input type="radio"  name="q3" value="1" onclick="getRandomQuestion()">1
                </label>
                <label >
                  <input type="radio"  name="q3" value="2" onclick="getRandomQuestion()">2
                </label>
                <label  >
                  <input type="radio"  name="q3" value="3" onclick="getRandomQuestion()">3
                </label>
                <br>

                <label>
                  <input type="radio"  name="q3" value="4" onclick="getRandomQuestion()">4
                </label>
                <label  >
                  <input type="radio"  name="q3" value="5" onclick="getRandomQuestion()">5
                </label>
                <label  >
                  <input type="radio"  name="q3" value="6" onclick="getRandomQuestion()">6
                </label>
                <br>

                <label >
                  <input type="radio"  name="q3" value="7" onclick="getRandomQuestion()">7
                </label>
                <label >
                  <input type="radio"  name="q3" value="8" onclick="getRandomQuestion()">8
                </label>
                <label >
                  <input type="radio"  name="q3" value="9" onclick="getRandomQuestion()">9
                </label>
                <br>

                <label style="width: 160px; margin-right: 15px; ">
                <input type="radio"  name="q3" value="10" onclick="getRandomQuestion()">Not Sure
                </label>
                <label style="width: 160px; ">
                  <input type="radio" name="q3" value="11" onclick="getRandomQuestion()">Skip
                </label>
                <br>
            </div>
          </form>  
        </div>


        <!-- question 4 -->
        <div id="question4" class="question" style="display:none;">
          <form>
            <!-- exit button -->
          <div class="w3-display-topleft w3-padding-large">
            <span class="w3-text-light-grey">
                <p><a href="home.php" class="w3-button w3-white w3-large w3-margin-top" onclick="return confirm('Are you sure to exit?')">Exit</a></p>
            </span>   
        </div>

          <!-- restart button -->
        <div class="w3-display-topright w3-padding-large">
            <span class="w3-text-light-grey">
                <p><a href="test.php" class="w3-button w3-white w3-large w3-margin-top" onclick="return confirm('Are you sure to restart?')">Restart</a></p>
            </span>   
        </div>

          <!-- trial button -->
        <div class="w3-display-topmiddle w3-padding-large">
            <span class="w3-text-light-grey">
                <p class="num w3-button w3-white w3-large w3-margin-top"></p>
            </span>   
        </div>
          <img class="w3-image" src="images/2.1.png"  >
            <div class="options"> 
                
		            <label>
                  <input type="radio"  name="q4" value="1" onclick="getRandomQuestion()">1
                </label>
                <label >
                  <input type="radio"  name="q4" value="2" onclick="getRandomQuestion()">2
                </label>
                <label  >
                  <input type="radio"  name="q4" value="3" onclick="getRandomQuestion()">3
                </label>
                <br>

                <label>
                  <input type="radio"  name="q4" value="4" onclick="getRandomQuestion()">4
                </label>
                <label  >
                  <input type="radio"  name="q4" value="5" onclick="getRandomQuestion()">5
                </label>
                <label  >
                  <input type="radio"  name="q4" value="6" onclick="getRandomQuestion()">6
                </label>
                <br>

                <label >
                  <input type="radio"  name="q4" value="7" onclick="getRandomQuestion()">7
                </label>
                <label >
                  <input type="radio"  name="q4" value="8" onclick="getRandomQuestion()">8
                </label>
                <label >
                  <input type="radio"  name="q4" value="9" onclick="getRandomQuestion()">9
                </label>
                <br>

                <label style="width: 160px; margin-right: 15px; ">
                <input type="radio"  name="q4" value="10" onclick="getRandomQuestion()">Not Sure
                </label>
                <label style="width: 160px; ">
                  <input type="radio" name="q4" value="11" onclick="getRandomQuestion()">Skip
                </label>
                <br>
            </div>
          </form>  
        </div>


         <!-- question5 -->
         <div id="question5" class="question" style="display:none;">
          <form>
            <!-- exit button -->
          <div class="w3-display-topleft w3-padding-large">
            <span class="w3-text-light-grey">
                <p><a href="home.php" class="w3-button w3-white w3-large w3-margin-top" onclick="return confirm('Are you sure to exit?')">Exit</a></p>
            </span>   
        </div>

          <!-- restart button -->
        <div class="w3-display-topright w3-padding-large">
            <span class="w3-text-light-grey">
                <p><a href="test.php" class="w3-button w3-white w3-large w3-margin-top" onclick="return confirm('Are you sure to restart?')">Restart</a></p>
            </span>   
        </div>

          <!-- trial button -->
        <div class="w3-display-topmiddle w3-padding-large">
            <span class="w3-text-light-grey">
                <p class="num w3-button w3-white w3-large w3-margin-top"></p>
            </span>   
        </div>
          <img class="w3-image" src="images/2-light.png"  >
            <div class="options"> 
                
		            <label>
                  <input type="radio"  name="q5" value="1" onclick="getRandomQuestion()">1
                </label>
                <label >
                  <input type="radio"  name="q5" value="2" onclick="getRandomQuestion()">2
                </label>
                <label  >
                  <input type="radio"  name="q5" value="3" onclick="getRandomQuestion()">3
                </label>
                <br>

                <label>
                  <input type="radio"  name="q5" value="4" onclick="getRandomQuestion()">4
                </label>
                <label  >
                  <input type="radio"  name="q5" value="5" onclick="getRandomQuestion()">5
                </label>
                <label  >
                  <input type="radio"  name="q5" value="6" onclick="getRandomQuestion()">6
                </label>
                <br>

                <label >
                  <input type="radio"  name="q5" value="7" onclick="getRandomQuestion()">7
                </label>
                <label >
                  <input type="radio"  name="q5" value="8" onclick="getRandomQuestion()">8
                </label>
                <label >
                  <input type="radio"  name="q5" value="9" onclick="getRandomQuestion()">9
                </label>
                <br>

                <label style="width: 160px; margin-right: 15px; ">
                <input type="radio"  name="q5" value="10" onclick="getRandomQuestion()">Not Sure
                </label>
                <label style="width: 160px; ">
                  <input type="radio" name="q5" value="11" onclick="getRandomQuestion()">Skip
                </label>
                <br>
            </div>
          </form>  
        </div>

         <!-- question 6 -->
         <div id="question6" class="question" style="display:none;">
          <form>
            <!-- exit button -->
          <div class="w3-display-topleft w3-padding-large">
            <span class="w3-text-light-grey">
                <p><a href="home.php" class="w3-button w3-white w3-large w3-margin-top" onclick="return confirm('Are you sure to exit?')">Exit</a></p>
            </span>   
        </div>

          <!-- restart button -->
        <div class="w3-display-topright w3-padding-large">
            <span class="w3-text-light-grey">
                <p><a href="test.php" class="w3-button w3-white w3-large w3-margin-top" onclick="return confirm('Are you sure to restart?')">Restart</a></p>
            </span>   
        </div>

          <!-- trial button -->
        <div class="w3-display-topmiddle w3-padding-large">
            <span class="w3-text-light-grey">
                <p class="num w3-button w3-white w3-large w3-margin-top"></p>
            </span>   
        </div>
          <img class="w3-image" src="images/3.1.png"  >
            <div class="options"> 
                
		            <label>
                  <input type="radio"  name="q6" value="1" onclick="getRandomQuestion()">1
                </label>
                <label >
                  <input type="radio"  name="q6" value="2" onclick="getRandomQuestion()">2
                </label>
                <label  >
                  <input type="radio"  name="q6" value="3" onclick="getRandomQuestion()">3
                </label>
                <br>

                <label>
                  <input type="radio"  name="q6" value="4" onclick="getRandomQuestion()">4
                </label>
                <label  >
                  <input type="radio"  name="q6" value="5" onclick="getRandomQuestion()">5
                </label>
                <label  >
                  <input type="radio"  name="q6" value="6" onclick="getRandomQuestion()">6
                </label>
                <br>

                <label >
                  <input type="radio"  name="q6" value="7" onclick="getRandomQuestion()">7
                </label>
                <label >
                  <input type="radio"  name="q6" value="8" onclick="getRandomQuestion()">8
                </label>
                <label >
                  <input type="radio"  name="q6" value="9" onclick="getRandomQuestion()">9
                </label>
                <br>

                <label style="width: 160px; margin-right: 15px; ">
                <input type="radio"  name="q6" value="10" onclick="getRandomQuestion()">Not Sure
                </label>
                <label style="width: 160px; ">
                  <input type="radio" name="q6" value="11" onclick="getRandomQuestion()">Skip
                </label>
                <br>
            </div>
          </form>  
        </div>

         <!-- question 7 -->
         <div id="question7" class="question" style="display:none;">
          <form>
            <!-- exit button -->
          <div class="w3-display-topleft w3-padding-large">
            <span class="w3-text-light-grey">
                <p><a href="home.php" class="w3-button w3-white w3-large w3-margin-top" onclick="return confirm('Are you sure to exit?')">Exit</a></p>
            </span>   
        </div>

          <!-- restart button -->
        <div class="w3-display-topright w3-padding-large">
            <span class="w3-text-light-grey">
                <p><a href="test.php" class="w3-button w3-white w3-large w3-margin-top" onclick="return confirm('Are you sure to restart?')">Restart</a></p>
            </span>   
        </div>

          <!-- trial button -->
        <div class="w3-display-topmiddle w3-padding-large">
            <span class="w3-text-light-grey">
                <p class="num w3-button w3-white w3-large w3-margin-top"></p>
            </span>   
        </div>
          <img class="w3-image" src="images/3-light.png"  >
            <div class="options"> 
                
		            <label>
                  <input type="radio"  name="q7" value="1" onclick="getRandomQuestion()">1
                </label>
                <label >
                  <input type="radio"  name="q7" value="2" onclick="getRandomQuestion()">2
                </label>
                <label  >
                  <input type="radio"  name="q7" value="3" onclick="getRandomQuestion()">3
                </label>
                <br>

                <label>
                  <input type="radio"  name="q7" value="4" onclick="getRandomQuestion()">4
                </label>
                <label  >
                  <input type="radio"  name="q7" value="5" onclick="getRandomQuestion()">5
                </label>
                <label  >
                  <input type="radio"  name="q7" value="6" onclick="getRandomQuestion()">6
                </label>
                <br>

                <label >
                  <input type="radio"  name="q7" value="7" onclick="getRandomQuestion()">7
                </label>
                <label >
                  <input type="radio"  name="q7" value="8" onclick="getRandomQuestion()">8
                </label>
                <label >
                  <input type="radio"  name="q7" value="9" onclick="getRandomQuestion()">9
                </label>
                <br>

                <label style="width: 160px; margin-right: 15px; ">
                <input type="radio"  name="q7" value="10" onclick="getRandomQuestion()">Not Sure
                </label>
                <label style="width: 160px; ">
                  <input type="radio" name="q7" value="11" onclick="getRandomQuestion()">Skip
                </label>
                <br>
            </div>
          </form>  
        </div>

         <!-- question 8 -->
         <div id="question8" class="question" style="display:none;">
          <form>
            <!-- exit button -->
          <div class="w3-display-topleft w3-padding-large">
            <span class="w3-text-light-grey">
                <p><a href="home.php" class="w3-button w3-white w3-large w3-margin-top" onclick="return confirm('Are you sure to exit?')">Exit</a></p>
            </span>   
        </div>

          <!-- restart button -->
        <div class="w3-display-topright w3-padding-large">
            <span class="w3-text-light-grey">
                <p><a href="test.php" class="w3-button w3-white w3-large w3-margin-top" onclick="return confirm('Are you sure to restart?')">Restart</a></p>
            </span>   
        </div>

          <!-- trial button -->
        <div class="w3-display-topmiddle w3-padding-large">
            <span class="w3-text-light-grey">
                <p class="num w3-button w3-white w3-large w3-margin-top"></p>
            </span>   
        </div>
          <img class="w3-image" src="images/4-light2.png"  >
            <div class="options"> 
                
		            <label>
                  <input type="radio"  name="q8" value="1" onclick="getRandomQuestion()">1
                </label>
                <label >
                  <input type="radio"  name="q8" value="2" onclick="getRandomQuestion()">2
                </label>
                <label  >
                  <input type="radio"  name="q8" value="3" onclick="getRandomQuestion()">3
                </label>
                <br>

                <label>
                  <input type="radio"  name="q8" value="4" onclick="getRandomQuestion()">4
                </label>
                <label  >
                  <input type="radio"  name="q8" value="5" onclick="getRandomQuestion()">5
                </label>
                <label  >
                  <input type="radio"  name="q8" value="6" onclick="getRandomQuestion()">6
                </label>
                <br>

                <label >
                  <input type="radio"  name="q8" value="7" onclick="getRandomQuestion()">7
                </label>
                <label >
                  <input type="radio"  name="q8" value="8" onclick="getRandomQuestion()">8
                </label>
                <label >
                  <input type="radio"  name="q8" value="9" onclick="getRandomQuestion()">9
                </label>
                <br>

                <label style="width: 160px; margin-right: 15px; ">
                <input type="radio"  name="q8" value="10" onclick="getRandomQuestion()">Not Sure
                </label>
                <label style="width: 160px; ">
                  <input type="radio" name="q8" value="11" onclick="getRandomQuestion()">Skip
                </label>
                <br>
            </div>
          </form>  
        </div>

         <!-- question 9 -->
         <div id="question9" class="question" style="display:none;">
          <form>
            <!-- exit button -->
          <div class="w3-display-topleft w3-padding-large">
            <span class="w3-text-light-grey">
                <p><a href="home.php" class="w3-button w3-white w3-large w3-margin-top" onclick="return confirm('Are you sure to exit?')">Exit</a></p>
            </span>   
        </div>

          <!-- restart button -->
        <div class="w3-display-topright w3-padding-large">
            <span class="w3-text-light-grey">
                <p><a href="test.php" class="w3-button w3-white w3-large w3-margin-top" onclick="return confirm('Are you sure to restart?')">Restart</a></p>
            </span>   
        </div>

          <!-- trial button -->
        <div class="w3-display-topmiddle w3-padding-large">
            <span class="w3-text-light-grey">
                <p class="num w3-button w3-white w3-large w3-margin-top"></p>
            </span>   
        </div>
          <img class="w3-image" src="images/4-med2.png"  >
            <div class="options"> 
                
		            <label>
                  <input type="radio"  name="q9" value="1" onclick="getRandomQuestion()">1
                </label>
                <label >
                  <input type="radio"  name="q9" value="2" onclick="getRandomQuestion()">2
                </label>
                <label  >
                  <input type="radio"  name="q9" value="3" onclick="getRandomQuestion()">3
                </label>
                <br>

                <label>
                  <input type="radio"  name="q9" value="4" onclick="getRandomQuestion()">4
                </label>
                <label  >
                  <input type="radio"  name="q9" value="5" onclick="getRandomQuestion()">5
                </label>
                <label  >
                  <input type="radio"  name="q9" value="6" onclick="getRandomQuestion()">6
                </label>
                <br>

                <label >
                  <input type="radio"  name="q9" value="7" onclick="getRandomQuestion()">7
                </label>
                <label >
                  <input type="radio"  name="q9" value="8" onclick="getRandomQuestion()">8
                </label>
                <label >
                  <input type="radio"  name="q9" value="9" onclick="getRandomQuestion()">9
                </label>
                <br>

                <label style="width: 160px; margin-right: 15px; ">
                <input type="radio"  name="q9" value="10" onclick="getRandomQuestion()">Not Sure
                </label>
                <label style="width: 160px; ">
                  <input type="radio" name="q9" value="11" onclick="getRandomQuestion()">Skip
                </label>
                <br>
            </div>
          </form>  
        </div>

         <!-- question 10 -->
         <div id="question10" class="question" style="display:none;">
          <form>
            <!-- exit button -->
          <div class="w3-display-topleft w3-padding-large">
            <span class="w3-text-light-grey">
                <p><a href="home.php" class="w3-button w3-white w3-large w3-margin-top" onclick="return confirm('Are you sure to exit?')">Exit</a></p>
            </span>   
        </div>

          <!-- restart button -->
        <div class="w3-display-topright w3-padding-large">
            <span class="w3-text-light-grey">
                <p><a href="test.php" class="w3-button w3-white w3-large w3-margin-top" onclick="return confirm('Are you sure to restart?')">Restart</a></p>
            </span>   
        </div>

          <!-- trial button -->
        <div class="w3-display-topmiddle w3-padding-large">
            <span class="w3-text-light-grey">
                <p class="num w3-button w3-white w3-large w3-margin-top"></p>
            </span>   
        </div>
          <img class="w3-image" src="images/5.png"  >
            <div class="options"> 
                
		            <label>
                  <input type="radio"  name="q10" value="1" onclick="getRandomQuestion()">1
                </label>
                <label >
                  <input type="radio"  name="q10" value="2" onclick="getRandomQuestion()">2
                </label>
                <label  >
                  <input type="radio"  name="q10" value="3" onclick="getRandomQuestion()">3
                </label>
                <br>

                <label>
                  <input type="radio"  name="q10" value="4" onclick="getRandomQuestion()">4
                </label>
                <label  >
                  <input type="radio"  name="q10" value="5" onclick="getRandomQuestion()">5
                </label>
                <label  >
                  <input type="radio"  name="q10" value="6" onclick="getRandomQuestion()">6
                </label>
                <br>

                <label >
                  <input type="radio"  name="q10" value="7" onclick="getRandomQuestion()">7
                </label>
                <label >
                  <input type="radio"  name="q10" value="8" onclick="getRandomQuestion()">8
                </label>
                <label >
                  <input type="radio"  name="q10" value="9" onclick="getRandomQuestion()">9
                </label>
                <br>

                <label style="width: 160px; margin-right: 15px; ">
                <input type="radio"  name="q10" value="10" onclick="getRandomQuestion()">Not Sure
                </label>
                <label style="width: 160px; ">
                  <input type="radio" name="q10" value="11" onclick="getRandomQuestion()">Skip
                </label>
                <br>
            </div>
          </form>  
        </div>


         <!-- question 11 -->
         <div id="question11" class="question" style="display:none;">
          <form>
            <!-- exit button -->
          <div class="w3-display-topleft w3-padding-large">
            <span class="w3-text-light-grey">
                <p><a href="home.php" class="w3-button w3-white w3-large w3-margin-top" onclick="return confirm('Are you sure to exit?')">Exit</a></p>
            </span>   
        </div>

          <!-- restart button -->
        <div class="w3-display-topright w3-padding-large">
            <span class="w3-text-light-grey">
                <p><a href="test.php" class="w3-button w3-white w3-large w3-margin-top" onclick="return confirm('Are you sure to restart?')">Restart</a></p>
            </span>   
        </div>

          <!-- trial button -->
        <div class="w3-display-topmiddle w3-padding-large">
            <span class="w3-text-light-grey">
                <p class="num w3-button w3-white w3-large w3-margin-top"></p>
            </span>   
        </div>
          <img class="w3-image" src="images/5-light.png"  >
            <div class="options"> 
                
		            <label>
                  <input type="radio"  name="q11" value="1" onclick="getRandomQuestion()">1
                </label>
                <label >
                  <input type="radio"  name="q11" value="2" onclick="getRandomQuestion()">2
                </label>
                <label  >
                  <input type="radio"  name="q11" value="3" onclick="getRandomQuestion()">3
                </label>
                <br>

                <label>
                  <input type="radio"  name="q11" value="4" onclick="getRandomQuestion()">4
                </label>
                <label  >
                  <input type="radio"  name="q11" value="5" onclick="getRandomQuestion()">5
                </label>
                <label  >
                  <input type="radio"  name="q11" value="6" onclick="getRandomQuestion()">6
                </label>
                <br>

                <label >
                  <input type="radio"  name="q11" value="7" onclick="getRandomQuestion()">7
                </label>
                <label >
                  <input type="radio"  name="q11" value="8" onclick="getRandomQuestion()">8
                </label>
                <label >
                  <input type="radio"  name="q11" value="9" onclick="getRandomQuestion()">9
                </label>
                <br>

                <label style="width: 160px; margin-right: 15px; ">
                <input type="radio"  name="q11" value="10" onclick="getRandomQuestion()">Not Sure
                </label>
                <label style="width: 160px; ">
                  <input type="radio" name="q11" value="11" onclick="getRandomQuestion()">Skip
                </label>
                <br>
            </div>
          </form>  
        </div>

         <!-- question 12 -->
         <div id="question12" class="question" style="display:none;">
          <form>
            <!-- exit button -->
          <div class="w3-display-topleft w3-padding-large">
            <span class="w3-text-light-grey">
                <p><a href="home.php" class="w3-button w3-white w3-large w3-margin-top" onclick="return confirm('Are you sure to exit?')">Exit</a></p>
            </span>   
        </div>

          <!-- restart button -->
        <div class="w3-display-topright w3-padding-large">
            <span class="w3-text-light-grey">
                <p><a href="test.php" class="w3-button w3-white w3-large w3-margin-top" onclick="return confirm('Are you sure to restart?')">Restart</a></p>
            </span>   
        </div>

          <!-- trial button -->
        <div class="w3-display-topmiddle w3-padding-large">
            <span class="w3-text-light-grey">
                <p class="num w3-button w3-white w3-large w3-margin-top"></p>
            </span>   
        </div>
          <img class="w3-image" src="images/6.png"  >
            <div class="options"> 
                
		            <label>
                  <input type="radio"  name="q12" value="1" onclick="getRandomQuestion()">1
                </label>
                <label >
                  <input type="radio"  name="q12" value="2" onclick="getRandomQuestion()">2
                </label>
                <label  >
                  <input type="radio"  name="q12" value="3" onclick="getRandomQuestion()">3
                </label>
                <br>

                <label>
                  <input type="radio"  name="q12" value="4" onclick="getRandomQuestion()">4
                </label>
                <label  >
                  <input type="radio"  name="q12" value="5" onclick="getRandomQuestion()">5
                </label>
                <label  >
                  <input type="radio"  name="q12" value="6" onclick="getRandomQuestion()">6
                </label>
                <br>

                <label >
                  <input type="radio"  name="q12" value="7" onclick="getRandomQuestion()">7
                </label>
                <label >
                  <input type="radio"  name="q12" value="8" onclick="getRandomQuestion()">8
                </label>
                <label >
                  <input type="radio"  name="q12" value="9" onclick="getRandomQuestion()">9
                </label>
                <br>

                <label style="width: 160px; margin-right: 15px; ">
                <input type="radio"  name="q12" value="10" onclick="getRandomQuestion()">Not Sure
                </label>
                <label style="width: 160px; ">
                  <input type="radio" name="q12" value="11" onclick="getRandomQuestion()">Skip
                </label>
                <br>
            </div>
          </form>  
        </div>


         <!-- question 13 -->
         <div id="question13" class="question" style="display:none;">
          <form>
            <!-- exit button -->
          <div class="w3-display-topleft w3-padding-large">
            <span class="w3-text-light-grey">
                <p><a href="home.php" class="w3-button w3-white w3-large w3-margin-top" onclick="return confirm('Are you sure to exit?')">Exit</a></p>
            </span>   
        </div>

          <!-- restart button -->
        <div class="w3-display-topright w3-padding-large">
            <span class="w3-text-light-grey">
                <p><a href="test.php" class="w3-button w3-white w3-large w3-margin-top" onclick="return confirm('Are you sure to restart?')">Restart</a></p>
            </span>   
        </div>

          <!-- trial button -->
        <div class="w3-display-topmiddle w3-padding-large">
            <span class="w3-text-light-grey">
                <p class="num w3-button w3-white w3-large w3-margin-top"></p>
            </span>   
        </div>
          <img class="w3-image" src="images/6-light.png"  >
            <div class="options"> 
                
		            <label>
                  <input type="radio"  name="q13" value="1" onclick="getRandomQuestion()">1
                </label>
                <label >
                  <input type="radio"  name="q13" value="2" onclick="getRandomQuestion()">2
                </label>
                <label  >
                  <input type="radio"  name="q13" value="3" onclick="getRandomQuestion()">3
                </label>
                <br>

                <label>
                  <input type="radio"  name="q13" value="4" onclick="getRandomQuestion()">4
                </label>
                <label  >
                  <input type="radio"  name="q13" value="5" onclick="getRandomQuestion()">5
                </label>
                <label  >
                  <input type="radio"  name="q13" value="6" onclick="getRandomQuestion()">6
                </label>
                <br>

                <label >
                  <input type="radio"  name="q13" value="7" onclick="getRandomQuestion()">7
                </label>
                <label >
                  <input type="radio"  name="q13" value="8" onclick="getRandomQuestion()">8
                </label>
                <label >
                  <input type="radio"  name="q13" value="9" onclick="getRandomQuestion()">9
                </label>
                <br>

                <label style="width: 160px; margin-right: 15px; ">
                <input type="radio"  name="q13" value="10" onclick="getRandomQuestion()">Not Sure
                </label>
                <label style="width: 160px; ">
                  <input type="radio" name="q13" value="11" onclick="getRandomQuestion()">Skip
                </label>
                <br>
            </div>
          </form>  
        </div>


         <!-- question 14 -->
         <div id="question14" class="question" style="display:none;">
          <form>
            <!-- exit button -->
          <div class="w3-display-topleft w3-padding-large">
            <span class="w3-text-light-grey">
                <p><a href="home.php" class="w3-button w3-white w3-large w3-margin-top" onclick="return confirm('Are you sure to exit?')">Exit</a></p>
            </span>   
        </div>

          <!-- restart button -->
        <div class="w3-display-topright w3-padding-large">
            <span class="w3-text-light-grey">
                <p><a href="test.php" class="w3-button w3-white w3-large w3-margin-top" onclick="return confirm('Are you sure to restart?')">Restart</a></p>
            </span>   
        </div>

          <!-- trial button -->
        <div class="w3-display-topmiddle w3-padding-large">
            <span class="w3-text-light-grey">
                <p class="num w3-button w3-white w3-large w3-margin-top"></p>
            </span>   
        </div>
          <img class="w3-image" src="images/6-light2.png"  >
            <div class="options"> 
                
		            <label>
                  <input type="radio"  name="q14" value="1" onclick="getRandomQuestion()">1
                </label>
                <label >
                  <input type="radio"  name="q14" value="2" onclick="getRandomQuestion()">2
                </label>
                <label  >
                  <input type="radio"  name="q14" value="3" onclick="getRandomQuestion()">3
                </label>
                <br>

                <label>
                  <input type="radio"  name="q14" value="4" onclick="getRandomQuestion()">4
                </label>
                <label  >
                  <input type="radio"  name="q14" value="5" onclick="getRandomQuestion()">5
                </label>
                <label  >
                  <input type="radio"  name="q14" value="6" onclick="getRandomQuestion()">6
                </label>
                <br>

                <label >
                  <input type="radio"  name="q14" value="7" onclick="getRandomQuestion()">7
                </label>
                <label >
                  <input type="radio"  name="q14" value="8" onclick="getRandomQuestion()">8
                </label>
                <label >
                  <input type="radio"  name="q14" value="9" onclick="getRandomQuestion()">9
                </label>
                <br>

                <label style="width: 160px; margin-right: 15px; ">
                <input type="radio"  name="q14" value="10" onclick="getRandomQuestion()">Not Sure
                </label>
                <label style="width: 160px; ">
                  <input type="radio" name="q14" value="11" onclick="getRandomQuestion()">Skip
                </label>
                <br>
            </div>
          </form>  
        </div>

         <!-- question 15 -->
         <div id="question15" class="question" style="display:none;">
          <form>
            <!-- exit button -->
          <div class="w3-display-topleft w3-padding-large">
            <span class="w3-text-light-grey">
                <p><a href="home.php" class="w3-button w3-white w3-large w3-margin-top" onclick="return confirm('Are you sure to exit?')">Exit</a></p>
            </span>   
        </div>

          <!-- restart button -->
        <div class="w3-display-topright w3-padding-large">
            <span class="w3-text-light-grey">
                <p><a href="test.php" class="w3-button w3-white w3-large w3-margin-top" onclick="return confirm('Are you sure to restart?')">Restart</a></p>
            </span>   
        </div>

          <!-- trial button -->
        <div class="w3-display-topmiddle w3-padding-large">
            <span class="w3-text-light-grey">
                <p class="num w3-button w3-white w3-large w3-margin-top"></p>
            </span>   
        </div>
          <img class="w3-image" src="images/7-light.png"  >
            <div class="options"> 
                
		            <label>
                  <input type="radio"  name="q15" value="1" onclick="getRandomQuestion()">1
                </label>
                <label >
                  <input type="radio"  name="q15" value="2" onclick="getRandomQuestion()">2
                </label>
                <label  >
                  <input type="radio"  name="q15" value="3" onclick="getRandomQuestion()">3
                </label>
                <br>

                <label>
                  <input type="radio"  name="q15" value="4" onclick="getRandomQuestion()">4
                </label>
                <label  >
                  <input type="radio"  name="q15" value="5" onclick="getRandomQuestion()">5
                </label>
                <label  >
                  <input type="radio"  name="q15" value="6" onclick="getRandomQuestion()">6
                </label>
                <br>

                <label >
                  <input type="radio"  name="q15" value="7" onclick="getRandomQuestion()">7
                </label>
                <label >
                  <input type="radio"  name="q15" value="8" onclick="getRandomQuestion()">8
                </label>
                <label >
                  <input type="radio"  name="q15" value="9" onclick="getRandomQuestion()">9
                </label>
                <br>

                <label style="width: 160px; margin-right: 15px; ">
                <input type="radio"  name="q15" value="10" onclick="getRandomQuestion()">Not Sure
                </label>
                <label style="width: 160px; ">
                  <input type="radio" name="q15" value="11" onclick="getRandomQuestion()">Skip
                </label>
                <br>
            </div>
          </form>  
        </div>

         <!-- question 16 -->
         <div id="question16" class="question" style="display:none;">
          <form>
            <!-- exit button -->
          <div class="w3-display-topleft w3-padding-large">
            <span class="w3-text-light-grey">
                <p><a href="home.php" class="w3-button w3-white w3-large w3-margin-top" onclick="return confirm('Are you sure to exit?')">Exit</a></p>
            </span>   
        </div>

          <!-- restart button -->
        <div class="w3-display-topright w3-padding-large">
            <span class="w3-text-light-grey">
                <p><a href="test.php" class="w3-button w3-white w3-large w3-margin-top" onclick="return confirm('Are you sure to restart?')">Restart</a></p>
            </span>   
        </div>

          <!-- trial button -->
        <div class="w3-display-topmiddle w3-padding-large">
            <span class="w3-text-light-grey">
                <p class="num w3-button w3-white w3-large w3-margin-top"></p>
            </span>   
        </div>
          <img class="w3-image" src="images/7-med.png"  >
            <div class="options"> 
                
		            <label>
                  <input type="radio"  name="q16" value="1" onclick="getRandomQuestion()">1
                </label>
                <label >
                  <input type="radio"  name="q16" value="2" onclick="getRandomQuestion()">2
                </label>
                <label  >
                  <input type="radio"  name="q16" value="3" onclick="getRandomQuestion()">3
                </label>
                <br>

                <label>
                  <input type="radio"  name="q16" value="4" onclick="getRandomQuestion()">4
                </label>
                <label  >
                  <input type="radio"  name="q16" value="5" onclick="getRandomQuestion()">5
                </label>
                <label  >
                  <input type="radio"  name="q16" value="6" onclick="getRandomQuestion()">6
                </label>
                <br>

                <label >
                  <input type="radio"  name="q16" value="7" onclick="getRandomQuestion()">7
                </label>
                <label >
                  <input type="radio"  name="q16" value="8" onclick="getRandomQuestion()">8
                </label>
                <label >
                  <input type="radio"  name="q16" value="9" onclick="getRandomQuestion()">9
                </label>
                <br>

                <label style="width: 160px; margin-right: 15px; ">
                <input type="radio"  name="q16" value="10" onclick="getRandomQuestion()">Not Sure
                </label>
                <label style="width: 160px; ">
                  <input type="radio" name="q16" value="11" onclick="getRandomQuestion()">Skip
                </label>
                <br>
            </div>
          </form>  
        </div>

         <!-- question 17 -->
         <div id="question17" class="question" style="display:none;">
          <form>
            <!-- exit button -->
          <div class="w3-display-topleft w3-padding-large">
            <span class="w3-text-light-grey">
                <p><a href="home.php" class="w3-button w3-white w3-large w3-margin-top" onclick="return confirm('Are you sure to exit?')">Exit</a></p>
            </span>   
        </div>

          <!-- restart button -->
        <div class="w3-display-topright w3-padding-large">
            <span class="w3-text-light-grey">
                <p><a href="test.php" class="w3-button w3-white w3-large w3-margin-top" onclick="return confirm('Are you sure to restart?')">Restart</a></p>
            </span>   
        </div>

          <!-- trial button -->
        <div class="w3-display-topmiddle w3-padding-large">
            <span class="w3-text-light-grey">
                <p class="num w3-button w3-white w3-large w3-margin-top"></p>
            </span>   
        </div>
          <img class="w3-image" src="images/8.1.png"  >
            <div class="options"> 
                
		            <label>
                  <input type="radio"  name="q17" value="1" onclick="getRandomQuestion()">1
                </label>
                <label >
                  <input type="radio"  name="q17" value="2" onclick="getRandomQuestion()">2
                </label>
                <label  >
                  <input type="radio"  name="q17" value="3" onclick="getRandomQuestion()">3
                </label>
                <br>

                <label>
                  <input type="radio"  name="q17" value="4" onclick="getRandomQuestion()">4
                </label>
                <label  >
                  <input type="radio"  name="q17" value="5" onclick="getRandomQuestion()">5
                </label>
                <label  >
                  <input type="radio"  name="q17" value="6" onclick="getRandomQuestion()">6
                </label>
                <br>

                <label >
                  <input type="radio"  name="q17" value="7" onclick="getRandomQuestion()">7
                </label>
                <label >
                  <input type="radio"  name="q17" value="8" onclick="getRandomQuestion()">8
                </label>
                <label >
                  <input type="radio"  name="q17" value="9" onclick="getRandomQuestion()">9
                </label>
                <br>

                <label style="width: 160px; margin-right: 15px; ">
                <input type="radio"  name="q17" value="10" onclick="getRandomQuestion()">Not Sure
                </label>
                <label style="width: 160px; ">
                  <input type="radio" name="q17" value="11" onclick="getRandomQuestion()">Skip
                </label>
                <br>
            </div>
          </form>  
        </div>

         <!-- question 18 -->
         <div id="question18" class="question" style="display:none;">
          <form>
            <!-- exit button -->
          <div class="w3-display-topleft w3-padding-large">
            <span class="w3-text-light-grey">
                <p><a href="home.php" class="w3-button w3-white w3-large w3-margin-top" onclick="return confirm('Are you sure to exit?')">Exit</a></p>
            </span>   
        </div>

          <!-- restart button -->
        <div class="w3-display-topright w3-padding-large">
            <span class="w3-text-light-grey">
                <p><a href="test.php" class="w3-button w3-white w3-large w3-margin-top" onclick="return confirm('Are you sure to restart?')">Restart</a></p>
            </span>   
        </div>

          <!-- trial button -->
        <div class="w3-display-topmiddle w3-padding-large">
            <span class="w3-text-light-grey">
                <p class="num w3-button w3-white w3-large w3-margin-top"></p>
            </span>   
        </div>
          <img class="w3-image" src="images/8-light.png"  >
            <div class="options"> 
                
		            <label>
                  <input type="radio"  name="q18" value="1" onclick="getRandomQuestion()">1
                </label>
                <label >
                  <input type="radio"  name="q18" value="2" onclick="getRandomQuestion()">2
                </label>
                <label  >
                  <input type="radio"  name="q18" value="3" onclick="getRandomQuestion()">3
                </label>
                <br>

                <label>
                  <input type="radio"  name="q18" value="4" onclick="getRandomQuestion()">4
                </label>
                <label  >
                  <input type="radio"  name="q18" value="5" onclick="getRandomQuestion()">5
                </label>
                <label  >
                  <input type="radio"  name="q18" value="6" onclick="getRandomQuestion()">6
                </label>
                <br>

                <label >
                  <input type="radio"  name="q18" value="7" onclick="getRandomQuestion()">7
                </label>
                <label >
                  <input type="radio"  name="q18" value="8" onclick="getRandomQuestion()">8
                </label>
                <label >
                  <input type="radio"  name="q18" value="9" onclick="getRandomQuestion()">9
                </label>
                <br>

                <label style="width: 160px; margin-right: 15px; ">
                <input type="radio"  name="q18" value="10" onclick="getRandomQuestion()">Not Sure
                </label>
                <label style="width: 160px; ">
                  <input type="radio" name="q18" value="11" onclick="getRandomQuestion()">Skip
                </label>
                <br>
            </div>
          </form>  
        </div>

         <!-- question 19 -->
         <div id="question19" class="question" style="display:none;">
          <form>
            <!-- exit button -->
          <div class="w3-display-topleft w3-padding-large">
            <span class="w3-text-light-grey">
                <p><a href="home.php" class="w3-button w3-white w3-large w3-margin-top" onclick="return confirm('Are you sure to exit?')">Exit</a></p>
            </span>   
        </div>

          <!-- restart button -->
        <div class="w3-display-topright w3-padding-large">
            <span class="w3-text-light-grey">
                <p><a href="test.php" class="w3-button w3-white w3-large w3-margin-top" onclick="return confirm('Are you sure to restart?')">Restart</a></p>
            </span>   
        </div>

          <!-- trial button -->
        <div class="w3-display-topmiddle w3-padding-large">
            <span class="w3-text-light-grey">
                <p class="num w3-button w3-white w3-large w3-margin-top"></p>
            </span>   
        </div>
          <img class="w3-image" src="images/9.png"  >
            <div class="options"> 
                
		            <label>
                  <input type="radio"  name="q19" value="1" onclick="getRandomQuestion()">1
                </label>
                <label >
                  <input type="radio"  name="q19" value="2" onclick="getRandomQuestion()">2
                </label>
                <label  >
                  <input type="radio"  name="q19" value="3" onclick="getRandomQuestion()">3
                </label>
                <br>

                <label>
                  <input type="radio"  name="q19" value="4" onclick="getRandomQuestion()">4
                </label>
                <label  >
                  <input type="radio"  name="q19" value="5" onclick="getRandomQuestion()">5
                </label>
                <label  >
                  <input type="radio"  name="q19" value="6" onclick="getRandomQuestion()">6
                </label>
                <br>

                <label >
                  <input type="radio"  name="q19" value="7" onclick="getRandomQuestion()">7
                </label>
                <label >
                  <input type="radio"  name="q19" value="8" onclick="getRandomQuestion()">8
                </label>
                <label >
                  <input type="radio"  name="q19" value="9" onclick="getRandomQuestion()">9
                </label>
                <br>

                <label style="width: 160px; margin-right: 15px; ">
                <input type="radio"  name="q19" value="10" onclick="getRandomQuestion()">Not Sure
                </label>
                <label style="width: 160px; ">
                  <input type="radio" name="q19" value="11" onclick="getRandomQuestion()">Skip
                </label>
                <br>
            </div>
          </form>  
        </div>

         <!-- question 20 -->
         <div id="question20" class="question" style="display:none;">
          <form>
            <!-- exit button -->
          <div class="w3-display-topleft w3-padding-large">
            <span class="w3-text-light-grey">
                <p><a href="home.php" class="w3-button w3-white w3-large w3-margin-top" onclick="return confirm('Are you sure to exit?')">Exit</a></p>
            </span>   
        </div>

          <!-- restart button -->
        <div class="w3-display-topright w3-padding-large">
            <span class="w3-text-light-grey">
                <p><a href="test.php" class="w3-button w3-white w3-large w3-margin-top" onclick="return confirm('Are you sure to restart?')">Restart</a></p>
            </span>   
        </div>

          <!-- trial button -->
        <div class="w3-display-topmiddle w3-padding-large">
            <span class="w3-text-light-grey">
                <p class="num w3-button w3-white w3-large w3-margin-top"></p>
            </span>   
        </div>
          <img class="w3-image" src="images/9-dark.png"  >
            <div class="options"> 
                
		            <label>
                  <input type="radio"  name="q20" value="1" onclick="getRandomQuestion()">1
                </label>
                <label >
                  <input type="radio"  name="q20" value="2" onclick="getRandomQuestion()">2
                </label>
                <label  >
                  <input type="radio"  name="q20" value="3" onclick="getRandomQuestion()">3
                </label>
                <br>

                <label>
                  <input type="radio"  name="q20" value="4" onclick="getRandomQuestion()">4
                </label>
                <label  >
                  <input type="radio"  name="q20" value="5" onclick="getRandomQuestion()">5
                </label>
                <label  >
                  <input type="radio"  name="q20" value="6" onclick="getRandomQuestion()">6
                </label>
                <br>

                <label >
                  <input type="radio"  name="q20" value="7" onclick="getRandomQuestion()">7
                </label>
                <label >
                  <input type="radio"  name="q20" value="8" onclick="getRandomQuestion()">8
                </label>
                <label >
                  <input type="radio"  name="q20" value="9" onclick="getRandomQuestion()">9
                </label>
                <br>

                <label style="width: 160px; margin-right: 15px; ">
                <input type="radio"  name="q20" value="10" onclick="getRandomQuestion()">Not Sure
                </label>
                <label style="width: 160px; ">
                  <input type="radio" name="q20" value="11" onclick="getRandomQuestion()">Skip
                </label>
                <br>
            </div>
          </form>  
        </div>

</div>
<br>
</div>
     <div class="w3-display-bottommiddle ">
          <p style="color: white"> &copy  <strong>BICOLOR COLOR BLIND TEST</strong></p>
      </div>

</body>
</html>