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
    <body >
        <div id="background-image">
            <div class="transparentflex-container">
                <h2>Registrieren</h2>
                <form class="register-form" action="#" method="post"> <!--Willkommen Aktion einbauen und login-Status auf true-->
                <table>
                        <td class="register-td"><label for="email">Email:</label><input type="email" id="email" name="email" required></td>
                        <td class="register-td"><label for="username">Benutzername:</label><input type="text" id="username" name="username" required></td>
                    </tr>
                    <tr>
                    <td class="register-td"><label for="password">Passwort:</label><input type="password" id="password" name="password" required></td>
                    <td class="register-td"><label for="password">Wiederhole Passwort:</label><input type="password" id="password" name="password" required></td>
                </tr>
                </table>
                <a href="LoginPage.php">Stattdessen anmelden</a> <br>
                <button class="transparentflex-button" type="submit">Registrieren</button>
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