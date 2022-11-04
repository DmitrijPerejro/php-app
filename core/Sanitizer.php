<?php
  
  namespace Core;
  
  class Sanitizer
  {
    static public function sanitize($input): string
    {
      return htmlspecialchars(strip_tags($input));
    }
  }