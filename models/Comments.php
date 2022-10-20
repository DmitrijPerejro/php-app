<?php
  
  namespace Models;
  
  use Core\ORM\Select;
  use PDO;
  
  class Comments
  {
    private string $table = "comments";
    
    public function getAll(): array
    {
      $select = new Select();
      $select->setTable($this->table);
      $data = $select->execute();
      return $data->fetchAll(PDO::FETCH_ASSOC);
    }
  }