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
                <h2 style="float: left">You scored <?php session_start(); echo $_SESSION['pollution-score-2']; ?> points in this section</h2>
                <div class="right-adjacent-button" style="margin-left: 40px">
                    <a href="electriccar.php" class="proceed-link centre-div">CONTINUE</a>
                </div>
                <div class="right-adjacent-button">
                    <a href="questions/pollution_questions_q5.php" class="proceed-link centre-div">RESTART CHALLENGE</a>
                </div>
                <div class="empty-div-100px"></div>
                <h4>Correct questions:
                    <?php session_start(); echo $_SESSION['pollution-2-correct_questions']; ?>
                </h4>
                <h4>Incorrect questions:
                    <?php session_start(); echo $_SESSION['pollution-2-incorrect_questions']; ?>
                </h4>
                <br><br>
                <hr />
                <br>
            </div>
            <div id="more-info">
                <h4>Learn more at KHAN ACADEMY&reg;: </h4>
                <a href="https://www.khanacademy.org/math/in-eighth-grade-math/data-handling-1/grouping-data-1/v/histograms-intro" target="_blank">Data Handling: Histograms</a><br>
                <a href="https://www.khanacademy.org/math/in-eighth-grade-math/data-handling-1/new-topic-2015-11-12T18:23:30.291Z/v/basic-probability" target="_blank">Probability</a>
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
                    $query_questions = "SELECT `question` FROM `ecDB`.`questions` WHERE questionID = 'z11'";
                    $result_questions = mysqli_query($link, $query_questions);

                    while ($question = mysqli_fetch_object($result_questions)) {
                      echo "<h3>".$question->question."</h3>";
                    }

                    echo "<br>";

                    //query to get user response from database
                    $user_response_query = "SELECT `responseID` FROM `ecDB`.`response` WHERE `questionID` = 'z11' AND `userID` = '{$_SESSION['userID']}'";
                    $user_response_result = mysqli_query($link, $user_response_query);

                    while ($response = mysqli_fetch_object($user_response_result)) {
                      $response_with_prefix = "option".$response->responseID;

                      $select_option_query = "SELECT $response_with_prefix FROM `ecDB`.`question_options` WHERE `questionID` = 'z11'";
                      $select_option_result = mysqli_query($link, $select_option_query);

                      while ($selected_option = mysqli_fetch_object($select_option_result)) {
                        echo "Your response: ".$selected_option->$response_with_prefix;
                        echo "<br><br>";
                      }
                    }

                    //query to get the solution from the database
                    $correct_answer_query = "SELECT `answerID` FROM `ecDB`.`answers` WHERE `questionID` = 'z11'";
                    $correct_answer_result = mysqli_query($link, $correct_answer_query);

                    while ($solution = mysqli_fetch_object($correct_answer_result)) {
                      $answer_with_prefix = "option".$solution->answerID;

                      $select_option_query = "SELECT $answer_with_prefix FROM `ecDB`.`question_options` WHERE `questionID` = 'z11'";
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
                    $query_questions = "SELECT `question` FROM `ecDB`.`questions` WHERE questionID = 'z12'";
                    $result_questions = mysqli_query($link, $query_questions);

                    while ($question = mysqli_fetch_object($result_questions)) {
                      echo "<h3>".$question->question."</h3>";
                    }

                    echo "<br>";

                    //query to get user response from database
                    $user_response_query = "SELECT `responseID` FROM `ecDB`.`response` WHERE `questionID` = 'z12' AND `userID` = '{$_SESSION['userID']}'";
                    $user_response_result = mysqli_query($link, $user_response_query);

                    while ($response = mysqli_fetch_object($user_response_result)) {
                      $response_with_prefix = "option".$response->responseID;

                      $select_option_query = "SELECT $response_with_prefix FROM `ecDB`.`question_options` WHERE `questionID` = 'z12'";
                      $select_option_result = mysqli_query($link, $select_option_query);

                      while ($selected_option = mysqli_fetch_object($select_option_result)) {
                        echo "Your response: ".$selected_option->$response_with_prefix;
                        echo "<br><br>";
                      }
                    }

                    //query to get the solution from the database
                    $correct_answer_query = "SELECT `answerID` FROM `ecDB`.`answers` WHERE `questionID` = 'z12'";
                    $correct_answer_result = mysqli_query($link, $correct_answer_query);

                    while ($solution = mysqli_fetch_object($correct_answer_result)) {
                      $answer_with_prefix = "option".$solution->answerID;

                      $select_option_query = "SELECT $answer_with_prefix FROM `ecDB`.`question_options` WHERE `questionID` = 'z12'";
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
                    $query_questions = "SELECT `question` FROM `ecDB`.`questions` WHERE questionID = 'z13'";
                    $result_questions = mysqli_query($link, $query_questions);

                    while ($question = mysqli_fetch_object($result_questions)) {
                      echo "<h3>".$question->question."</h3>";
                    }

                    echo "<br>";

                    //query to get user response from database
                    $user_response_query = "SELECT `responseID` FROM `ecDB`.`response` WHERE `questionID` = 'z13' AND `userID` = '{$_SESSION['userID']}'";
                    $user_response_result = mysqli_query($link, $user_response_query);

                    while ($response = mysqli_fetch_object($user_response_result)) {
                      $response_with_prefix = "option".$response->responseID;

                      $select_option_query = "SELECT $response_with_prefix FROM `ecDB`.`question_options` WHERE `questionID` = 'z13'";
                      $select_option_result = mysqli_query($link, $select_option_query);

                      while ($selected_option = mysqli_fetch_object($select_option_result)) {
                        echo "Your response: ".$selected_option->$response_with_prefix;
                        echo "<br><br>";
                      }
                    }

                    //query to get the solution from the database
                    $correct_answer_query = "SELECT `answerID` FROM `ecDB`.`answers` WHERE `questionID` = 'z13'";
                    $correct_answer_result = mysqli_query($link, $correct_answer_query);

                    while ($solution = mysqli_fetch_object($correct_answer_result)) {
                      $answer_with_prefix = "option".$solution->answerID;

                      $select_option_query = "SELECT $answer_with_prefix FROM `ecDB`.`question_options` WHERE `questionID` = 'z13'";
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
                    $query_questions = "SELECT `question` FROM `ecDB`.`questions` WHERE questionID = 'z14'";
                    $result_questions = mysqli_query($link, $query_questions);

                    while ($question = mysqli_fetch_object($result_questions)) {
                      echo "<h3>".$question->question."</h3>";
                    }

                    echo "<br>";

                    //query to get user response from database
                    $user_response_query = "SELECT `responseID` FROM `ecDB`.`response` WHERE `questionID` = 'z14' AND `userID` = '{$_SESSION['userID']}'";
                    $user_response_result = mysqli_query($link, $user_response_query);

                    while ($response = mysqli_fetch_object($user_response_result)) {
                      $response_with_prefix = "option".$response->responseID;

                      $select_option_query = "SELECT $response_with_prefix FROM `ecDB`.`question_options` WHERE `questionID` = 'z14'";
                      $select_option_result = mysqli_query($link, $select_option_query);

                      while ($selected_option = mysqli_fetch_object($select_option_result)) {
                        echo "Your response: ".$selected_option->$response_with_prefix;
                        echo "<br><br>";
                      }
                    }

                    //query to get the solution from the database
                    $correct_answer_query = "SELECT `answerID` FROM `ecDB`.`answers` WHERE `questionID` = 'z14'";
                    $correct_answer_result = mysqli_query($link, $correct_answer_query);

                    while ($solution = mysqli_fetch_object($correct_answer_result)) {
                      $answer_with_prefix = "option".$solution->answerID;

                      $select_option_query = "SELECT $answer_with_prefix FROM `ecDB`.`question_options` WHERE `questionID` = 'z14'";
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
                    $query_questions = "SELECT `question` FROM `ecDB`.`questions` WHERE questionID = 'z15'";
                    $result_questions = mysqli_query($link, $query_questions);

                    while ($question = mysqli_fetch_object($result_questions)) {
                      echo "<h3>".$question->question."</h3>";
                    }

                    echo "<br>";

                    //query to get user response from database
                    $user_response_query = "SELECT `responseID` FROM `ecDB`.`response` WHERE `questionID` = 'z15' AND `userID` = '{$_SESSION['userID']}'";
                    $user_response_result = mysqli_query($link, $user_response_query);

                    while ($response = mysqli_fetch_object($user_response_result)) {
                      $response_with_prefix = "option".$response->responseID;

                      $select_option_query = "SELECT $response_with_prefix FROM `ecDB`.`question_options` WHERE `questionID` = 'z15'";
                      $select_option_result = mysqli_query($link, $select_option_query);

                      while ($selected_option = mysqli_fetch_object($select_option_result)) {
                        echo "Your response: ".$selected_option->$response_with_prefix;
                        echo "<br><br>";
                      }
                    }

                    //query to get the solution from the database
                    $correct_answer_query = "SELECT `answerID` FROM `ecDB`.`answers` WHERE `questionID` = 'z15'";
                    $correct_answer_result = mysqli_query($link, $correct_answer_query);

                    while ($solution = mysqli_fetch_object($correct_answer_result)) {
                      $answer_with_prefix = "option".$solution->answerID;

                      $select_option_query = "SELECT $answer_with_prefix FROM `ecDB`.`question_options` WHERE `questionID` = 'z15'";
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
                    $query_questions = "SELECT `question` FROM `ecDB`.`questions` WHERE questionID = 'z16'";
                    $result_questions = mysqli_query($link, $query_questions);

                    while ($question = mysqli_fetch_object($result_questions)) {
                      echo "<h3>".$question->question."</h3>";
                    }

                    echo "<br>";

                    //query to get user response from database
                    $user_response_query = "SELECT `responseID` FROM `ecDB`.`response` WHERE `questionID` = 'z16' AND `userID` = '{$_SESSION['userID']}'";
                    $user_response_result = mysqli_query($link, $user_response_query);

                    while ($response = mysqli_fetch_object($user_response_result)) {
                      $response_with_prefix = "option".$response->responseID;

                      $select_option_query = "SELECT $response_with_prefix FROM `ecDB`.`question_options` WHERE `questionID` = 'z16'";
                      $select_option_result = mysqli_query($link, $select_option_query);

                      while ($selected_option = mysqli_fetch_object($select_option_result)) {
                        echo "Your response: ".$selected_option->$response_with_prefix;
                        echo "<br><br>";
                      }
                    }

                    //query to get the solution from the database
                    $correct_answer_query = "SELECT `answerID` FROM `ecDB`.`answers` WHERE `questionID` = 'z16'";
                    $correct_answer_result = mysqli_query($link, $correct_answer_query);

                    while ($solution = mysqli_fetch_object($correct_answer_result)) {
                      $answer_with_prefix = "option".$solution->answerID;

                      $select_option_query = "SELECT $answer_with_prefix FROM `ecDB`.`question_options` WHERE `questionID` = 'z16'";
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
                    $query_questions = "SELECT `question` FROM `ecDB`.`questions` WHERE questionID = 'z17'";
                    $result_questions = mysqli_query($link, $query_questions);

                    while ($question = mysqli_fetch_object($result_questions)) {
                      echo "<h3>".$question->question."</h3>";
                    }

                    echo "<br>";

                    //query to get user response from database
                    $user_response_query = "SELECT `responseID` FROM `ecDB`.`response` WHERE `questionID` = 'z17' AND `userID` = '{$_SESSION['userID']}'";
                    $user_response_result = mysqli_query($link, $user_response_query);

                    while ($response = mysqli_fetch_object($user_response_result)) {
                      $response_with_prefix = "option".$response->responseID;

                      $select_option_query = "SELECT $response_with_prefix FROM `ecDB`.`question_options` WHERE `questionID` = 'z17'";
                      $select_option_result = mysqli_query($link, $select_option_query);

                      while ($selected_option = mysqli_fetch_object($select_option_result)) {
                        echo "Your response: ".$selected_option->$response_with_prefix;
                        echo "<br><br>";
                      }
                    }

                    //query to get the solution from the database
                    $correct_answer_query = "SELECT `answerID` FROM `ecDB`.`answers` WHERE `questionID` = 'z17'";
                    $correct_answer_result = mysqli_query($link, $correct_answer_query);

                    while ($solution = mysqli_fetch_object($correct_answer_result)) {
                      $answer_with_prefix = "option".$solution->answerID;

                      $select_option_query = "SELECT $answer_with_prefix FROM `ecDB`.`question_options` WHERE `questionID` = 'z17'";
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
                    $query_questions = "SELECT `question` FROM `ecDB`.`questions` WHERE questionID = 'z18'";
                    $result_questions = mysqli_query($link, $query_questions);

                    while ($question = mysqli_fetch_object($result_questions)) {
                      echo "<h3>".$question->question."</h3>";
                    }

                    echo "<br>";

                    //query to get user response from database
                    $user_response_query = "SELECT `responseID` FROM `ecDB`.`response` WHERE `questionID` = 'z18' AND `userID` = '{$_SESSION['userID']}'";
                    $user_response_result = mysqli_query($link, $user_response_query);

                    while ($response = mysqli_fetch_object($user_response_result)) {
                      $response_with_prefix = "option".$response->responseID;

                      $select_option_query = "SELECT $response_with_prefix FROM `ecDB`.`question_options` WHERE `questionID` = 'z18'";
                      $select_option_result = mysqli_query($link, $select_option_query);

                      while ($selected_option = mysqli_fetch_object($select_option_result)) {
                        echo "Your response: ".$selected_option->$response_with_prefix;
                        echo "<br><br>";
                      }
                    }

                    //query to get the solution from the database
                    $correct_answer_query = "SELECT `answerID` FROM `ecDB`.`answers` WHERE `questionID` = 'z18'";
                    $correct_answer_result = mysqli_query($link, $correct_answer_query);

                    while ($solution = mysqli_fetch_object($correct_answer_result)) {
                      $answer_with_prefix = "option".$solution->answerID;

                      $select_option_query = "SELECT $answer_with_prefix FROM `ecDB`.`question_options` WHERE `questionID` = 'z18'";
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
                    $query_questions = "SELECT `question` FROM `ecDB`.`questions` WHERE questionID = 'z19'";
                    $result_questions = mysqli_query($link, $query_questions);

                    while ($question = mysqli_fetch_object($result_questions)) {
                      echo "<h3>".$question->question."</h3>";
                    }

                    echo "<br>";

                    //query to get user response from database
                    $user_response_query = "SELECT `responseID` FROM `ecDB`.`response` WHERE `questionID` = 'z19' AND `userID` = '{$_SESSION['userID']}'";
                    $user_response_result = mysqli_query($link, $user_response_query);

                    while ($response = mysqli_fetch_object($user_response_result)) {
                      $response_with_prefix = "option".$response->responseID;

                      $select_option_query = "SELECT $response_with_prefix FROM `ecDB`.`question_options` WHERE `questionID` = 'z19'";
                      $select_option_result = mysqli_query($link, $select_option_query);

                      while ($selected_option = mysqli_fetch_object($select_option_result)) {
                        echo "Your response: ".$selected_option->$response_with_prefix;
                        echo "<br><br>";
                      }
                    }

                    //query to get the solution from the database
                    $correct_answer_query = "SELECT `answerID` FROM `ecDB`.`answers` WHERE `questionID` = 'z19'";
                    $correct_answer_result = mysqli_query($link, $correct_answer_query);

                    while ($solution = mysqli_fetch_object($correct_answer_result)) {
                      $answer_with_prefix = "option".$solution->answerID;

                      $select_option_query = "SELECT $answer_with_prefix FROM `ecDB`.`question_options` WHERE `questionID` = 'z19'";
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
                    $query_questions = "SELECT `question` FROM `ecDB`.`questions` WHERE questionID = 'z20'";
                    $result_questions = mysqli_query($link, $query_questions);

                    while ($question = mysqli_fetch_object($result_questions)) {
                      echo "<h3>".$question->question."</h3>";
                    }

                    echo "<br>";

                    //query to get user response from database
                    $user_response_query = "SELECT `responseID` FROM `ecDB`.`response` WHERE `questionID` = 'z20' AND `userID` = '{$_SESSION['userID']}'";
                    $user_response_result = mysqli_query($link, $user_response_query);

                    while ($response = mysqli_fetch_object($user_response_result)) {
                      $response_with_prefix = "option".$response->responseID;

                      $select_option_query = "SELECT $response_with_prefix FROM `ecDB`.`question_options` WHERE `questionID` = 'z20'";
                      $select_option_result = mysqli_query($link, $select_option_query);

                      while ($selected_option = mysqli_fetch_object($select_option_result)) {
                        echo "Your response: ".$selected_option->$response_with_prefix;
                        echo "<br><br>";
                      }
                    }

                    //query to get the solution from the database
                    $correct_answer_query = "SELECT `answerID` FROM `ecDB`.`answers` WHERE `questionID` = 'z20'";
                    $correct_answer_result = mysqli_query($link, $correct_answer_query);

                    while ($solution = mysqli_fetch_object($correct_answer_result)) {
                      $answer_with_prefix = "option".$solution->answerID;

                      $select_option_query = "SELECT $answer_with_prefix FROM `ecDB`.`question_options` WHERE `questionID` = 'z20'";
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
