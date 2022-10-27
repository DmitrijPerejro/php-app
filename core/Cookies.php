<?php
  
  namespace Core;
  
  class Cookies
  {
    /**
     * @var array
     */
    private array $cookies;
    
    public function __construct()
    {
      $this->cookies = $_COOKIE;
    }
    
    /**
     * @param string $key
     * @return mixed|null
     */
    public function read(string $key)
    {
      if (isset($this->cookies[$key])) {
        return $this->cookies[$key];
      }
      return null;
    }
    
    /**
     * @param string $name
     * @param string $value
     * @param int $expire
     * @return void
     */
    public function write(string $name, string $value, int $expire = 60 * 60 * 60 * 30): void
    {
      setcookie($name, $value, time() + $expire, '/');
    }
    
    /**
     * @param string $name
     * @return void
     */
    public function delete(string $name): void
    {
      setcookie($name, '', time() + -1, '/');
    }
    
    /**
     * @return array
     */
    public function get(): array
    {
      return $this->cookies;
    }
  }