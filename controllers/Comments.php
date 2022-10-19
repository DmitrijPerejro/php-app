<?php
  
  namespace Controllers;
  
  use Models\Comments as CommnetsModel;
  use View\View;
  
  class Comments implements BaseController
  {
    private string $name = 'Comments page';
    
    public function index(): void
    {
      $comments = new CommnetsModel;
      $data['title'] = $this->name;
      $data['comments'] = $comments->getAll();
      View::generate('comments', $data);
    }
  }