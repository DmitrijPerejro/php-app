<?php
  
  namespace Models;
  
  class Page
  {
    private string $base;
    
    public function __construct()
    {
      $this->base = getConfig()['routing']['base'];
    }
    
    public function getAll(): array
    {
      return [
        'home' => [
          'route' => "$this->base/home",
          'title' => 'Home',
        ],
        'articles' => [
          'route' => "$this->base/articles",
          'title' => 'articles',
        ],
        'new-articles' => [
          'route' => "$this->base/articles/new",
          'title' => 'New Article',
        ],
        'users' => [
          'route' => "$this->base/users",
          'title' => 'users',
        ],
        'comments' => [
          'route' => "$this->base/comments",
          'title' => 'comments',
        ],
        'login' => [
          'route' => "$this->base/login",
          'title' => 'login',
        ],
        'registration' => [
          'route' => "$this->base/registration",
          'title' => 'registration',
        ],
      ];
    }
    
    public function getActiveRoute(): string
    {
      return parse_url($_SERVER['REQUEST_URI'])['path'];
    }
  }