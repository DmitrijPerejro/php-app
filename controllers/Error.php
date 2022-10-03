<?php
  namespace App\Controllers;

  class Error implements BaseController
  {
    private string $name = '404 route';

    public function index(): void
    {
      var_export($this->name);
    }
  }