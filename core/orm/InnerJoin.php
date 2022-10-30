<?php
  
  namespace Core\ORM;
  
  class InnerJoin
  {
    private string $join = '';
    
    /**
     * @return string
     */
    public function getJoin(): string
    {
      return $this->join;
    }
    
    /**
     * @param string $join
     */
    public function setJoin(string $join): void
    {
      $this->join = $join;
    }
  }