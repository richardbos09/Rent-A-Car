<?php

class Session {
  
  public function __construct() {
    session_start();   
  }
  
  public function lastPage($lastvisit) {
    $_SESSION['lastvisit'] = $lastvisit;
  }
  
  public function lastVisit() {
    require_once $_SESSION['lastvisit'];
  }
}

$session = new Session();
?>