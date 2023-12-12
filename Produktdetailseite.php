<?php 
session_start();

//import of database
include_once 'dbConfig.php';

$carInfo = $_SESSION['carID'];

//sets empty variables to be filled with the information from the query 
$carVendor = "";
$carName = "";
$nameExtension = "";
$imagePath = "";
$carPricePerDay = "";
$numberOfDoors = "";
$numberOfSeats = "";
$sortOfGear = "";
$sortOfDrive = "";
$airConditioning = "";
$gps = "";
$carType = "";


//SQL query 
try{
    $stmt = $conn->query("SELECT vendorName, cartype.name, cartype.img, cartype.price, nameExtension, seats, doors, gear, airCondition, gps, cartype.type, drive
                            FROM vendor 
                            INNER JOIN cartype ON vendor.vendorID = cartype.vendorID
                            INNER JOIN carlocation ON carlocation.typeID = cartype.typeID
                            WHERE carID = :carID");

    $stmt->bindParam(':carID', $carInfo);

    $stmt->execute();

}   catch (PDOException $e){
        echo "Error: " . $e->getMessage();
    }

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

    <?php

    //fetching the information from the database and connecting the with the empty variables from above
    $resultOfCarID = $stmt->rowCount();

    if ($resultOfCarID == 1) {

        $row = $stmt->fetch();
        $carVendor = $row['vendorName'];
        $carName = $row['name'];
        $nameExtension = $row['nameExtension'];
        $imagePath = $row['img'];                
        $carPricePerDay = $row['price'];
        $numberOfDoors = $row['doors'];
        $numberOfSeats = $row['seats'];
        $sortOfGear = $row['gear'];
        $sortOfDrive = $row['drive'];
        $airConditioning = $row['airCondition'];
        $gps = $row['gps'];  
        $carType = $row['type'];
    }

    ?>

    <div class="produktdetailseite">

        <!--Linker Teil der Seite, auf dem alle technischen Daten des Fahrzeuges gezeigt werden.-->
        <div class="technischedaten">
            <div><!--Bild des Fahrezeuges-->
                <img class="detailseitebild" src="bilder/Mercedes-AMG S63 Cabriolet.jpeg">
            </div>

            <div class="fahrzeugname">  <!--Bezeichnung des Fahrzeuges-->
                <div><?php echo $carVendor . " " . $carName . " " . $nameExtension?></div>
            </div>

            <div class="produktdetails">
                <div>
                    <table class="produktdetailstabelle"><!--Linken Tabelle mit technischen Daten-->

                        <tr>
                            <th>Fahrzeugtyp:</th>
                            <td><?php echo $carType?></td>
                        </tr>

                        <tr>
                            <th>Antrieb:</th>
                            <td>
                                <?php
                                    if(!empty($sortOfDrive) && $sortOfDrive == "Combuster"){
                                        echo "Verbrenner";
                                    } else{
                                        echo "Elektro";
                                    }
                                ?>
                            </td>
                        </tr>

                        <tr>
                            <th>Sitzplätze:</th>
                            <td><?php echo $numberOfSeats?></td>
                        </tr>

                        <tr>
                            <th>Anzahl der Türen:</th>
                            <td><?php echo $numberOfDoors?></td>
                        </tr>
                    </table>

                    <table class="produktdetailstabelle2"><!--.Rechte Tabelle mit technischen Daten-->
                    <tr>
                        <th>Getriebe:</th>
                        <td>
                            <?php 
                                //FRage für morgen: passt das so?
                                if(!empty($sortOfGear) && $sortOfGear == "manually"){
                                        echo "Schaltung";
                                        } else{
                                            echo "Automatik";
                                        }
                            ?>
                        </td>
                    </tr>

                    <tr>
                        <th>Baujahr:</th>
                        <td>
                            <?php 
                                $yearOfProduction = $rand(2012, 2022);
                                echo $yearOfProduction;
                            ?>
                        </td>
                    </tr>
                
                    <tr>       
                        <th>Klima:</th>
                        <td>
                            <?php 
                                if(!empty($airConditioning) && $airConditioning == 1){
                                    echo "Verfügbar";
                                }else{
                                    echo "Nicht vorhanden";
                                }
                            ?>
                        </td>
                    </tr>

                    <tr>
                        <th>GPS:</th>
                        <td>
                            <?php 
                                if(!empty($gps) && $gps == 1){
                                    echo "Verfügbar";
                                }else{
                                    echo "Nicht vorhanden";
                                }
                            ?>
                        </td>
                    </tr>

                    </table>
                </div>    
            </div>
        </div>

        <!--Rechter Teil der Produktdetailseite: Extras und Zahlung-->
        <div class="extras">
            <div class="extrasüberschrift">
                <p>Extras</p>
            </div>

            <div class="extrabuchung">
                <!--Auswahl der Versicherung-->
                <div class="versicherung">
                    <div class="versicherungueberschrift">
                        <div>
                            Versicherung:
                        </div>
                    </div>

                    <form>
                        <label id="checkboxfilter1vz"><p>All-Inclusive</p>
                            <input type="radio" name="versicherung" class="checkmarkcolumnvz"><!--Verwendung von Radioboxen, da nur eine Versicherung ausgewählt werden kann.-->
                        </label><br>
        
                        
                        <label id="checkboxfilter2vz"><p>Teilkasko</p>
                            <input type="radio" name="versicherung" class="checkmarkcolumnvz">
                        </label><br>
        
                    
                        <label id="checkboxfilter3vz"><p>Basic</p>
                            <input type="radio" name="versicherung" class="checkmarkcolumnvz">
                        </label><br>
                    </form>

                </div>

                <!--Auswahl von Extras-->
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

            <!--Anzeige des Gesamtpreises-->
            <div class="gesamtpreis">
                <p>Gesamt:
                    <?php echo "$carPricePerDay"?>
                </p>
            </div>  

            <!--An dieser Stelle kann die Buchung abgeschlossen werden.-->
            <div class="buchungsende">
                <button class="reglog" onclick="openLoginPage()">Registrieren/Login</button><!--Registrierung/Anmeldung falls noch keine stattgefunden hat-->
                <button class="buchungsabschluss" onclick="openLoginPage()">Buchung abschließen</button><!--Buchung des Autos und Übermittlung in die Buchungsübersicht-->
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