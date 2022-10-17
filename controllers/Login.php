<?php

namespace App\Controllers;
use App\View\View;

class Login implements BaseController
{
  private string $name = 'Login route';

  public function index(): void
  {
    var_dump($_POST);
    View::generate('login', []);
  }
}