<?php
session_start();

//initializing variables
$salutation = "";
$firstname = "";
$lastname = "";
$age = "";
$phone = "";
$email = "";
$username = "";
$password1 = "";
$password2 = "";
$passwordHash = "";

include_once "dbConfig.php";

if (isset($_POST['register'])) {
    $error = "";

    //get data from RegisterPage.php
    $personID = uniqid();
    $userID = uniqid();
    $salutation = $_POST["salutation"];
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $age = $_POST["age"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password1 = $_POST["password1"];
    $password2 = $_POST["password2"];

    //check if person already exists
    $stmt = $conn->prepare("SELECT COUNT(*) FROM person WHERE firstname=:firstname AND lastname=:lastname AND age=:age AND phoneNumber=:phone");
    $stmt->bindParam(':firstname', $firstname);
    $stmt->bindParam(':lastname', $lastname);
    $stmt->bindParam(':age', $age);
    $stmt->bindParam(':phone', $phone);
    $stmt->execute();
    $count = $stmt->fetchColumn();
    if ($count > 0) {
        $error = "Diese Person existiert bereits";
        $_SESSION['error'] = $error;
        header("Location:RegisterPage.php");
        exit();
    }

    //check if user already exists
    //check if email is valid
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Email hat ein nicht zulässiges Format!";
        $_SESSION['error'] = $error;
        header("Location:RegisterPage.php");
        exit();
    }
    $stmt = $conn->prepare("SELECT COUNT(*) FROM user WHERE email=:email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $count = $stmt->fetchColumn();
    if ($count > 0) {
        $error = "Email existiert schon!";
        $_SESSION['error'] = $error;
        header("Location:RegisterPage.php");
        exit();
    }
    //check if username exists
    $stmt = $conn->prepare("SELECT COUNT(*) FROM user WHERE username=:userName");
    $stmt->bindParam(':userName', $username);
    $stmt->execute();
    $count = $stmt->fetchColumn();
    if ($count > 0) {
        $error = "Der Benutzername existiert schon!";
        $_SESSION['error'] = $error;
        header("Location:RegisterPage.php");
        exit();
    }
    //check if password and password repetition are the same
    if ($password1!=$password2) {
        $error = "Die Passwörter stimmen nicht überein!";
        $_SESSION['error'] = $error;
        header("Location:RegisterPage.php");
        exit();
    }
    
    //insert into person
    $stmt = $conn->prepare("INSERT INTO person (personID, firstname, lastname, age, phoneNumber, salutation)
    VALUES (:personID, :firstname, :lastname, :age, :phone, :salutation)");
    $stmt->bindParam(':personID', $personID);
    $stmt->bindParam(':salutation', $salutation);
    $stmt->bindParam(':firstname', $firstname);
    $stmt->bindParam(':lastname', $lastname);
    $stmt->bindParam(':age', $age);
    $stmt->bindParam(':phone', $phone);
    $stmt->execute();
      }

    //insert into user
    $stmt = $conn->prepare("INSERT INTO user (userID, personID, email, userName, password)
    VALUES (:userID, :personID, :email, :userName, :password)");
    $stmt->bindParam(':userID', $userID);
    $stmt->bindParam(':personID', $personID);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':userName', $username);
    $passwordHash = password_hash($password1, PASSWORD_DEFAULT);
    $stmt->bindParam(':password', $passwordHash);
    $stmt->execute();

    //insert in session
    $_SESSION['personID'] = $personID;
    $_SESSION['firstname'] = $firstname;
    $_SESSION['lastname'] = $lastname;
    $_SESSION['age'] = $age;
    $_SESSION['email'] = $email;
    $_SESSION['loginStatus'] = true;

    header("Location: Welcome.php"); // Redirect after successful insertion
    exit();
    $_SESSION['error'] = "";
?>