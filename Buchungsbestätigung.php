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

?>
<!DOCTYPE html>

<head>
    <title>Vielen Dank! - Drive.</title><link rel="icon" type="image/png" href="bilder/Drive.png">
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
    ?>
</head>

<body>
    <div class="confirmWindow">
    <div id="rent">
        <div class="confirmHeader">
            <h1 class="confirmTitle">Vielen Dank für ihre Buchung</h1> 
        </div>
        <p class="confirmText">Schön, dass sie bei Drive. mieten! <br> Folgen Sie uns gerne auch auf <a class="confirmTextLink" href="https://www.instagram.com">Instagram</a> <br> Oder geben Sie uns eine Bewertung bei <a class="confirmTextLink" href="https://www.google.com">Google</a></p>
        <div class="buttonContainer">
        <button id="resetbook" onclick="location.href='Produktübersicht.php'">Weitere Autos buchen</button>
        <button id="book" onclick="location.href='ordersPage.php'">Zu Ihren Buchungen</button>
        </div>
    </div>
    </div>
</body>

<footer>
    <!--Include Footer-->
<?php
    include('Footer.php');
    ?>
</footer>
</html>