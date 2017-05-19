<?php

  //check answer
  include("../scoring/check_answers.php");

  //go to next page
  if ($_POST['check'] == "Next Question") {
    header('Location: pollution_questions_q10.php');
  }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Pollution Questions</title>
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400" rel="stylesheet">
        <link rel="stylesheet" href="../../../css/main.css">
        <link rel="stylesheet" href="../../../css/stages.css">
        <link rel="stylesheet" href="../../../css/questions.css">
        <link rel="stylesheet" href="../../css/delhi.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
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
            <div id="instruction">The histogram shows the PM2.5 levels for different days of the month of December, 2016. Answer the following based on your understanding: </div>
            <div id="chart-div"></div>
            <form method="post">
            <?php
                include("../../../db/connection.php");

                echo "<ol start='4'>";
                echo "<li>";

                $query_questions = "SELECT `question` FROM `ecDB`.`questions` WHERE questionID = 'z9'";
                $result_questions = mysqli_query($link, $query_questions);

                while ($question = mysqli_fetch_object($result_questions)) {
                  echo '<input type="hidden" name="question" value="9" />';
                  echo $question->question;
                }

                echo "<br><br>";

                $query_options_q9 = "SELECT `option1`,`option2`,`option3`,`option4` FROM `ecDB`.`question_options` WHERE questionID = 'z9'";
                $result_options_q9 = mysqli_query($link, $query_options_q9);

                while ($options_q9 = mysqli_fetch_object($result_options_q9)) {

                  echo '<input type="radio" name="ques_9[]" id="radio-9-1" class="regular-radio" value="1" /><label for="radio-9-1">';
                  echo $options_q9->option1;
                  echo '</label><br><br>';

                  echo '<input type="radio" name="ques_9[]" id="radio-9-2" class="regular-radio" value="2" /><label for="radio-9-2">';
                  echo $options_q9->option2;
                  echo '</label><br><br>';

                  echo '<input type="radio" name="ques_9[]" id="radio-9-3" class="regular-radio" value="3" /><label for="radio-9-3">';
                  echo $options_q9->option3;
                  echo '</label><br><br>';

                  echo '<input type="radio" name="ques_9[]" id="radio-9-4" class="regular-radio" value="4" /><label for="radio-9-4">';
                  echo $options_q9->option4;
                  echo '</label><br><br>';
                }

                echo "</ol>";
                 ?>
                <input type="submit" name="check" class="proceed-button centre-div" value="Next Question" />
            </form>
        </div>

        <script type="text/javascript">
          google.charts.load("current", {packages:["corechart"]});
          google.charts.setOnLoadCallback(drawChart);
          function drawChart() {
            var data = google.visualization.arrayToDataTable([
              ['Day', 'PM2.5 level'],
              ['Day 1', 20],
              ['Day 2', 120],
              ['Day 3', 200],
              ['Day 4', 340],
              ['Day 5', 450],
              ['Day 6', 880],
              ['Day 7', 560],
              ['Day 8', 420],
              ['Day 9', 490],
              ['Day 10', 510],
              ['Day 11', 590],
              ['Day 12', 440],
              ['Day 13', 405],
              ['Day 14', 780],
              ['Day 15', 645],
              ['Day 16', 605],
              ['Day 17', 385],
              ['Day 18', 515],
              ['Day 19', 575],
              ['Day 20', 390],
              ['Day 21', 590],
              ['Day 22', 540],
              ['Day 23', 635],
              ['Day 24', 765],
              ['Day 25', 890],
              ['Day 26', 900],
              ['Day 27', 975],
              ['Day 28', 525],
              ['Day 29', 580],
              ['Day 30', 670],
              ['Day 31', 510]
            ]);

            var options = {
              height: 400,
              title: 'PM2.5 Levels for December',
              legend: { position: 'none' },
              colors: ['#284584'],
              dataOpacity: 0.8,
              histogram: {
                bucketSize: 100,
                hideBucketItems: true
              },
              hAxis: {
                title: 'PM2.5 levels (micrograms per cubic meter)'
              },
              vAxis: {
                title: 'Number of Days',
                gridlines: {
                  count: 6,
                }
              },
              animation: {
                duration: 2000,
                easing: 'out',
                startup: true,
              },
            };

            var chart = new google.visualization.Histogram(document.getElementById('chart-div'));
            chart.draw(data, options);
          }
        </script>

    </body>
</html>
