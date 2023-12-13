<?php
session_start();
?>
<!DOCTYPE html>

<head>
    <title>FAQ - Drive.</title><link rel="icon" type="image/png" href="bilder/Drive.png">
    <!--Sprachenimport von Google Fonts-->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Titillium+Web:wght@400;700&display=swap');
    </style>

    <!-- Import Schriftart Source Sans 3 -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Agbalumo&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Titillium+Web:wght@300;400&display=swap" rel="stylesheet">


    <!--Iconimport von Google-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <!--Styleimport von CSS Datei-->
    <link rel="stylesheet" href="CSSMain.css">


    <!--Import von jquery-->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script>
        $(function() {
            $("#accordion").accordion({
                collapsible: true, // panels collapse to take less space
                active: false // No panel is active before clicking 
            });
        });
    </script>

    <!--Include Header-->
    <?php
    include('Header.php');
    ?>
</head>

<body>

    <!--Building the Main Article-->
    <div class="FrameInfoFAQ">
        <div class="FrameContentInfoFAQ">
            <div class="FrameTitleSubtitleFAQ">
                <div class="FrameSubtitleFAQ">
                    <p class="SubtitleFAQ">FAQ</p>
                </div>
                <div class="FrameTitleFAQ">
                    <p class="TitleFAQ">Fragen, die uns oft erreichen: Alle Antworten im Überblick</p>
                </div>
            </div>
            <div class="FrameTextInfoFAQ">
                <div class="InnerFrameTextInfoFAQ">
                    <br>
                    <p class="TextInfoFAQ">Im Folgenden finden Sie die wichtigsten Fragen kompakt zusammengefasst.</p>
                    <br>
                    <p class="TextInfoFAQ">Die Themenbereiche sind in Kapitel gegliedert. Die Fragen und Antworten werden gemeinsam von unseren Teams erarbeitet und gesammelt. Die Fragen und Antworten können auch auf der Internetseite des BMAS abgerufen werden.</p>
                    <br>
                    <p class="TextInfoFAQ"><span class="boldText">Hinweis: </span>Der Fragenkatalog mit den jeweiligen Antworten wird von uns regelmäßig aktualisiert. Allerdings kann es durch den benötigten Arbeitsaufwand dazu kommen, dass aktuelle Thematiken mit entsprechender Verzögerung erscheinen.</p>
                </div>
            </div>
        </div>
    </div>




    <div class="FrameMoreArticles" style="margin-bottom: 60px;">
        <div class="InnerFrameMoreArticles">
            <div id="accordion" style="text-align: left;">
                <h3 class="TitelMoreArticles"> Reservierungen </h3>
                <div>
                    <br>
                    <p class="TextMoreArticles" style="text-align: left; font-weight: bold;">Wie kann ich ein Auto bei Drive. reservieren?
                    </p>
                    <br>
                    <p class="TextMoreArticles">Sie können online über unsere Website oder telefonisch reservieren. Wählen Sie einfach Ihr gewünschtes Fahrzeug und den Zeitraum aus.
                    </p>
                    <br>
                    <p class="TextMoreArticles" style="text-align: left; font-weight: bold;">Was passiert, wenn ich meine Reservierung stornieren muss?
                    </p>
                    <br>
                    <p class="TextMoreArticles">Stornierungen sind bis zu 24 Stunden vor der Abholzeit kostenlos. Danach kann eine Stornogebühr anfallen.
                    </p>
                    <br>
                </div>
                <h3 class="TitelMoreArticles"> Fahrzeugauswahl </h3>
                <div>
                    <p class="TextMoreArticles" style="text-align: left; font-weight: bold;">Welche Fahrzeugtypen bieten Sie an?
                    </p>
                    <br>
                    <p class="TextMoreArticles">Unsere Flotte umfasst eine Vielzahl von Fahrzeugen, von Kleinwagen bis zu SUVs und Luxusfahrzeugen.
                    </p>
                    <br>
                    <p class="TextMoreArticles" style="text-align: left; font-weight: bold;">Kann ich Zusatzausstattung wie Kindersitze oder GPS buchen?
                    </p>
                    <br>
                    <p class="TextMoreArticles">Ja, Sie können Extras wie Kindersitze, GPS und mehr bei Ihrer Buchung hinzufügen.
                    </p>
                    <br>
                </div>
                <h3 class="TitelMoreArticles"> Abhol- und Rückgabeprozess </h3>
                <div>
                    <p class="TextMoreArticles" style="text-align: left; font-weight: bold;">Wie läuft der Abholprozess ab?
                    </p>
                    <br>
                    <p class="TextMoreArticles">Kommen Sie zur vereinbarten Zeit zu unserem Standort, zeigen Sie Ihren Führerschein und die Buchungsbestätigung vor und erhalten Sie die Schlüssel.
                    </p>
                    <br>
                    <p class="TextMoreArticles" style="text-align: left; font-weight: bold;">Was muss ich bei der Rückgabe des Fahrzeugs beachten?
                    </p>
                    <br>
                    <p class="TextMoreArticles">Bitte bringen Sie das Fahrzeug zum vereinbarten Zeitpunkt zurück, stellen Sie sicher, dass es sauber und vollgetankt ist.
                    </p>
                    <br>
                </div>
                <h3 class="TitelMoreArticles"> Standorte </h3>
                <div>
                    <p class="TextMoreArticles" style="text-align: left; font-weight: bold;">Wo befinden sich Ihre Vermietungsstandorte?
                    </p>
                    <br>
                    <p class="TextMoreArticles">Wir haben Standorte in ganz Deutschland, einschließlich in großen Städten und an Flughäfen.
                    </p>
                    <br>
                    <p class="TextMoreArticles" style="text-align: left; font-weight: bold;">Kann ich das Auto an einem anderen Standort abgeben?
                    </p>
                    <br>
                    <p class="TextMoreArticles">Ja, One-Way-Mieten sind möglich, es kann jedoch eine Gebühr für die Einwegmiete anfallen.
                    </p>
                    <br>
                </div>
                <h3 class="TitelMoreArticles"> Preise und Gebühren </h3>
                <div>
                    <p class="TextMoreArticles" style="text-align: left; font-weight: bold;">Wie werden Ihre Tarife berechnet?
                    </p>
                    <br>
                    <p class="TextMoreArticles">Unsere Preise basieren auf dem Fahrzeugtyp und der Mietdauer. Langzeitmieten bieten wir zu reduzierten Tarifen an.
                    </p>
                    <br>
                    <p class="TextMoreArticles" style="text-align: left; font-weight: bold;">Gibt es versteckte Gebühren?
                    </p>
                    <br>
                    <p class="TextMoreArticles">Alle Gebühren werden transparent aufgeführt. Es gibt keine versteckten Kosten.
                    </p>
                    <br>
                </div>
                <h3 class="TitelMoreArticles"> Versicherungsoptionen </h3>
                <div>
                    <p class="TextMoreArticles" style="text-align: left; font-weight: bold;">Welche Versicherungsoptionen bieten Sie an?
                    </p>
                    <br>
                    <p class="TextMoreArticles">Wir bieten verschiedene Versicherungspakete an, einschließlich Haftpflicht, Vollkasko und Diebstahlschutz.
                    </p>
                    <br>
                    <p class="TextMoreArticles" style="text-align: left; font-weight: bold;">Was ist im Schadensfall abgedeckt?
                    </p>
                    <br>
                    <p class="TextMoreArticles">Je nach gewähltem Versicherungspaket sind Schäden am Fahrzeug und Haftpflichtschäden abgedeckt.
                    </p>
                    <br>
                </div>
                <h3 class="TitelMoreArticles"> Fahrzeugsicherheit und -wartung </h3>
                <div>
                    <p class="TextMoreArticles" style="text-align: left; font-weight: bold;">Wie gewährleisten Sie die Sicherheit der Fahrzeuge?
                    </p>
                    <br>
                    <p class="TextMoreArticles">Alle unsere Fahrzeuge werden regelmäßig gewartet und vor jeder Vermietung gründlich geprüft.
                    </p>
                    <br>
                    <p class="TextMoreArticles" style="text-align: left; font-weight: bold;">Wie oft werden Ihre Fahrzeuge gewartet?
                    </p>
                    <br>
                    <p class="TextMoreArticles">Fahrzeuge werden nach jedem Einsatz überprüft und regelmäßig gewartet.
                    </p>
                    <br>
                </div>
                <h3 class="TitelMoreArticles"> Kundenunterstützung </h3>
                <div>
                    <p class="TextMoreArticles" style="text-align: left; font-weight: bold;">Wie kann ich Sie bei Problemen kontaktieren?
                    </p>
                    <br>
                    <p class="TextMoreArticles">Unser Kundenservice ist rund um die Uhr telefonisch und per E-Mail erreichbar.
                    </p>
                    <br>
                    <p class="TextMoreArticles" style="text-align: left; font-weight: bold;">Was mache ich im Falle einer Panne oder eines Unfalls?
                    </p>
                    <br>
                    <p class="TextMoreArticles">Kontaktieren Sie sofort unseren Kundendienst. Wir bieten Pannenhilfe und unterstützen Sie bei der Unfallabwicklung.
                    </p>
                    <br>
                </div>
                <h3 class="TitelMoreArticles"> Sonderangebote und Treueprogramme </h3>
                <div>
                    <p class="TextMoreArticles" style="text-align: left; font-weight: bold;">Gibt es aktuelle Sonderangebote oder Rabatte?
                    </p>
                    <br>
                    <p class="TextMoreArticles">Aktuelle Angebote finden Sie auf unserer Webseite oder abonnieren Sie unseren Newsletter.
                    </p>
                    <br>
                    <p class="TextMoreArticles" style="text-align: left; font-weight: bold;">Haben Sie ein Treueprogramm für Stammkunden?
                    </p>
                    <br>
                    <p class="TextMoreArticles">Ja, wir bieten ein Treueprogramm mit Punkten, die gegen kostenlose Miettage eingetauscht werden können.
                    </p>
                    <br>
                </div>
                <h3 class="TitelMoreArticles"> Umweltfreundliche Optionen </h3>
                <div>
                    <p class="TextMoreArticles" style="text-align: left; font-weight: bold;">Bieten Sie umweltfreundliche Fahrzeuge wie Elektroautos an?
                    </p>
                    <br>
                    <p class="TextMoreArticles">Ja, wir haben eine Auswahl an Elektro- und Hybridfahrzeugen für umweltbewusste Kunden.
                    </p>
                    <br>
                </div>
            </div>
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