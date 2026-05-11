<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="stylesheets/style.css">
</head>
<body>
    <?php include "includes/header.php"; ?>

<main class="invoerBox">
    <section class="loginSection">
        <header class="loginHeader">
            <h1>Delete account</h1>
        </header>
 
        <section class="loginForm">
            <form method="POST">
                <label for="username">Username</label>
                <input type="text" id="username" name="username">
 
                <label for="password">Wachtwoord</label>
                <input type="password" id="password" name="password">

                <button type="submit" name="submit" id="deleteButton" onclick="return confirm('Are you sure?')">DELETE</button>
            </form>
        </section>
    </section>
</main>

<?php
session_start();

$conn = new mysqli("localhost", "root", "", "pixelplayground");

if ($conn -> connect_error ){
        die("Verbinding mislukt: " . $conn->connect_error);
    }
  
if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $stmt = $conn -> prepare("SELECT * FROM users WHERE username = ?");
    $stmt -> bind_param("s", $username);
    $stmt -> execute();
    $result = $stmt -> get_result();
    $user = $result -> fetch_assoc();
    
    if ($user && password_verify($password, $user["password"])) {
        $delete = $conn -> prepare("DELETE FROM users WHERE user_id = ?");
        $delete -> bind_param("s", $user["user_id"]);
        $delete -> execute();

        $check = $conn -> prepare("SELECT * FROM users WHERE user_id = ?");
        $check -> bind_param("s", $user["user_id"]);
        $check -> execute();
        $doubleCheck = $check -> get_result();
        $delete -> close();
        
        
        if ($check -> num_rows() == 0) {
            echo "deleted";
            $check -> close();
        } else {
            echo "Er is iets mis gegaan :(";
     }
    } else {
        echo "onjuiste informatie";
    }
 }
 
?>


<?php  
$conn -> close();

 ?>
    <?php include "includes/footer.php"; ?>
</body>
</html>