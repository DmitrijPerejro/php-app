<?php
  
  namespace Core;
  
  class Mail
  {
    public function send(string $to, string $subject, string $message): bool
    {
      return mail($to, $subject, $message, 'ololo');
    }
  }