<!DOCTYPE html>
<head>
    <!--Sprachenimport von Google Fonts-->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Titillium+Web:wght@400;700&display=swap');
    </style>

    <!--Iconimport von Google-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <!--Styleimport von CSS Datei-->
    <link rel="stylesheet" href = "CSSMain.css">

    <!--Header--> 
    <div class= "header">
        <h1><a href="Homepage.php" class = "logo"><i>Drive.</i></a></h1>
    <p class = "booknow">Book now!</p>
    <h2 class = "navigator">Buchen</h2>
    <h2 class = "navigator">Unsere Angebote</h2>
    <a href="orders.php"><h2 class = "navigator">Buchungen verwalten</h2></a>
    <h2 class = "navigator">Über uns</h2>

    <!-- if user is logged in show logout button -->
    <?php if (isset($_SESSION['loginStatus']) && $_SESSION['loginStatus'] == true) : ?>
    <button class="button1" onclick="logout()">Logout</button>
<?php else : ?>
    <!-- if user is not logged in show login/register button -->
    <button class="button1" onclick="openLoginPage()">Login / Registrieren</button>
<?php endif; ?>

    <script>
      function openLoginPage() {
        <?php
        $_SESSION['previousURL'] = $_SERVER['REQUEST_URI'];
        ?>
        window.open("LoginPage.php",'_self');
      }
      function logout() {
        <?php 
        $_SESSION['previousURL'] = $_SERVER['REQUEST_URI'];
        $_SESSION['loginStatus'] = false; 
        ?>
        window.open("LogoutPage.php",'_self');
      }
    </script>
</div>
</head>