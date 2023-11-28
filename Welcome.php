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
        include('Header.html');
    ?> 
</head>

<body>
    <div id="background-image">
        <div class="transparentflex-container">
            <div class="welcomeLogout-Div">
                <h1 style="font-size: 50px;">Willkommen</h1>
                <p style="font-size: 30px;"> Sie sind jetzt eingeloggt </p>
                <button onclick="goback()" class="transparentflex-button">Zurück</button>
            </div>
        </div>
    </div>
    <script>
    function goBack() {
        //hier kommt dann Funktion hin, dass zu der Stelle zurück gegangen wird, wo wir herkamen
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