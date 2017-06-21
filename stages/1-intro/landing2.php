<?php
  include("scoring/reset_scores.php");
  if ($_POST['start_challenge'] == "START") {
    header('Location: questions/pollution_questions_stage1.php');
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
            <h2 class="centre-div">Concept Review</h2>
            <p>Before you attempt the challenge, go through the concepts presented in these Khan Academy videos.</p>
            <h4>Reading Bar Graphs</h4>
            <iframe width="560" height="315" src="https://www.youtube.com/embed/kiQ6MUQZHSs" frameborder="0" allowfullscreen></iframe>
            <hr />
            <h4>Pie Graphs</h4>
            <iframe width="560" height="315" src="https://www.youtube.com/embed/4JqH55rLGKY" frameborder="0" allowfullscreen></iframe>
            <hr />
            <p>NOTE: All KHAN ACADEMY&reg; content is available for free at www.khanacademy.org</p>
            <br><br>
            <h3 class="centre-div">You will now attempt a challenge based on the concepts explained above</h3>
            <p id="challenge-rules">
                <ul>
                    <li>The questions can either have one or more correct answers. Read the instructions for each question carefully.
                    <li>Each correct question adds to your score. There is no negative marking for incorrect questions.
                    <li>You can attempt the quiz more than once if you don't get all questions right in the first attempt.
                </ul>
            </p>
            <form method="post">
                <div class="centre-div">
                    <input type="submit" name="start_challenge" value="START" class="proceed-button"/>
                </div>
            </form>
        </div>
    </body>
</html>
