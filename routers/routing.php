<?php
use Routers\Router;
use Controllers\Home;
use Controllers\Articles;
use Controllers\Users;
use Controllers\Login;
use Controllers\Registration;

$router = new Router();

$router::GET(['/', '/app/', '/app/home'], function () {
  $route = new Home();
  $route->index();
});

$router::GET('/app/users', function () {
  $route = new Users();
  $route->index();
});

$router::GET('/app/articles', function () {
  $route = new Articles();
  $route->index();
});

$router::GET('/app/login', function () {
  $route = new Login();
  $route->index();
});

$router::POST('/app/login/data', function () {
  $route = new Login();
  $route->data($_POST);
});

$router::GET('/app/registration', function () {
  $route = new Registration();
  $route->index();
});

$router::POST('/app/registration/data', function () {
  $route = new Registration();
  $routeUser = new Users();
  $route->data($_POST);
  $routeUser->index();
});


$router::run();