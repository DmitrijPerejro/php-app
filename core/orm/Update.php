<?php
  
  namespace Core\ORM;
  
  use Core\ORM\Connector;
  
  class Update
  {
    protected string $table;
    protected string $column;
    protected string $value;
    protected string $where;
    
    public function execute(): void
    {
      $connect = new Connector();
      $PDO = $connect->connect();
      $PDO->query(($this->sql()));
    }
    
    public function sql(): string
    {
      $res = 'UPDATE ' . $this->getTable() . ' SET ' . $this->getColumn() . ' = ' . $this->getValue() . ' WHERE ' . $this->getWhere();
      dump($res);
      return $res;
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