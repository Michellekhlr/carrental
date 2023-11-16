<!DOCTYPE html>
<html>
        <head>
            <!--Sprachenimport von Google Fonts-->
            <style>
                @import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Titillium+Web:wght@400;700&display=swap');
            </style>
        
            <!--Iconimport von Google-->
            <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        
            <!--Styleimport von CSS Datei-->
            <link rel="stylesheet" href = "CSS Drive..css">

            <!--Include Header-->
        <?php
        include('HeaderDrive.html');
        ?> 
        </head>
    <body >
        <div id="background-image">
            <div id="login-container">
                <h2>Anmelden</h2>
                <form id="login-form" action="#" method="post">
                <label for="username">Benutzername:</label>
                <input type="text" id="username" name="username" required>
        
                <label for="password">Passwort:</label>
                <input type="password" id="password" name="password" required>

                <a href="RegisterPage.php">Hier registrieren!</a> <br>
                
                <button id="loginButton" type="submit">Einloggen</button>
            </form>
        </div>
    </div>
</body>
    <footer>
    <!--Include Footer-->
    <?php
    include('Footer.html');
    ?>
</footer>
</html>