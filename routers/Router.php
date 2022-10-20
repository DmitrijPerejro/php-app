<?php
  
  namespace Routers;
  
  class Router
  {
    private static string $POST_REQUEST = 'POST';
    private static string $GET_REQUEST = 'GET';
    private static array $handlers = [];
    
    static public function GET($path, $handler): void
    {
      self::addHandler(self::$GET_REQUEST, $path, $handler);
    }
    
    static private function addHandler(string $method, $path, $handler): void
    {
      if (is_array($path)) {
        foreach ($path as $currentPath) {
          self::bindRoute($method, $currentPath, $handler);
        }
      } else {
        self::bindRoute($method, $path, $handler);
      }
    }
    
    private static function bindRoute(string $method, $path, $handler): void
    {
      self::$handlers[] = [
        'method' => $method,
        'path' => $path,
        'handler' => $handler,
      ];
    }
    
    static public function POST($path, $handler): void
    {
      self::addHandler(self::$POST_REQUEST, $path, $handler);
    }
    
    /**
     * @throws \Exception
     */
    public static function run(): void
    {
      $requestUri = parse_url($_SERVER['REQUEST_URI'])['path'];
      $requestMethod = $_SERVER['REQUEST_METHOD'];
      $callback = null;
      
      foreach (self::$handlers as $handler) {
        if ($handler['method'] === $requestMethod && $handler['path'] === $requestUri) {
          $callback = $handler['handler'];
        }
      }
      
      if ($callback !== null) {
        call_user_func_array($callback, [
          array_merge($_POST, $_GET)
        ]);
      } else {
        throw new \Exception('Route not found', 400);
      }
    }
  }