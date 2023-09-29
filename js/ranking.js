document.addEventListener("DOMContentLoaded", function() {
    populateRanking();
});



function populateRanking(){

    fetch('./dashboard.php?' + new URLSearchParams({
        action: "ranking"
    }),{method: 'GET'})
    .then(res => res.json())
    .then(data => {

        if (data.length){
            let table = document.getElementById("ranking_table");
            let tbody = table.getElementsByTagName("tbody")[0];
            tbody.innerHTML = "";

            let i = 1;
            let tr, td;
            data.forEach(player => {
                tr = tbody.insertRow();
                td = tr.insertCell();
                td.innerText = i++ + "°";
                td = tr.insertCell();
                td.innerText = player._username;
                td = tr.insertCell();
                td.innerText = player.bestscore;
                td = tr.insertCell();
                td.innerText = player.totalGame;
            });
        }else {
            document.getElementById("span_ranking").innerText='Ancora nessun giocatore in classifica'; 
        }

    });
}