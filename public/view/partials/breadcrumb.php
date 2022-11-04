<?php
  $path = parse_url($_SERVER['REQUEST_URI'])['path'];
  $pages = explode('/', $path);
?>

<div class="container">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <?php foreach ($pages as $page): ?>
        <li class="breadcrumb-item">
          <a href="#">
            <?= $page ?>
          </a>
        </li>
      <?php endforeach; ?>
    </ol>
  </nav>
</div>