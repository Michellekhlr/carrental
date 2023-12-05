<?php
session_start();
?>
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

    <!--Include Header--> 
    <?php
    include('Header.php');
    ?>
</head>
<body>
    <div class= "background-banner">
        <div class= "firstName-banner">
            <!--Name firstname in banner --> 
            <?php
            if ($_SESSION["loginStatus"] == true) {
                        echo "Moin " . $_SESSION["firstname"] . "!";    
            }
            else {    
                echo "Bitte logge dich ein";
            }
            ?>
        </div>
    </div>
    <div class="SloganOrders">
            Einfach.Flexibel.
    </div>
    <div class = "orders">
        <div class="orderDiv">
            <h1 style="box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); width: 100%; text-align:left; margin:0; font-size:50px;">Deine Buchungen</h1>
            <table class="orderTable"> <!-- hier mit PHP füllen -->
                <tr class="orderTableHeader">
                    <td >Buchungs-ID</td>
                    <td>Von</td>
                    <td>Bis</td>
                    <td>Auto</td>
                    <td>Extras</td>
                    <td>Standort</td>
                </tr>
                <tr class="orderTabletr">
                    <td class="orderTabletd">a</td>
                    <td class="orderTabletd">b</td>
                    <td class="orderTabletd">c</td>
                    <td class="orderTabletd">d</td>
                    <td class="orderTabletd">e</td>
                    <td class="orderTabletd">f</td>
                </tr>
                <tr class="orderTabletr">
                    <td class="orderTabletd">a</td>
                    <td class="orderTabletd">b</td>
                    <td class="orderTabletd">c</td>
                    <td class="orderTabletd">d</td>
                    <td class="orderTabletd">e</td>
                    <td class="orderTabletd">f</td>
                </tr>
                <!-- hier mit PHP füllen -->
            </table>
        </div>
    </div>
    <div class="data">
        <div class="YourDataDiv">
            <h1 style="box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); width: 100%; text-align:left; margin:0; font-size:50px; background-color:white">Deine Daten</h1>
            <form action="#" method="post"></form>
            <!--hier vorbelegen-->
            <table class="YourDataTable">
                <tr>
                    <td><label for="firstName">Vorname:</label> <br>
                        <div class="input-container"> <input type="text" name="firstName" class="myDataInput">
                        <i class="fas">&#xf303;</i>
                    </div></td>
                    <td><label for="lastName">Nachname:</label> <br>
                        <div class="input-container"> <input type="text" name="LastName" class="myDataInput">
                        <i class="fas">&#xf303;</i>    
                    </div></td>    
                    <td><label for="age">Alter:</label> <br>
                        <div class="input-container"> <input type="number" name="age" class="myDataInput">
                        <i class="fas">&#xf303;</i>    
                    </div></td>    
                </tr>
                <tr>
                    <td><label for="email">Email:</label> <br>
                        <div class="input-container"> <input type="email" name="email" class="myDataInput">
                        <i class="fas">&#xf303;</i>    
                    </div></td>
                    <td><label for="userName">Benutzername:</label> <br>
                        <div class="input-container"> <input type="text" name="userName" class="myDataInput">
                        <i class="fas">&#xf303;</i>    
                    </div></td>
                    <td><label for="phone">Mobilnummer:</label> <br>
                    <div class="input-container"><input type="tel" name="phone" class="myDataInput"><i class="fas">&#xf303;</i>    
                    </div></td>
                </tr>
            </table>
            <button type="submit" class="myDataButton">Speichern</button>
        </div>
    </div>
</body>
<footer>
    <!--Include Footer-->
<?php
    include('Footer.html');
    ?>
</footer>
</html>