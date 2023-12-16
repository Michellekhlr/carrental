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
    <style>
        /* to overwrite the accordion settings, without having to import and create a new jQuery accordion (FAQ.php uses the #accordion as well as News.php and Story.php so that everything looks consistent) */
        #accordion p {
            margin-bottom: 0px;
            margin-left: 60px;
            margin-right: 60px;

        }
    </style>

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
            <div id="accordion">
                <h3 class="TitleContentFAQ"> Reservierungen </h3>
                <div style="height: 100px;">
                    <br>
                    <p class="TextQuestionsFAQ">Wie kann ich ein Auto bei Drive. reservieren?
                    </p>
                    <p class="TextAnswersFAQ">Sie können online über unsere Website oder telefonisch reservieren. Wählen Sie einfach Ihr gewünschtes Fahrzeug und den Zeitraum aus.
                    </p>
                    <br>
                    <br>
                    <p class="TextQuestionsFAQ">Was passiert, wenn ich meine Reservierung stornieren muss?
                    </p>
                    <p class="TextAnswersFAQ">Stornierungen sind bis zu 24 Stunden vor der Abholzeit kostenlos. Danach kann eine Stornogebühr anfallen.
                    </p>
                    <br>
                    <br>
                    <p class="TextQuestionsFAQ">Kann ich meine Reservierung nachträglich ändern, zum Beispiel das Abhol- oder Rückgabedatum anpassen?</p>
                    <p class="TextAnswersFAQ">Ja, Sie können Änderungen an Ihrer Reservierung vornehmen, solange dies innerhalb unserer Richtlinien liegt. Besuchen Sie einfach unsere Website oder kontaktieren Sie unseren Kundenservice, um Anpassungen vorzunehmen. Beachten Sie jedoch, dass Änderungen möglicherweise mit zusätzlichen Kosten verbunden sind.</p>
                    <br> <br>
                    <p class="TextQuestionsFAQ">Gibt es eine Altersbeschränkung für die Reservierung eines Fahrzeugs?</p>
                    <p class="TextAnswersFAQ">Ja, um ein Auto bei uns zu mieten, müssen Sie mindestens 21 Jahre alt sein. Für bestimmte Fahrzeugkategorien oder Zusatzleistungen kann eine höhere Altersgrenze gelten. Bitte überprüfen Sie unsere Mietbedingungen für detaillierte Informationen zu Altersbeschränkungen.</p>
                    <br><br>
                    <p class="TextQuestionsFAQ">Kann ich ein bestimmtes Fahrzeugmodell bei meiner Reservierung auswählen?</p>
                    <p class="TextAnswersFAQ">Wir bemühen uns, Ihren Präferenzen gerecht zu werden, können jedoch die Verfügbarkeit bestimmter Modelle nicht garantieren. Sie haben die Möglichkeit, eine Fahrzeugkategorie zu wählen, und wir werden unser Bestes tun, um ein Fahrzeug innerhalb dieser Kategorie bereitzustellen. Wenn das gewünschte Modell nicht verfügbar ist, bieten wir Ihnen ein vergleichbares Fahrzeug an.</p>
                </div>
                <h3 class="TitleContentFAQ"> Fahrzeugauswahl </h3>
                <div>
                    <p class="TextQuestionsFAQ">Welche Fahrzeugtypen bieten Sie an?
                    </p>
                    <p class="TextAnswersFAQ">Unsere Flotte umfasst eine Vielzahl von Fahrzeugen, von Kleinwagen bis zu SUVs und Luxusfahrzeugen.
                    </p>
                    <br><br>
                    <p class="TextQuestionsFAQ">Kann ich Zusatzausstattung wie Kindersitze oder GPS buchen?
                    </p>
                    <p class="TextAnswersFAQ">Ja, Sie können Extras wie Kindersitze, GPS und mehr bei Ihrer Buchung hinzufügen.
                    </p>
                    <br> <br>
                    <p class="TextQuestionsFAQ">Kann ich bei der Abholung des Fahrzeugs ein Upgrade auf ein größeres oder luxuriöseres Modell vornehmen?</p>
                    <p class="TextAnswersFAQ">Ja, je nach Verfügbarkeit können Sie bei der Abholung ein Upgrade auf ein größeres oder luxuriöseres Fahrzeug durchführen. Die Kosten für das Upgrade und die Verfügbarkeit hängen von verschiedenen Faktoren ab. Bitte kontaktieren Sie unser Kundenservice-Team für weitere Informationen oder um ein Upgrade zu arrangieren.</p>
                    <br> <br>
                    <p class="TextQuestionsFAQ">Wie kann ich sicherstellen, dass das von mir ausgewählte Fahrzeug rauchfrei ist?</p>
                    <p class="TextAnswersFAQ">Wir verstehen, dass viele unserer Kunden ein rauchfreies Fahrzeug bevorzugen. Bei der Fahrzeugauswahl können Sie eine Präferenz für ein rauchfreies Auto angeben. Während wir uns bemühen, diese Präferenzen zu erfüllen, können wir jedoch keine 100%ige Garantie geben. Wir empfehlen, Ihre Präferenz bei der Reservierung anzugeben und dies bei der Abholung nochmals zu kommunizieren.</p>
                    <br> <br>
                    <p class="TextQuestionsFAQ">Kann ich ein Fahrzeug für eine Langzeitmiete oder Monatsmiete buchen?</p>
                    <p class="TextAnswersFAQ">Ja, wir bieten Langzeitmietoptionen an. Wenn Sie ein Fahrzeug für einen längeren Zeitraum benötigen, können Sie sich für unsere Monatsmiete entscheiden. Dies ist eine flexible Option für Geschäftsreisen oder längere Aufenthalte. Kontaktieren Sie unser Team, um die Verfügbarkeit zu prüfen und ein individuelles Angebot zu erhalten.</p>
                </div>
                <h3 class="TitleContentFAQ"> Abhol- und Rückgabeprozess</h3>
                <div>
                    <p class="TextQuestionsFAQ">Wie läuft der Abholprozess ab?
                    </p>
                    <p class="TextAnswersFAQ">Kommen Sie zur vereinbarten Zeit zu unserem Standort, zeigen Sie Ihren Führerschein und die Buchungsbestätigung vor und erhalten Sie die Schlüssel.
                    </p>
                    <br> <br>
                    <p class="TextQuestionsFAQ">Was muss ich bei der Rückgabe des Fahrzeugs beachten?
                    </p>
                    <p class="TextAnswersFAQ">Bitte bringen Sie das Fahrzeug zum vereinbarten Zeitpunkt zurück, stellen Sie sicher, dass es sauber und vollgetankt ist.
                    </p>
                    <br><br>
                    <p class="TextQuestionsFAQ">Kann jemand anderes das Fahrzeug in meinem Namen abholen?</p>
                    <p class="TextAnswersFAQ">Ja, eine dritte Person kann das Fahrzeug in Ihrem Namen abholen, vorausgesetzt, sie erfüllt alle notwendigen Anforderungen. Diese Person muss einen gültigen Führerschein vorlegen, die erforderlichen Zahlungsmittel bereithalten und alle relevanten Unterlagen für die Anmietung des Fahrzeugs vorlegen.</p>
                    <br><br>
                    <p class="TextQuestionsFAQ">Was passiert, wenn ich das Fahrzeug später als die vereinbarte Rückgabezeit abgebe?</p>
                    <p class="TextAnswersFAQ">Es ist wichtig, das Fahrzeug zum vereinbarten Zeitpunkt zurückzugeben, um zusätzliche Kosten zu vermeiden. Falls Sie das Fahrzeug später zurückgeben müssen, informieren Sie uns bitte so früh wie möglich. Je nach Verfügbarkeit und den Mietbedingungen können zusätzliche Gebühren anfallen. Bei erheblichen Verspätungen können auch Strafgebühren geltend gemacht werden.</p>
                    <br><br>
                    <p class="TextQuestionsFAQ">Kann ich das Fahrzeug an einem anderen Standort zurückgeben als dem, an dem ich es abgeholt habe?</p>
                    <p class="TextAnswersFAQ">In vielen Fällen ist eine Rückgabe an einem anderen Standort möglich, dies unterliegt jedoch der Verfügbarkeit und kann zusätzliche Gebühren mit sich bringen. Bitte informieren Sie sich im Voraus über die Möglichkeit einer Einwegmiete und klären Sie die Konditionen bei der Reservierung oder kontaktieren Sie unser Kundenservice-Team für weitere Informationen.</p>
                </div>
                <h3 class="TitleContentFAQ"> Standorte </h3>
                <div>
                    <p class="TextQuestionsFAQ">Wo befinden sich Ihre Vermietungsstandorte?
                    </p>
                    <p class="TextAnswersFAQ">Wir haben Standorte in ganz Deutschland, einschließlich in großen Städten und an Flughäfen.
                    </p>
                    <br> <br>
                    <p class="TextQuestionsFAQ">Kann ich das Auto an einem anderen Standort abgeben?
                    </p>
                    <p class="TextAnswersFAQ">Ja, One-Way-Mieten sind möglich, es kann jedoch eine Gebühr für die Einwegmiete anfallen.
                    </p>
                    <br><br>
                    <p class="TextQuestionsFAQ">Bieten Sie einen Flughafen-Transfer-Service zu Ihren Mietstationen an?</p>
                    <p class="TextAnswersFAQ">Derzeit bieten wir keinen speziellen Flughafen-Transfer-Service an. Unsere Mietstationen befinden sich jedoch oft in der Nähe von Flughäfen, und Sie können bequem mit öffentlichen Verkehrsmitteln, Taxis oder Ride-Sharing-Diensten zu uns gelangen. Überprüfen Sie die Informationen auf unserer Website oder kontaktieren Sie uns für Standort-spezifische Details.</p>
                    <br><br>
                    <p class="TextQuestionsFAQ">Kann ich Fahrzeuge an allen Standorten mit derselben Treuekarte oder Mitgliedschaft nutzen?</p>
                    <p class="TextAnswersFAQ">Ja, in der Regel können Sie Ihre Treuevorteile und Mitgliedschaftsprivilegien an allen unseren Standorten nutzen. Beachten Sie jedoch, dass einige lokale Unterschiede bestehen können. Es wird empfohlen, sich vor der Anmietung über die spezifischen Konditionen und Vorteile an jedem Standort zu informieren.</p>
                    <br><br>
                    <p class="TextQuestionsFAQ">Gibt es Parkmöglichkeiten an Ihren Mietstationen?</p>
                    <p class="TextAnswersFAQ">Ja, an den meisten unserer Mietstationen stehen Parkmöglichkeiten zur Verfügung. Sie können Ihr eigenes Fahrzeug während der Mietdauer auf unserem Gelände parken. Bei bestimmten Standorten kann es jedoch auch erforderlich sein, alternative Parkmöglichkeiten in der Nähe zu nutzen. Informieren Sie sich vorab über die Parkbedingungen an Ihrem gewünschten Standort.</p>
                </div>
                <h3 class="TitleContentFAQ"> Preise und Gebühren </h3>
                <div>
                    <p class="TextQuestionsFAQ">Wie werden Ihre Tarife berechnet?
                    </p>
                    <p class="TextAnswersFAQ">Unsere Preise basieren auf dem Fahrzeugtyp und der Mietdauer. Langzeitmieten bieten wir zu reduzierten Tarifen an.
                    </p>
                    <br> <br>
                    <p class="TextQuestionsFAQ">Gibt es versteckte Gebühren?
                    </p>
                    <p class="TextAnswersFAQ">Alle Gebühren werden transparent aufgeführt. Es gibt keine versteckten Kosten.
                    </p>
                    <br> <br>
                    <p class="TextQuestionsFAQ">Kann ich die Zahlungsmethode nach der Reservierung ändern?</p>
                    <p class="TextAnswersFAQ">Ja, Sie können die Zahlungsmethode nach der Reservierung ändern, solange dies vor dem Abholzeitpunkt erfolgt. Besuchen Sie dazu einfach unsere Website oder kontaktieren Sie unseren Kundenservice. Bitte beachten Sie, dass Änderungen an der Zahlungsmethode Auswirkungen auf den Gesamtpreis oder zusätzliche Gebühren haben können.</p>
                    <br><br>
                    <p class="TextQuestionsFAQ">Welche Zusatzkosten können während der Mietdauer entstehen?</p>
                    <p class="TextAnswersFAQ">Zusatzkosten können entstehen, wenn Sie Zusatzleistungen, wie z.B. Navigationssysteme oder Kindersitze, hinzufügen oder wenn Sie das Fahrzeug zu spät zurückgeben. Tankgebühren können anfallen, wenn das Fahrzeug nicht mit dem vereinbarten Kraftstoffstand zurückgegeben wird. Weitere Informationen zu möglichen Zusatzkosten finden Sie in unseren Mietbedingungen.</p>
                    <br><br>
                    <p class="TextQuestionsFAQ">Bieten Sie Rabatte oder Sonderangebote für Langzeitmieten an?</p>
                    <p class="TextAnswersFAQ">Ja, wir bieten oft Rabatte und Sonderangebote für Langzeitmieten an. Die genauen Konditionen können je nach Standort und Verfügbarkeit variieren. Um von unseren Langzeitmietangeboten zu profitieren, empfehlen wir, sich direkt mit unserem Kundenservice in Verbindung zu setzen oder regelmäßig unsere Website auf aktuelle Angebote zu überprüfen.</p>
                </div>
                <h3 class="TitleContentFAQ"> Versicherungsoptionen </h3>
                <div>
                    <p class="TextQuestionsFAQ">Welche Versicherungsoptionen bieten Sie an?
                    </p>
                    <p class="TextAnswersFAQ">Wir bieten verschiedene Versicherungspakete an, einschließlich Haftpflicht, Vollkasko und Diebstahlschutz.
                    </p>
                    <br> <br>
                    <p class="TextQuestionsFAQ">Was ist im Schadensfall abgedeckt?
                    </p>
                    <p class="TextAnswersFAQ">Je nach gewähltem Versicherungspaket sind Schäden am Fahrzeug und Haftpflichtschäden abgedeckt.
                    </p>
                    <br><br>
                    <p class="TextQuestionsFAQ">Kann ich meine eigene Versicherung verwenden und die von Ihnen angebotenen Optionen ablehnen?</p>
                    <p class="TextAnswersFAQ">In den meisten Fällen akzeptieren wir die Nutzung Ihrer eigenen Versicherung nicht als Ersatz für unsere angebotenen Versicherungsoptionen. Um sicherzustellen, dass Sie während der Mietdauer ausreichend abgesichert sind, empfehlen wir die Auswahl einer unserer Versicherungsoptionen oder klären Sie diese Frage im Voraus mit unserem Kundenservice.</p>
                    <br><br>
                    <p class="TextQuestionsFAQ">Sind mehrere Fahrer in den Versicherungsoptionen enthalten oder gibt es zusätzliche Gebühren dafür?</p>
                    <p class="TextAnswersFAQ">Einige unserer Versicherungsoptionen können die Inklusion mehrerer Fahrer abdecken, während bei anderen zusätzliche Gebühren anfallen können. Es ist wichtig, die Bedingungen der gewählten Versicherungsoption zu überprüfen, um sicherzustellen, dass sie Ihren Anforderungen entspricht. Falls Sie mehrere Fahrer hinzufügen möchten, klären Sie dies am besten im Voraus ab, um mögliche Kosten zu verstehen.</p>
                    <br><br>
                    <p class="TextQuestionsFAQ">Kann ich meine eigene Versicherung für bestimmte Zusatzleistungen wie Reifen- und Windschutzscheibenversicherung nutzen?</p>
                    <p class="TextAnswersFAQ">Normalerweise sind unsere Versicherungsoptionen auf bestimmte Aspekte des Fahrzeugschutzes ausgerichtet, einschließlich Reifen- und Windschutzscheibenversicherung. Die Nutzung Ihrer eigenen Versicherung für spezifische Schutzleistungen kann eingeschränkt sein. Wir empfehlen, sich vor der Anmietung mit unserem Kundenservice in Verbindung zu setzen, um die besten Optionen für Ihre Bedürfnisse zu besprechen.</p>
                </div>
                <h3 class="TitleContentFAQ"> Fahrzeugsicherheit und -wartung </h3>
                <div>
                    <p class="TextQuestionsFAQ">Wie gewährleisten Sie die Sicherheit der Fahrzeuge?
                    </p>
                    <p class="TextAnswersFAQ">Alle unsere Fahrzeuge werden regelmäßig gewartet und vor jeder Vermietung gründlich geprüft.
                    </p>
                    <br><br>
                    <p class="TextQuestionsFAQ">Wie oft werden Ihre Fahrzeuge gewartet?
                    </p>
                    <p class="TextAnswersFAQ">Fahrzeuge werden nach jedem Einsatz überprüft und regelmäßig gewartet.
                    </p>
                    <br><br>
                    <p class="TextQuestionsFAQ">Welche Sicherheitsmerkmale sind in Ihren Fahrzeugen standardmäßig enthalten?</p>
                    <p class="TextAnswersFAQ">Unsere Fahrzeuge sind mit einer Reihe von Sicherheitsmerkmalen ausgestattet, darunter Airbags, Antiblockiersysteme (ABS), elektronische Stabilitätskontrolle (ESC) und Reifendrucküberwachungssysteme (TPMS). Die genauen Sicherheitsmerkmale können je nach Fahrzeugmodell variieren. Weitere Details finden Sie in den Fahrzeugbeschreibungen auf unserer Website oder erhalten Sie von unserem Kundenservice.</p>
                    <br><br>
                    <p class="TextQuestionsFAQ">Was sollte ich im Falle einer Fahrzeugpanne oder technischen Problems tun?</p>
                    <p class="TextAnswersFAQ">Im Falle einer Panne oder eines technischen Problems sollten Sie sofort unseren 24-Stunden-Pannenhilfe-Service kontaktieren, dessen Kontaktdaten sich in den Mietunterlagen befinden. Unsere Mitarbeiter helfen Ihnen gerne weiter und organisieren gegebenenfalls Abschleppdienste oder Reparaturen. Bitte folgen Sie den Anweisungen in unseren Mietbedingungen, um sicherzustellen, dass Sie im Falle eines Problems richtig handeln.</p>
                    <br><br>
                    <p class="TextQuestionsFAQ">Kann ich die Fahrzeugreifen vor der Anmietung auf Zustand und Luftdruck überprüfen?</p>
                    <p class="TextAnswersFAQ">Ja, vor der Anmietung haben Sie das Recht, den Zustand und den Luftdruck der Fahrzeugreifen zu überprüfen. Wir empfehlen, dies zusammen mit einem Mitarbeiter unserer Mietstation zu tun, um mögliche Bedenken zu klären. Falls Sie während der Mietdauer Probleme mit den Reifen feststellen, kontaktieren Sie bitte umgehend unseren Pannenhilfe-Service für Unterstützung.</p>
                </div>
                <h3 class="TitleContentFAQ"> Kundenunterstützung </h3>
                <div>
                    <p class="TextQuestionsFAQ">Wie kann ich Sie bei Problemen kontaktieren?
                    </p>
                    <p class="TextAnswersFAQ">Unser Kundenservice ist rund um die Uhr telefonisch und per E-Mail erreichbar.
                    </p>
                    <br><br>
                    <p class="TextQuestionsFAQ">Was mache ich im Falle einer Panne oder eines Unfalls?
                    </p>
                    <p class="TextAnswersFAQ">Kontaktieren Sie sofort unseren Kundendienst. Wir bieten Pannenhilfe und unterstützen Sie bei der Unfallabwicklung.
                    </p>
                    <br><br>
                    <p class="TextQuestionsFAQ">Bieten Sie Unterstützung für internationale Kunden oder Touristen an?</p>
                    <p class="TextAnswersFAQ">Ja, wir bieten Unterstützung für internationale Kunden und Touristen. Unser Kundenservice-Team ist mehrsprachig und steht Ihnen zur Verfügung, um Ihnen bei Fragen oder Problemen während Ihrer Mietdauer zu helfen. Wir empfehlen, die Kontaktdaten unseres Kundenservice im Voraus zu notieren, insbesondere wenn Sie in einem fremden Land unterwegs sind.</p>
                    <br><br>
                    <p class="TextQuestionsFAQ">Kann ich vor der Anmietung spezifische Anfragen oder Bedürfnisse besprechen, wie z.B. spezielle Fahrzeugausstattungen oder Hilfe für Personen mit eingeschränkter Mobilität?</p>
                    <p class="TextAnswersFAQ">Ja, wir sind bestrebt, Ihre individuellen Anfragen und Bedürfnisse zu berücksichtigen. Bevor Sie Ihr Fahrzeug abholen, empfehlen wir, uns im Voraus zu kontaktieren, um spezielle Anfragen zu besprechen. Wir werden unser Bestes tun, um Ihre Anforderungen zu erfüllen und Ihnen eine angenehme Mietdauer zu ermöglichen.</p>
                    <br><br>
                    <p class="TextQuestionsFAQ">Gibt es eine Gebühr für die Nutzung Ihrer Kundensupport-Services?</p>
                    <p class="TextAnswersFAQ">In der Regel bieten wir grundlegende Kundensupport-Services kostenlos an. Wenn jedoch spezielle Dienstleistungen oder umfangreichere Unterstützung erforderlich sind, können zusätzliche Gebühren anfallen. Diese Gebühren werden im Voraus transparent mitgeteilt, damit Sie genau wissen, welche Kosten anfallen könnten. Für allgemeine Fragen oder Probleme während der Mietdauer stehen Ihnen unsere Kundensupport-Services kostenfrei zur Verfügung.</p>
                </div>
                <h3 class="TitleContentFAQ"> Sonderangebote und Treueprogramme</h3>
                <div>
                    <p class="TextQuestionsFAQ">Gibt es aktuelle Sonderangebote oder Rabatte?
                    </p>
                    <p class="TextAnswersFAQ">Aktuelle Angebote finden Sie auf unserer Webseite oder abonnieren Sie unseren Newsletter.
                    </p>
                    <br><br>
                    <p class="TextQuestionsFAQ">Haben Sie ein Treueprogramm für Stammkunden?
                    </p>
                    <p class="TextAnswersFAQ">Ja, wir bieten ein Treueprogramm mit Punkten, die gegen kostenlose Miettage eingetauscht werden können.
                    </p>
                    <br><br>
                    <p class="TextQuestionsFAQ">Wie kann ich sicherstellen, dass ich von allen verfügbaren Sonderangeboten und Rabatten profitiere?</p>
                    <p class="TextAnswersFAQ">Um sicherzustellen, dass Sie alle aktuellen Sonderangebote und Rabatte nutzen, empfehlen wir regelmäßige Besuche auf unserer Website oder die Anmeldung für unseren Newsletter. Dort informieren wir über aktuelle Aktionen und Sonderangebote. Sie können auch unseren Kundenservice kontaktieren, um sicherzustellen, dass Sie die bestmöglichen Konditionen für Ihre Miete erhalten.</p>
                    <br><br>
                    <p class="TextQuestionsFAQ">Bieten Sie Gruppenrabatte oder spezielle Konditionen für Unternehmen an?</p>
                    <p class="TextAnswersFAQ">Ja, wir bieten Gruppenrabatte und spezielle Konditionen für Unternehmen an. Wenn Sie ein Unternehmen sind oder eine größere Gruppe von Fahrzeugen benötigen, setzen Sie sich bitte mit unserem Firmenkundenservice in Verbindung. Wir erstellen gerne individuelle Angebote, die auf Ihre spezifischen Anforderungen zugeschnitten sind.</p>
                    <br><br>
                    <p class="TextQuestionsFAQ">Wie funktioniert Ihr Treueprogramm, und welche Vorteile bietet es?</p>
                    <p class="TextAnswersFAQ">Unser Treueprogramm belohnt wiederkehrende Kunden mit exklusiven Vorteilen und Rabatten. Durch regelmäßige Anmietungen sammeln Sie Treuepunkte, die gegen Rabatte, Upgrades oder andere Vergünstigungen eingelöst werden können. Melden Sie sich einfach für unser Treueprogramm an, um von diesen zusätzlichen Vorteilen zu profitieren. Informationen dazu finden Sie auf unserer Website oder durch Kontaktaufnahme mit unserem Kundenservice.</p>
                </div>
                <h3 class="TitleContentFAQ"> Umweltfreundliche Optionen </h3>
                <div>
                    <p class="TextQuestionsFAQ">Bieten Sie umweltfreundliche Fahrzeuge wie Elektroautos an?
                    </p>
                    <p class="TextAnswersFAQ">Ja, wir haben eine Auswahl an Elektro- und Hybridfahrzeugen für umweltbewusste Kunden.
                    </p>
                    <br><br>
                    <p class="TextQuestionsFAQ">Bieten Sie Optionen für umweltfreundliche Treibstoffe wie Biodiesel oder Ethanol an?</p>
                    <p class="TextAnswersFAQ">Einige unserer Standorte bieten umweltfreundliche Treibstoffoptionen wie Biodiesel oder Ethanol an. Wenn Sie an solchen Optionen interessiert sind, empfehlen wir, sich im Voraus mit unserem Kundenservice in Verbindung zu setzen, um die Verfügbarkeit an Ihrem gewünschten Standort zu klären.</p>
                    <br><br>
                    <p class="TextQuestionsFAQ">Wie kann ich meinen CO2-Fußabdruck während der Mietdauer reduzieren?</p>
                    <p class="TextAnswersFAQ">Sie können dazu beitragen, Ihren CO2-Fußabdruck zu reduzieren, indem Sie einen Fahrzeugtyp mit geringerem Kraftstoffverbrauch wählen und energieeffiziente Fahrweisen praktizieren. Darüber hinaus bieten wir in einigen Standorten die Möglichkeit, CO2-Kompensationspakete zu erwerben, mit denen Sie Ihre durch die Miete verursachten CO2-Emissionen ausgleichen können.</p>
                    <br><br>
                    <p class="TextQuestionsFAQ">Gibt es besondere Anreize oder Rabatte für Kunden, die umweltfreundliche Optionen wählen?</p>
                    <p class="TextAnswersFAQ">Ja, in einigen Fällen bieten wir besondere Anreize oder Rabatte für Kunden, die umweltfreundliche Optionen wählen, wie Fahrzeuge mit geringem Kraftstoffverbrauch oder die Nutzung bestimmter Treibstoffalternativen. Informationen zu aktuellen Angeboten und Anreizen finden Sie auf unserer Website oder durch Kontaktaufnahme mit unserem Kundenservice.</p>
                    <br><br>
                    <p class="TextQuestionsFAQ">Haben Sie Fahrzeuge mit geringem Kraftstoffverbrauch in Ihrer Flotte?</p>
                    <p class="TextAnswersFAQ">Ja, wir haben eine Auswahl an Fahrzeugen mit geringem Kraftstoffverbrauch in unserer Flotte. Diese Fahrzeuge sind darauf ausgelegt, eine effiziente und umweltfreundliche Option für unsere Kunden zu sein. Informationen über spezifische Modelle finden Sie auf unserer Website oder durch Kontaktaufnahme mit unserem Kundenservice.</p>
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