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
        <div id="container-small">
            <h2 class="centre-div">Results</h2>
            <br><br><br>
            <h4>Total score in this section:
                <?php session_start(); echo $_SESSION['pollution-score']; ?>
            </h4>
            <h4>Number of correct questions:
                <?php session_start(); echo $_SESSION['correct_questions']; ?>
            </h4>
            <h4>Number of incorrect questions:
                <?php session_start(); echo $_SESSION['incorrect_questions']; ?>
            </h4>
            <br><br><br>
            <div class="centre-div">
                <a href="questions/pollution_questions_q5.php" class="proceed-link left-adjacent-button">RESTART CHALLENGE</a>
            </div>
            <div class="centre-div">
                <a href="electriccar.php" class="proceed-link right-adjacent-button">CONTINUE</a>
            </div>
        </div>
    </body>
</html>
