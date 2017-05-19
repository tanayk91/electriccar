<?php
  include("scoring/reset_scores.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Area of the car body</title>
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400" rel="stylesheet">
        <link rel="stylesheet" href="../../css/main.css">
        <link rel="stylesheet" href="../../css/stages.css">
        <link rel="stylesheet" href="css/body_area.css">
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
            <div id="top-bar">
                <h3 class="instruction">In this section you will calculate the areas of different body shapes to estimate the total quantity of material required</h3>
            </div>
            <div class="centre-div">
                <a href="questions/body_area_front_door.php" class="proceed-link">BEGIN CHALLENGE</a>
            </div>
        </div>
    </body>
</html>
