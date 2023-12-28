function supression(arg) {
  const argument = arg;
  jQuery.ajax({
    url: "_suppresionAvion.php",
    type: "POST",
    data: {
      Suprresion: argument,
    },
    success: function (data, textStatus, xhr) {
      $("#Matricule_" + arg).remove();
    },
  });
}
