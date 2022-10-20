<?php
  
  namespace Controllers;
  
  use View\View;
  
  class Home implements BaseController
  {
    private string $name = 'Home route';
    
    public function index(): void
    {
      View::generate('home', []);
    }
  }
  
  // HW