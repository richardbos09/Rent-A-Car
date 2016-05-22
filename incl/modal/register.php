<?php

class Register extends Database {
  public $emailaddress = "Email";
  
  private $user;
  private $email;
  private $pass;
  private $row;
  
  public function __construct() {
    if(isset($_POST['register'])) {
      $this->connDatabase();
      $this->dbError();
      $this->escString();
      $this->emailExist();
      if($this->row == 0) {
        $this->insertUser();
        $this->backTopage();
      }
      else {
        $this->reportError();
      }
    }
  }
  
  public function escString() {
    $this->user = $_POST['user'];
    $this->email = $_POST['email'];
    $this->pass = $_POST['pass'];
    
    $this->user = mysqli_real_escape_string($this->db, $this->user);
    $this->email = mysqli_real_escape_string($this->db, $this->email);
    $this->pass = mysqli_real_escape_string($this->db, $this->pass);
  }
  
  public function emailExist() {
    $this->sql = "
      SELECT a.account_id, a.account_user, a.account_email, a.account_pass
			FROM accounts AS a
			WHERE a.account_email = '".$this->email."'
    ";
    
    $this->query = mysqli_query($this->db, $this->sql);
    
    $this->row = mysqli_num_rows($this->query);
  }
  
  public function insertUser() {
    $this->sql = "
      INSERT INTO accounts (account_id, account_user, account_email, account_pass)
      VALUES (NULL, '".$this->user."', '".$this->email."', '".$this->pass."')
    ";
    
    $this->query = mysqli_query($this->db, $this->sql);
  }
  
  public function reportError() {
    $this->emailaddress = "Email is al in gebruik";
  }
  
  public function backToPage() {
    header("Location: http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']);
  }
}

$register = new Register();
?>

<!--Modal Register-->
<div class="reveal modal-container" id="register" data-reveal>
  <h1>Register</h1><br>
  <form method="post">
    <input type="text" name="user" placeholder="Gebruikersnaam"  required>
    <input type="email" name="email" placeholder="<?php echo $register->emailaddress; ?>" required>
    <input type="password" id="password" name="pass" placeholder="Wachtwoord" required>
    <input type="password" id="confirm-password" placeholder="Vérifier Wachtwoord" required>
    
    <input type="submit" name="register" class="modal-submit" value="Registreren">
  </form>

  <button class="close-button" data-close aria-label="Close modal" type="button">
    <span aria-hidden="true">&times;</span>
  </button>
</div>