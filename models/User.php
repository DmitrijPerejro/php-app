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
  }