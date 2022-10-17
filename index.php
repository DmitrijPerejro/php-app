<?php
  require 'vendor/autoload.php';
  use App\Routers\Router;
  use App\Core\DataBase;

  $db = new DataBase();
  $db::connect();

  $router = new Router();
  $router->run();