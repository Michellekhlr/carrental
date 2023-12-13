<?php
// debug info:
// ini_set('display_errors', 1);
// error_reporting(E_ALL);

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Include the database configuration file
include_once "dbConfig.php";

// Wenn der Button geklickt wurde
if (isset($_POST['book'])) {
    // Daten aus der Session holen
    $userID = $_SESSION['userID'];
    $carID = $_SESSION['carID'];
    $startDate = $_SESSION['startdate'];
    $endDate = $_SESSION['enddate'];
    $finalPrice = $_SESSION['finalPrice'];

    $extrasDummy = "";

    // Ermitteln der nächsten orderID
    $orderIDQuery = $conn->query("SELECT MAX(orderID) AS maxID FROM `order`");
    $row = $orderIDQuery->fetch(PDO::FETCH_ASSOC);
    $nextOrderID = $row['maxID'] + 1;

    // Einfügen der Daten in die Datenbank
    $stmt = $conn->prepare("INSERT INTO `order` (orderID, carID, userID, startDate, endDate, extras, overallPrice) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bindParam(1, $nextOrderID);
    $stmt->bindParam(2, $carID);
    $stmt->bindParam(3, $userID);
    $stmt->bindParam(4, $startDate);
    $stmt->bindParam(5, $endDate);
    $stmt->bindParam(6, $extrasDummy);
    $stmt->bindParam(7, $finalPrice);
    $stmt->execute();

    // Weiterleitung zur Seite ordersPage.php
    header("Location: ordersPage.php");
    exit();
}

?>
