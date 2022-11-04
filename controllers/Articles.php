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
      $data['totalPages'] = floor($data['total'] / $this->model->limit);
      $data['currentPage'] = $page;
      $data['hasNextPage'] = $data['totalPages'] != $page - 1;
      $data['hasPrevPage'] = $page !== 1;
      $data['search'] = $search ?? '';
      
      View::generate('articles', $data);
    }
    
    public function one(string $id): void
    {
      $res = $this->model->getOne($id);
      
      $data['article'] = $res['article'];
      
      foreach ($res['comments'] as $comment) {
        $data['comments'][$comment['id']] = $comment;
      }
      
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
    
    public function like(string $id): void
    {
      $this->model->update([
        'likes' => 3,
      ],
        "id = $id"
      );
    }
    
    public function fields(string $id, array $data): void
    {
      $this->model->update([
        'title' => $data['title'],
        'body' => $data['body'],
      ],
        "id = $id"
      );
    }
    
    public function delete(string $id): void
    {
      $this->model->delete("id = $id");
    }
  }