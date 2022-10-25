<?php
  
  namespace Models;
  
  use Core\ORM\Insert;
  use Core\ORM\Select;
  use PDO;
  
  class User
  {
    private string $table = "users";
    
    public function getAll(): array
    {
      $select = new Select();
      $select->setTable($this->table);
      $data = $select->execute();
      return $data->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function registration(array $data): void
    {
      /*
       * TODO: Add validation for exist user['email']
       */
      
      $insert = new Insert();
      $insert->setTable($this->table);
      $insert->setColumn(array_keys($data));
      $insert->setValue(array_values($data));
      $insert->execute();
    }
    
    public function login(array $data): array
    {
      $email = $data['email'];
      /*
       * TODO: Add handler when passwords not equals
       */
      
      $select = new Select();
      $select->setTable($this->table);
      $select->setWhere("email = '$email'");
      $data = $select->execute();
      return $data->fetchAll(PDO::FETCH_ASSOC);
    }
  }