<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="stylesheets/style.css">
</head>
<body>
    <?php include "includes/header.php"; ?>

<main class="invoerBox">
    <section class="loginSection">
        <header class="loginHeader">
            <h1>Register</h1>
        </header>
 
        <section class="loginForm">
            <form method="POST">
                <label for="username">Username</label>
                <input type="text" id="username" name="username">
 
                <label for="password">Wachtwoord</label>
                <input type="password" id="password" name="password">
 
                <button type="submit" name="submit">Register</button>
            </form>
        </section>
    </section>
</main>
<?php 
session_start();
$conn = new mysqli("localhost", "root", "", "pixelPlayground");

if ($conn -> connect_error ){
        die("Verbinding mislukt: " . $conn->connect_error);
    }

 if (isset($_POST["submit"])) {
     if (!empty($_POST["username"]) && !empty($_POST["password"]) ) {
        $username = $_POST["username"];
        $password = $_POST["password"];
        if (strlen($username) < 4) {
            echo "Username moet minimaal 4 tekens zijn";
        } elseif  (strlen($_POST["password"] < 6)){
                echo "Wachtwoord moet minstens 6 tekens zijn.";
            } else {
                $checkAvailable = $conn->prepare("SELECT * FROM users WHERE username = ?");
                $checkAvailable->bind_param("s", $username);
                $checkAvailable->execute();
                $checkAvailable->store_result();
                   if ($checkAvailable->num_rows == 0) {
                       $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                       $sql = $conn -> prepare("INSERT INTO users (username, password) 
                                                 VALUES (?, ?);");
                        $sql ->bind_param("ss", $username, $hashedPassword);
                        $sql -> execute();

                        $check = $conn -> prepare("SELECT * FROM users WHERE username = ?");
                        $check -> bind_param("s", $username);
                        $check -> execute();
                        $doubleCheck = $check -> get_result();
                        $tripleCheck = $doubleCheck -> fetch_assoc();
                        if ($check && password_verify($password, $tripleCheck["password"])) {
                            echo "Registratie gelukt!";
                            $_SESSION["userid"] = $tripleCheck["user_id"];
                        } else {
                            echo "Er is iets mis gegaan :(";
                        }

                        $conn -> close();
                        $checkAvailable -> close();
                        $sql -> close();
                        $check -> close();
                    } else {
                        echo "Die username is al in gebruik";
                    }
            }
        } else {
        echo "beide velden mogen niet leeg zijn"; 
     } 
     }
 
               
?>

    <?php include "includes/footer.php";
    $conn -> close();
    ?>
</body>
</html>