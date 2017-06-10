<!DOCTYPE html>
<html>
    <head>
        <title>Results</title>
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400" rel="stylesheet">
        <link rel="stylesheet" href="../../css/main.css">
        <link rel="stylesheet" href="../../css/stages.css">
        <link rel="stylesheet" href="css/body_area.css">
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
                <h2 style="float: left">You scored <?php session_start(); echo $_SESSION['area-score']; ?> points in this section</h2>
                <div class="centre-div">
                    <a href="body_area.php" class="proceed-link left-adjacent-button">RESTART CHALLENGE</a>
                </div>
                <div class="centre-div">
                    <a href="../4-batteries/batteries.php" class="proceed-link right-adjacent-button">CONTINUE</a>
                </div>
                <div class="empty-div-100px"></div>
                <h4>Correct questions:
                    <?php session_start(); echo $_SESSION['area-correct_questions']; ?>
                </h4>
                <h4>Incorrect questions:
                    <?php session_start(); echo $_SESSION['area-incorrect_questions']; ?>
                </h4>
                <br><br>
                <hr />
                <br>
            </div>
        </div>
    </body>
</html>
