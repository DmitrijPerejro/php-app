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
        'comments' => [
          'route' => '/app/comments',
          'title' => 'comments',
        ],
        'login' => [
          'route' => '/app/login',
          'title' => 'login',
        ],
        'registration' => [
          'route' => '/app/registration',
          'title' => 'registration',
        ],
      ];
    }
    
    public function getActiveRoute(): string
    {
      return parse_url($_SERVER['REQUEST_URI'])['path'];
    }
  }