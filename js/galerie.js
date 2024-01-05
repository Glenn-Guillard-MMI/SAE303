function supprime(arg) {
  const argument = arg;
  jQuery.ajax({
    url: "_suprresionGalerie.php",
    type: "POST",
    data: {
      supp: argument,
    },
    success: function (data, textStatus, xhr) {
      location.reload();
    },
  });
}

function confirmation(arg){
  document.getElementById('button_suppr').value = arg;
  document.getElementById('overlay').style.display = 'block';
  document.getElementById('confirm').style.display = 'block';
}

function annulSuppr() {
  document.getElementById("button_suppr").value = '';
  document.getElementById("confirm").style.display = "none";
  document.getElementById("overlay").style.display = "none";
}

function anulAjout(){
  document.getElementById("form-ajout").style.display = "none";
  document.getElementById("overlay").style.display = "none";
  var form = document.getElementById("form-ajout");
  for (var i = 0; i < form.elements.length; i++) {
    var element = form.elements[i];
    if (element.type == "text" || element.type == "file") {
      element.value = "";
    }
  }
}

function ajoutGalerie(){
  document.getElementById("form-ajout").style.display = "block";
  document.getElementById("overlay").style.display = "block";
}