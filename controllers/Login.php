<?php
  
  namespace Controllers;
  
  use Models\User;
  use View\View;
  
  class Login implements BaseController
  {
    private string $name = 'Login route';
    private $model;
    
    public function __construct()
    {
      $this->model = new User();
    }
    
    public function index(): void
    {
      View::generate('login', []);
    }
    
    public function login(array $data)
    {
      $errors = [];
      
      foreach ($data as $name => $value) {
        if (empty($value)) {
          $errors["$name"] = 'Field is empty';
        }
      }
      
      if (!empty($errors)) {
        View::generate('login', [
          'errors' => $errors
        ]);
        return;
      }
      
      $res = $this->model->login($data);
      
      if (empty($res)) {
        $email = $data['email'];
        
        View::generate('login', [
          'errors' => [
            'email' => "User with email <b>$email</b> doesn't exist",
          ]
        ]);
      } else {
        /*
         * TODO: Do something
         */
        dump($res);
      }
    }
  }