<?php
  include_once __DIR__ . '/bootstrap.php';
  
  use Core\SessionManager;
  
  SessionManager::start();
  
  include_once __DIR__ . '/routers/routing.php';
  include_once __DIR__ . '/config/config.php';
  

  