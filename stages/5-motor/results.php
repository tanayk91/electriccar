<!DOCTYPE html>
<html>
    <head>
        <title>Results</title>
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400" rel="stylesheet">
        <link rel="stylesheet" href="../../css/main.css">
        <link rel="stylesheet" href="../../css/stages.css">
        <link rel="stylesheet" href="css/motor.css">
        <link rel="stylesheet" href="../../css/questions.css">
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
      <div id="container">
          <div id="score-summary">
            <h2 style="float: left">You scored <?php session_start(); echo $_SESSION['motor-score']; ?> points in this section</h2>
            <div class="centre-div">
                <a href="landing.php" class="proceed-link left-adjacent-button">RESTART CHALLENGE</a>
            </div>
            <div class="centre-div">
                <a href="motor.php" class="proceed-link right-adjacent-button">CONTINUE</a>
            </div>
            <div class="empty-div-100px"></div>
            <h4>Correct questions:
                <?php session_start(); echo $_SESSION['motor-correct_questions']; ?>
            </h4>
            <h4>Incorrect questions:
                <?php session_start(); echo $_SESSION['motor-incorrect_questions']; ?>
            </h4>
            <br><br>
            <hr />
            <br>
          </div>

          <div id="question-wise-summary">
              <?php
                  include ("../../db/connection.php");
                  session_start();

                  //queries for question 1 start here
                  //query to get question from the database
                  $query_questions = "SELECT `question` FROM `ecDB`.`questions` WHERE questionID = 'd1'";
                  $result_questions = mysqli_query($link, $query_questions);

                  while ($question = mysqli_fetch_object($result_questions)) {
                    echo "<h3>".$question->question."</h3>";
                  }

                  echo "<br>";

                  //query to get user response from database
                  $user_response_query = "SELECT `responseID` FROM `ecDB`.`response` WHERE `questionID` = 'd1' AND `userID` = '{$_SESSION['userID']}'";
                  $user_response_result = mysqli_query($link, $user_response_query);

                  while ($response = mysqli_fetch_object($user_response_result)) {
                    $response_with_prefix = "option".$response->responseID;

                    $select_option_query = "SELECT $response_with_prefix FROM `ecDB`.`question_options` WHERE `questionID` = 'd1'";
                    $select_option_result = mysqli_query($link, $select_option_query);

                    while ($selected_option = mysqli_fetch_object($select_option_result)) {
                      echo "Your response: ".$selected_option->$response_with_prefix;
                      echo "<br><br>";
                    }
                  }

                  //query to get the solution from the database
                  $correct_answer_query = "SELECT `answerID` FROM `ecDB`.`answers` WHERE `questionID` = 'd1'";
                  $correct_answer_result = mysqli_query($link, $correct_answer_query);

                  while ($solution = mysqli_fetch_object($correct_answer_result)) {
                    $answer_with_prefix = "option".$solution->answerID;

                    $select_option_query = "SELECT $answer_with_prefix FROM `ecDB`.`question_options` WHERE `questionID` = 'd1'";
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
                  $query_questions = "SELECT `question` FROM `ecDB`.`questions` WHERE questionID = 'd2'";
                  $result_questions = mysqli_query($link, $query_questions);

                  while ($question = mysqli_fetch_object($result_questions)) {
                    echo "<h3>".$question->question."</h3>";
                  }

                  echo "<br>";

                  //query to get user response from database
                  $user_response_query = "SELECT `responseID` FROM `ecDB`.`response` WHERE `questionID` = 'd2' AND `userID` = '{$_SESSION['userID']}'";
                  $user_response_result = mysqli_query($link, $user_response_query);

                  while ($response = mysqli_fetch_object($user_response_result)) {
                    $response_with_prefix = "option".$response->responseID;

                    $select_option_query = "SELECT $response_with_prefix FROM `ecDB`.`question_options` WHERE `questionID` = 'd2'";
                    $select_option_result = mysqli_query($link, $select_option_query);

                    while ($selected_option = mysqli_fetch_object($select_option_result)) {
                      echo "Your response: ".$selected_option->$response_with_prefix;
                      echo "<br><br>";
                    }
                  }

                  //query to get the solution from the database
                  $correct_answer_query = "SELECT `answerID` FROM `ecDB`.`answers` WHERE `questionID` = 'd2'";
                  $correct_answer_result = mysqli_query($link, $correct_answer_query);

                  while ($solution = mysqli_fetch_object($correct_answer_result)) {
                    $answer_with_prefix = "option".$solution->answerID;

                    $select_option_query = "SELECT $answer_with_prefix FROM `ecDB`.`question_options` WHERE `questionID` = 'd2'";
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
                  $query_questions = "SELECT `question` FROM `ecDB`.`questions` WHERE questionID = 'd3'";
                  $result_questions = mysqli_query($link, $query_questions);

                  while ($question = mysqli_fetch_object($result_questions)) {
                    echo "<h3>".$question->question."</h3>";
                  }

                  echo "<br>";

                  //query to get user response from database
                  $user_response_query = "SELECT `responseID` FROM `ecDB`.`response` WHERE `questionID` = 'd3' AND `userID` = '{$_SESSION['userID']}'";
                  $user_response_result = mysqli_query($link, $user_response_query);

                  while ($response = mysqli_fetch_object($user_response_result)) {
                    $response_with_prefix = "option".$response->responseID;

                    $select_option_query = "SELECT $response_with_prefix FROM `ecDB`.`question_options` WHERE `questionID` = 'd3'";
                    $select_option_result = mysqli_query($link, $select_option_query);

                    while ($selected_option = mysqli_fetch_object($select_option_result)) {
                      echo "Your response: ".$selected_option->$response_with_prefix;
                      echo "<br><br>";
                    }
                  }

                  //query to get the solution from the database
                  $correct_answer_query = "SELECT `answerID` FROM `ecDB`.`answers` WHERE `questionID` = 'd3'";
                  $correct_answer_result = mysqli_query($link, $correct_answer_query);

                  while ($solution = mysqli_fetch_object($correct_answer_result)) {
                    $answer_with_prefix = "option".$solution->answerID;

                    $select_option_query = "SELECT $answer_with_prefix FROM `ecDB`.`question_options` WHERE `questionID` = 'd3'";
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
                  $query_questions = "SELECT `question` FROM `ecDB`.`questions` WHERE questionID = 'd4'";
                  $result_questions = mysqli_query($link, $query_questions);

                  while ($question = mysqli_fetch_object($result_questions)) {
                    echo "<h3>".$question->question."</h3>";
                  }

                  echo "<br>";

                  //query to get user response from database
                  $user_response_query = "SELECT `responseID` FROM `ecDB`.`response` WHERE `questionID` = 'd4' AND `userID` = '{$_SESSION['userID']}'";
                  $user_response_result = mysqli_query($link, $user_response_query);

                  while ($response = mysqli_fetch_object($user_response_result)) {
                    $response_with_prefix = "option".$response->responseID;

                    $select_option_query = "SELECT $response_with_prefix FROM `ecDB`.`question_options` WHERE `questionID` = 'd4'";
                    $select_option_result = mysqli_query($link, $select_option_query);

                    while ($selected_option = mysqli_fetch_object($select_option_result)) {
                      echo "Your response: ".$selected_option->$response_with_prefix;
                      echo "<br><br>";
                    }
                  }

                  //query to get the solution from the database
                  $correct_answer_query = "SELECT `answerID` FROM `ecDB`.`answers` WHERE `questionID` = 'd4'";
                  $correct_answer_result = mysqli_query($link, $correct_answer_query);

                  while ($solution = mysqli_fetch_object($correct_answer_result)) {
                    $answer_with_prefix = "option".$solution->answerID;

                    $select_option_query = "SELECT $answer_with_prefix FROM `ecDB`.`question_options` WHERE `questionID` = 'd4'";
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
                  $query_questions = "SELECT `question` FROM `ecDB`.`questions` WHERE questionID = 'd5'";
                  $result_questions = mysqli_query($link, $query_questions);

                  while ($question = mysqli_fetch_object($result_questions)) {
                    echo "<h3>".$question->question."</h3>";
                  }

                  echo "<br>";

                  //query to get user response from database
                  $user_response_query = "SELECT `responseID` FROM `ecDB`.`response` WHERE `questionID` = 'd5' AND `userID` = '{$_SESSION['userID']}'";
                  $user_response_result = mysqli_query($link, $user_response_query);

                  while ($response = mysqli_fetch_object($user_response_result)) {
                    $response_with_prefix = "option".$response->responseID;

                    $select_option_query = "SELECT $response_with_prefix FROM `ecDB`.`question_options` WHERE `questionID` = 'd5'";
                    $select_option_result = mysqli_query($link, $select_option_query);

                    while ($selected_option = mysqli_fetch_object($select_option_result)) {
                      echo "Your response: ".$selected_option->$response_with_prefix;
                      echo "<br><br>";
                    }
                  }

                  //query to get the solution from the database
                  $correct_answer_query = "SELECT `answerID` FROM `ecDB`.`answers` WHERE `questionID` = 'd5'";
                  $correct_answer_result = mysqli_query($link, $correct_answer_query);

                  while ($solution = mysqli_fetch_object($correct_answer_result)) {
                    $answer_with_prefix = "option".$solution->answerID;

                    $select_option_query = "SELECT $answer_with_prefix FROM `ecDB`.`question_options` WHERE `questionID` = 'd5'";
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
               ?>

          </div>
      </div>
    </body>
</html>
