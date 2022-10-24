<?php
  function dump($code): void
  {
    echo('<div class="alert alert-warning alert-dismissible fade show">');
    echo('<pre>');
    var_dump($code);
    echo('</pre>');
    echo('<button type="button" class="btn-close" data-bs-dismiss="alert"></button>');
    echo('</div>');
  }