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
        'path' => self::prepareDynamicParams($path)['path'],
        'handler' => $handler,
        'extra' => self::prepareDynamicParams($path)['extraParams'],
      ];
    }
    
    private static function prepareDynamicParams(string $path): array
    {
      
      $incomingPathAsArray = explode('/', $path);
      $originalPathAsArray = explode('/', parse_url($_SERVER['REQUEST_URI'])['path']);
      
      
      $p = null;
      $pp = null;
      $position = -1;
      $data = [];
      $extra = [];
      
      for ($i = 0; $i < count($incomingPathAsArray); $i++) {
        if (count($incomingPathAsArray) === count($originalPathAsArray)) {
          
          if (substr($incomingPathAsArray[$i], 0, 1) === ':') {
            $data[] = [
              'param' => $originalPathAsArray[$i],
              'name' => substr($incomingPathAsArray[$i], 1),
              'position' => $i
            ];
          }
        }
      }
      
      if (!empty($data)) {
        foreach ($data as $d) {
          $incomingPathAsArray[$d['position']] = $d['param'];
          $extra[$d['name']] = $d['param'];
        }
        
        return [
          'path' => implode('/', $incomingPathAsArray),
          'extraParams' => $extra,
        ];
      }
      
      return [
        'path' => $path,
        'extraParams' => [],
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
      $extra = [];
      
      dump("<b>$requestMethod</b> | requestUri -> <b>$requestUri</b>");
      
      foreach (self::$handlers as $handler) {
        if ($handler['method'] === $requestMethod && $handler['path'] === $requestUri) {
          $callback = $handler['handler'];
          $extra = $handler['extra'];
        }
      }
      
      if ($callback !== null) {
        $result['params'] = array_merge($_POST, $_GET);
        $result['request'] = $requestUri;
        
        foreach ($extra as $k => $v) {
          $result[$k] = $v;
        }
        
        $callback($result);
      } else {
        throw new \Exception('Route not found', 400);
      }
    }
  }