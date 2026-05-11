<?php session_start() ?>
<?php include 'includes/header.php' ?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connect 4</title>
    <link rel="stylesheet" href="stylesheets/style.css">
    <link rel="stylesheet" href="stylesheets/connect4.css">
    <script src="script/connect4.js" defer></script>
    <script src="script/popup.js" defer></script>
</head>
<body>
    <main class="game-wrapper">
        <section class="game-controls">
            <button id="botGame">Bot Play</button>
            <button id="resetButton">Restart</button>
            <button id="giveUpButton">Give up</button>
        </section>
 
        <dialog class="modal" id="confirmModal">
            <p>Weet je zeker dat je wil herstarten?</p>
            <div class="modal-buttons">
                <button id="confirmYes" class="modal-yes">Ja</button>
                <button id="confirmNo" class="modal-no">Nee</button>
            </div>
        </dialog>
 
        <dialog class="modal" id="botModal">
            <p>Wil je tegen de bot spelen?</p>
            <div class="modal-buttons">
                <button id="botYes" class="modal-yes">Ja</button>
                <button id="botNo" class="modal-no">Nee</button>
            </div>
        </dialog>
 
        <dialog class="modal" id="giveUpModal">
            <p>Weet je zeker dat je wil opgeven?</p>
            <div class="modal-buttons">
                <button id="giveUpYes" class="modal-yes">Ja</button>
                <button id="giveUpNo" class="modal-no">Nee</button>
            </div>
        </dialog>
 
        <canvas id="game-canvas"></canvas>
 
        <section class="game-score">
            <p>Latest Score:</p>
            <p id="scoreList"></p>
        </section>
    </main>
</body>
</html>
 
<?php include 'includes/footer.php' ?>