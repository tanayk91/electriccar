<!DOCTYPE html>
<html>
    <head>
        <title>Materials for the car</title>
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400" rel="stylesheet">
        <link rel="stylesheet" href="../../../css/main.css">
        <link rel="stylesheet" href="../../../css/stages.css">
        <link rel="stylesheet" href="css/body_material.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    </head>
    <body>
      <div id="navbar">
          <div id="logo-div">
              <img src="../../../css/logo_white_small.png" />
              <span id="logo-title">The Climate Shift Project</span>
          </div>
          <div id="login-logout-div">
              <a href="../../../index.php" id="login-logout-link">LOGOUT</a>
          </div>
      </div>
        <div id="progress-bar">
            <div id="user-score">
              <?php
                session_start();
                include ("../../../db/connection.php");

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
            <div id="navigate-to-next-stage">
                <form method="post" action="../3-body_area/body_area.php">
                    <input type="submit" id="navigate-link" value="NEXT STAGE >>" />
                </form>
            </div>
        </div>
        <div id="container">
            <div id="top-bar">
                <h3 class="instruction">Choose body material</h3>
                <form method='post' action='landing.php'>
                    <input type='submit' class='proceed-button' id="begin-challenge-button" value='BEGIN CHALLENGE' />
                </form>
            </div>
            <div id="user-options" class="centre-div">
                <button id='stainless-steel' name='stainless-steel' value='stainless-steel'>Stainless Steel</button>
                    <?php

                      $get_material_score_query = "SELECT `total`,`materials_score` FROM `ecDB`.`total_score` WHERE `userID` = '{$_SESSION['userID']}'";
                      $get_material_score_result = mysqli_query($link, $get_material_score_query);

                      while ($get_material_score = mysqli_fetch_object($get_material_score_result)) {
                        if (($get_material_score->materials_score >= 40) && ($get_material_score->materials_score <= 60)) {
                          echo "<button id='aluminium' name='aluminium' value='aluminium'>Aluminium</button>";
                          echo "<button id='carbon-fiber' name='carbon-fiber' value='carbon-fiber' disabled>Carbon Fiber</button>";
                          echo "<h4>To unlock Carbon Fiber, you need to score 80% or above on the challenge.</h4>";
                        } elseif ($get_material_score->materials_score >= 80) {
                          echo "<button id='aluminium' name='aluminium' value='aluminium'>Aluminium</button>";
                          echo "<button id='carbon-fiber' name='carbon-fiber' value='carbon-fiber'>Carbon Fiber</button>";
                          echo "<h4>Awesome! You now have high grade Carbon Fiber, the lightest and strongest material for your car!</h4>";
                        } else {
                          echo "<button id='aluminium' name='aluminium' value='aluminium' disabled>Aluminium</button>";
                          echo "<button id='carbon-fiber' name='carbon-fiber' value='carbon-fiber' disabled>Carbon Fiber</button>";
                          echo "<h4>To unlock Aluminium and Carbon Fiber, you need to complete this challenge.</h4>";
                        }
                      }
                ?>
            </div>

            <img src="images/stainless_steel.jpg" id="material-img" />
            <div id="img-explanation"></div>
        </div>

        <script type="text/javascript">

        var clickBtnValue = "";

        /*Make the Stainless Steel button active by default*/
            $(document).ready(function() {
                //select Stainless Steel by default
                $('#stainless-steel').focus();
                $('#img-explanation').html("Stainless steel is a steel alloy with a minimum of 10.5% chromium content. Stainless steel does not readily corrode, rust or stain with water as ordinary steel does.</p><p> Stainless steel is used where both the properties of steel and corrosion resistance are required. It is an ideal material for many applications. The alloy is milled into coils, sheets, plates, bars, wire, and tubing to be used in cookware, cutlery, household hardware, surgical instruments, major appliances, industrial equipment (for example, in sugar refineries) and as an automotive and aerospace structural alloy and construction material in large buildings.");
                $('#stainless-steel').css("border","1px solid blue");
                clickBtnValue = 'stainless-steel';
            });

        /*Code to toggle button properties*/
            $('#stainless-steel').click(function() {
              $('#img-explanation').html("Stainless steel is a steel alloy with a minimum of 10.5% chromium content. Stainless steel does not readily corrode, rust or stain with water as ordinary steel does.</p><p> Stainless steel is used where both the properties of steel and corrosion resistance are required. It is an ideal material for many applications. The alloy is milled into coils, sheets, plates, bars, wire, and tubing to be used in cookware, cutlery, household hardware, surgical instruments, major appliances, industrial equipment (for example, in sugar refineries) and as an automotive and aerospace structural alloy and construction material in large buildings.");
              $('#material-img').attr("src","images/stainless_steel.jpg");
              $(this).css("border","1px solid blue");
              $('#aluminium').css("border","");
              $('#carbon-fiber').css("border","");

              //save the value of the button click
              clickBtnValue = $(this).val();
            });

            $('#aluminium').click(function() {
              $('#img-explanation').html("Aluminium is a silvery-white, soft, nonmagnetic, ductile metal. It is the third most abundant element after oxygen and silicon and the most abundant metal in the crust. Aluminium metal is so chemically reactive that native specimens are rare. </p><p>As the automotive industry begins to pay more and more attention to fuel efficiency, reducing CO2 emissions and design, aluminium is playing an ever more important role in modern cars. Every kilogram of aluminium used in a car reduces the overall weight of the vehicle by one kilogram. For this reason more and more car parts are being made from aluminium.");
              $('#material-img').attr("src","images/aluminium.jpg");
              $(this).css("border","1px solid blue");
              $('#stainless-steel').css("border","");
              $('#carbon-fiber').css("border","");

              //save the value of the button click
              clickBtnValue = $(this).val();
            });

            $('#carbon-fiber').click(function() {
              $('#img-explanation').html("Carbon fibers are fibers about 5–10 micrometres in diameter and composed mostly of carbon atoms. To produce a carbon fiber, the carbon atoms are bonded together in crystals that are more or less aligned parallel to the long axis of the fiber. Several thousand carbon fibers are bundled together to form a tow, which may be used by itself or woven into a fabric. </p><p>The properties of carbon fibers, such as high stiffness, high tensile strength, low weight, high chemical resistance, high temperature tolerance and low thermal expansion, make them very popular in aerospace, civil engineering, military, and motorsports, along with other competition sports. However, they are relatively expensive when compared with similar fibers, such as glass fibers or plastic fibers.");
              $('#material-img').attr("src","images/carbon_fiber.jpg");
              $(this).css("border","1px solid blue");
              $('#stainless-steel').css("border","");
              $('#aluminium').css("border","");

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
