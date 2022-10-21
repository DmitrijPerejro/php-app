<?php
  
  namespace Controllers;
  
  abstract class JSONController
  {
    public function jsonOK(array $fields): void
    {
      header('Content-Type: application/json; charset=utf-8');
      http_response_code(200);
      echo json_encode([
        'status' => 'ok',
        'code' => 200,
        'fields' => $fields,
      ]);
    }
    
    public function jsonNotOK(string $reason): void
    {
      header('Content-Type: application/json; charset=utf-8');
      http_response_code(400);
      echo json_encode([
        'status' => 'not_ok',
        'code' => 400,
        'reason' => $reason
      ]);
    }
  }