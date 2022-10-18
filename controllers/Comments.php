<?php

namespace Controllers;
use Models\Comments as A;
use View\View;

class Comments implements BaseController
{
  private string $name = 'Comments page';

  public function index(): void
  {
    $article = new A;
    $data['title'] = $this->name;
    $data['comments'] = $article->getAll();
    View::generate('comments', $data);
  }
}