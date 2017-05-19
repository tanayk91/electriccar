<?php

  session_start();

  include("../../../db/connection.php");

  if ($_POST['check-area'] == "Next") {

    if ($_POST['front-door']) {
      $question = "b1";
      $answer = $_POST['front-door'];
    } elseif ($_POST['back-door']) {
      $question = "b2";
      $answer = $_POST['back-door'];
    } elseif ($_POST['roof']) {
      $question = "b3";
      $answer = $_POST['roof'];
    } elseif ($_POST['bonnet']) {
      $question = "b4";
      $answer = $_POST['bonnet'];
    }

  //query to store user response in database
    $save_user_response_query = "INSERT INTO `ecDB`.`response` (`userID`,`questionID`,`responseID`) VALUES ('{$_SESSION['userID']}', '".$question."','".$answer."')";
    mysqli_query($link, $save_user_response_query);

    //query to get the solution from the database
    $correct_answer_query = "SELECT `answerID` FROM `ecDB`.`answers` WHERE (`questionID` = '".$question."') ";
    $correct_answer_result = mysqli_query($link, $correct_answer_query);

    //compare user answer to the solution, and update the database
    while ($solution = mysqli_fetch_object($correct_answer_result)) {

      if ($answer == $solution->answerID) {

        $update_area_score_query = "INSERT INTO `ecDB`.`area_score` (`userID`,`questionID`,`correct`,`time_taken`,`score`) VALUES ('{$_SESSION['userID']}','".$question."',1,10,10)";
        mysqli_query($link, $update_area_score_query);

      } else {

        $update_area_score_query = "INSERT INTO `ecDB`.`area_score` (`userID`,`questionID`,`correct`,`time_taken`,`score`) VALUES ('{$_SESSION['userID']}','".$question."',0,10,0)";
        mysqli_query($link, $update_area_score_query);

      }
    }
  }

?>
