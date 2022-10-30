<?php
  
  namespace Controllers;
  
  use Core\SessionManager;
  
  class AuthGuard
  {
    public static function guard(): void
    {
      if (SessionManager::empty()) {
        header('Location: /app/');
      }
    }
  }