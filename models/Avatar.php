<?php
  
  namespace Models;
  
  use PDO;
  use Core\ORM\Select;
  use Core\ORM\Insert;
  use Core\ORM\Update;
  
  class Avatar
  {
    private string $table = "usersAvatar";
    
    public function update(string $user, string $avatar)
    {
      if ($this->get($user)) {
        $update = new Update();
        $update->setTable($this->table);
        $update->setValue([
          'avatar' => $avatar
        ]);
        $update->setWhere("userId = $user");
      } else {
        $this->insert($user, $avatar);
      }
    }
    
    public function get(string $user): array
    {
      $select = new Select();
      $select->setTable($this->table);
      $select->setColumns('avatar');
      $select->setWhere("userId = $user");
      $data = $select->execute();
      return $data->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function insert($userId, $avatar): void
    {
      $update = new Insert();
      
      $update->setTable($this->table);
      $update->setColumn(['userId', 'avatar']);
      $update->setValue([$userId, $avatar]);
      $update->execute();
    }
  }