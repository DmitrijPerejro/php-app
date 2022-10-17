<?php

namespace App\Models;

class Page
{
  public function getAll(): array {
    return [
      'home' => [
        'route' => 'home',
        'title' => 'Home',
      ],
      'articles' => [
        'route' => 'articles',
        'title' => 'articles',
      ],
      'users' => [
        'route' => 'users',
        'title' => 'users',
      ],
      'admin' => [
        'route' => 'admin',
        'title' => 'admin',
      ],
      'login' => [
        'route' => 'login',
        'title' => 'sign in',
      ],
      'registration' => [
        'route' => 'registration',
        'title' => 'sign up',
      ],
      'comments' => [
        'route' => 'comments',
        'title' => 'comments',
      ],
    ];
  }

  public function getActiveRoute(): string {
    $path = explode("/", $_SERVER["REQUEST_URI"]);
    $count = count($path) - 1;
    $res = $path[$count];

    return $res;
  }
}