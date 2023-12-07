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
    <div class="headerBackground">
      <div class= "header">
        <div class= "headerLogo">     
          <h1 class = "logo"><a class = "logo" href="Homepage.php"><i>Drive.</i></a></h1>
          <p class = "booknow">Book now!</p>
        </div>
        <div class="headerPuffer">

        </div>
        <div class= "headerNavigation"> 
            <a href="Produktübersicht.php"><h2 class = "navigator">Buchen</h2></a>
            <a href="Produktübersicht.php"><h2 class = "navigator">Unsere Angebote</h2></a>
            <a href="orders.php"><h2 class = "navigator">Buchungen verwalten</h2></a>
            <a href="AboutUs.php"><h2 class = "navigator">Über uns</h2></a>
        </div>
        <div class="headerPuffer">
          
        </div>
        <div class= "headerLogin"> 
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
      </div>
    </div>
    <div class="headerSpacer"></div>

</head>