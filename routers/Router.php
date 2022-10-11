<?php
  namespace App\Routers;
  use App\Controllers\Error as NotFound;

  class Router
  {
    private string $slugs;
    private array $config;

    public function __construct()
    {
      $this->slugs = substr($_SERVER['REQUEST_URI'], 5); // skip /app/
      $this->config = include_once(__DIR__ . "/../config/config.php");
    }

    public function run() {
      $controller = $this->getClass($this->getClassName());
      $method = $this->getMethodName();

      $this->runner($controller, $method);
    }

    private function isExistRoute(): bool {
      return array_key_exists($this->slugs, $this->config);
    }

    private function runner($controller, $method): void {
      if (method_exists($controller, $method)) {
        $controller->$method();
      } else {
        (new NotFound)->index();
      }
    }

    private function getMethodName(): string {

      $res = explode(":", $this->config[$this->slugs]);

      if ($res[1] === null) {
        return '';
      }

      return  $res[1];
    }

    private function getClassName(): string {
      $route = explode(":", $this->config[$this->slugs]);
      return ucfirst($route[0]);  // ClassName
    }

    private function getClass($className) {
      if (!$this->isExistRoute()) {
        return new NotFound();
      }

      $classPath = 'App\\Controllers\\' . $className;
      return class_exists($classPath) ? new $classPath : new NotFound;
    }
  }