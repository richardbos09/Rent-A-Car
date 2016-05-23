var password = document.getElementById("password")
var confirm_password = document.getElementById("confirm-password");

function validatePassword() {
  if (password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Wachtwoorden komen niet overeen");
  }
  else {
    confirm_password.setCustomValidity('');
  }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;

function validateReserve(id) {
  var id = id;

  var subtotal = $('.subtotal').val();
  var percentage = $('.btw').val();
  var btw = subtotal / 100 * $('.btw').val();
  var btw = btw.toFixed(2);

  var pickup = $('.pick-up').val();
  var bringback = $('.bring-back').val();
  var begintime = $('.begin-time').val();
  var endtime = $('.end-time').val();

  if (pickup && bringback && begintime && endtime) {
    $.ajax({
      type: "POST",
      url: "incl/modal/rent_car.php",
      data: {
        id: id,
        pickup: pickup,
        bringback: bringback,
        begintime: begintime,
        endtime: endtime,
        subtotal: subtotal,
        percentage: percentage,
        btw: btw,
      },
      success: function (data) {
        $("#rent").replaceWith(data)
      },
      complete: function (data) {
        $(document).foundation();
        $('#rent').foundation('open');
      }
    });
  }
  else {
    $('#alert').foundation('open');
  }
}