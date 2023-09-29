<?php

    if (!isset($_SESSION))
        session_start();

    require_once('config.php'); 

    $connection = new DB();
    $pdo = $connection->getPDO();



    if($_GET['action']==='ranking'){
    
        $query = ("SELECT bs._username, bs.bestscore, tg.totalGame 
                    FROM (SELECT g._username, COUNT(*) AS totalGame 
                          FROM game g
                          GROUP BY g._username) AS tg 
                    INNER JOIN (SELECT g2._username, MAX(g2.score) AS bestscore 
                                FROM game g2 
                                GROUP BY g2._username) AS bs 
                    ON tg._username=bs._username 
                    ORDER BY `bs`.`bestscore` DESC
                    LIMIT 5");

        $statement = $pdo->prepare($query);
        $statement->execute();

        $res = $statement->fetchAll(PDO::FETCH_ASSOC);


    } else if ($_GET['action']==='stats') {
        
        $player = $_SESSION['username']; 

        $query = ("SELECT COUNT(*) AS totalGame, MAX(g.score) AS bestScore, SUM(g.score) AS sommaPunti
                   FROM game g
                   WHERE g._username = '$player' "); 

        $statement = $pdo->prepare($query);
        $statement->execute();

        $res = $statement->fetchAll(PDO::FETCH_ASSOC);

    }


    echo json_encode($res);

    $connection->close();
    $pdo = null;

 
?>