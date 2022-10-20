<?php
  
  namespace Controllers;
  
  use Models\Article;
  use View\View;
  
  class Articles implements BaseController
  {
    private string $name = 'Article page';
    private $model;
    
    public function __construct()
    {
      $this->model = new Article;
    }
    
    public function index(): void
    {
      $data['title'] = $this->name;
      $data['articles'] = $this->model->getAll();
      View::generate('articles', $data);
    }
    
    public function create(array $data): void
    {
      $this->model->create($data);
    }
    
    public function edit(string $id, string $field, string $value): void
    {
      $this->model->edit($id, $field, $value);
    }
    
    public function delete(string $id): void
    {
      $this->model->delete($id);
    }
  }
  
  // HW