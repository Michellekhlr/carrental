<?php
session_start();

//initializise variables
$location = "";
$startDate = "";
$endDate = "";

if(isset($_POST)) {
    $location = $_POST['Stadt'];
    $startDate = $_POST['from'];
    $endDate = $_POST['to'];

    $_SESSION['location'] = $location;
    $_SESSION['startDate'] = $startDate;
    $_SESSION['endDate'] = $endDate;
}
header('Location:Produktübersicht.php');