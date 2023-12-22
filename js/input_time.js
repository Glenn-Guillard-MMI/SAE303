flatpickr(".test-time", {
    enableTime: true,
    noCalendar: true,
    time_24hr: true,
    dateFormat: "H:i",
    minuteIncrement: 60,
    minTime: "8:00",
    maxTime: "18:00"
  });
  flatpickr(".test-date", {
    minDate: new Date().fp_incr(7)
  });