<?php
  
  namespace Controllers;
  
  use View\View;
  use Models\User;
  
  class Registration extends JSONController implements BaseController
  {
    private string $table = "users";
    private User $model;
    
    public function __construct()
    {
      $this->model = new User();
    }
    
    public function index(): void
    {
      View::generate('registration', []);
    }
    
    public function registration(array $data): void
    {
      
      if (!empty($this->validation($data))) {
        View::generate('registration', ['errors' => $this->validation($data)]);
        return;
      }
      
      try {
        $this->model->registration($data);
        $this->jsonOK($data);
      } catch (\Exception $exception) {
        $this->jsonNotOK($exception->getMessage());
      }
    }
    
    private function validation(array $data): array
    {
      $errors = [];
      $minSymbols = 3;
      
      foreach ($data as $name => $value) {
        if (empty($value)) {
          $errors["$name"] = 'Field is required';
        } else if (mb_strlen($value) < $minSymbols) {
          $errors["$name"] = "Field <b>$name</b> is less then <b>$minSymbols</b>";
        }
      }
      
      return $errors;
    }
  }