<?php

  //check answer
  include("../scoring/check_answers_update_total.php");

  //go to next page
  if ($_POST['check'] == "Check Answers!") {
    header('Location: ../results2.php');
  }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Material Questions</title>
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400" rel="stylesheet">
        <link rel="stylesheet" href="../../../css/main.css">
        <link rel="stylesheet" href="../../../css/stages.css">
        <link rel="stylesheet" href="../../../css/questions.css">
        <link rel="stylesheet" href="../css/body_material.css">
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
          <div class="switch-stage-dropdown">
              <button class="dropbtn">SWITCH MODULE</button>
              <div class="dropdown-content">
                  <a href="../../1-intro/delhi1.php">Pollution in Delhi</a>
                  <a href="../../2-materials/body_material1.php">Materials</a>
                  <a href="../../3-body_area/body_area.php">Area</a>
                  <a href="../../4-batteries/batteries.php">Batteries</a>
                  <a href="../../5-motor/motor.php">Motor</a>
                  <a href="../../6-wheels/wheels.php">Wheels</a>
              </div>
          </div>
        </div>
        <div id="container">
            <form method="post">
            <?php
                include("../../../db/connection.php");

                echo "<ol start='5'>";
                echo "<li>";

                $query_questions = "SELECT `question` FROM `ecDB`.`questions` WHERE questionID = 'a5'";
                $result_questions = mysqli_query($link, $query_questions);

                while ($question = mysqli_fetch_object($result_questions)) {
                  echo '<input type="hidden" name="question" value="5" />';
                  echo $question->question;
                }

                echo "<br><br>";

                $query_options_q5 = "SELECT `option1`,`option2`,`option3`,`option4` FROM `ecDB`.`question_options` WHERE questionID = 'a5'";
                $result_options_q5 = mysqli_query($link, $query_options_q5);

                while ($options_q5 = mysqli_fetch_object($result_options_q5)) {

                  echo '<input type="checkbox" name="ques_5[]" id="checkbox-5-1" class="regular-checkbox" value="1" /><label for="checkbox-5-1">';
                  echo $options_q5->option1;
                  echo '</label><br><br>';

                  echo '<input type="checkbox" name="ques_5[]" id="checkbox-5-2" class="regular-checkbox" value="2" /><label for="checkbox-5-2">';
                  echo $options_q5->option2;
                  echo '</label><br><br>';

                  echo '<input type="checkbox" name="ques_5[]" id="checkbox-5-3" class="regular-checkbox" value="3" /><label for="checkbox-5-3">';
                  echo $options_q5->option3;
                  echo '</label><br><br>';

                  echo '<input type="checkbox" name="ques_5[]" id="checkbox-5-4" class="regular-checkbox" value="4" /><label for="checkbox-5-4">';
                  echo $options_q5->option4;
                  echo '</label><br><br>';
                }

                echo "</ol>";
                 ?>
                 <input type="submit" name="check" class="proceed-button centre-div" value="Check Answers!" />
             </form>
        </div>
    </body>
</html>
