<!doctype html>
<html class="no-js" lang="nl">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Rent a Car | Welkom</title>
  <link rel="stylesheet" href="http://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.min.css">
  <link href='http://cdnjs.cloudflare.com/ajax/libs/foundicons/3.0.0/foundation-icons.css' rel='stylesheet' type='text/css'>
  <link href='https://cdnjs.cloudflare.com/ajax/libs/foundation-datepicker/1.5.3/css/foundation-datepicker.min.css' rel='stylesheet' type='text/css'>
  <link href='https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.10.0/jquery.timepicker.min.css' rel='stylesheet' type='text/css'>
  <link href='css/modal.css' rel='stylesheet' type='text/css'>
  <link href='css/custom.css' rel='stylesheet' type='text/css'>
  <style>
  
  </style>

</head>

<body>
  <?php
  require_once "incl/globals.php";
  require_once $globals->database_php;
  require_once $globals->buffer_php;
  require_once $globals->session_php;
  
  // Header
  require_once $globals->navbar_php;
  
  // Content
  require_once $globals->searchcar_php;
  
  if(empty($_GET['content'])) {
    require_once $globals->aboutus_php;
    $session->lastPage($globals->aboutus_php);
  }
  else {
   switch($_GET['content']) {
    default:
      require_once $globals->aboutus_php;
      $session->lastPage($globals->aboutus_php);
      break;
    case 'register':
      $session->lastVisit();
      break;
    case 'login':
      $session->lastVisit();
      break;
    case 'logout':
      $session->lastVisit();
      break;
    case 'zoek':
      require_once $globals->findcar_php;
      $session->lastPage($globals->findcar_php);
      break;
    case 'reserveer':
      require_once $globals->reservecar_php;
      $session->lastPage($globals->reservecar_php);
    } 
  }
  
  // Modals
  if(empty($_SESSION['loggedin'])) {
    require_once $globals->register_php;
    require_once $globals->login_php;
  }
  else {
    require_once $globals->logout_php;  
  }
  
  ?>

  <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
  <script src="http://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/foundation-datepicker/1.5.3/js/foundation-datepicker.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.10.0/jquery.timepicker.min.js"></script>
  <script src="js/form.js"></script>
  <script src="js/custom.js"></script>
  <script>
    
  </script>
  <script type="text/javascript" src="https://intercom.zurb.com/scripts/zcom.js"></script>
</body>

</html>