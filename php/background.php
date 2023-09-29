<?php 
   if (!isset($_SESSION))
        session_start();

    //la prima volta che accedo il background di default è giorno, dopo mantengo sempre la scelta che ho effettuato
   
    if (isset($_POST['choice'])) {
        $_SESSION['background'] = $_POST['choice'];
        $_SESSION['default'] = false; 
    } else if(!isset($_SESSION['default']) ||  $_SESSION['default'] ){
        $_SESSION['background'] = 'giorno';
    }

 
    echo json_encode($_SESSION['background']);

?>