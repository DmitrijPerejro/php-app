<?php
  
  namespace Controllers;
  
  use Core\SessionManager;
  use Models\User;
  use View\View;
  use Core\Crypto;
  
  class Login implements BaseController
  {
    private User $model;
    private Crypto $crypto;
    
    public function __construct()
    {
      $this->model = new User();
      $this->crypto = new Crypto();
    }
    
    public function index(): void
    {
      View::generate('login', []);
    }
    
    public function login(array $data)
    {
      if (!empty($this->validationEmptyField($data))) {
        View::generate('login', [
          'errors' => $this->validationEmptyField($data)
        ]);
        return;
      }
      
      $user = $this->model->login($data);
      
      if (empty($user)) {
        $email = $data['email'];
        
        View::generate('login', [
          'errors' => [
            'email' => "User with email <b>$email</b> doesn't exist",
          ]
        ]);
        return;
      }
      
      if (!$this->validationPassword($data['password'], $user['password'])) {
        View::generate('login', [
          'errors' => [
            'password' => "Password is not valid",
          ],
          'values' => [
            'email' => $data['email']
          ]
        ]);
        return;
      }
      
      SessionManager::write('userId', $user['id']);
      $path = getConfig()['routing']['base'];
      
      header("Location: $path/dashboard");
    }
    
    private function validationEmptyField(array $data): array
    {
      $errors = [];
      
      foreach ($data as $name => $value) {
        if (empty($value)) {
          $errors["$name"] = 'Field is empty';
        }
      }
      
      return $errors;
    }
    
    private function validationPassword(string $password, string $hash): bool
    {
      return $this->crypto->decrypt($password, $hash);
    }
  }