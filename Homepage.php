<?php
session_start();
?>

<!DOCTYPE html>

<head>
    <title>Startseite - Drive.</title>
    <link rel="icon" type="image/png" href="bilder/Drive.png">
    <!--Sprachenimport von Google Fonts-->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Titillium+Web:wght@400;700&display=swap');
    </style>

    <!--Iconimport von Google-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script src="https://kit.fontawesome.com/9740fceffb.js" crossorigin="anonymous"></script>

    <!--Kalendarimport jQuery für Datum-/Zeitraumauswahl-->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

    <!--Setting of the time period selection-->
    <script>
        $(function() {
            var dateFormatalt = "yy-mm-dd";
            var dateFormat ="dd.mm.yy";
            from = $("#from").datepicker({
                altField: "#from_alt",
                dateFormat: dateFormat,
                altFormat: dateFormatalt,
                regional: "de",
                monthNames: ["Jan", "Feb", "Mär", "Apr", "Mai", "Jun", "Jul", "Aug", "Sep", "Okt", "Nov", "Dez"],
                numberOfMonths: 2,   
                minDate: 0, //Prevents a date from the past from being selected.
                onSelect: function(selectedDate) {
                to.datepicker("option", "minDate", selectedDate); //Prevents a return date from being selected that is earlier than the pick-up date.
                } 
            }),
            to = $("#to").datepicker({
                altField: "#to_alt",
                dateFormat: dateFormat,
                altFormat: dateFormatalt,
                regional: "de",
                numberOfMonths: 2,
                monthNames: ["Jan", "Feb", "Mär", "Apr", "Mai", "Jun", "Jul", "Aug", "Sep", "Okt", "Nov", "Dez"],
                minDate: 0,
                onSelect: function(selectedDate) {
                from.datepicker("option", "maxDate", selectedDate); //Prevents a pick-up date from being selected that is later than the return date.
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
    <link rel="stylesheet" href="CSSMain.css">

    <!--Include Header-->
    <?php
    include('Header.php');
    ?>

    <!--JS code for the integration of the carousel-->
    <script>
        function cSlider() {
            'use strict';

            var $carousel = jQuery('.cslider');

            if ($carousel.length > 0) {

                // Variables
                var $carouselItem = $carousel.find('.cslider-item'),
                    $prev = $carousel.find('.cslider-prev'),
                    $next = $carousel.find('.cslider-next'),
                    itemLength = $carouselItem.length,
                    index = 0;


                // functions
                function setIndex(i, add) {
                    if (i + add >= itemLength) {
                        return i + add - itemLength;
                    } else {
                        return i + add;
                    }
                }

                function setState(i) {
                    // Reset off the classes 
                    $carouselItem.attr('class', 'cslider-item')

                    // Zuweisung der Klassen
                    $carouselItem.eq(setIndex(i, 0)).addClass('cslider-item-first');
                    $carouselItem.eq(setIndex(i, 1)).addClass('cslider-item-previous');
                    $carouselItem.eq(setIndex(i, 2)).addClass('cslider-item-selected');
                    $carouselItem.eq(setIndex(i, 3)).addClass('cslider-item-next');
                    $carouselItem.eq(setIndex(i, 4)).addClass('cslider-item-last');


                }

                // Control fields
                $next.on('click', function() {
                    index = index + 1;
                    if (index >= itemLength) {
                        index = 0;
                    }
                    setState(index);
                });

                $prev.on('click', function() {
                    if (index <= 0) {
                        index = itemLength;
                    }
                    index = index - 1;
                    setState(index);
                });

                // Start slider
                setState(index);

            }

        }

        // Shorthand for $( document ).ready()
        jQuery(function() {
            cSlider();
        });
    </script>

</head>

<body>

    <!--Gesamtbereich der Schnellsuche-->
    <div class="hintergrundschnellsuche">

        <video autoplay muted loop class="hintergrundvideo"> <!--Hintergrundvideo eigefügt, das endlos läuft-->
            <source src="videos/Infitite_Loop.mp4" type="video/mp4">
        </video>

        <div class="schnellsuche">

            <form action="Produktübersicht.php" method="POST"> <!--Transferring the quick filters to the product overview page-->
                <div class="schnellsuchetitel">
                    <p>Schnellsuche</p>
                </div>

                <div class="schnellsucheformular">

                    <div class="schnellfilter">
                        <label for="standort">Standort</label><br> <!--Auswahl der Standorte-->
                        <select id="standort" name="Stadt">
                            <option value="alle" disabled selected hidden>Wähle einen Standort</option>
                            <option value="alle">Alle</option>
                            <option value="Hamburg">Hamburg</option>
                            <option value="Berlin">Berlin</option>
                            <option value="München">München</option>
                            <option value="Bielefeld">Bielefeld</option>
                            <option value="Bochum">Bochum</option>
                            <option value="Bremen">Bremen</option>
                            <option value="Dortmund">Dortmund</option>
                            <option value="Dresden">Dresden</option>
                            <option value="Freiburg">Freiburg</option>
                            <option value="Köln">Köln</option>
                            <option value="Leipzig">Leipzig</option>
                            <option value="Nürnberg">Nürnberg</option>
                            <option value="Paderborn">Paderborn</option>
                            <option value="Rostock">Rostock</option>
                        </select>
                    </div>

                    <div class="schnellfilter">
                        <label for="zeitraum">Zeitraum</label><br><!--Auswahl des Zeitraumes-->
                        <div class="date-picker-container">
                            <input type="text" id="from" required placeholder="Abholung" autocomplete="off">
                            <input type="hidden" id="from_alt" name="from" required placeholder="Abholung" autocomplete="off"><!--Two input fields have been added. One is not visible and should transfer the date according to the database format and the other is visible and displays the date in German format.-->
                            <input type="text" id="to" required placeholder="Rückgabe" autocomplete="off">
                            <input type="hidden" id="to_alt" name="to" required placeholder="Rückgabe" autocomplete="off">
                        </div>
                    </div>

                    <div class="schnellfilter">
                        <label for="kategorie">Kategorie</label><br><!--Auswahl der Kategorien-->
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
                        <br><button type="submit">Finde deinen <span style="color: #ffbf00; font-style: italic;">Drive</span>!</button><!--Button for transferring the selected filters to the product overview page-->
                    </div>

                </div>


                <div class="mehrfilter">
                    <div>
                        <button type="button" class="filterButton" onclick="toggleMenu()">+ Mehr Filter</button> <!--Option to select more filters. Pressing the button opens another filter box at the bottom.-->
                    </div>
                </div>

                <div class="zusatz" id="zusatz"><!--Zusätzliche Filteroptionen, die nach unten ausklappen, wenn auf "Mehr Filter" gedrückt wird.-->
                    <div>

                        <div class="zusaetzlichedetails">
                            <label for="hersteller">Hersteller:</label><br><!--Auswahl des Herstellers-->
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
                            <label for="getriebe">Getriebe:</label><br><!--Auswahl des Getriebes-->
                            <select id="getriebe" name="Getriebe">
                                <option value="alle" disabled selected hidden>Beliebig</option>
                                <option value="alle">Alle</option>
                                <option value="automatic">Automatik</option>
                                <option value="manually">Manuell</option>
                            </select>
                        </div>

                        <div class="zusaetzlichedetails">
                            <label for="preisbis">Preis:</label><br><!--Auswahl des Preises-->
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
                            <label for="antrieb">Antrieb:</label><br><!--Auswahl des Antriebes-->
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
            //Only display additional filters if "Mehr Filter" is pressed, otherwise they should not be visible.
            function toggleMenu() {
                var menu = document.getElementById("zusatz");
                if (menu.style.display == "none") {
                    menu.style.display = "flex";
                } else {
                    menu.style.display = "none";
                }
            }
        </script>

    </div>

    <!--Präsentation des Slogans-->
    <div class="slogan">
        <div>
            Einfach.Flexibel.
        </div>
    </div>

    <!--Werbebox, die in 3 Themen unterteilt ist.-->
    <div class="werbung">

        <div class="news"><!--Werbebox für die News-->
            <img class="werbebilder" src="bilder/News.jpeg" alt="News">
            <p class="titelwerbung">News der Woche</p>
            <p class="untertitelwerbung">Neu im Sortiment: BMW M4 CS</p>
            <p class="beschreibungwerbung">Ab dem 1.November lässt sich die Track-Legende buchen, aber vorsichtig: Nur für Profis!</p>
            <a href="News.php">
                <p class="werbelinks">mehr erfahren</p>
            </a>
        </div>

        <div class="story"><!--Werbebox für Geschichten-->
            <img class="werbebilder" src="bilder/Story.jpeg" alt="Story">
            <p class="titelwerbung">MyDrive Test</p>
            <p class="untertitelwerbung">Mit Der G-Klasse durch die Wüste</p>
            <p class="beschreibungwerbung">Wir haben Mercedes Offroad-König getestet, in extremer Hitze und bei starkem Wind. Das ging gut bis...</p>
            <a href="Story.php">
                <p class="werbelinks">der ganze Test</p>
            </a>
        </div>

        <div class="deals"><!--Werbebox für Angebote-->
            <img class="werbebilder" src="bilder/Deals.jpeg" alt="Deals">
            <p class="titelwerbung">Deal der Woche</p>
            <p class="untertitelwerbung">Halber preis für ganzen Fahrspaß</p>
            <p class="beschreibungwerbung">Nur diese Woche könnt ihr den BMW 1er mit 60% Rabatt buchen, aber seid schnell: Angebot begrenzt!</p>
            <a href="Produktübersicht.php?angebot=ja"> <!-- Activating checkbox " offer" (id="checkboxoverview3" ) by klicking "Unsere Angebote" via query-selector-->
                <p class="werbelinks">zum Deal der Woche</p>
            </a>
        </div>

    </div>

    <!--Vorstellung der Fahrzeuge-->
    <div class="unseredrives">
        Unsere Drives
    </div>

    <!--Fahrzeugkarussell, in welchem alle Fahrzeugkategorien angezeigt werden.-->
    <div class="cslider">
        <div class="cslider-carousel">
            <div class="cslider-item"><!--Fahrzeugpräsentation des einzelnen Autos im Karussell. Diese Struktur ist gleichbleibend für alle 6 Fahrzeuge.-->
                <img src="bilder/Cabrio.png" alt="Slider Image" /><!--Bild der Fahrzeugkategorie-->
                <div class="cslider-text">
                    <form>
                        <button class="kategoriename" name="Kategorie" value="Cabrio" formmethod="POST" formaction="Produktübersicht.php">Cabrio</button><!--When you click on the vehicle category, you are redirected to the product overview page and all vehicles in this category are pre-filtered and displayed.-->
                    </form>
                    <p>Freiheit auf Knopfdruck: Dein offenes Erlebnis.</p><!--Werbeslogan der Kategorie-->
                </div>
            </div>

            <div class="cslider-item">
                <img src="bilder/Mehrsitzer.png" alt="Slider Image" />
                 <div class="cslider-text">
                    <form>
                        <button class="kategoriename" name="Kategorie" value="Mehrsitzer" formmethod="POST" formaction="Produktübersicht.php">Mehrsitzer</button>
                    </form>
                    <p>Gemeinsam unterwegs: Dein Platz für Familie und Freunde.</p>
            </div>
        </div>

        <div class="cslider-item">
            <img src="bilder/Kombi.png" alt="Slider Image" />
            <div class="cslider-text">
                <form>
                    <button class="kategoriename" name="Kategorie" value="Combi" formmethod="POST" formaction="Produktübersicht.php">Combi</button>
                </form>
                <p>Flexibilität trifft Stil: Dein Raum für jede Reise.</p>
            </div>
        </div>

        <div class="cslider-item">
            <img src="bilder/Limousine.png" alt="Slider Image" />
            <div class="cslider-text">
                <form>
                    <button class="kategoriename" name="Kategorie" value="Limousine" formmethod="POST" formaction="Produktübersicht.php">Limousine</button>
                </form>
                <p>Luxus, der fährt: Dein Komfort auf jeder Strecke.</p>
            </div>
        </div>

        <div class="cslider-item">
            <img src="bilder/SUV.png" alt="Slider Image" />
            <div class="cslider-text">
                <form>
                    <button class="kategoriename" name="Kategorie" value="SUV" formmethod="POST" formaction="Produktübersicht.php">SUV</button>
                </form>
                <p>Unbeirrbar robust, unwiderstehlich elegant: Das SUV Erlebnis.</p>
            </div>
        </div>

        <div class="cslider-item">
            <img src="bilder/Coupé.png" alt="Slider Image" />
            <div class="cslider-text">
                <form>
                    <button class="kategoriename" name="Kategorie" value="Coupé" formmethod="POST" formaction="Produktübersicht.php">Coupé</button>
                </form>
                <p id="Standorte">Eleganz in Bewegung: Dein Statement auf der Straße.</p><!--Deutschlandkarte, auf der alle Standorte gepinnt sind / id is needed for anker link(footer)-->
            </div>
        </div>

    </div>
    <div class="cslider-controls"><!--Pfeile, mit denen man vorwärts und rückwarts scrollen kann, um Fahrezeuge anzuschauen.-->
        <div class="cslider-prev"></div>
        <div class="cslider-next"></div>
    </div>
    </div>

    <!--Vorstellung von Informationen und den Standorten auf einer Karte-->
    <div class="karte">

        <div class="infos"><!--Neben der Karte folgende Informationen zu sehen-->
            <p>230 Autos.</p>
            <p>64 Modelle.</p>
            <p>14 Standorte.</p>
        </div>

        <div class="map-container">
            <div class="ger-map">
                <img src="bilder/karte.png" alt="map"><!--Bild der Deutschlandkarte-->

                <!--Die Struktur der Pinnadeln ist für alle Standorte gleichbleibend.-->
                <div class="pin hamburg"><!--Pinnadel des Standortes-->
                    <form>
                        <button class="standort" name="Stadt" value="Hamburg" formmethod="POST" formaction="Produktübersicht.php">Hamburg</button><!--Name of the location. When you click on it, you are transferred to the product overview page and all cars in the location are pre-filtered and displayed.-->
                    </form>
                </div>

                <div class="pin berlin">
                    <form>
                        <button class="standort" name="Stadt" value="Berlin" formmethod="POST" formaction="Produktübersicht.php">Berlin</button>
                    </form>
                </div>

                <div class="pin paderborn">
                    <form>
                        <button class="standort" name="Stadt" value="Paderborn" formmethod="POST" formaction="Produktübersicht.php">Paderborn</button>
                    </form>
                </div>

                <div class="pin rostock">
                    <form>
                        <button class="standort" name="Stadt" value="Rostock" formmethod="POST" formaction="Produktübersicht.php">Rostock</button>
                    </form>
                </div>

                <div class="pin bielefeld">
                    <form>
                        <button class="standort" name="Stadt" value="Bielefeld" formmethod="POST" formaction="Produktübersicht.php">Bielefeld</button>
                    </form>
                </div>

                <div class="pin bochum">
                    <form>
                        <button class="standort" name="Stadt" value="Bochum" formmethod="POST" formaction="Produktübersicht.php">Bochum</button>
                    </form>
                </div>

                <div class="pin bremen">
                    <form>
                        <button class="standort" name="Stadt" value="Bremen" formmethod="POST" formaction="Produktübersicht.php">Bremen</button>
                    </form>
                </div>

                <div class="pin dortmund">
                    <form>
                        <button class="standort" name="Stadt" value="Dortmund" formmethod="POST" formaction="Produktübersicht.php">Dortmund</button>
                    </form>
                </div>

                <div class="pin dresden">
                    <form>
                        <button class="standort" name="Stadt" value="Dresden" formmethod="POST" formaction="Produktübersicht.php">Dresden</button>
                    </form>
                </div>

                <div class="pin freiburg">
                    <form>
                        <button class="standort" name="Stadt" value="Freiburg" formmethod="POST" formaction="Produktübersicht.php">Freiburg</button>
                    </form>
                </div>

                <div class="pin koeln">
                    <form>
                        <button class="standort" name="Stadt" value="Köln" formmethod="POST" formaction="Produktübersicht.php">Köln</button>
                    </form>
                </div>

                <div class="pin leipzig">
                    <form>
                        <button class="standort" name="Stadt" value="Leipzig" formmethod="POST" formaction="Produktübersicht.php">Leipzig</button>
                    </form>
                </div>

                <div class="pin muenchen">
                    <form>
                        <button class="standort" name="Stadt" value="München" formmethod="POST" formaction="Produktübersicht.php">München</button>
                    </form>
                </div>

                <div class="pin nuernberg">
                    <form>
                        <button class="standort" name="Stadt" value="Nürnberg" formmethod="POST" formaction="Produktübersicht.php">Nürnberg</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!--Newsletteranzeige-->
    <div class="newsletter">

        <div>
            Newsletter Abonnieren
            <form class="newsletterform" id="Kontakt"><!--Formular, für das Abonnieren des Newsletter. Formular ist nicht funktional.-->
                <input type="email" required placeholder="Deine E-Mailadresse" autocomplete="off"><br>
                <button>Abonnieren</button>
            </form>
        </div>
    </div>

    <!--Kontaktformular und weitere Informationen-->
    <div class="contact">

        <div class="contactinfo"><!--Neben dem Kontaktformular werden folgende Informationen vermittelt-->

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

        <div class="contactformular"><!--Kontaktformular, welches nicht funktional ist.-->
            <h1>Kontaktiere Uns</h1>

            <form class="formular">
                <input type="text" required placeholder="Dein Name"><br>
                <input type="email" required placeholder="Deine E-Mail" autocomplete="off"><br>
                <textarea required placeholder="Dein Anliegen" style="margin-top: 10px;"></textarea><br>
                <button>Absenden</button>
            </form>
        </div>
    </div>
</body>

<footer>
    <!--Include Footer-->
    <?php
    include('Footer.php');
    ?>
</footer>

</html>