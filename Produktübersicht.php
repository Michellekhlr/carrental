<?php
session_start();

// Include the database connection file
include_once 'dbConfig.php';

// Check if the filter is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {


    if (!isset($_POST["clear"]) && !isset($_POST["clearall"])) {
        // Save filter selections to the session
        $_SESSION['OrderByPrice'] = $_POST['OrderByPrice'] ?? "Preis Aufsteigend";
        $_SESSION['location'] = $_POST['Stadt'] ?? "alle";
        $_SESSION['startDate'] = $_POST['from'] ?? date('Y-m-d');
        $_SESSION['endDate'] = $_POST['to'] ?? date('Y-m-d', strtotime('+1 day'));
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

    } elseif (isset($_POST["clear"])) {
        // Clear filter selections from the session
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

    } elseif (isset($_POST["clearall"])) {
        // Clear filter selections from the session plus location and date
        $_SESSION['location'] = 'alle';
        $_SESSION['startDate'] = date('Y-m-d');
        $_SESSION['endDate'] = date('Y-m-d', strtotime('+1 day'));
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


// check and handle 'buchen' Query-Parameter, deactivate all filters and checkboxes
if (isset($_GET['buchen'])) {
    $_SESSION['OrderByPrice'] = 'Preis Aufsteigend';
    $_SESSION['checkboxoverview3'] = '0'; // Deaktivate Checkbox (offer)
    $_SESSION['location'] = 'alle';
    $_SESSION['startDate'] = date('Y-m-d');
    $_SESSION['endDate'] = date('Y-m-d', strtotime('+1 day'));
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
}


// check and handle 'angebot' Query-Parameter, deactivate all filters and checkboxes despite "Im Angebot"
if (isset($_GET['angebot'])) {
    $_SESSION['OrderByPrice'] = 'Preis Aufsteigend';
    $_SESSION['checkboxoverview3'] = '1'; // Aktivate Checkbox (offer)
    $_SESSION['location'] = 'alle';
    $_SESSION['startDate'] = date('Y-m-d');
    $_SESSION['endDate'] = date('Y-m-d', strtotime('+1 day'));
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
}


// Initialize filter options
$filterOptions = [
    'Stadt' => ['alle', 'Hamburg', 'Berlin', 'München', 'Bielefeld', 'Bochum', 'Dortmund', 'Bremen', 'Dresden', 'Freiburg', 'Köln', 'Leipzig', 'Nürnberg', 'Paderborn', 'Rostock'],
    'Hersteller' => ['alle', 'BMW', 'Mercedes-Benz', 'Audi', 'Volkswagen', 'Ford', 'Range Rover', 'Jaguar', 'Mercedes-AMG', 'Maserati', 'Opel', 'Skoda'],
    'Sitzanzahl' => ['alle', '2', '4', '5', '7', '8', '9'],
    'Türenanzahl' => ['alle', '2', '3', '4', '5'],
    'Getriebe' => ['alle', 'manually', 'automatic'],
    'Kategorie' => ['alle', 'Cabrio', 'SUV', 'Limousine', 'Combi', 'Mehrsitzer', 'Coupé'],
    'Antrieb' => ['alle', 'Combuster', 'Electric'],
    'Preis' => ['alle', '100 €', '200 €', '300 €', '400 €', '500 €', 'ab 500 €'],
    'Mindestalter' => ['alle', '18', '21', '25'],
    'OrderByPrice' => ['Preis Aufsteigend', 'Preis Absteigend'],
];

//Initialize additional information variables 
$carVendor = "";
$carName = "";
$nameExtension = "";
$imagePath = "";
$carPricePerDay = "";
$typeID = "";
$carInfo = "";
$carAvailability = "";

//Check if values are set in the filters
if(isset($_SESSION['OrderByPrice']) || isset($_SESSION['location']) || isset($_SESSION['Hersteller']) || isset($_SESSION['Sitzanzahl']) || isset($_SESSION['Türenanzahl']) || isset($_SESSION['Getriebe']) || isset($_SESSION['Kategorie']) || isset($_SESSION['Antrieb']) || isset($_SESSION['Preis']) || isset($_SESSION['Mindestalter']) || isset($_SESSION['checkboxoverview1']) || isset($_SESSION['checkboxoverview2']) || isset($_SESSION['checkboxoverview3'])) {
    
    try{
        //SQL-query based on the filter selections
        $sql = "SELECT vendor.vendorName, cartype.name, cartype.img, cartype.price, nameExtension, carlocation.carID, cartype.typeID
                FROM vendor 
                INNER JOIN cartype ON vendor.vendorID = cartype.vendorID 
                INNER JOIN carlocation ON carlocation.typeID = cartype.typeID
                INNER JOIN location ON location.locationID = carlocation.locationID
                WHERE carlocation.carID NOT IN (SELECT `order`.carID FROM `order` WHERE `order`.startDate <= :endDate AND `order`.endDate >= :startDate)";     

        //every filter must contain an other option selected than 'alle' to be checked in the query 
        if ($_SESSION['location'] != 'alle') {
            $sql .= " AND location.locationName = :Stadt";
        }

        if ($_SESSION['Hersteller'] != 'alle') {
            $sql .= " AND vendor.vendorName = :Hersteller";
        }

        if ($_SESSION['Sitzanzahl'] != 'alle') {
            $sql .= " AND seats = :Sitzanzahl";
        }

        if ($_SESSION['Türenanzahl'] != 'alle') {
            $sql .= " AND doors = :Tuerenanzahl";
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

        if ($_SESSION['OrderByPrice'] == 'Preis Absteigend') {
            $sql .= " ORDER BY cartype.price DESC";
        } elseif ($_SESSION['OrderByPrice'] == 'Preis Aufsteigend') {
            $sql .= " ORDER BY cartype.price ASC";
        }

        $stmt = $conn->prepare($sql);

        // Bind parameters for the prepared statement
        if (isset($_SESSION['startDate'])){
            $stmt->bindParam(':startDate', $_SESSION['startDate']);
        }

        if (isset($_SESSION['endDate'])){
            $stmt->bindParam(':endDate', $_SESSION['endDate']);
        }
        
        if ($_SESSION['location'] != 'alle') {
            $stmt->bindParam(':Stadt', $_SESSION['location']);
        }

        if ($_SESSION['Hersteller'] != 'alle') {
            $stmt->bindParam(':Hersteller', $_SESSION['Hersteller']);
        }

        if ($_SESSION['Sitzanzahl'] != 'alle') {
            $stmt->bindParam(':Sitzanzahl', $_SESSION['Sitzanzahl']);
        }

        if ($_SESSION['Türenanzahl'] != 'alle') {
            $stmt->bindParam(':Tuerenanzahl', $_SESSION['Türenanzahl']);
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
        
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

?>

<!DOCTYPE html>

<head>
    <title>Produktübersicht - Drive.</title><link rel="icon" type="image/png" href="bilder/Drive.png">
    <!--language style import from google fonts-->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Titillium+Web:wght@400;700&display=swap');
    </style>

    <!--Iconimport Google-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <script src="https://kit.fontawesome.com/9740fceffb.js" crossorigin="anonymous"></script>

    <!--Styleimport CSS Datei-->
    <link rel="stylesheet" href="CSSMain.css">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">

    <!--Processbar dynamic settings-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                $("#progress1").fadeTo(0.6);
                $("#progress2").fadeTo(0.4);
                $("#progress3").fadeTo("slow", 0.2);
            });
        </script>


    <!--Include Header-->
    <?php
    include('Header.php');
    ?>

    <br>

</head>

<body>
<!-- starts the big form with every filter included-->
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

  <?php
  $isProductOverview = true;
  //includes the yellow bar that shows the progress of the booking process 
  include('progressbar.php');
  ?>
  

    <div class="progress">
        <table border="0" id="contenttable">

            <tr>

                <td width="350px">

                <!--Filterbox-->
                <div class="filtercolumn">

                        <!--Filterslogan-->
                        <div class="filtertitel">

                            <p id="filtername">Filter</p>

                        </div>

                        <br>


                        <!--Filtercolumn-->                   
                        <div id="filterbuttons">

                                <select id="sortby" name="OrderByPrice">

                                    <?php foreach ($filterOptions['OrderByPrice'] as $option) : ?>
                                        <option value="<?php echo $option; ?>" <?php echo ($_SESSION['OrderByPrice'] == $option) ? 'selected' : ''; ?>>
                                            <?php echo $option; ?>
                                        </option>
                                    <?php endforeach; ?>

                                </select>

                            </div>

                            <br>

                            <div id="clearallbutton">
                                <input type="submit" name="clearall" value="Alles Löschen" id="buttonclearall">
                            </div>

                            <br>

                            <!--delete, execute button-->
                            <div id="filterbuttons">

                                <input type="submit" name="clear" value="Löschen" class="buttonproduktübersicht1">

                                <input type="submit" id="submit-button" name="submit" value="Anwenden" class="buttonproduktübersicht2" onclick="applyFilter()">

                            </div>

                        <br>

                        <!--manufacturerfilter-->
                        <div class="filters">

                                <label for="Hersteller" class="filterheader">Hersteller</label>

                                <select name="Hersteller" id="filterdropdown1">

                                    <?php foreach ($filterOptions['Hersteller'] as $option) : ?>
                                        <option value="<?php echo $option; ?>" <?php echo ($_SESSION['Hersteller'] == $option) ? 'selected' : ''; ?>>
                                            <?php echo $option; ?>
                                        </option>
                                    <?php endforeach; ?>

                                </select>

                            </div>

                            <br>

                            <!--seatfilter-->
                            <div class="filters">

                                <label for="Sitzanzahl" class="filterheader">Sitze</label>

                                <select name="Sitzanzahl" id="filterdropdown2">

                                    <?php foreach ($filterOptions['Sitzanzahl'] as $option) : ?>
                                        <option value="<?php echo $option; ?>" <?php echo ($_SESSION['Sitzanzahl'] == $option) ? 'selected' : ''; ?>>
                                            <?php echo $option; ?>
                                        </option>
                                    <?php endforeach; ?>

                                </select>

                            </div>

                            <br>

                            <!--doorfilter-->
                            <div class="filters">

                                <label for="Türenanzahl" class="filterheader">Türen</label>

                                <select name="Türenanzahl" id="filterdropdown3">

                                    <?php foreach ($filterOptions['Türenanzahl'] as $option) : ?>
                                        <option value="<?php echo $option; ?>" <?php echo ($_SESSION['Türenanzahl'] == $option) ? 'selected' : ''; ?>>
                                            <?php echo $option; ?>
                                        </option>
                                    <?php endforeach; ?>

                                </select>

                            </div>

                            <br>

                            <!--gearsfilter-->
                            <div class="filters">

                                <label for="Getriebe" class="filterheader">Getriebe</label>

                                <select name="Getriebe" id="filterdropdown4">

                                    <?php foreach ($filterOptions['Getriebe'] as $option) : ?>
                                        <option value="<?php echo $option; ?>" <?php echo ($_SESSION['Getriebe'] == $option) ? 'selected' : ''; ?>>
                                            <?php echo $option; ?>
                                        </option>
                                    <?php endforeach; ?>

                                </select>

                            </div>

                            <br>

                            <!--typfilter-->
                            <div class="filters">

                                <label for="Kategorie" class="filterheader">Typ</label>

                                <select name="Kategorie" id="filterdropdown5">

                                    <?php foreach ($filterOptions['Kategorie'] as $option) : ?>
                                        <option value="<?php echo $option; ?>" <?php echo ($_SESSION['Kategorie'] == $option) ? 'selected' : ''; ?>>
                                            <?php echo $option; ?>
                                        </option>
                                    <?php endforeach; ?>

                                </select>

                            </div>

                            <br>

                            <!--drivefilter-->
                            <div class="filters">

                                <label for="Antrieb" class="filterheader">Antrieb</label>

                                <select name="Antrieb" id="filterdropdown6">

                                    <?php foreach ($filterOptions['Antrieb'] as $option) : ?>
                                        <option value="<?php echo $option; ?>" <?php echo ($_SESSION['Antrieb'] == $option) ? 'selected' : ''; ?>>
                                            <?php echo $option; ?>
                                        </option>
                                    <?php endforeach; ?>

                                </select>

                            </div>

                            <br>

                            <!--pricefilter-->
                            <div class="filters">

                                <label for="Preis" class="filterheader">Preis bis:</label>

                                <select name="Preis" id="filterdropdown7">

                                    <?php foreach ($filterOptions['Preis'] as $option) : ?>
                                        <option value="<?php echo $option; ?>" <?php echo ($_SESSION['Preis'] == $option) ? 'selected' : ''; ?>>
                                            <?php echo $option; ?>
                                        </option>
                                    <?php endforeach; ?>

                                </select>

                            </div>

                            <br>

                            <!--minagefilter-->
                            <div class="filters">

                                <label for="Mindestalter" class="filterheader">Mindestalter</label>

                                <select name="Mindestalter" id="filterdropdown8">

                                    <?php foreach ($filterOptions['Mindestalter'] as $option) : ?>
                                        <option value="<?php echo $option; ?>" <?php echo ($_SESSION['Mindestalter'] == $option) ? 'selected' : ''; ?>>
                                            <?php echo $option; ?>
                                        </option>
                                    <?php endforeach; ?>

                                </select>

                            </div>

                            <br>
                            <br>
                            <br>

                            <!--air conditioning-->
                            <div class="checkboxgeneral">

                                <label for="checkboxoverview1" id="checkboxHersteller">
                                    <p>KLimaanlage</p>
                                </label>

                                <input type="checkbox" id="checkboxoverview1" name="checkboxoverview1" class="checkmarkcolumn" <?php if (isset($_SESSION['checkboxoverview1']) && $_SESSION['checkboxoverview1'] == '1') echo 'checked'; ?>>

                            </div>

                            <br>

                            <!--navigationssystem-->
                            <div class="checkboxgeneral">

                                <label for="checkboxoverview2" id="checkboxSitzanzahl">
                                    <p>Navigationssystem</p>
                                </label>

                                <input type="checkbox" id="checkboxoverview2" name="checkboxoverview2" class="checkmarkcolumn" <?php if (isset($_SESSION['checkboxoverview2']) && $_SESSION['checkboxoverview2'] == '1') echo 'checked'; ?>>

                            </div>

                            <br>

                            <!--offer-->
                            <div class="checkboxgeneral">

                                <label for="checkboxoverview3" id="checkboxTürenanzahl">
                                    <p>Im Angebot</p>
                                </label>

                                <input type="checkbox" id="checkboxoverview3" name="checkboxoverview3" class="checkmarkcolumn" <?php if (isset($_SESSION['checkboxoverview3']) && $_SESSION['checkboxoverview3'] == '1') echo 'checked'; ?>>

                            </div>

                            <br>

                        </form>

                    </div>

                    <br>

                </td>

                <td id="contentcarcells">

                <?php

                    echo '<div class="car-container">';

                    // If there's a matching record from the query above, the information are fetched
                    if ($stmt->rowCount() > 0) {

                        $counter = 1;
                        $resultArray = array();

                        //loops through all results and fetch the information needed
                        while($row = $stmt->fetch()){

                            $carVendor = $row['vendorName'];
                            $carName = $row['name'];
                            $nameExtension = $row['nameExtension'];
                            $imagePath = $row['img'];
                            $carPricePerDay = $row['price'];
                            $typeID = $row['typeID'];

                                //checks if the typeID is already existent 
                                if(key_exists($typeID, $resultArray)){

                                    //if yes, the counter which is the carAvailability later gets lifted about 1 car 
                                    $resultArray[$typeID]["counter"] = $resultArray[$typeID]["counter"] + 1;                        

                                  //if not, the cartype is saved in an array with all the fetched information  
                                } else{
                                    $resultArray[$typeID] = array("typeID"=>$typeID, "counter"=>$counter, "carVendor"=>$carVendor, 
                                                                "carName"=>$carName, "nameExtension"=>$nameExtension, 
                                                                "imagePath"=>$imagePath, "carPricePerDay"=>$carPricePerDay);
                                }                
                        
                    }

                    // Initializes the Pagination
                    //sets a maximum number of loaded cars per page 
                    $carsPerPage = 12; 
                    
                    //counts the entries from the array
                    $countCars = count($resultArray);

                    //gets the number of total pages in addition to the number of results found
                    $totalPages = ceil($countCars / $carsPerPage);

                    //sets the first page to 1
                    $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;

                    // checks on which pages the user is currently on 
                    if (!isset($_GET['page'])) {
                        $currentPage = 1;
                    } else {
                        $currentPage = $_GET['page'];
                    }

                    // calculates the index where the for-loop should start fetching information from the array
                    $offset = ($currentPage - 1) * $carsPerPage;

                        // Initializes the car cell that you can see on the website 
                        echo '<td style="display: flex; flex-wrap: wrap;">';
                        echo '<div class="car-container">';

                        //resets the index in the array from typeID to the normal index starting from zero
                        $resultArray = array_values($resultArray);  

                        // loops through the results in the array as long as all results are viewed on the website 
                        for ($i = $offset; $i < min($offset + $carsPerPage, $countCars); $i++) {
                            $carDetails = $resultArray[$i];

                            $carAvailability = $carDetails['counter'];
                            $carVendor = $carDetails['carVendor'];
                            $carName = $carDetails['carName'];
                            $nameExtension = $carDetails['nameExtension'];
                            $imagePath = $carDetails['imagePath'];
                            $carPricePerDay = $carDetails['carPricePerDay'];
                            $typeID = $carDetails['typeID'];

                            
                            //actuall car cell design in html
                            echo '<div class="car-container">';
                                echo '<div class="autozelle" onclick="loadgetCarIDphp('.$typeID.')">';

                                //checks if the information needed are given and then view them in the html construct
                                if (!empty($carVendor) && !empty($carName) || !empty($nameExtension)):
                                    echo '<div class="autozellenheader">' . $carVendor . " " . $carName . " " . $nameExtension . '</div>';
                                endif;

                            if (!empty($imagePath)) :
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

                            //head to the page getCarID.php prepare the information needed for the Produktdetailseite    
                            echo '<script>
                                    function loadgetCarIDphp(typeID) {
                                        $.ajax({
                                            type: "POST",
                                            url: "getCarID.php",
                                            data: { typeID: typeID}, // sends new final price to PHP
                                            success: function(response) {
                                               window.location.href = "InsertInProductDetail.php";
                                            },
                                        });
                                    }
                                </script>';
                        }
                        
                      //if no matching car is found by the query, the following message is viewed   
                    } else{
                            echo '<div id="notavailable">';
                            echo "Es tut uns Leid." . '<br>' . "Deinen  <i>Drive.</i>  scheint es grade nicht zu geben." . '<br>' . "Such doch gerne weiter:)";
                            echo '</div>';
                        } 
                    
                        echo '</div>';
                        echo '</td>'   

                    ?>            

            </tr>

        </table>

    </div>

    <br>

    <?php

//Loads the Pagination
if($totalPages > 1){

    // Shows Pagination links
    //head to page before
    echo '<div class="pagination">';
    if ($currentPage > 1) {
        echo '<a href="?page=' . ($currentPage - 1) . '">&laquo;</a> ';
    }

        for ($i = 1; $i <= $totalPages; $i++) {

            $selectedPage = ($i == $currentPage) ? 'current-page' : '';

        echo '<a href="?page=' . $i . '" class="' . $selectedPage . '">' . $i . '</a> ';
    }

    // head to page after
    if ($currentPage < $totalPages) {
        echo '<a href="?page=' . ($currentPage + 1) . '">&raquo;</a>';
    }

        echo '</div>';
    }

    ?>

    <script type="text/javascript">
        //Script for "Buchen" and "Unsere Angebote":
        // Add an event listener for when the DOM content is fully loaded
        document.addEventListener('DOMContentLoaded', function() {
            // Construct the new URL without query parameters
            var newurl = window.location.protocol + "//" + window.location.host + window.location.pathname;

            // Update the browser history using the history API
            window.history.pushState({
                path: newurl
            }, '', newurl);
        });
    </script>

    <br>
    <br>

</body>

<footer>

    <!--Include Footer-->
    <?php
    include('Footer.html');
    ?>

</footer>

</html>