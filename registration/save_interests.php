<?php

  session_start();

  include("../db/connection.php");

  if ($_POST['interests-selected'] =="CONTINUE >>" ) {
    if ($_POST['geom-counter'] != 0) {
      $query = "INSERT INTO `ecDB`.`interests` (`userID`,`interest`,`subject`) VALUES ('{$_SESSION['userID']}','Geometry','Math')";
      mysqli_query($link, $query);
    }

    if ($_POST['elec-counter'] != 0) {
      $query = "INSERT INTO `ecDB`.`interests` (`userID`,`interest`,`subject`) VALUES ('{$_SESSION['userID']}','Electricity','Science')";
      mysqli_query($link, $query);
    }

    if ($_POST['alg-counter'] != 0) {
      $query = "INSERT INTO `ecDB`.`interests` (`userID`,`interest`,`subject`) VALUES ('{$_SESSION['userID']}','Algebra','Math')";
      mysqli_query($link, $query);
    }

    if ($_POST['light-counter'] != 0) {
      $query = "INSERT INTO `ecDB`.`interests` (`userID`,`interest`,`subject`) VALUES ('{$_SESSION['userID']}','Light','Science')";
      mysqli_query($link, $query);
    }

    if ($_POST['metals-nonmetals-counter'] != 0) {
      $query = "INSERT INTO `ecDB`.`interests` (`userID`,`interest`,`subject`) VALUES ('{$_SESSION['userID']}','Metals-Nonmetals','Science')";
      mysqli_query($link, $query);
    }

    if ($_POST['circles-counter'] != 0) {
      $query = "INSERT INTO `ecDB`.`interests` (`userID`,`interest`,`subject`) VALUES ('{$_SESSION['userID']}','Circles','Math')";
      mysqli_query($link, $query);
    }

    if ($_POST['coal-petro-counter'] != 0) {
      $query = "INSERT INTO `ecDB`.`interests` (`userID`,`interest`,`subject`) VALUES ('{$_SESSION['userID']}','Coal-Petroleum','Science')";
      mysqli_query($link, $query);
    }
  }

 ?>
