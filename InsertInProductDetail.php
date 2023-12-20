<!-- open Produktdetailseite.php and fill values from car -->
<?php
// starting the session
session_start();

//initializing variables
$carID = "";
$typeID = "";
$img = "";
$vendorName = "";
$availability = "";
$name = "";
$type="";
$drive = "";
$seats = "";
$doors = "";
$gear = "";
$minAge = "";
$airCondition = "";
$gps = "";
$price = "";

//get variables from sessions
$carID = $_SESSION['carID'];
$location = $_SESSION['location'];
$startDate = $_SESSION['startDate'];
$endDate = $_SESSION['endDate'];

include_once "dbConfig.php";

//errors if conditions are not filled in 
if($location === "alle") {
    echo 'Bitte wähle einen Standort und bestätige mit "anwenden"';
    exit();
}
if($startDate === "Abholung") {
    echo 'Bitte wähle ein Startdatum und bestätige mit "anwenden"';
    exit();
}
if($endDate === "Rückgabe") {
    echo 'Bitte wähle ein Enddatum und bestätige mit "anwenden"';
    exit();
}

if(isset($carID)) {
    //get TypeId from carID
    $stmt = $conn->prepare("SELECT carlocation.typeID FROM carlocation WHERE carID=:carID");
    $stmt->bindParam(':carID',$carID);
    $stmt->execute();
    $typeID = $stmt->fetchColumn();

    //count car availability
    $stmt = $conn->prepare("SELECT COUNT(*)
                FROM carlocation 
                INNER JOIN cartype ON carlocation.typeID = cartype.typeID
                INNER JOIN location ON location.locationID = carlocation.locationID
                WHERE cartype.typeID = :typeID AND location.locationName = :location
                AND carlocation.carID NOT IN (SELECT `order`.carID FROM `order` WHERE `order`.startDate <= :endDate AND `order`.endDate >= :startDate)");
                $stmt->bindParam(':startDate', $startDate);
                $stmt->bindParam(':endDate', $endDate);
                $stmt->bindParam(':typeID', $typeID);
                $stmt->bindParam(':location', $location);
                $stmt->execute();
                $availability = $stmt->fetchColumn();
    
    //get field values from cartype
    $stmt = $conn->prepare("SELECT * FROM cartype WHERE typeID=:typeID");
    $stmt->bindParam(':typeID', $typeID);
    $stmt->execute();
    
    //fill variables with values
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($row) {
        $img = $row["img"];
        $name = $row["name"];
        $type = $row["type"];
        $drive = $row["drive"];
        $seats = $row["seats"];
        $doors = $row["doors"];
        $gear = $row["gear"];
        $minAge = $row["minAge"];
        $airCondition = $row["airCondition"];
        $gps = $row["gps"];
        $price = $row["price"];

    //get vendorName from vendor
    $stmt = $conn->prepare("SELECT vendorName 
        FROM vendor 
        INNER JOIN cartype ON vendor.vendorID = cartype.vendorID
        WHERE cartype.typeID=:typeID");
    
        $stmt->bindParam(':typeID', $typeID);
        $stmt->execute();

        $vendorName = $stmt->fetchColumn();

    //insert in sessions
    $_SESSION['img']=$img;
    $_SESSION['name']=$name;
    $_SESSION['vendor']=$vendorName;
    $_SESSION['availability']=$availability;
    $_SESSION['type']=$type;
    $_SESSION['drive']=$drive;
    $_SESSION['seats']=$seats;
    $_SESSION['doors']=$doors;
    $_SESSION['gear']=$gear;
    $_SESSION['minAge']=$minAge;
    $_SESSION['airCondition']=$airCondition;
    $_SESSION['gps']=$gps;
    $_SESSION['price']=$price;
    $_SESSION['carID']=$carID;

    //direct after sucessful insertion
    header("Location: Produktdetailseite.php"); 
    exit();
    }
}
?>