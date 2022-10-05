<?php
  namespace App\Routers;
  use App\Controllers\Error as NotFound;

  class Router
  {
    private array $slugs = [];

    public function __construct()
    {
      $path = substr($_SERVER['REQUEST_URI'], 1);
      $this->slugs = explode("/", $path);
    }

    public function run() {
      $controller = $this->getClass($this->getClassName());
      $method = $this->getMethodName();

      if (method_exists($controller, $method)) {
        $controller->$method();
      } else {
        (new NotFound)->index();
      }
    }

    private function getMethodName(): string {
      return empty($this->slugs[2]) ? 'index' : $this->slugs[2];
    }

    private function getClassName(): string {
      return empty($this->slugs[1]) ? 'Home' : $this->slugs[1];
    }

    private function getClass(string $className) {
      $classPath = 'App\\Controllers\\' . $className;
      return class_exists($classPath) ? new $classPath : new NotFound;
    }
  }