<?php
  
  use Models\Page;
  
  $pages = new Page;
  $active = $pages->getActiveRoute();
  dump($active);
?>

<header>
  <div class="navbar bg-light py-3 mb-5">
    <div class="container">
      <div>
        <?php foreach ($pages->getAll() as $page): ?>
          <a href="<?= $page['route'] ?>"
             class="btn text-uppercase <?= $active === $page['route'] ? 'btn btn-primary' : '' ?>"
          >
            <?= $page['title'] ?>
          </a>
        <?php endforeach; ?>
      </div>
    </div>
</header>
