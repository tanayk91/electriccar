<?php

session_start();

include("../db/connection.php");

if ($_POST['signup']=="Get Started") {

if (!$_POST['username']) $error.="<br />Please enter your username";
if (!$_POST['first-name']) $error.="<br />Please enter your first name";
if (!$_POST['last-name']) $error.="<br />Please enter your last name";

if (!$_POST['password']) $error.="<br />Please enter your password";
else {


if (strlen($_POST['password'])<8) $error.="<br />Your password should have at least 8 characters";

if(!preg_match('/[A-Z]/', $_POST['password'])) $error.= "<br />Your password should include at least 1 capital letter";
}
if ($error) $error = "There were error(s) in your sign up details:".$error;

else {



$query= "SELECT * FROM `ecDB`.`userinfo` WHERE `username` ='".mysqli_real_escape_string($link, $_POST['username'])."'";

$result = mysqli_query($link, $query);

$results = mysqli_num_rows($result);

if ($results) $error = "This username is already registered.";

else {

  $store_user_info_query = "UPDATE `ecDB`.`userinfo` SET `username`='".mysqli_real_escape_string($link, $_POST['username'])."', `password`='".md5(md5($_POST['username']).$_POST['password'])."', `firstname`='".mysqli_real_escape_string($link, $_POST['first-name'])."', `lastname`='".mysqli_real_escape_string($link, $_POST['last-name'])."', `class`='".mysqli_real_escape_string($link, $_POST['current-class'])."' WHERE `userID`= '{$_SESSION['userID']}'";
  mysqli_query($link, $store_user_info_query);

  $set_scores_query = "INSERT INTO `ecDB`.`total_score` (`userID`, `total`, `pollution_score`, `materials_score`, `area_score`, `batteries_score`, `motor_score`, `wheels_score`) VALUES ('{$_SESSION['userID']}', 0, 0, 0, 0, 0, 0, 0)";
  mysqli_query($link, $set_scores_query);

  $set_car_details_query = "INSERT INTO `ecDB`.`car_details` (`userID`, `material`, `battery`, `motor`, `wheels`) VALUES ('{$_SESSION['userID']}', '', '', '', '')";
  mysqli_query($link, $set_car_details_query);

  //save the total score in a session variable
  $_SESSION['score'] = 0;

  header("Location:interests.php");

}

}

}

 ?>
