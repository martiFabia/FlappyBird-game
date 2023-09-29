<?php
    if (!isset($_SESSION))
        session_start();

    if (!isset($_SESSION['login']) || $_SESSION['login'] === false) {
        header("location: loginForm.php");
        exit;
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="../img/favicon.ico">
    <link href="../css/header.css" type="text/css" rel="stylesheet">
    <link href="../css/game.css" type="text/css" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Chakra+Petch:wght@700&family=Lilita+One&family=Press+Start+2P&display=swap" rel="stylesheet">
    
    <title>Flappy Bird</title>
</head>
<body id="background" onload="changebg()">
  
    <div id="GameDiv">
        <div id="start"> <p>Get Ready</p> <br> Premi INVIO per iniziare!</div>

        <button id="toggleAudio_btn" onclick="toggleAudio()">
            <img src="../img/icons/sound-on.svg" alt="">
        </button>

        <div id="ScoreDiv">
            <div id="mess_score"></div><div id="punteggio"></div>
        </div>

        <div id="end" class="hidden">
            <img src="../img/GameOver.png" alt="">
            <p id="final_score"></p>
            <p id="best_score"></p>

            <div class="divButton">
                <button id="home" onclick="window.location.href='index.php'"></button>
                <button id="play" onclick="restart()"></button>
            </div>
        </div>

    </div>

    <script src="../js/game.js" ></script>
    <script src="../js/HomePage.js" ></script>
    <script src="../js/audio.js" ></script>
</body>
</html>