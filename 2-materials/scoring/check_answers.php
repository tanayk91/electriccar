<?php

session_start();

//connecting to database
include ("../../../db/connection.php");

if ($_POST['check'] == "Next Question") {

  //converting quetionID to int to use with database
  $selected_question = (is_numeric($_POST['question']) ? (int)$_POST['question'] : 0);
  //saving questionID in the format used in the database
  $store_questionID = "a".$selected_question;

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
      $update_material_score_query = "INSERT INTO `ecDB`.`materials_score` (`userID`,`questionID`,`correct`,`time_taken`,`score`) VALUES ('{$_SESSION['userID']}','".$store_questionID."',1,10,10)";
      mysqli_query($link, $update_material_score_query);
    } else {
      $update_material_score_query = "INSERT INTO `ecDB`.`materials_score` (`userID`,`questionID`,`correct`,`time_taken`,`score`) VALUES ('{$_SESSION['userID']}','".$store_questionID."',0,10,0)";
      mysqli_query($link, $update_material_score_query);
    }
  }
}
 ?>
