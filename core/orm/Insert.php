<?php
  
  namespace Core\ORM;
  
  use Core\ORM\Connector;
  
  class Insert
  {
    protected string $table;
    protected string $column;
    protected string $value;
    
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
    
    public function execute(array $data): void
    {
      $connect = new Connector();
      $PDO = $connect->connect();
      $PDO->query(($this->sql($data)));
    }
    
    public function sql(array $data): string
    {
      return 'INSERT INTO ' . $this->table . ' (' . $this->getColumn() . ') VALUES (' . $this->getValue() . ')';
    }
    
    /**
     * @return string
     */
    public function getColumn(): string
    {
      return $this->column;
    }
    
    /**
     * @param array $column
     */
    public function setColumn(array $column): void
    {
      $this->column = implode(',', $column);
    }
    
    /**
     * @return string
     */
    public function getValue(): string
    {
      return $this->value;
    }
    
    /**
     * @param array $value
     */
    public function setValue(array $value): void
    {
      $this->value = $this->prepareValues($value);
    }
    
    private function prepareValues(array $values): string
    {
      $res = '';
      
      foreach ($values as $value) {
        if (empty($res)) {
          $res .= '\'' . $value . '\'';
        } else {
          $res .= ', \'' . $value . '\'';
        }
      }
      
      return $res;
    }
    
  }