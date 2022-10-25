<?php
  
  namespace Controllers;
  
  use Models\User;
  use View\View;
  
  class Login implements BaseController
  {
    private User $model;
    
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
      if (!empty($this->validation($data))) {
        View::generate('login', [
          'errors' => $this->validation($data)
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
    
    private function validation(array $data): array
    {
      $errors = [];
      
      foreach ($data as $name => $value) {
        if (empty($value)) {
          $errors["$name"] = 'Field is empty';
        }
      }
      
      return $errors;
    }
  }