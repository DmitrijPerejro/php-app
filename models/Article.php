<?php
  
  namespace Models;
  
  use Core\ORM\Select;
  use Core\ORM\Insert;
  use Core\ORM\Delete;
  use Core\ORM\Update;
  use PDO;
  
  class Article
  {
    private string $table = "articles";
    
    public function getAll($page, $search): array
    {
      $select = new Select();
      $select->setTable($this->table);
      
      
      if ($page !== null) {
        $select->setOffset($page === 1 ? 0 : ($page - 1) * 10);
        $select->setLimit(10);
      }
      
      if ($search !== null) {
        $select->setWhere("title LIKE '%$search%'");
      }
      
      $data = $select->execute();
      return $data->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function getOne(string $id): array
    {
      $select = new Select();
      $select->setTable($this->table);
      $select->setWhere("id = $id");
      $data = $select->execute();
      return $data->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function getTotal($search): int
    {
      $select = new Select();
      $select->setTable($this->table);
      $select->setColumns('COUNT(*) as total');
      if ($search !== null) {
        $select->setWhere("title LIKE '%$search%'");
      }
      $data = $select->execute();
      return $data->fetchAll(PDO::FETCH_ASSOC)[0]['total'];
    }
    
    public function create(array $data): void
    {
      $insert = new Insert();
      $insert->setTable($this->table);
      $insert->setColumn(array_keys($data));
      $insert->setValue(array_values($data));
      $insert->execute();
    }
  }