<?php
  
  namespace Core;
  
  class Session
  {
    public static function start(): void
    {
      session_start();
    }
    
    public static function abort(): void
    {
      session_abort();
    }
    
    public static function get(): array
    {
      return $_SESSION;
    }
  }