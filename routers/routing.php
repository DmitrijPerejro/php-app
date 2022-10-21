<?php
  
  use Routers\Router;
  use Controllers\Home;
  use Controllers\Articles;
  use Controllers\Users;
  use Controllers\Comments;
  use Controllers\Error;
  
  $router = new Router();
  
  $router::GET(['/', '/app/', '/app/home'], function () {
    $route = new Home();
    $route->index();
  });
  
  $router::GET('/app/users', function () {
    $route = new Users();
    $route->index();
  });
  
  $router::GET('/app/users/new', function () {
    $route = new Users();
    $route->new();
  });
  
  $router::POST('/app/users/new', function () {
    $route = new Users();
    $route->newUser($_POST);
  });
  
  $router::GET('/app/articles', function () {
    $route = new Articles();
    $route->index();
  });
  
  $router::GET('/app/comments', function () {
    $route = new Comments();
    $route->index();
  });
  
  $router::POST('/app/comment/new', function () {
    $route = new Comments();
    $route->new($_POST);
  });
  
  $router::GET('/app/articles/new', function () {
    $route = new Articles();
    $route->new();
  });
  
  $router::POST('/app/articles/new', function () {
    $route = new Articles();
    $route->create($_POST);
  });
  
  
  try {
    $router::run();
  } catch (\Exception $err) {
    dump($err->getMessage());
    $error = new Error;
    $error->index();
  }