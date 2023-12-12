<?php
// Start the session to access session variables
session_start();
// Include the database configuration file
include_once "dbConfig.php";
// Include the script handling orders logic
include_once "orders.php";

// Check if the user is logged in, set login status accordingly
if (isset($_SESSION['loginStatus']) && $_SESSION['loginStatus']) {
    $loginStatus = true;
}
else {
    $loginStatus = false;
}
?>
<!DOCTYPE html>
<head>
    <!-- Import Google Fonts for specific font styles -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Titillium+Web:wght@400;700&display=swap');
    </style>

    <!-- Import Google Icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <!-- Import external CSS stylesheet -->
    <link rel="stylesheet" href = "CSSMain.css">

    <!--Include Header--> 
    <?php
    include('Header.php');
    ?>
</head>
<body>
    <div class= "background-banner">
    <!-- Background video for the banner -->
    <video autoplay muted loop class="hintergrundvideo">
            <source src="Infitite_Loop.mp4" type="video/mp4">
        </video>
        <div class= "firstName-banner">
            <!-- Display welcome message or login prompt based on user's login status --> 
            <?php
            if (isset($loginStatus) && $loginStatus == true) {
                        echo "Moin " . $_SESSION['firstname'] . "!";    
            }
            else {    
                echo "Bitte logge dich ein";
            }
            ?>
        </div>
    </div>
    <!-- displaying the company slogan -->
    <div class="SloganOrders">
            Einfach.Flexibel.
    </div>

    <!-- Section for displaying user's bookings -->
    <div class = "orders">
        <div class="orderDiv">
            <h1 style="box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); width: 100%; text-align: center; margin:0; font-size:50px;">Deine Buchungen</h1>

            <!-- Table headers for booking details -->
            <table class="orderTable"> 
                
            <!-- hier mit PHP füllen -->
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
    
    <!-- User data section -->        
    <div class="data">
        <div class="YourDataDiv">
            <h1 style="box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); width: 100%; text-align: center; margin:0; font-size:50px; background-color:white;">Deine Daten</h1>
            <!-- Form for updating user data -->
            <form action="orders.php" style="justify-content: center" method="POST">
             
             <!-- Input fields pre-populated with user data from session variables -->
             <table class="YourDataTable">
                <tr>
                    <td><label for="firstname">Vorname:</label><br>
                        <div class="input-container"> <input type="text" name="firstname" class="myDataInput" value="<?php echo $_SESSION['firstname'];?>"> 
                        <i class="fas">&#xf303;</i>
                    </div></td>
                    <td><label for="lastname">Nachname:</label> <br>
                        <div class="input-container"> <input type="text" name="lastname" class="myDataInput" value="<?php echo $_SESSION['lastname'];?>"> 
                        <i class="fas">&#xf303;</i>    
                    </div></td>    
                    <td><label for="age">Alter:</label> <br>
                        <div class="input-container"> <input type="number" name="age" class="myDataInput" value="<?php echo $_SESSION['age'];?>">
                        <i class="fas">&#xf303;</i>    
                    </div></td>    
                </tr>
                <tr>
                    <td><label for="email">Email: </label> <br>
                        <div class="input-container"> <input type="email" name="email" class="myDataInput" value="<?php echo $_SESSION['email'];?>">
                        <i class="fas">&#xf303;</i>    
                    </div></td>
                    <td><label for="username">Benutzername:</label> <br>
                        <div class="input-container"> <input type="text" name="username" class="myDataInput" value="<?php echo $_SESSION['username'];?>">
                        <i class="fas">&#xf303;</i>    
                    </div></td>
                    <td><label for="phone">Mobilnummer:</label> <br>
                    <div class="input-container"><input type="tel" name="phone" class="myDataInput" value="<?php echo $_SESSION['phoneNumber'];?>"><i class="fas">&#xf303;</i>    
                    </div></td>
                </tr>
                <tr>
                    <td>
                    </td>
                    <td>
                   <!-- Button to submit the form -->
                    <button type="submit" class="myDataButton" name="saveChanges">Speichern</button>
                    </td>
                    <td>
                    </td>
                </tr>
            </table>
            
            </form>
            
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