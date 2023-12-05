<?php
session_start();
?>
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
        include('Header.php');
        ?> 
        </head>
    <body >
        <div id="background-image">
            <div class="LogRegWel-container">
                <div class="LogRegWel-title"> <h2 style="margin: 0px">Anmelden</h2> </div>
                <form class="login-form" action="Login.php" method="post"> 
                <?php if (isset($_SESSION['error'])) { ?> <!--error when something is wrong with input data -->
                        <p class="loginRegisterError"><?php echo $_SESSION['error']; ?> </p>
                        <?php } ?>
                <table class="login-table">
                    <tr>
                        <td><label for="username">Benutzername:</label></td>
                    </tr>
                    <tr>
                        <td><input type="text" id="username" name="username" required> </td>
                    </tr>
                    <tr>
                        <td><label for="password">Passwort:</label></td>
                    </tr>
                    <tr>
                        <td><input type="password" id="password" name="password" required> </td>
                    </tr>
                </table>
                <a href="RegisterPage.php" style="color:black; text-decoration:underline;">Hier registrieren!</a><br>
                
                <button class="LogRegWel-button"  name="login" type="submit">Einloggen</button>
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