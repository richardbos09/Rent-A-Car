$(document).foundation();

var pathname = window.location.pathname; // Returns path only
var paths = pathname.split("/");

var webpages = paths[2];

switch (webpages) {
  case "register":
    $('#register').foundation('open');
    break;
  case "login":
    $('#login').foundation('open');
    break;
}

$(function () {
  $('#pick-up').fdatepicker({
    format: 'dd-mm-yyyy',
    disableDblClickSelection: true
  });
});

$(function () {
  $('#bring-back').fdatepicker({
    format: 'dd-mm-yyyy',
    disableDblClickSelection: true
  });
});