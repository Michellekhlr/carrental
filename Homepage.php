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

            <form action="Produktübersicht.php" method="POST">
                <div class="schnellsuchetitel">
                    <p>Schnellsuche</p>
                </div>
    
                <div class="schnellsucheformular">
    
                    <div class="schnellfilter">
                        <label for="standort">Standort</label><br>
                        <select id="standort" name="Stadt">
                        <option value="alle" disabled selected hidden>Wähle einen Standort</option>
                        <option value="alle">Alle</option>
                        <option value="Hamburg">Hamburg</option>
                        <option value="Berlin">Berlin</option>
                        <option value="Muenchen">München</option>
                        <option value="Bielefeld">Bielefeld</option>
                        <option value="Bochum">Bochum</option>
                        <option value="Bremen">Bremen</option>
                        <option value="Dortmund">Dortmund</option>
                        <option value="Dresden">Dresden</option>
                        <option value="Freiburg">Hamburg</option>
                        <option value="Köln">Köln</option>
                        <option value="Leipzig">Leipzig</option>
                        <option value="Nürnberg">Nürnberg</option>
                        <option value="Paderborn">Paderborn</option>
                        <option value="Rostock">Rostock</option>
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
                        <option value="alle" disabled selected hidden>Beliebig</option>
                        <option value="alle">Alle</option>
                        <option value="Cabrio">Cabrio</option>
                        <option value="Mehrsitzer">Mehrsitzer</option>
                        <option value="Combi">Combi</option>
                        <option value="Limousine">Limousine</option>
                        <option value="SUV">SUV</option>
                        <option value="Coupé">Coupé</option>
                        </select>
                    </div>
        
                    <div class="schnellfilter">
                        <br><button type="submit">Finde deinen <span style="color: #ffbf00; font-style: italic;">Drive</span>!</button>
                    </div>
                
                </div>
    
    
                <div class="mehrfilter">
                    <div>
                        <button type="button" class="filterButton" onclick="toggleMenu()">+ Mehr Filter</button>
                    </div>
                </div>

                <div class="zusatz" id="zusatz">
                    <div>
                
                        <div class="zusaetzlichedetails">
                            <label for="hersteller">Hersteller:</label><br>
                            <select id="hersteller" name="Hersteller">
                                <option value="alle" disabled selected hidden>Beliebig</option>
                                <option value="alle">Alle</option>
                                <option value="Mercedes-Benz">Mercedes-Benz</option>
                                <option value="Mercedes-AMG">Mercedes AMG</option>
                                <option value="Audi">Audi</option>
                                <option value="BMW">BMW</option>
                                <option value="Volkswagen">Volkswagen</option>
                                <option value="Ford">Ford</option>
                                <option value="Range Rover">Range Rover</option>
                                <option value="Opel">Opel</option>
                                <option value="Jaguar">Jaguar</option>
                                <option value="Maserati">Maserati</option>
                                <option value="Skoda">Skoda</option>
                            </select>
                        </div>
                    
                        <div class="zusaetzlichedetails">
                            <label for="getriebe">Getriebe:</label><br>
                            <select id="getriebe" name="Getriebe">
                                <option value="alle" disabled selected hidden>Beliebig</option>
                                <option value="alle">Alle</option>
                                <option value="automatic">Automatik</option>
                                <option value="manually">Manuell</option>
                            </select>
                        </div>

                        <div class="zusaetzlichedetails">
                            <label for="preisbis">Preis:</label><br>
                            <select id="preisbis" name="Preis">
                                <option value="alle" disabled selected hidden>Beliebig</option>
                                <option value="alle">Alle</option>
                                <option value="100 €">Bis 100€</option>
                                <option value="200 €">Bis 200€</option>
                                <option value="300 €">Bis 300€</option>
                                <option value="400 €">Bis 400€</option>
                                <option value="500 €">Bis 500€</option>
                                <option value="ab 500 €">Ab 500€</option>
                            </select>
                        </div>

                        <div class="zusaetzlichedetails">
                            <label for="antrieb">Antrieb:</label><br>
                            <select id="antrieb" name="Antrieb">
                                <option value="alle" disabled selected hidden>Beliebig</option>
                                <option value="alle">Alle</option>
                                <option value="Combuster">Combuster</option>
                                <option value="Electric">Electric</option>
                            </select>
                        </div>
                    </div>
                </div>
            </form>
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
                <form>
                    <button class="kategoriename" name="Kategorie" value="Cabrio" formmethod="POST" formaction="Produktübersicht.php">Cabrio</button>
                </form>
            </div>
    
            <div>
                <form>
                    <button class="kategoriename" name="Kategorie" value="Mehrsitzer" formmethod="POST" formaction="Produktübersicht.php">Mehrsitzer</button>
                </form>
            </div>
    
            <div>
                <form>
                    <button class="kategoriename" name="Kategorie" value="Combi" formmethod="POST" formaction="Produktübersicht.php">Kombi</button>
                </form>
            </div>
    
            <div>
                <form>
                    <button class="kategoriename" name="Kategorie" value="Limousine" formmethod="POST" formaction="Produktübersicht.php">Limousine</button>
                </form>
            </div>
    
            <div>
                <form>
                    <button class="kategoriename" name="Kategorie" value="SUV" formmethod="POST" formaction="Produktübersicht.php">SUV</button>
                </form>
            </div>
    
            <div>
                <form>
                    <button class="kategoriename" name="Kategorie" value="Coupé" formmethod="POST" formaction="Produktübersicht.php">Coupé</button>
                </form>
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