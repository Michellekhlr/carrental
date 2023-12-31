<!DOCTYPE html>
<html>
    <header>
        <!--language import Google Fonts-->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Titillium+Web:wght@400;700&display=swap');
    </style>

    <!--Iconimport from Google-->
    <script src="https://kit.fontawesome.com/9740fceffb.js" crossorigin="anonymous"></script>

    <!--Styleimport CSS Datei-->
    <link rel="stylesheet" href = "CSSMain.css">
    </header>

    <!--Footer-->
    <footer style="background-color: #10100a;">
        <div class="SloganFooter">
                Schnell & Sicher ans Ziel
            </div>
      
        <table border="0" width="100%" style="color: white;">
            <tr>
                <td width="5%"></td>
                <td width="25%" style="vertical-align: middle; text-align: center;">
                    <div style="display: flex; flex-direction: column; align-items: center; justify-content: center;height: 100%;">
                        <h1 class="logofooter" style="margin: 0; font-size: 60px;"><a href="Homepage.php"><i>Drive.</i></a></h1>
                        <h3 style="color: #ffbf00; margin: 0;">Einfach. Flexibel.</h3>  
                    </div>
                </td>                
                
                <td width="20%" style="vertical-align: top;">
                    <ul class="flexcontainer">
                        <h1>Quick Links</h1>
                    <a href="Produktübersicht.php?buchen=ja"> 
                        <li class="p1">Buchen</li><br> <!--The query-parameter makes sure, that checkbox " offer" (id="checkboxoverview3") is deactivated when klicking "Buchen"-->
                    </a>
                    <a href="Produktübersicht.php?angebot=ja">
                        <li class="p1">Unsere Angebote</li><br> <!-- Activating checkbox " offer" (id="checkboxoverview3" ) by klicking "Unsere Angebote" via query-selector-->
                    </a>
                    <a href="AboutUs.php">
                        <li class="p1">Über uns</li><br>
                    </a>
                    <?php if (isset($loginStatus) && $loginStatus == true) : ?>
                    <a href="ordersPage.php">
                        <li class="p1">Buchungen verwalten</li><br>
                    </a>
                    <?php else : ?>
                    <a href="Homepage.php#Standorte">
                        <li class="p1">Standorte</li><br>
                    </a>
                    <?php endif; ?>
                    </ul>
                </td>
                <td width="20%" style="vertical-align: top;">
                    <ul class="flexcontainer">
                        <h1><i>MyDrive.</i></h1>
                    <a href="LoginPage.php" class="p1">
                        <li class="p1">Anmelden </a>/ <a href="RegisterPage.php" class="p1"> Registrieren </a></li> <br>
                    <a href="News.php">
                        <li class="p1">Presse & News</li><br>
                    </a>
                    <a href="Story.php">
                        <li class="p1">MyDrive Test</li><br>
                    </a>
                    <a href="FAQ.php">
                        <li class="p1">FAQ</li>
                    </a>
                    </ul>
                </td>
                <td width="25%" style="vertical-align: top;">
                    <ul class="flexcontainer">
                    <a href="Homepage.php#Kontakt">
                        <h1 class="Kontankt">Kontakt</h1>
                    </a>
                        <li>Willy-Brandt-Straße 75</li>
                        <li>20459 Hamburg</li><br>
                        <li>040 822160900</li>
                        <li>info@hsba.de</li><br>
                        <li>Öffnungszeiten:</li>
                        <li>24/7</li>
                    </ul>
                </td>
                <td width="5%"></td>
            </tr>
            <tr>
                <td width="100%" colspan="6" style="text-align: center;">
                    <div style="display: flex; justify-content: center; align-items: center; gap: 10px;">
                    <p class="p1" style="color: #ffbf00;">Zahlungsmöglichkeiten</p>
                    <i class="fab fa-cc-paypal" style="color: white; font-size: 30px;"></i>
                    <i class="fab fa-cc-mastercard" style="color: white; font-size: 30px;"></i>
                    <i class="fab fa-cc-visa" style="color: white; font-size: 30px;"></i>
                    <i class="fab fa-cc-amex" style="color: white; font-size: 30px;"></i>
                    </div>
                </td>
            </tr>
        </table><br>

        <div style="border: 1px solid white; width: 70%; margin: 0 auto;"></div><br>  

        <table border="0" width="100%">    
            <tr>
                <td width="5%"></td>
                <td width="90%" style="text-align: center;">
                    <div style="display: flex; justify-content: center; align-items: center; gap: 10px;">
                        <h2 style="color: #ffbf00;">Follow. Us.</h2><br><br><br>
                    <a href="https://www.facebook.com">
                        <i class="fab fa-facebook-square" style="color: white; font-size: 30px;"></i>
                    </a>
                    <a href="https://www.instagram.com/">
                        <i class="fab fa-instagram" style="color: white; font-size: 30px;"></i>
                    </a>
                    <a href="https://www.snapchat.com/">
                        <i class="fab fa-snapchat-ghost icon" style="color: white; font-size: 30px;"></i>
                    </a>
                    <a href="https://twitter.com/">
                        <i class="fab fa-twitter icon" style="color: white; font-size: 30px;"></i>
                    </a>
                    <a href="https://www.youtube.com/">
                        <i class="fab fa-youtube icon" style="color: white; font-size: 30px;"></i>
                    </a>
                    </div>
                </td>                
                <td width="5%"></td>
            </tr>
        </table><br>

        <div style="background-color: black;"><br>
            <div style="display: flex; justify-content: center; align-items: center; background-color: black; color: white;">
                <a href="Impressum.php">
                    <p class="legal">Impressum</p>
                </a>
                <a href="AGB.php">
                    <p class="legal">AGB</p>
                </a>
                <a href="Datenschutz.php">
                    <p class="legal">Datenschutz</p>
                </a>
            </div>
            <br>
            <div style="text-align: center;">                
                <p style="font-family: 'Bebas Neue', sans-serif; margin-left: 5px; color: white;">
                    <i class="fa-regular fa-copyright" style="color: #ffffff;"></i> 
                        2023 <i>Drive.</i> Inc. All rights reserved.</p>
            </div><br>
            </div>
   
        </div>
    </footer>  
</html>