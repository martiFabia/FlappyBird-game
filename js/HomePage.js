
let imgBackground=document.getElementById('background'); 


function changebg () {

    let bg= new FormData(); 
    bg.append('data', 'background'); 

    fetch('./background.php', {method: 'POST', body: bg})
   
        .then(response => response.json()) 
        .then(background => {
            if (background === 'notte') {
                imgBackground.style.backgroundImage = "url('../img/notte.png')";
            } else if (background === 'mare') {
                imgBackground.style.backgroundImage = "url('../img/mare.png')";
            } else {
                imgBackground.style.backgroundImage = "url('../img/background-img.png')";
            }
        })

        .catch(error => {
            console.log('Error fetching data:', error);
         });

}


