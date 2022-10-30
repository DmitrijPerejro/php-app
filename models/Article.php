<?php
  
  namespace Models;
  
  use PDO;
  use Core\ORM\Select;
  use Core\ORM\Insert;
  use Core\ORM\Update;
  use Core\ORM\Delete;
  
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
      $article = $data->fetchAll(PDO::FETCH_ASSOC);
      
      $select->setTable('comments');
      $select->setWhere("article_id = $id");
      $data = $select->execute();
      $comments = $data->fetchAll(PDO::FETCH_ASSOC);
      
      
      return [
        'article' => $article[0],
        'comments' => $comments,
      ];
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
    
    public function update(array $data, string $where): void
    {
      $select = new Update();
      $select->setTable($this->table);
      $select->setValue($data);
      $select->setWhere($where);
      $select->execute();
    }
    
    public function delete(string $where): void
    {
      $delete = new Delete();
      $delete->setTable($this->table);
      $delete->setWhere($where);
      $delete->execute();
    }
  }