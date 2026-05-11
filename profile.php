<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php include 'includes/header.php'; ?>
<link rel="stylesheet" href="stylesheets/style.css">
 
<main class="profileMain">
 <?php session_start() ?>
 <?php 
if (!isset($_SESSION["userid"])) {
    header("Location: http://localhost/lucasK_kirubel/login.php");
}

$conn = new mysqli("localhost", "root", "", "pixelplayground");

if ($conn -> connect_error ){
        die("Verbinding mislukt: " . $conn->connect_error);
}
$userID = $_SESSION["userid"];

$stmt = $conn->prepare("SELECT username FROM users WHERE user_id = ?");
$stmt -> bind_param("s", $userID);
$stmt -> execute();
$result = $stmt -> get_result();
$userInfo = $result -> fetch_assoc();
$username = $userInfo["username"];



 ?>
    <section class="profileSidebar">
        <section class="profileInfo">
            <p><strong>Gebruikersnaam:</strong> <?php echo $username; ?></p>
            <button type="button" onclick="location.href='logout.php'">Logout</button>
            <button type="button">Gebruikersnaam veranderen</button>
            <button type="button" onclick="location.href='resetPassword.php'">Wachtwoord veranderen</button>
            <button type="button" onclick="location.href='delete.php'">Verwijder account</button>
        </section>
 
        <section class="profileFriends">
            <p>Vrienden:</p>
            <ul>
                <li>xXx_Conqueror_xXx</li>
                <li>xXx_Conqueror_xXx</li>
                <li>xXx_Conqueror_xXx</li>
                <li>xXx_Conqueror_xXx</li>
                <li>xXx_Conqueror_xXx</li>
                <li>xXx_Conqueror_xXx</li>
                <li>xXx_Conqueror_xXx</li>
                <li>xXx_Conqueror_xXx</li>
                <li>xXx_Conqueror_xXx</li>
                <li>xXx_Conqueror_xXx</li>
            </ul>
            <button type="button">Alle vrienden</button>
        </section>
    </section>
 
    <section class="profileHighscores">
 
        <article class="highscoreCard">
            <h2>Tic Tac Toe:</h2>
            <p>laatste highscores</p>
            <ul>
                <?php 
                $getScoreTTT = "SELECT * FROM scores WHERE user_id = '$userID' AND game = 'tictactoe'";

                    $userScoresTTT = $conn->query($getScoreTTT);
                    if ($userScoresTTT -> num_rows == 0) {
                        echo "<li><span>Nog geen scores</span></li>";
                    } else {
                        while ($row = $userScoresTTT->fetch_assoc()) {
                            echo "<li><span>". $row["score"] . "</span><span>" . $row["score_date"] . "</span></li>";
                        }
                    }
                ?>
            </ul>
        </article>
 
        <article class="highscoreCard">
            <h2>Wordle:</h2>
            <p>laatste highscores</p>
            <ul>
                <?php
                    $getScoreWordle = "SELECT * FROM scores WHERE user_id = '$userID' AND game = 'wordle'";

                    $userScoresWordle = $conn->query($getScoreWordle);
                    if ($userScoresWordle -> num_rows == 0) {
                        echo "<li><span>Nog geen scores</span></li>";
                    } else {
                        while ($row = $userScoresWordle->fetch_assoc()) {
                            echo "<li><span>". $row["score"] . "</span><span>" . $row["score_date"] . "</span></li>";
                        }
                    }
                ?>
            </ul>
        </article>
 
        <article class="highscoreCard">
            <h2>Connect 4:</h2>
            <p>laatste highscores</p>
            <ul>
                <?php 
                    $getScoreConnect4 = "SELECT * FROM scores WHERE user_id = '$userID' AND game = 'connect4'";
                    
                    $userScoresConnect4 = $conn->query($getScoreConnect4);
                    if ($userScoresConnect4 -> num_rows == 0) {
                        echo "<li><span>Nog geen scores</span></li>";
                    } else {
                        while ($row = $userScoresWordle->fetch_assoc()) {
                            echo "<li><span>". $row["score"] . "</span><span>" . $row["score_date"] . "</span></li>";
                        }
                    }
                ?>
            </ul>
        </article>
 
        <article class="highscoreCard">
            <h2>Hangman:</h2>
            <p>laatste highscores</p>
            <ul>
                <?php
                    $getScoreHangman = "SELECT * FROM scores WHERE user_id = '$userID' AND game = 'hangman'";

                    $userScoresHangman = $conn->query($getScoreHangman);
                    if ($userScoresHangman -> num_rows == 0) {
                        echo "<li><span>Nog geen scores</span></li>";
                    } else {
                        while ($row = $userScoresHangman->fetch_assoc()) {
                            echo "<li><span>". $row["score"] . "</span><span>" . $row["score_date"] . "</span></li>";
                        }
                    }
                ?>
            </ul>
        </article>
 
    </section>
 
</main>
 
<?php include 'includes/footer.php'; ?>
<?php 
$conn -> close();
$stmt -> close();
$userScoresConnect4 -> close();
$userScoresHangman -> close();
$userScoresTTT-> close();
$userScoresWordle -> close();
?>
</body>
</html>