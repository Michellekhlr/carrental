<?php 
session_start();

include_once 'dbConfig.php';

$typeID = $_REQUEST['typeID'];
$_SESSION['typeID'] = $typeID;
$location = $_SESSION['location'];

$carID = "";

if (isset($typeID) && isset($location)) {

//filter carlocation with location for all cars at that location from that type
$stmt = $conn->prepare("SELECT carlocation.carID FROM carlocation 
                        INNER JOIN location ON carlocation.locationID = location.locationID 
                        WHERE location.locationName = :location
                        AND carlocation.typeID =:typeID LIMIT 1");
                        $stmt->bindParam(':location', $location);
                        $stmt->bindParam(':typeID', $typeID);
                        $stmt->execute();

                        $carIDCarlocation = $stmt->fetchColumn();

$stmt = $conn->prepare("SELECT COUNT(*) FROM `order`
                        WHERE `order`.carID = :carIDCarlocation
                        AND `order`.startDate <= :endDate 
                        AND `order`.endDate >= :startDate");
                        $stmt->bindParam(':carIDCarlocation', $carIDCarlocation);
                        $stmt->bindParam(':startDate', $startDate);
                        $stmt->bindParam(':endDate', $endDate);
                        $stmt->execute();

                        $count = $stmt->fetchColumn();


    if ($count <> 0) {
        $carIDexists = true;
        while($carIDexists) {
            $stmt = $conn->prepare("SELECT carlocation.carID FROM carlocation 
                        INNER JOIN location ON carlocation.locationID = location.locationID 
                        WHERE location.locationName = :location
                        AND carlocation.typeID =:typeID 
                        AND carlocation.carID <> :carIDCarlocation LIMIT 1");
                        $stmt->bindParam(':location', $location);
                        $stmt->bindParam(':typeID', $typeID);
                        $stmt->bindParam(':carIDCarlocation', $carIDCarlocation);
                        $stmt->execute();

                        $carIDCarlocation = $stmt->fetchAll(PDO::FETCH_COLUMN);

                        $stmt = $conn->prepare("SELECT COUNT (*) from `order`
                        WHERE `order`.carID = :carIDCarlocation
                        AND `order`.startDate <= :endDate 
                        AND `order`.endDate >= :startDate");
                        $stmt->bindParam(':carIDCarlocation', $carIDCarlocation);
                        $stmt->bindParam(':startDate', $startDate);
                        $stmt->bindParam(':endDate', $endDate);
                        $stmt->execute();

                        $count = $stmt->fetchColumn();

                        if ($count <> 0) {
                            $carIDexists = true;
                        }
                        else {
                            $carIDexists = false;
                            exit();
                        }
            }
        }
        $carID = $carIDCarlocation;
        $_SESSION['carID'] = $carIDCarlocation;

    // $resultOrders = $stmt->fetchAll(PDO::FETCH_COLUMN);


    // $stmt = $conn->query("SELECT carID 
    //                     FROM carlocation INNER JOIN location ON carlocation.locationID = location.locationID 
    //                     WHERE typeID = :typeID AND location.locationName =:location");

    // $stmt->bindParam(':typeID', $typeID);
    // $stmt->bindParam(':location', $location);

    // $stmt->execute();

    // $resultCarLocation = $stmt->fetchAll(PDO::FETCH_COLUMN);

    // $uniqueValues = findUniqueValues($resultOrders, $resultCarLocation);
 
    // // random value from arry
    // $carID = $uniqueValues[array_rand($uniqueValues, 1)];

    

    // function findUniqueValues($resultOrders, $resultCarLocation) {
    //     $onlyInResultCarLocation = array_diff($resultCarLocation, $resultOrders);
     
    //     return $onlyInResultCarLocation;
    // }
}

// header("Location: InsertInProductDetail.php");
exit();

?>
