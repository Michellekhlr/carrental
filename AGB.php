<?php
session_start();
?>
<!DOCTYPE html>

<head>
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
    <div class="FrameTitelUntertitel">
        <div class="FrameTitel">
            <div class="InnerframeTitel">
                <p class="TextTitel">Allgemeine Geschäftsbedingungen (AGB)</p>
            </div>
        </div>
        <div class="FrameSubtitle">
            <div class="InnerframeSubtitle">
                <p class="TextSubtitle">Stand: 22.12.2023</p>
            </div>
        </div>
    </div>

    <div class="FrameContent">
        <div class="InnerFrameContent">



            <p class="TextContentHeader">Vertragsgegenstand</p>
            <p class="TextContent">"Drive" vermietet dem Kunden das im Mietvertrag genau beschriebene Fahrzeug für den vereinbarten Zeitraum und zu den vereinbarten Konditionen.</p>

            <p class="TextContentHeader">Buchung und Reservierung</p>
            <p class="TextContent">Die Buchung eines Fahrzeugs kann persönlich, telefonisch, schriftlich oder über die Online-Plattform von "Drive" erfolgen. Reservierungen sind verbindlich und können bis zu [Anzahl] Stunden vor Mietbeginn kostenlos storniert werden.</p>

            <p class="TextContentHeader">Mietpreis und Zahlung</p>
            <p class="TextContent">Der Mietpreis richtet sich nach der jeweils aktuellen Preisliste von "Drive". Die Zahlung erfolgt im Voraus bei Fahrzeugübernahme. Zusätzliche Kosten, wie Tankgebühren oder Strafzettel, trägt der Mieter.</p>

            <p class="TextContentHeader">Kaution</p>
            <p class="TextContent">Vor Fahrzeugübergabe ist eine Kaution in Höhe von [Betrag] zu hinterlegen. Diese wird nach Rückgabe des Fahrzeugs, unter Berücksichtigung eventuell entstandener Kosten, erstattet.</p>

            <p class="TextContentHeader">Versicherung</p>
            <p class="TextContent">Das Fahrzeug ist vollkaskoversichert. Selbstbeteiligung im Schadensfall beträgt [Betrag]. Schäden sind unverzüglich zu melden. Versicherungsschutz erlischt bei grober Fahrlässigkeit.</p>

            <p class="TextContentHeader">Fahrzeugübergabe und -rückgabe</p>
            <p class="TextContent">Das Fahrzeug wird dem Mieter in einem verkehrssicheren Zustand übergeben. Der Mieter ist verpflichtet, das Fahrzeug zum vereinbarten Zeitpunkt zurückzugeben. Verspätete Rückgaben können zusätzliche Kosten verursachen.</p>

            <p class="TextContentHeader">Nutzung des Fahrzeugs</p>
            <p class="TextContent">Das Fahrzeug darf nur vom Mieter und den im Mietvertrag genannten Fahrern genutzt werden. Die Nutzung für kommerzielle Zwecke oder Rennveranstaltungen ist untersagt.</p>

            <p class="TextContentHeader">Haftung des Mieters</p>
            <p class="TextContent">Der Mieter haftet für Schäden am Fahrzeug, die während der Mietdauer entstehen, sowie für Verstöße gegen Verkehrsregeln.</p>

            <p class="TextContentHeader">Stornierung</p>
            <p class="TextContent">Bei Stornierung bis [Anzahl] Tage vor Mietbeginn werden [Prozentsatz]% des Mietpreises fällig. Bei späterer Stornierung oder Nichterscheinen wird der volle Mietpreis berechnet.</p>

            <p class="TextContentHeader">Datenschutz</p>
            <p class="TextContent">"Drive" verpflichtet sich, die persönlichen Daten des Mieters vertraulich zu behandeln und nur für vertragsrelevante Zwecke zu verwenden.</p>

            <p class="TextContentHeader">Sonstiges</p>
            <p class="TextContent">Änderungen oder Ergänzungen des Mietvertrags bedürfen der Schriftform. Sollten einzelne Bestimmungen unwirksam sein, bleibt der Vertrag im Übrigen wirksam.</p>

            <p class="TextContentHeader">Gerichtsstand</p>
            <p class="TextContent">Gerichtsstand für alle Streitigkeiten aus diesem Vertrag ist [Ort].<br>
                Diese Allgemeinen Geschäftsbedingungen sind Bestandteil des Mietvertrags zwischen "Drive" und dem Mieter.</p>




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