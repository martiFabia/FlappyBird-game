
//di default il volume è attivo
let effectsVolume;

if(sessionStorage.getItem('effectsVolume') == null){
    sessionStorage.setItem('effectsVolume', 0.15); 
    effectsVolume = sessionStorage.getItem('effectsVolume');
}else {
    
    effectsVolume = sessionStorage.getItem('effectsVolume');
    document.getElementById('toggleAudio_btn').innerHTML = (sessionStorage.getItem('effectsVolume')!=0) ? "<img src=\"../img/icons/sound-on.svg\" alt=\"\">" : "<img src=\"../img/icons/sound-off.svg\" alt=\"\">";
}
  


function playSound(name){
    let sound = new Audio("../audio/" + name + ".mp3");
	sound.volume = effectsVolume;
	sound.play();
}

let toggleAudio = () => {
    effectsVolume = effectsVolume ? 0 : 0.15;
    sessionStorage.setItem('effectsVolume', effectsVolume);
    document.getElementById('toggleAudio_btn').innerHTML = (effectsVolume) ? "<img src=\"../img/icons/sound-on.svg\" alt=\"\">" : "<img src=\"../img/icons/sound-off.svg\" alt=\"\">";
    
    //rimuovo focus button
    document.getElementById('toggleAudio_btn').blur(); 
}

