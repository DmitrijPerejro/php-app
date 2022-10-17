<?php

namespace App\Models;
use App\Core\DataBase;
use PDO;

class Article {
  private string $table = "articles";
  private $db;

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

  public function create(array $data): void {
    var_dump($data);
  }

  public function edit(string $id, string $field, string $value): void {
    var_dump($id);
  }

  public function delete(string $id): void {
    var_dump($id);
  }
}