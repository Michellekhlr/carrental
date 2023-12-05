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
            <div class="LogRegWel-title"><h1 style="margin: 0px">Willkommen</h1></div>
                <p style="font-size: 30px;"> Sie sind jetzt eingeloggt </p>
                <button onclick="goBack()" class="LogRegWel-button">Zurück</button>
            </div>
        </div>
    </div>
    <div class="SloganLogRegWel">
    Einfach.Flexibel.
</div>
    <script>
    function goBack() {  //go back to page where logout was called from
        var previousURL = '<?php echo $_SESSION['previousURL'];?>';
    if (previousURL) {
        window.location.href = previousURL;
        //window.open(previousURL);
    }
    else {
        window.open('Homepage.php');
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