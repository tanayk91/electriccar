<?php

session_start();

include("db/connection.php");

if ($_POST['submit']=="SIGN UP") {

if (!$_POST['emailID']) $error.="<br />Please enter your email ID";
  else if (!filter_var($_POST['emailID'], FILTER_VALIDATE_EMAIL)) $error.="<br />Please enter a valid email ID";

if ($error) $error = "There were error(s) in your sign up details:".$error;

else {

  $query= "SELECT * FROM `ecDB`.`userinfo` WHERE emailID ='".mysqli_real_escape_string($link, $_POST['emailID'])."'";

  $result = mysqli_query($link, $query);

  $results = mysqli_num_rows($result);

  if ($results) $error = "That email ID is already registered. Do you want to log in?";

  else {

  $query = "INSERT INTO `ecDB`.`userinfo` (`emailID`) VALUES ('".mysqli_real_escape_string($link, $_POST['emailID'])."')";

    mysqli_query($link, $query);

    $_SESSION['userID']= mysqli_insert_id($link);

    header("Location:registration/registration_page.php");

  }

}

}

?>
