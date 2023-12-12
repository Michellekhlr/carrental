<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Include the database configuration file
include_once "dbConfig.php";

// Retrieve the current user's person ID from the session
$person_id = $_SESSION['personID'];

// Prepare an SQL statement to fetch user details from the database
$stmt = $conn->prepare("SELECT 
    person.firstName, 
    person.lastName, 
    person.age, 
    person.phoneNumber, 
    user.email, 
    user.userName
FROM 
    user
INNER JOIN 
    person ON user.personID = person.personID
WHERE
    user.personID = :personID");

// Bind the personID parameter to the prepared statement
$stmt->bindParam(':personID', $person_id);
// Execute the SQL query
$stmt->execute();

// Fetch the results and store them in session variables
if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $firstname = $row['firstName'];
    $lastname = $row['lastName'];
    $email = $row['email'];
    $username = $row['userName'];
    $age = $row['age'];
    $phoneNumber = $row['phoneNumber'];
    $_SESSION['firstname'] = $firstname;
    $_SESSION['lastname'] = $lastname;
    $_SESSION['email'] = $email;
    $_SESSION['username'] = $username;
    $_SESSION['age'] = $age;
    $_SESSION['phoneNumber'] = $phoneNumber;
} else {
    // Display an error message if no user is found with the given ID
    echo "Kein Benutzer mit der ID gefunden.";
}

// Check if the saveChanges button was pressed on the form
if (isset($_POST['saveChanges'])) {
    // Retrieve the updated data from the form
    $person_id = $_SESSION['personID'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $age = $_POST['age'];
    $phoneNumber = $_POST['phone'];
    $email = $_POST['email'];
    $username = $_POST['username'];

    // Update the person's details in the database
    $stmt = $conn->prepare("UPDATE person SET firstName=:firstname, lastName=:lastname, age=:age, phoneNumber=:phone WHERE personID = :personID");
    $stmt->bindParam(':firstname', $firstname);
    $stmt->bindParam(':lastname', $lastname);
    $stmt->bindParam(':age', $age);
    $stmt->bindParam(':phone', $phoneNumber);
    $stmt->bindParam(':personID', $person_id);
    $stmt->execute();

    // Update the user's details in the database
    $stmt = $conn->prepare("UPDATE user SET email=:email, userName=:username WHERE personID = :personID");
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':personID', $person_id);
    $stmt->execute();

    // Update the session variables with the new data
    $_SESSION['firstname'] = $firstname;
    $_SESSION['lastname'] = $lastname;
    $_SESSION['email'] = $email;
    $_SESSION['username'] = $username;
    $_SESSION['age'] = $age;
    $_SESSION['phoneNumber'] = $phoneNumber;

    // Redirect to OrdersPage.php to prevent form resubmission
    header("Location: OrdersPage.php");
    exit();
}
?>
