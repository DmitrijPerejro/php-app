<?php
  
  namespace Models;
  
  use Core\ORM\Insert;
  use Core\ORM\Select;
  use Core\ORM\Update;
  use Models\Avatar;
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
      $id = $_SESSION['user']['id'];
      $update = new Update();
      $update->setTable('users');
      $update->setValue($data);
      $update->setWhere("id = $id");
      $update->execute();
    }
  }