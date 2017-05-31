<!DOCTYPE html>
<html>
    <head>
        <title>Results</title>
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400" rel="stylesheet">
        <link rel="stylesheet" href="../../css/main.css">
        <link rel="stylesheet" href="../../css/stages.css">
        <link rel="stylesheet" href="css/delhi.css">
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
                <h2 style="float: left">You scored <!--?php session_start(); echo $_SESSION['pollution-score']; ?--> points in this section</h2>
                <div class="right-adjacent-button" style="margin-left: 40px">
                    <a href="delhi3.php" class="proceed-link centre-div">CONTINUE</a>
                </div>
                <div class="right-adjacent-button">
                    <a href="questions/pollution_questions_q1.php" class="proceed-link centre-div">RESTART CHALLENGE</a>
                </div>
                <div class="empty-div-100px"></div>
                <h4>Correct questions:
                    <!--?php session_start(); echo $_SESSION['correct_questions']; ?-->
                </h4>
                <h4>Incorrect questions:
                    <!--?php session_start(); echo $_SESSION['incorrect_questions']; ?-->
                </h4>
                <br><br>
                <hr />
                <br>
            </div>
            <div id="question-wise-summary">
                <?php
                    include ("../../db/connection.php");
                    session_start();

                    //query to get question from the database
                    $query_questions = "SELECT `question` FROM `ecDB`.`questions` WHERE questionID = 'z1'";
                    $result_questions = mysqli_query($link, $query_questions);

                    while ($question = mysqli_fetch_object($result_questions)) {
                      echo "<h3>".$question->question."</h3>";
                    }

                    echo "<br>";

                    //query to get user response from database
                    $user_response_query = "SELECT `responseID` FROM `ecDB`.`response` WHERE `questionID` = 'z1' AND `userID` = '{$_SESSION['userID']}' LIMIT 1";
                    $user_response_result = mysqli_query($link, $user_response_query);

                    while ($response = mysqli_fetch_object($user_response_result)) {
                      echo "Your response: ".$response->responseID;
                      echo "<br>";
                    }

                    //query to get the solution from the database
                    $correct_answer_query = "SELECT `answerID` FROM `ecDB`.`answers` WHERE `questionID` = 'z1'";
                    $correct_answer_result = mysqli_query($link, $correct_answer_query);

                    while ($solution = mysqli_fetch_object($correct_answer_result)) {
                      echo "Correct answer: ".$solution->answerID;
                      echo "<br>";
                      if ($response == $solution->answerID) {
                        echo "Points scored: 10";
                      } else {
                        echo "Points scored: 0";
                      }
                    }

                 ?>
                 <br><br><br>
                 <hr />
                 <br>
            </div>
        </div>
    </body>
</html>
