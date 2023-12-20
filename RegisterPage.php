<?php
session_start();
?>
<!DOCTYPE html>
        <head>
            <title>Registrierung - Drive.</title><link rel="icon" type="image/png" href="bilder/Drive.png">
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
    <body >
        <div id="background-image">
            <div class="LogRegWel-container">
            <!-- Registrieren-Container  -->
            <div class="LogRegWel-title"><h2>Registrieren</h2> </div>
                <form class="register-form" action="Register.php" method="post"> 
                    <!--error when something is wrong with input data -->
                    <?php if (isset($_SESSION['error'])) { ?> 
                        <p class="loginRegisterError"><?php echo $_SESSION['error']; ?> </p>
                        <?php } ?>

                <table class="register-table">
                    <tr>
                    <td class="register-td"><label for="salutation">Anrede:</label><input input list="salutation" name="salutation" required></td>
                        <datalist id="salutation">
                            <option value="Frau">
                            <option value="Herr">
                            <option value="Divers">
                            </datalist>
                            <td class="register-td"> <label for="firstname">Vorname:</label> <input type="text" id="firstname" name="firstname" required></td>
                            <td class="register-td"><label for="lastname">Nachname:</label><input type="text" id="lastname" name="lastname" required></td>
                    </tr>
                    <tr>
                        <td class="register-td"><label for="age">Alter:</label><input type="number" id="age" name="age" required></td>
                        <td class="register-td"><label for="phone">Mobilnummer:</label><input type="tel" id="phone" name="phone"></td>
                        <td class="register-td"><label for="email">Email:</label><input type="email" id="email" name="email" required></td>
                    </tr>
                    <tr>
                        <td class="register-td"><label for="username">Benutzername:</label><input type="text" id="username" name="username" required></td>
                        <td class="register-td"><label for="password">Passwort:</label><input type="password" id="password" name="password1" required></td>
                        <td class="register-td"><label for="password">Wiederhole Passwort:</label><input type="password" id="password" name="password2" required></td>
                    </tr>
                </table>
                <!-- Wenn schon ein Konto, dann anmelden -->
                <a class="LogRegWel-link" href="LoginPage.php">Stattdessen anmelden</a> <br>
                <button class="LogRegWel-button" name="register" type="submit">Registrieren</button>
            </form>
        </div>
    </div>
    <div class="SloganLogRegWel">
    Einfach.Flexibel.
</div>
</body>
    <footer>
    <!--Include Footer-->
    <?php
    include('Footer.html');
    ?>
</footer>
</html>