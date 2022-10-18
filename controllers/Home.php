<?php
  namespace Controllers;
  use Models\Article;
  use View\View;

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