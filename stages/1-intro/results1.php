<!DOCTYPE html>
<html>
    <head>
        <title>Results</title>
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400" rel="stylesheet">
        <link rel="stylesheet" href="../../css/main.css">
        <link rel="stylesheet" href="../../css/stages.css">
        <link rel="stylesheet" href="css/delhi.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
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
        <div id="container">
            <div id="score-summary">
                <h2 style="float: left">You scored <?php session_start(); echo $_SESSION['pollution-score-1']; ?> points in this section</h2>
                <div class="right-adjacent-button" style="margin-left: 40px">
                    <a href="delhi3.php" class="proceed-link centre-div">CONTINUE</a>
                </div>
                <div class="right-adjacent-button">
                    <a href="questions/pollution_questions_stage1.php" class="proceed-link centre-div">RESTART CHALLENGE</a>
                </div>
                <div class="empty-div-100px"></div>
                <h4>Correct questions:
                    <?php session_start(); echo $_SESSION['pollution-1-correct_questions']; ?>
                </h4>
                <h4>Incorrect questions:
                    <?php session_start(); echo $_SESSION['pollution-1-incorrect_questions']; ?>
                </h4>
                <br><br>
                <hr />
                <br>
            </div>
            <div id="more-info">
                <h4>Learn more at KHAN ACADEMY&reg;: </h4>
                <a href="https://www.khanacademy.org/math/in-eighth-grade-math/data-handling-1/organizing-data/e/reading_pictographs_2" target="_blank">Data Handling: Organizing Data</a><br>
                <a href="https://www.khanacademy.org/math/in-eighth-grade-math/data-handling-1/new-topic-2015-11-12T18:23:20.795Z/v/reading-pie-graphs-circle-graphs" target="_blank">Data Handling: Pie Charts</a>
                <p>NOTE: All Khan Academy content is available for free at www.khanacademy.org</p>
                <br>
                <hr />
                <br>
            </div>
            <div id="question-wise-summary">
                <h4>Question Wise Summary</h4>
                <div id="chart-div">
                    <h4>Reference graph:</h4>
                </div>
                <?php
                    include ("../../db/connection.php");
                    session_start();

                    //queries for question 1 start here
                    //query to get question from the database
                    $query_questions = "SELECT `question` FROM `ecDB`.`questions` WHERE questionID = 'z1'";
                    $result_questions = mysqli_query($link, $query_questions);

                    while ($question = mysqli_fetch_object($result_questions)) {
                      echo "<h3>".$question->question."</h3>";
                    }

                    echo "<br>";

                    //query to get user response from database
                    $user_response_query = "SELECT `responseID` FROM `ecDB`.`response` WHERE `questionID` = 'z1' AND `userID` = '{$_SESSION['userID']}'";
                    $user_response_result = mysqli_query($link, $user_response_query);

                    while ($response = mysqli_fetch_object($user_response_result)) {
                      $response_with_prefix = "option".$response->responseID;

                      $select_option_query = "SELECT $response_with_prefix FROM `ecDB`.`question_options` WHERE `questionID` = 'z1'";
                      $select_option_result = mysqli_query($link, $select_option_query);

                      while ($selected_option = mysqli_fetch_object($select_option_result)) {
                        echo "Your response: ".$selected_option->$response_with_prefix;
                        echo "<br><br>";
                      }
                    }

                    //query to get the solution from the database
                    $correct_answer_query = "SELECT `answerID` FROM `ecDB`.`answers` WHERE `questionID` = 'z1'";
                    $correct_answer_result = mysqli_query($link, $correct_answer_query);

                    while ($solution = mysqli_fetch_object($correct_answer_result)) {
                      $answer_with_prefix = "option".$solution->answerID;

                      $select_option_query = "SELECT $answer_with_prefix FROM `ecDB`.`question_options` WHERE `questionID` = 'z1'";
                      $select_option_result = mysqli_query($link, $select_option_query);

                      while ($selected_option = mysqli_fetch_object($select_option_result)) {
                        echo "Correct answer: ".$selected_option->$answer_with_prefix;
                        echo "<br><br>";
                      }

                      if ($response->responseID == $solution->answerID) {
                        echo "Points scored: 10";
                      } else {
                        echo "Points scored: 0";
                      }
                    }

                    echo "<br><br><br><hr /><br>";

                    //queries for question 1 end here

                    //queries for question 2 start here
                    //query to get question from the database
                    $query_questions = "SELECT `question` FROM `ecDB`.`questions` WHERE questionID = 'z2'";
                    $result_questions = mysqli_query($link, $query_questions);

                    while ($question = mysqli_fetch_object($result_questions)) {
                      echo "<h3>".$question->question."</h3>";
                    }

                    echo "<br>";

                    //query to get user response from database
                    $user_response_query = "SELECT `responseID` FROM `ecDB`.`response` WHERE `questionID` = 'z2' AND `userID` = '{$_SESSION['userID']}'";
                    $user_response_result = mysqli_query($link, $user_response_query);

                    while ($response = mysqli_fetch_object($user_response_result)) {
                      $response_with_prefix = "option".$response->responseID;

                      $select_option_query = "SELECT $response_with_prefix FROM `ecDB`.`question_options` WHERE `questionID` = 'z2'";
                      $select_option_result = mysqli_query($link, $select_option_query);

                      while ($selected_option = mysqli_fetch_object($select_option_result)) {
                        echo "Your response: ".$selected_option->$response_with_prefix;
                        echo "<br><br>";
                      }
                    }

                    //query to get the solution from the database
                    $correct_answer_query = "SELECT `answerID` FROM `ecDB`.`answers` WHERE `questionID` = 'z2'";
                    $correct_answer_result = mysqli_query($link, $correct_answer_query);

                    while ($solution = mysqli_fetch_object($correct_answer_result)) {
                      $answer_with_prefix = "option".$solution->answerID;

                      $select_option_query = "SELECT $answer_with_prefix FROM `ecDB`.`question_options` WHERE `questionID` = 'z2'";
                      $select_option_result = mysqli_query($link, $select_option_query);

                      while ($selected_option = mysqli_fetch_object($select_option_result)) {
                        echo "Correct answer: ".$selected_option->$answer_with_prefix;
                        echo "<br><br>";
                      }

                      if ($response->responseID == $solution->answerID) {
                        echo "Points scored: 10";
                      } else {
                        echo "Points scored: 0";
                      }
                    }

                    echo "<br><br><br><hr /><br>";

                    //queries for question 2 end here

                    //queries for question 3 start here
                    //query to get question from the database
                    $query_questions = "SELECT `question` FROM `ecDB`.`questions` WHERE questionID = 'z3'";
                    $result_questions = mysqli_query($link, $query_questions);

                    while ($question = mysqli_fetch_object($result_questions)) {
                      echo "<h3>".$question->question."</h3>";
                    }

                    echo "<br>";

                    //query to get user response from database
                    $user_response_query = "SELECT `responseID` FROM `ecDB`.`response` WHERE `questionID` = 'z3' AND `userID` = '{$_SESSION['userID']}'";
                    $user_response_result = mysqli_query($link, $user_response_query);

                    while ($response = mysqli_fetch_object($user_response_result)) {
                      $response_with_prefix = "option".$response->responseID;

                      $select_option_query = "SELECT $response_with_prefix FROM `ecDB`.`question_options` WHERE `questionID` = 'z3'";
                      $select_option_result = mysqli_query($link, $select_option_query);

                      while ($selected_option = mysqli_fetch_object($select_option_result)) {
                        echo "Your response: ".$selected_option->$response_with_prefix;
                        echo "<br><br>";
                      }
                    }

                    //query to get the solution from the database
                    $correct_answer_query = "SELECT `answerID` FROM `ecDB`.`answers` WHERE `questionID` = 'z3'";
                    $correct_answer_result = mysqli_query($link, $correct_answer_query);

                    while ($solution = mysqli_fetch_object($correct_answer_result)) {
                      $answer_with_prefix = "option".$solution->answerID;

                      $select_option_query = "SELECT $answer_with_prefix FROM `ecDB`.`question_options` WHERE `questionID` = 'z3'";
                      $select_option_result = mysqli_query($link, $select_option_query);

                      while ($selected_option = mysqli_fetch_object($select_option_result)) {
                        echo "Correct answer: ".$selected_option->$answer_with_prefix;
                        echo "<br><br>";
                      }

                      if ($response->responseID == $solution->answerID) {
                        echo "Points scored: 10";
                      } else {
                        echo "Points scored: 0";
                      }
                    }

                    echo "<br><br><br><hr /><br>";

                    //queries for question 3 end here

                    //queries for question 4 start here
                    //query to get question from the database
                    $query_questions = "SELECT `question` FROM `ecDB`.`questions` WHERE questionID = 'z4'";
                    $result_questions = mysqli_query($link, $query_questions);

                    while ($question = mysqli_fetch_object($result_questions)) {
                      echo "<h3>".$question->question."</h3>";
                    }

                    echo "<br>";

                    //query to get user response from database
                    $user_response_query = "SELECT `responseID` FROM `ecDB`.`response` WHERE `questionID` = 'z4' AND `userID` = '{$_SESSION['userID']}'";
                    $user_response_result = mysqli_query($link, $user_response_query);

                    while ($response = mysqli_fetch_object($user_response_result)) {
                      $response_with_prefix = "option".$response->responseID;

                      $select_option_query = "SELECT $response_with_prefix FROM `ecDB`.`question_options` WHERE `questionID` = 'z4'";
                      $select_option_result = mysqli_query($link, $select_option_query);

                      while ($selected_option = mysqli_fetch_object($select_option_result)) {
                        echo "Your response: ".$selected_option->$response_with_prefix;
                        echo "<br><br>";
                      }
                    }

                    //query to get the solution from the database
                    $correct_answer_query = "SELECT `answerID` FROM `ecDB`.`answers` WHERE `questionID` = 'z4'";
                    $correct_answer_result = mysqli_query($link, $correct_answer_query);

                    while ($solution = mysqli_fetch_object($correct_answer_result)) {
                      $answer_with_prefix = "option".$solution->answerID;

                      $select_option_query = "SELECT $answer_with_prefix FROM `ecDB`.`question_options` WHERE `questionID` = 'z4'";
                      $select_option_result = mysqli_query($link, $select_option_query);

                      while ($selected_option = mysqli_fetch_object($select_option_result)) {
                        echo "Correct answer: ".$selected_option->$answer_with_prefix;
                        echo "<br><br>";
                      }

                      if ($response->responseID == $solution->answerID) {
                        echo "Points scored: 10";
                      } else {
                        echo "Points scored: 0";
                      }
                    }

                    echo "<br><br><br><hr /><br>";

                    //queries for question 4 end here

                    //queries for question 5 start here
                    //query to get question from the database
                    $query_questions = "SELECT `question` FROM `ecDB`.`questions` WHERE questionID = 'z5'";
                    $result_questions = mysqli_query($link, $query_questions);

                    while ($question = mysqli_fetch_object($result_questions)) {
                      echo "<h3>".$question->question."</h3>";
                    }

                    echo "<br>";

                    //query to get user response from database
                    $user_response_query = "SELECT `responseID` FROM `ecDB`.`response` WHERE `questionID` = 'z5' AND `userID` = '{$_SESSION['userID']}'";
                    $user_response_result = mysqli_query($link, $user_response_query);

                    while ($response = mysqli_fetch_object($user_response_result)) {
                      $response_with_prefix = "option".$response->responseID;

                      $select_option_query = "SELECT $response_with_prefix FROM `ecDB`.`question_options` WHERE `questionID` = 'z5'";
                      $select_option_result = mysqli_query($link, $select_option_query);

                      while ($selected_option = mysqli_fetch_object($select_option_result)) {
                        echo "Your response: ".$selected_option->$response_with_prefix;
                        echo "<br><br>";
                      }
                    }

                    //query to get the solution from the database
                    $correct_answer_query = "SELECT `answerID` FROM `ecDB`.`answers` WHERE `questionID` = 'z5'";
                    $correct_answer_result = mysqli_query($link, $correct_answer_query);

                    while ($solution = mysqli_fetch_object($correct_answer_result)) {
                      $answer_with_prefix = "option".$solution->answerID;

                      $select_option_query = "SELECT $answer_with_prefix FROM `ecDB`.`question_options` WHERE `questionID` = 'z5'";
                      $select_option_result = mysqli_query($link, $select_option_query);

                      while ($selected_option = mysqli_fetch_object($select_option_result)) {
                        echo "Correct answer: ".$selected_option->$answer_with_prefix;
                        echo "<br><br>";
                      }

                      if ($response->responseID == $solution->answerID) {
                        echo "Points scored: 10";
                      } else {
                        echo "Points scored: 0";
                      }
                    }

                    echo "<br><br><br><hr /><br>";

                    //queries for question 5 end here

                    //queries for question 6 start here
                    //query to get question from the database
                    $query_questions = "SELECT `question` FROM `ecDB`.`questions` WHERE questionID = 'z6'";
                    $result_questions = mysqli_query($link, $query_questions);

                    while ($question = mysqli_fetch_object($result_questions)) {
                      echo "<h3>".$question->question."</h3>";
                    }

                    echo "<br>";

                    //query to get user response from database
                    $user_response_query = "SELECT `responseID` FROM `ecDB`.`response` WHERE `questionID` = 'z6' AND `userID` = '{$_SESSION['userID']}'";
                    $user_response_result = mysqli_query($link, $user_response_query);

                    while ($response = mysqli_fetch_object($user_response_result)) {
                      $response_with_prefix = "option".$response->responseID;

                      $select_option_query = "SELECT $response_with_prefix FROM `ecDB`.`question_options` WHERE `questionID` = 'z6'";
                      $select_option_result = mysqli_query($link, $select_option_query);

                      while ($selected_option = mysqli_fetch_object($select_option_result)) {
                        echo "Your response: ".$selected_option->$response_with_prefix;
                        echo "<br><br>";
                      }
                    }

                    //query to get the solution from the database
                    $correct_answer_query = "SELECT `answerID` FROM `ecDB`.`answers` WHERE `questionID` = 'z6'";
                    $correct_answer_result = mysqli_query($link, $correct_answer_query);

                    while ($solution = mysqli_fetch_object($correct_answer_result)) {
                      $answer_with_prefix = "option".$solution->answerID;

                      $select_option_query = "SELECT $answer_with_prefix FROM `ecDB`.`question_options` WHERE `questionID` = 'z6'";
                      $select_option_result = mysqli_query($link, $select_option_query);

                      while ($selected_option = mysqli_fetch_object($select_option_result)) {
                        echo "Correct answer: ".$selected_option->$answer_with_prefix;
                        echo "<br><br>";
                      }

                      if ($response->responseID == $solution->answerID) {
                        echo "Points scored: 10";
                      } else {
                        echo "Points scored: 0";
                      }
                    }

                    echo "<br><br><br><hr /><br>";

                    //queries for question 6 end here

                    //queries for question 7 start here
                    //query to get question from the database
                    $query_questions = "SELECT `question` FROM `ecDB`.`questions` WHERE questionID = 'z7'";
                    $result_questions = mysqli_query($link, $query_questions);

                    while ($question = mysqli_fetch_object($result_questions)) {
                      echo "<h3>".$question->question."</h3>";
                    }

                    echo "<br>";

                    //query to get user response from database
                    $user_response_query = "SELECT `responseID` FROM `ecDB`.`response` WHERE `questionID` = 'z7' AND `userID` = '{$_SESSION['userID']}'";
                    $user_response_result = mysqli_query($link, $user_response_query);

                    while ($response = mysqli_fetch_object($user_response_result)) {
                      $response_with_prefix = "option".$response->responseID;

                      $select_option_query = "SELECT $response_with_prefix FROM `ecDB`.`question_options` WHERE `questionID` = 'z7'";
                      $select_option_result = mysqli_query($link, $select_option_query);

                      while ($selected_option = mysqli_fetch_object($select_option_result)) {
                        echo "Your response: ".$selected_option->$response_with_prefix;
                        echo "<br><br>";
                      }
                    }

                    //query to get the solution from the database
                    $correct_answer_query = "SELECT `answerID` FROM `ecDB`.`answers` WHERE `questionID` = 'z7'";
                    $correct_answer_result = mysqli_query($link, $correct_answer_query);

                    while ($solution = mysqli_fetch_object($correct_answer_result)) {
                      $answer_with_prefix = "option".$solution->answerID;

                      $select_option_query = "SELECT $answer_with_prefix FROM `ecDB`.`question_options` WHERE `questionID` = 'z7'";
                      $select_option_result = mysqli_query($link, $select_option_query);

                      while ($selected_option = mysqli_fetch_object($select_option_result)) {
                        echo "Correct answer: ".$selected_option->$answer_with_prefix;
                        echo "<br><br>";
                      }

                      if ($response->responseID == $solution->answerID) {
                        echo "Points scored: 10";
                      } else {
                        echo "Points scored: 0";
                      }
                    }

                    echo "<br><br><br><hr /><br>";

                    //queries for question 7 end here

                    //queries for question 8 start here
                    //query to get question from the database
                    $query_questions = "SELECT `question` FROM `ecDB`.`questions` WHERE questionID = 'z8'";
                    $result_questions = mysqli_query($link, $query_questions);

                    while ($question = mysqli_fetch_object($result_questions)) {
                      echo "<h3>".$question->question."</h3>";
                    }

                    echo "<br>";

                    //query to get user response from database
                    $user_response_query = "SELECT `responseID` FROM `ecDB`.`response` WHERE `questionID` = 'z8' AND `userID` = '{$_SESSION['userID']}'";
                    $user_response_result = mysqli_query($link, $user_response_query);

                    while ($response = mysqli_fetch_object($user_response_result)) {
                      $response_with_prefix = "option".$response->responseID;

                      $select_option_query = "SELECT $response_with_prefix FROM `ecDB`.`question_options` WHERE `questionID` = 'z8'";
                      $select_option_result = mysqli_query($link, $select_option_query);

                      while ($selected_option = mysqli_fetch_object($select_option_result)) {
                        echo "Your response: ".$selected_option->$response_with_prefix;
                        echo "<br><br>";
                      }
                    }

                    //query to get the solution from the database
                    $correct_answer_query = "SELECT `answerID` FROM `ecDB`.`answers` WHERE `questionID` = 'z8'";
                    $correct_answer_result = mysqli_query($link, $correct_answer_query);

                    while ($solution = mysqli_fetch_object($correct_answer_result)) {
                      $answer_with_prefix = "option".$solution->answerID;

                      $select_option_query = "SELECT $answer_with_prefix FROM `ecDB`.`question_options` WHERE `questionID` = 'z8'";
                      $select_option_result = mysqli_query($link, $select_option_query);

                      while ($selected_option = mysqli_fetch_object($select_option_result)) {
                        echo "Correct answer: ".$selected_option->$answer_with_prefix;
                        echo "<br><br>";
                      }

                      if ($response->responseID == $solution->answerID) {
                        echo "Points scored: 10";
                      } else {
                        echo "Points scored: 0";
                      }
                    }

                    echo "<br><br><br><hr /><br>";

                    //queries for question 8 end here

                    //queries for question 9 start here
                    //query to get question from the database
                    $query_questions = "SELECT `question` FROM `ecDB`.`questions` WHERE questionID = 'z9'";
                    $result_questions = mysqli_query($link, $query_questions);

                    while ($question = mysqli_fetch_object($result_questions)) {
                      echo "<h3>".$question->question."</h3>";
                    }

                    echo "<br>";

                    //query to get user response from database
                    $user_response_query = "SELECT `responseID` FROM `ecDB`.`response` WHERE `questionID` = 'z9' AND `userID` = '{$_SESSION['userID']}'";
                    $user_response_result = mysqli_query($link, $user_response_query);

                    while ($response = mysqli_fetch_object($user_response_result)) {
                      $response_with_prefix = "option".$response->responseID;

                      $select_option_query = "SELECT $response_with_prefix FROM `ecDB`.`question_options` WHERE `questionID` = 'z9'";
                      $select_option_result = mysqli_query($link, $select_option_query);

                      while ($selected_option = mysqli_fetch_object($select_option_result)) {
                        echo "Your response: ".$selected_option->$response_with_prefix;
                        echo "<br><br>";
                      }
                    }

                    //query to get the solution from the database
                    $correct_answer_query = "SELECT `answerID` FROM `ecDB`.`answers` WHERE `questionID` = 'z9'";
                    $correct_answer_result = mysqli_query($link, $correct_answer_query);

                    while ($solution = mysqli_fetch_object($correct_answer_result)) {
                      $answer_with_prefix = "option".$solution->answerID;

                      $select_option_query = "SELECT $answer_with_prefix FROM `ecDB`.`question_options` WHERE `questionID` = 'z9'";
                      $select_option_result = mysqli_query($link, $select_option_query);

                      while ($selected_option = mysqli_fetch_object($select_option_result)) {
                        echo "Correct answer: ".$selected_option->$answer_with_prefix;
                        echo "<br><br>";
                      }

                      if ($response->responseID == $solution->answerID) {
                        echo "Points scored: 10";
                      } else {
                        echo "Points scored: 0";
                      }
                    }

                    echo "<br><br><br><hr /><br>";

                    //queries for question 9 end here

                    //queries for question 10 start here
                    //query to get question from the database
                    $query_questions = "SELECT `question` FROM `ecDB`.`questions` WHERE questionID = 'z10'";
                    $result_questions = mysqli_query($link, $query_questions);

                    while ($question = mysqli_fetch_object($result_questions)) {
                      echo "<h3>".$question->question."</h3>";
                    }

                    echo "<br>";

                    //query to get user response from database
                    $user_response_query = "SELECT `responseID` FROM `ecDB`.`response` WHERE `questionID` = 'z10' AND `userID` = '{$_SESSION['userID']}'";
                    $user_response_result = mysqli_query($link, $user_response_query);

                    while ($response = mysqli_fetch_object($user_response_result)) {
                      $response_with_prefix = "option".$response->responseID;

                      $select_option_query = "SELECT $response_with_prefix FROM `ecDB`.`question_options` WHERE `questionID` = 'z10'";
                      $select_option_result = mysqli_query($link, $select_option_query);

                      while ($selected_option = mysqli_fetch_object($select_option_result)) {
                        echo "Your response: ".$selected_option->$response_with_prefix;
                        echo "<br><br>";
                      }
                    }

                    //query to get the solution from the database
                    $correct_answer_query = "SELECT `answerID` FROM `ecDB`.`answers` WHERE `questionID` = 'z10'";
                    $correct_answer_result = mysqli_query($link, $correct_answer_query);

                    while ($solution = mysqli_fetch_object($correct_answer_result)) {
                      $answer_with_prefix = "option".$solution->answerID;

                      $select_option_query = "SELECT $answer_with_prefix FROM `ecDB`.`question_options` WHERE `questionID` = 'z10'";
                      $select_option_result = mysqli_query($link, $select_option_query);

                      while ($selected_option = mysqli_fetch_object($select_option_result)) {
                        echo "Correct answer: ".$selected_option->$answer_with_prefix;
                        echo "<br><br>";
                      }

                      if ($response->responseID == $solution->answerID) {
                        echo "Points scored: 10";
                      } else {
                        echo "Points scored: 0";
                      }
                    }

                    echo "<br><br><br><hr /><br>";

                    //queries for question 10 end here
                 ?>

            </div>
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
