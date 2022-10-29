<?php
  
  use Routers\Router;
  use Controllers\Home;
  use Controllers\Articles;
  use Controllers\Users;
  use Controllers\Comments;
  use Controllers\Error;
  use Controllers\Auth;
  use Controllers\Dashboard;
  
  $router = new Router();
  $config = getConfig();
  
  $baseUrl = $config['routing']['base'];
  
  $router::GET(["$baseUrl", "$baseUrl/home"], function () {
    $route = new Home();
    $route->index();
  });
  
  $router::GET("$baseUrl/users", function () {
    $route = new Users();
    $route->index();
  });
  
  $router::GET("$baseUrl/articles", function ($params) {
    $route = new Articles();
    
    $search = $params[0]['search'] ?? null;
    $page = $params[0]['page'] ?? null;
    
    $route->index($page ?? 1, $search);
  });
  
  $router::GET("$baseUrl/articles/:id", function ($params) {
    $route = new Articles();
    $route->one($params['extra']['id']);
  });
  
  $router::POSt("$baseUrl/articles/:id/delete", function ($params) {
    global $baseUrl;
    $route = new Articles();
    $id = $params['extra']['id'];
    $route->delete($id);
    header("Location: $baseUrl/articles");
  });
  
  $router::POSt("$baseUrl/articles/:id/like", function ($params) {
    global $baseUrl;
    
    $route = new Articles();
    $id = $params['extra']['id'];
    $route->like($id);
    header("Location: $baseUrl/articles");
  });
  
  $router::POSt("$baseUrl/articles/:id/update", function ($params) {
    global $baseUrl;
    
    $route = new Articles();
    $id = $params['extra']['id'];
    $route->fields($id, $_POST);
    header("Location: $baseUrl/articles");
  });
  
  $router::GET("$baseUrl/comments", function () {
    $route = new Comments();
    $route->index();
  });
  
  $router::POST("$baseUrl/comment/new", function () {
    $route = new Comments();
    $route->new($_POST);
  });
  
  $router::GET("$baseUrl/articles/new", function () {
    $route = new Articles();
    $route->new();
  });
  
  $router::POST("$baseUrl/articles/new", function () {
    $route = new Articles();
    $route->create($_POST);
    header('Location: /app/articles');
  });
  
  $router::GET("$baseUrl/registration", function () {
    $route = new Auth();
    $route->registration_get();
  });
  
  $router::POST("$baseUrl/registration", function () {
    $route = new Auth();
    $route->registration_post($_POST);
  });
  
  $router::GET("$baseUrl/login", function () {
    $route = new Auth();
    $route->login_get();
  });
  
  $router::POST("$baseUrl/login", function () {
    $route = new Auth();
    $route->login_post($_POST);
  });
  
  $router::GET("$baseUrl/logout", function () {
    $route = new Auth();
    $route->logout();
  });
  
  $router::GET("$baseUrl/dashboard", function () {
    $route = new Dashboard();
    $route->index();
  });
  
  
  try {
    $router::run();
  } catch (\Exception $err) {
    dump($err->getMessage());
    $error = new Error;
    $error->index();
  }