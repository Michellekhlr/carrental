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
} else {
    $loginStatus = false;
}
?>
<!DOCTYPE html>

<head>
    <title>Buchung verwalten - Drive.</title>
    <link rel="icon" type="image/png" href="bilder/Drive.png">
    <!-- Import Google Fonts for specific font styles -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Titillium+Web:wght@400;700&display=swap');
    </style>

    <!-- Import Google Icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <!-- Import external CSS stylesheet -->
    <link rel="stylesheet" href="CSSMain.css">

    <!--Include Header-->
    <?php
    include('Header.php');
    ?>
</head>

<?php

$currentPage = 1; // Set default page number to 1
if (isset($_GET['page']) && is_numeric($_GET['page'])) { // Check if 'page' parameter is set in the URL and is a numeric value
    if ($_GET['page'] > 0) { // Check if the page number is greater than 0
        $currentPage = $_GET['page']; // Set the current page to the value from the URL parameter
    } else { // Else redirect to the first page if the current page is less than or equal to 0:
        header("Location: ordersPage.php?page=1");
        exit();
    }
}

// Check if 'personID' is set in the session
if (isset($_SESSION['personID'])) {
    $personID = $_SESSION['personID'];

    // Prepare an SQL query to obtain the userID associated with the personID
    $stmt = $conn->prepare("SELECT userID FROM user WHERE personID = :personID");
    $stmt->bindParam(':personID', $personID);
    $stmt->execute();

    // Fetch the result from the executed query
    if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        // If a result is found, store the userID in the session
        $_SESSION['userID'] = $row['userID'];
    }
}


// Definitions for variables
if (isset($_SESSION['userID'])) {
    $userID = $_SESSION["userID"]; // retrieving the user ID from the session
}
$queryUserOrders = "SELECT COUNT(orderID) AS count FROM `order` WHERE userID = :userID"; // SQL query to determine the number of bookings made by the user
$stmt2 = $conn->prepare($queryUserOrders); // Prepare the SQL query
$stmt2->bindParam(':userID', $userID); // Bind the user ID parameter to the prepared statemen
$stmt2->execute(); // Execute the prepared query
$result2 = $stmt2->fetchAll(); // Fetch all the results from the executed query

$UserOrders = $result2[0]['count']; // Retrieve the count of bookings made by the user from the query result

$recordsPerPage = 5; // Set the number of entries to display per page

$offset = ($currentPage - 1) * $recordsPerPage; // Calculate the offset - determines where to start the query based on the current page

// SQL query to retrieve booking data based on user ID and page size
$queryOfRecords = "SELECT orderID, startDate, endDate, vendorNameAbbr, name, extras, locationName,  overallPrice FROM `order`
 LEFT JOIN carlocation ON carlocation.carID = `order`.carID
 LEFT JOIN cartype ON cartype.TypeID = carlocation.typeID
 LEFT JOIN vendor ON vendor.vendorID = cartype.vendorID
 LEFT JOIN `location` ON `location`.locationID = carlocation.locationID
 WHERE userID = :userID ORDER BY endDate DESC, orderID DESC LIMIT $offset, $recordsPerPage";


// Prepare the SQL query
$stmt = $conn->prepare($queryOfRecords);

// Bind the user ID parameter
$stmt->bindParam(':userID', $userID);

// Execute the prepared query
$stmt->execute();

// Fetch all the results
$result = $stmt->fetchAll();

// Calculate the maximum number of pages based on the total number of user orders and records per page
$maxPage = max(ceil($UserOrders / $recordsPerPage), 1); // Check if the current page exceeds the calculated maximum page
if ($currentPage > $maxPage) {
    // Redirect to the last page if the current page is greater than the maximum page:
    header("Location: ordersPage.php?page=1");
    exit(); // Exit to prevent further execution
}
?>


<body>
    <div class="background-banner">
        <!-- Background video for the banner -->
        <video autoplay muted loop class="hintergrundvideo">
            <source src="Infitite_Loop.mp4" type="video/mp4">
        </video>
        <div class="firstName-banner">
            <!-- Display welcome message or login prompt based on user's login status -->
            <?php
            // Check if $loginStatus is set and true
            if (isset($loginStatus) && $loginStatus == true) {
                // Display a welcome message with the user's first name
                echo "Moin " . $_SESSION['firstname'] . "!";
            } else {
                // Display a prompt to log in if the user is not logged in
                echo "Bitte melde dich an";
            }
            ?>
        </div>
    </div>
    <!-- displaying the company slogan -->
    <div class="SloganOrders">
        Einfach.Flexibel.
    </div>

    <!-- Section for displaying user's bookings -->
    <div class="orders">
        <div class="orderDiv"> <!-- Container for displaying user's bookings -->
            <h1 class="ordersTitle">Deine Buchungen</h1> <!-- Title for user's bookings section -->
            <div class="ordersSpacer"></div> <!-- Spacer to provide visual separation -->

            <?php if (isset($loginStatus) && $loginStatus == true) { ?> <!-- Check if the user is logged in -->
                <?php if ($UserOrders > 0) { ?> <!-- Check if the user has made bookings -->


                    <!-- Display a table for user's bookings if there are bookings available: -->
                    <table class="orderTable">

                        <tr class="orderTableHeader">
                            <td>Buchungs-ID</td>
                            <td>Von</td>
                            <td>Bis</td>
                            <td>Auto</td>
                            <td>Extras</td>
                            <td>Standort</td>
                            <td>Preis</td>
                        </tr>
                        <?php
                        $rowIndex = 1;
                        foreach ($result as $row) {
                            $startDateDisplay = date("d.m.Y", strtotime($row['startDate'])); // format the start date
                            $endDateDisplay = date("d.m.Y", strtotime($row['endDate'])); // format the end date
                        ?>

                            <!-- Table row for each booking, with a dynamic class attribute -->
                            <tr class="orderTabletr" <?php echo $rowIndex; ?>>
                                <td class="orderTabletd"><?php echo $row['orderID']; ?></td>
                                <td class="orderTabletd"><?php echo $startDateDisplay; ?></td>
                                <td class="orderTabletd"><?php echo $endDateDisplay; ?></td>
                                <td class="orderTabletd"><?php echo $row['vendorNameAbbr']; ?> <?php echo $row['name']; ?></td>
                                <td class="orderTabletd"><?php echo $row['extras']; ?></td>
                                <td class="orderTabletd"><?php echo $row['locationName']; ?></td>
                                <td class="orderTabletd"><?php echo $row['overallPrice'] . "€"; ?></td>
                            </tr>
                        <?php $rowIndex++;
                        }
                        ?>
                        <tr class="orderTableLastRow"> <!-- Table row for navigation and page information -->
                            <!-- Display a link to the previous page if current page is greater than 1 -->
                            <td class="orderTabletd"><?php if ($currentPage > 1) { ?><a class="orderText" href="?page=<?php echo ($currentPage - 1); ?>">Vorherige Seite</a><?php } ?> </td>
                            <!-- Display current page, booking range, and total bookings -->
                            <td class="orderTabletd" colspan="5"> Seite <?php echo $currentPage; ?> - Buchung <?php echo ($offset + 1); ?> bis <?php echo ($offset + count($result)); ?> <span class="orderTextLight">(von <?php echo $UserOrders; ?>)</span> </td>
                            <!-- Display a link to the next page if current page is less than the maximum page -->
                            <td class="orderTabletd"><?php if ($currentPage < $maxPage) { ?><a class="orderText" href="?page=<?php echo ($currentPage + 1) ?>">Nächste Seite</a><?php } ?> </td>
                        </tr>
                    </table>
                <?php
                } else {
                    // Display a message if there are no bookings
                    echo '<p class="noBookingsText">Es liegen keine Buchungen vor.</p>';
                }
                ?>
            <?php
            } else {
                // Display a message prompting the user to log in
                echo '<p class="noBookingsText">Bitte melde dich an, um deine Buchungen zu sehen</p>';
            }
            ?>
        </div>
    </div>

    <!-- User data section -->
    <div class="data">
        <div class="YourDataDiv">
            <h1 class="yourDataDivTitle">Deine Daten</h1>
            <div class="ordersSpacer"></div>
            <!-- Form for updating user data -->
            <form action="orders.php" style="justify-content: center" method="POST">

                <!-- Input fields pre-populated with user data from session variables -->
                <?php if (isset($loginStatus) && $loginStatus == true) { ?>
                    <table class="YourDataTable">
                        <tr>
                            <td><label for="firstname">Vorname:</label><br>
                                <div class="input-container"> <input type="text" name="firstname" class="myDataInput" value="<?php echo $_SESSION['firstname']; ?>">
                                    <i class="fas">&#xf303;</i>
                                </div>
                            </td>
                            <td><label for="lastname">Nachname:</label> <br>
                                <div class="input-container"> <input type="text" name="lastname" class="myDataInput" value="<?php echo $_SESSION['lastname']; ?>">
                                    <i class="fas">&#xf303;</i>
                                </div>
                            </td>
                            <td><label for="age">Alter:</label> <br>
                                <div class="input-container"> <input type="number" name="age" class="myDataInput" value="<?php echo $_SESSION['age']; ?>">
                                    <i class="fas">&#xf303;</i>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="email">Email: </label> <br>
                                <div class="input-container"> <input type="email" name="email" class="myDataInput" value="<?php echo $_SESSION['email']; ?>">
                                    <i class="fas">&#xf303;</i>
                                </div>
                            </td>
                            <td><label for="username">Benutzername:</label> <br>
                                <div class="input-container"> <input type="text" name="username" class="myDataInput" value="<?php echo $_SESSION['username']; ?>">
                                    <i class="fas">&#xf303;</i>
                                </div>
                            </td>
                            <td><label for="phone">Mobilnummer:</label> <br>
                                <div class="input-container"><input type="tel" name="phone" class="myDataInput" value="<?php echo $_SESSION['phoneNumber']; ?>"><i class="fas">&#xf303;</i>
                                </div>
                            </td>
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
        <?php
                } else {
                    echo '<p class="noBookingsText">Bitte melde dich an, um deine Daten zu ändern</p>';
                }
        ?>
        <div class="ordersSpacer"></div>

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