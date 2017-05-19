<?php

//go to next stage
if ($_POST['navigate'] == "NEXT STAGE >>") {
  header('Location: ../5-motor/motor.php');
}

 ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Batteries for the car</title>
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400" rel="stylesheet">
        <link rel="stylesheet" href="css/batteries.css">
        <link rel="stylesheet" href="../../css/main.css">
        <link rel="stylesheet" href="../../css/stages.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="js/battery-divs.js"></script>
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
            <div id="user-score">
              <?php
                session_start();
                include ("../../db/connection.php");

                //get the total score for the current user
                $total_score_query = "SELECT `total` FROM `ecDB`.`total_score` WHERE `userID` = '{$_SESSION['userID']}'";
                $total_score_result = mysqli_query($link, $total_score_query);

                while ($total_score = mysqli_fetch_object($total_score_result)) {
                  $score = $total_score->total;
                }

                $_SESSION['score'] = $score;

                echo "<span id='score-style'>". $_SESSION['score']."</span>"." points";
              ?>
            </div>
            <div class="switch-stage-dropdown">
                <button class="dropbtn">SWITCH MODULE</button>
                <div class="dropdown-content">
                    <a href="../1-intro/delhi1.php">Pollution in Delhi</a>
                    <a href="../2-materials/body_material1.php">Materials</a>
                    <a href="../3-body_area/body_area.php">Area</a>
                    <a href="../4-batteries/batteries.php">Batteries</a>
                    <a href="../5-motor/motor.php">Motor</a>
                    <a href="../6-wheels/wheels.php">Wheels</a>
                </div>
            </div>
        </div>
        <div id="container">
            <div id="top-bar">
                <h3 class="instruction">Choose a suitable battery</h3>
                <h5 class="instruction" id="sub-instruction">Select any one</h5>
                <div class="navigate-div">
                    <form method="post">
                        <input type="submit" id="navigate-link" class="proceed-button" name="navigate" value="NEXT STAGE >>" />
                    </form>
                </div>
            </div>
            <div class="centre-div">
                <a href="landing.php" class="proceed-link">BEGIN CHALLENGE</a>
            </div>
            <br><br><br>

              <?php

                session_start();

                include("../../db/connection.php");

                echo "<div id='battery-list'>";

                $get_battery_score_query = "SELECT `batteries_score` FROM `ecDB`.`total_score` WHERE `userID` = '{$_SESSION['userID']}'";
                $get_battery_score_result = mysqli_query($link, $get_battery_score_query);

                while ($get_battery_score = mysqli_fetch_object($get_battery_score_result)) {
                  if (($get_battery_score->batteries_score <= 10)) {
                    echo '<div class="battery-div" id="nicd-div">
                        <input type="hidden" id="nicd-batt" name="first-battery" value="first-unselected" />
                        <div id="nicd-radio" class="battery-radio centre-div"></div>
                        <div class="battery-image centre-div"><img src="images/NiCd-small.gif" /></div>
                        <div class="battery-head centre-div">Nickel Cadmium</div>
                        <div class="feature-highlights">
                            <ul>
                                <li>Low energy density
                                <li>Long life
                                <li>Cheap
                            </ul>
                        </div>
                    </div>';
                    echo '<div class="battery-div" id="nimh-div">
                        <input type="hidden" id="nimh-batt" name="second-battery" value="second-unselected" />
                        <div class="battery-head centre-div">Nickel Metal Hydride</div>
                        <div class="locked-battery-message">To unlock this battery, you need to get at least 2 questions right in the challenge.</div>
                        </div>';
                    echo '<div class="battery-div" id="lead-acid-div">
                        <input type="hidden" id="lead-acid-batt" name="third-battery" value="third-unselected" />
                        <div class="battery-head centre-div">Lead Acid</div>
                        <div class="locked-battery-message">To unlock this battery, you need to get at least 3 questions right in the challenge.</div>
                        </div>';
                    echo '<div class="battery-div" id="li-ion-div">
                        <input type="hidden" id="li-ion-batt" name="fourth-battery" value="fourth-unselected" />
                        <div class="battery-head centre-div">Lithium Ion</div>
                        <div class="locked-battery-message">To unlock this battery, you need to get at least 4 questions right in the challenge.</div>
                        </div>';
                    echo '<div class="battery-div" id="li-ion-poly-div">
                        <input type="hidden" id="li-ion-poly-batt" name="fifth-battery" value="fifth-unselected" />
                        <div class="battery-head centre-div">Lithium Ion Polymer</div>
                        <div class="locked-battery-message">To unlock this battery, you need to get all 5 questions right in the challenge.</div>
                        </div>';

                  } elseif ($get_battery_score->batteries_score == 20) {
                    echo '<div class="battery-div" id="nicd-div">
                        <input type="hidden" id="nicd-batt" name="first-battery" value="first-unselected" />
                        <div id="nicd-radio" class="battery-radio centre-div"></div>
                        <div class="battery-image centre-div"><img src="images/NiCd-small.gif" /></div>
                        <div class="battery-head centre-div">Nickel Cadmium</div>
                        <div class="feature-highlights">
                            <ul>
                                <li>Low energy density
                                <li>Long life
                                <li>Cheap
                            </ul>
                        </div>
                    </div>';
                    echo '<div class="battery-div" id="nimh-div">
                        <input type="hidden" id="nimh-batt" name="second-battery" value="second-unselected" />
                        <div id="nimh-radio" class="battery-radio centre-div"></div>
                        <div class="battery-image centre-div"><img src="images/NiMH-small.gif" /></div>
                        <div class="battery-head centre-div">Nickel Metal Hydride</div>
                        <div class="feature-highlights">
                            <ul>
                                <li>Moderate energy density
                                <li>Reduced life cycle
                            </ul>
                        </div>
                    </div>';
                    echo '<div class="battery-div" id="lead-acid-div">
                        <input type="hidden" id="lead-acid-batt" name="third-battery" value="third-unselected" />
                        <div class="battery-head centre-div">Lead Acid</div>
                        <div class="locked-battery-message">To unlock this battery, you need to get at least 3 questions right in the challenge.</div>
                        </div>';
                    echo '<div class="battery-div" id="li-ion-div">
                        <input type="hidden" id="li-ion-batt" name="fourth-battery" value="fourth-unselected" />
                        <div class="battery-head centre-div">Lithium Ion</div>
                        <div class="locked-battery-message">To unlock this battery, you need to get at least 4 questions right in the challenge.</div>
                        </div>';
                    echo '<div class="battery-div" id="li-ion-poly-div">
                        <input type="hidden" id="li-ion-poly-batt" name="fifth-battery" value="fifth-unselected" />
                        <div class="battery-head centre-div">Lithium Ion Polymer</div>
                        <div class="locked-battery-message">To unlock this battery, you need to get all 5 questions right in the challenge.</div>
                        </div>';
                  } elseif ($get_battery_score->batteries_score == 30) {
                    echo '<div class="battery-div" id="nicd-div">
                        <input type="hidden" id="nicd-batt" name="first-battery" value="first-unselected" />
                        <div id="nicd-radio" class="battery-radio centre-div"></div>
                        <div class="battery-image centre-div"><img src="images/NiCd-small.gif" /></div>
                        <div class="battery-head centre-div">Nickel Cadmium</div>
                        <div class="feature-highlights">
                            <ul>
                                <li>Low energy density
                                <li>Long life
                                <li>Cheap
                            </ul>
                        </div>
                    </div>';
                    echo '<div class="battery-div" id="nimh-div">
                        <input type="hidden" id="nimh-batt" name="second-battery" value="second-unselected" />
                        <div id="nimh-radio" class="battery-radio centre-div"></div>
                        <div class="battery-image centre-div"><img src="images/NiMH-small.gif" /></div>
                        <div class="battery-head centre-div">Nickel Metal Hydride</div>
                        <div class="feature-highlights">
                            <ul>
                                <li>Moderate energy density
                                <li>Reduced life cycle
                            </ul>
                        </div>
                    </div>';
                    echo '<div class="battery-div" id="lead-acid-div">
                        <input type="hidden" id="lead-acid-batt" name="third-battery" value="third-unselected" />
                        <div id="lead-acid-radio" class="battery-radio centre-div"></div>
                        <div class="battery-image centre-div"><img src="images/Lead-Acid-small.gif" /></div>
                        <div class="battery-head centre-div">Lead Acid</div>
                        <div class="feature-highlights">
                            <ul>
                                <li>Economical for large power applications
                                <li>Heavy
                                <li>Low energy density
                            </ul>
                        </div>
                    </div>';
                    echo '<div class="battery-div" id="li-ion-div">
                        <input type="hidden" id="li-ion-batt" name="fourth-battery" value="fourth-unselected" />
                        <div class="battery-head centre-div">Lithium Ion</div>
                        <div class="locked-battery-message">To unlock this battery, you need to get at least 4 questions right in the challenge.</div>
                        </div>';
                    echo '<div class="battery-div" id="li-ion-poly-div">
                        <input type="hidden" id="li-ion-poly-batt" name="fifth-battery" value="fifth-unselected" />
                        <div class="battery-head centre-div">Lithium Ion Polymer</div>
                        <div class="locked-battery-message">To unlock this battery, you need to get all 5 questions right in the challenge.</div>
                        </div>';
                  } elseif ($get_battery_score->batteries_score == 40) {
                    echo '<div class="battery-div" id="nicd-div">
                        <input type="hidden" id="nicd-batt" name="first-battery" value="first-unselected" />
                        <div id="nicd-radio" class="battery-radio centre-div"></div>
                        <div class="battery-image centre-div"><img src="images/NiCd-small.gif" /></div>
                        <div class="battery-head centre-div">Nickel Cadmium</div>
                        <div class="feature-highlights">
                            <ul>
                                <li>Low energy density
                                <li>Long life
                                <li>Cheap
                            </ul>
                        </div>
                    </div>';
                    echo '<div class="battery-div" id="nimh-div">
                        <input type="hidden" id="nimh-batt" name="second-battery" value="second-unselected" />
                        <div id="nimh-radio" class="battery-radio centre-div"></div>
                        <div class="battery-image centre-div"><img src="images/NiMH-small.gif" /></div>
                        <div class="battery-head centre-div">Nickel Metal Hydride</div>
                        <div class="feature-highlights">
                            <ul>
                                <li>Moderate energy density
                                <li>Reduced life cycle
                            </ul>
                        </div>
                    </div>';
                    echo '<div class="battery-div" id="lead-acid-div">
                        <input type="hidden" id="lead-acid-batt" name="third-battery" value="third-unselected" />
                        <div id="lead-acid-radio" class="battery-radio centre-div"></div>
                        <div class="battery-image centre-div"><img src="images/Lead-Acid-small.gif" /></div>
                        <div class="battery-head centre-div">Lead Acid</div>
                        <div class="feature-highlights">
                            <ul>
                                <li>Economical for large power applications
                                <li>Heavy
                                <li>Low energy density
                            </ul>
                        </div>
                    </div>';
                    echo '<div class="battery-div" id="li-ion-div">
                        <input type="hidden" id="li-ion-batt" name="fourth-battery" value="fourth-unselected" />
                        <div id="li-ion-radio" class="battery-radio centre-div"></div>
                        <div class="battery-image centre-div"><img src="images/Li-Ion-small.gif" /></div>
                        <div class="battery-head centre-div">Lithium Ion</div>
                        <div class="feature-highlights">
                            <ul>
                                <li>High energy density
                                <li>Lightweight
                            </ul>
                        </div>
                    </div>';
                    echo '<div class="battery-div" id="li-ion-poly-div">
                        <input type="hidden" id="li-ion-poly-batt" name="fifth-battery" value="fifth-unselected" />
                        <div class="battery-head centre-div">Lithium Ion Polymer</div>
                        <div class="locked-battery-message">To unlock this battery, you need to get all 5 questions right in the challenge.</div>
                        </div>';
                  } else {
                    echo '<div class="battery-div" id="nicd-div">
                        <input type="hidden" id="nicd-batt" name="first-battery" value="first-unselected" />
                        <div id="nicd-radio" class="battery-radio centre-div"></div>
                        <div class="battery-image centre-div"><img src="images/NiCd-small.gif" /></div>
                        <div class="battery-head centre-div">Nickel Cadmium</div>
                        <div class="feature-highlights">
                            <ul>
                                <li>Low energy density
                                <li>Long life
                                <li>Cheap
                            </ul>
                        </div>
                    </div>';
                    echo '<div class="battery-div" id="nimh-div">
                        <input type="hidden" id="nimh-batt" name="second-battery" value="second-unselected" />
                        <div id="nimh-radio" class="battery-radio centre-div"></div>
                        <div class="battery-image centre-div"><img src="images/NiMH-small.gif" /></div>
                        <div class="battery-head centre-div">Nickel Metal Hydride</div>
                        <div class="feature-highlights">
                            <ul>
                                <li>Moderate energy density
                                <li>Reduced life cycle
                            </ul>
                        </div>
                    </div>';
                    echo '<div class="battery-div" id="lead-acid-div">
                        <input type="hidden" id="lead-acid-batt" name="third-battery" value="third-unselected" />
                        <div id="lead-acid-radio" class="battery-radio centre-div"></div>
                        <div class="battery-image centre-div"><img src="images/Lead-Acid-small.gif" /></div>
                        <div class="battery-head centre-div">Lead Acid</div>
                        <div class="feature-highlights">
                            <ul>
                                <li>Economical for large power applications
                                <li>Heavy
                                <li>Low energy density
                            </ul>
                        </div>
                    </div>';
                    echo '<div class="battery-div" id="li-ion-div">
                        <input type="hidden" id="li-ion-batt" name="fourth-battery" value="fourth-unselected" />
                        <div id="li-ion-radio" class="battery-radio centre-div"></div>
                        <div class="battery-image centre-div"><img src="images/Li-Ion-small.gif" /></div>
                        <div class="battery-head centre-div">Lithium Ion</div>
                        <div class="feature-highlights">
                            <ul>
                                <li>High energy density
                                <li>Lightweight
                            </ul>
                        </div>
                    </div>';
                    echo '<div class="battery-div" id="li-ion-poly-div">
                        <input type="hidden" id="li-ion-poly-batt" name="fifth-battery" value="fifth-unselected" />
                        <div id="li-ion-poly-radio" class="battery-radio centre-div"></div>
                        <div class="battery-image centre-div"><img src="images/Li-Ion-Poly-small.gif" /></div>
                        <div class="battery-head centre-div">Lithium Ion Polymer</div>
                        <div class="feature-highlights">
                            <ul>
                                <li>High energy density
                                <li>Ultra portable
                            </ul>
                        </div>
                    </div>';
                  }
                }

                echo "</div>";
          ?>
        </div>
        <script>
        var allIncomingDivs = [];
        var div_click_count = 0;
        var clickBtnValue = "";

        /*Code to modify check mark and border*/
        $('#nicd-div').click(function() {
          $('#nicd-radio').toggleClass("green-radio");
          $(this).toggleClass("green-border-div");

          if ($('#nicd-batt').val() == "first-unselected") {
            $('#nicd-batt').val("first-selected");
          } else {
            $('#nicd-batt').val("first-unselected");
          }
          //disable clicking events on all other divs
          div_click_count++;
          if (div_click_count % 2 != 0) {
            $('#nimh-div').css("pointer-events","none");
            $('#lead-acid-div').css("pointer-events","none");
            $('#li-ion-div').css("pointer-events","none");
            $('#li-ion-poly-div').css("pointer-events","none");
            //make the navigation button visible
            $('#navigate-to-next-stage').attr("type","submit");
            //change the 'Select any one' sub instruction
            $('#sub-instruction').html("Deselect the current option to select some other battery");
          } else {
            $('#nimh-div').css("pointer-events","auto");
            $('#lead-acid-div').css("pointer-events","auto");
            $('#li-ion-div').css("pointer-events","auto");
            $('#li-ion-poly-div').css("pointer-events","auto");
            //make the navigation button invisible
            $('#navigate-to-next-stage').attr("type","hidden");
            //change the 'Select any one' sub instruction
            $('#sub-instruction').html("Select any one");
          }

          //save the value of the button click
          clickBtnValue = 'nicd';

        });

        $('#nimh-div').click(function() {
          $('#nimh-radio').toggleClass("green-radio");
          $(this).toggleClass("green-border-div");

          if ($('#nimh-batt').val() == "second-unselected") {
            $('#nimh-batt').val("second-selected");
          } else {
            $('#nimh-batt').val("second-unselected");
          }
          //disable clicking events on all other divs
          div_click_count++;
          if (div_click_count % 2 != 0) {
            $('#nicd-div').css("pointer-events","none");
            $('#lead-acid-div').css("pointer-events","none");
            $('#li-ion-div').css("pointer-events","none");
            $('#li-ion-poly-div').css("pointer-events","none");
            //make the navigation button visible
            $('#navigate-to-next-stage').attr("type","submit");
            //change the 'Select any one' sub instruction
            $('#sub-instruction').html("Deselect the current option to select some other battery");
          } else {
            $('#nicd-div').css("pointer-events","auto");
            $('#lead-acid-div').css("pointer-events","auto");
            $('#li-ion-div').css("pointer-events","auto");
            $('#li-ion-poly-div').css("pointer-events","auto");
            //make the navigation button visible
            $('#navigate-to-next-stage').attr("type","hidden");
            //change the 'Select any one' sub instruction
            $('#sub-instruction').html("Select any one");
          }

          //save the value of the button click
          clickBtnValue = 'nimh';

        });

        $('#lead-acid-div').click(function() {
          $('#lead-acid-radio').toggleClass("green-radio");
          $(this).toggleClass("green-border-div");

          if ($('#lead-acid-batt').val() == "third-unselected") {
            $('#lead-acid-batt').val("third-selected");
          } else {
            $('#lead-acid-batt').val("third-unselected");
          }
          //disable clicking events on all other divs
          div_click_count++;
          if (div_click_count % 2 != 0) {
            $('#nicd-div').css("pointer-events","none");
            $('#nimh-div').css("pointer-events","none");
            $('#li-ion-div').css("pointer-events","none");
            $('#li-ion-poly-div').css("pointer-events","none");
            //make the navigation button visible
            $('#navigate-to-next-stage').attr("type","submit");
            //change the 'Select any one' sub instruction
            $('#sub-instruction').html("Deselect the current option to select some other battery");
          } else {
            $('#nicd-div').css("pointer-events","auto");
            $('#nimh-div').css("pointer-events","auto");
            $('#li-ion-div').css("pointer-events","auto");
            $('#li-ion-poly-div').css("pointer-events","auto");
            //make the navigation button visible
            $('#navigate-to-next-stage').attr("type","hidden");
            //change the 'Select any one' sub instruction
            $('#sub-instruction').html("Select any one");
          }

          //save the value of the button click
          clickBtnValue = 'lead-acid';

        });

        $('#li-ion-div').click(function() {
          $('#li-ion-radio').toggleClass("green-radio");
          $(this).toggleClass("green-border-div");

          if ($('#li-ion-batt').val() == "fourth-unselected") {
            $('#li-ion-batt').val("fourth-selected");
          } else {
            $('#li-ion-batt').val("fourth-unselected");
          }
          //disable clicking events on all other divs
          div_click_count++;
          if (div_click_count % 2 != 0) {
            $('#nicd-div').css("pointer-events","none");
            $('#nimh-div').css("pointer-events","none");
            $('#lead-acid-div').css("pointer-events","none");
            $('#li-ion-poly-div').css("pointer-events","none");
            //make the navigation button visible
            $('#navigate-to-next-stage').attr("type","submit");
            //change the 'Select any one' sub instruction
            $('#sub-instruction').html("Deselect the current option to select some other battery");
          } else {
            $('#nicd-div').css("pointer-events","auto");
            $('#nimh-div').css("pointer-events","auto");
            $('#lead-acid-div').css("pointer-events","auto");
            $('#li-ion-poly-div').css("pointer-events","auto");
            //make the navigation button visible
            $('#navigate-to-next-stage').attr("type","hidden");
            //change the 'Select any one' sub instruction
            $('#sub-instruction').html("Select any one");
          }

          //save the value of the button click
          clickBtnValue = 'li-ion';

        });

        $('#li-ion-poly-div').click(function() {
          $('#li-ion-poly-radio').toggleClass("green-radio");
          $(this).toggleClass("green-border-div");

          if ($('#li-ion-poly-batt').val() == "fifth-unselected") {
            $('#li-ion-poly-batt').val("fifth-selected");
          } else {
            $('#li-ion-poly-batt').val("fifth-unselected");
          }

          //disable clicking events on all other divs
          div_click_count++;
          if (div_click_count % 2 != 0) {
            $('#nicd-div').css("pointer-events","none");
            $('#nimh-div').css("pointer-events","none");
            $('#lead-acid-div').css("pointer-events","none");
            $('#li-ion-div').css("pointer-events","none");
            //make the navigation button visible
            $('#navigate-to-next-stage').attr("type","submit");
            //change the 'Select any one' sub instruction
            $('#sub-instruction').html("Deselect the current option to select some other battery");
          } else {
            $('#nicd-div').css("pointer-events","auto");
            $('#nimh-div').css("pointer-events","auto");
            $('#lead-acid-div').css("pointer-events","auto");
            $('#li-ion-div').css("pointer-events","auto");
            //make the navigation button visible
            $('#navigate-to-next-stage').attr("type","hidden");
            //change the 'Select any one' sub instruction
            $('#sub-instruction').html("Select any one");
          }

          //save the value of the button click
          clickBtnValue = 'li-ion-poly';

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
