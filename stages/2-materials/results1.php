<!DOCTYPE html>
<html>
    <head>
        <title>Results</title>
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400" rel="stylesheet">
        <link rel="stylesheet" href="../../css/main.css">
        <link rel="stylesheet" href="../../css/stages.css">
        <link rel="stylesheet" href="css/body_material.css">
        <link rel="stylesheet" href="css/material_questions.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    </head>
    <body>
      <div id="navbar">
          <div id="logo-div">
              <img src="../../images/logo_white_small.png" />
              <span id="logo-title">The Climate Shift Project</span>
          </div>
          <div id="login-logout-div">
              <a href="../../index.php" id="login-logout-link">LOGOUT</a>
          </div>
      </div>
        <div id="progress-bar">
        </div>
        <div id="container">
            <div id="score-summary">
                <h2 style="float: left">You scored <?php session_start(); echo $_SESSION['materials-score-1']; ?> points in this section</h2>
                <div class="right-adjacent-button" style="margin-left: 40px">
                    <a href="body_material4.php" class="proceed-link centre-div">CONTINUE</a>
                </div>
                <div class="right-adjacent-button">
                    <a href="body_material3.php" class="proceed-link centre-div">RESTART CHALLENGE</a>
                </div>
                <div class="empty-div-100px"></div>
                <h4>Correct questions:
                    <?php session_start(); echo $_SESSION['material-1-correct_questions']; ?>
                </h4>
                <h4>Incorrect questions:
                    <?php session_start(); echo $_SESSION['material-1-incorrect_questions']; ?>
                </h4>
                <br><br>
                <hr />
                <br>
            </div>
            <div id="more-info">
                <h4>Learn more: </h4>
                <a href="https://en.wikipedia.org/wiki/Metal#Properties" target="_blank">"Properties (Metal)," Wikipedia, the free encyclopedia</a><br>
                <a href="https://en.wikipedia.org/wiki/Nonmetal#Definition_and_properties" target="_blank">"Definition and properties (Nonmetal)," Wikipedia, the free encyclopedia</a>
                <br><br>
                <hr />
                <br>
            </div>
            <h3>Choose body material</h3>
            <div id="clear"></div>
            <br>
            <div id="user-options" class="centre-div">
                <button id='stainless-steel-button' name='stainless-steel' value='stainless-steel'>Stainless Steel</button>
                    <?php

                      session_start();
                      include ("../../db/connection.php");

                      $get_material_score_query = "SELECT `total`,`materials_score` FROM `ecDB`.`total_score` WHERE `userID` = '{$_SESSION['userID']}'";
                      $get_material_score_result = mysqli_query($link, $get_material_score_query);

                      while ($get_material_score = mysqli_fetch_object($get_material_score_result)) {
                        if (($get_material_score->materials_score >= 20) && ($get_material_score->materials_score <= 30)) {
                          echo "<button id='aluminium-button' name='aluminium' value='aluminium'>Aluminium</button>";
                          echo "<button id='carbon-fiber-button' name='carbon-fiber' value='carbon-fiber' disabled>Carbon Fiber</button>";
                          echo "<h4>To unlock Carbon Fiber, you need to score 80% or above on the challenge.</h4>";
                        } elseif ($get_material_score->materials_score >= 40) {
                          echo "<button id='aluminium-button' name='aluminium' value='aluminium'>Aluminium</button>";
                          echo "<button id='carbon-fiber-button' name='carbon-fiber' value='carbon-fiber'>Carbon Fiber</button>";
                          echo "<h4>Awesome! You now have high grade Carbon Fiber, the lightest and strongest material for your car!</h4>";
                        } else {
                          echo "<button id='aluminium-button' name='aluminium' value='aluminium' disabled>Aluminium</button>";
                          echo "<button id='carbon-fiber-button' name='carbon-fiber' value='carbon-fiber' disabled>Carbon Fiber</button>";
                          echo "<h4>To unlock Aluminium and Carbon Fiber, you need to complete this challenge.</h4>";
                        }
                      }
                ?>
            </div>
            <br>
            <hr />
            <br>
            <div id="question-wise-summary">
                <h4>Question Wise Summary</h4>
                <?php
                    include ("../../db/connection.php");
                    session_start();

                    //queries for question 1 start here
                    //query to get question from the database
                    $query_questions = "SELECT `question` FROM `ecDB`.`questions` WHERE questionID = 'a1'";
                    $result_questions = mysqli_query($link, $query_questions);

                    while ($question = mysqli_fetch_object($result_questions)) {
                      echo "<h3>".$question->question."</h3>";
                    }

                    echo "<br>";

                    //query to get user response from database
                    $user_response_query = "SELECT `responseID` FROM `ecDB`.`response` WHERE `questionID` = 'a1' AND `userID` = '{$_SESSION['userID']}'";
                    $user_response_result = mysqli_query($link, $user_response_query);

                    while ($response = mysqli_fetch_object($user_response_result)) {
                      $response_with_prefix = "option".$response->responseID;

                      $select_option_query = "SELECT $response_with_prefix FROM `ecDB`.`question_options` WHERE `questionID` = 'a1'";
                      $select_option_result = mysqli_query($link, $select_option_query);

                      while ($selected_option = mysqli_fetch_object($select_option_result)) {
                        echo "Your response: ".$selected_option->$response_with_prefix;
                        echo "<br><br>";
                      }
                    }

                    //query to get the solution from the database
                    $correct_answer_query = "SELECT `answerID` FROM `ecDB`.`answers` WHERE `questionID` = 'a1'";
                    $correct_answer_result = mysqli_query($link, $correct_answer_query);

                    while ($solution = mysqli_fetch_object($correct_answer_result)) {
                      $answer_with_prefix = "option".$solution->answerID;

                      $select_option_query = "SELECT $answer_with_prefix FROM `ecDB`.`question_options` WHERE `questionID` = 'a1'";
                      $select_option_result = mysqli_query($link, $select_option_query);

                      while ($selected_option = mysqli_fetch_object($select_option_result)) {
                        echo "Correct answer: ".$selected_option->$answer_with_prefix;
                        echo "<br><br>";
                      }

                      if ($response->responseID == $solution->answerID) {
                        echo "Points scored: 10";
                      } else {
                        echo "Points scored: 0";
                      }
                    }

                    echo "<br><br><br><hr /><br>";

                    //queries for question 1 end here

                    //queries for question 2 start here
                    //query to get question from the database
                    $query_questions = "SELECT `question` FROM `ecDB`.`questions` WHERE questionID = 'a2'";
                    $result_questions = mysqli_query($link, $query_questions);

                    while ($question = mysqli_fetch_object($result_questions)) {
                      echo "<h3>".$question->question."</h3>";
                    }

                    echo "<br>";

                    //query to get user response from database
                    $user_response_query = "SELECT `responseID` FROM `ecDB`.`response` WHERE `questionID` = 'a2' AND `userID` = '{$_SESSION['userID']}'";
                    $user_response_result = mysqli_query($link, $user_response_query);

                    while ($response = mysqli_fetch_object($user_response_result)) {
                      $response_with_prefix = "option".$response->responseID;

                      $select_option_query = "SELECT $response_with_prefix FROM `ecDB`.`question_options` WHERE `questionID` = 'a2'";
                      $select_option_result = mysqli_query($link, $select_option_query);

                      while ($selected_option = mysqli_fetch_object($select_option_result)) {
                        echo "Your response: ".$selected_option->$response_with_prefix;
                        echo "<br><br>";
                      }
                    }

                    //query to get the solution from the database
                    $correct_answer_query = "SELECT `answerID` FROM `ecDB`.`answers` WHERE `questionID` = 'a2'";
                    $correct_answer_result = mysqli_query($link, $correct_answer_query);

                    while ($solution = mysqli_fetch_object($correct_answer_result)) {
                      $answer_with_prefix = "option".$solution->answerID;

                      $select_option_query = "SELECT $answer_with_prefix FROM `ecDB`.`question_options` WHERE `questionID` = 'a2'";
                      $select_option_result = mysqli_query($link, $select_option_query);

                      while ($selected_option = mysqli_fetch_object($select_option_result)) {
                        echo "Correct answer: ".$selected_option->$answer_with_prefix;
                        echo "<br><br>";
                      }

                      if ($response->responseID == $solution->answerID) {
                        echo "Points scored: 10";
                      } else {
                        echo "Points scored: 0";
                      }
                    }

                    echo "<br><br><br><hr /><br>";

                    //queries for question 2 end here

                    //queries for question 3 start here
                    //query to get question from the database
                    $query_questions = "SELECT `question` FROM `ecDB`.`questions` WHERE questionID = 'a3'";
                    $result_questions = mysqli_query($link, $query_questions);

                    while ($question = mysqli_fetch_object($result_questions)) {
                      echo "<h3>".$question->question."</h3>";
                    }

                    echo "<br>";

                    //query to get user response from database
                    $user_response_query = "SELECT `responseID` FROM `ecDB`.`response` WHERE `questionID` = 'a3' AND `userID` = '{$_SESSION['userID']}'";
                    $user_response_result = mysqli_query($link, $user_response_query);

                    while ($response = mysqli_fetch_object($user_response_result)) {
                      $response_with_prefix = "option".$response->responseID;

                      $select_option_query = "SELECT $response_with_prefix FROM `ecDB`.`question_options` WHERE `questionID` = 'a3'";
                      $select_option_result = mysqli_query($link, $select_option_query);

                      while ($selected_option = mysqli_fetch_object($select_option_result)) {
                        echo "Your response: ".$selected_option->$response_with_prefix;
                        echo "<br><br>";
                      }
                    }

                    //query to get the solution from the database
                    $correct_answer_query = "SELECT `answerID` FROM `ecDB`.`answers` WHERE `questionID` = 'a3'";
                    $correct_answer_result = mysqli_query($link, $correct_answer_query);

                    while ($solution = mysqli_fetch_object($correct_answer_result)) {
                      $answer_with_prefix = "option".$solution->answerID;

                      $select_option_query = "SELECT $answer_with_prefix FROM `ecDB`.`question_options` WHERE `questionID` = 'a3'";
                      $select_option_result = mysqli_query($link, $select_option_query);

                      while ($selected_option = mysqli_fetch_object($select_option_result)) {
                        echo "Correct answer: ".$selected_option->$answer_with_prefix;
                        echo "<br><br>";
                      }

                      if ($response->responseID == $solution->answerID) {
                        echo "Points scored: 10";
                      } else {
                        echo "Points scored: 0";
                      }
                    }

                    echo "<br><br><br><hr /><br>";

                    //queries for question 3 end here

                    //queries for question 4 start here
                    //query to get question from the database
                    $query_questions = "SELECT `question` FROM `ecDB`.`questions` WHERE questionID = 'a4'";
                    $result_questions = mysqli_query($link, $query_questions);

                    while ($question = mysqli_fetch_object($result_questions)) {
                      echo "<h3>".$question->question."</h3>";
                    }

                    echo "<br>";

                    //query to get user response from database
                    $user_response_query = "SELECT `responseID` FROM `ecDB`.`response` WHERE `questionID` = 'a4' AND `userID` = '{$_SESSION['userID']}'";
                    $user_response_result = mysqli_query($link, $user_response_query);

                    while ($response = mysqli_fetch_object($user_response_result)) {
                      $response_with_prefix = "option".$response->responseID;

                      $select_option_query = "SELECT $response_with_prefix FROM `ecDB`.`question_options` WHERE `questionID` = 'a4'";
                      $select_option_result = mysqli_query($link, $select_option_query);

                      while ($selected_option = mysqli_fetch_object($select_option_result)) {
                        echo "Your response: ".$selected_option->$response_with_prefix;
                        echo "<br><br>";
                      }
                    }

                    //query to get the solution from the database
                    $correct_answer_query = "SELECT `answerID` FROM `ecDB`.`answers` WHERE `questionID` = 'a4'";
                    $correct_answer_result = mysqli_query($link, $correct_answer_query);

                    while ($solution = mysqli_fetch_object($correct_answer_result)) {
                      $answer_with_prefix = "option".$solution->answerID;

                      $select_option_query = "SELECT $answer_with_prefix FROM `ecDB`.`question_options` WHERE `questionID` = 'a4'";
                      $select_option_result = mysqli_query($link, $select_option_query);

                      while ($selected_option = mysqli_fetch_object($select_option_result)) {
                        echo "Correct answer: ".$selected_option->$answer_with_prefix;
                        echo "<br><br>";
                      }

                      if ($response->responseID == $solution->answerID) {
                        echo "Points scored: 10";
                      } else {
                        echo "Points scored: 0";
                      }
                    }

                    echo "<br><br><br><hr /><br>";

                    //queries for question 4 end here

                    //queries for question 5 start here
                    //query to get question from the database
                    $query_questions = "SELECT `question` FROM `ecDB`.`questions` WHERE questionID = 'a5'";
                    $result_questions = mysqli_query($link, $query_questions);

                    while ($question = mysqli_fetch_object($result_questions)) {
                      echo "<h3>".$question->question."</h3>";
                    }

                    echo "<br>";

                    //query to get user response from database
                    $user_response_query = "SELECT `responseID` FROM `ecDB`.`response` WHERE `questionID` = 'a5' AND `userID` = '{$_SESSION['userID']}'";
                    $user_response_result = mysqli_query($link, $user_response_query);

                    while ($response = mysqli_fetch_object($user_response_result)) {
                      $response_with_prefix = "option".$response->responseID;

                      $select_option_query = "SELECT $response_with_prefix FROM `ecDB`.`question_options` WHERE `questionID` = 'a5'";
                      $select_option_result = mysqli_query($link, $select_option_query);

                      while ($selected_option = mysqli_fetch_object($select_option_result)) {
                        echo "Your response: ".$selected_option->$response_with_prefix;
                        echo "<br><br>";
                      }
                    }

                    //query to get the solution from the database
                    $correct_answer_query = "SELECT `answerID` FROM `ecDB`.`answers` WHERE `questionID` = 'a5'";
                    $correct_answer_result = mysqli_query($link, $correct_answer_query);

                    while ($solution = mysqli_fetch_object($correct_answer_result)) {
                      $answer_with_prefix = "option".$solution->answerID;

                      $select_option_query = "SELECT $answer_with_prefix FROM `ecDB`.`question_options` WHERE `questionID` = 'a5'";
                      $select_option_result = mysqli_query($link, $select_option_query);

                      while ($selected_option = mysqli_fetch_object($select_option_result)) {
                        echo "Correct answer: ".$selected_option->$answer_with_prefix;
                        echo "<br><br>";
                      }

                      if ($response->responseID == $solution->answerID) {
                        echo "Points scored: 10";
                      } else {
                        echo "Points scored: 0";
                      }
                    }

                    echo "<br><br><br><hr /><br>";

                    //queries for question 5 end here
                 ?>

            </div>
        </div>
        <script type="text/javascript">

        var clickBtnValue = "";

        $(document).ready(function() {
            //select Stainless Steel by default
            $('#stainless-steel-button').focus();
            $('#stainless-steel-button').css("border","1px solid blue");
            clickBtnValue = 'stainless-steel';
        });

    /*Code to toggle button properties*/
        $('#stainless-steel-button').click(function() {
          $(this).css("border","1px solid blue");
          $('#aluminium-button').css("border","");
          $('#carbon-fiber-button').css("border","");

          //save the value of the button click
          clickBtnValue = $(this).val();
        });

        $('#aluminium-button').click(function() {
          $(this).css("border","1px solid blue");
          $('#stainless-steel-button').css("border","");
          $('#carbon-fiber-button').css("border","");

          //save the value of the button click
          clickBtnValue = $(this).val();
        });

        $('#carbon-fiber-button').click(function() {
          $(this).css("border","1px solid blue");
          $('#stainless-steel-button').css("border","");
          $('#aluminium-button').css("border","");

          //save the value of the button click
          clickBtnValue = $(this).val();
        });

        //ajax call to store material selected by user
        $('#navigate-link').click(function() {
          var ajaxurl = 'store_car_detail.php',
          data =  {'action': clickBtnValue};
          $.post(ajaxurl, data);
        });

    </script>
    </body>
</html>
