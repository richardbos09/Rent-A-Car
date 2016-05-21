<!doctype html>
<html class="no-js" lang="nl">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Rent a Car | Welkom</title>
  <link rel="stylesheet" href="http://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.min.css">
  <link href='http://cdnjs.cloudflare.com/ajax/libs/foundicons/3.0.0/foundation-icons.css' rel='stylesheet' type='text/css'>
  <link href='css/modal.css' rel='stylesheet' type='text/css'>
  <link href='css/custom.css' rel='stylesheet' type='text/css'>

</head>

<body>
  <?php
  require_once "incl/globals.php";
  require_once $globals->database_php;
  
  require_once $globals->navbar_php;
  
  require_once $globals->findcar_php;
  require_once $globals->aboutus_php;
  
  require_once $globals->modalregister_php;
  require_once $globals->modallogin_php;
  
  ?>

  <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
  <script src="http://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.js"></script>
  <script src="js/form.js"></script>
  <script>
    $(document).foundation();
  </script>
  <script type="text/javascript" src="https://intercom.zurb.com/scripts/zcom.js"></script>
</body>

</html>