<?php
  require_once __DIR__ . '/init.php';
  use App\Core\DataBase;

  $db = new DataBase();
  $db::connect();

  require_once __DIR__ . '/routers/routing.php';