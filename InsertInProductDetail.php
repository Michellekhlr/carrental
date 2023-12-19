<?php

// starting the session
session_start();
//initializing variables
$carID = "";
$typeID = "";
$img = "";
$vendorName = "";
$availabilityWODate = ""; //without date
$orderedCars = ""; //not available cars
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

$carID = $_SESSION['carID'];
$location = $_SESSION['location'];
$startDate = $_SESSION['startDate'];
$endDate = $_SESSION['endDate'];

include_once "dbConfig.php";

if($carID) {
    //get TypeId from carID
    $stmt = $conn->prepare("SELECT carlocation.typeID FROM carlocation WHERE carID=:carID");
    $stmt->bindParam(':carID',$carID);
    $stmt->execute();
    $typeID = $stmt->fetchColumn();

    //filter all cars of location without date parameter
    $stmt = $conn->prepare("SELECT COUNT(*) FROM carlocation INNER JOIN location ON location.locationID = carlocation.locationID WHERE typeID=:typeID AND location.locationName=:location");
    $stmt->bindParam(':typeID',$typeID);
    $stmt->bindParam(':location',$location);
    $stmt->execute();
    $availabilityWODate = $stmt->fetchColumn();

    //filter cars in orders

    //in der carlocation auf typ und standort filtern, dann diese ids in der oders mit start und ende datum filtern
    $stmt = $conn->prepare("SELECT COUNT(*) FROM `order` 
    INNER JOIN carlocation ON `order`.carID = carlocation.carID 
    INNER JOIN location ON `order`.locationID = location.locationID
    WHERE carlocation.typeID = :typeID 
    AND location.locationName = :location
    AND `order`.startDate <= :endDate 
    AND `order`.endDate >= :startDate");
    $stmt->bindParam(':typeID', $typeID);
    $stmt->bindParam(':location', $location);
    $stmt->bindParam(':startDate', $startDate);
    $stmt->bindParam(':endDate', $endDate);
    $stmt->execute();
    $orderedCars = $stmt->fetchColumn();

    //calculate available cars
    $availability = $availabilityWODate - $orderedCars;
    
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

    header("Location: Produktdetailseite.php"); //direct after sucessful insertion
    exit();
    }
}
?>