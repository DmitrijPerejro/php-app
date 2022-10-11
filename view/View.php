<?php

namespace App\View;

class View
{
  public static function generate(string $path, array $data)
  {
    extract($data);
    $filepath = 'public/view/' . $path . '.php';

    if (file_exists($filepath)) {
      include $filepath;
    } else {
      throw new \Exception(('Template ' . $filepath . ' is absent'));
    }
  }
}