<?php
  
  namespace Models;
  
  use Core\ORM\Insert;
  use Core\ORM\Select;
  use Core\ORM\Update;
  use Models\Avatar;
  use Core\SessionManager;
  use PDO;
  
  class User
  {
    public int $limit = 16;
    private string $table = "users";
    
    public function getAll($page, $search): array
    {
      $select = new Select();
      $select->setTable($this->table);
      
      if ($page !== null) {
        $select->setOffset($page === 1 ? 0 : ($page - 1) * $this->limit);
        $select->setLimit($this->limit);
      }
      
      if ($search !== null) {
        $select->setWhere("title LIKE '%$search%'");
      }
      
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
    
    public function getOne($id): array
    {
      $select = new Select();
      $select->setTable($this->table);
      $select->setWhere("id = $id");
      $data = $select->execute();
      return $data->fetch(PDO::FETCH_ASSOC);
    }
    
    public function registration(array $data): int
    {
      $insert = new Insert();
      $insert->setTable($this->table);
      $insert->setColumn(array_keys($data));
      $insert->setValue(array_values($data));
      return $insert->execute(true);
      
    }
    
    public function login(array $data): array
    {
      $email = $data['email'];
      $select = new Select();
      $select->setTable($this->table);
      $select->setWhere("email = '$email'");
      $data = $select->execute();
      
      $res = $data->fetch(PDO::FETCH_ASSOC);
      
      return $res;
    }
    
    public function updateFields(array $data): void
    {
      $id = SessionManager::read('userId');
      $update = new Update();
      $update->setTable('users');
      $update->setValue($data);
      $update->setWhere("id = $id");
      $update->execute();
    }
  }