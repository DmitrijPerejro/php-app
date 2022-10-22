<?php
  
  namespace Controllers;
  
  use Models\User;
  use View\View;
  
  class Users extends JSONController implements BaseController
  {
    private string $name = 'Users page';
    private $model;
    
    public function __construct()
    {
      $this->model = new User();
    }
    
    public function index(): void
    {
      $data['title'] = $this->name;
      $data['users'] = $this->model->getAll();
      View::generate('users', $data);
    }
    
    public function newUser(array $data): void
    {
      try {
        
        if (empty($data)) {
          dump('Not data provided');
          return;
        }
        
        $this->model->new($data);
        $this->jsonOK($data);
      } catch (\Exception $exception) {
        $this->jsonNotOK($exception->getMessage());
      }
    }
    
    public function new(): void
    {
      View::generate('user-new', []);
    }
  }