<?php
session_start();

//initializing variables
$username = "";
$enteredPassword = "";
$hashedPassword = "";
$firstname = "";
$lastname = "";

include_once "dbConfig.php";

if (isset($_POST['login'])) {
    $error = "";

    //get data from LoginPage.php
    $username = $_POST["username"];
    $enteredPassword = $_POST["password"];

    //check if username exists
    $stmt = $conn->prepare("SELECT COUNT(*) FROM user WHERE username=:username");
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    $count = $stmt->fetchColumn();

    if ($count == 0) {
        $error = 'Dieser Benutzername existiert nicht';
        $_SESSION['error'] = $error;
    }

    //check if passwort is correct
    $stmt = $conn->prepare("SELECT user.password FROM user WHERE username=:username");
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    $hashedPassword = $stmt->fetchColumn();

    //if password valid, get data from person 
    if(password_verify($enteredPassword, $hashedPassword)) {
        $stmt = $conn->prepare("SELECT * 
        FROM person 
        INNER JOIN user ON person.personID = user.personID  
        WHERE user.userName = :userName");

        $stmt->bindParam(':userName',$username);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
        $personID = $row["personID"];
        $firstname = $row["firstName"];
        $lastname = $row["lastName"];
        
        //insert in session
        $_SESSION['personID'] = $personID;
        $_SESSION['firstname'] = $firstname;
        $_SESSION['lastname'] = $lastname;
        $_SESSION['loginStatus'] = true;
        }

        header("Location: Welcome.php"); // Redirect after successful insertion
        $_SESSION['error'] = "";
        exit();
    }
    else {
        $error = 'Eingegebenes Passwort ist nicht korrekt';
        $_SESSION['error'] = $error;
    }
}

?>