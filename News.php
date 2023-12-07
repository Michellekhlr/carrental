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
    

    <!--Import von jquery-->
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Drive. - News</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
  <script>
    $( function() {
        $( "#accordion" ).accordion({
        collapsible: true, // panels collapse to take less space
        active: false // No panel is active before clicking 
        });
    } );
    </script>

    <!--Include Header-->
    <?php
    include('Header.php');
    ?>
</head>


<body>

<!--Building the page banner-->
<div class="FramePageBanner">
  <div class="MainPictureNews">
  </div>
</div>

<!--using the company slogan-->
<div class="SloganNewsAndStory">
    Einfach.Flexibel.
</div>

<!--Building the Main Article-->
<div class="FrameMainArticleNews">
  <div class="FrameContentMainArticleNews">
        <div class="FrameTitleSubtitleContentMainArticle">
            <div class="FrameSubtitleContentMainArticle">
                <p class="SubtitleMainArticle">News der Woche</p>
            </div>
            <div class="FrameTitleContentMainArticle">
                <p class="TitleMainArticle">Neu im Sortiment: BMW M4 CS</p>
            </div>
        </div>
        <div class="FrameTextContentMainArticle">
            <div class="TextContentMainArticle">
                    <br>
                    <p class="TextMainArticle">Ab dem <span class="boldText">1. November</span> lässt sich die Track-Legende buchen, aber Vorsicht: <span class="boldText">Nur für Profis!</span></p>
                    <br>
                    <p class="TextMainArticle">Der BMW M4 CS ist mehr als ein Fahrzeug – er ist eine Verkörperung von Präzision und Leistung. Dieses Modell, das neu in unserem Sortiment ist, stellt eine aufregende Ergänzung für Autoliebhaber dar, die eine unvergleichliche Fahrerfahrung suchen.</p>
                    <br>
                    <p class="TextMainArticle">Der BMW M4 CS zeichnet sich durch seinen beeindruckenden 3,0-Liter-M TwinPower Turbo Sechszylinder-Motor aus, der beeindruckende 460 PS leistet. Diese Power ermöglicht es dem Fahrzeug, in nur 3,9 Sekunden von 0 auf 100 km/h zu beschleunigen. Doch die wahre Stärke des M4 CS liegt nicht nur in seiner Geschwindigkeit, sondern auch in seinem außergewöhnlichen Handling. Mit einem adaptiven M Fahrwerk, das speziell für die Rennstrecke abgestimmt ist, bietet der M4 CS eine unvergleichliche Straßenlage und Präzision in Kurven. Dies macht ihn zum idealen Begleiter für erfahrene Fahrer, die das Maximum aus ihrem Fahrerlebnis herausholen wollen.</p>
                    <br>
                    <p class="TextMainArticle">Im Innenraum kombiniert der BMW M4 CS Luxus mit Funktionalität. Die Sportsitze sind mit feinem Leder und Alcantara bezogen, bieten hervorragenden Halt und Komfort, selbst bei den dynamischsten Fahrmanövern. Das Interieur ist minimalistisch gehalten, mit einem klaren Fokus auf den Fahrer. High-End-Features wie das professionelle Navigationssystem und das Harman Kardon Surround Sound System sorgen dafür, dass Technologie und Komfort Hand in Hand gehen.</p>
                    <br>
                    <p class="TextMainArticle">Der BMW M4 CS ist nicht nur ein Auto, sondern ein Erlebnis. Er repräsentiert die perfekte Balance zwischen Luxus und Leistung. Seine Verfügbarkeit in unserem Sortiment ist eine seltene Gelegenheit für Enthusiasten, die das Ultimative in Sachen Geschwindigkeit und Fahrerfahrung suchen. Buchen Sie Ihr Erlebnis ab dem 1. November und spüren Sie die Kraft und Eleganz, die nur ein BMW M4 CS bieten kann.</p>
            </div>
        </div>
  </div>
</div>

<div class="FrameTitleMoreArticles">
    <div class="InnerFrameTitleMoreArticles">
        <p class="TitleMoreArticles">
        Ältere Beiträge zu <span class="boldText">"News der Woche"</span>
        </p>
    </div>


</div>


<div class="FrameMoreArticles">
    <div class="InnerFrameMoreArticles">
        <div id="accordion">
            <h3 class="TitelMoreArticles"> Neu im Sortiment: Audi A7 Coupé</h3>
            <div>
                <br>
                <p class="TextMoreArticles">
                Ab dem 25. Oktober können Sie das neue Audi A7 Coupé buchen, aber Achtung: Dieses Auto ist ein wahres Kraftpaket.
                </p>
                <br>
                <p class="TextMoreArticles">
                Mit seinem eleganten Design und beeindruckender Leistung ist das Audi A7 Coupé eine aufsehenerregende Ergänzung in unserem Portfolio, ideal für diejenigen, die sowohl Stil als auch Kraft schätzen. Mit einer Leistung von 340 PS ermöglicht der Motor eine Beschleunigung von 0 auf 100 km/h in nur 5,3 Sekunden. Darüber hinaus zeichnet sich das Fahrzeug durch sein innovatives Mild-Hybrid-System aus, das die Effizienz erhöht und den Kraftstoffverbrauch senkt. Das adaptive Luftfederungssystem des A7 sorgt für eine makellose Straßenlage und ein geschmeidiges Fahrerlebnis, selbst auf unebenen Straßen.
                </p>
                <br>
                <p class="TextMoreArticles">
                Im Innenraum des Audi A7 Coupé erwartet Sie Luxus pur. Die Kabine ist geräumig und mit hochwertigen Materialien ausgestattet, was eine exklusive Atmosphäre schafft. Die Sitze bieten optimalen Komfort und Unterstützung, perfekt für lange Fahrten. Technologische Highlights wie das MMI Navigationssystem mit Touch-Response und das Bang & Olufsen Sound System machen jede Fahrt zu einem Erlebnis.
                </p>
                <br>
                <p class="TextMoreArticles">
                Das Audi A7 Coupé ist nicht nur ein Auto, sondern ein Symbol für Eleganz und fortschrittliche Technologie. Es vereint sportliche Leistung mit außergewöhnlichem Komfort und modernster Technik. Ab dem 25. Oktober steht dieses beeindruckende Fahrzeug zur Buchung bereit.
                </p>
                <br>
            </div>
            <h3 class="TitelMoreArticles"> ++ Pressemeldung: Drive. eröffnet neuen Standort in Bielefeld ++</h3>
            <div>
                <p class="TextMoreArticles">
                Am 18. Oktober eröffnet Drive. seinen neuesten Standort in Bielefeld, als Teil unserer stetigen Expansion, um unseren Kunden noch näher zu sein. Mit der Eröffnung in Bielefeld verstärken wir unser Engagement, hochwertige Autovermietungsdienste in der Region anzubieten.
                </p>
                <br>
                <p class="TextMoreArticles">
                Unser neuer Standort in Bielefeld bietet eine breite Palette an Fahrzeugen, von Stadtflitzern bis hin zu Luxusautos, um den unterschiedlichen Bedürfnissen unserer Kunden gerecht zu werden. Unsere modernen, gut gewarteten Fahrzeuge stehen für Qualität und Zuverlässigkeit, was Drive. zu einem vertrauenswürdigen Partner für Autovermietungen macht.
                </p>
                <br>
                <p class="TextMoreArticles">
                Die Eröffnung des Standorts in Bielefeld ist ein wichtiger Schritt in unserer Strategie, das Netzwerk von Drive. zu erweitern. Mit dem neuen Standort bieten wir nicht nur lokale, sondern auch überregionale Kunden einen einfachen Zugang zu unseren Dienstleistungen. Unsere erfahrenen Mitarbeiter stehen bereit, um einen erstklassigen Service zu bieten und individuelle Mobilitätslösungen zu finden.
                </p>
                <br>
                <p class="TextMoreArticles">
                Drive. freut sich, ein Teil der Gemeinschaft in Bielefeld zu werden und zur wirtschaftlichen Dynamik der Region beizutragen. Wir laden alle ein, unseren neuen Standort zu besuchen und die Vielfalt unseres Angebots zu entdecken. Mit Drive. sind Sie immer in den besten Händen, wenn es um Autovermietung geht.
                </p>
            </div>
            <h3 class="TitelMoreArticles"> Neu im Sortiment: Maserati Ghibli</h3>
            <div>
                <br>
                <p class="TextMoreArticles">
                Ab dem 11. Oktober können Sie den faszinierenden Maserati Ghibli buchen, aber Achtung: Dieses Fahrzeug ist ein echtes Meisterwerk italienischer Ingenieurskunst.
                </p>
                <br>
                <p class="TextMoreArticles">
                Der Maserati Ghibli verbindet luxuriöses Design mit außergewöhnlicher Leistung. Angetrieben von einem beeindruckenden 3,0-Liter-V6-Biturbo-Motor, liefert der Ghibli eine Leistung von 350 PS, wodurch er eine Beschleunigung von 0 auf 100 km/h in nur 5,5 Sekunden erreicht. Mit seiner raffinierten Fahrdynamik und dem agilen Handling bietet der Ghibli ein aufregendes, aber stets kontrolliertes Fahrerlebnis. Die perfekt abgestimmte Achtgang-Automatik sorgt für nahtlose Kraftübertragung und einzigartigen Fahrkomfort.
                </p>
                <br>
                <p class="TextMoreArticles">
                Im Innenraum überzeugt der Maserati Ghibli mit einer Mischung aus Luxus und Funktionalität. Hochwertige Lederpolster, ergonomische Sitze und das neueste Infotainmentsystem bieten einen unvergleichlichen Komfort und eine intuitive Bedienung. Die Kombination aus edlen Materialien und modernster Technologie macht jede Fahrt zu einem Erlebnis der Extraklasse.
                </p>
                <br>
                <p class="TextMoreArticles">
                Der Maserati Ghibli ist nicht nur ein Auto, sondern ein Ausdruck von Eleganz und Leistung. Er vereint klassisches Design mit moderner Technologie, was ihn zu einem idealen Fahrzeug für diejenigen macht, die das Besondere suchen. Ab dem 11. Oktober ist dieser italienische Traumwagen in unserem Sortiment verfügbar. Entdecken Sie die Welt der Eleganz und Leistung mit dem Maserati Ghibli.
                </p>
                <br>
            </div>
            <h3 class="TitelMoreArticles"> ++ Pressemeldung: Drive. eröffnet neuen Standort in Dortmund ++</h3>
            <div>
                <p class="TextMoreArticles">
                Am 4. Oktober begrüßt Drive. seine Kunden am neu eröffneten Standort in Dortmund. Diese Expansion ist ein Zeichen unseres anhaltenden Engagements, unseren Kunden in ganz Deutschland eine erstklassige Autovermietung zu bieten.
                </p>
                <br>
                <p class="TextMoreArticles">
                Der neue Standort in Dortmund stellt eine wichtige Erweiterung unseres Netzwerks dar und bringt eine umfangreiche Auswahl an Fahrzeugen direkt in die Herzregion des Ruhrgebiets. Von wendigen Stadtautos bis hin zu Luxusmodellen - unser Portfolio deckt alle Bedürfnisse und Wünsche ab.
                </p>
                <br>
                <p class="TextMoreArticles">
                Unsere Präsenz in Dortmund ermöglicht es uns, sowohl lokalen als auch überregionalen Kunden einen bequemen und effizienten Zugang zu unseren Mietwagen und Dienstleistungen zu bieten. Wir sind stolz darauf, ein Team von professionellen und freundlichen Mitarbeitern zu haben, die bereit sind, exzellenten Service und individuelle Beratung zu bieten.
                </p>
                <br>
                <p class="TextMoreArticles">
                Mit der Eröffnung des Standorts in Dortmund verstärken wir unsere Präsenz in einer der dynamischsten Städte Deutschlands und freuen uns darauf, Teil dieser lebendigen Gemeinschaft zu sein. Besuchen Sie uns in Dortmund und erleben Sie den Unterschied, den Drive. in der Autovermietung macht.
                </p>
            </div>
            <h3 class="TitelMoreArticles"> Neu im Sortiment: Range Rover Velar</h3>
                <div>
                    <br>
                    <p class="TextMoreArticles">
                    Ab dem 27. September können Sie den stilvollen Range Rover Velar buchen, aber Vorsicht: Dieses Fahrzeug setzt neue Maßstäbe im Bereich des luxuriösen Offroad-Fahrens.
                    </p>
                    <br>
                    <p class="TextMoreArticles">
                    Der Range Rover Velar besticht durch sein elegantes Design und seine fortschrittliche Technologie. Unter der Haube verbirgt sich ein leistungsstarker 2,0-Liter-Vierzylinder-Turbomotor, der eine hervorragende Kombination aus Leistung und Effizienz bietet. Mit einer Leistung von 250 PS ermöglicht der Velar eine beschwingte Fahrt, sowohl auf der Straße als auch im Gelände. Sein fortschrittliches Allradsystem und die adaptive Luftfederung sorgen für ein souveränes Fahrgefühl in jedem Terrain.
                    </p>
                    <br>
                    <p class="TextMoreArticles">
                    Im Innenraum des Range Rover Velar erwartet Sie purer Luxus. Mit seinem minimalistischen Design und hochwertigen Materialien bietet der Velar ein ruhiges und komfortables Fahrerlebnis. Die neuesten Infotainment- und Assistenzsysteme sind intuitiv zu bedienen und erhöhen sowohl Sicherheit als auch Komfort.
                    </p>
                    <br>
                    <p class="TextMoreArticles">
                    Der Range Rover Velar ist nicht nur ein SUV, sondern ein Statement in puncto Design und Technologie. Er vereint Offroad-Fähigkeiten mit elegantem Stil und fortschrittlichen Technologien. Ab dem 27. September haben Sie die Möglichkeit, dieses außergewöhnliche Fahrzeug zu buchen. Erleben Sie den Luxus und die Vielseitigkeit, die der Range Rover Velar zu bieten hat.
                    </p>
                    <br>
                </div>
            <h3 class="TitelMoreArticles"> ++ Pressemeldung: Drive. eröffnet neuen Standort in Nürnberg ++</h3>
            <div>
                <p class="TextMoreArticles">
                Am 20. September öffnet Drive. seine Türen am brandneuen Standort in Nürnberg. Diese Eröffnung markiert einen weiteren Meilenstein in unserer Mission, qualitativ hochwertige Autovermietung in ganz Deutschland anzubieten.
                </p>
                <br>
                <p class="TextMoreArticles">
                Der neue Standort in Nürnberg bringt eine vielfältige Fahrzeugflotte in die fränkische Metropole, von effizienten Kleinwagen bis zu hochwertigen Luxusfahrzeugen. Jedes Fahrzeug steht für die Qualität und Zuverlässigkeit, die Kunden von Drive. erwarten.
                </p>
                <br>
                <p class="TextMoreArticles">
                Die Expansion nach Nürnberg ist ein wichtiger Schritt, um unseren Kunden eine noch größere Flexibilität und Bequemlichkeit bei der Autovermietung zu bieten. Mit engagierten und erfahrenen Mitarbeitern am neuen Standort sind wir bereit, individuelle Lösungen für jede Mobilitätsanforderung zu bieten.
                </p>
                <br>
                <p class="TextMoreArticles">
                Wir sind begeistert, ein Teil der Nürnberger Gemeinschaft zu werden und freuen uns darauf, sowohl den Einwohnern als auch Besuchern der Stadt unseren erstklassigen Service anzubieten. Wir laden Sie herzlich ein, unseren neuen Standort in Nürnberg zu besuchen und die Welt der Mobilität mit Drive. zu entdecken.
                </p>
            </div>
            <h3 class="TitelMoreArticles"> Neu im Sortiment: Volkswagen UP!</h3>
            <div>
                <p class="TextMoreArticles">
                Ab dem 13. September können Sie den agilen Volkswagen UP! buchen, aber Achtung: Dieses Fahrzeug überrascht mit seiner beeindruckenden Effizienz und Wendigkeit.
                </p>
                <br>
                <p class="TextMoreArticles">
                Der Volkswagen UP! ist das perfekte Stadtauto. Ausgestattet mit einem 1,0-Liter-Dreizylinder-Motor, bietet der UP! eine ausgezeichnete Balance zwischen Kraftstoffeffizienz und ausreichender Leistung für den städtischen Verkehr. Mit 60 PS ist der UP! ideal für zügiges, aber sparsames Fahren. Seine kompakte Größe und das hervorragende Handling machen das Manövrieren in engen Straßen und das Parken in kleinen Lücken zum Kinderspiel.
                </p>
                <br>
                <p class="TextMoreArticles">
                Im Innenraum bietet der Volkswagen UP! überraschend viel Platz und Komfort für seine Größe. Mit einem intelligenten Layout und praktischen Ablagefächern ist der UP! perfekt für den Alltag in der Stadt. Das moderne Infotainmentsystem sorgt für Unterhaltung und Konnektivität auf jeder Fahrt.
                </p>
                <br>
                <p class="TextMoreArticles">
                Der Volkswagen UP! ist nicht nur ein Auto, sondern eine smarte Lösung für die urbane Mobilität. Er kombiniert kompakte Abmessungen mit effizienter Leistung und moderner Technologie, was ihn zu einem idealen Fahrzeug für das Stadtleben macht. Ab dem 13. September ist dieses praktische und stilvolle Stadtauto in unserem Sortiment verfügbar. Entdecken Sie die Stadt neu mit dem Volkswagen UP!.
                </p>
            </div>
            <h3 class="TitelMoreArticles"> ++ Pressemeldung: Drive. eröffnet neuen Standort in Rostock ++</h3>
            <div>
                <p class="TextMoreArticles">
                Am 6. September eröffnet Drive. feierlich seinen neuesten Standort in Rostock, als Teil unserer fortlaufenden Bemühungen, unsere Dienstleistungen deutschlandweit zugänglich zu machen. Diese Eröffnung in Rostock ist ein Beweis für unser Engagement, erstklassige Autovermietung in der gesamten Region anzubieten.
                </p>
                <br>
                <p class="TextMoreArticles">
                In Rostock bieten wir eine umfangreiche Auswahl an Fahrzeugen, die perfekt auf die Bedürfnisse unserer Kunden zugeschnitten sind. Egal ob Sie ein kompaktes Stadtauto oder ein luxuriöses Modell für besondere Anlässe benötigen, unser Portfolio wird jeden Bedarf decken.
                </p>
                <br>
                <p class="TextMoreArticles">
                Unser neuer Standort in Rostock ist ein strategischer Schritt, um unseren Kunden einen einfacheren Zugang zu qualitativ hochwertigen Mietwagen zu bieten. Mit einem Team aus erfahrenen Fachleuten garantieren wir einen reibungslosen Mietprozess und individuelle Beratung für jede Anfrage.
                </p>
                <br>
                <p class="TextMoreArticles">
                Drive. ist stolz darauf, Teil der Rostocker Gemeinschaft zu sein und freut sich darauf, den Bewohnern und Besuchern der Stadt unsere breite Palette an Autovermietungsdiensten anzubieten. Besuchen Sie uns am neuen Standort in Rostock und erleben Sie die Vielfalt und Qualität, die Drive. zu bieten hat.
                </p>
                </p>
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