<?php
session_start();
?>
<!DOCTYPE html>
<head>
    <title>Logout - Drive.</title><link rel="icon" type="image/png" href="bilder/Drive.png">
    <!--Sprachenimport von Google Fonts-->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Titillium+Web:wght@400;700&display=swap');
    </style>

    <!--Iconimport von Google-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <!--Styleimport von CSS Datei-->
    <link rel="stylesheet" href = "CSSMain.css">

    <!--Include Header-->
    <?php
        include('Header.php');
    ?> 
</head>

<body>
    <div id="background-image">
        <!-- Feld mit Verabschiedung vom user -->
        <div class="LogRegWel-container">
            <div class="welcomeLogout-Div">
            <div class="LogRegWel-title"><h1>Bis Bald!</h1> </div>
            <p> Sie sind jetzt ausgeloggt </p>
            <button onclick="goBack()" class="LogRegWel-button">Zurück</button>
            </div>
        </div>
    </div>
<script>
    //go back to page from wich logout was called from
    function goBack() {
    //get previousURL
    var previousURL = sessionStorage.getItem('previousURL');
    var productDetailPath = 'Produktdetailseite.php';
    var ordersComplitionPath = 'Buchungsabschluss.php';
    var welcomePath = 'Welcome.php';
    var productOverviewPath = 'Produkt%c3%bcbersicht.php';

    // if user came from Produktdetailseite.php, Buchungsabschluss.php, WelcomePage.php or Produktübersicht.php go back to homepage
    if (previousURL && (previousURL.toLowerCase().includes(productDetailPath.toLowerCase()) || previousURL.toLowerCase().includes(ordersComplitionPath.toLowerCase()) || previousURL.toLowerCase().includes(welcomePath.toLowerCase()) || previousURL.toLowerCase().includes(productOverviewPath.toLowerCase()))) {
        window.location.href = 'Homepage.php';
        //otherwise go back to previous URL
    } else if (previousURL) {
        window.location.href = previousURL;
    } else {
        // if previous URL not valid, go back to Homepage
        window.location.href = 'Homepage.php';
    }
}
</script>
</body>

<footer>
<!--Include Footer-->
    <?php
        include('Footer.php');
    ?>
</footer>
</html>