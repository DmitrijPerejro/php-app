<?php
  
  namespace Core\ORM;
  
  use Core\ORM\Connector;
  
  class Select
  {
    protected string $table;
    protected string $columns = '*';
    protected string $where = '';
    protected int $limit = -1;
    protected int $offset = -1;
    
    /**
     * @return int
     */
    public function getOffset(): int
    {
      return $this->offset;
    }
    
    /**
     * @param int $offset
     */
    public function setOffset(int $offset): void
    {
      $this->offset = $offset;
    }
    
    /**
     * @return int
     */
    public function getLimit(): int
    {
      return $this->limit;
    }
    
    /**
     * @param int $limit
     */
    public function setLimit(int $limit): void
    {
      $this->limit = $limit;
    }
    
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
    public function getColumns(): string
    {
      return $this->columns;
    }
    
    /**
     * @param string $columns
     */
    public function setColumns(string $columns): void
    {
      $this->columns = $columns;
    }
    
    public function execute()
    {
      $connect = new Connector();
      $PDO = $connect->connect();
      return $PDO->query(($this->sql()));
    }
    
    public function sql(): string
    {
      $res = "SELECT $this->columns FROM $this->table";
      
      if (!empty($this->getWhere())) {
        $res .= " WHERE $this->where";
      }
      
      if ($this->limit > -1) {
        $res .= " LIMIT $this->limit";
      }
      
      if ($this->offset > -1) {
        $res .= " OFFSET $this->offset";
      }
      
      dump($res);
      
      return $res;
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
  }