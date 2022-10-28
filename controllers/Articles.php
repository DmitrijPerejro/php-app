<?php
  
  namespace Controllers;
  
  use Models\Article;
  use View\View;
  
  class Articles
  {
    private string $name = 'Article page';
    private $model;
    
    public function __construct()
    {
      $this->model = new Article;
    }
    
    public function index(int $page, $search): void
    {
      $data['title'] = $this->name;
      $data['articles'] = $this->model->getAll($page, $search);
      $data['total'] = $this->model->getTotal($search);
      $data['totalPages'] = floor($data['total'] / 10);
      $data['currentPage'] = $page;
      $data['hasNextPage'] = $data['totalPages'] != $page - 1;
      $data['hasPrevPage'] = $page !== 1;
      $data['search'] = $search ?? '';
      
      View::generate('articles', $data);
    }
    
    public function one(string $id): void
    {
      $data['article'] = $this->model->getOne($id)[0];
      View::generate('article', $data);
    }
    
    public function new(): void
    {
      View::generate('article-new', []);
    }
    
    public function create(array $data): void
    {
      if (empty($data)) {
        dump('Not data provided');
        return;
      }
      
      $this->model->create($data);
    }
  }