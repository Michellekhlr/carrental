<?php
session_start();
?>
<!DOCTYPE html>

<head>
    <title>Datenschutz - Drive.</title>
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
                <p class="TextTitel">Datenschutzerklärung für die Website der "Drive" - Autovermietung GmbH</p>
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
            <br>
            <!-- Policy Section - Responsible Entity -->
            <p class="TextContentHeader">1. Verantwortliche Stelle</p>
            <p class="TextContent"> Verantwortlich für die Datenverarbeitung auf dieser Website ist: <br>
                Drive - Autovermietung GmbH, Willy-Brandt-Straße 75, 20459 Hamburg, Germany, E-Mail: info@drive-autovermietung.com</p>

            <!-- Policy Section - Types of Collected Data -->
            <p class="TextContentHeader">2. Arten der gesammelten Daten</p>
            <p class="TextContentHeader" style="line-height: 0;">2.1 Personenbezogene Daten: </p>
            <p class="TextContent">Wir sammeln Informationen, die Sie uns freiwillig zur Verfügung stellen, wie z.B. Ihren Namen, Ihre E-Mail-Adresse, Telefonnummer und andere Informationen, die für die Reservierung und Anmietung eines Fahrzeugs erforderlich sind.</p>
            <p class="TextContentHeader" style="line-height: 0;">2.2 Nicht-personenbezogene Daten: </p>
            <p class="TextContent">Zusätzlich erfassen wir automatisch Informationen über Ihren Besuch auf unserer Website, einschließlich der von Ihnen besuchten Seiten, Ihrer IP-Adresse, des verwendeten Browsers, des Zeitpunkts des Zugriffs und anderer nicht-personenbezogener Informationen.</p>

            <!-- Policy Section - Purpose of Data Collection -->
            <p class="TextContentHeader">3. Zweck der Datenerhebung</p>
            <p class="TextContent" style="line-height: 0;">Wir verarbeiten Ihre personenbezogenen Daten für folgende Zwecke:</p>
            <p class="TextContentHeader">3.1 Erfüllung von Verträgen: </p>
            <p class="TextContent" style="line-height: 0;">Um Reservierungen zu bearbeiten, Fahrzeuge bereitzustellen und andere mit der Vermietung verbundene Dienstleistungen zu erbringen.</p>

            <!-- Privacy Policy Section - Purpose of Data Collection (Continued) -->
            <p class="TextContentHeader">3.2 Kundenbetreuung:</p>
            <p class="TextContent" style="line-height: 0;">Um Ihre Anfragen zu beantworten und Ihnen den bestmöglichen Service zu bieten.</p>
            <p class="TextContentHeader">3.3 Marketing:</p>
            <p class="TextContent" style="line-height: 0;">Um Ihnen Informationen über unsere Produkte, Dienstleistungen und Sonderangebote zuzusenden, sofern Sie dem zugestimmt haben.</p>
            <p class="TextContentHeader">3.4 Website-Analyse:</p>
            <p class="TextContent" style="line-height: 0;">Um die Nutzung unserer Website zu analysieren und zu verbessern.</p>

            <!-- Privacy Policy Section - Data Sharing -->
            <p class="TextContentHeader">4. Weitergabe von Daten</p>
            <p class="TextContent">Wir geben Ihre personenbezogenen Daten nicht an Dritte weiter, es sei denn, dies ist für die Erfüllung unserer vertraglichen oder gesetzlichen Verpflichtungen erforderlich.</p>

            <!-- Privacy Policy Section - Data Security -->
            <p class="TextContentHeader">5. Datensicherheit</p>
            <p class="TextContent">Wir setzen angemessene technische und organisatorische Sicherheitsmaßnahmen ein, um Ihre Daten vor unbefugtem Zugriff, Verlust, Missbrauch oder Zerstörung zu schützen.</p>

            <!-- Privacy Policy Section - Your Rights -->
            <p class="TextContentHeader">6. Ihre Rechte</p>
            <p class="TextContent">Sie haben das Recht, Auskunft über die bei uns gespeicherten Daten zu erhalten, diese zu korrigieren, zu löschen oder deren Verarbeitung einzuschränken. Darüber hinaus können Sie der Verarbeitung Ihrer Daten widersprechen oder Ihr Recht auf Datenübertragbarkeit geltend machen. Bitte kontaktieren Sie uns dazu unter den oben genannten Kontaktdaten.</p>

            <!-- Privacy Policy Section - Cookies -->
            <p class="TextContentHeader">7. Cookies</p>
            <p class="TextContent">Wir verwenden Cookies, um die Benutzerfreundlichkeit unserer Website zu verbessern. Weitere Informationen finden Sie in unserer Cookie-Richtlinie.</p>

            <!-- Privacy Policy Section - Changes to Privacy Policy -->
            <p class="TextContentHeader">8. Änderungen dieser Datenschutzerklärung</p>
            <p class="TextContent">Diese Datenschutzerklärung kann von Zeit zu Zeit aktualisiert werden. Änderungen werden auf unserer Website veröffentlicht, und das Datum der letzten Aktualisierung wird angepasst.</p>

            <!-- Privacy Policy Section - Contact Information -->
            <p class="TextContentHeader">9. Kontakt</p>
            <p class="TextContent">Für Fragen oder Anliegen bezüglich Ihrer Daten und dieser Datenschutzerklärung können Sie uns unter info@drive-autovermietung.com kontaktieren.</p>

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