<?php

class Buffer {
  
  public function __construct() {
    ob_start();
  }
}

$buffer = new Buffer();
?>