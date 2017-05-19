<?php

  //check answer
  include("../scoring/check_answers_update_total.php");

  //go to next page
  if ($_POST['check-area'] == "Check Answers!") {
    header('Location: ../results.php');
  }

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Area of the car body</title>
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400" rel="stylesheet">
        <link rel="stylesheet" href="../../../css/main.css">
        <link rel="stylesheet" href="../../../css/stages.css">
        <link rel="stylesheet" href="../css/body_area.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    </head>
    <body>
      <div id="navbar">
          <div id="logo-div">
              <img src="../../../images/logo_white_small.png" />
              <span id="logo-title">The Climate Shift Project</span>
          </div>
          <div id="login-logout-div">
              <a href="../../../index.php" id="login-logout-link">LOGOUT</a>
          </div>
      </div>
        <div id="progress-bar">
            <div class="dropdown-content">
                <a href="../../1-intro/delhi1.php">Pollution in Delhi</a>
                <a href="../../2-materials/body_material1.php">Materials</a>
                <a href="../../3-body_area/body_area.php">Area</a>
                <a href="../../4-batteries/batteries.php">Batteries</a>
                <a href="../../5-motor/motor.php">Motor</a>
                <a href="../../6-wheels/wheels.php">Wheels</a>
            </div>
            <div id="user-score">
                <?php session_start(); echo "<span id='score-style'>". $_SESSION['score']."</span>"." points"; ?>
            </div>
        </div>
        <div id="container">
            <div id="user-entered-vals" class="centre-div">
                <form method="post">
                    <label id="area-val">Enter the calculated area for the bonnet (in cm<sup>2</sup>)</label><input type="text" id= "user-entered-area" name="bonnet" />
                    <input type="submit" class="submit-button" name="check-area" value="Check Answers!" />
                </form>
            </div>
            <h5 class="instruction" id="sub-instruction">(round it off to the nearest integer)</h5>
            <div id="car-images">
                <img src="../images/bonnet-sketch.gif" id="car-part-image" />
                <img src="../images/bonnet_dim.jpeg" id="car-part-dim" width="310px" height="371px" />
            </div>
        </div>
    </body>
</html>
