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
            <link rel="stylesheet" href = "CSSMain.css">

            <!--Include Header-->
        <?php
        include('Header.html');
        ?> 
        </head>
    <body >
        <div id="background-image">
            <div class="transparentflex-container">
                <h2>Anmelden</h2>
                <form class="login-form" action="#" method="post"> <!--Willkommen Aktion einbauen und Login-Status auf true-->
                <table>
                    <tr>
                        <td><label for="username">Benutzername:</label></td>
                        <td><input type="text" id="username" name="username" required> </td>
                    </tr>
                    <tr>
                        <td><label for="password">Passwort:</label></td>
                        <td><input type="password" id="password" name="password" required> </td>
                    </tr>
                </table>
                <a href="RegisterPagePerson.php">Hier registrieren!</a><br>
                
                <button class="transparentflex-button" type="submit">Einloggen</button>
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