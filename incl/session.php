<?php

class Session {
  
  public function __construct() {
    session_start();   
  }
}

$session = new Session();
?>