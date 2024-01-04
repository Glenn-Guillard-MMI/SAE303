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
