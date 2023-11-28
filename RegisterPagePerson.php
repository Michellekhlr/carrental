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
                    <tr>
                    <td class="register-td"><label for="salutation">Anrede:</label><input input list="salutation" required></td>
                        <datalist id="salutation">
                            <option value="Frau">
                            <option value="Herr">
                            <option value="Divers">
                            </datalist>
                        </tr>
                        <tr>
                        <td class="register-td"> <label for="firstname">Vorname:</label> <input type="text" id="firstname" name="firstname" required></td>
                        <td class="register-td"><label for="lastname">Nachname:</label><input type="text" id="lastname" name="lastname" required></td>
                    </tr>
                    <tr>
                        <td class="register-td"><label for="age">Alter:</label><input type= id="number" id="age" name="age" required></td>
                        <td class="register-td"><label for="phone">Mobilnummer:</label><input type="tel" id="phone" name="phone"></td>
                    </tr>
                </table>
                <a href="LoginPage.php">Stattdessen anmelden</a> <br>
                <button class="transparentflex-button" type="submit">Weiter</button>
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