<?php
  function dump(...$args): void
  {
    foreach ([...$args] as $element) {
      run($element);
    }
  }
  
  function run($code): void
  {
    echo('<div class="alert alert-warning alert-dismissible fade show">');
    echo('<pre class="mb-0">');
    echo('<div class="alert alert-success m-0">');
    var_dump($code);
    echo('</div>');
    echo('</pre>');
    echo('<button type="button" class="btn-close" data-bs-dismiss="alert"></button>');
    echo('</div>');
  }