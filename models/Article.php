<?php

namespace App\Models;

class Article {
  public function getAll(): array {
    return [
      1 => [
        'title'=>'title 1',
        'body'=>'lorem lorem lorem',
      ],
      2 => [
        'title'=>'title 1',
        'body'=>'lorem lorem lorem',
      ],
      3 => [
        'title'=>'title 1',
        'body'=>'lorem lorem lorem',
      ]
    ];
  }
}