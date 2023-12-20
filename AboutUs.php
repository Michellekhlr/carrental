<?php
session_start();
?>
<!DOCTYPE html>

<head>
    <title>Über uns - Drive.</title>
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

    <!-- Weißer Banner mit Slogan -->
    <div class="SloganFooter">
        Wir sind Drive.
    </div>

    <!-- Teammitglieder - Obere Zeile -->
    <div class="FrameAboutUs">
        <section class="team upper-row">

            <!-- Teammitglied 1: Michelle -->
            <div class="team-member">
                <div class="member-image"><img src="bilder\Michelle.png" alt="Michelle" class="member-image"></div>
                <p class="team-member-name">Michelle</p>
                <p class="team-member-title">Unser CEO</p>
                <p class="quote">"Ein Tag ohne Auto ist wie ein Tag ohne Sonnenschein-bei uns ist jeder Tag strahlend"</p>

                <!-- Im Team seit -->
                <p class="team-member-lieblingsauto">
                    <span class="Lieblingsauto-Bold">Im Team seit: </span>
                    <span class="Lieblingsauto-Text">2020</span>
                </p>

                <!-- Standort -->
                <p class="team-member-lieblingsauto">
                    <span class="Lieblingsauto-Bold">Standort: </span>
                    <span class="Lieblingsauto-Text">Hamburg</span>
                </p>

                <!-- Lieblingsauto -->
                <p class="team-member-lieblingsauto">
                    <span class="Lieblingsauto-Bold">Mein Lieblingsauto: </span>
                    <span class="Lieblingsauto-Text">Nissan Qashqai</span>
                </p>

                <p class="AboutUsContact">Kontakt: M.Koehler@drive.com<br>Telefon: 123-456-789</p>
            </div>

            <!-- Teammitglied 2: Arlind -->
            <div class="team-member">
                <div class="member-image"><img src="bilder/Arlind.png" alt="Arlind" class="member-image"></div>
                <p class="team-member-name">Arlind</p>
                <p class="team-member-title">Unser COO</p>
                <p class="quote">"Ich bin für Sie da, wenn es darum geht, Sie sicher an Ihr Ziel zu bringen."</p>

                <!-- Im Team seit -->
                <p class="team-member-lieblingsauto">
                    <span class="Lieblingsauto-Bold">Im Team seit: </span>
                    <span class="Lieblingsauto-Text">2019</span>
                </p>

                <!-- Standort -->
                <p class="team-member-lieblingsauto">
                    <span class="Lieblingsauto-Bold">Standort: </span>
                    <span class="Lieblingsauto-Text">Berlin</span>
                </p>

                <!-- Lieblingsauto -->
                <p class="team-member-lieblingsauto">
                    <span class="Lieblingsauto-Bold">Mein Lieblingsauto: </span>
                    <span class="Lieblingsauto-Text">BMW M5</span>
                </p>

                <p class="AboutUsContact">Kontakt: A.Krasniq@drive.com<br>Telefon: 234-567-890</p>
            </div>

            <!-- Teammitglied 3: Johannes -->
            <div class="team-member">
                <div class="member-image"><img src="bilder/Johannes.png" alt="Johannes" class="member-image"></div>
                <p class="team-member-name">Johannes</p>
                <p class="team-member-title">Unser CTO</p>
                <p class="quote">"Die Straße ist die Leinwand, das Auto der Pinselstrich des Reisenden."</p>

                <!-- Im Team seit -->
                <p class="team-member-lieblingsauto">
                    <span class="Lieblingsauto-Bold">Im Team seit: </span>
                    <span class="Lieblingsauto-Text">2021</span>
                </p>

                <!-- Standort -->
                <p class="team-member-lieblingsauto">
                    <span class="Lieblingsauto-Bold">Standort: </span>
                    <span class="Lieblingsauto-Text">Freiburg</span>
                </p>

                <!-- Lieblingsauto -->
                <p class="team-member-lieblingsauto">
                    <span class="Lieblingsauto-Bold">Mein Lieblingsauto: </span>
                    <span class="Lieblingsauto-Text">MB G63 AMG</span>
                </p>

                <p class="AboutUsContact">Kontakt: J.Wilde@drive.com<br>Telefon: 345-678-901</p>
            </div>

        </section>

        <!-- Teammitglieder - Untere Zeile -->
        <section class="team lower-row">

            <!-- Teammitglied 4: Justus -->
            <div class="team-member">
                <div class="member-image"><img src="bilder/Justus.png" alt="" class="member-image"></div>
                <p class="team-member-name">Justus</p>
                <p class="team-member-title">Unser CFO</p>
                <p class="quote">"Lenkrad in der Hand, Odyssee im Blick. Mit Ihnen am Steuer wird jede Fahrt zum Abenteuer "</p>

                <!-- Im Team seit -->
                <p class="team-member-lieblingsauto">
                    <span class="Lieblingsauto-Bold">Im Team seit: </span>
                    <span class="Lieblingsauto-Text">2022</span>
                </p>

                <!-- Standort -->
                <p class="team-member-lieblingsauto">
                    <span class="Lieblingsauto-Bold">Standort: </span>
                    <span class="Lieblingsauto-Text">Leipzig</span>
                </p>

                <!-- Lieblingsauto -->
                <p class="team-member-lieblingsauto">
                    <span class="Lieblingsauto-Bold">Mein Lieblingsauto: </span>
                    <span class="Lieblingsauto-Text">Porsche Cayman S</span>
                </p>

                <p class="AboutUsContact">Kontakt: J.Bartsch@drive.com<br>Telefon: 456-789-012</p>
            </div>

            <!-- Teammitglied 5: Kirian -->
            <div class="team-member">
                <div class="member-image"><img src="bilder/Kirian.svg" alt="" class="member-image"></div>
                <p class="team-member-name">Kirian</p>
                <p class="team-member-title">Unser CDO</p>
                <p class="quote">"Eine Autovermietung ist wie eine Schachtel Pralinen - man weiß nie was man kriegt."</p>

                <!-- Im Team seit -->
                <p class="team-member-lieblingsauto">
                    <span class="Lieblingsauto-Bold">Im Team seit: </span>
                    <span class="Lieblingsauto-Text">2020</span>
                </p>

                <!-- Standort -->
                <p class="team-member-lieblingsauto">
                    <span class="Lieblingsauto-Bold">Standort: </span>
                    <span class="Lieblingsauto-Text">München</span>
                </p>

                <!-- Lieblingsauto -->
                <p class="team-member-lieblingsauto">
                    <span class="Lieblingsauto-Bold">Mein Lieblingsauto: </span>
                    <span class="Lieblingsauto-Text">Porsche 911 GT3</span>
                </p>

                <p class="AboutUsContact">Kontakt: K.vdThuesen@drive.com<br>Telefon: 567-890-123</p>
            </div>

        </section>

    </div>

</body>



<footer>
    <!--Include Footer-->
    <?php
    include('Footer.php');
    ?>
</footer>

</html>