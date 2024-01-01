function modifCompte(){
    document.getElementById("modif_compte").style.display="block";
    document.getElementById("modif_compte").style.userSelect="auto";
    document.getElementById("overlay").style.display="block";
}

function annulModif(){
    document.getElementById("modif_compte").style.display="none";
    document.getElementById("overlay").style.display="none";
    document.getElementById("modif_compte").style.userSelect="none";
}

function modifMdp(){
    document.getElementById("modif_mdp").style.display="block";
    document.getElementById("overlay").style.display="block";
    document.getElementById("modif_mdp").style.userSelect="auto";
}

function annulMdp(){
    document.getElementById("modif_mdp").style.display="none";
    document.getElementById("overlay").style.display="none";
    document.getElementById("modif_mdp").style.userSelect="none";
}