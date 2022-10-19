<?php
  
  namespace Models;
  
  use Core\ORM\Select;
  use PDO;
  
  class User
  {
    private $db;
    private string $table = "users";
    
    public function getAll(): array
    {
      $select = new Select();
      $select->setTable($this->table);
      $data = $select->execute();
      return $data->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function getOne(string $id): array
    {
      return [];
    }
    
    public function registration(string $login, string $email, string $password): void
    {
//    $query = "INSERT INTO `$this->table` (`email`, `login`, `password`, `avatar`) VALUES ('$email','$login','$password', '');";
//    echo $query;
//    $statement = $this->db->prepare($query);
//    $statement->execute();
    }
    
  }