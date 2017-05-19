<?php

  //check answer
  include("../scoring/check_answers_update_total_1.php");

  //go to next page
  if ($_POST['check'] == "Check Answers!") {
    header('Location: ../results1.php');
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
        <link rel="stylesheet" href="../css/delhi.css">
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
            <div id="instruction">The bar graph shown below shows the average PM2.5 AQI (Air Quality Index) in Delhi for different months of the year in 2020. Use this information to answer the following question: </div>
            <div id="clear"></div>
            <div id="chart-div"></div>

            <form method="post">
            <?php
                include("../../../db/connection.php");

                echo "<ol start='4'>";
                echo "<li>";

                $query_questions = "SELECT `question` FROM `ecDB`.`questions` WHERE questionID = 'z4'";
                $result_questions = mysqli_query($link, $query_questions);

                while ($question = mysqli_fetch_object($result_questions)) {
                  echo '<input type="hidden" name="question" value="4" />';
                  echo $question->question;
                }

                echo "<br><br>";

                $query_options_q4 = "SELECT `option1`,`option2`,`option3`,`option4` FROM `ecDB`.`question_options` WHERE questionID = 'z4'";
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
                 <input type="submit" name="check" class="proceed-button centre-div" value="Check Answers!" />
            </form>
        </div>

        <script type="text/javascript">
        google.charts.load('current', {packages: ['corechart', 'bar']});
        google.charts.setOnLoadCallback(drawBasic);

        function drawBasic() {

          var data = new google.visualization.arrayToDataTable([
             ['Month', 'PM2.5 Levels', { role: 'style' }],
             ['January', 150, 'opacity:0.8'],
             ['February', 160, 'opacity:0.8'],
             ['March', 145, 'opacity:0.8'],
             ['April', 140, 'opacity:0.8'],
             ['May', 130, 'opacity:0.8'],
             ['June', 145, 'opacity:0.8'],
             ['July', 140, 'opacity:0.8'],
             ['August', 135, 'opacity:0.8'],
             ['September', 150, 'opacity:0.8'],
             ['October', 155, 'opacity:0.8'],
             ['November', 165, 'opacity:0.8'],
             ['December', 170, 'opacity:0.8'],
          ]);

          var options = {
            height: 600,
            chartArea: {
              width: 800,
            },
            title: 'Pollution Levels in Delhi',
            hAxis: {
              title: 'Month',
              minTextSpacing: 2,
              textStyle : {fontSize: 13},
            },
            colors: ['#284584'],
            animation: {
              duration: 2000,
              easing: 'out',
              startup: true,
            },
            vAxis: {
              title: 'PM2.5 Levels',
              baseline: 0,
              ticks: [0,20,40,60,80,100,120,140,160,180],
            },
            legend: {
              position: 'top',
            },
          };

          var chart = new google.visualization.ColumnChart(
            document.getElementById('chart-div'));

            chart.draw(data, options);
          }
          </script>

    </body>
</html>
