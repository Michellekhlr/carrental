<?php
session_start();

// decode JSON-String from Produktdetailseite.php and safe it to session variables
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);

    $_SESSION['insurance'] = $data['insurance'];
    $_SESSION['extras'] = $data['extras'];
}
?>