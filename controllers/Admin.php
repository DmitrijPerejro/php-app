<?php
  namespace App\Controllers;

  class Admin implements BaseController
  {
    private string $name = 'Admin route';

    public function index(): void
    {
      var_export($this->name);
    }
  }