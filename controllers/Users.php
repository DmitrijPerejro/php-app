<?php
  
  namespace Controllers;
  
  use Models\User;
  use View\View;
  
  class Users extends JSONController
  {
    private User $model;
    
    public function __construct()
    {
      $this->model = new User();
    }
    
    public function index(int $page, $search): void
    {
      $data['users'] = $this->model->getAll($page, $search);
      $data['total'] = $this->model->getTotal($search);
      $data['totalPages'] = floor($data['total'] / $this->model->limit);
      $data['currentPage'] = $page;
      $data['hasNextPage'] = $data['totalPages'] != $page - 1;
      $data['hasPrevPage'] = $page !== 1;
      $data['search'] = $search ?? '';
      
      View::generate('users', $data);
    }
    
    public function newUser(array $data): void
    {
      try {
        
        if (empty($data)) {
          dump('Data not provided');
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