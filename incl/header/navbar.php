<?php

class Navbar {
  public $login_eng = "login";
  public $login_nl = "login";
  
  public function __construct() {
    if(isset($_SESSION['loggedin'])) {
      $this->login_eng = "logout";
      $this->login_nl = "loguit";
    }
  }
  
  public function showRegister() {
    echo "<li><a class='button top-btn' data-open='register'>Register</a></li>";
  }
}

$navbar = new Navbar();
?>

<!--Navbar-->
<div class="top-bar navbar">
  <div class="top-bar-left">
    <ul class="menu">
      <a href="home">
        <li><img class="logo" src="http://placehold.it/450x183&text=LOGO"></li>
      </a>
    </ul>
  </div>
  <div class="top-bar-right">
    <ul class="menu">
      <li><a href="account">Mijn Account</a></li>
      <?php (empty($_SESSION['loggedin']) ? $navbar->showRegister() : ""); ?>
      <li><a class="button top-btn" data-open="<?php echo $navbar->login_eng; ?>"><?php echo ucfirst($navbar->login_nl); ?></a></li>
    </ul>
  </div>
</div>