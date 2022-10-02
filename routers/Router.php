<?php
  namespace App\Routers;
  use App\Controllers\Error as NotFound;

  class Router
  {
    public function run() {
      $controller = $this->getClass($this->getClassName());
      $controller->index();
    }

    private function getPath(): string {
      /*
       * offset is 2 cause entry point -> [[http://localhost/app/]] (using ampps)
       */
      $path = substr($_SERVER['REQUEST_URI'], 2);
      return explode("/", $path)[1];
    }

    private function getClassName(): string {
      return empty($this->getPath()) ? 'Home' : $this->getPath();
    }

    private function getClass(string $className) {
      $classPath = 'App\\Controllers\\' . $className;
      return class_exists($classPath) ? new $classPath : new NotFound;
    }
  }