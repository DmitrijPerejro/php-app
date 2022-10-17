<?php

namespace App\Models;
use App\Core\DataBase;
use PDO;

class Comments {
  private string $commentsTable = "comments";
  private string $articlesTable = "articles";
  private string $usersTable = "users";

  public function getAll(): array {
    $db = DataBase::getDB();

    $query = "SELECT * from $this->commentsTable";
    $statement = $db->prepare($query);
    $statement->execute();
    $statement->setFetchMode(PDO::FETCH_ASSOC);
    $commentsRes = $statement->fetchAll();

    return $commentsRes;
  }
}