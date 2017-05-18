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
        <div class="parallax-image" id="factory-image">
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
              <h1>You need a strong and durable material to build your car</h1>
          </div>
      </div>
      <div id="content" class="content-styling centre-div">
          <p>But not all materials are available by default. Complete the challenges, and the materials will unlock for you to use.</p>
      </div>
      <div class="centre-div">
          <a href="body_material2.php" class="proceed-link">CONTINUE</a>
      </div>
      <script src="../../js/parallax.js"></script>
    </body>
</html>
