<!DOCTYPE html>
<html>
    <head>
        <title>Results</title>
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400" rel="stylesheet">
        <link rel="stylesheet" href="../css/main.css">
        <link rel="stylesheet" href="../css/stages.css">
        <link rel="stylesheet" href="css/body_material.css">
        <link rel="stylesheet" href="css/material_questions.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    </head>
    <body>
      <div id="navbar">
          <div id="logo-div">
              <img src="../css/logo_white_small.png" />
              <span id="logo-title">The Climate Shift Project</span>
          </div>
          <div id="login-logout-div">
              <a href="../index.php" id="login-logout-link">LOGOUT</a>
          </div>
      </div>
        <div id="progress-bar">
        </div>
        <div id="container-small">
            <h2 class="centre-div">Results</h2>
            <br><br><br>
            <h4>Total score in this section:
                <?php session_start(); echo $_SESSION['material-score']; ?>
            </h4>
            <!--h4>Number of correct questions:
            </h4>
            <h4>Number of incorrect questions:
            </h4-->
            <br><br><br>
            <form method="post" action="landing.php">
                <div class="centre-div">
                    <input type="submit" name='end-challenge' value="RESTART CHALLENGE" class="proceed-button" id="restart-button" />
                </div>
            </form>
            <form method="post" action="../stages/3-body_area/body_area.php">
                <div class="centre-div">
                    <input type="submit" name='next-page' value="CONTINUE" class="proceed-button" id="continue-button" />
                </div>
            </form>
        </div>
    </body>
</html>
