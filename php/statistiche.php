<?php
    if (!isset($_SESSION))
        session_start();

    if (!isset($_SESSION['login']) || $_SESSION['login'] === false) {
        header("location: loginForm.php");
        exit;
    }

    $player = $_SESSION['username'];
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="../img/favicon.ico">
    <link href="../css/header.css" type="text/css" rel="stylesheet">
    <link href="../css/stat.css" type="text/css" rel="stylesheet">
    <title>Flappy Bird</title>
</head>

<body id="background" onload="changebg()">

    <?php
        require("./header.php");
    ?>

    <div id="container">
        <div id="header">
            <h2> <?php echo $player; ?> </h2>
            <h3>LE TUE STATISTICHE</h3>
        </div>
  
        
        <div id="container_card">
            <div class="card card-1">
                <div class="text">Partite giocate</div>
                <div id="games"></div>
                <span>🎯</span>
            </div>
            <div class="card card-2">
                <div class="text">Best Score</div>
                <div id="bestscore"></div>
                <span>🏆</span>
            </div>
            <div class="card card-3">
                <div class="text">Media punti</div>
                <div id="media"></div>
                <span>📊</span>
            </div>
        </div>

    </div>



    <script src="../js/HomePage.js"></script>
    <script src="../js/statistiche.js"></script>
</body>

</html>