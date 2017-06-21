<?php include("registration.php"); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Register</title>
        <link href="https://fonts.googleapis.com/css?family=Roboto:100,400" rel="stylesheet">
        <link rel="stylesheet" href="../css/main.css">
        <link rel="stylesheet" href="../css/registration.css">

    </head>
    <body>
        <div id="navbar">
        </div>
        <div id="registration-form">
            <form method="post">
                <input type="text" name="first-name" class="text-field-position-registration text-field-styling" placeholder="First Name" value="<?php echo addcslashes($_POST['first-name']); ?>">
                <input type="text" name="last-name" class="text-field-position-registration text-field-styling" placeholder="Last Name" value="<?php echo addcslashes($_POST['last-name']); ?>"><br>
                <input type="text" name="username" class="text-field-position-registration text-field-styling" placeholder="Create a username" value="<?php echo addcslashes($_POST['username']); ?>">
                <input type="password" name="password" class="text-field-position-registration text-field-styling" placeholder="Create a password"><br>
                <select name="current-class">
                    <option value="eighth">Class 8</option>
                    <option value="ninth">Class 9</option>
                    <option value="tenth">Class 10</option>
                </select>
                <!--?php
                  if ($_SESSION['userID']) {
                    $get_email_query = "SELECT `emailID` FROM `ecDB`.`userinfo` WHERE `userID` = '{$_SESSION['userID']}'";
                    $get_email_result = mysqli_query($link, $get_email_query);
                    while ($user_emailid = mysqli_fetch_object($get_email_result)) {
                      $emailid = $user_emailid->emailID;
                    } else {
                      $emailid = "Enter email address";
                    }
                  }
                  echo "<input type='text' name='emailID' class='text-field-position-registration text-field-styling' placeholder=".$emailid."><br>";
                 ?-->
                <input type="submit" name="signup" value="Get Started" class="submit-form centre-div" /><br>
            </form>
            <div id="error-div" class="centre-div">
            <?php
            if ($error) {
              echo $error;
            }
            ?>
            </div>
            <div id="reg-login-toggle" class="centre-div">
                Already Registered?
                <a href="login_page.php">Login Here</a>
            </div>
        </div>
    </body>
</html>
