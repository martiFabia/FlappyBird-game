<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="../img/favicon.ico">
    <link href="../css/header.css" type="text/css" rel="stylesheet">
    <link href="../css/tutorial.css" type="text/css" rel="stylesheet">

    <title>Flappy Bird</title>
</head>

<body id="background" onload="changebg()">

    <?php
        require("./header.php");
    ?>
    
    <div id="container">

        <p id="intro">Flappy Bird è un gioco semplice ma impegnativo in cui l'obbiettivo
            è far volare un uccellino attraverso una continua serie di tubi verdi senza colpire alcun ostacolo.</p>

        <p id="istruzioni">Accedi subito per poter iniziare a giocare inserendo il tuo username e password. Se ancora non fai parte della community registrati!
        Prima di iniziare la tua partita puoi scegliere il paesaggio in cui volare e impostare il volume degli effetti sonori. 
        <br> Controlla le statistiche dei tuoi punteggi e scala la classifica per entrare nella TOP 5! </p>
        
        <h3>Poche semplici regole</h3>
        <p id="regole">Per spiccare il volo ed iniziare l'avventura basta premere il tasto INVIO. Per far sbattere le ali al tuo uccellino e farlo volare, puoi premere <img src="../img/icons/arrowup-svgrepo-com.svg" alt="" id="arrowUp"> oppure la barra spaziatrice.
            Se i click sono ripetuti l'uccellino volerà sempre più in alto.
           <br> Ma attenzione, perchè se i tasti vengono tenuti premuti o non si effettua nessuna azione,
            l'uccellino cadrà automaticamente verso il basso, quindi tieni sempre d'occhio la sua posizione e attento ai tubi!</p>

        <p id="fine">Il gioco diventa sempre più difficile man mano che avanzi, con i tubi che si avvicinano sempre di più e la velocità che aumenta.
           <br> Cerca di attraversare più tubi possibili, batti il tuo record personale e scala la classifica!</p>
    </div>

    <script src="../js/HomePage.js"></script>
</body>

</html>