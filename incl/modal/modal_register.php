<?php

class Register extends Database {
  
  public function __construct() {
    if(isset($_POST['register'])) {
      $this->connDatabase();
      $this->dbError();
    }
  }
  
  
}
?>

<!--Modal Register-->
<div class="reveal modal-container" id="register" data-reveal>
  <h1>Register</h1><br>
  <form method="post">
    <input type="text" name="username" placeholder="Gebruikersnaam"  required>
    <input type="email" name="email" placeholder="Emailadres" required>
    <input type="password" id="password" name="password" placeholder="Wachtwoord" required>
    <input type="password" id="confirm-password" name="confirm-password" placeholder="Vérifier Wachtwoord" required>
    
    <input type="submit" name="register" class="modal-submit" value="Registreren">
  </form>

  <button class="close-button" data-close aria-label="Close modal" type="button">
    <span aria-hidden="true">&times;</span>
  </button>
</div>