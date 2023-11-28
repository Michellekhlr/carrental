<!DOCTYPE html>
<head>
    <!--Sprachenimport von Google Fonts-->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Titillium+Web:wght@400;700&display=swap');
    </style>

    <!--Iconimport von Google-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <script src="https://kit.fontawesome.com/9740fceffb.js" crossorigin="anonymous"></script>

    <!--Styleimport von CSS Datei-->
    <link rel="stylesheet" href = "CSSMain.css">
    
    <!--Include Header-->
    <!-- <div class = "band" style = "text-align: left; background-color:  black; color: white; margin-top: 0px;"><h3><i>Angebot des Tages: 5er BMW für 139 Kartoffeln</i></h3></div>  -->
    <?php
     include('Header.html');
    ?>
</head>

<body> 
   
<div class="hintergrundschnellsuche">

    <div class="schnellsuche">

    <div class="schnellsuchetitel">
        <p>Schnellsuche</p>
    </div>

    <div class="schnellsucheformular">

     <form>
        <div class="schnellfilter">
            <label for "standort">Standort</label><br>
            <select id="stadt" name="stadt">
            <option value="" disabled selected hidden>Wähle einen Standort</option>
            <option value="hamburg">Hamburg</option>
            <option value="berlin">Berlin</option>
            <option value="muenchen">München</option>
            <option value="bielefeld">Bielefeld</option>
            <option value="bochum">Bochum</option>
            <option value="bremen">Bremen</option>
            <option value="dortmund">Dortmund</option>
            <option value="dresden">Dresden</option>
            <option value="freiburg">Hamburg</option>
            <option value="köln">Köln</option>
            <option value="leipzig">Leipzig</option>
            <option value="nürnberg">Nürnberg</option>
            <option value="paderborn">Paderborn</option>
            <option value="rostock">Rostock</option>
            </select>
        </div>

        <div class="schnellfilter">
            <label for "zeitraum">Zeitraum</label><br>        
            <input type="date" required placeholder="12.Jan-14.Jan">
        </div>

        <div class="schnellfilter">
            <label for "kategorie">Kategorie</label><br>
            <select id="kategorie" name="Kategorie">
            <option value="" disabled selected hidden>Beliebig</option>
            <option value="cabrio">Cabrio</option>
            <option value="mehrsitzer">Mehrsitzer</option>
            <option value="kombi">Kombi</option>
            <option value="limousine">Limousine</option>
            <option value="suv">SUV</option>
            <option value="coupe">Coupé</option>
            </select>
        </div>

        <div class="schnellfilter">
            <br><button>Suchen</button>
        </div>
</form>
</div>


    <div class="mehrfilter">
        <div>
            + mehr filter
        </div>
    </div>
</div>

    </div>

<div class="slogan">
    Einfach.Flexibel.
</div>

<div class="werbung">

    <div class="news">
        <img class="werbebilder" src="bilder/News.jpeg" alt="News">
        <p class="titelwerbung">News der Woche</p>
        <p class ="untertitelwerbung">Neu im Sortiment: BMW M4 CS</p>
        <p class ="beschreibungwerbung">Ab dem 1.November lässt sich die Track-Legende buchen, aber vorsichtig: Nur für Profis!</p>
        <p class="werbelinks">mehr erfahren</p>
    </div>

    <div class="story">
        <img class="werbebilder" src="bilder/Story.jpeg" alt="Story">
        <p class="titelwerbung">MyDrive Test</p>
        <p class ="untertitelwerbung">Mit Der G-Klasse durch die Wüste</p>
        <p class ="beschreibungwerbung">Wir haben Mercedes Offroad-König getestet, in extremer Hitze und bei starkem Wind. Das ging gut bis...</p>
        <p class="werbelinks">der ganze Test</p>
    </div>

    <div class="deals">
        <img class="werbebilder" src="bilder/Deals.jpeg" alt="Deals">
        <p class="titelwerbung">Deal der Woche</p>
        <p class ="untertitelwerbung">Halber preis für ganzen Fahrspaß</p>
        <p class ="beschreibungwerbung">Nur diese Woche könnt ihr den BMW 1er mit 60% Rabatt buchen, aber seid schnell: Angebot begrenzt!</p>
        <p class="werbelinks">zum Deal der Woche</p>
    </div>
</div>


<div class="unseredrives">
    Unsere Drives
</div>

<div class="flotte">    

<div class="flottenkategorien">
    <div class="balken">
    </div>

    <div class="bilder">
        <img class="flotteimg" src="bilder/Cabrio.png" alt="Cabrio">
        <img class="flotteimg" src="bilder/Mehrsitzer.png" alt="Mehrsitzer">
        <img class="flotteimg" src="bilder/Kombi.png" alt="Kombi">
        <img class="flotteimg" src="bilder/Limousine.png" alt="Limousine">
        <img class="flotteimg" src="bilder/SUV.png" alt="SUV">
        <img class="flotteimg" src="bilder/Coupé.png" alt="Coupe">
    </div>

</div>

<div class="flotteunterschriften">
        <div>
            Cabrio
        </div>

        <div>
            Mehrsitzer
        </div>

        <div>
            Kombi
        </div>

        <div>
            Limousine
        </div>

        <div>
            SUV
        </div>

        <div>
            Coupé
        </div>
    </div>

</div>


<div class="karte">

    <div class="infos">
        <p>230 Autos.</p>
        <p>64 Modelle.</p>
        <p>14 Standorte.</p></i>
</div>

        <div class="googlemapscard">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1607.971792516249!2d9.986237788939675!3d53.54863898956856!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47b18f1b09717f49%3A0x640fa1467dcc6d8e!2sHSBA%20Hamburg%20School%20of%20Business%20Administration!5e0!3m2!1sen!2sde!4v1700753858557!5m2!1sen!2sde" width="1280" height="640" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>

            </div>

<div class="newsletter">

    <div>
        Newsletter Abonnieren           
        <form class="newsletterform">
        <input type="email" required placeholder="Deine E-Mailadresse"><br>
        <button>Abonnieren</button>
        </form>
            </div>
</div>

<div class="contact">

    <div class="contactinfo">
        
    <div class="mobil">
        <div class="überschrift"><i class="fas fa-phone-alt"></i> Ruf Uns an</div>
        <div class="informationen">+4912345678910 | +49040123456789</div>
    </div>

    <div class="standorte">
        <div class="überschrift"><i class="fas fa-map-marker-alt"></i> Standorte</div>
        <div class="informationen">Hamburg | München | Dresden | Köln | Und viele weitere</div>
    </div>

    <div class="oeffnungszeiten">
        <div class="überschrift"><i class="far fa-clock"></i> Öffnungszeiten</div>
        <div class="informationen">Wir stehen rund um die Uhr an Ihrer Seite!</div>
    </div>
</div>

    <div class="contactformular">
        <h1>Kontaktiere Uns</h1>

        <form class="formular">  

            <input type="text" required placeholder="Dein Name"><br>

            
            <input type="email" required placeholder="Deine E-Mail"><br>

            
            <input type="text" required placeholder="Dein Anliegen" style="margin-top: 100px;"><br>

            <button>Absenden</button>

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