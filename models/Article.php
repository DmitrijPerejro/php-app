<?php
  
  namespace Models;
  
  use Core\ORM\Select;
  use Core\ORM\Insert;
  use PDO;
  
  class Article
  {
    private string $table = "articles";
    
    public function getAll(): array
    {
      $select = new Select();
      $select->setTable($this->table);
      $data = $select->execute();
      return $data->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function create(array $data): void
    {
      dump($data);
      dump(array_keys($data));
      dump(array_values($data));
      
      $insert = new Insert();
      $insert->setTable($this->table);
      $insert->setColumn(array_keys($data));
      $insert->setValue(array_values($data));
      $insert->execute($data);
    }
    
    public function edit(string $id, string $field, string $value): void
    {
      var_dump($id);
    }
    
    public function delete(string $id): void
    {
      var_dump($id);
    }
  }