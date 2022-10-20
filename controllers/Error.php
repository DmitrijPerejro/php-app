<?php
  namespace Controllers;
  use View\View;

  class Error implements BaseController
  {
    private string $name = '404 route';

    public function index(): void
    {
      View::generate('404', []);
    }
  }