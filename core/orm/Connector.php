<?php
  
  namespace Core\ORM;
  
  use PDO;
  use PDOException;
  
  class Connector
  {
    private string $db;
    private string $host;
    private string $username;
    private string $password;
    
    
    public function __construct()
    {
      $config = include __DIR__ . '/config.php';
      
      $this->db = $config['db'];
      $this->host = $config['host'];
      $this->username = $config['username'];
      $this->password = $config['password'];
    }
    
    public function connect(): PDO
    {
      try {
        
        $connect = new PDO("mysql:host=$this->host;dbname=$this->db", $this->username, $this->password);
        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $connect;
      } catch (PDOException $err) {
        echo "Connection failed: " . $err->getMessage();
        die('Все пропало');
      }
    }
  }