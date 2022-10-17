<?php

namespace App\Controllers;
use App\View\View;

class Registration implements BaseController
{
  private string $name = 'Registration route';

  public function index(): void
  {
    // var_dump($_POST);
    var_dump($_GET);

    if (count($_POST) === 0) { // GET ?
      $this->generate([]);
    } else {
      $this->registration($_POST);
    }
  }

  private function generate($data): void {
    View::generate('registration', $data);
  }

  private function registration(array $data): void {
    $email = null;
    $login = null;
    $password = null;

    if (isset($data['email'])) {
      $email = $data['email'];
    }

    isset($data['email']) && $email = $data['email'];
    isset($data['login']) && $login = $data['login'];
    isset($data['password']) && $password = $data['password'];

    $res = [
      'email' => $email,
      'login' => $login,
      'password' => $password,
    ];

    $this->generate($res);
  }
}