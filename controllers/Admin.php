<?php
  namespace App\Controllers;

  class Admin implements BaseController
  {
    private string $name = 'Admin route';

    public function index(): void
    {
      var_export($this->name);
    }

    public function create(): void
    {
      var_dump('method create');
    }

    public function delete(): void
    {
      var_dump('method delete');
    }

  }