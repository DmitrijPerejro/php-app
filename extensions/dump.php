<?php
  function dump($code): void
  {
    echo('<pre style="color: #fff; background-color: rgba(0, 0, 0, .6); font-weight: bold; padding: 20px">');
    echo('<code>');
    var_dump($code);
    echo('</code>');
    echo('</pre>');
  }