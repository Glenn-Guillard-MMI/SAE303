document.addEventListener("DOMContentLoaded", function () {
    const liste = ['Tecnam-P92-exter.jpg', 'salleCours.png', 'about.png'];
    var img = document.getElementById('img_slide');
    let index = 0;

    setInterval(function(){
        img.src = 'img/' + liste[index];
        index = (index + 1) % liste.length;
    }, 3000);
});


