<?php
  require 'vendor/autoload.php';
  use App\Routers\Router;

  $router = new Router();
  $router->run();