<?php
  
  namespace Models;
  
  use Core\ORM\Select;
  use Core\ORM\Insert;
  use Core\ORM\Update;
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
      $insert->execute();
    }
    
    public function like(string $id): void
    {
      $select = new Select();
      $select->setTable($this->table);
      $select->setColumns('likes');
      $select->setWhere("id = $id");
      $data = $select->execute();
      $likes = $data->fetchAll(PDO::FETCH_ASSOC)[0]['likes'];
      
      $update = new Update;
      $update->setTable($this->table);
      $update->setValue(['likes' => $likes + 1]);
      $update->setWhere("id = $id");
      $update->execute();
    }
  }