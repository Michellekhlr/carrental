<?php

// Include the database configuration file
include_once "dbConfig.php";

// debug info:
// ini_set('display_errors', 1);
// error_reporting(E_ALL);

// starting the session
session_start();

if (isset($_SESSION["minAgeError"]) && $_SESSION["age"] < $_SESSION["minAgeError"]) {
    $_SESSION['minAgeError'] = 'Du bist zu jung, um dieses Auto zu buchen.';
}
//hier session variablen durhc buchungsvorgangprozess
$_SESSION['locationName'] = 'Hamburg';
$_SESSION['startdate'] = '2023-12-08';
$_SESSION['enddate'] = '2023-12-11';

// Überprüfen Sie, ob eine personID in der Session vorhanden ist
if (isset($_SESSION['personID'])) {
    $personID = $_SESSION['personID'];

    // Bereiten Sie eine SQL-Abfrage vor, um die userID zu erhalten
    $stmt = $conn->prepare("SELECT userID FROM user WHERE personID = :personID");
    $stmt->bindParam(':personID', $personID);
    $stmt->execute();

    // Fetch the result
    if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        // Speichern Sie die userID in der Session
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

    <!--Include Header-->
    <!-- <div class = "band" style = "text-align: left; background-color:  black; color: white; margin-top: 0px;"><h3><i>Angebot des Tages: 5er BMW für 139 Kartoffeln</i></h3></div> -->
    <?php
    include('Header.php');
    ?><br><br><br>

    <!--Processbar dynmaic settings-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function(){
            $("#progress1").fadeTo("slow", 0.4);
            $("#progress2").fadeTo(0.4);
            $("#progress3").fadeTo("slow", 0.4);            
            });    
    </script>
</head>

<body>
    <div style="display: flex; justify-content: center; align-items: center;">
    <div id="rent">
        <div style="width: 100%; height: 90px; display: flex; justify-content: center; align-items: center;">
            <h1 style="margin: 0;">Ihre Buchung</h1>
        </div><br>

        <table class="buchungsabschluss-table">
            <tr>
                <td>
                    <p style="font-size: 20px; margin: 0;">1. Ort und Zeitraum</p>
                    <div style="border: solid 2px black; width: 539px; height: 90px;">
                        <p> <?php echo "<b>" . $_SESSION['locationName'] . "</b>"?> </p> 
                        <p> <?php echo $_SESSION['startdate'] . " | " . $_SESSION['enddate'] ?> </p>
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
                        <p> <?php echo "<b>" . $_SESSION["insurance"] . "</b>" ?> </p>
                        <p> <?php foreach ($extras as $value) {
                                echo "+" . $value . " "; 
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
    <?php if ($_SESSION['minAgeError']) : ?> <!--error when user is too young to drive car -->
        <p class="minAgeError"><?php echo $_SESSION["minAgeError"]; ?></p>
    <?php else : ?>
        <!-- if user is allowed to drive then show book button -->
        <form method="post" action="Buchung.php">
            <button id="resetbook" onclick="goBack()">Abbrechen</button>
            <button id="book" type="submit" name="book">Kostenpflichtig buchen</button>
        </form>
    <?php endif; ?>
</div>
        </div>
    </div>
    </div><br><br><br>
</body>

<script>
    function goBack() {
        window.history.back();
    }
</script>
<footer>
    <!--Include Footer-->
<?php
    include('Footer.html');
    ?>
</footer>
</html>