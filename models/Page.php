<?php

namespace App\Models;

class Page
{
  public function getAll(): array {
    return [
      'home' => [
        'route' => 'home',
        'title' => 'Home',
        'active' => $this->isActiveRoute('home')
      ],
      'articles' => [
        'route' => 'articles',
        'title' => 'articles',
        'active' => $this->isActiveRoute('articles')
      ],
      'users' => [
        'route' => 'users',
        'title' => 'users',
        'active' => $this->isActiveRoute('users')
      ],
      'admin' => [
        'route' => 'admin',
        'title' => 'admin',
        'active' => $this->isActiveRoute('admin')
      ],
    ];
  }

  private function isActiveRoute(string $route): bool {
    $path = explode("/", $_SERVER["REQUEST_URI"]);
    $count = count($path) - 1;
    $res = $path[$count];

    return $res === $route;
  }
}