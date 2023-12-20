<!-- check if entered data is correct and change to loginstatus = true -->
<?php
session_start();

//initializing variables
$username = "";
$enteredPassword = "";
$hashedPassword = "";
$firstname = "";
$lastname = "";
$email = "";
$age = "";

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
        header("Location:LoginPage.php");
        exit();
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
        $email = $row["email"];
        $age = $row["age"];
        
        //insert in session
        $_SESSION['personID'] = $personID;
        $_SESSION['firstname'] = $firstname;
        $_SESSION['lastname'] = $lastname;
        $_SESSION['age'] = $age;
        $_SESSION['email'] = $email;
        $_SESSION['loginStatus'] = true;
        }

        // Redirect after successful insertion
        header("Location: Welcome.php"); 
        $_SESSION['error'] = "";
        exit();
    }
    //show error if password is incorrect
    else {
        $error = 'Eingegebenes Passwort ist nicht korrekt';
        $_SESSION['error'] = $error;
        header("Location:LoginPage.php");
        exit();
    }
}

?>