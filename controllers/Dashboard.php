<?php
  
  namespace Controllers;
  
  use View\View;
  
  class Dashboard implements BaseController
  {
    public function index(): void
    {
      View::generate('dashboard', []);
    }
  }