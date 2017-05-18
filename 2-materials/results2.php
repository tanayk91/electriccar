<!DOCTYPE html>
<html>
    <head>
        <title>Results</title>
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400" rel="stylesheet">
        <link rel="stylesheet" href="../../css/main.css">
        <link rel="stylesheet" href="../../css/stages.css">
        <link rel="stylesheet" href="css/body_material.css">
        <link rel="stylesheet" href="css/material_questions.css">
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
        </div>
        <div id="container-small">
            <h2 class="centre-div">Results</h2>
            <br><br><br>
            <h4>Total score in this section:
                <?php session_start(); echo $_SESSION['material-score']; ?>
            </h4>
            <h4>Number of correct questions:
                <?php session_start(); echo $_SESSION['correct_questions']; ?>
            </h4>
            <h4>Number of incorrect questions:
                <?php session_start(); echo $_SESSION['incorrect_questions']; ?>
            </h4>
            <br><br><br>
            <h3>Choose body material</h3>
            <div id="clear"></div>
            <br>
            <div id="user-options" class="centre-div">
                <button id='stainless-steel-button' name='stainless-steel' value='stainless-steel'>Stainless Steel</button>
                    <?php

                      session_start();
                      include ("../../db/connection.php");

                      $get_material_score_query = "SELECT `total`,`materials_score` FROM `ecDB`.`total_score` WHERE `userID` = '{$_SESSION['userID']}'";
                      $get_material_score_result = mysqli_query($link, $get_material_score_query);

                      while ($get_material_score = mysqli_fetch_object($get_material_score_result)) {
                        if (($get_material_score->materials_score >= 40) && ($get_material_score->materials_score <= 60)) {
                          echo "<button id='aluminium-button' name='aluminium' value='aluminium'>Aluminium</button>";
                          echo "<button id='carbon-fiber-button' name='carbon-fiber' value='carbon-fiber' disabled>Carbon Fiber</button>";
                          echo "<h4>To unlock Carbon Fiber, you need to score 80% or above on the challenge.</h4>";
                        } elseif ($get_material_score->materials_score >= 80) {
                          echo "<button id='aluminium-button' name='aluminium' value='aluminium'>Aluminium</button>";
                          echo "<button id='carbon-fiber-button' name='carbon-fiber' value='carbon-fiber'>Carbon Fiber</button>";
                          echo "<h4>Awesome! You now have high grade Carbon Fiber, the lightest and strongest material for your car!</h4>";
                        } else {
                          echo "<button id='aluminium-button' name='aluminium' value='aluminium' disabled>Aluminium</button>";
                          echo "<button id='carbon-fiber-button' name='carbon-fiber' value='carbon-fiber' disabled>Carbon Fiber</button>";
                          echo "<h4>To unlock Aluminium and Carbon Fiber, you need to complete this challenge.</h4>";
                        }
                      }
                ?>
            </div>
            <div class="centre-div">
                <a href="body_material4.php" class="proceed-link left-adjacent-button">RESTART CHALLENGE</a>
            </div>
            <div class="centre-div">
                <a href="../3-body_area/body_area.php" id="navigate-link" class="proceed-link right-adjacent-button">CONTINUE</a>
            </div>
        </div>
        <script type="text/javascript">

        var clickBtnValue = "";

        $(document).ready(function() {
            //select Stainless Steel by default
            $('#stainless-steel-button').focus();
            $('#stainless-steel-button').css("border","1px solid blue");
            clickBtnValue = 'stainless-steel';
        });

    /*Code to toggle button properties*/
        $('#stainless-steel-button').click(function() {
          $(this).css("border","1px solid blue");
          $('#aluminium-button').css("border","");
          $('#carbon-fiber-button').css("border","");

          //save the value of the button click
          clickBtnValue = $(this).val();
        });

        $('#aluminium-button').click(function() {
          $(this).css("border","1px solid blue");
          $('#stainless-steel-button').css("border","");
          $('#carbon-fiber-button').css("border","");

          //save the value of the button click
          clickBtnValue = $(this).val();
        });

        $('#carbon-fiber-button').click(function() {
          $(this).css("border","1px solid blue");
          $('#stainless-steel-button').css("border","");
          $('#aluminium-button').css("border","");

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
