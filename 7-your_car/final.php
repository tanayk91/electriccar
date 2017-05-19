<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Congratulations!</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400" rel="stylesheet">
    <link rel="stylesheet" href="../../css/main.css">
    <link rel="stylesheet" href="../../css/stages.css">
    <link rel="stylesheet" href="css/final.css">
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
            <h3 class="instruction">You scored <?php echo $_SESSION['score']; ?> points.</h3>
            <p class="instruction">Here are the specifications of the car you've built:</p>
            <div class="navigate-div">
                <a href="../../index.php" class="proceed-link">END</a>
            </div>
            <div id="clear"></div>
        </div>
        <div id="car-image">
            <img src="images/black_car.jpg" id="user-car-image" />
        </div>
        <div id="car-specs">
            <div class="table-row">
                <div id="speed">
                    <h2>Top Speed</h2>
                    <p>
                      <?php
                      $motor_query = "SELECT `motor` FROM `ecDB`.`car_details` WHERE `userID`= '{$_SESSION['userID']}'";
                      $motor_result = mysqli_query($link, $motor_query);
                      while ($user_motor = mysqli_fetch_object($motor_result)) {
                        switch ($user_motor->motor) {
                          case '80kWh':
                            echo "200 km/h";
                            break;
                          case '100kWh':
                            echo "220 km/h";
                            break;
                          case '120kWh':
                            echo "235 km/h";
                            break;
                        }
                      }
                       ?>
                    </p>
                </div>
                <div id="range">
                    <h2>Range</h2>
                    <p>
                      <?php
                      $motor_query = "SELECT `motor` FROM `ecDB`.`car_details` WHERE `userID`= '{$_SESSION['userID']}'";
                      $motor_result = mysqli_query($link, $motor_query);
                      while ($user_motor = mysqli_fetch_object($motor_result)) {
                        switch ($user_motor->motor) {
                          case '80kWh':
                            echo "400 kilometers on a single charge";
                            break;
                          case '100kWh':
                            echo "425 kilometers on a single charge";
                            break;
                          case '120kWh':
                            echo "440 kilometers on a single charge";
                            break;
                        }
                      }
                       ?>
                    </p>
                </div>
            </div>
            <hr/>
            <div class="table-row">
                <div class="caption">
                    <h2>Body Material</h2>
                </div>
                <div class="description">
                    <span class="heading">
                      <?php
                      $material_description = "";
                      $material_query = "SELECT `material` FROM `ecDB`.`car_details` WHERE `userID`= '{$_SESSION['userID']}'";
                      $material_result = mysqli_query($link, $material_query);
                      while ($user_material = mysqli_fetch_object($material_result)) {
                        switch ($user_material->material) {
                          case 'aluminium':
                            echo "Aluminium";
                            $material_description = "Aluminium is a light, strong material which is perfect for building electric cars optimised for highers speeds and better range.";
                            break;
                          case 'carbon-fiber':
                            echo "Carbon Fiber";
                            $material_description = "Carbon Fiber is a light, strong material which is perfect for building electric cars optimised for highers speeds and better range.";
                            break;
                          case 'stainless-steel':
                            echo "Stainless Steel";
                            $material_description = "Stainless Steel is a light, strong material which is perfect for building electric cars optimised for highers speeds and better range.";
                            break;
                        }
                      }
                       ?>
                    </span>
                    <p><?php echo $material_description; ?></p>
                </div>
            </div>
            <hr/>
            <div class="table-row">
                <div class="caption">
                    <h2>Batteries</h2>
                </div>
                <div class="description">
                    <span class="heading">
                      <?php
                      $battery_description = "";
                      $battery_query = "SELECT `battery` FROM `ecDB`.`car_details` WHERE `userID`= '{$_SESSION['userID']}'";
                      $battery_result = mysqli_query($link, $battery_query);
                      while ($user_battery = mysqli_fetch_object($battery_result)) {
                        switch ($user_battery->battery) {
                          case 'nicd':
                            echo "Nickel Cadmium";
                            $battery_description = "Cheap and well understood, but low in energy density. Environmentally unfriendly.";
                            break;
                          case 'nimh':
                            echo "Nickel Metal Hydride";
                            $battery_description = "Higher energy density compared to NiCd. Contains no toxic metals.";
                            break;
                          case 'lead-acid':
                            echo "Lead Acid";
                            $battery_description = "Most economical for larger power applications where weight is of little concern.";
                            break;
                          case 'li-ion':
                            echo "Lithium Ion";
                            $battery_description = "It is used where high-energy density and lightweight is of prime importance.";
                            break;
                          case 'li-ion-poly':
                            echo "Lithium Ion Polymer";
                            $battery_description = "It offers the attributes of the Li-ion in a slim geometry and simplified packaging.";
                            break;
                          default:
                            $battery_description = "Looks like you haven't selected a battery.";
                            break;
                        }
                      }
                       ?>
                    </span>
                    <p><?php echo $battery_description; ?></p>
                </div>
            </div>
            <hr/>
            <div class="table-row">
                <div class="caption">
                    <h2>Motor</h2>
                </div>
                <div class="description">
                    <span class="heading">
                      <?php
                      $motor_description = "";
                      $motor_query = "SELECT `motor` FROM `ecDB`.`car_details` WHERE `userID`= '{$_SESSION['userID']}'";
                      $motor_result = mysqli_query($link, $motor_query);
                      while ($user_motor = mysqli_fetch_object($motor_result)) {
                        switch ($user_motor->motor) {
                          case '80kWh':
                            echo "80 kWh";
                            $motor_description = "The electric motor has an RPM of 950, and range of 400 km at an average speed of 50 km/h.";
                            break;
                          case '100kWh':
                            echo "100 kWh";
                            $motor_description = "The electric motor has an RPM of 1025, and range of 425 km at an average speed of 50 km/h.";
                            break;
                          case '120kWh':
                            echo "120 kWh";
                            $motor_description = "The electric motor has an RPM of 1125, and range of 440 km at an average speed of 50 km/h.";
                            break;
                        }
                      }
                       ?>
                    </span>
                    <p><?php echo $motor_description; ?></p>
                </div>
            </div>
            <hr/>
            <div class="table-row">
                <div class="caption">
                    <h2>Wheels</h2>
                </div>
                <div class="description">
                    <span class="heading">
                      <?php
                      $wheels_description = "";
                      $wheels_query = "SELECT `wheels` FROM `ecDB`.`car_details` WHERE `userID`= '{$_SESSION['userID']}'";
                      $wheels_result = mysqli_query($link, $wheels_query);
                      while ($user_wheels = mysqli_fetch_object($wheels_result)) {
                        switch ($user_wheels->wheels) {
                          case '18s':
                            echo "18 inch steel";
                            $wheels_description = "Smaller tyres have a weaker grip, but a higher range per litre of fuel.";
                            break;
                          case '20s':
                            echo "20 inch steel";
                            $wheels_description = "Larger tyres result in better grip and higher speeds, but lower the range per litre by ~10%.";
                            break;
                          case '18a':
                            echo "18 inch alloys";
                            $wheels_description = "Smaller tyres have a weaker grip, but a higher range per litre of fuel. Alloys offer better performance and improved acceleration.";
                            break;
                          case '20a':
                            echo "20 inch alloys";
                            $wheels_description = "Larger tyres result in better grip and higher speeds, but lower the range per litre by ~10%. Alloys offer better performance and improved acceleration.";
                            break;
                        }
                      }
                       ?>
                    </span>
                    <p><?php echo $wheels_description; ?></p>
                </div>
            </div>
            <hr/>
        </div>
    </div>
  </body>
</html>
