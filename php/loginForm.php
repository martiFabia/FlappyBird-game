<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="../img/favicon.ico">
    <link href="../css/header.css" type="text/css" rel="stylesheet">
    <link href="../css/register.css" type="text/css" rel="stylesheet">
    <link href="../css/login.css" type="text/css" rel="stylesheet">
    <title>Flappy Bird</title>
</head>
<body id="background" onload="changebg()">
   
    <?php
        require("./header.php");
    ?>


    <div id="divLogin" class="divForm">
        <form id="login_form">
            <h1>ACCEDI</h1>
            <div class="input-group">
                <input type="text" id="username_login" name="username_login" placeholder="Username">
            </div>
            <div class="input-group">
                <input type="password" id="password_login" name="password_login" placeholder="Password">
            </div>
            <input type="submit" value="Accedi">

            <span class="form_message" id="form_message_login"></span>
            <p>Non hai ancora un Account? <a href="#register" onclick="goTo('reg')" id="registrati">Registrati</a></p>
        </form>
    </div>




    <div id="divReg" class="divForm hidden">
        <form id="register_form">
            <h2>REGISTRAZIONE <br>UTENTE</h2>
    
            <div class="input-group">
                <input type="text" name="username" id="username" placeholder="Username" required>
                <span id="span_username_available"></span>
                <span id="span_username"></span>
            </div>

            <div class="input-group">
                <input type="password" name="password" id="password" placeholder="Password" required>
                <span class="eyeIcons"><img src="../img/icons/eye-solid.svg" alt="" onclick="togglePassword(this, 'password')" ></span>
                <span id="span_password"></span>
            </div>

            <div class="input-group">
                <input type="password" name="ConfermaPassword" id="ConfermaPassword" placeholder="Conferma password" required>
                <span class="eyeIcons"><img src="../img/icons/eye-solid.svg" alt="" onclick="togglePassword(this, 'ConfermaPassword')" ></span>
                <span id="span_conferma_password"></span>
            </div>

            <input type="submit" id="submit" value="Registrati">

            
            <span class="form_message" id="form_message_register"></span>

            <p>Hai già un Account? <a href="#login" onclick="goTo('login')" id="accedi">Accedi</a></p>
        </form>
    </div>

    <div class="success hidden">
        <div class="registered_modal">
            <h3 class="registered_message">Registrazione effettuata!</h3>
            <div class="registered_btngroup">
                <button id="toLogin" onclick="goTo('login')">Vai al Login</button>
            </div>
        </div>
    </div>


    
    
    <script src="../js/HomePage.js" ></script>
    <script src="../js/register.js" ></script>
</body>
</html>







   