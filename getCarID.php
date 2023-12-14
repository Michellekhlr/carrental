<?php 
session_start();

include_once 'dbConfig.php';

$typeID = $_SESSION['typeID'];

$carID = "";

try{
    $stmt = $conn->query("SELECT carID FROM carlocation WHERE typeID = :typeID AND available = 0 ORDER BY RAND() LIMIT 1");

    $stmt->bindParam(':typeID', $typeID);

    $stmt->execute();

    while($row = $stmt->fetch()){

        $carID = $row['carID'];

        
    }

    $_SESSION['carID'] = $carID;

} catch (PDOException $e){
    echo "Error: " . $e->getMessage();
}

header("Location: Produktdetailseite.php")

?>