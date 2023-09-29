
let bird = document.createElement('img');
bird.classList.add('bird');


let GameDiv = document.getElementById('GameDiv');
let mess_start = document.getElementById('start');
let mess_score = document.getElementById('mess_score');
let punteggio = document.getElementById('punteggio');
let scoreDiv = document.getElementById('ScoreDiv');


//dimensioni background 
//questa funzione ritorna: DOMReact -> top/y, right, bottom, left/x, width and height
let background = document.querySelector('#background').getBoundingClientRect();

//variab. per le dimensioni bird 
let birdDim;

//variab. che indica se il gioco è in esecuzione o no
let play = false;
//variab. per il punteggio totale
let score = 0;
//spostamento bird asse y 
let bird_y = 0;
//velcità di caduta dell'uccellino                        
let gravity = 0.5;
//velocità del salto                      
let jump = -9;
//variabile per impedire il repeate del keydown 
let down = false;

//velocità con cui si muovono i tubi
let speed = 3.5;

//ogni quanto aumenta la difficolà del gioco
let difficulty = 10;

//intervallo per la creazione dei tubi
let intervalTime = 2000;
let interval;


function setUp() {
    //premere invio per iniziare
    document.addEventListener('keydown', start);
}

setUp();


function start(e) {
    if (e.key == 'Enter' && play == false) {
        play = true;

        bird.setAttribute('src', '../img/bird.png');
        GameDiv.appendChild(bird);
        GameDiv.removeChild(mess_start);
        mess_score.innerHTML = 'Score: ';
        punteggio.innerHTML = score;
        birdDim = bird.getBoundingClientRect();
        game();
    }
}



function game() {
    if (play == false) return;

    interval = setInterval(crea_tubi, intervalTime);

    function jump() {
        if (play == false) return;

        bird_y += gravity;      //incomincia la caduta dell'uccellino, mano che scende la velocità di caduta aumenta

        if (birdDim.top <= 0 || birdDim.bottom >= background.height) {
            play = false;
            fine();
        }

        bird.style.top = birdDim.top + bird_y + 'px';        //aggiorno la posizione di bird
        birdDim = bird.getBoundingClientRect();              //salvo la nuova posizione di bird 
        requestAnimationFrame(jump);

    }

    requestAnimationFrame(jump);

    //quando premi il tasto, bird sale e cambio immagine
    document.addEventListener('keydown', keyDown_func);

    //quando rilasci il tasto, bird continua a scendere 
    document.addEventListener('keyup', keyUp_func);

    function muoviTubi() {
        if (play == false) return;

        let arrayTubi = document.querySelectorAll('.tubo');

        for (let i = 0; i < arrayTubi.length; i++) {

            birdDim = bird.getBoundingClientRect();
            let propTubo = arrayTubi[i].getBoundingClientRect();

            //quando il 'tubo' raggiunge il bordo sx lo rimuovo
            if (propTubo.right <= 0) {
                arrayTubi[i].remove();
            } else {
                checkCollision(propTubo, birdDim);

                if (propTubo.right < birdDim.left && propTubo.right + speed >= birdDim.left) {
                    //+0.5 perchè oltrepassa 2 tubi: quello top e quello bottom 
                    playSound('pew_pew');
                    score += 0.5;
                    punteggio.innerHTML = score;
                }

                arrayTubi[i].style.left = propTubo.left - speed + 'px';
                
                //aumenta difficoltà gioco ogni 10 punti 
                if (score > difficulty) {
                    speed += 0.2;
                    difficulty += 10;
                    gravity += 0.2;
                    if (intervalTime >= 1200) {
                        intervalTime -= 200;
                        clearInterval(interval);
                        interval = setInterval(crea_tubi, intervalTime);
                    }
                }
            }

        }

        requestAnimationFrame(muoviTubi);
    }

    requestAnimationFrame(muoviTubi);
}

function keyDown_func(e) {
    if (down) return;
    down = true;

    if (e.key == 'ArrowUp' || e.key == ' ') {
        bird.src = '../img/bird2.png';
        bird_y = jump;
    }
}

function keyUp_func(e) {
    if (e.key == 'ArrowUp' || e.key == ' ') {
        bird.src = '../img/bird.png'
        playSound('effect_jump');
    }
    down = false;
}

function checkCollision(t, b) {
    if (b.left < t.left + t.width && b.left + b.width > t.left && b.top < t.top + t.height && b.top + b.height > t.top) {
        play = false;
        fine();
    } else
        return;
}



//variab. per la distanza tra tubo top e tubo bottom: circa 1/3 dell'altezza della finestra di gioco 
let gap = (0.3 * background.height);

function crea_tubi() {
    if (play == false) return;

    let tuboTop = document.createElement('img');
    tuboTop.classList.add('tubo');
    tuboTop.setAttribute('src', '../img/tubo_top.png');
    GameDiv.appendChild(tuboTop);

    let tuboHeight = tuboTop.getBoundingClientRect().height;
    let randomTuboY = -Math.random() * (3 / 4 * tuboHeight);

    tuboTop.style.left = background.width + 'px';
    tuboTop.style.top = randomTuboY + 'px';

    let tuboBottom = document.createElement('img');
    tuboBottom.classList.add('tubo');
    tuboBottom.setAttribute('src', '../img/tubo_bottom.png');
    GameDiv.appendChild(tuboBottom);

    tuboBottom.style.left = background.width + 'px';
    tuboBottom.style.top = randomTuboY + tuboHeight + gap + 'px';

}


function fine() {
    if (play) return;

    playSound('effect_die');
    bird_y = 0;
    document.removeEventListener('keyup', keyUp_func);
    document.removeEventListener('keydown', keyDown_func);
    document.removeEventListener('keydown', start);

    clearInterval(interval);

    function cadutaLibera() {
        bird_y += 1;

        if (birdDim.top >= background.height) {
            messaggioFine();
            return;
        }

        bird.style.top = birdDim.top + bird_y + 'px';        //aggiorno la posizione di bird
        birdDim = bird.getBoundingClientRect();              //salvo la nuova posizione di bird 
        requestAnimationFrame(cadutaLibera);

    }

    requestAnimationFrame(cadutaLibera);

    function messaggioFine() {
        scoreDiv.classList.add('hidden');
        document.getElementById('end').classList.remove('hidden');

        bestScore();
        setTimeout(addGame, 1000); 
    }

}


//riporto il gioco allo stato iniziale
function restart() {
    document.querySelectorAll('.tubo').forEach((e) => {
        e.remove();
    });

    bird.remove();
    bird = document.createElement('img');
    bird.classList.add('bird');
    bird_y = 0;
    difficulty = 10;
    speed = 3.5;
    intervalTime = 2000;
    gravity = 0.5;

    document.getElementById('end').classList.add('hidden');
    GameDiv.appendChild(mess_start);
    scoreDiv.classList.remove('hidden');
    mess_score.innerHTML = '';
    punteggio.innerHTML = '';
    score = 0;
    setUp();
    return;
}


function bestScore() {
    let finalScore = document.getElementById('final_score');
    let bestscore = document.getElementById('best_score');

    fetch('./dashboard.php?' + new URLSearchParams({
        action: "stats"
    }), { method: 'GET' })
        .then(res => res.json())
        .then(data => {

            if (data.length) {
                data.forEach(player => {
                    finalScore.innerHTML = 'Score: ' + score;
                    if (player.bestScore === null && score==0) {
                        bestscore.innerHTML = 'Best Score: 0';
                    } else if (player.bestScore === null || score > player.bestScore) {
                        bestscore.innerHTML = 'NEW Best Score: ' + score;
                        bestscore.classList.add('blinking');
                    } else {
                        bestscore.classList.remove('blinking');
                        bestscore.innerHTML = 'Best Score: ' + player.bestScore;
                    }
                });
            }

        });

}


//registro partita nel database 
function addGame() {

    let formdata = new FormData();
    formdata.append("score", score);
    formdata.append("action", "insertDB");

    fetch('./saveGame.php', { method: 'POST', body: formdata })
        .then(res => res.json())
        .then(data => {
            if (data.error) {
                console.log(data.error);
            }
        }
        );
}