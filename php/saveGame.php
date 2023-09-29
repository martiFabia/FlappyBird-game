<?php


    if (!isset($_SESSION))
        session_start();

    require_once('config.php'); 

    $connection = new DB();
    $pdo = $connection->getPDO();


    try {

        if (!(isset($_SESSION['login']) && $_SESSION['login'] === true)) {
            throw new Exception('Not logged in');
        }


        $user = $_SESSION['username']; 
        $score = $_POST['score']; 


        if (!isset($user) || !isset($score)){
            throw new Exception('Dati della partita non completi');
        }

        $query = "INSERT INTO game (_username, score) VALUES (?,?)";
    
        $statement = $pdo->prepare($query);
        $statement->bindValue(1, $user);
        $statement->bindValue(2, $score);
        $statement->execute();


        $response = [
            'message' => 'Nuova partita inserita con successo',
        ];

   
    }

    catch (PDOException $e) {
        $response = [
            'error'  => $e->getMessage()
        ];
    }


    echo json_encode($response);

    $connection->close();
    $pdo = null;
        

?>