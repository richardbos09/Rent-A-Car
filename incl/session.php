<?php

class Session {
  
  public function __construct() {
    session_start();   
  }
  
  public function rmbrPage($lastvisit) {
    $_SESSION['lastvisit'] = $lastvisit;
  }
  
  public function lastVisit() {
    require_once $_SESSION['lastvisit'];
  }
}

$session = new Session();
?>