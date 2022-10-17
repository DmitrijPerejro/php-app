<?php
  namespace App\Routers;
  use App\Controllers\Error as NotFound;

  class Router
  {
    private string $slugs;
    private array $config;
    private string $POST_REQUEST = 'POST';
    private string $GET_REQUEST = 'GET';
    private static array $handlers = [];

    static public function GET (string $path, $handler): void {
      self::addHandler('GET', $path, $handler);
    }

    static public function POST (string $path, $handler): void {
      self::addHandler('POST', $path, $handler);
    }

    static private function addHandler(string $method, string $path, $handler) {

      self::$handlers[] = [
        'method' => $method,
        'path' => $path,
        'handler' => $handler,
      ];
    }

    public static function run(): void {
      $requestUri = parse_url($_SERVER['REQUEST_URI'])['path'];
      var_dump($requestUri);
      $requestMethod = $_SERVER['REQUEST_METHOD'];
      $callback = null;

      var_dump('<pre>');
      var_dump(explode('/', $requestUri));
      var_dump('</pre>');

      foreach (self::$handlers as $handler) {
        var_dump($handler['path']);
        if ($handler['method'] === $requestMethod && $handler['path'] === $requestUri) {
          $callback = $handler['handler'];
        }
      }

      if ($callback !== null) {
        call_user_func_array($callback, [
          array_merge($_POST, $_GET)
        ]);
      } else {
        $error = new NotFound;
        $error->index();
      }
    }
  }