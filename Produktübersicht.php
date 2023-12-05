<?php
session_start();

// Include the database connection file
include_once 'dbConfig.php';

// Check if the filter is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST["submit"])){ 
        // Save filter selections to the session
        $_SESSION['filter1'] = $_POST['filter1'];
        $_SESSION['filter2'] = $_POST['filter2'];
        $_SESSION['filter3'] = $_POST['filter3'];
        $_SESSION['filter4'] = $_POST['filter4'];
        $_SESSION['filter5'] = $_POST['filter5'];
        $_SESSION['filter6'] = $_POST['filter6'];
        $_SESSION['filter7'] = $_POST['filter7'];
        $_SESSION['filter8'] = $_POST['filter8'];
        $_SESSION['checkboxoverview1'] = isset($_POST['checkboxoverview1']) ? 1 : 0;
        $_SESSION['checkboxoverview2'] = isset($_POST['checkboxoverview2']) ? 1 : 0;
        $_SESSION['checkboxoverview3'] = isset($_POST['checkboxoverview3']) ? 1 : 0;

        // Redirect to prevent form resubmission on page refresh
        header("Location: {$_SERVER['PHP_SELF']}");
        exit;

}  elseif (isset($_POST["clear"])) {
        // Clear filter selections from the session
        $_SESSION['filter1'] = 'alle';
        $_SESSION['filter2'] = 'alle';
        $_SESSION['filter3'] = 'alle';
        $_SESSION['filter4'] = 'alle';
        $_SESSION['filter5'] = 'alle';
        $_SESSION['filter6'] = 'alle';
        $_SESSION['filter7'] = 'alle';
        $_SESSION['filter8'] = 'alle';
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
    'filter1' => ['alle', 'BMW', 'Mercedes-Benz', 'Audi', 'Volkswagen', 'Ford', 'Range Rover', 'Jaguar', 'Mercedes-AMG', 'Maserati', 'Opel', 'Skoda'],
    'filter2' => ['alle', '2', '4', '5', '7', '8', '9'],
    'filter3' => ['alle', '2', '3', '4', '5'],
    'filter4' => ['alle', 'manually', 'automatic'],
    'filter5' => ['alle', 'Cabrio', 'SUV', 'Limousine', 'Combi', 'Mehrsitzer', 'Coupé'],
    'filter6' => ['alle', 'Combuster', 'Electric'],
    'filter7' => ['alle', '100 €', '200 €', '300 €', '400 €', '500 €', 'ab 500 €'],
    'filter8' => ['alle', '18', '21', '25'],
];

//Initialize additional information variables 
$carVendor = "";
$carName = "";
$nameExtension = "";
$imagePath = "";
$carAvailability = "";
$carPricePerDay = "";

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
if(isset($_SESSION['filter1']) || isset($_SESSION['filter2']) || isset($_SESSION['filter3']) || isset($_SESSION['filter4']) || isset($_SESSION['filter5']) || isset($_SESSION['filter6']) || isset($_SESSION['filter7']) || isset($_SESSION['filter8']) || isset($_SESSION['checkboxoverview1']) || isset($_SESSION['checkboxoverview2']) || isset($_SESSION['checkboxoverview3'])) {
    
    try{
        //Dynamic SQL query based on the filters selected
        $sql = "SELECT vendor.vendorName, cartype.name, cartype.img, cartype.price, cartype.trunk, nameExtension 
                FROM vendor INNER JOIN cartype ON vendor.vendorID = cartype.vendorID WHERE 1 = 1"; 
                            

        if ($_SESSION['filter1'] != 'alle') {
            $sql .= " AND vendor.vendorName = :filter1";
        }

        if ($_SESSION['filter2'] != 'alle') {
            $sql .= " AND seats = :filter2";
        }

        if ($_SESSION['filter3'] != 'alle') {
            $sql .= " AND doors = :filter3";
        }

        if ($_SESSION['filter4'] != 'alle') {
            $sql .= " AND gear = :filter4";
        }

        if ($_SESSION['filter5'] != 'alle') {
            $sql .= " AND cartype.type = :filter5";
        }

        if ($_SESSION['filter6'] != 'alle') {
            $sql .= " AND drive = :filter6";
        }

        if ($_SESSION['filter7'] != 'alle') {
            $sql .= " AND price <= :filter7";
        }

        if ($_SESSION['filter8'] != 'alle') {
            $sql .= " AND minAge = :filter8";
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
        if ($_SESSION['filter1'] != 'alle') {
            $stmt->bindParam(':filter1', $_SESSION['filter1']);
        }

        if ($_SESSION['filter2'] != 'alle') {
            $stmt->bindParam(':filter2', $_SESSION['filter2']);
        }

        if ($_SESSION['filter3'] != 'alle') {
            $stmt->bindParam(':filter3', $_SESSION['filter3']);
        }

        if ($_SESSION['filter4'] != 'alle') {
            $stmt->bindParam(':filter4', $_SESSION['filter4']);
        }

        if ($_SESSION['filter5'] != 'alle') {
            $stmt->bindParam(':filter5', $_SESSION['filter5']);
        }

        if ($_SESSION['filter6'] != 'alle') {
            $stmt->bindParam(':filter6', $_SESSION['filter6']);
        }

        if ($_SESSION['filter7'] != 'alle') {
            $stmt->bindParam(':filter7', $_SESSION['filter7']);
        }

        if ($_SESSION['filter8'] != 'alle') {
            $stmt->bindParam(':filter8', $_SESSION['filter8']);
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
    include('Header.html');
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
</head>

<body>


<!--Overview of booking process-->
<div class="progress">
    <table style="background-color: #e9e9e9;">
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
                        document.getElementById('checkboxfilter1').selectedIndex = 0;
                        document.getElementById('checkboxfilter2').selectedIndex = 0;
                        document.getElementById('checkboxfilter3').selectedIndex = 0;
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
                        <label for="filter1" class="filterheader">Hersteller</label>
                        <select name="filter1" id="filterdropdown1">
                            <?php foreach ($filterOptions['filter1'] as $option): ?>
                                <option value="<?php echo $option; ?>" <?php echo ($_SESSION['filter1'] == $option) ? 'selected' : ''; ?>>
                                    <?php echo $option; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        
                        <button onclick="document.getElementById('filterdropdown1').selectedIndex = 0" class="resetFilter">Filter zurücksetzen</button>
                    </div>
                    <br>
                    
                    <!--seatfilter-->
                    <div style="margin-left: 20px;">
                        <label for="filter2" class="filterheader">Sitze</label>
                        <select name="filter2" id="filterdropdown2">
                            <?php foreach ($filterOptions['filter2'] as $option): ?>
                                <option value="<?php echo $option; ?>" <?php echo ($_SESSION['filter2'] == $option) ? 'selected' : ''; ?>>
                                    <?php echo $option; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        
                        <button onclick="document.getElementById('filterdropdown2').selectedIndex = 0" class="resetFilter">Filter zurücksetzen</button>
                    </div>
                    <br>

                    <!--doorfilter-->
                    <div style="margin-left: 20px;">
                        <label for="filter3" class="filterheader">Türen</label>
                        <select name="filter3" id="filterdropdown3">
                            <?php foreach ($filterOptions['filter3'] as $option): ?>
                                <option value="<?php echo $option; ?>" <?php echo ($_SESSION['filter3'] == $option) ? 'selected' : ''; ?>>
                                    <?php echo $option; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        
                        <button onclick="document.getElementById('filterdropdown3').selectedIndex = 0" class="resetFilter">Filter zurücksetzen</button>
                    </div>
                    <br>
                    
                    <!--gearsfilter-->
                    <div style="margin-left: 20px;">
                        <label for="filter4" class="filterheader">Getriebe</label>
                        <select name="filter4" id="filterdropdown4">
                            <?php foreach ($filterOptions['filter4'] as $option): ?>
                                <option value="<?php echo $option; ?>" <?php echo ($_SESSION['filter4'] == $option) ? 'selected' : ''; ?>>
                                    <?php echo $option; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        
                        <button onclick="document.getElementById('filterdropdown4').selectedIndex = 0" class="resetFilter">Filter zurücksetzen</button>
                    </div>
                    <br>
                    
                    <!--typfilter-->
                    <div style="margin-left: 20px;">
                        <label for="filter5" class="filterheader">Typ</label>
                        <select name="filter5" id="filterdropdown5">
                            <?php foreach ($filterOptions['filter5'] as $option): ?>
                                <option value="<?php echo $option; ?>" <?php echo ($_SESSION['filter5'] == $option) ? 'selected' : ''; ?>>
                                    <?php echo $option; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        
                        <button onclick="document.getElementById('filterdropdown5').selectedIndex = 0" class="resetFilter">Filter zurücksetzen</button>
                    </div>
                    <br>

                    <!--drivefilter-->  
                    <div style="margin-left: 20px;">
                        <label for="filter6" class="filterheader">Antrieb</label>
                        <select name="filter6" id="filterdropdown6">
                            <?php foreach ($filterOptions['filter6'] as $option): ?>
                                <option value="<?php echo $option; ?>" <?php echo ($_SESSION['filter6'] == $option) ? 'selected' : ''; ?>>
                                    <?php echo $option; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        
                        <button onclick="document.getElementById('filterdropdown6').selectedIndex = 0" class="resetFilter">Filter zurücksetzen</button>
                    </div>
                    <br>
                    
                    <!--pricefilter-->
                    <div style="margin-left: 20px;">
                        <label for="filter7" class="filterheader">Preis bis:</label>
                        <select name="filter7" id="filterdropdown7">
                            <?php foreach ($filterOptions['filter7'] as $option): ?>
                                <option value="<?php echo $option; ?>" <?php echo ($_SESSION['filter7'] == $option) ? 'selected' : ''; ?>>
                                    <?php echo $option; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        
                        <button onclick="document.getElementById('filterdropdown7').selectedIndex = 0" class="resetFilter">Filter zurücksetzen</button>
                    </div>
                    <br>
                    
                    <!--minagefilter-->
                    <div style="margin-left: 20px;">
                        <label for="filter8" class="filterheader">Mindestalter</label>
                        <select name="filter8" id="filterdropdown8">
                            <?php foreach ($filterOptions['filter8'] as $option): ?>
                                <option value="<?php echo $option; ?>" <?php echo ($_SESSION['filter8'] == $option) ? 'selected' : ''; ?>>
                                    <?php echo $option; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        
                        <button onclick="document.getElementById('filterdropdown8').selectedIndex = 0" class="resetFilter">Filter zurücksetzen</button>
                    </div>
                    <br><br>              
                            
                    <!--air conditioning-->
                    <div class="checkboxgeneral">
                        <label for="checkboxoverview1" id="checkboxfilter1">KLimaanlage</label>
                        <input type="checkbox" id="checkboxoverview1" name="checkboxoverview1" class="checkmarkcolumn" 
                            <?php if (isset($_SESSION['checkboxoverview1']) && $_SESSION['checkboxoverview1'] == '1') echo 'checked'; ?>>
                    </div>
                    <br>

                    <!--navigationssystem-->
                    <div class="checkboxgeneral">
                        <label for="checkboxoverview2" id="checkboxfilter2">Navigationssystem</label>
                        <input type="checkbox" id="checkboxoverview2" name="checkboxoverview2" class="checkmarkcolumn"
                            <?php if (isset($_SESSION['checkboxoverview2']) && $_SESSION['checkboxoverview2'] == '1') echo 'checked'; ?>>
                    </div>
                    <br>

                    <!--offer-->
                    <div class="checkboxgeneral">
                        <label for="checkboxoverview3" id="checkboxfilter3">Im Angebot</label>
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
            echo '<div class="car-container">';
            // If there's a matching record, fetch and set additional information
            if ($stmt->rowCount() > 0) {
                while($row = $stmt->fetch()){
                $carVendor = $row['vendorName'];
                $carName = $row['name'];
                $nameExtension = $row['nameExtension'];
                $imagePath = $row['img'];
                $carAvailability = $row['trunk'];
                $carPricePerDay = $row['price'];
                    
                echo '<div class="car-container">';
                    //Html Output for each row
                    echo '<div class="autozelle">';
                        if (!empty($carVendor) && !empty($carName) || !empty($nameExtension)):
                            echo '<div class="autozellenheader">' . $carVendor . " " . $carName . " " . $nameExtension . '</div>';
                        endif;
                    
                        
                        if (!empty($imagePath)): 
                            echo '<div class="zellenimage1"><img src="data:image/jpg;charset=utf8;base64,' . base64_encode($imagePath) . '" alt="Car Image" class="zellenimage"></div>';
                        endif; 

                        
                        if (!empty($carAvailability) && !empty($carPricePerDay)):
                            echo '<div class="zellenfooter">';
                                echo '<div class="zellenfooter1">' . "Verfügbar: " . $carAvailability . '</div>';
                                echo '<div class="zellenfooter2">' . $carPricePerDay . " € pro Tag" . '</div>';
                            echo '</div>';
                        endif; 
                    echo '</div>';
                echo '</div>';        
                }  

                }else{
                    echo '<div style="font-size: 40px;">';
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