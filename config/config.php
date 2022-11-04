<?php
  function getConfig()
    var_dump($_SERVER['SERVER_ADDR']);
  {
    return $_SERVER['SERVER_ADDR'] === '127.0.0.1' ?
      include __DIR__ . '/dev.config.php' :
      include __DIR__ . '/prod.config.php';
    
  }