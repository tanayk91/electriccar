<?php
  include("scoring/reset_scores.php");
  if ($_POST['start_challenge'] == "START") {
    header('Location: questions/wheels_questions_q1.php');
  }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Start the quiz</title>
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400" rel="stylesheet">
        <link rel="stylesheet" href="../../css/main.css">
        <link rel="stylesheet" href="../../css/stages.css">
        <link rel="stylesheet" href="../../css/questions.css">
        <link rel="stylesheet" href="css/wheels.css">
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
            <div id="user-score">
                <?php session_start(); echo "<span id='score-style'>". $_SESSION['score']."</span>"." points"; ?>
            </div>
        </div>
        <div id="container">
            <h2 class="centre-div">Before you begin...</h2>
            <p id="challenge-rules">
                <ul>
                    <li>The questions can either have one or more correct answers. Read the instructions for each question carefully.
                    <li>Each correct question adds to your score. There is no negative marking for incorrect questions.
                    <li>You can attempt the quiz more than once if you don't get all questions right in the first attempt.
                </ul>
                <p>Good luck!</p>
            </p>
            <form method="post">
                <div class="centre-div">
                    <input type="submit" name="start_challenge" value="START" class="proceed-button"/>
                </div>
            </form>
        </div>
    </body>
</html>
