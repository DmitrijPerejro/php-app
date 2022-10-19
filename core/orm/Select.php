<?php
  
  namespace Core\ORM;
  
  use Core\ORM\Connector;
  
  class Select
  {
    protected string $table;
    protected string $columns = '*';
    
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
      return $PDO->query(($this->get()));
    }
    
    public function get(): string
    {
      return "SELECT $this->columns FROM $this->table";
    }
  }