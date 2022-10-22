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
    
    public function new(array $data): void
    {
      
      $insert = new Insert();
      $insert->setTable($this->table);
      $insert->setColumn(array_keys($data));
      $insert->setValue(array_values($data));
      $insert->execute($data);
    }
  }