<?php

session_start();

include("../db/connection.php");

if ($_POST['login'] == "Login") {

  $query = "SELECT * FROM `ecDB`.`userinfo` WHERE username='".mysqli_real_escape_string($link, $_POST['loginusername'])."'AND
  password='" .md5(md5($_POST['loginusername']) .$_POST['loginpassword']). "'LIMIT 1";

  $result = mysqli_query($link, $query);
  $row = mysqli_fetch_array($result);

  $_SESSION['userID']= $row['userID'];

  if($row){

    header("Location:../stages/1-intro/delhi1.php");

  } else {

    $error = "We could not find a user with that username and password. Please try again.";

  }
}

?>
