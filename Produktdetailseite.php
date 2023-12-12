<?php 
session_start();

if (isset($_SESSION['loginStatus']))
    {
      $loginStatus = true;
    }
  else 
    {
      $loginStatus = false;
    }

    //Variable berechnet aus Buchungsprozessleiste
    $date1=date_create("2023-12-08");
    $date2=date_create("2023-12-11");
     $diff = $date1->diff($date2);
     $_SESSION['dateDiff'] = intval($diff->format("%a"));

    $_SESSION['finalPrice'] = $_SESSION['price'] * $_SESSION['dateDiff'];

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

    <!-- Skriptimport Ajax -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    <!--Include Header-->
    <!-- <div class = "band" style = "text-align: left; background-color:  black; color: white; margin-top: 0px;"><h3><i>Angebot des Tages: 5er BMW für 139 Kartoffeln</i></h3></div>  -->
    <?php
     include('Header.php');
    ?>
</head>

<body> 
    <!--Overview of booking process-->
<div class="progress">
    <table style="background-color: #e9e9e9;">
        <tr>
            <td id="progress1">
                <a href="#"><!--Platzhalterlink für Homepagefilter-->
                    <ul>
                        <li class="p2" style="font-size: 20px; color: black;">
                                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                    <label for="filter0" class="nospacing" style="display: inline-block; margin-right: 10px;">Standort<i class="fas fa-edit" style="font-size: 15px; color:black"></i></label>
                                    <select name="filter0" id="filterdropdown">
                                        <?php foreach ($filterOptions['Stadt'] as $option): ?>
                                            <option value="<?php echo $option;?>" <?php echo ($_SESSION['Stadt'] == $option) ? 'selected' : ''; ?>>
                                                <?php echo $option; ?>
                                            </option>
                                        <?php endforeach; ?>    
                                    </select>
                                </form>
                        </li>
                        <li class="p2" style="font-size: 15px; display: inline-block;">
                            <div class="date-picker-container" style="margin-top: 5px;">
                                <label for="zeitraum" style="margin-top: 2px; margin-right: 10px;">Zeitraum</label><br>
                                <input type="text" id="fromprogress" name="from" required placeholder="Abholung">|
                                <input type="text" id="toprogress" name="toprogress" required placeholder="Rückgabe">
                                <i class="far fa-calendar-alt style" style="font-size: 10px; color:black"></i></li>
                            </div>
                            <!-- <i class="far fa-calendar-alt style" style="font-size: 10px; color:black"></i></li>  -->
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
</div><br>

    <div class="produktdetailseite">

        <!--Linker Teil der Seite, auf dem alle technischen Daten des Fahrzeuges gezeigt werden.-->
        <div class="technischedaten">
            <?php
            echo '<div class="detailseitebild"><img src="data:image/jpg;charset=utf8;base64,' . base64_encode($_SESSION["img"]) . '" ></div>';
            ?>

            <div class="fahrzeugname">
                <div><?php echo $_SESSION["vendor"] . " " . $_SESSION["name"]?></div>
                <div class="pds_verfügbarkeit">Verfügbar: <?php echo $_SESSION["availability"]?></div>
            </div>

            <div class="produktdetails">
                <div>
                    <table class="produktdetailstabelle"><!--Linken Tabelle mit technischen Daten-->

                        <tr>
                            <th>Fahrzeugtyp:</th>
                            <td><?php echo $_SESSION["type"]?></td>
                        </tr>

                        <tr>
                            <th>Antrieb:</th>
                            <td>
                                <?php
                                if($_SESSION["drive"] == "Combuster") {
                                    echo "Verbrenner";
                                }
                                else {
                                    echo "Elektro";
                                }
                                ?>
                            </td>
                        </tr>

                        <tr>
                            <th>Sitzplätze:</th>
                            <td><?php echo $_SESSION["seats"]?></td>
                        </tr>

                        <tr>
                            <th>Anzahl der Türen:</th>
                            <td><?php echo $_SESSION["doors"]?></td>
                        </tr>
                    </table>

                    <table class="produktdetailstabelle2"><!--.Rechte Tabelle mit technischen Daten-->
                    <tr>
                        <th>Getriebe:</th>
                        <td>
                            <?php 
                            if ($_SESSION["gear"] == "manually") {
                                echo "Schaltung";
                            }
                            else {
                                echo "Automatik";
                            }
                            ?>
                        </td>
                    </tr>

                    <tr>
                        <th>Mindestalter:</th>
                        <td>
                            <?php echo $_SESSION["minAge"];?>
                        </td>
                    </tr>
                
                    <tr>       
                        <th>Klima:</th>
                        <td>
                            <?php 
                                if($_SESSION["airCondition"] == 1){
                                    echo "Verfügbar";
                                } else{
                                    echo "Nicht vorhanden";
                                }
                            ?>
                        </td>
                    </tr>

                    <tr>
                        <th>GPS:</th>
                        <td>
                            <?php 
                                if($_SESSION["gps"] == 1){
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

                    <form id="insuranceForm">
                        <label id="checkboxfilter1vz"><p>All-Inclusive</p>
                            <input type="checkbox" name="versicherung" class="checkmarkcolumnvz" id="option1" onchange="handleCheckboxChange(this)">
                        </label><br>

                        <label id="checkboxfilter2vz"><p>Teilkasko</p>
                            <input type="checkbox" name="versicherung" class="checkmarkcolumnvz" id="option2" onchange="handleCheckboxChange(this)">
                        </label><br>

                        <label id="checkboxfilter3vz"><p>Basic</p>
                            <input type="checkbox" name="versicherung" class="checkmarkcolumnvz" id="option3" onchange="handleCheckboxChange(this)">
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
                
                    <form id="extrasForm">
                        <label id="checkboxfilter1vz"><p>Dachbox</p>
                        <input type="checkbox" class="checkmarkcolumnvz" id="option4" onchange="calculatePrice()">
                        </label><br>
        
                        <label id="checkboxfilter2vz"><p>Fahrradträger</p>
                            <input type="checkbox" class="checkmarkcolumnvz" id="option5" onchange="calculatePrice()">
                        </label><br>
        
                        <label id="checkboxfilter3vz"><p>Kindersitz</p>
                        <input type="checkbox" class="checkmarkcolumnvz" id="option6" onchange="calculatePrice()">
                        </label><br>
                    </form>
                </div>
            </div>    

            <!--Anzeige des Gesamtpreises-->
            <div class="gesamtpreis">
                <p> <span id = "price"> Originalpreis pro Tag: <?php echo $_SESSION['price']?> € </span><br>
                    <span id = "finalPrice"> Gesamt: <?php echo $_SESSION['finalPrice']?> € </span></p> 
            </div>  

            <!--An dieser Stelle kann die Buchung abgeschlossen werden.-->
            <div class="buchungsende">
                <!-- if user is logged in show logout button -->
                <?php if (isset($loginStatus) && $loginStatus == true) : ?>
                <button class="buchungsabschluss" onclick="completeOrder()">Buchung abschließen</button>
                <?php else : ?>
                <!-- if user is not logged in show login/register button -->
                <button class="reglog" onclick="openLoginPage()">Login / Registrieren</button>
                <?php endif; ?>
            </div>
        </div>

    </div>
<script>
    function openLoginPage() {
        sessionStorage.setItem('previousURL', window.location.href); //safe url from page where logout is called from
        window.location.href = 'LoginPage.php';
      }
    function completeOrder() {
        sessionStorage.setItem('previousURL', window.location.href); //safe url from page where logout is called from
        //collect data from forms and send to InsertInOrderComplition.php
        var insuranceCheckboxes = document.querySelectorAll('#insuranceForm input[name="versicherung"]:checked'); //returns all elements from insurance checkboxes
        var extrasCheckboxes = document.querySelectorAll('#extrasForm input[name="zubehoer"]:checked'); //returns all elements from extras checkboxes

        var insuranceValues = [];
        var extrasValues = [];

        insuranceCheckboxes.forEach(function(checkbox) { 
            insuranceValues.push(checkbox.value);
        });

        extrasCheckboxes.forEach(function(checkbox) {
            extrasValues.push(checkbox.value);
        });

        // send data to saveCheckboxValuesSession.php
        fetch('saveCheckboxValuesSession.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ insurance: insuranceValues, extras: extrasValues })
        })
        .then(response => {
            console.log('Daten wurden erfolgreich gespeichert.');
        })
        .catch(error => {
            console.error('Es gab ein Problem beim Speichern der Daten:', error);
        });
        window.location.href = 'Buchungsabschluss.php';
    }

      // Checks if only one checkbox is active at a time for insurance
    function handleCheckboxChange(checkbox) {
        var checkboxes = document.querySelectorAll('input[name="' + checkbox.name + '"]');
        checkboxes.forEach(function(currentCheckbox) {
            if (currentCheckbox !== checkbox) {
                currentCheckbox.checked = false;
            }
        });
        calculatePrice(); // call function for price calculation
    }

      function calculatePrice() {
            var origPrice = parseInt("<?php echo isset($_SESSION['price']) ? $_SESSION['price'] : 0; ?>");
            var option1 = document.getElementById('option1').checked;
            var option2 = document.getElementById('option2').checked;
            var option3 = document.getElementById('option3').checked;
            var option4 = document.getElementById('option4').checked;
            var option5 = document.getElementById('option5').checked;
            var option6 = document.getElementById('option6').checked;
            
            var dateDiff = "<?php echo $_SESSION['dateDiff']; ?>";
            
            var prefixText = 'Gesamt: ';
            var suffixText = '€';

            var costs1 = 20; // costs for option 1,4
            var costs2 = 10; // costs for option 2,5
            var costs3 = 5; //costs for option 3,6

            // calculate finalPriceDaily in JS
            var finalPriceDaily = origPrice;
            if (option1) {
                finalPriceDaily += costs1;
            }
            if (option2) {
                finalPriceDaily += costs2;
            }
            if (option3) {
                finalPriceDaily += costs3;
            }
            if (option4) {
                finalPriceDaily += costs1;
            }
            if (option5) {
                finalPriceDaily += costs2;
            }
            if (option6) {
                finalPriceDaily += costs3;
            }

            finalPrice = finalPriceDaily * dateDiff;
            // Update final price in HTML
            document.getElementById('finalPrice').innerText = prefixText + finalPrice + ' ' + suffixText;


            // Update final price in session via AJAX request to server
            $.ajax({
                type: 'POST',
                url: 'updatePriceSession.php',
                data: { finalPrice: finalPrice }, // sends new final price to PHP
                success: function(response) {
                    console.log('final price has been updated sucessfully.');
                },
                error: function(xhr, status, error) {
                    console.error('error. No updating of final price possible');
                }
            });
        }
</script>

</body>

<footer>
    <!--Include Footer-->
<?php
    include('Footer.html');
    ?>
</footer>
</html>