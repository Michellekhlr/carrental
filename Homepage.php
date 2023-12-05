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
    <script src="https://kit.fontawesome.com/9740fceffb.js" crossorigin="anonymous"></script>
 
    <title>jQuery UI Datepicker - Default functionality</title>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <title>jQuery UI Datepicker - Select a Date Range</title>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
   
    <script>
        $(function() {
            var dateFormat = "dd MM yy",
            from = $("#from").datepicker({
                altField: "#datepicker_input",
                dateFormat: dateFormat,
                regional: "de",
                monthNames: ["Jan", "Feb", "Mär", "Apr", "Mai", "Jun", "Jul", "Aug", "Sep", "Okt", "Nov", "Dez"],
                numberOfMonths: 2,
                minDate: 0,
                onSelect: function(selectedDate) {
                to.datepicker("option", "minDate", selectedDate);
                }
            }),
            to = $("#to").datepicker({
                dateFormat: dateFormat,
                regional: "de",
                numberOfMonths: 2,
                monthNames: ["Jan", "Feb", "Mär", "Apr", "Mai", "Jun", "Jul", "Aug", "Sep", "Okt", "Nov", "Dez"],
                minDate: 0,
                onSelect: function(selectedDate) {
                from.datepicker("option", "maxDate", selectedDate);
                }
            });

            function getDate(element) {
            var date;
            try {
                date = $.datepicker.parseDate(dateFormat, element.value);
            } catch (error) {
                date = null;
            }

            return date;
            }
        });
    </script>


 
 
    <!--Styleimport von CSS Datei-->
    <link rel="stylesheet" href = "CSSMain.css">
   
    <!--Include Header-->
    <!-- <div class = "band" style = "text-align: left; background-color:  black; color: white; margin-top: 0px;"><h3><i>Angebot des Tages: 5er BMW für 139 Kartoffeln</i></h3></div>  -->
    <?php
     include('Header.php');
    ?>
</head>
 
<body>
   
    <div class="hintergrundschnellsuche">
    
        <video autoplay muted loop class="hintergrundvideo">
            <source src="Infitite_Loop.mp4" type="video/mp4">
        </video>
    
        <div class="schnellsuche">
    
            <div class="schnellsuchetitel">
                <p>Schnellsuche</p>
            </div>
    
            <div class="schnellsucheformular">
    
                <form>
                    <div class="schnellfilter">
                        <label for="standort">Standort</label><br>
                        <select id="standort" name="Stadt">
                        <option value="" disabled selected hidden>Wähle einen Standort</option>
                        <option value="beliebig">Beliebig</option>
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
                        <label for="zeitraum">Zeitraum</label><br>        
                        <div class="date-picker-container">
                            <input type="text" id="from" name="from" required placeholder="Abholung">
                            <input type="text" id="to" name="to" required placeholder="Rückgabe">
                        </div>
                    </div>
        
                    <div class="schnellfilter">
                        <label for="kategorie">Kategorie</label><br>
                        <select id="kategorie" name="Kategorie">
                        <option value="" disabled selected hidden>Beliebig</option>
                        <option value="beliebig">Beliebig</option>
                        <option value="cabrio">Cabrio</option>
                        <option value="mehrsitzer">Mehrsitzer</option>
                        <option value="kombi">Kombi</option>
                        <option value="limousine">Limousine</option>
                        <option value="suv">SUV</option>
                        <option value="coupe">Coupé</option>
                        </select>
                    </div>
        
                    <div class="schnellfilter">
                        <br><button>Finde deinen <span style="color: #ffbf00; font-style: italic;">Drive</span>!</button>
                    </div>
                </form>
        </div>
    
    
        <div class="mehrfilter">
            <div>
                <button class="filterButton" onclick="toggleMenu()">+ Mehr Filter</button>
            </div>
        </div>

        <div class="zusatz" id="zusatz">
            <div>
                <form>
                    <div class="zusaetzlichedetails">
                        <label for="hersteller">Hersteller:</label><br>
                        <select id="hersteller" name="Hersteller">
                            <option value="" disabled selected hidden>Beliebig</option>
                            <option value="beliebig">Beliebig</option>
                            <option value="beliebig">Mercedes-Benz</option>
                            <option value="coupe">Mercedes AMG</option>
                            <option value="cabrio">Audi</option>
                            <option value="mehrsitzer">BMW</option>
                            <option value="kombi">Volkswagen</option>
                            <option value="limousine">Ford</option>
                            <option value="suv">Range Rover</option>
                            <option value="coupe">Opel</option>
                            <option value="coupe">Jaguar</option>
                            <option value="coupe">Maserati</option>
                            <option value="coupe">Skoda</option>
                        </select>
                    </div>
                
                    <div class="zusaetzlichedetails">
                        <label for="getriebe">Getriebe:</label><br>
                        <select id="getriebe" name="Getriebe">
                            <option value="" disabled selected hidden>Beliebig</option>
                            <option value="beliebig">Beliebig</option>
                            <option value="automatik">Automatik</option>
                            <option value="manuell">Manuell</option>
                        </select>
                    </div>

                    <div class="zusaetzlichedetails">
                        <label for="preisbis">Preis:</label><br>
                        <select id="preisbis" name="Preis">
                            <option value="" disabled selected hidden>Beliebig</option>
                            <option value="beliebig">Beliebig</option>
                            <option value="bis100">Bis 100€</option>
                            <option value="bis200">Bis 200€</option>
                            <option value="bis300">Bis 300€</option>
                            <option value="bis400">Bis 400€</option>
                            <option value="bis500">Bis 500€</option>
                            <option value="ab500">Ab 500€</option>
                        </select>
                    </div>

                    <div class="zusaetzlichedetails">
                        <label for="antrieb">Antrieb:</label><br>
                        <select id="antrieb" name="Antrieb">
                            <option value="" disabled selected hidden>Beliebig</option>
                            <option value="beliebig">Beliebig</option>
                            <option value="diesel">Diesel</option>
                            <option value="benzin">Benzin</option>
                            <option value="elektrisch">Elektrisch</option>
                        </select>
                    </div>
                </form>
            </div>
        </div>
    </div>

        <script>
            function toggleMenu() {
                var menu = document.getElementById("zusatz");
                if (menu.style.opacity == 0) {
                    menu.style.opacity = 1;
                } else {
                    menu.style.opacity = 0;
                }
            }
        </script>
    
    </div>
    
    <div class="slogan">
        <div>
            Einfach.Flexibel.
        </div>
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
                <p>14 Standorte.</p>  
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
                <div class="überschrift"><i class="far fa-comment-dots"></i> Kontakt</div>
                <div class="informationen">drive.support@web.de | +49040123456789</div>
            </div>
        
            <div class="standorte">
                <div class="überschrift"><i class="far fa-flag"></i> Standorte</div>
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
                <textarea required placeholder="Dein Anliegen" style="margin-top: 10px;"></textarea><br>
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