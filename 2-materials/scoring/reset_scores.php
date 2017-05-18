<?php

  session_start();

  include("../connection.php");

  if ($_POST['start_challenge'] == "START") {

    //remove all older responses
    $remove_old_responses_query = "DELETE FROM `ecDB`.`response` WHERE `userID`= '{$_SESSION['userID']}'";
    mysqli_query($link, $remove_old_responses_query);

    //remove all scores from the materials table
    $remove_old_material_scores_query = "DELETE FROM `ecDB`.`materials_score` WHERE `userID`= '{$_SESSION['userID']}'";
    mysqli_query($link, $remove_old_material_scores_query);

    //update total scores table
    $update_total_score_query = "UPDATE `ecDB`.`total_score` SET `total` = `total` - `materials_score` WHERE `userID`= '{$_SESSION['userID']}'";
    mysqli_query($link, $update_total_score_query);

    $reset_materials_score_query = "UPDATE `ecDB`.`total_score` SET `materials_score` = 0 WHERE `userID`= '{$_SESSION['userID']}'";
    mysqli_query($link, $reset_materials_score_query);

    //set the session variable with the new score
    $new_total_score_query = "SELECT `total` FROM `ecDB`.`total_score` WHERE `userID`= '{$_SESSION['userID']}'";
    $new_total_score_result = mysqli_query($link, $new_total_score_query);

    while ($score = mysqli_fetch_object($new_total_score_result)) {
      $new_total_score = $score->total;
    }
    //update session variable
    $_SESSION['score'] = $new_total_score;
    $_SESSION['material-score'] = 0;
  }

?>
