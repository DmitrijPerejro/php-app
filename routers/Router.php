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
      $path = substr($_SERVER['REQUEST_URI'], 1);
      /*
      * 1 cause entry point -> [[http://localhost/app/]] (using ampps)
      */
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