<?php 
session_start();

include_once 'dbConfig.php';

$typeID = $_SESSION['typeID'];
$location = $_SESSION['location'];

$carID = "";

try{

$stmt = $conn->prepare("SELECT cardID FROM `order` 
    INNER JOIN carlocation ON `order`.carID = carlocation.carID 
    INNER JOIN location ON location.locationID = `order`.locationID
    WHERE carlocation.typeID = :typeID 
    AND location.locationName = :location
    AND `order`.startDate <= :endDate 
    AND `order`.endDate >= :startDate");
    $stmt->bindParam(':typeID', $typeID);
    $stmt->bindParam(':location', $location);
    $stmt->bindParam(':startDate', $startDate);
    $stmt->bindParam(':endDate', $endDate);
    $stmt->execute();
    
    $resultOrders = $stmt->fetchAll(PDO::FETCH_COLUMN);


    $stmt = $conn->query("SELECT carID 
                        FROM carlocation INNER JOIN location ON carlocation.locationID = location.locationID 
                        WHERE typeID = :typeID AND location.locationName =:location");

    $stmt->bindParam(':typeID', $typeID);
    $stmt->bindParam(':location', $location);

    $stmt->execute();

    $resultCarLocation = $stmt->fetchAll(PDO::FETCH_COLUMN);

    $uniqueValues = findUniqueValues($resultOrders, $resultCarLocation);
 
    // random value from arry
    $carID = $uniqueValues[array_rand($uniqueValues, 1)];

    $_SESSION['carID'] = $carID;

    function findUniqueValues($resultOrders, $resultCarLocation) {
        $onlyInResultCarLocation = array_diff($resultCarLocation, $resultOrders);
     
        return $onlyInResultCarLocation;
    }

} catch (PDOException $e){
    echo "Error: " . $e->getMessage();
}

header("Location: InsertInProductDetail.php");
exit();

?>
