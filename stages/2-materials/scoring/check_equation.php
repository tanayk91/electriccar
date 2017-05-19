<?php

session_start();

//connecting to database
include ("../../../db/connection.php");

if ($_POST['check'] == 'Check Answer!') {
  $total_material_score = 0;

  //saving questionID in the format used in the database
  $store_questionID = "a11";

  //storing user answer in an array
  $answer = $_POST['ques_11'];

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
      $total_material_score = $total_material_score + 10;
      //save the material score in a session variable
      $_SESSION['material-score'] = $total_material_score;

      //save the total score in a session variable
      $_SESSION['score'] = $_SESSION['score'] + $total_material_score;

      //update total scores table with the updated score
      $update_scores_query = "UPDATE `ecDB`.`total_score` SET `total`= `total` + '".$total_material_score."', `materials_score`= '".$total_material_score."' WHERE `userID`= '{$_SESSION['userID']}'";
      mysqli_query($link, $update_scores_query);

      $_SESSION['equation-correct'] = "correct";

    } else {
      $update_material_score_query = "INSERT INTO `ecDB`.`materials_score` (`userID`,`questionID`,`correct`,`time_taken`,`score`) VALUES ('{$_SESSION['userID']}','".$store_questionID."',0,10,0)";
      mysqli_query($link, $update_material_score_query);
      //save the material score in a session variable
      $_SESSION['material-score'] = $total_material_score;

      //save the total score in a session variable
      $_SESSION['score'] = $_SESSION['score'] + $total_material_score;

      //update total scores table with the updated score
      $update_scores_query = "UPDATE `ecDB`.`total_score` SET `total`= `total` + '".$total_material_score."', `materials_score`= '".$total_material_score."' WHERE `userID`= '{$_SESSION['userID']}'";
      mysqli_query($link, $update_scores_query);

      $_SESSION['equation-correct'] = "incorrect";

    }
  }
}
 ?>
