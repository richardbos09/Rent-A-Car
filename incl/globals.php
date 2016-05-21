<?php

class Globals {
  protected $project = "/rent_a_car";
  
  public $database_php = "/database.php";
  public $session_php = "/session.php";
  public $navbar_php = "/navbar.php";
  public $findcar_php = "/find_car.php";
  public $aboutus_php = "/about_us.php";
  public $modalregister_php = "/modal_register.php";
  public $modallogin_php = "/modal_login.php";
  
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
    $this->session_php = $this->incl.$this->session_php;
    
    $this->navbar_php = $this->header.$this->navbar_php;
    
    $this->findcar_php = $this->content.$this->findcar_php;
    $this->aboutus_php = $this->content.$this->aboutus_php;
    
    $this->modalregister_php = $this->modal.$this->modalregister_php;
    $this->modallogin_php = $this->modal.$this->modallogin_php;
  }
}

$globals = new Globals();
?>