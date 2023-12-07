<?php
session_start();

// Include the database connection file
include_once 'dbConfig.php';

// Check if the filter is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {  


    if(!isset($_POST["clear"])){ 
        // Save filter selections to the session
        $_SESSION['Stadt'] = $_POST['Stadt'] ?? "alle";
        $_SESSION['Hersteller'] = $_POST['Hersteller'] ?? "alle";
        $_SESSION['Sitzanzahl'] = $_POST['Sitzanzahl'] ?? "alle";
        $_SESSION['Türenanzahl'] = $_POST['Türenanzahl'] ?? "alle";
        $_SESSION['Getriebe'] = $_POST['Getriebe'] ?? "alle";
        $_SESSION['Kategorie'] = $_POST['Kategorie'] ?? "alle";
        $_SESSION['Antrieb'] = $_POST['Antrieb'] ?? "alle";
        $_SESSION['Preis'] = $_POST['Preis'] ?? "alle";
        $_SESSION['Mindestalter'] = $_POST['Mindestalter'] ?? "alle";
        $_SESSION['checkboxoverview1'] = isset($_POST['checkboxoverview1']) ? 1 : 0;
        $_SESSION['checkboxoverview2'] = isset($_POST['checkboxoverview2']) ? 1 : 0;
        $_SESSION['checkboxoverview3'] = isset($_POST['checkboxoverview3']) ? 1 : 0;

        // Redirect to prevent form resubmission on page refresh
        header("Location: {$_SERVER['PHP_SELF']}");
        exit;

}  elseif (isset($_POST["clear"])) {
        // Clear filter selections from the session
        $_SESSION['Stadt'] = 'alle';
        $_SESSION['Hersteller'] = 'alle';
        $_SESSION['Sitzanzahl'] = 'alle';
        $_SESSION['Türenanzahl'] = 'alle';
        $_SESSION['Getriebe'] = 'alle';
        $_SESSION['Kategorie'] = 'alle';
        $_SESSION['Antrieb'] = 'alle';
        $_SESSION['Preis'] = 'alle';
        $_SESSION['Mindestalter'] = 'alle';
        $_SESSION['checkboxoverview1'] = 0;
        $_SESSION['checkboxoverview2'] = 0;
        $_SESSION['checkboxoverview3'] = 0;

        // Redirect to prevent filter resubmission on page refresh
        header("Location: {$_SERVER['PHP_SELF']}");
        exit;
    } 
}   

// Set filter options
$filterOptions = [
    'Stadt' => ['alle', 'Hamburg', 'Berlin', 'München', 'Bielefeld', 'Bochum', 'Dortmund', 'Bremen', 'Dresden', 'Freiburg', 'Köln', 'Leipzig', 'Nürnber','Paderborn','Rostock'],
    'Hersteller' => ['alle', 'BMW', 'Mercedes-Benz', 'Audi', 'Volkswagen', 'Ford', 'Range Rover', 'Jaguar', 'Mercedes-AMG', 'Maserati', 'Opel', 'Skoda'],
    'Sitzanzahl' => ['alle', '2', '4', '5', '7', '8', '9'],
    'Türenanzahl' => ['alle', '2', '3', '4', '5'],
    'Getriebe' => ['alle', 'manually', 'automatic'],
    'Kategorie' => ['alle', 'Cabrio', 'SUV', 'Limousine', 'Combi', 'Mehrsitzer', 'Coupé'],
    'Antrieb' => ['alle', 'Combuster', 'Electric'],
    'Preis' => ['alle', '100 €', '200 €', '300 €', '400 €', '500 €', 'ab 500 €'],
    'Mindestalter' => ['alle', '18', '21', '25'],
];

//Initialize additional information variables 
$carVendor = "";
$carName = "";
$nameExtension = "";
$imagePath = "";
$carAvailability = "";
$carPricePerDay = "";
$carInfo = "";

//sets the order method for the price (ASC/DESC)
// $ordermethod = "ASC";

// function orderbyprice (){
//     if($value = "teuerstes"){
//         $ordermethod = "DESC";
//     }else{
//         $ordermethod = "ASC";
//     }
// }


//sets a limit on maximum 12 loaded cars per page
$limit = 12;

//sets page no to 1 
$page = isset($_GET['page']) ? $_GET['page'] : 1;

//determine on which page the user is currently on
if(!isset($_GET['page'])) {
    $page = 1;
} else{
    $page = $_GET['page'];
}

//sets the start of the rows loaded in every page
$start = ($page - 1) * $limit;


//Check if values are set in the filters
if(isset($_SESSION['Hersteller']) || isset($_SESSION['Sitzanzahl']) || isset($_SESSION['Türenanzahl']) || isset($_SESSION['Getriebe']) || isset($_SESSION['Kategorie']) || isset($_SESSION['Antrieb']) || isset($_SESSION['Preis']) || isset($_SESSION['Mindestalter']) || isset($_SESSION['checkboxoverview1']) || isset($_SESSION['checkboxoverview2']) || isset($_SESSION['checkboxoverview3'])) {
    
    try{
        //Dynamic SQL query based on the filters selected
        $sql = "SELECT vendor.vendorName, cartype.name, cartype.img, cartype.price, nameExtension, carID 
                FROM vendor 
                INNER JOIN cartype ON vendor.vendorID = cartype.vendorID 
                INNER JOIN carlocation ON carlocation.typeID = cartype.typeID
                WHERE 1 = 1"; 
                            // INNER JOIN carlocation ON carlocation.typeID = cartype.typeID

        if ($_SESSION['Stadt'] != 'alle') {
            $sql .= " AND carlocation.locationID = :Stadt";
        }
        if ($_SESSION['Hersteller'] != 'alle') {
            $sql .= " AND vendor.vendorName = :Hersteller";
        }

        if ($_SESSION['Sitzanzahl'] != 'alle') {
            $sql .= " AND seats = :Sitzanzahl";
        }

        if ($_SESSION['Türenanzahl'] != 'alle') {
            $sql .= " AND doors = :Türenanzahl";
        }

        if ($_SESSION['Getriebe'] != 'alle') {
            $sql .= " AND gear = :Getriebe";
        }

        if ($_SESSION['Kategorie'] != 'alle') {
            $sql .= " AND cartype.type = :Kategorie";
        }

        if ($_SESSION['Antrieb'] != 'alle') {
            $sql .= " AND drive = :Antrieb";
        }

        if ($_SESSION['Preis'] != 'alle') {
            $sql .= " AND price <= :Preis";
        }

        if ($_SESSION['Mindestalter'] != 'alle') {
            $sql .= " AND minAge <= :Mindestalter";
        }

        if ($_SESSION['checkboxoverview1'] == '1') {
            $sql .= " AND airCondition = 1";
        }

        if ($_SESSION['checkboxoverview2'] == '1') {
            $sql .= " AND gps = 1";
        }

        if ($_SESSION['checkboxoverview3'] == '1') {
            $sql .= " AND specialOffer = 1";
        }

        $sql .= " ORDER BY cartype.price DESC";    
 
        $sql .= " LIMIT " . $start . ',' . $limit;

        $stmt = $conn->prepare($sql);

        // Bind parameters for the prepared statement
        if ($_SESSION['Stadt'] != 'alle') {
            $stmt->bindParam(':Stadt', $_SESSION['Stadt']);
        }

        if ($_SESSION['Hersteller'] != 'alle') {
            $stmt->bindParam(':Hersteller', $_SESSION['Hersteller']);
        }

        if ($_SESSION['Sitzanzahl'] != 'alle') {
            $stmt->bindParam(':Sitzanzahl', $_SESSION['Sitzanzahl']);
        }

        if ($_SESSION['Türenanzahl'] != 'alle') {
            $stmt->bindParam(':Türenanzahl', $_SESSION['Türenanzahl']);
        }

        if ($_SESSION['Getriebe'] != 'alle') {
            $stmt->bindParam(':Getriebe', $_SESSION['Getriebe']);
        }

        if ($_SESSION['Kategorie'] != 'alle') {
            $stmt->bindParam(':Kategorie', $_SESSION['Kategorie']);
        }

        if ($_SESSION['Antrieb'] != 'alle') {
            $stmt->bindParam(':Antrieb', $_SESSION['Antrieb']);
        }

        if ($_SESSION['Preis'] != 'alle') {
            $stmt->bindParam(':Preis', $_SESSION['Preis']);
        }

        if ($_SESSION['Mindestalter'] != 'alle') {
            $stmt->bindParam(':Mindestalter', $_SESSION['Mindestalter']);
        }

        $stmt->execute();

        //echo $sql;

    } catch (PDOException $e){
        echo "Error: " . $e->getMessage();
    }
}

?>

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

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">

    <title>Produktübersicht</title>

    <!--Include Header-->
    <div class = "band" style = "text-align: left; background-color:  black; color: white; margin-top: 0px;"><h3><i>Angebot des Tages: 5er BMW für 139 Kartoffeln</i></h3></div> 
    <?php
    include('Header.php');
    ?><br>

    <!--Processbar dynmaic settings-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function(){
            $("#progress1").fadeTo("slow", 0.6);
            $("#progress2").fadeTo(0.4);
            $("#progress3").fadeTo("slow", 0.2);            
            });    
        </script>

    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

</head>

<body>

<script>
        $(function() {
            var dateFormat = "dd MM yy",
            from = $("#fromprogress").datepicker({
                altField: "#datepicker_input",
                dateFormat: dateFormat,
                regional: "de",
                monthNames: ["Jan", "Feb", "Mär", "Apr", "Mai", "Jun", "Jul", "Aug", "Sep", "Okt", "Nov", "Dez"],
                numberOfMonths: 1,
                minDate: 0,
                onSelect: function(selectedDate) {
                to.datepicker("option", "minDate", selectedDate);
                }
            }),
            to = $("#toprogress").datepicker({
                dateFormat: dateFormat,
                regional: "de",
                numberOfMonths: 1,
                monthNames: ["Jan", "Feb", "Mär", "Apr", "Mai", "Jun", "Jul", "Aug", "Sep", "Okt", "Nov", "Dez"],
                minDate: 0,
                onSelect: function(selectedDate) {
                from.datepicker("option", "maxDate", selectedDate);
                }
            });

            function getDate(element) {
            var date;
            try {
                date = $.datepicker.parseDate(dateFormat, element.value);
            } catch (error) {
                date = null;
            }

            return date;
            }
        });
</script>

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

<div class="progress">
<table border="0" width="1500px" height="1500px">
    <tr>
        <td width="350px">
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
                <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
                    <div style="display: flex; justify-content: center;">
                        <select id="sortby">
                            <option value="günstigstes">Preis aufsteigend</option>
                            <option value="teuerstes">Preis absteigend</option>
                        </select>
                        <button id="buttongo" onclick="orderbyprice()"><i>Go.</i></button>
                    </div>
                </form>    
                <br>

                <!--Filtercolumn-->

                <!--resets all filters to "all"-->
                <script>
                    function deleteFilter(){
                        //gets the filter by his ID and resets it to the first value 'all' 
                        document.getElementById('filterdropdown1').selectedIndex = 0;
                        document.getElementById('filterdropdown2').selectedIndex = 0;
                        document.getElementById('filterdropdown3').selectedIndex = 0;
                        document.getElementById('filterdropdown4').selectedIndex = 0;
                        document.getElementById('filterdropdown5').selectedIndex = 0;
                        document.getElementById('filterdropdown6').selectedIndex = 0;
                        document.getElementById('filterdropdown7').selectedIndex = 0;
                        document.getElementById('filterdropdown8').selectedIndex = 0;
                        document.getElementById('checkboxHersteller').selectedIndex = 0;
                        document.getElementById('checkboxSitzanzahl').selectedIndex = 0;
                        document.getElementById('checkboxTürenanzahl').selectedIndex = 0;
                    }
                </script>
                    
                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                
                <!--delete, execute button-->
                <div style="display: flex; justify-content: center;">

                    <input type="submit" name="clear" value="Löschen" class="buttonproduktübersicht1" onclick="deleteFilter()">
                    <input type="submit" name="submit" value="Anwenden" class="buttonproduktübersicht2">  

                </div>

                    <br>
                    <!--manufacturerfilter-->
                    <div style="margin-left: 20px;">
                        <label for="Hersteller" class="filterheader">Hersteller</label>
                        <select name="Hersteller" id="filterdropdown1">
                            <?php foreach ($filterOptions['Hersteller'] as $option): ?>
                                <option value="<?php echo $option; ?>" <?php echo ($_SESSION['Hersteller'] == $option) ? 'selected' : ''; ?>>
                                    <?php echo $option; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        
                        <button onclick="document.getElementById('filterdropdown1').selectedIndex = 0" class="resetFilter">Filter zurücksetzen</button>
                    </div>
                    <br>
                    
                    <!--seatfilter-->
                    <div style="margin-left: 20px;">
                        <label for="Sitzanzahl" class="filterheader">Sitze</label>
                        <select name="Sitzanzahl" id="filterdropdown2">
                            <?php foreach ($filterOptions['Sitzanzahl'] as $option): ?>
                                <option value="<?php echo $option; ?>" <?php echo ($_SESSION['Sitzanzahl'] == $option) ? 'selected' : ''; ?>>
                                    <?php echo $option; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        
                        <button onclick="document.getElementById('filterdropdown2').selectedIndex = 0" class="resetFilter">Filter zurücksetzen</button>
                    </div>
                    <br>

                    <!--doorfilter-->
                    <div style="margin-left: 20px;">
                        <label for="Türenanzahl" class="filterheader">Türen</label>
                        <select name="Türenanzahl" id="filterdropdown3">
                            <?php foreach ($filterOptions['Türenanzahl'] as $option): ?>
                                <option value="<?php echo $option; ?>" <?php echo ($_SESSION['Türenanzahl'] == $option) ? 'selected' : ''; ?>>
                                    <?php echo $option; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        
                        <button onclick="document.getElementById('filterdropdown3').selectedIndex = 0" class="resetFilter">Filter zurücksetzen</button>
                    </div>
                    <br>
                    
                    <!--gearsfilter-->
                    <div style="margin-left: 20px;">
                        <label for="Getriebe" class="filterheader">Getriebe</label>
                        <select name="Getriebe" id="filterdropdown4">
                            <?php foreach ($filterOptions['Getriebe'] as $option): ?>
                                <option value="<?php echo $option; ?>" <?php echo ($_SESSION['Getriebe'] == $option) ? 'selected' : ''; ?>>
                                    <?php echo $option; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        
                        <button onclick="document.getElementById('filterdropdown4').selectedIndex = 0" class="resetFilter">Filter zurücksetzen</button>
                    </div>
                    <br>
                    
                    <!--typfilter-->
                    <div style="margin-left: 20px;">
                        <label for="Kategorie" class="filterheader">Typ</label>
                        <select name="Kategorie" id="filterdropdown5">
                            <?php foreach ($filterOptions['Kategorie'] as $option): ?>
                                <option value="<?php echo $option; ?>" <?php echo ($_SESSION['Kategorie'] == $option) ? 'selected' : ''; ?>>
                                    <?php echo $option; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        
                        <button onclick="document.getElementById('filterdropdown5').selectedIndex = 0" class="resetFilter">Filter zurücksetzen</button>
                    </div>
                    <br>

                    <!--drivefilter-->  
                    <div style="margin-left: 20px;">
                        <label for="Antrieb" class="filterheader">Antrieb</label>
                        <select name="Antrieb" id="filterdropdown6">
                            <?php foreach ($filterOptions['Antrieb'] as $option): ?>
                                <option value="<?php echo $option; ?>" <?php echo ($_SESSION['Antrieb'] == $option) ? 'selected' : ''; ?>>
                                    <?php echo $option; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        
                        <button onclick="document.getElementById('filterdropdown6').selectedIndex = 0" class="resetFilter">Filter zurücksetzen</button>
                    </div>
                    <br>
                    
                    <!--pricefilter-->
                    <div style="margin-left: 20px;">
                        <label for="Preis" class="filterheader">Preis bis:</label>
                        <select name="Preis" id="filterdropdown7">
                            <?php foreach ($filterOptions['Preis'] as $option): ?>
                                <option value="<?php echo $option; ?>" <?php echo ($_SESSION['Preis'] == $option) ? 'selected' : ''; ?>>
                                    <?php echo $option; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        
                        <button onclick="document.getElementById('filterdropdown7').selectedIndex = 0" class="resetFilter">Filter zurücksetzen</button>
                    </div>
                    <br>
                    
                    <!--minagefilter-->
                    <div style="margin-left: 20px;">
                        <label for="Mindestalter" class="filterheader">Mindestalter</label>
                        <select name="Mindestalter" id="filterdropdown8">
                            <?php foreach ($filterOptions['Mindestalter'] as $option): ?>
                                <option value="<?php echo $option; ?>" <?php echo ($_SESSION['Mindestalter'] == $option) ? 'selected' : ''; ?>>
                                    <?php echo $option; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        
                        <button onclick="document.getElementById('filterdropdown8').selectedIndex = 0" class="resetFilter">Filter zurücksetzen</button>
                    </div>
                    <br><br>              
                            
                    <!--air conditioning-->
                    <div class="checkboxgeneral">
                        <label for="checkboxoverview1" id="checkboxHersteller">KLimaanlage</label>
                        <input type="checkbox" id="checkboxoverview1" name="checkboxoverview1" class="checkmarkcolumn" 
                            <?php if (isset($_SESSION['checkboxoverview1']) && $_SESSION['checkboxoverview1'] == '1') echo 'checked'; ?>>
                    </div>
                    <br>

                    <!--navigationssystem-->
                    <div class="checkboxgeneral">
                        <label for="checkboxoverview2" id="checkboxSitzanzahl">Navigationssystem</label>
                        <input type="checkbox" id="checkboxoverview2" name="checkboxoverview2" class="checkmarkcolumn"
                            <?php if (isset($_SESSION['checkboxoverview2']) && $_SESSION['checkboxoverview2'] == '1') echo 'checked'; ?>>
                    </div>
                    <br>

                    <!--offer-->
                    <div class="checkboxgeneral">
                        <label for="checkboxoverview3" id="checkboxTürenanzahl">Im Angebot</label>
                        <input type="checkbox" id="checkboxoverview3" name="checkboxoverview3" class="checkmarkcolumn"
                            <?php if (isset($_SESSION['checkboxoverview3']) && $_SESSION['checkboxoverview3'] == '1') echo 'checked'; ?>>
                    </div>
                    <br>

                </form>

            </div><br> 
        </td>
  
        <?php

        //define a variable which contains the number of results
        $results = $stmt->rowCount(); 

        //defines no of pages depending on the rows found in the query
        $number_of_pages = ceil($results/$limit);  
        ?>

        <td style="display: flex; flex-wrap: wrap;">
            <?php

            //$selectedlocation = $_SESSION['filter0'];

            echo '<div class="car-container">';
            // If there's a matching record, fetch and set additional information
            if ($stmt->rowCount() > 0) {

                while($row = $stmt->fetch()){
                $carVendor = $row['vendorName'];
                $carName = $row['name'];
                $nameExtension = $row['nameExtension'];
                $imagePath = $row['img'];                
                $carPricePerDay = $row['price'];
                
                // //safes the carID in a Session variable to refer to the fitting car on the detailpage when clicked on
                // $carInfo = $row['carID'];

                // //safes the fetched infos for each car in a Session variable for detailpage
                // $_SESSION['carID'] = $carInfo;
                // $_SESSION['vendorName'] = $carVendor;
                // $_SESSION['name'] = $carName;
                // $_SESSION['nameExtension'] = $nameExtension;
                // $_SESSION['img'] = $imagePath;
                // $_SESSION['price'] = $carPricePerDay;

                // try{
                //     $stmt = $conn->prepare("SELECT COUNT(typeID) 
                //     FROM carlocation 
                //     INNER JOIN location ON carlocation.locationID = location.locationID 
                //     WHERE location.locationName =:selectedlocation AND carlocation.available = 1");
                //     $stmt->bindParam(':selectedlocation', $selectedlocation);

                //     $stmt->execute();

                //     $numberavailable = $stmt->rowCount();

                // }catch (PDOException $e){
                //     echo "Error: " . $e->getMessage();
                // }

                // $carAvailability = $numberavailable;


                    
                echo '<div class="car-container">';
                    //Html Output for each row
                    echo '<div class="autozelle">';
                        if (!empty($carVendor) && !empty($carName) || !empty($nameExtension)):
                            echo '<div class="autozellenheader">' . $carVendor . " " . $carName . " " . $nameExtension . '</div>';
                        endif;
                    
                        
                        if (!empty($imagePath)): 
                            echo '<div class="zellenimage1"><img src="data:image/jpg;charset=utf8;base64,' . base64_encode($imagePath) . '" alt="Car Image" class="zellenimage"></div>';
                        endif; 

                        
                        if (!empty($carAvailability) || !empty($carPricePerDay)):
                            echo '<div class="zellenfooter">';
                                echo '<div class="zellenfooter1">' . "Verfügbar: " . $carAvailability . '</div>';
                                echo '<div class="zellenfooter2">' . $carPricePerDay . " € pro Tag" . '</div>';
                            echo '</div>';
                        endif; 
                    echo '</div>';
                echo '</div>';        
                }  

                }else{
                    echo '<div id="notavailable" style="font-size: 40px; line-height: 1.5;">';
                    echo "Es tut uns Leid." . '<br>' . "Deinen  <i>Drive.</i>  scheint es grade nicht zu geben." . '<br>' . "Such doch gerne weiter:)";
                    echo '</div>';
                } 
                echo '</div>';    
            ?>
        </td>

    </tr>    
    
</table>
</div>

        
<!--Productoverview-->
<!--carcell-->



<!--Pagination-->
<?php 
for($page = 1; $page <= $number_of_pages; $page++){
    echo '<a href="Produktübersicht.php?page=' . $page . '">' . $page . '</a> ';
}
?>

</body>

<footer>
    <!--Include Footer-->
<?php
    include('Footer.html');
    ?>
</footer>

</html>