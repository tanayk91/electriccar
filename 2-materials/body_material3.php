<!DOCTYPE html>
<html>
    <head>
        <title>Materials for the car</title>
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400" rel="stylesheet">
        <link rel="stylesheet" href="../../css/main.css">
        <link rel="stylesheet" href="../../css/stages.css">
        <link rel="stylesheet" href="css/body_material.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    </head>
    <body>
        <div class="parallax-image" id="aluminium-image">
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
          <div class="heading-1 centre-div" id="page-heading" style="color: white">
              <h1>You can use stainless steel to build your car</h1>
          </div>
      </div>
      <div id="container">
          <div class="content-styling centre-div">
              <h3>You also have the option to upgrade to Aluminium or Carbon Fiber.</h3>
              To unlock these materials, you'll need to complete a challenge.
              <div id="tabular-description-div">
                  <div class="table-header" id="aluminium">
                      Aluminium
                  </div>
                  <div class="table-header" id="carbon-fiber">
                      Carbon Fiber
                  </div>
                  <div id="clear"></div>
                  <div id="description-div">
                      Aluminium is a silvery-white, soft, nonmagnetic, ductile metal. It is the third most abundant element after oxygen and silicon and the most abundant metal in the crust. Aluminium metal is so chemically reactive that native specimens are rare. </p><p>As the automotive industry begins to pay more and more attention to fuel efficiency, reducing CO<sub>2</sub> emissions and design, aluminium is playing an ever more important role in modern cars. Every kilogram of aluminium used in a car reduces the overall weight of the vehicle by one kilogram. For this reason more and more car parts are being made from aluminium.
                  </div>
              </div>
          </div>
          <div class="centre-div">
              <a href="body_material4.php" class="proceed-link left-adjacent-button">CONTINUE</a>
              <a href="questions/material_questions_q1.php" class="proceed-link right-adjacent-button">BEGIN CHALLENGE</a>
          </div>
      </div>
      <script src="../../js/parallax.js"></script>
      <script src="js/materials.js"></script>
    </body>
</html>
