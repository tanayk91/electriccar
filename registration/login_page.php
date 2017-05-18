<?php include("login.php") ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,400" rel="stylesheet">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/registration.css">

  </head>
  <body>
      <div id="navbar">
          <div id="logo-div">
              <img src="../images/logo_white_small.png" />
              <span id="logo-title">The Climate Shift Project</span>
          </div>
      </div>
      <div id="login-form">
          <form method="post">
              <input type="text" name="loginusername" class="text-field-position-login text-field-styling" placeholder="Enter username" />
              <input type="password" name="loginpassword" class="text-field-position-login text-field-styling" placeholder="Enter password" />
              <input type="submit" name="login" value="Login" class="submit-form centre-div" />
          </form>
          <div id="error-div" class="centre-div">
          <?php
          if ($error) {
            echo $error;
          }
          ?>
          </div>
          <div id="reg-login-toggle" class="centre-div">
              New User?
              <a href="registration_page.php">Register Here</a>
          </div>
      </div>
  </body>
</html>
