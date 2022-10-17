<?php

namespace App\Controllers;
use App\Models\Article;
use App\View\View;

class Articles implements BaseController
{
  private string $name = 'Article page';

  public function index(): void
  {
    $article = new Article;
    $data['title'] = $this->name;
    $data['articles'] = $article->getAll();
    View::generate('articles', $data);
  }
}