<?php

  include ("scoring/check_equation.php");

  if ($_POST['check'] == 'Check Answer!') {
    header('Location: body_material3.php');
  }
 ?>
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
        <div class="parallax-image" id="steel-image">
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
              <h1>Stainless Steel can be used for building various parts of the car</h1>
          </div>
      </div>
      <form method="post">
      <div id="content">
          <div class="content-styling-para">
            Stainless steel is a steel alloy with a minimum of 10.5% chromium content. It does not readily corrode, rust or stain with water
            as ordinary steel does.<br /><br />Stainless steel is used where both the properties of steel and corrosion resistance are required. It is an ideal
            material for many applications. The alloy is milled into coils, sheets, plates, bars, wire, and tubing to be used in cookware, cutlery, household
            hardware, surgical instruments, major appliances, industrial equipment (for example, in sugar refineries) and as an automotive and aerospace
            structural alloy and construction material in large buildings.
            <p style="font-size:0.8em"><a href="https://en.wikipedia.org/wiki/Stainless_steel" target="_blank">"Stainless steel," Wikipedia, the free encyclopedia</a></p>
          </div>
          <div class="empty-div-100px">
          </div>
          <h3 class="heading-3">
              <input type="hidden" name="question" value="11" />
              One of the major advantages of stainless steel is that it does not rust.
              Complete the following equation for rusting, and you will have stainless steel in your arsenal.<br /><br />
          </h3>
          <div id="equation-div" class="centre-div">
              4Fe
              +
              <input type="text" name="ques_11" id="second-reactant" value="" />
              ---->
              2Fe<sub>2</sub>O<sub>3</sub>
              <p>Note: To write an element like CO<sub>2</sub>, simply write CO2.</p>
          </div>
      </div>
      <div class="centre-div">
          <input type='submit' name="check" class='submit-button' id="equation-submit" value='Check Answer!' />
      </div>
      </form>
      <div class="centre-div">
          <span id="message-if-incorrect"></span>
      </div>
      <script src="../../js/parallax.js"></script>
      <script type="text/javascript">

        //ajax call to store material selected by user
        /*
        $('#equation-submit').click(function() {
          var answer =  $('#second-reactant').val();
          var data = {'action': answer};
          $.post('scoring/check_equation.php', data, function(data) {
            $('#message-if-incorrect').html('That does not seem right. Try Again!');
          });
        });
        */

      </script>
    </body>
</html>
