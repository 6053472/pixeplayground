<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="stylesheets/style.css">
</head>
<body>
    <?php include "includes/header.php"; ?>
<main>
    <section class="homeBanner">
        <img src="images/banner image.png" alt="Home banner">
    </section>
 
    <section class="homeGamesList">
 
        <article class="homeGameCard">
            <figure>
                <a href="#">
                    <img id="tttImage" src="images/istockphoto-653869556-170667a-removebg-preview.png" alt="Tic Tac Toe">
                </a>
            </figure>
            <section class="homeGameInfo">
                <h2>tic tac toe</h2>
                <p>Tic-tac-toe is een eenvoudig spel waarin twee spelers om de beurt een X of O zetten op een 3×3 rooster.</p>
            </section>
            <section class="homeGameHighscore">
                <p>Latest highscore</p>
                <p>Tic tac toe: ??</p>
            </section>
        </article>
 
        <article class="homeGameCard">
            <figure>
                <a href="#">
                    <img id="connect4Image" src="images/snapshot-removebg-preview.png" alt="Connect 4">
                </a>
            </figure>
            <section class="homeGameInfo">
                <h2>Connect 4</h2>
                <p>Bij Connect 4 proberen spelers om als eerste vier schijven van hun kleur op een rij te krijgen, horizontaal, verticaal of diagonaal.</p>
            </section>
            <section class="homeGameHighscore">
                <p>Connect 4: ??</p>
            </section>
        </article>
 
    </section>
</main>






    <?php include "includes/footer.php"; ?>
</body>
</html>