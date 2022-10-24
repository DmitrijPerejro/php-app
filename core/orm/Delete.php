<?php
  
  namespace Core\ORM;
  
  use Core\ORM\Connector;
  
  class Delete
  {
    protected string $table;
    protected string $where = '';
    
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
    
    /**
     * @return string
     */
    public function getWhere(): string
    {
      return $this->where;
    }
    
    /**
     * @param string $where
     */
    public function setWhere(string $where): void
    {
      $this->where = $where;
    }
    
    public function execute()
    {
      $connect = new Connector();
      $PDO = $connect->connect();
      return $PDO->query(($this->sql()));
    }
    
    public function sql(): string
    {
      $res = "DELETE FROM $this->table WHERE $this->where";
      return $res;
    }
  }