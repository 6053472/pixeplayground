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
            <h1>Login</h1>
        </header>
 
        <section class="loginForm">
            <form method="POST">
                <label for="username">Username</label>
                <input type="text" id="username" name="username">

                <label for="code">Security code</label>
                <input type="text" id="code" name="code">
 
                <label for="password"> Nieuw Wachtwoord</label>
                <input type="password" id="password" name="password">

                <nav class="loginLinks">
                    <a href="#">Stuur Security Code Opnieuw</a>
                </nav>
 
                <button type="submit" name="submit">Reset</button>
            </form>
        </section>
    </section>
</main>

<?php 
if (isset($_POST["submit"])) {
        if (!empty($_POST["username"]) && !empty($_POST["password"])){
                $conn = new mysqli("localhost", "root", "", "pixelPlayground");
            if ($conn -> connect_error) {
                die("Connection failed");
            }
            $username = $_POST["username"];
            $password = $_POST["password"];

            $updatePassword = $conn -> prepare("UPDATE users SET password = ? WHERE username = ?");
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $updatePassword -> bind_param("ss", $hashedPassword, $username);
            $updatePassword -> execute();

            $check = $conn -> prepare("SELECT * FROM users WHERE username = ?");
            $check -> bind_param("s", $username);
            $check -> execute();
            $doubleCheck = $check -> get_result();
            $tripleCheck = $doubleCheck -> fetch_assoc();  
            if ($check && password_verify($password, $tripleCheck["password"])) {
                 echo "Wachtwoord is gewijzigd";
            }          
           
            $conn -> close();
            $updatePassword -> close();
            $check -> close();
        } else {
            echo "Alle velden moet niet leeg zijn.";
        }
        
    }
?>



    <?php include "includes/footer.php";
    
     ?>
</body>
</html>