<!-- destroy session if user logs out -->
<?php
session_start();

if (session_status() === PHP_SESSION_ACTIVE) {
    // Zerstöre die Session
    session_destroy();
}

header("Location:LogoutPage.php");
exit();
?>