<?php
  
  use Routers\Router;
  use Controllers\Home;
  use Controllers\Articles;
  use Controllers\Users;
  use Controllers\Comments;
  use Controllers\Error;
  use Controllers\Auth;
  
  $router = new Router();
  
  $router::GET(['/app/', '/app', '/app/home'], function () {
    $route = new Home();
    $route->index();
  });
  
  $router::GET('/app/users', function () {
    $route = new Users();
    $route->index();
  });
  
  $router::GET('/app/articles', function ($params) {
    $route = new Articles();
    
    $search = $params[0]['search'] ?? null;
    $page = $params[0]['page'] ?? null;
    
    dump($params);
    
    $route->index($page ?? 1, $search);
  });
  
  $router::GET('/app/articles/:id', function ($params) {
    $route = new Articles();
    $route->one($params['extra']['id']);
  });
  
  $router::POSt('/app/articles/:id/delete', function ($params) {
    $route = new Articles();
    $id = $params['extra']['id'];
    $route->delete($id);
    header('Location: /app/articles');
  });
  
  $router::POSt('/app/articles/:id/like', function ($params) {
    $route = new Articles();
    $id = $params['extra']['id'];
    $route->update($id);
    header('Location: /app/articles');
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
    header('Location: /app/articles');
  });
  
  $router::GET('/app/registration', function () {
    $route = new Auth();
    $route->registration_get();
  });
  
  $router::POST('/app/registration', function () {
    $route = new Auth();
    $route->registration_post($_POST);
  });
  
  $router::GET('/app/login', function () {
    $route = new Auth();
    $route->login_get();
  });
  
  $router::POST('/app/login', function () {
    $route = new Auth();
    $route->login_post($_POST);
  });
  
  
  try {
    $router::run();
  } catch (\Exception $err) {
    dump($err->getMessage());
    $error = new Error;
    $error->index();
  }