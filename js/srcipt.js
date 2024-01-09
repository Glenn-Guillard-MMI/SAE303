function meteoAPI(data) {
  //console.log(data);
  for (var i = 0; i < 7; i++) {
    temperature = data.list[i].main.temp;
    temperature = temperature.toFixed(1);
    $("#temperature" + [i]).text(temperature + "°");
    switch (data.list[i].weather[0].main) {
      case "Clear":
        $("#temp" + [i]).text("Dégagé");
        break;
      case "Clouds":
        $("#temp" + [i]).text("Nuageux");
        break;
      case "Rain":
        $("#temp" + [i]).text("Pluvieux");
        break;
      case "Snow":
        $("#temp" + [i]).text("Neige");
        break;
      case "Thunderstorm":
        $("#temp" + [i]).text("Orageux");
        break;
      case "Fog":
        $("#temp" + [i]).text("Brouillard");
        break;
      case "Windy":
        $("#temp" + [i]).text("Vent");
        break;
      case "Haze":
        $("#temp" + [i]).text("Brouillard");
        break;
      case "Dust":
        $("#temp" + [i]).text("Brouillard");
        break;
      case "Smoke":
        $("#temp" + [i]).text("Brouillard");
        break;
    }
    //$("#temp" + [i]).text(data.list[i].weather[0].main);
    document.getElementById("meteo" + [i]).alt = data.list[i].weather[0].main;
    if (
      data.list[i].weather[0].main == "Smoke" ||
      data.list[i].weather[0].main == "Dust" ||
      data.list[i].weather[0].main == "Haze" ||
      data.list[i].weather[0].main == "Fog"
    ) {
      document.getElementById("meteo" + [i]).src = "img/meteo/Fog.png";
    } else {
      document.getElementById("meteo" + [i]).src =
        "img/meteo/" + data.list[i].weather[0].main + ".png";
    }
  }
  let dateActuelle = new Date();
  let joursSemaine = [
    "Dimanche",
    "Lundi",
    "Mardi",
    "Mercredi",
    "Jeudi",
    "Vendredi",
    "Samedi",
  ];
  for (let i = 0; i < 7; i++) {
    let dateCourante = new Date(dateActuelle);
    dateCourante.setDate(dateCourante.getDate() + i);
    let jourSemaine = joursSemaine[dateCourante.getDay()];
    let numeroJour = dateCourante.getDate();
    let mois = dateCourante.toLocaleString("fr", { month: "long" });
    let dateFormatee = `${jourSemaine} ${numeroJour} ${mois}`;
    $("#date" + [i]).text(dateFormatee);
  }
}

var lien =
  "https://api.openweathermap.org/data/2.5/forecast?q=Vesoul&lang=fr&appid=03eb7eaf9ff20a24a7303d08dec1b9f6&units=metric";

$.getJSON(lien, meteoAPI);
