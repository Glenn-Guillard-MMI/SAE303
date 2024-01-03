function accepter(arg) {
  const argument = arg;
  jQuery.ajax({
    url: "_accepterLicence.php",
    type: "POST",
    data: {
      accepter: argument,
    },
    success: function (data, textStatus, xhr) {
      location.reload();
    },
  });
}
function refuser(arg) {
  const argument = arg;
  jQuery.ajax({
    url: "_refuserLicence.php",
    type: "POST",
    data: {
      accepter: argument,
    },
    success: function (data, textStatus, xhr) {
      location.reload();
    },
  });
}
