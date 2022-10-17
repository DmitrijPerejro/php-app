<?php

namespace App\Controllers;
use App\View\View;
use App\Models\User;

class Registration implements BaseController
{
  private string $name = 'Registration route';
  private $model;

  public function __construct()
  {
    $this->model = new User;
  }

  public function index(): void
  {
    View::generate('registration', []);
  }

  public function data($data) {
    $login = $data['login'];
    $email = $data['email'];
    $password = $data['password'];

    $this->model->registration($login, $email, $password);
  }
}