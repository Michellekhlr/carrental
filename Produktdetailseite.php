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
?>

<!DOCTYPE html>
<head>
    <title>Produktdetails - Drive.</title><link rel="icon" type="image/png" href="bilder/Drive.png">
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
    <?php
     include('Header.php');
    ?>

     <!--Processbar dynamic settings-->
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function(){
            $("#progress1").fadeTo("slow", 0.3);
            $("#progress2").fadeTo("slow", 0.4);
            $("#progress3").fadeTo(0.2);
        });
    </script>

</head>

<body> 

<?php
    include('progressbar.php');
    $start = date_create($_SESSION['startDate']);
    $end = date_create($_SESSION['endDate']);
    $diff = $start->diff($end);
    $_SESSION['dateDiff'] = intval($diff->format("%a")) +1;

   $_SESSION['finalPrice'] = $_SESSION['price'] * $_SESSION['dateDiff'];

?>

    <div class="produktdetailseite">

        <!--Linker Teil der Seite, auf dem alle technischen Daten des Fahrzeuges gezeigt werden.-->
        <div class="technischedaten">
            <?php
            echo '<div class="detailseitebild"><img src="data:image/jpg;charset=utf8;base64,' . base64_encode($_SESSION["img"]) . '" ></div>'; 
            ?> <!--Fahrzeug Bild-->

            <div class="fahrzeugname"> <!--Bezeichnugn des Fahrzeugs-->
                <div><?php echo $_SESSION["vendor"] . " " . $_SESSION["name"]?></div>
                <div class="pds_verfügbarkeit">Verfügbar: <?php echo $_SESSION["availability"]?></div>
            </div>

            <div class="produktdetails">
                <div>
                    <table class="produktdetailstabelle"><!--Linke Tabelle mit technischen Daten-->

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
        //collect data from forms and send to saveCheckboxValuesSession.php
        var option1 = document.getElementById('option1').checked;
        var option2 = document.getElementById('option2').checked;
        var option3 = document.getElementById('option3').checked;
        var option4 = document.getElementById('option4').checked;
        var option5 = document.getElementById('option5').checked;
        var option6 = document.getElementById('option6').checked;

        if (option1) {
            insuranceValue = 'All-inclusive';
        }
        if (option2) {
            insuranceValue = 'Teilkasko';
        }
        if (option3) {
            insuranceValue = 'Basic';
        }
        if (option4) {
            extrasValue1 = 'Dachbox';
        }
        if (option5) {
            extrasValue2 = 'Fahrradträger';
        }
        if (option6) {
            extrasValue3 = 'Kindersitz';
        }
        if (!(option1) && !(option2) && !(option3)) {
            insuranceValue = '';
        }
        if (!(option4)) {
            extrasValue1 = '';
        }
        if (!(option5)) {
            extrasValue2 = '';
        }
        if (!(option6)) {
            extrasValue3 = '';
        }
        $.ajax({
                type: 'POST',
                url: 'saveCheckboxValuesSession.php',
                data: { insuranceValue: insuranceValue, extrasValue1: extrasValue1, extrasValue2: extrasValue2, extrasValue3: extrasValue3 }, // sends new final price to PHP
                success: function(response) {
                    console.log('checkbox values have been transferred sucessfully.');
                },
                error: function(xhr, status, error) {
                    console.error('error. No transferring of checkboxes possible');
                }
            });
            window.location.href='Buchungsabschluss.php';
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