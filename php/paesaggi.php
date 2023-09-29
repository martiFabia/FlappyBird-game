<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="../img/favicon.ico">
    <link href="../css/paesaggi.css" type="text/css" rel="stylesheet">
    <link href="../css/header.css" type="text/css" rel="stylesheet">
    <title>Flappy Bird</title>
</head>

<body id="background" onload="paesaggi('check')">
   
    <img src="../img/titolo.png" alt="FlappyBird" id="FlappyBird">

    <form id="paesaggi_form">
        <div id="back">
            <button id="buttonBack" type="submit"></button>
        </div>

            <div class="paesaggi">
                <div class="card">
                    <div class="immagine">
                        <img src="../img/background-img.png" alt="giorno" class="paesaggio">
                    </div>
                    <div class="scelta">
                        <input type="radio" id="giorno" name="choice" value="giorno"><label for="giorno">Vola nel cielo cristallino</label>
                    </div>
                </div>
                <div class="card">
                    <div class="immagine">
                        <img src="../img/notte.png" alt="notte" class="paesaggio">
                    </div>
                    <div class="scelta">
                        <input type="radio" id="notte" name="choice" value="notte" ><label for="notte">Vola tra le tenebre</label> 
                    </div>
                </div>
                <div class="card">
                    <div class="immagine">
                        <img src="../img/mare.png" alt="mare" class="paesaggio">
                    </div>
                    <div class="scelta">
                        <input type="radio" id="mare" name="choice" value="mare"><label for="mare">Nuota tra i relitti marini</label>
                    </div>
                </div>
            </div>
    </form>
    
    <script  src="../js/paesaggi.js" ></script>
</body>
</html>    