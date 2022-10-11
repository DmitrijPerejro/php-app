<?php
  namespace App\Controllers;

  class Admin implements BaseController
  {
    private string $name = 'Admin route';

    public function index()
    {
      var_export($this->name);
    }

    public function create()
    {
      var_dump('method create');
    }

    public function delete()
    {
      var_dump('method delete');
    }
  }