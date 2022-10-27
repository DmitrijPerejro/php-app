<?php
  
  namespace Controllers;
  
  use View\View;
  use Core\Cookies;
  
  class Home implements BaseController
  {
    private string $name = 'Home route';
    
    public function index(): void
    {
      
      
      View::generate('home', []);
    }
  }