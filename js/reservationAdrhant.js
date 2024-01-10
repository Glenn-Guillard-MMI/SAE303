function SuppressionBatptemeAdherant(arg) {
  const argument = arg;
  jQuery.ajax({
    url: "_suppresionreservationadhearnt.php",
    type: "POST",
    data: {
      id: argument,
    },
    success: function (data, textStatus, xhr) {
      location.reload();
    },
  });
}
function SuppressionForfaitAdherant(arg) {
  const argument = arg;
  jQuery.ajax({
    url: "_suppresionreservationforfiatadhearnt.php",
    type: "POST",
    data: {
      id: argument,
    },
    success: function (data, textStatus, xhr) {
      location.reload();
    },
  });
}
function SuppressionFormationAdherant(arg) {
  const argument = arg;
  jQuery.ajax({
    url: "_suppresionreservationformationadhearnt.php",
    type: "POST",
    data: {
      id: argument,
    },
    success: function (data, textStatus, xhr) {
      location.reload();
    },
  });
}
