
let imgBackground = document.getElementById('background');
let giorno = document.getElementById('giorno');
let notte = document.getElementById('notte');
let mare = document.getElementById('mare');


giorno.addEventListener('change', () => {
    imgBackground.style.backgroundImage = "url('../img/background-img.png')";
})

notte.addEventListener('change', () => {
    imgBackground.style.backgroundImage= "url('../img/notte.png')";
})


mare.addEventListener('change', () => {
    imgBackground.style.backgroundImage = "url('../img/mare.png') ";
})




document.addEventListener("DOMContentLoaded", function () {

    document.getElementById("paesaggi_form").addEventListener("submit", (e) => paesaggi(e))

});

function paesaggi(e) {
    if(e != 'check'){
        e.preventDefault(); 
    }

    let formData = new FormData(e.target);
    formData.append("action", "paesaggi");

    fetch('./background.php', { method: 'POST', body: formData })
        .then(response => response.json())
        .then(background => {
            if (background === 'notte') {
                imgBackground.style.backgroundImage = "url('../img/notte.png')";
                notte.checked = true;
            } else if (background === 'mare') {
                imgBackground.style.backgroundImage = "url('../img/mare.png')";
                mare.checked = true;
            } else {
                imgBackground.style.backgroundImage = "url('../img/background-img.png')";
                giorno.checked = true;
            }
    
            if(e != 'check'){
                window.location.href = '../php/index.php';
            }
            
    
        })

        .catch(error => {
            console.log('Error fetching data:', error);
         });
}





