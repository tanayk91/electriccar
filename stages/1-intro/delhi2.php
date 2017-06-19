<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Delhi</title>
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400" rel="stylesheet">
        <link rel="stylesheet" href="../../css/main.css">
        <link rel="stylesheet" href="../../css/stages.css">
        <link rel="stylesheet" href="css/delhi.css">

    </head>
    <body>
        <div class="parallax-image" id="parliament-image">
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
                        <a href="../4-batteries/batteries1.php">Batteries</a>
                        <a href="../5-motor/motor1.php">Motor</a>
                        <a href="../6-wheels/wheels1.php">Wheels</a>
                    </div>
                </div>
            </div>
            <div class="image-heading-styling image-heading-position-high">
                <h2>The Indian Parliament<br />
                  December 27, 2020</h2><br />
            </div>
        </div>
        <div id="container">
            <div id="content" class="content-styling">
                <p>The Parliament asked for a detailed report from the Ministry of Environment regarding the pollution levels in the city.
                This was a top priority for the government, with the Prime Minister himself looking over the matter.</p>
                <p>The Ministry submitted the report with a thorough analysis and few suggestions. A graph from this report is shown in the following challenge. Answer the questions after interpreting the graph.</p>
            </div>
            <div class="centre-div">
                <a href="landing.php" class="proceed-link">BEGIN CHALLENGE</a>
            </div>
        </div>
        <script src="../../js/parallax.js"></script>
    </body>
</html>
