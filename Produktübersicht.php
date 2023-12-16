<?php
session_start();

// Include the database connection file
include_once 'dbConfig.php';

// Check if the filter is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {


    if (!isset($_POST["clear"])) {
        // Save filter selections to the session
        $_SESSION['OrderByPrice'] = $_POST['OrderByPrice'] ?? "Preis Aufsteigend";
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
    } elseif (isset($_POST["clear"])) {
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


// check and handle 'buchen' Query-Parameter, deactivate all filters and checkboxes
if (isset($_GET['buchen'])) {
    $_SESSION['checkboxoverview3'] = '0'; // Deactivate Checkbox (offer)
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
}


// // check and handle 'angebot' Query-Parameter, deactivate all filters and checkboxes despite "Im Angebot"
if (isset($_GET['angebot'])) {
    $_SESSION['checkboxoverview3'] = '1'; // Activate Checkbox (offer)
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
}


// Set filter options
$filterOptions = [
    'Stadt' => ['alle', 'Hamburg', 'Berlin', 'München', 'Bielefeld', 'Bochum', 'Dortmund', 'Bremen', 'Dresden', 'Freiburg', 'Köln', 'Leipzig', 'Nürnberg','Paderborn','Rostock'],
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

$startDateRent = '2023-08-19';
$endDateRent = '2023-09-19';

//Check if values are set in the filters
if(isset($_SESSION['OrderByPrice']) || isset($_SESSION['Stadt']) || isset($_SESSION['Hersteller']) || isset($_SESSION['Sitzanzahl']) || isset($_SESSION['Türenanzahl']) || isset($_SESSION['Getriebe']) || isset($_SESSION['Kategorie']) || isset($_SESSION['Antrieb']) || isset($_SESSION['Preis']) || isset($_SESSION['Mindestalter']) || isset($_SESSION['checkboxoverview1']) || isset($_SESSION['checkboxoverview2']) || isset($_SESSION['checkboxoverview3'])) {
    
    try{
        //Dynamic SQL query based on the filters selected
        $sql = "SELECT vendor.vendorName, cartype.name, cartype.img, cartype.price, nameExtension, carID, cartype.typeID
                FROM vendor 
                INNER JOIN cartype ON vendor.vendorID = cartype.vendorID 
                INNER JOIN carlocation ON carlocation.typeID = cartype.typeID
                INNER JOIN location ON location.locationID = carlocation.locationID
                WHERE 1 = 1"; //Todos: auf 1 umstellen, Hier availability prüfen, 


        if ($_SESSION['Stadt'] != 'alle') {
            $sql .= " AND location.locationName = :Stadt"; //todo: nach locationID
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

        if ($_SESSION['OrderByPrice'] == 'Preis Absteigend') {
            $sql .= " ORDER BY cartype.price DESC";
        } elseif ($_SESSION['OrderByPrice'] == 'Preis Aufsteigend') {
            $sql .= " ORDER BY cartype.price ASC";
        }

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

        // echo $sql;

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

?>

<!DOCTYPE html>

<head>
    <title>Produktübersicht - Drive.</title><link rel="icon" type="image/png" href="bilder/Drive.png">
    <!--Sprachenimport von Google Fonts-->
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


    <!--Include Header-->
    <!-- <div class = "band" style = "text-align: left; background-color:  black; color: white; margin-top: 0px;"><h3><i>Angebot des Tages: 5er BMW für 139 Kartoffeln</i></h3></div>  -->
    <?php
    include('Header.php');
    ?>
    
    <br>

    <!--Processbar dynmaic settings-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function(){
            $("#progress1").fadeTo(0.6);
            $("#progress2").fadeTo(0.4);
            $("#progress3").fadeTo("slow", 0.2);
        });
    </script>

</head>

<body>

  <?php
  include('progressbar.php');
  ?>

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

                    </div>
                    
                    <br>                
                

                    <!--Filtercolumn-->                   
                    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    
                        <div style="display: flex; justify-content: center;">

                            <select id="sortby" name="OrderByPrice">

                                <?php foreach ($filterOptions['OrderByPrice'] as $option): ?>
                                    <option value="<?php echo $option; ?>" <?php echo ($_SESSION['OrderByPrice'] == $option) ? 'selected' : ''; ?>>
                                        <?php echo $option; ?>
                                    </option>
                                <?php endforeach; ?>

                            </select>

                        </div>
                    
                        <br>                
                    
                        <!--delete, execute button-->
                        <div style="display: flex; justify-content: center;">

                            <input type="submit" name="clear" value="Löschen" class="buttonproduktübersicht1">

                            <input type="submit" id="submit-button" name="submit" value="Anwenden" class="buttonproduktübersicht2" onclick="applyFilter()">

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

                        </div>

                        <br>
                        <br>
                        <br>              
                                
                        <!--air conditioning-->
                        <div class="checkboxgeneral">

                            <label for="checkboxoverview1" id="checkboxHersteller"><p>KLimaanlage</p></label>

                            <input type="checkbox" id="checkboxoverview1" name="checkboxoverview1" class="checkmarkcolumn" 
                                <?php if (isset($_SESSION['checkboxoverview1']) && $_SESSION['checkboxoverview1'] == '1') echo 'checked'; ?>>
                    
                        </div>

                        <br>

                        <!--navigationssystem-->
                        <div class="checkboxgeneral">

                            <label for="checkboxoverview2" id="checkboxSitzanzahl"><p>Navigationssystem</p></label>

                            <input type="checkbox" id="checkboxoverview2" name="checkboxoverview2" class="checkmarkcolumn"
                                <?php if (isset($_SESSION['checkboxoverview2']) && $_SESSION['checkboxoverview2'] == '1') echo 'checked'; ?>>

                        </div>

                        <br>

                        <!--offer-->
                        <div class="checkboxgeneral">

                            <label for="checkboxoverview3" id="checkboxTürenanzahl"><p>Im Angebot</p></label>

                            <input type="checkbox" id="checkboxoverview3" name="checkboxoverview3" class="checkmarkcolumn"
                                <?php if (isset($_SESSION['checkboxoverview3']) && $_SESSION['checkboxoverview3'] == '1') echo 'checked'; ?>>

                        </div>

                        <br>

                    </form>

                </div>
                
                <br> 

            </td>
  
            <td style="display: flex; flex-wrap: wrap;">

                <?php

                    //$selectedlocation = $_SESSION['filter0'];

                    echo '<div class="car-container">';

                    // If there's a matching record, fetch and set additional information
                    if ($stmt->rowCount() > 0) {

                        $counter = 1;
                        $resultArray = array();

                        while($row = $stmt->fetch()){

                            $carVendor = $row['vendorName'];
                            $carName = $row['name'];
                            $nameExtension = $row['nameExtension'];
                            $imagePath = $row['img'];                
                            $carPricePerDay = $row['price']; 
                            $typeID = $row['typeID'];

                                if(key_exists($typeID, $resultArray)){

                                    $resultArray[$typeID]["counter"] = $resultArray[$typeID]["counter"] + 1;                        

                                } else{
                                    $resultArray[$typeID] = array("typeID"=>$typeID, "counter"=>$counter, "carVendor"=>$carVendor, 
                                                                "carName"=>$carName, "nameExtension"=>$nameExtension, 
                                                                "imagePath"=>$imagePath, "carPricePerDay"=>$carPricePerDay);
                                }                
                        
                    }                    

                    // Pagination
                    $carsPerPage = 12;     
                    $countCars = count($resultArray);
                    $totalPages = ceil($countCars / $carsPerPage);
                    $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;

                    // Bestimmen auf welcher Seite sich der Benutzer befindet
                    if (!isset($_GET['page'])) {
                        $currentPage = 1;
                    } else {
                        $currentPage = $_GET['page'];
                    }

                    // Berechnen des Offsets für die aktuelle Seite
                    $offset = ($currentPage - 1) * $carsPerPage;

                        // Schleife, um nur die Autos für die aktuelle Seite anzuzeigen
                        echo '<td style="display: flex; flex-wrap: wrap;">';
                        echo '<div class="car-container">';

                        $resultArray = array_values($resultArray);  

                        // foreach($resultArray as $carDetails){
                        for ($i = $offset; $i < min($offset + $carsPerPage, $countCars); $i++) {
                            $carDetails = $resultArray[$i];

                            $carAvailability = $carDetails['counter'];
                            $carVendor = $carDetails['carVendor'];
                            $carName = $carDetails['carName'];
                            $nameExtension = $carDetails['nameExtension'];
                            $imagePath = $carDetails['imagePath'];
                            $carPricePerDay = $carDetails['carPricePerDay'];
                            $typeID = $carDetails['typeID'];

                            $_SESSION['typeID'] = $typeID;
                            

                            echo '<div class="car-container">';
                                echo '<div class="autozelle" onclick="loadgetCarIDphp()">';
                                // echo'<a href="getCarID.php" style="text-decoration: none;">';
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
                                // echo'</a>';
                                echo '</div>';
                            echo '</div>';

                            echo '<script>
                                    function loadgetCarIDphp() {
                                        //Lade die externe Datei mit AJAX (jQuery)
                                        $.get("getCarID.php", function(data) {
                                            // Führe den geladenen Code aus
                                            var script = document.createElement("script");
                                            script.textContent = data;
                                            document.body.appendChild(script);

                                            // Navigiere zu einer neuen Seite
                                            window.location.href = "getCarID.php";
                                        });
                                    }
                                </script>';               
                            
                        }
                
                    } else{
                            echo '<div id="notavailable" style="font-size: 40px; line-height: 1.5;">';
                            echo "Es tut uns Leid." . '<br>' . "Deinen  <i>Drive.</i>  scheint es grade nicht zu geben." . '<br>' . "Such doch gerne weiter:)";
                            echo '</div>';
                        } 
                    
                        echo '</div>';
                        echo '</td>'   
                        
                        // echo $_SESSION['Stadt'] . "<br>" .$sql;
                    ?>            

        </tr>    
    
    </table>

</div>

<br>

<?php

if($totalPages > 1){

    // Pagination-Links anzeigen
    echo '<div class="pagination">';
    if ($currentPage > 1) {
        echo '<a href="?page=' . ($currentPage - 1) . '">&laquo;</a> ';
    }

    for ($i = 1; $i <= $totalPages; $i++) {

        $selectedPage = ($i == $currentPage) ? 'current-page' : '';

        echo '<a href="?page=' . $i . '" class="' . $selectedPage . '">' . $i . '</a> ';
        // echo '<a href="?page=' . $i . '">' . $currentPage . '</a> ';
    }

    // Nächster Pfeil
    if ($currentPage < $totalPages) {
        echo '<a href="?page=' . ($currentPage + 1) . '">&raquo;</a>';
    }

    echo '</div>';
}

?>

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