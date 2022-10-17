<?php

namespace App\Controllers;
use App\Models\User;
use App\View\View;

class Users implements BaseController
{
  private string $name = 'Users page';

  public function index(): void
  {
    $users = new User;

    $data['title'] = $this->name;
    $data['users'] = $users->getAll();

    var_dump('<pre>');
    var_dump(getdate($users->getAll()[0]['reg_date']));
    var_dump('</pre>');
    View::generate('users', $data);
  }
}