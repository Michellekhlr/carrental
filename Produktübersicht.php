<!DOCTYPE html>
<head>
    <!--Sprachenimport von Google Fonts-->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Titillium+Web:wght@400;700&display=swap');
    </style>

    <!--Iconimport von Google-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <!--Styleimport von CSS Datei-->
    <link rel="stylesheet" href = "CSSMain.css">

    <!--Include Header-->
    <div class = "band" style = "text-align: left; background-color:  black; color: white; margin-top: 0px;"><h3><i>Angebot des Tages: 5er BMW für 139 Kartoffeln</i></h3></div> 
    <?php
    include('Header.html');
    ?><br>
</head>

<body>
    
<div class="progress">
    <table style="background-color: white;">
        <tr>
            <td class="progress1" style="width: 493px; height: 90px; border: solid 2px black; background-color: #ffbf00;">
                <a href="https://www.google.com/?hl=de"><!--Platzhalterlink für Homepagefilter-->
                    <ul>
                        <li class="p2" style="font-size: 20px;"><span class="nospacing">Standort wählen <!--Leerzeichen--><i class="fas fa-edit" style="font-size: 15px; color:black"></i></span></li>
                        <li class="p2" style="font-size: 15px;"><span class="nospacing">Anfang | Ende <!--Hier muss ein dynamisches Element rein, was abfragt, welcher Zeitraum ausgewählt ist--><!--Leerzeichen--><i class="far fa-calendar-alt style" style="font-size: 10px; color:black"></i></span></li> 
                        <li class="p2" style="float: right; margin-right: 10px; font-size: 20px"><i><b>1.</b></i></li>
                    </ul>
                </a>   
            </td>
            <td class="progress1" style="width: 493px; height: 90px; border: solid 2px black; background-color: #ffbf00">
                <a href="https://www.google.com/?hl=de"><!--Platzhalterlink für Homepagefilter-->
                    <ul>
                        <li class="p2" style="font-size: 20px;"><span class="nospacing">Finde deinen <i>Drive</i>!</span></li>
                        <li class="p2" style="font-size: 15px;"><span class="nospacing">230 Autos | 64 Modelle | 14 Standorte | 100% Fahrspaß</span></li>
                        <li class="p2" style="float: right; margin-right: 10px; font-size: 20px"><i><b>2.</b></i></li>             
                    </ul>
                </a>
            </td>
            <td style="width: 493px; height: 90px; border: solid 2px black;"><!--Wichtig: Hier muss die Klasse progress1 noch ergänzt werden, sollte dies die Produktdeteilseite sein-->
                <a href="https://www.google.com/?hl=de"><!--Platzhalterlink für Homepagefilter-->
                    <ul>
                        <li class="p2" style="font-size: 20px;"><span class="nospacing">Buchung abschließen</span></li>
                        <li class="p2" style="font-size: 15px;"><span class="nospacing">Rund-um-Schutz, Kindersitz oder Dachbox gefällig?</span></li>
                        <li class="p2" style="float: right; margin-right: 10px; font-size: 20px"><i><b>3.</b></i></li>
                    </ul>
                </a>
            </td>
        </tr>
    </table>
</div><br>

</body>

<footer>
    <!--Include Footer-->
<?php
    include('Footer.html');
    ?>
</footer>


</html>