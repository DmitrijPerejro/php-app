<?php
  
  namespace Core;
  
  class SessionManager
  {
    
    public static function start(): void
    {
      session_start();
    }
    
    public static function destroy(): void
    {
      session_destroy();
    }
    
    public static function read(string $key)
    {
      return $_SESSION[$key] ?? null;
    }
    
    public static function write(string $key, $value)
    {
      $_SESSION[$key] = $value;
    }
    
    public static function empty(): bool
    {
      return empty($_SESSION);
    }
    
    public static function isAuth(): bool
    {
      return isset($_SESSION['userId']);
    }
  }