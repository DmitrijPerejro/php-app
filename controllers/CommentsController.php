<?php

namespace App\Controllers;
use App\Models\Comments;
use App\View\View;

class CommentsController implements BaseController
{
  private string $name = 'Comments page';

  public function index(): void
  {
    $article = new Comments;
    $data['title'] = $this->name;
    $data['comments'] = $article->getAll();
    View::generate('comments', $data);
  }
}