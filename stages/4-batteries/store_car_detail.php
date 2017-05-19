<?php

  session_start();
  include ("../../db/connection.php");

  if (isset($_POST['action'])) {
    //query to store user material in database
    $update_user_material_query = "UPDATE `ecDB`.`car_details` SET `battery` = '{$_POST['action']}' WHERE `userID`= '{$_SESSION['userID']}'";
    mysqli_query($link, $update_user_material_query);
  }

?>
