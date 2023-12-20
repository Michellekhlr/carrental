<!-- get random car ID for Produktdetailseite.php  -->
<?php 
session_start();

include_once 'dbConfig.php';

$typeID = $_REQUEST['typeID'];
$_SESSION['typeID'] = $typeID;
$location = $_SESSION['location'];
$startDate = $_SESSION['startDate'];
$endDate = $_SESSION['endDate'];

$carIDCarlocation = "";

if (isset($typeID) && isset($location)) {

    //filter carlocation with location for all cars from that type and get random Car ID
    $stmt = $conn->prepare("SELECT carlocation.carID FROM carlocation 
                            INNER JOIN location ON carlocation.locationID = location.locationID 
                            WHERE location.locationName = :location
                            AND carlocation.typeID =:typeID LIMIT 1");
                            $stmt->bindParam(':location', $location);
                            $stmt->bindParam(':typeID', $typeID);
                            $stmt->execute();

                            $carIDCarlocation = $stmt->fetchColumn();

    //check if this car is in orders
    $stmt = $conn->prepare("SELECT COUNT(*) FROM `order`
                            WHERE `order`.carID = :carIDCarlocation
                            AND `order`.startDate <= :endDate 
                            AND `order`.endDate >= :startDate");
                            $stmt->bindParam(':carIDCarlocation', $carIDCarlocation);
                            $stmt->bindParam(':startDate', $startDate);
                            $stmt->bindParam(':endDate', $endDate);
                            $stmt->execute();

                            $count = $stmt->fetchColumn();

    //if car is in orders filter that car ID from carlocation cars and check in orders again until one is found, which is not in orders
    if ($count <> 0) {
        $carIDexists = true;
        while($carIDexists) {
            $stmt = $conn->prepare("SELECT carlocation.carID FROM carlocation 
                        INNER JOIN location ON carlocation.locationID = location.locationID 
                        WHERE location.locationName = :location
                        AND carlocation.typeID =:typeID 
                        AND NOT carlocation.carID = :carIDCarlocation LIMIT 1");
                        $stmt->bindParam(':location', $location);
                        $stmt->bindParam(':typeID', $typeID);
                        $stmt->bindParam(':carIDCarlocation', $carIDCarlocation);
                        $stmt->execute();

                        $carIDCarlocation = $stmt->fetchColumn();

                        $stmt = $conn->prepare("SELECT COUNT(*) from `order`
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
                            //safe carID to session
                            $_SESSION['carID'] = $carIDCarlocation;
                            exit();
                        }
            }
        }
}
$_SESSION['carID'] = $carIDCarlocation;
exit();

?>
