<?php

  //check answer
  include("../scoring/check_answers.php");

  //go to next page
  if ($_POST['check-area'] == "Next") {
    header('Location: body_area_back_door.php');
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
                <a href="../../4-batteries/batteries1.php">Batteries</a>
                <a href="../../5-motor/motor1.php">Motor</a>
                <a href="../../6-wheels/wheels1.php">Wheels</a>
            </div>
            <div id="user-score">
                <?php session_start(); echo "<span id='score-style'>". $_SESSION['score']."</span>"." points"; ?>
            </div>
        </div>
        <div id="container">
            <div id="user-entered-vals" class="centre-div">
                <form method="post">
                    <label id="area-val">Enter the calculated area for the front door (in cm<sup>2</sup>)</label><input type="text" id= "user-entered-area" name="front-door" />
                    <input type="submit" class="submit-button" name="check-area" value="Next" />
                </form>
            </div>
            <div id="car-images">
                <img src="../images/front-door-sketch.gif" id="car-part-image" />
                <img src="../images/front_door_dim.jpg" id="car-part-dim" width="376px" height="282px" />
            </div>
        </div>
    </body>
</html>
