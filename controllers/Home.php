<?php
  
  namespace Controllers;
  
  use View\View;
  
  class Home implements BaseController
  {
    public function index(): void
    {
      View::generate('home', []);
    }
  }