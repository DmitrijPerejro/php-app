<?php
  
  namespace Controllers;
  
  use View\View;
  
  class Login implements BaseController
  {
    private string $name = 'Login route';
    
    public function index(): void
    {
      View::generate('login', []);
    }
    
    public function data($data)
    {
      $login = $data['login'];
      $password = $data['password'];
    }
  }
