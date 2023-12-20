<?php

// Start session if not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Include the database configuration file
include_once "dbConfig.php";

// Check if the 'book' button was clicked
if (isset($_POST['book'])) {
    // Retrieve booking details from session
    $userID = $_SESSION['userID'];
    $carID = $_SESSION['carID'];
    $startDate = $_SESSION['startDate'];
    $endDate = $_SESSION['endDate'];
    $finalPrice = $_SESSION['finalPrice'];

    // Construct the extras string from session values  
    $extrasArray = [];
    if (isset($_SESSION['insuranceValue']) && $_SESSION['insuranceValue'] != '') {
        $extrasArray[] = $_SESSION['insuranceValue'];
    }
    if (isset($_SESSION['extrasValue1']) && $_SESSION['extrasValue1'] != '') {
        $extrasArray[] = $_SESSION['extrasValue1'];
    }
    if (isset($_SESSION['extrasValue2']) && $_SESSION['extrasValue2'] != '') {
        $extrasArray[] = $_SESSION['extrasValue2'];
    }
    if (isset($_SESSION['extrasValue3']) && $_SESSION['extrasValue3'] != '') {
        $extrasArray[] = $_SESSION['extrasValue3'];
    }
    $extrasDummy = implode(', ', $extrasArray);


    // Determine the next order ID
    $orderIDQuery = $conn->query("SELECT MAX(orderID) AS maxID FROM `order`");
    $row = $orderIDQuery->fetch(PDO::FETCH_ASSOC);
    $nextOrderID = $row['maxID'] + 1;

    // Insert booking details into the database
    $stmt = $conn->prepare("INSERT INTO `order` (orderID, carID, userID, startDate, endDate, extras, overallPrice, orderDateTime) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bindParam(1, $nextOrderID);
    $stmt->bindParam(2, $carID);
    $stmt->bindParam(3, $userID);
    $stmt->bindParam(4, $startDate);
    $stmt->bindParam(5, $endDate);
    $stmt->bindParam(6, $extrasDummy);
    $stmt->bindParam(7, $finalPrice);
    $stmt->bindParam(8, date("Y-m-d H:i:s"));
    $stmt->execute();

    // Redirect to the orders page
    header("Location: Buchungsbestätigung.php");
    exit();
}

?>
