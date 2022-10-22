<?php
  
  namespace Controllers;
  
  use Core\ORM\Insert;
  use View\View;
  use Models\User;
  
  class Registration extends JSONController implements BaseController
  {
    private string $name = 'Registration route';
    private string $table = "users";
    private $model;
    
    public function __construct()
    {
      $this->model = new User();
    }
    
    public function index(): void
    {
      View::generate('registration', []);
    }
    
    
    public function new(array $data): void
    {
      
      try {
        $this->model->new($data);
        $this->jsonOK($data);
      } catch (\Exception $exception) {
        $this->jsonNotOK($exception->getMessage());
      }
    }
  }