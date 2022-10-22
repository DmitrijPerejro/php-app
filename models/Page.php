<?php
  
  namespace Models;
  
  class Page
  {
    public function getAll(): array
    {
      return [
        'home' => [
          'route' => '/app/home',
          'title' => 'Home',
        ],
        'articles' => [
          'route' => '/app/articles',
          'title' => 'articles',
        ],
        'new-articles' => [
          'route' => '/app/articles/new',
          'title' => 'New Article',
        ],
        'users' => [
          'route' => '/app/users',
          'title' => 'users',
        ],
        'new-users' => [
          'route' => '/app/users/new',
          'title' => 'New User',
        ],
        'comments' => [
          'route' => '/app/comments',
          'title' => 'comments',
        ],
//        'login' => [
//          'route' => '/app/login',
//          'title' => 'sign in',
//        ],
//        'registration' => [
//          'route' => '/app/registration',
//          'title' => 'sign up',
//        ],
      ];
    }
    
    public function getActiveRoute(): string
    {
      $path = explode("/", $_SERVER["REQUEST_URI"]);
      $count = count($path) - 1;
      $res = $path[$count];
      
      return $res;
    }
  }