<?php
  
  namespace Controllers;
  
  use Models\Comments as Model;
  use View\View;
  
  class Comments implements BaseController
  {
    private string $name = 'Comments page';
    private $model;
    
    
    public function __construct()
    {
      $this->model = new Model;
    }
    
    public function index(): void
    {
      $data['title'] = $this->name;
      $data['comments'] = $this->model->getAll();
      View::generate('comments', $data);
    }
    
    public function new($data): void
    {
      if (empty($data)) {
        dump('Not data provided');
        return;
      }
      
      $this->model->new($data);
    }
    
    public function like(string $id): void
    {
      $this->model->like($id);
    }
  }