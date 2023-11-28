<!DOCTYPE html>
<head>
    <!--Sprachenimport von Google Fonts-->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Titillium+Web:wght@400;700&display=swap');
    </style>

    <!--Iconimport Google-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <!--Styleimport CSS Datei-->
    <link rel="stylesheet" href = "CSSMain.css">

    <!--Include Header-->
    <div class = "band" style = "text-align: left; background-color:  black; color: white; margin-top: 0px;"><h3><i>Angebot des Tages: 5er BMW für 139 Kartoffeln</i></h3></div> 
    <?php
    include('Header.html');
    ?><br><br><br>

    <!--Processbar dynmaic settings-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function(){
            $("#progress1").fadeTo("slow", 0.4);
            $("#progress2").fadeTo(0.4);
            $("#progress3").fadeTo("slow", 0.4);            
            });    
    </script>
</head>

<body>


<!--Overview of booking process-->
<div class="progress">
    <table style="background-color: white;">
        <tr>
            <td id="progress1">
                <a href="https://www.google.com/?hl=de"><!--Platzhalterlink für Homepagefilter-->
                    <ul>
                        <li class="p2" style="font-size: 20px; color: black;"><span class="nospacing">Standort wählen <!--Leerzeichen--><i class="fas fa-edit" style="font-size: 15px; color:black"></i></span></li>
                        <li class="p2" style="font-size: 15px;"><span class="nospacing">Anfang | Ende <!--Hier muss ein dynamisches Element rein, was abfragt, welcher Zeitraum ausgewählt ist--><!--Leerzeichen--><i class="far fa-calendar-alt style" style="font-size: 10px; color:black"></i></span></li> 
                        <li class="p2" style="float: right; margin-right: 10px; font-size: 20px"><i><b>1.</b></i></li>
                    </ul>
                </a>   
            </td>
            <td id="progress2">
                <a href="https://www.google.com/?hl=de"><!--Platzhalterlink für Homepagefilter-->
                    <ul>
                        <li class="p2" style="font-size: 20px;"><span class="nospacing">Finde deinen <i>Drive</i>!</span></li>
                        <li class="p2" style="font-size: 15px;"><span class="nospacing">230 Autos | 64 Modelle | 14 Standorte | 100% Fahrspaß</span></li>
                        <li class="p2" style="float: right; margin-right: 10px; font-size: 20px"><i><b>2.</b></i></li>             
                    </ul>
                </a>
            </td>
            <td id="progress3">
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
</div><br><br><br>

<div class="progress">
<table border="0" width="1500px" height="1500px">
    <tr>
        <td rowspan="4">
                <!--Filter column-->
                <div class="filtercolumn">

                <!--Filterslogan-->
                <div class="filtertitel">
                    <p style="color: white; font-size: 40px; margin-left: 20px;">Filter</p>
                    <div style="float: right;">
                        <i class="fas fa-sliders-h" style="font-size: 30px; color: white; padding-left: 200px;"></i>
                    </div>
                </div><br>

                <!--Sort by Price-->
                <div style="display: flex; justify-content: center;">
                        <select id="sortby">
                            <option value="günstigstes">Preis aufsteigend</option>
                            <option value="teuerstes">Preis absteigend</option>
                        </select>
                        <button id="buttongo" onclick="applyFilter()"><i>Go.</i></button>
                </div><br>

                <!--Delete, Execute Button-->
                <div style="display: flex; justify-content: center;">
                        <button class="buttonproduktübersicht1" onclick="deleteFilter()">Löschen</button>
                        <button class="buttonproduktübersicht2" onclick="applyFilter()">Anwenden</button>
                </div><br><br>

                <!--Filtercolumn-->

                <!--resets all filters to "all"-->
                <script>
                    function deleteFilter(){
                        document.getElementById('filterdropdown1').selectedIndex = 0;
                        document.getElementById('filterdropdown2').selectedIndex = 0;
                        document.getElementById('filterdropdown3').selectedIndex = 0;
                        document.getElementById('filterdropdown4').selectedIndex = 0;
                        document.getElementById('filterdropdown5').selectedIndex = 0;
                        document.getElementById('filterdropdown6').selectedIndex = 0;
                        document.getElementById('filterdropdown7').selectedIndex = 0;
                        document.getElementById('filterdropdown8').selectedIndex = 0;
                        document.getElementById('checkboxfilter1').selectedIndex = 0;
                        document.getElementById('checkboxfilter2').selectedIndex = 0;
                        document.getElementById('checkboxfilter3').selectedIndex = 0;
                    }
                </script>            

                <!--Herstellerfilter-->
                <div style="margin-left: 20px;">
                    <label for="filterdropdown" class="filterheader">Hersteller<br></label>
                        <select id="filterdropdown1">
                            <option value="alle">alle</option>
                            <option value="BMW">BMW</option>
                            <option value="Mercedes-Benz">Mercedes-Benz</option>
                            <option value="Audi">Audi</option>
                            <option value="Volkswagen">Volkswagen</option>
                            <option value="Ford">Ford</option>
                            <option value="Range-Rover">Range-Rover</option>
                            <option value="Jaguar">Jaguar</option>
                            <option value="Mercedes-AMG">Mercedes-AMG</option>
                            <option value="Maserati">Maserati</option>
                            <option value="Opel">Opel</option>
                            <option value="Skoda">Skoda</option>
                        </select>
                    <button onclick="document.getElementById('filterdropdown1').selectedIndex = 0" class="resetFilter">Filter zurücksetzen</button>
                </div><br>

                <!--Sitzefilter-->
                <div style="margin-left: 20px;">
                    <label for="filterdropdown" class="filterheader">Sitze<br></label>
                        <select id="filterdropdown2">
                            <option value="alle">alle</option>
                            <option value="2">2</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                        </select>
                        <button onclick="document.getElementById('filterdropdown2').selectedIndex = 0" class="resetFilter">Filter zurücksetzen</button>
                </div><br>

                <!--Türenfilter-->
                <div style="margin-left: 20px;">
                    <label for="filterdropdown" class="filterheader">Türen<br></label>
                        <select id="filterdropdown3">
                            <option value="alle">alle</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                        <button onclick="document.getElementById('filterdropdown3').selectedIndex = 0" class="resetFilter">Filter zurücksetzen</button>
                </div><br>

                <!--Getriebefilter-->
                <div style="margin-left: 20px;">
                    <label for="filterdropdown" class="filterheader">Gertiebe<br></label>
                        <select id="filterdropdown4">
                            <option value="alle">alle</option>
                            <option value="manually">Schaltung</option>
                            <option value="automatic">Automatik</option>
                        </select>
                        <button onclick="document.getElementById('filterdropdown4').selectedIndex = 0" class="resetFilter">Filter zurücksetzen</button>
                </div><br>

                <!--Typfilter-->
                <div style="margin-left: 20px;">
                    <label for="filterdropdown" class="filterheader">Typ<br></label>
                        <select id="filterdropdown5"    >
                            <option value="alle">alle</option>
                            <option value="Cabrio">Cabrio</option>
                            <option value="SUV">SUV</option>
                            <option value="Limousine">Limousine</option>
                            <option value="Combi">Combi</option>
                            <option value="Mehrsitzer">Mehrsitzer</option>
                            <option value="Coupé">Coupé</option>
                        </select>
                        <button onclick="document.getElementById('filterdropdown5').selectedIndex = 0" class="resetFilter">Filter zurücksetzen</button>
                </div><br>

                <!--Anriebfilter-->
                <div style="margin-left: 20px;">
                    <label for="filterdropdown" class="filterheader">Antrieb<br></label>
                        <select id="filterdropdown6">
                            <option value="alle">alle</option>
                            <option value="Combuster">Verbrenner</option>
                            <option value="Electric">Elektro</option>
                        </select>
                        <button onclick="document.getElementById('filterdropdown6').selectedIndex = 0" class="resetFilter">Filter zurücksetzen</button>
                </div><br>

                <!--Preis-bis-Filter-->
                <div style="margin-left: 20px;">
                    <label for="filterdropdown" class="filterheader">Preis bis:<br></label>
                        <select id="filterdropdown7">
                            <option value="alle">alle</option>
                            <option value="100">100€</option>
                            <option value="200">200€</option>
                            <option value="300">300€</option>
                            <option value="400">400€</option>
                            <option value="500">500€</option>
                            <option value="501">ab 500€</option>
                        </select>
                        <button onclick="document.getElementById('filterdropdown7').selectedIndex = 0" class="resetFilter">Filter zurücksetzen</button>
                </div><br>

                <!--Altersfilter-->
                <div style="margin-left: 20px;">
                    <label for="filterdropdown" class="filterheader">Mindestalter<br></label>
                        <select id="filterdropdown8">
                            <option value="alle">alle</option>
                            <option value="BMW">18</option>
                            <option value="BMW">21</option>
                            <option value="BMW">25</option>
                        </select>
                        <button onclick="document.getElementById('filterdropdown8').selectedIndex = 0" class="resetFilter">Filter zurücksetzen</button>
                </div><br><br>

                <!--Klimaanlage-->
                <label id="checkboxfilter1">KLimaanlage
                    <input type="checkbox" class="checkmarkcolumn">
                </label><br>

                <!--Navigationssystem-->
                <label id="checkboxfilter2">Navigationssystem
                    <input type="checkbox" class="checkmarkcolumn">
                </label><br>

                <!--Im Angebot-->
                <label id="checkboxfilter3">Im Angebot
                    <input type="checkbox" class="checkmarkcolumn">
                </label><br>

            </div><br> 
        </td>

<!--Productoverview-->
        <td>
            <!--carcell-->
            <a href="https://www.google.com/?hl=de">
            <div class="autozelle">
                <div class="autozellenheader">
                    <p>Hersteller/Bezeichnung/Typ</p>
                </div>
                <div>
                    <img class="zellenimage" src="bilder/BMW i3.jpeg" alt="Bild aus Datenbank">
                </div>
                <div class="zellenfooter">
                    <p class="zellenfooter1">Verfügbarkeit</p>
                    <p class="zellenfooter2">Preis pro Tag</p>
                </div>
            </div>
            </a>
        </td>

        <td>
        <div class="autozelle">
                <div class="autozellenheader">
                    <p>Hersteller/Bezeichnung/Typ</p>
                </div>
                <div>
                    <img class="zellenimage" src="bilder/BMW i3.jpeg" alt="Bild aus Datenbank">
                </div>
                <div class="zellenfooter">
                    <p class="zellenfooter1">Verfügbarkeit</p>
                    <p class="zellenfooter2">Preis pro Tag</p>
                </div>
        </td>

        <td>
        <div class="autozelle">
                <div class="autozellenheader">
                    <p>Hersteller/Bezeichnung/Typ</p>
                </div>
                <div>
                    <img class="zellenimage" src="bilder/BMW i3.jpeg" alt="Bild aus Datenbank">
                </div>
                <div class="zellenfooter">
                    <p class="zellenfooter1">Verfügbarkeit</p>
                    <p class="zellenfooter2">Preis pro Tag</p>
                </div>
        </td>
    </tr>

    <tr>
        <td>
        <div class="autozelle">
                <div class="autozellenheader">
                    <p>Hersteller/Bezeichnung/Typ</p>
                </div>
                <div>
                    <img class="zellenimage" src="bilder/BMW i3.jpeg" alt="Bild aus Datenbank">
                </div>
                <div class="zellenfooter">
                    <p class="zellenfooter1">Verfügbarkeit</p>
                    <p class="zellenfooter2">Preis pro Tag</p>
                </div>
        </td>

        <td>
        <div class="autozelle">
                <div class="autozellenheader">
                    <p>Hersteller/Bezeichnung/Typ</p>
                </div>
                <div>
                    <img class="zellenimage" src="bilder/BMW i3.jpeg" alt="Bild aus Datenbank">
                </div>
                <div class="zellenfooter">
                    <p class="zellenfooter1">Verfügbarkeit</p>
                    <p class="zellenfooter2">Preis pro Tag</p>
                </div>
        </td>

        <td>
        <div class="autozelle">
                <div class="autozellenheader">
                    <p>Hersteller/Bezeichnung/Typ</p>
                </div>
                <div>
                    <img class="zellenimage" src="bilder/BMW i3.jpeg" alt="Bild aus Datenbank">
                </div>
                <div class="zellenfooter">
                    <p class="zellenfooter1">Verfügbarkeit</p>
                    <p class="zellenfooter2">Preis pro Tag</p>
                </div>
        </td>
    </tr>

    <tr>
        <td>
        <div class="autozelle">
                <div class="autozellenheader">
                    <p>Hersteller/Bezeichnung/Typ</p>
                </div>
                <div>
                    <img class="zellenimage" src="bilder/BMW i3.jpeg" alt="Bild aus Datenbank">
                </div>
                <div class="zellenfooter">
                    <p class="zellenfooter1">Verfügbarkeit</p>
                    <p class="zellenfooter2">Preis pro Tag</p>
                </div>
        </td>

        <td>
        <div class="autozelle">
                <div class="autozellenheader">
                    <p>Hersteller/Bezeichnung/Typ</p>
                </div>
                <div>
                    <img class="zellenimage" src="bilder/BMW i3.jpeg" alt="Bild aus Datenbank">
                </div>
                <div class="zellenfooter">
                    <p class="zellenfooter1">Verfügbarkeit</p>
                    <p class="zellenfooter2">Preis pro Tag</p>
                </div>
        </td>

        <td>
        <div class="autozelle">
                <div class="autozellenheader">
                    <p>Hersteller/Bezeichnung/Typ</p>
                </div>
                <div>
                    <img class="zellenimage" src="bilder/BMW i3.jpeg" alt="Bild aus Datenbank">
                </div>
                <div class="zellenfooter">
                    <p class="zellenfooter1">Verfügbarkeit</p>
                    <p class="zellenfooter2">Preis pro Tag</p>
                </div>
        </td>
    </tr>

    <tr>
        <td>
        <div class="autozelle">
                <div class="autozellenheader">
                    <p>Hersteller/Bezeichnung/Typ</p>
                </div>
                <div>
                    <img class="zellenimage" src="bilder/BMW i3.jpeg" alt="Bild aus Datenbank">
                </div>
                <div class="zellenfooter">
                    <p class="zellenfooter1">Verfügbarkeit</p>
                    <p class="zellenfooter2">Preis pro Tag</p>
                </div>
        </td>

        <td>
        <div class="autozelle">
                <div class="autozellenheader">
                    <p>Hersteller/Bezeichnung/Typ</p>
                </div>
                <div>
                    <img class="zellenimage" src="bilder/BMW i3.jpeg" alt="Bild aus Datenbank">
                </div>
                <div class="zellenfooter">
                    <p class="zellenfooter1">Verfügbarkeit</p>
                    <p class="zellenfooter2">Preis pro Tag</p>
                </div>
        </td>

        <td>
        <div class="autozelle">
                <div class="autozellenheader">
                    <p>Hersteller/Bezeichnung/Typ</p>
                </div>
                <div>
                    <img class="zellenimage" src="bilder/BMW i3.jpeg" alt="Bild aus Datenbank">
                </div>
                <div class="zellenfooter">
                    <p class="zellenfooter1">Verfügbarkeit</p>
                    <p class="zellenfooter2">Preis pro Tag</p>
                </div>
        </td>
    </tr>
</table>

</div><br><br>

<!--Pagination-->
<div class="pagination">
  <a href="#">&laquo;</a>
  <a href="#" class="active">1</a>
  <a href="#">2</a>
  <a href="#">3</a>
  <a href="#">4</a>
  <a href="#">5</a>
  <a href="#">6</a>
  <a href="#">&raquo;</a>
</div><br><br><br><br><br><br>


</body>

<footer>
    <!--Include Footer-->
<?php
    include('Footer.html');
    ?>
</footer>


</html>