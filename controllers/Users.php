<?php

namespace Controllers;
use Models\User;
use View\View;

class Users implements BaseController
{
  private string $name = 'Users page';

  public function index(): void
  {
    $users = new User;
    $data['title'] = $this->name;
    $data['users'] = $users->getAll();
    View::generate('users', $data);
  }
}