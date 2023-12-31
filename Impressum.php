<?php
session_start();
?>
<!DOCTYPE html>

<head>
    <title>Impressum - Drive.</title>
    <link rel="icon" type="image/png" href="bilder/Drive.png">
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

    <!--Include Header-->
    <?php
    include('Header.php');
    ?>
</head>

<body>
    <!-- Container for Title and Subtitle -->
    <div class="FrameTitelUntertitel">
        <!-- Title Section -->
        <div class="FrameTitel">
            <div class="InnerframeTitel">
                <!-- Title Text -->
                <p class="TextTitel">Impressum der “Drive.”-Autovermietung GmbH</p>
            </div>
        </div>

        <!-- Subtitle Section -->
        <div class="FrameSubtitle">
            <div class="InnerframeSubtitle">
                <!-- Subtitle Text -->
                <p class="TextSubtitle">Stand: 22.12.2023</p>
            </div>
        </div>
    </div>

    <!-- Container for Content -->
    <div class="FrameContent">
        <div class="InnerFrameContent">

            <!-- Content Section - Responsible for the Content -->
            <p class="TextContentHeader">Verantwortlich für den Inhalt:</p>
            <p class="TextContent">Drive Autovermietung GmbH<br>
                Willy-Brandt-Straße 75<br>
                20459 Hamburg<br>
                Geschäftsführung: Michelle Köhler</p>

            <!-- Content Section - Contact Information -->
            <p class="TextContentHeader">Kontakt:</p>
            <p class="TextContent">Telefon: +49 (0)123 456 789<br>
                E-Mail: info@drive-autovermietung.de</p>

            <!-- Content Section - Commercial Register Information -->
            <p class="TextContentHeader">Handelsregister:</p>
            <p class="TextContent">Registergericht: Amtsgericht Hamburg<br>
                Registernummer: HRB 12345</p>

            <!-- Content Section - VAT Identification Number -->
            <p class="TextContent">Umsatzsteuer-Identifikationsnummer: DE123456789</p>

            <!-- Content Section - Responsible for Editorial Content -->
            <p class="TextContentHeader">Verantwortlich für redaktionelle Inhalte:</p>
            <p class="TextContent">Max Mustermann<br>
                Willy-Brandt-Straße 75<br>
                20459 Hamburg<br>
                E-Mail: redaktion@drive-autovermietung.de</p>

            <!-- Content Section - Data Protection Notice -->
            <p class="TextContentHeader">Hinweis zum Datenschutz:</p>
            <p class="TextContent">Die Nutzung unserer Webseite ist in der Regel ohne Angabe personenbezogener Daten möglich. Soweit auf unseren Seiten personenbezogene Daten (beispielsweise Name, Anschrift oder E-Mail-Adressen) erhoben werden, erfolgt dies, soweit möglich, stets auf freiwilliger Basis. Weitere Informationen zum Datenschutz finden Sie in unserer Datenschutzerklärung.</p>

            <!-- Content Section - Disclaimer -->
            <p class="TextContentHeader">Haftungsausschluss:</p>
            <p class="TextContent">Die Inhalte unserer Seiten wurden mit größter Sorgfalt erstellt. Für die Richtigkeit, Vollständigkeit und Aktualität der Inhalte können wir jedoch keine Gewähr übernehmen. Haftungsansprüche gegen uns, welche sich auf Schäden materieller oder ideeller Art beziehen, die durch die Nutzung oder Nichtnutzung der dargebotenen Informationen bzw. durch die Nutzung fehlerhafter und unvollständiger Informationen verursacht wurden, sind grundsätzlich ausgeschlossen.</p>

            <!-- Content Section - Copyright Notice -->
            <p class="TextContentHeader">Urheberrecht:</p>
            <p class="TextContent">Die durch die Seitenbetreiber erstellten Inhalte und Werke auf diesen Seiten unterliegen dem deutschen Urheberrecht. Die Vervielfältigung, Bearbeitung, Verbreitung und jede Art der Verwertung außerhalb der Grenzen des Urheberrechts bedürfen der schriftlichen Zustimmung des jeweiligen Autors bzw. Erstellers.</p>

            <!-- Content Section - Image Credits -->
            <p class="TextContentHeader">Bildnachweise:</p>
            <p class="TextContent">Die auf dieser Website verwendeten Bilder stammen von Shutterstock und sind urheberrechtlich geschützt.</p>

            <!-- Content Section - Online Dispute Resolution (ODR) -->
            <p class="TextContentHeader">Online-Streitbeilegung (OS):</p>
            <p class="TextContent">Die Europäische Kommission stellt eine Plattform zur Online-Streitbeilegung (OS) bereit. Die Plattform finden Sie unter <a href="http://ec.europa.eu/consumers/odr/">http://ec.europa.eu/consumers/odr/</a>.</p>

            <!-- Content Section - Consumer Dispute Resolution -->
            <p class="TextContentHeader">Verbraucherstreitbeilegung:</p>
            <p class="TextContent">Wir sind nicht bereit oder verpflichtet, an Streitbeilegungsverfahren vor einer Verbraucherschlichtungsstelle teilzunehmen.</p>



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