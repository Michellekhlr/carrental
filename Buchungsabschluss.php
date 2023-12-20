<?php

// Include the database configuration file
include_once "dbConfig.php";

// starting the session
session_start();

//checking if a car is selected
if (!isset($_SESSION['carID'])) {
    header("Location: Produktübersicht.php");
    exit();
} 

//if age from user is smaller than minAge from car, booking is not possible
if (isset($_SESSION["minAgeError"]) && $_SESSION["age"] < $_SESSION["minAgeError"]) { 
    $_SESSION['minAgeError'] = 'Du bist zu jung, um dieses Auto zu buchen.';
}

// Check if personID is in Session
if (isset($_SESSION['personID'])) {
    $personID = $_SESSION['personID'];

    $stmt = $conn->prepare("SELECT userID FROM user WHERE personID = :personID");
    $stmt->bindParam(':personID', $personID);
    $stmt->execute();

    // Fetch the result
    if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        // safe userID in session
        $_SESSION['userID'] = $row['userID'];
    } 
} 


?>
<!DOCTYPE html>

<head>
    <title>Buchungsabschluss - Drive.</title><link rel="icon" type="image/png" href="bilder/Drive.png">
    <!--Sprachenimport von Google Fonts-->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Titillium+Web:wght@400;700&display=swap');
    </style>

    <!--Iconimport Google-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <!--Styleimport CSS Datei-->
    <link rel="stylesheet" href = "CSSMain.css">

    <!--Include Header and porgressbar-->
    <?php
    include('Header.php');
    
    $isProductOverview = false;
    include('progressbar.php');
    ?><br><br><br>

     <!--Processbar dynamic settings-->
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', 
            function(){
                $("#progress1").fadeTo("slow", 0.3);
                $("#progress2").fadeTo("slow", 0.4);
                $("#progress3").fadeTo(0.2);
            });
    </script>
</head>

<body>
    <div style="display: flex; justify-content: center; align-items: center;">
    <div id="rent">
        <div style="width: 100%; height: 90px; display: flex; justify-content: center; align-items: center; box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);">
            <h1 style="margin: 0; font-size: 48px;">Ihre Buchung</h1> 
        </div><br>

        <table class="buchungsabschluss-table">
            <tr>
                <td>
                    <p style="font-size: 20px; margin: 0;">1. Ort und Zeitraum</p>
                    <div style="border: solid 2px black; width: 539px; height: 90px;">
                        <p> <?php echo "<b>" . $_SESSION['location'] . "</b>"?> </p> 
                        <p> <?php echo $_SESSION['startDate'] . " | " . $_SESSION['endDate'] ?> </p>
                    </div>
                </td>
                <td rowspan="3" style="width: 30px;"></td>
                <td rowspan="2">
                    <p style="font-size: 20px; margin: 0;">Deine Daten</p>
                    <div style="border: solid 2px black; width: 539px; height: 215px;">
                       <p> <?php echo "<b>" . $_SESSION['firstname'] . " " . $_SESSION['lastname'] . "</b>" ?> </p>
                       <p> <?php echo "<i>" . $_SESSION['email'] . "</i>" ?> </p>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <p style="font-size: 20px; margin: 0;">2. Auto</p>
                    <div style="border: solid 2px black; width: 539px; height: 90px;">
                        <p> <?php echo "<b>" . $_SESSION["vendor"] . " " . $_SESSION["name"] . "</b>"?> </p> 
                        <p> <?php echo $_SESSION["type"] . " | " . $_SESSION["gear"] . " | " . $_SESSION["drive"] ?> </p>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <p style="font-size: 20px; margin: 0;">3. Extras</p>
                    <div style="border: solid 2px black; width: 539px; height: 90px;">
                        <p> <?php
                        if (isset($_SESSION['insuranceValue'])) {
                             echo "<b>" . $_SESSION['insuranceValue'] . "</b>"; 
                        } ?> </p>
                        <p> <?php 
                        if (isset($_SESSION['extrasValue1'])) {
                            echo "+" . $_SESSION['extrasValue1'] . " ";
                        }
                        if (isset($_SESSION['extrasValue2'])) {
                            echo "+" . $_SESSION['extrasValue2'] . " ";
                        }
                        if (isset($_SESSION['extrasValue3'])) {
                            echo "+" . $_SESSION['extrasValue3'] . " ";
                        }
                            ?>
                        </p>
                    </div>
                </td>
                <td>
                    <p style="font-size: 64px; margin: 0; padding-top: 30px; padding-left: 20px;"><?php echo "Gesamt: " . $_SESSION['finalPrice'] . "€"?></p>
                </td>
            </tr>
        </table><br>

        
        <div class="buttonContainer">
            <button id="resetbook" onclick="goBack()">Abbrechen</button>
            <form class="buttonContainer-form" method="post" action="Buchung.php"> 
                <div>
                    <!--error when user is too young to drive car -->
                    <?php if (isset($_SESSION['minAgeError'])) : ?> 
                    <p id="minAgeError"><?php echo $_SESSION["minAgeError"]; ?></p>
                </div>
                    <!-- if user is allowed to drive then show book button -->
                    <?php else : ?> 
                    <button id="book" type="submit" name="book">Kostenpflichtig buchen</button>
                    <?php endif; ?>
            </form>
        </div>
        </div>
    </div>
    </div><br><br><br>
</body>

<script>
    //go back to Produktdetailseite.php when "Abbrechen" is clicked
    function goBack() { 
        window.history.back();
    }
</script>
<footer>
    <!--Include Footer-->
<?php
    include('Footer.php');
    ?>
</footer>
</html>