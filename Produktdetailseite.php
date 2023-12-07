<?php
session_start();
?>
<!DOCTYPE html>
<head>
    <!--Sprachenimport von Google Fonts-->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Titillium+Web:wght@400;700&display=swap');
    </style>

    <!--Iconimport von Google-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <script src="https://kit.fontawesome.com/9740fceffb.js" crossorigin="anonymous"></script>

    <!--Styleimport von CSS Datei-->
    <link rel="stylesheet" href = "CSSMain.css">
    
    <!--Include Header-->
    <!-- <div class = "band" style = "text-align: left; background-color:  black; color: white; margin-top: 0px;"><h3><i>Angebot des Tages: 5er BMW für 139 Kartoffeln</i></h3></div>  -->
    <?php
     include('Header.php');
    ?>
</head>

<body> 

    <!--Overview of booking process-->
    <div class="progress">
        <table style="background-color: white;">
            <tr>
                <td id="progress1">
                    <a href="https://www.google.com/?hl=de"><!--Platzhalterlink für Homepagefilter-->
                        <ul>
                            <li class="p2" style="font-size: 20px;"><span class="nospacing">Standort wählen <!--Leerzeichen--><i class="fas fa-edit" style="font-size: 15px; color:black"></i></span></li>
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

    <div class="produktdetailseite">

        <div class="technischedaten">
            <div>
                <img class="detailseitebild" src="bilder/Mercedes-AMG S63 Cabriolet.jpeg">
            </div>

            <div class="fahrzeugname">
                <div>Mercedes-Amg S 63 Cabrio</div>
            </div>

            <div class="produktdetails">
                <div>
                    <table class="produktdetailstabelle">

                        <tr>
                            <th>Fahrzeugtyp:</th>
                            <td>Cabrio</td>
                        </tr>

                        <tr>
                            <th>Kraftstoffart:</th>
                            <td>Benzin</td>
                        </tr>

                        <tr>
                            <th>Sitzplätze:</th>
                            <td>2+2</td>
                        </tr>

                        <tr>
                            <th>Anzahl der Türen:</th>
                            <td>3/4</td>
                        </tr>
                    </table>

                    <table class="produktdetailstabelle2">
                    <tr>
                        <th>Getriebe:</th>
                        <td>Automatik</td>
                    </tr>

                    <tr>
                        <th>Baujahr:</th>
                        <td>2020</td>
                    </tr>
                
                    <tr>       
                        <th>Klima:</th>
                        <td>4-Zonen</td>
                    </tr>

                    <tr>
                        <th>GPS:</th>
                        <td>Inklusive</td>
                    </tr>

                    </table>
                </div>    
            </div>
        </div>

        <div class="extras">
            <div class="extrasüberschrift">
                <p>Extras</p>
            </div>

            <div class="extrabuchung">
                <div class="versicherung">

                    <div class="versicherungueberschrift">
                        <div>
                            Versicherung:
                        </div>
                    </div>

                    <form>
                        <label id="checkboxfilter1vz"><p>All-Inclusive</p>
                            <input type="radio" name="versicherung" class="checkmarkcolumnvz">
                        </label><br>
        
                        
                        <label id="checkboxfilter2vz"><p>Teilkasko</p>
                            <input type="radio" name="versicherung" class="checkmarkcolumnvz">
                        </label><br>
        
                    
                        <label id="checkboxfilter3vz"><p>Basic</p>
                            <input type="radio" name="versicherung" class="checkmarkcolumnvz">
                        </label><br>
                    </form>

                </div>

                <div class="zubehoer">
                    <div class="zubehoerueberschrift">
                        <div>
                            Zubehör:
                        </div>
                    </div>
                
                    <form>
                        <label id="checkboxfilter1vz"><p>Kindersitz</p>
                        <input type="checkbox" class="checkmarkcolumnvz">
                        </label><br>
        
                        <label id="checkboxfilter2vz"><p>Fahrradträger</p>
                            <input type="checkbox" class="checkmarkcolumnvz">
                        </label><br>
        
                        <label id="checkboxfilter3vz"><p>Dachbox</p>
                        <input type="checkbox" class="checkmarkcolumnvz">
                        </label><br>
                    </form>
                </div>
            </div>    

            <div class="gesamtpreis">
                <p>Gesamt:</p>
            </div>  

            <div class="buchungsende">
                <button class="reglog" onclick="openLoginPage()">Registrieren/Login</button>
                <button class="buchungsabschluss" onclick="openLoginPage()">Buchung abschließen</button>
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