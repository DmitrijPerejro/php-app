<?php
  
  namespace Controllers;
  
  use Core\ORM\INSERT;
  use View\View;
  
  class Registration implements BaseController
  {
    private string $name = 'Registration route';
    private string $table = "users";
    
    public function index(): void
    {
      View::generate('registration', []);
    }
    
    public function data($data)
    {
      $login = $data['login'];
      $email = $data['email'];
      $password = $data['password'];
      
      $this->registration($login, $email, $password);
      header('Content-Type: application/json; charset=utf-8');
      http_response_code(200);
      echo 'SUCCESS';
    }
    
    private function registration(string $login, string $email, string $password): void
    {
      $insert = new INSERT();
      $insert->setTable($this->table);
      $insert->execute(['email', 'login', 'password', 'avatar'], ['\'' . $email . '\'', '\'' . $login . '\'', '\'' . $password . '\'', '\'' . 'empty' . '\'']);
    }
  }
  
  // HW