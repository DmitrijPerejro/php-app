<?php
  
  namespace Core\ORM;
  
  use Core\ORM\Connector;
  
  class INSERT
  {
    protected string $table;
    
    /**
     * @return string
     */
    public function getTable(): string
    {
      return $this->table;
    }
    
    /**
     * @param string $table
     */
    public function setTable(string $table): void
    {
      $this->table = $table;
    }
    
    public function execute(array $fields, array $values)
    {
      
      $connect = new Connector();
      $PDO = $connect->connect();
      return $PDO->query(($this->sql($fields, $values)));
    }
    
    public function sql(array $fields, array $values): string
    {
      return 'INSERT INTO ' . $this->table . ' (' . implode(',', $fields) . ') VALUES (' . implode(',', $values) . ')';
    }
    
  }