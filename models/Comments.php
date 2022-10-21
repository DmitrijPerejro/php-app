<?php
  
  namespace Models;
  
  use Core\ORM\Select;
  use Core\ORM\Insert;
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
    
    public function new(array $data): void
    {
      $insert = new Insert();
      $insert->setTable($this->table);
      $insert->setColumn(array_keys($data));
      $insert->setValue(array_values($data));
      $insert->execute($data);
    }
  }