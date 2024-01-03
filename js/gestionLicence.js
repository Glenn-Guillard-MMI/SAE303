let attente = true,
    valid = false;

verifButton();

function verifButton() {
    var buttonAtt = document.getElementById('attente-button'),
        buttonValid = document.getElementById('valid-button'),
        liste_attente = document.getElementById('liste_attente'),
        liste_licence = document.getElementById('liste_licence');
    
    if (attente == true) {
        buttonAtt.style.pointerEvents = 'none';
        buttonValid.style.pointerEvents = 'auto';
        
        buttonAtt.style.backgroundColor = '';
        buttonAtt.style.color = '';
        buttonValid.style.backgroundColor = '#002962';
        buttonValid.style.color = '#fff';

        liste_attente.style.display = 'block';
        liste_attente.style.userSelect = 'auto';
        liste_licence.style.display = 'none';
        liste_licence.style.userSelect = 'none';
    }
    if (valid == true) {
        buttonValid.style.pointerEvents = 'none';
        buttonAtt.style.pointerEvents = 'auto';
        
        buttonValid.style.backgroundColor = '#fff';
        buttonValid.style.color = '#002962';
        buttonValid.style.borderColor = '#002962';
        buttonAtt.style.backgroundColor = '#002962';
        buttonAtt.style.color = '#fff';

        liste_attente.style.display = 'none';
        liste_attente.style.userSelect = 'none';
        liste_licence.style.display = 'block';
        liste_licence.style.userSelect = 'auto';
    }
}


function affAttente() {
    attente = true;
    valid = false;
    verifButton();
}

function affValid() {
    attente = false;
    valid = true;
    verifButton();
}