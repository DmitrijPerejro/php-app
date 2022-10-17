<?php

namespace App\Models;
use App\Core\DataBase;
use PDO;

class User
{
  private string $table = "users";

  public function getAll(): array {
    $db = DataBase::getDB();

    $query = "SELECT * from $this->table";
    $statement = $db->prepare($query);
    $statement->execute();
    $statement->setFetchMode(PDO::FETCH_ASSOC);
    return $statement->fetchAll();
  }
}