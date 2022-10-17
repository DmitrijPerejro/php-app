<?php
  namespace App\Controllers;
  use App\Models\Article;
  use App\View\View;

  class Home implements BaseController
  {
    private string $name = 'Home route';

    public function index(): void
    {
      $article = new Article;
      $data['articles'] = $article->getAll();
      View::generate('home', $data);
    }
  }