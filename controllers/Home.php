<?php
  namespace App\Controllers;

  class Home implements BaseController
  {
    private string $name = 'Home route';

    public function index(): void
    {
      var_export($this->name);
    }
  }