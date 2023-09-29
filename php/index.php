<?php

if (!isset($_SESSION))
    session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="../img/favicon.ico">
    <link href="../css/homePage.css" type="text/css" rel="stylesheet">
    <link href="../css/header.css" type="text/css" rel="stylesheet">
    <link href="../css/profile.css" type="text/css" rel="stylesheet">
    <title>Flappy Bird</title>
</head>

<body id="background" onload="changebg()">

    <img src="../img/titolo.png" alt="FlappyBird" id="FlappyBird">
    
    <?php
    if (isset($_SESSION['login'])  && $_SESSION['login'] === true) { ?>
        <button id="logout_button" onclick="logout()">
            <p>Logout</p>
            <img src="../img/icons/arrow-right-from-bracket-solid.svg" alt="">
        </button>
    <?php } ?>

    <div class="homePage">
        <nav id="menu">
            <ul>
                <?php
                if (isset($_SESSION['login'])  && $_SESSION['login'] === true) { ?>
                    <button id="play_button" onclick="window.location.href='./game.php'">GIOCA ORA</button>

                <?php } else { ?>
                    <li class="scala"><a href="./loginForm.php">Accedi</a></li>
                <?php } ?>

                <li class="scala"><a href="./paesaggi.php">Paesaggi</a></li>
                <li class="scala" id="tutorial"><a href="./tutorial.php">Come si gioca</a></li>
            </ul>
        </nav>
    </div>

   

    <footer>
        <div id="sx">
            <div class="card">
                <span class="tooltip">Classifica</span>
                <a href="./classifica.php"><img src="../img/icons/iconaClassifica.svg" alt="classifica" id="classifica"></a>
            </div>
        </div>
        <div id="dx">
            <div class="card">
                <span class="tooltip">Audio</span>
                <button id="toggleAudio_btn" onclick="toggleAudio()">
                <img src="../img/icons/sound-on.svg" alt="">
                </button>
            </div>
        </div>

        <?php
        if (isset($_SESSION['login'])  && $_SESSION['login'] === true) { ?>
            <div id="centro">
                <div class="card">
                    <span class="tooltip">Statistiche</span>
                    <a href="./statistiche.php"> <img src="../img/icons/iconaStat.svg" alt="statistiche" id="statistiche"></a>
                </div>
            </div>
        <?php } ?>

    </footer>


    <script src="../js/HomePage.js"></script>
    <script src="../js/logout.js"></script>
    <script src="../js/audio.js"></script>
</body>

</html>