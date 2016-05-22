<?php

class Navbar {
  public $login = "login";
  
  public function __construct() {
    if(isset($_SESSION['loggedin'])) {
      $this->login = "loguit";
    }
  }
  
  public function showRegister() {
    echo "<li><a href='register' class='button top-btn'>Register</a></li>";
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
      <li><a href="<?php echo $navbar->login; ?>" class="button top-btn"><?php echo ucfirst($navbar->login); ?></a></li>
    </ul>
  </div>
</div>