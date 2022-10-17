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
        echo 'NOT FOUND';
      }
    }
  }