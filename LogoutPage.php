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
            <div class="LogRegWel-title"><h1>Auf Wiedersehen</h1> </div>
            <p> Sie sind jetzt ausgeloggt </p>
            <button onclick="goBack()" class="LogRegWel-button">Zurück</button>
            </div>
        </div>
    </div>
    <div class="SloganLogRegWel">
    Einfach.Flexibel.
</div>
<script>
    //go back to page from wich logout was called from
    function goBack() {
    //get previousURL
    var previousURL = sessionStorage.getItem('previousURL');
    var productDetailURL = 'http://localhost/carrental/Produktdetailseite.php';
    var ordersComplitionURL = 'http://localhost/carrental/Buchungsabschluss.php';
    var welcomeURL = 'http://localhost/carrental/Welcome.php';

    //if user comes from Produktdetailseite.php or Buchungsabschluss.php or WelcomePage.php than go back to homepage.php
    if (previousURL && previousURL.toLowerCase() === productDetailURL.toLowerCase()) {
        window.location.href = 'Homepage.php';
    } else if (previousURL && previousURL.toLowerCase() === ordersComplitionURL.toLowerCase()) {
        window.location.href = 'Homepage.php';
    } else if (previousURL && previousURL.toLowerCase() === welcomeURL.toLowerCase()) {
        window.location.href = 'Homepage.php';
    } else if (previousURL) {
        window.location.href = previousURL;
    } else {
        // if previous page is not valid go back to homepage.php
        window.location.href = 'Homepage.php';
    }
}
</script>
</body>

<footer>
<!--Include Footer-->
    <?php
        include('Footer.html');
    ?>
</footer>
</html>