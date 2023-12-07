<?php
session_start();
?>
<!DOCTYPE html>
<head>
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
        <div class="LogRegWel-container">
            <div class="welcomeLogout-Div">
            <div class="LogRegWel-title"><h1 style="margin: 0px">Auf Wiedersehen</h1> </div>
            <p style="font-size: 30px;"> Sie sind jetzt ausgeloggt </p>
            <button onclick="goBack()" class="LogRegWel-button">Zurück</button>
            </div>
        </div>
    </div>
    <div class="SloganLogRegWel">
    Einfach.Flexibel.
</div>
<script>
     function goBack() {  //go back to page where logout was called from
        var previousURL = sessionStorage.getItem('previousURL');
        if (previousURL) {
        // use saved URL
        window.location.href = previousURL;
        } else {
            // if no saved URL go back to Hompage
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