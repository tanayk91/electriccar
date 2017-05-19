<?php

//go to next stage
if ($_POST['navigate'] == "NEXT STAGE >>") {
  header('Location: ../6-wheels/wheels.php');
}

 ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Electric motor for the car</title>
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400" rel="stylesheet">
        <link rel="stylesheet" href="css/motor.css">
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
                <h3 class="instruction">Choose a motor</h3>
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

                echo "<button id='80kWh' name='80kWh' value='80kWh'>80 kWh</button>";

                $get_motor_score_query = "SELECT `total`,`motor_score` FROM `ecDB`.`total_score` WHERE `userID` = '{$_SESSION['userID']}'";
                $get_motor_score_result = mysqli_query($link, $get_motor_score_query);

                while ($get_motor_score = mysqli_fetch_object($get_motor_score_result)) {
                  if (($get_motor_score->motor_score >= 20) && ($get_motor_score->motor_score <= 30)) {
                    echo "<button id='100kWh' name='100kWh' value='100kWh'>100 kWh</button>";
                    echo "<button id='120kWh' name='120kWh' value='120kWh' disabled>120 kWh</button>";
                    echo "<h4>To unlock the 120 kWh motor, you need to score 80% or above on the challenge.</h4>";
                  } elseif ($get_motor_score->motor_score >= 40) {
                    echo "<button id='100kWh' name='100kWh' value='100kWh'>100 kWh</button>";
                    echo "<button id='120kWh' name='120kWh' value='120kWh'>120 kWh</button>";
                    echo "<h4>Great! You've got the best performance motor in your arsenal!</h4>";
                  } else {
                    echo "<button id='100kWh' name='100kWh' value='100kWh' disabled>100 kWh</button>";
                    echo "<button id='120kWh' name='120kWh' value='120kWh' disabled>120 kWh</button>";
                    echo "<h4>To unlock the 100 kWh motor or the 120 kWh motor, you need to get at least 2 questions right on the challenge.</h4>";
                  }
                }
              ?>
            </div>
            <br><br>
            <div class="centre-div">
                <a href="landing.php" class="proceed-link">BEGIN CHALLENGE</a>
            </div>
            <br><br><br>
            <div id="car-interactive-section" class="centre-div">
                <div id="motor-image">
                    <img src="images/electric_motor.gif" id="motor" />
                </div>
                <div id="car-params">
                    <div id="car-speed" class="car-param-box">
                        <div id="speed-label"><span>50</span> km/h</div>
                        <div id="adjust-speed">
                            <img src="images/up_arrow.gif" id="up" />
                            <img src="images/down_arrow.gif" id="down" />
                        </div>
                    </div>
                    <div id="car-range" class="car-param-box">
                        <div class="display-label">MILEAGE</div>
                        <div class="range-rpm-val" id="range-val">
                            400 km
                        </div>
                    </div>
                    <div id="motor-rpm" class="car-param-box">
                        <div class="display-label">RPM</div>
                        <div class="range-rpm-val" id="rpm-val">
                            950
                        </div>
                    </div>
                </div>
            </div>
            <div id="motor-details-section" class="centre-div">
                <div id="motor-specs">
                    <div id="bat-range" class="motor-specs-box">
                        <div class="specs-heading">Battery and Mileage</div>
                        <hr>
                        <div class="specs-desc">
                            <p id="spec-batt">80 kWh battery</p>
                            <p id="spec-range">400 kilometers on a single charge at average speed</p>
                        </div>
                    </div>
                    <div id="speed-accel" class="motor-specs-box">
                        <div class="specs-heading">Top Speed and Acceleration</div>
                        <hr>
                        <div class="specs-desc">
                            <p id="spec-speed">200 km/h top speed</p>
                            <p id="spec-accel">5.2 seconds 0-100 km/h</p>
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
                $('#80kWh').focus();
                $('#80kWh').css("border","1px solid blue");
                clickBtnValue = '80kWh';
            });

        /*Code to toggle button properties*/
            $('#80kWh').click(function() {
              $('#range-val').html("400 km");
              $('#rpm-val').html("950");
              $('#spec-batt').html("80 kWh battery");
              $('#spec-range').html("400 kilometers on a single charge at average speed");
              $('#spec-speed').html("200 km/h top speed");
              $('#spec-accel').html("5.2 seconds 0-100 km/h");
              $(this).css("border","1px solid blue");
              $('#100kWh').css("border","");
              $('#120kWh').css("border","");

              //save the value of the button click
              clickBtnValue = $(this).val();
            });

            $('#100kWh').click(function() {
              $('#range-val').html("425 km");
              $('#rpm-val').html("1025");
              $('#spec-batt').html("100 kWh battery");
              $('#spec-range').html("425 kilometers on a single charge at average speed");
              $('#spec-speed').html("220 km/h top speed");
              $('#spec-accel').html("5.0 seconds 0-100 km/h");
              $(this).css("border","1px solid blue");
              $('#80kWh').css("border","");
              $('#120kWh').css("border","");

              //save the value of the button click
              clickBtnValue = $(this).val();
            });

            $('#120kWh').click(function() {
              $('#range-val').html("440 km");
              $('#rpm-val').html("1125");
              $('#spec-batt').html("120 kWh battery");
              $('#spec-range').html("440 kilometers on a single charge at average speed");
              $('#spec-speed').html("235 km/h top speed");
              $('#spec-accel').html("4.7 seconds 0-100 km/h");
              $(this).css("border","1px solid blue");
              $('#80kWh').css("border","");
              $('#100kWh').css("border","");

              //save the value of the button click
              clickBtnValue = $(this).val();
            });

            //ajax call to store material selected by user
            $('#navigate-link').click(function() {
              var ajaxurl = 'store_car_detail.php',
              data =  {'action': clickBtnValue};
              $.post(ajaxurl, data);
            });

            //Increment/decrement speed value
            $("#up").on('click',function(){
              var current_speed = parseInt($("#speed-label span").html());
              var current_range = parseInt($("#range-val").html());

              var incr_speed = current_speed + 5;
              var new_range_decimal = current_range - 30;
              var new_range = Math.round(new_range_decimal);

              if (incr_speed == 100) {
                $("#up").prop("onclick", false);
              } else {
                $("#speed-label span").html(incr_speed);
                $("#range-val").html(new_range);

              }

            });

            $("#down").on('click',function(){
              var current_speed_decimal = parseInt($("#speed-label span").html());
              var current_speed = Math.round(current_speed_decimal);
              var current_range = parseInt($("#range-val").html());

              decr_speed = current_speed - 5;
              var new_range_decimal = current_range + 30;
              var new_range = Math.round(new_range_decimal);

              if (decr_speed == 30) {
                $("#down").prop("onclick", false);
              } else {
                $("#speed-label span").html(decr_speed);
                $("#range-val").html(new_range);
              }
            });

        </script>
    </body>
</html>
