document.addEventListener("DOMContentLoaded", function() {
    populateStats();
});



function populateStats(){


    fetch('./dashboard.php?' + new URLSearchParams({
        action: "stats"
    }),{method: 'GET'})
    .then(res => res.json())
    .then(data => {

        if(data.length){
            data.forEach(player => {
                if(player.totalGame == 0){
                    document.getElementById('games').innerHTML= player.totalGame; 
                    document.getElementById('bestscore').innerHTML= 0; 
                    document.getElementById('media').innerHTML= 0; 
                }else {
                    document.getElementById('games').innerHTML= player.totalGame; 
                    document.getElementById('bestscore').innerHTML=player.bestScore; 
                    document.getElementById('media').innerHTML= (player.sommaPunti/player.totalGame).toFixed(2); 
                }
            });
        }

    });
}