<?php
  
  namespace Core\ORM;
  
  use Core\ORM\Connector;
  
  class Update
  {
    protected string $table;
    protected string $value;
    protected string $where;
    protected Connector $connector;
    
    public function __construct()
    {
      $this->connector = new Connector();
    }
    
    /**
     * @return void
     */
    public function execute(): void
    {
      $PDO = $this->connector->connect();
      $PDO->query(($this->sql()));
    }
    
    /**
     * @return string
     */
    public function sql(): string
    {
      return 'UPDATE ' . $this->getTable() . ' SET ' . $this->getValue() . ' WHERE ' . $this->getWhere();
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
    public function getValue(): string
    {
      return $this->value;
    }
    
    /**
     * @param array $values
     */
    public function setValue(array $values): void
    {
      $this->value = $this->prepareValues($values);
    }
    
    /**
     * @return string
     */
    public function getWhere(): string
    {
      return $this->where;
    }
    
    private function prepareValues(array $values): string
    {
      $res = '';
      
      foreach ($values as $key => $value) {
        if (empty($res)) {
          $res .= "$key = '$value'";
        } else {
          $res .= ", $key = '$value'";
        }
      }
      
      return $res;
    }
    
    /**
     * @param string $where
     */
    public function setWhere(string $where): void
    {
      $this->where = $where;
    }
  }