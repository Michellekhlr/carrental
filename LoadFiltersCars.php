<?php
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

        // Redirect to prevent filter resubmission on page refresh
        header("Location: {$_SERVER['PHP_SELF']}");
        exit;
    } 
}   

// Set filter options
$filterOptions = [
    'filter1' => ['alle', 'BMW', 'Mercedes-Benz', 'Audi', 'Volkswagen', 'Ford', 'Range-Rover', 'Jaguar', 'Mercedes-AMG', 'Maserati', 'Opel', 'Skoda'],
    'filter2' => ['alle', '2', '4', '5', '7', '8', '9'],
    'filter3' => ['alle', '2', '3', '4', '5'],
    'filter4' => ['alle', 'Schaltung', 'Automatik'],
    'filter5' => ['alle', 'Cabrio', 'SUV', 'Limousine', 'Combi', 'Mehrsitzer', 'Coupé'],
    'filter6' => ['alle', 'Verbrenner', 'Elektro'],
    'filter7' => ['alle', '100 €', '200 €', '300 €', '400 €', '500 €', 'ab 500 €'],
    'filter8' => ['alle', '18', '21', '25'],
];

//Initialize additional information variables 
$carVendor = "";
$carName = "";
$imagePath = "";
$carAvailability = "";
$carPricePerDay = "";

//Check if values are set in the filters
if(isset($_SESSION['filter1']) || isset($_SESSION['filter2']) || isset($_SESSION['filter3']) || isset($_SESSION['filter4']) || isset($_SESSION['filter5']) || isset($_SESSION['filter6']) || isset($_SESSION['filter7']) || isset($_SESSION['filter8'])){
    
    try{
        //Dynamic SQL query based on the filters selected
        $sql = "SELECT vendor.name, cartype.name, cartype.img, cartype.price, cartype.trunk FROM cartype, carlocation WHERE 1";

        if ($_SESSION['filter1'] != 'alle') {
            $sql .= " AND filter1 = :filter1";
        }

        if ($_SESSION['filter2'] != 'alle') {
            $sql .= " AND filter2 = :filter2";
        }

        if ($_SESSION['filter3'] != 'alle') {
            $sql .= " AND filter3 = :filter3";
        }

        if ($_SESSION['filter4'] != 'alle') {
            $sql .= " AND filter4 = :filter4";
        }

        if ($_SESSION['filter5'] != 'alle') {
            $sql .= " AND filter5 = :filter5";
        }

        if ($_SESSION['filter6'] != 'alle') {
            $sql .= " AND filter6 = :filter6";
        }

        if ($_SESSION['filter7'] != 'alle') {
            $sql .= " AND filter7 = :filter7";
        }

        if ($_SESSION['filter8'] != 'alle') {
            $sql .= " AND filter8 = :filter8";
        }

        $sql .= "LIMIT 1";

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
  
        // If there's a matching record, fetch and set additional information
        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $carVendor = $row['vendor.name'];
            $carName = $row['cartype.name'];
            $imagePath = $row['cartype.img'];
            $carAvailability = $row['cartype.trunk'];
            $carPricePerDay = $row['cartype.price'];
        }
    } catch (PDOException $e){
        echo "Error: " . $e->getMessage();
    }
}
?>