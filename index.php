<?php include("registration/emailinfo.php"); ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Build an Electric Car!</title>
        <link href="https://fonts.googleapis.com/css?family=Roboto:100,400" rel="stylesheet">
        <link rel="stylesheet" href="css/main.css">
    </head>
    <body>
        <div id="navbar">
            <div id="logo-div">
                <img src="images/logo_white_small.png" />
                <span id="logo-title">The Climate Shift Project</span>
            </div>
            <div id="login-logout-div">
                <a href="registration/login_page.php" id="login-logout-link">LOGIN</a>
            </div>
        </div>
        <div id="container" class="centre-div">
            <div id="centre-stage">
                <img src="images/black_car.jpg" id="homepage-image" />
            </div>
            <div id="header">
                <h2>Learn Math and Science the fun way!</h2>
            </div>
            <div id="sign-up-div">
                <form id="email-form" method="post">
                    <input type="text" name="emailID" placeholder="Enter email address" id="email-box">
                    <input type="submit" name="submit" value="SIGN UP" id="sign-up">
                </form>
            </div>
            <div id="error-div" class="centre-div">
            <?php
            if ($error) {
              echo $error;
            }
            ?>
            </div>
            <div class=centre-div>
                This site is currently in beta.
            </div>
        </div>
    </body>
</html>
