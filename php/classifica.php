<?php
if (!isset($_SESSION))
    session_start();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="../img/favicon.ico">
    <link href="../css/header.css" type="text/css" rel="stylesheet">
    <link href="../css/stat.css" type="text/css" rel="stylesheet">
    <link href="../css/classifica.css" type="text/css" rel="stylesheet">
    <title>Flappy Bird</title>
</head>

<body id="background" onload="changebg()">

    <?php
        require("./header.php");
    ?>

    <div id="container">
        <div id="header">
            <h3>TOP 5</h3>
            <p id="span_ranking"></p>
        </div>


        <table id="ranking_table">
            <thead>
                <tr>
                    <th> </th>
                    <th>Giocatore</th>
                    <th>Best Score</th>
                    <th>Partite</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>


    <script src="../js/HomePage.js"></script>
    <script src="../js/ranking.js"></script>
</body>

</html>