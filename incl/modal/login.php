<?php

class Login extends Database {
  public $emailaddress = "Email";
  public $password = "Wachtwoord";
  
  private $email;
  private $pass;
  private $accounts;
  private $row;
  
  public function __construct() {
    if(isset($_POST['login'])) {
      $this->connDatabase();
      $this->dbError();
      $this->escString();
      $this->userExist();
      if($this->row == 1) {
        $this->initSession();
        $this->backToHome();
      }
      else {
        $this->reportError();
      }
    }
  }
  
  public function escString() {
    $this->email = $_POST['email'];
    $this->pass = $_POST['pass'];
    
    $this->email = mysqli_real_escape_string($this->db, $this->email);
    $this->pass = mysqli_real_escape_string($this->db, $this->pass);
  }
  
  
  public function userExist() {
    $this->sql = "
      SELECT a.account_id, a.account_user, a.account_email, a.account_pass
			FROM accounts AS a
			WHERE a.account_email = '".$this->email."'
				AND a.account_pass = '".$this->pass."'
    ";
    
    $this->query = mysqli_query($this->db, $this->sql);
    
    while($this->rows = mysqli_fetch_assoc($this->query)) {
      $this->accounts = $this->rows;
    }
    
    $this->row = mysqli_num_rows($this->query);
  }
  
  public function initSession() {
    $_SESSION['loggedin'] = $this->accounts;
  }
  
  public function reportError() {
    $this->emailaddress = "Email is verkeerd";
    $this->password = "Wachtwoord is verkeerd";
  }
  
  public function backToHome() {
    header("Location: http://".$_SERVER['SERVER_NAME'].$this->project);
  }
}

$login = new Login();
?>

<!--Modal Login-->
<div class="reveal modal-container" id="login" data-reveal>
  <h1>Login</h1><br>
  <form method="post">
    <input type="email" name="email" placeholder="<?php echo $login->emailaddress; ?>" required>
    <input type="password" name="pass" placeholder="<?php echo $login->password; ?>" required>
    
    <input type="submit" name="login" class="modal-submit" value="Inloggen">
  </form>

  <button class="close-button" data-close aria-label="Close modal" type="button">
      <span aria-hidden="true">&times;</span>
    </button>
</div>