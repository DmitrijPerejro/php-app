<?php
  
  namespace Controllers;
  
  use Controllers\Registration;
  use Controllers\Login;
  
  class Auth
  {
    private Registration $registrationController;
    private Login $loginController;
    
    public function __construct()
    {
      $this->registrationController = new Registration();
      $this->loginController = new Login();
    }
    
    public function registration_get(): void
    {
      $this->registrationController->index();
    }
    
    public function login_get(): void
    {
      $this->loginController->index();
    }
    
    public function registration_post(array $data): void
    {
      $this->registrationController->registration($data);
    }
    
    public function login_post(array $data): void
    {
      $this->loginController->login($data);
    }
    
    public function logout(): void
    {
      $path = getConfig()['routing']['base'];
      
      session_destroy();
      header("Location: $path/login");
    }
  }