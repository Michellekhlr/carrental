<?php
session_start();

if (isset($_POST['location'])) {
    $_SESSION['location'] = $_POST['location'];
}
if (isset($_POST['startDate'])) {
    $_SESSION['startDate'] = $_POST['startDate'];
}
if (isset($_POST['endDate'])) {
    $_SESSION['endDate'] = $_POST['endDate'];
}
?>