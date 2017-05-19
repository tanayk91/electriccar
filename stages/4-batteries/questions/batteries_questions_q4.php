<?php

  //check answer
  include("../scoring/check_answers.php");

  //go to next page
  if ($_POST['check'] == "Next Question") {
    header('Location: batteries_questions_q5.php');
  }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Battery Questions</title>
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400" rel="stylesheet">
        <link rel="stylesheet" href="../../../css/main.css">
        <link rel="stylesheet" href="../../../css/stages.css">
        <link rel="stylesheet" href="../../../css/questions.css">
        <link rel="stylesheet" href="../css/batteries.css">
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

                echo "<ol start='4'>";
                echo "<li>";

                $query_questions = "SELECT `question` FROM `ecDB`.`questions` WHERE questionID = 'c4'";
                $result_questions = mysqli_query($link, $query_questions);

                while ($question = mysqli_fetch_object($result_questions)) {
                  echo '<input type="hidden" name="question" value="4" />';
                  echo $question->question;
                }

                echo "<br><br>";

                $query_options_q4 = "SELECT `option1`,`option2`,`option3`,`option4` FROM `ecDB`.`question_options` WHERE questionID = 'c4'";
                $result_options_q4 = mysqli_query($link, $query_options_q4);

                while ($options_q4 = mysqli_fetch_object($result_options_q4)) {

                  echo '<input type="radio" name="ques_4[]" id="radio-4-1" class="regular-radio" value="1" /><label for="radio-4-1">';
                  echo $options_q4->option1;
                  echo '</label><br><br>';

                  echo '<input type="radio" name="ques_4[]" id="radio-4-2" class="regular-radio" value="2" /><label for="radio-4-2">';
                  echo $options_q4->option2;
                  echo '</label><br><br>';

                  echo '<input type="radio" name="ques_4[]" id="radio-4-3" class="regular-radio" value="3" /><label for="radio-4-3">';
                  echo $options_q4->option3;
                  echo '</label><br><br>';

                  echo '<input type="radio" name="ques_4[]" id="radio-4-4" class="regular-radio" value="4" /><label for="radio-4-4">';
                  echo $options_q4->option4;
                  echo '</label><br><br>';
                }

                echo "</ol>";
                 ?>
                 <input type="submit" name="check" class="proceed-button centre-div" value="Next Question" />
             </form>
        </div>
    </body>
</html>
