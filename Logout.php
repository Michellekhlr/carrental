<?php
session_start();

if (isset($_SESSION['loginStatus'])) {
    unset($_SESSION['loginStatus']);
}

header("Location:LogoutPage.php");
exit();
?>