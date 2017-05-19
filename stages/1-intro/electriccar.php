<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Delhi</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400" rel="stylesheet">
    <link rel="stylesheet" href="../../css/main.css">
    <link rel="stylesheet" href="../../css/stages.css">
    <link rel="stylesheet" href="css/delhi.css">

  </head>
  <body>
      <div class="parallax-image" id="car-image">
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
          <div id="container-big">
              <div id="content" class="content-styling-white">
                  <h2 class="heading-1 centre-div">The government plans to encourage widespread use of electric cars</h2>
                  <div id="electric-car-advantages" class="centre-div">
                      <div class="black-box">
                          <img src="images/gasoline-pump.gif" class="box-icon centre-div"/>
                          <p>Drastically less consumption of fossil fuel (even if the source of energy comes from a coal-based power station)</p>
                      </div>
                      <div class="black-box">
                          <img src="images/leaf.gif" class="box-icon centre-div" />
                          <p>Zero fossil fuel consumption if solar energy is used for charging</p>
                      </div>
                      <div class="black-box">
                          <img src="images/noise.gif" class="box-icon centre-div" />
                          <p>Much less noice (an electric car has very few moving parts, unlike a gasoline car)</p>
                      </div>
                      <div class="black-box">
                          <img src="images/acceleration.gif" class="box-icon centre-div" />
                          <p>Excellent acceleration (the car is able to produce instant torque thanks to the electric motor)</p>
                      </div>
                  </div>
                  <div id="clear"></div>
              </div>
          </div>
      </div>
      <div id="footer">
          <h2 class="heading-2 centre-div">Your job is to build an electric car. </h2>
          <h4 class=" heading-2 centre-div">You will choose different parts for the car (better performing parts may need to be unlocked by answering questions), including body material, batteries, an electric motor, and even the wheels.</h4>
          <br /><br />
          <div class="centre-div">
              <a href="../2-materials/body_material1.php" class="proceed-link">CONTINUE</a>
          </div>
      </div>
      <script src="../../js/parallax.js"></script>
  </body>
</html>
