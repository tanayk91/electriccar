<!--?php include("save_interests.php"); ?-->
<!DOCTYPE html>
<html>
    <head>
        <title>Build An Electric Car</title>
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400" rel="stylesheet">
        <link rel="stylesheet" href="../css/main.css">
        <link rel="stylesheet" href="../css/interests.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    </head>
    <body>
        <div id="navbar">
            <div id="login-logout-div">
                <a href="../index.php" id="login-logout-link">LOGOUT</a>
            </div>
        </div>
        <form method="post" action="../stages/1-intro/delhi1.php">
            <div id="heading" class="centre-div">
                <h3>Choose topics you like</h3>
                <h5 id="feedback-text">This will help us in providing feedback suited specifically for you.</h5>
            </div>
            <div id="moving_balls">
                <input type="button" name="geometry" id= "a" class="moving" value="Geometry" />
                <input type = "hidden" name = "geom-counter" id="geom-counter" value="0" />
                <input type="button" name="electricity" id= "b" class="moving" value="Electricity" />
                <input type = "hidden" name = "elec-counter" id="elec-counter" value="0" />
                <input type="button" name="algebra" id= "c" class="moving" value="Algebra" />
                <input type = "hidden" name = "alg-counter" id="alg-counter" value="0" />
                <input type="button" name="light" id= "d" class="moving" value="Light" />
                <input type = "hidden" name = "light-counter" id="light-counter" value="0" />
                <input type="button" name="metals-nonmetals" id= "e" class="moving" value="Metals" />
                <input type = "hidden" name = "metals-nonmetals-counter" id="metals-nonmetals-counter" value="0" />
                <input type="button" name="circles" id= "f" class="moving" value="Circles" />
                <input type = "hidden" name = "circles-counter" id="circles-counter" value="0" />
                <input type="button" name="coal-petro" id= "g" class="moving" value="Fossil Fuels" />
                <input type = "hidden" name = "coal-petro-counter" id="coal-petro-counter" value="0" />
            </div>
        </form>
        <script src="../js/interests.js"></script>
    </body>
</html>
