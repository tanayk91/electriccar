<?php

//go to next stage
if ($_POST['navigate'] == "NEXT STAGE >>") {
  header('Location: ../7-your_car/final.php');
}

 ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Wheels for the car</title>
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400" rel="stylesheet">
        <link rel="stylesheet" href="css/wheels.css">
        <link rel="stylesheet" href="../../css/main.css">
        <link rel="stylesheet" href="../../css/stages.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    </head>
    <body>
      <div id="navbar">
          <div id="logo-div">
              <img src="../../images/logo_white_small.png" />
              <span id="logo-title">The Climate Shift Project</span>
          </div>
          <div id="login-logout-div">
              <a href="../../index.php" id="login-logout-link">LOGOUT</a>
          </div>
      </div>
        <div id="progress-bar">
            <div id="user-score">
              <?php
                session_start();
                include ("../../db/connection.php");

                //get the total score for the current user
                $total_score_query = "SELECT `total` FROM `ecDB`.`total_score` WHERE `userID` = '{$_SESSION['userID']}'";
                $total_score_result = mysqli_query($link, $total_score_query);

                while ($total_score = mysqli_fetch_object($total_score_result)) {
                  $score = $total_score->total;
                }

                $_SESSION['score'] = $score;

                echo "<span id='score-style'>". $_SESSION['score']."</span>"." points";
              ?>
            </div>
            <div class="switch-stage-dropdown">
                <button class="dropbtn">SWITCH MODULE</button>
                <div class="dropdown-content">
                    <a href="../1-intro/delhi1.php">Pollution in Delhi</a>
                    <a href="../2-materials/body_material1.php">Materials</a>
                    <a href="../3-body_area/body_area.php">Area</a>
                    <a href="../4-batteries/batteries.php">Batteries</a>
                    <a href="../5-motor/motor.php">Motor</a>
                    <a href="../6-wheels/wheels.php">Wheels</a>
                </div>
            </div>
        </div>
        <div id="container">
            <div class="top-bar">
                <h3 class="instruction">Choose a wheel</h3>
                <div class="navigate-div">
                    <form method="post">
                        <input type="submit" id="navigate-link" class="proceed-button" name="navigate" value="NEXT STAGE >>" />
                    </form>
                </div>
                <div id="clear"></div>
            </div>
            <div id="user-options" class="centre-div">
              <?php

                session_start();

                include("../../db/connection.php");

                echo "<button id='18-steel' name='18s' value='18s'>18 inch steel</button>";

                $get_wheels_score_query = "SELECT `total`,`wheels_score` FROM `ecDB`.`total_score` WHERE `userID` = '{$_SESSION['userID']}'";
                $get_wheels_score_result = mysqli_query($link, $get_wheels_score_query);

                while ($get_wheels_score = mysqli_fetch_object($get_wheels_score_result)) {
                  if (($get_wheels_score->wheels_score >= 10) && ($get_wheels_score->wheels_score <= 20)) {
                    echo "<button id='20-steel' name='20s' value='20s'>20 inch steel</button>";
                    echo "<button id='18-alloy' name='18a' value='18a' disabled>18 inch alloy</button>";
                    echo "<button id='20-alloy' name='20a' value='20a' disabled>20 inch alloy</button>";
                    echo "<h4>To unlock the alloy wheels, you need to score 80% or above on the challenge.</h4>";
                  } elseif (($get_wheels_score->wheels_score >= 30) && ($get_wheels_score->wheels_score <= 40)) {
                    echo "<button id='20-steel' name='20s' value='20s'>20 inch steel</button>";
                    echo "<button id='18-alloy' name='18a' value='18a'>18 inch alloy</button>";
                    echo "<button id='20-alloy' name='20a' value='20a' disabled>20 inch alloy</button>";
                    echo "<h4>To unlock the 20 inch alloy wheels, you need a perfect score on this challenge.</h4>";
                  } elseif ($get_wheels_score->wheels_score == 50) {
                    echo "<button id='20-steel' name='20s' value='20s'>20 inch steel</button>";
                    echo "<button id='18-alloy' name='18a' value='18a'>18 inch alloy</button>";
                    echo "<button id='20-alloy' name='20a' value='20a'>20 inch alloy</button>";
                    echo "<h4>Good work! You now have the option to choose from any of the available wheels!</h4>";
                  } else {
                    echo "<button id='20-steel' name='20s' value='20s' disabled>20 inch steel</button>";
                    echo "<button id='18-alloy' name='18a' value='18a' disabled>18 inch alloy</button>";
                    echo "<button id='20-alloy' name='20a' value='20a' disabled>20 inch alloy</button>";
                    echo "<h4>To unlock the remaining wheels, you need to complete this challenge.</h4>";
                  }
                }
              ?>
            </div>
            <br><br><br>
            <div class="centre-div">
                <a href="landing.php" class="proceed-link">BEGIN CHALLENGE</a>
            </div>
            <br><br>
            <div id="car-interactive-section" class="centre-div">
                <div id="wheel-image">
                    <img src="images/steel_wheel.gif" id="wheel" />
                </div>
                <div id="car-params">
                    <div id="car-range" class="car-param-box">
                        <div class="display-label">MILEAGE</div>
                        <div class="range-rpm-val" id="range-val">
                            400 km
                        </div>
                    </div>
                    <div id="car-rpm" class="car-param-box">
                        <div class="display-label">RPM</div>
                        <div class="range-rpm-val" id="rpm-val">
                            950
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>

        var clickBtnValue = "";

        /*Make the 80kWh button active by default*/
            $(document).ready(function() {
                //select 80kWh by default
                $('#18-steel').focus();
                $('#18-steel').css("border","1px solid blue");
                clickBtnValue = '18s';
            });

        /*Code to toggle button properties*/
            $('#18-steel').click(function() {
              $('#range-val').html("400 km");
              $('#rpm-val').html("950");
              $('#wheel').attr("src", "images/steel_wheel.gif");

              $(this).css("border","1px solid blue");
              $('#20-steel').css("border","");
              $('#18-alloy').css("border","");
              $('#20-alloy').css("border","");

              //save the value of the button click
              clickBtnValue = $(this).val();
            });

            $('#20-steel').click(function() {
              $('#range-val').html("425 km");
              $('#rpm-val').html("1025");
              $('#wheel').attr("src","images/steel_wheel.gif");

              $(this).css("border","1px solid blue");
              $('#18-steel').css("border","");
              $('#18-alloy').css("border","");
              $('#20-alloy').css("border","");

              //save the value of the button click
              clickBtnValue = $(this).val();
            });

            $('#18-alloy').click(function() {
              $('#range-val').html("440 km");
              $('#rpm-val').html("1125");
              $('#wheel').attr("src","images/alloy_wheel.gif");

              $(this).css("border","1px solid blue");
              $('#18-steel').css("border","");
              $('#20-steel').css("border","");
              $('#20-alloy').css("border","");

              //save the value of the button click
              clickBtnValue = $(this).val();
            });

            $('#20-alloy').click(function() {
              $('#range-val').html("440 km");
              $('#rpm-val').html("1125");
              $('#wheel').attr("src","images/alloy_wheel.gif");

              $(this).css("border","1px solid blue");
              $('#18-steel').css("border","");
              $('#20-steel').css("border","");
              $('#18-alloy').css("border","");

              //save the value of the button click
              clickBtnValue = $(this).val();
            });

            //ajax call to store material selected by user
            $('#navigate-link').click(function() {
              var ajaxurl = 'store_car_detail.php',
              data =  {'action': clickBtnValue};
              $.post(ajaxurl, data);
            });

        </script>
    </body>
</html>
