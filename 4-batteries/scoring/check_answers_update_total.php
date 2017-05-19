<?php

session_start();

//connecting to database
include ("../../../db/connection.php");

if ($_POST['check'] == "Check Answers!") {

  //converting quetionID to int to use with database
  $selected_question = (is_numeric($_POST['question']) ? (int)$_POST['question'] : 0);
  //saving questionID in the format used in the database
  $store_questionID = "c".$selected_question;

  //storing user answer in an array
  $answer = "";
  $question_name = "ques_".$selected_question;
  $user_answers = $_POST[$question_name];

  foreach ($user_answers as $user_answer) {
    $answer = $user_answer.$answer;
  }

  //query to store user response in database
  $save_user_response_query = "INSERT INTO `ecDB`.`response` (`userID`,`questionID`,`responseID`) VALUES ('{$_SESSION['userID']}', '".$store_questionID."','".$answer."')";
  mysqli_query($link, $save_user_response_query);

  //query to get the solution from the database
  $correct_answer_query = "SELECT `answerID` FROM `ecDB`.`answers` WHERE `questionID` = '".$store_questionID."'";
  $correct_answer_result = mysqli_query($link, $correct_answer_query);

  //compare user answer to the solution, and update the database
  while ($solution = mysqli_fetch_object($correct_answer_result)) {
    if ($answer == $solution->answerID) {
      $update_battery_score_query = "INSERT INTO `ecDB`.`batteries_score` (`userID`,`questionID`,`correct`,`time_taken`,`score`) VALUES ('{$_SESSION['userID']}','".$store_questionID."',1,10,10)";
      mysqli_query($link, $update_battery_score_query);
    } else {
      $update_battery_score_query = "INSERT INTO `ecDB`.`batteries_score` (`userID`,`questionID`,`correct`,`time_taken`,`score`) VALUES ('{$_SESSION['userID']}','".$store_questionID."',0,10,0)";
      mysqli_query($link, $update_battery_score_query);
    }
  }

  $battery_score = array();
  $total_battery_score = 0;

  //add all the scores in the batteries section
  $add_battery_scores_query = "SELECT `score` FROM `ecDB`.`batteries_score` WHERE `userID` = '{$_SESSION['userID']}'";
  $add_battery_scores_result = mysqli_query($link, $add_battery_scores_query);

  while ($battery_single_score = mysqli_fetch_object($add_battery_scores_result)) {
    $battery_score[] = $battery_single_score;
  }

  foreach ($battery_score as $battery_single_score) {
    $total_battery_score = $total_battery_score + $battery_single_score->score;
  }

  //get total number of correct questions
  $correct_questions_query = "SELECT `score` FROM `ecDB`.`batteries_score` WHERE `userID` = '{$_SESSION['userID']}' AND `score` = 10";
  $correct_questions_result = mysqli_query($link, $correct_questions_query);
  $num_correct_questions = mysqli_num_rows($correct_questions_result);

  $_SESSION['correct_questions'] = $num_correct_questions;

  //get total number of incorrect questions
  $incorrect_questions_query = "SELECT `score` FROM `ecDB`.`batteries_score` WHERE `userID` = '{$_SESSION['userID']}' AND `score` = 0";
  $incorrect_questions_result = mysqli_query($link, $incorrect_questions_query);
  $num_incorrect_questions = mysqli_num_rows($incorrect_questions_result);

  $_SESSION['incorrect_questions'] = $num_incorrect_questions;

  //save the battery score in a session variable
  $_SESSION['battery-score'] = $total_battery_score;

  //save the total score in a session variable
  $_SESSION['score'] = $_SESSION['score'] + $total_battery_score;

  //update total scores table with the updated score
  $update_scores_query = "UPDATE `ecDB`.`total_score` SET `total`= `total` + '".$total_battery_score."', `batteries_score`= '".$total_battery_score."' WHERE `userID`= '{$_SESSION['userID']}'";
  mysqli_query($link, $update_scores_query);
}
 ?>
