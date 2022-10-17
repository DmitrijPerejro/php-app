<?php

namespace App\Models;
  use App\Core\DataBase;
  use PDO;

class User
{
  private $db;
  private string $table = "users";

  public function __construct()
  {
    $this->db = DataBase::getDB();
  }

  public function getAll(): array {
    $query = "SELECT * from $this->table";
    $statement = $this->db->prepare($query);
    $statement->execute();
    $statement->setFetchMode(PDO::FETCH_ASSOC);
    return $statement->fetchAll();
  }

  public function getOne(string $id): array {
    $query = "SELECT * from $this->table WHERE id = $id";
    $statement = $this->db->prepare($query);
    $statement->execute();
    $statement->setFetchMode(PDO::FETCH_ASSOC);
    return $statement->fetchAll();
  }

  public function registration(string $login, string $email, string $password): void {
    $query = "INSERT INTO `$this->table` (`email`, `login`, `password`, `avatar`) VALUES ('$email','$login','$password', '');";
    echo $query;
    $statement = $this->db->prepare($query);
    $statement->execute();
  }

}