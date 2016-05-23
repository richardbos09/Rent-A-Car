<?php

class Globals {
  protected $project = "/rent_a_car";
  protected $home = "/home";
  protected $btw = "21";
  
  public $database_php = "/database.php";
  public $buffer_php = "/buffer.php";
  public $session_php = "/session.php";
  public $navbar_php = "/navbar.php";
  public $aboutus_php = "/about_us.php";
  public $myaccount_php = "/my_account.php";
  public $searchcar_php = "/search_car.php";
  public $findcar_php = "/find_car.php";
  public $reservecar_php = "/reserve_car.php";
  public $rentcar_php = "/rent_car.php";
  public $register_php = "/register.php";
  public $login_php = "/login.php";
  public $logout_php = "/logout.php";
  public $alert_php = "/alert.php";
  
  private $root;
  private $incl = "/incl";
  private $header = "/header";
  private $content = "/content";
  private $modal = "/modal";
  
  public function __construct() {
    $this->root = $_SERVER['DOCUMENT_ROOT'].$this->project;
    $this->dirPaths();
    $this->inclScripts();
  }
  
  public function dirPaths() {
    $this->incl = $this->root.$this->incl;
    
    $this->header = $this->incl.$this->header;
    $this->content = $this->incl.$this->content;
    $this->modal = $this->incl.$this->modal;
  }
  
  public function inclScripts() {
    $this->database_php = $this->incl.$this->database_php;
    $this->buffer_php = $this->incl.$this->buffer_php;
    $this->session_php = $this->incl.$this->session_php;
    
    $this->navbar_php = $this->header.$this->navbar_php;
    
    $this->aboutus_php = $this->content.$this->aboutus_php;
    $this->myaccount_php = $this->content.$this->myaccount_php;
    $this->searchcar_php = $this->content.$this->searchcar_php;
    $this->findcar_php = $this->content.$this->findcar_php;
    $this->reservecar_php = $this->content.$this->reservecar_php;
    
    $this->rentcar_php = $this->modal.$this->rentcar_php;
    $this->alert_php = $this->modal.$this->alert_php;
    $this->register_php = $this->modal.$this->register_php;
    $this->login_php = $this->modal.$this->login_php;
    $this->logout_php = $this->modal.$this->logout_php;
  }
}

$globals = new Globals();
?>