<?php
  
  namespace Models;
  
  use Core\ORM\Select;
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
      var_dump($data);
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
  
  // HW