<?php
  
  namespace Models;
  
  use PDO;
  use Core\ORM\Select;
  use Core\ORM\Insert;
  use Core\ORM\Update;
  use Core\ORM\Delete;
  
  class Article
  {
    public int $limit = 10;
    private string $table = "articles";
    
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
    
    public function getOne(string $id): array
    {
      $select = new Select();
      
      $select->setTable($this->table);
      $select->setWhere("id = $id");
      $data = $select->execute();
      $article = $data->fetchAll(PDO::FETCH_ASSOC);
      
      $select->setTable('comments');
      $select->setWhere("article_id = $id");
      
      $select->setColumns(
        'comments.id as id,
                 comments.body as body,
                 comments.create_at as createAt,
                 comments.parent_id as parent_id,
                 comments.likes as likes,
                 users.id as author_id,
                 users.login as login
                 '
      );
      $select->setInnerJoin(
        ' INNER JOIN users
                  ON comments.author_id = users.id
                  '
      );
      
      $data = $select->execute();
      
      $comments = $data->fetchAll(PDO::FETCH_ASSOC);
      
      return [
        'article' => $article[0],
        'comments' => $comments,
      ];
    }
    
    public function getMyArticles(int $author_id): array
    {
      $select = new Select();
      $select->setTable($this->table);
      $select->setWhere("author_id = $author_id");
      $data = $select->execute();
      $articles = $data->fetchAll(PDO::FETCH_ASSOC);
      
      return $articles;
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