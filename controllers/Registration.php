<?php
  
  namespace Controllers;
  
  use View\View;
  use Models\User;
  use Core\Crypto;
  use Core\SessionManager;
  
  class Registration extends JSONController implements BaseController
  {
    private string $table = "users";
    private User $model;
    private Crypto $crypto;
    
    public function __construct()
    {
      $this->model = new User();
      $this->crypto = new Crypto();
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
      
      
      $data['password'] = $this->crypto->encrypt($data['password']);
      
      try {
        $id = $this->model->registration($data);
        SessionManager::write('userId', $id);
        
        $path = getConfig()['routing']['base'];
        
        header("Location: $path/dashboard");
        
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