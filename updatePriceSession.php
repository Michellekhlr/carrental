<?php
session_start();

if (isset($_POST['finalPrice'])) {
    $_SESSION['finalPrice'] = $_POST['finalPrice'];
}
?>
