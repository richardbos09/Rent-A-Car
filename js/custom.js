$(document).foundation();

var pathname = window.location.pathname;
var paths = pathname.split("/");

var webpages = paths[2];

switch (webpages) {
  case "register":
    $('#register').foundation('open');
    break;
  case "login":
    $('#login').foundation('open');
    break;
  case "loguit":
    $('#logout').foundation('open');
    break;
}

var nowTemp = new Date();
var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);

var checkin = $('.pick-up').fdatepicker({
  format: 'dd-mm-yyyy',
  onRender: function (date) {
    return date.valueOf() < now.valueOf() ? 'disabled' : '';
  }
}).on('changeDate', function (ev) {
  if (ev.date.valueOf() > checkout.date.valueOf()) {
    var newDate = new Date(ev.date)
    newDate.setDate(newDate.getDate() + 1);
    checkout.update(newDate);
  }
  checkin.hide();
  $('.bring-back')[0].focus();
}).data('datepicker');

var checkout = $('.bring-back').fdatepicker({
  format: 'dd-mm-yyyy',
  onRender: function (date) {
    return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
  }
}).on('changeDate', function (ev) {
  checkout.hide();
}).data('datepicker');

$('.begin-time').timepicker({
  'scrollDefault': 'now',
  'timeFormat': 'H:i',
  'disableTextInput': true,
  'show2400': true
});

$('.end-time').timepicker({
  'scrollDefault': 'now',
  'timeFormat': 'H:i',
  'disableTextInput': true,
  'show2400': true
});

function backToPage() {
  location.reload();
}

function notSigned() {
  $('#login').foundation('open');
}

function callOfDays() {
  var price = $(".price").val();
  
  var date1_val = $(".pick-up").val();
  var date1_split = new Date((Number(date1_val.split("-")[2])), (Number(date1_val.split("-")[1]) - 1), (Number(date1_val.split("-")[0])));
  var date1_mili = date1_split.getTime();
  
  var date2_val = $(".bring-back").val();
  var date2_split = new Date((Number(date2_val.split("-")[2])), (Number(date2_val.split("-")[1]) - 1), (Number(date2_val.split("-")[0])));
  var date2_mili = date2_split.getTime();

  // var timeEnd = $("#endtime").val();
  // var time1 = ((Number(timeEnd.split(':')[0]) * 60 + Number(timeEnd.split(':')[1]) * 60) * 60) * 1000;

  // var timeStart = $("#starttime").val();
  // var time2 = ((Number(timeStart.split(':')[0]) * 60 + Number(timeStart.split(':')[1]) * 60) * 60) * 1000;

  // var dateTimeEnd = dateis + time1;
  // var dateTimeStart = dateis + time2;

  var difference = new Date(date2_mili - date1_mili);

  var days = difference / 1000 / 60 / 60 / 24;
  
  var price = price * days;

  $(".subtotal").val(price.toFixed(2));
}