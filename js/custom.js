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
  'disableTextInput' : true,
  'show2400': true
});

$('.end-time').timepicker({ 
  'scrollDefault': 'now',
  'timeFormat': 'H:i',
  'disableTextInput' : true,
  'show2400': true
});

alert("test");