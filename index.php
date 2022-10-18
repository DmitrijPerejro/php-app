<?php
  error_reporting(E_ALL);
  ini_set('display_errors', '1');
  require 'vendor/autoload.php';
  use Core\DataBase;

  $db = new DataBase();
  $db::connect();

  include_once __DIR__ . '/routers/routing.php';