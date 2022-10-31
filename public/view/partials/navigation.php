<?php
  
  use Models\Page;
  
  $pages = new Page;
  $active = $pages->getActiveRoute();
?>

<header>
  <div class="navbar bg-light py-3 mb-5">
    <div class="container">
      <div class="d-flex w-100">
        <?php foreach ($pages->getAll()['public'] as $page): ?>
          <a href="<?= $page['route'] ?>"
             class="btn text-uppercase <?= $active === $page['route'] ? 'btn btn-primary' : '' ?>"
          >
            <?= $page['title'] ?>
          </a>
        <?php endforeach; ?>
        
        <?php if (!empty($_SESSION) && $_SESSION['auth']): ?>
          <div class="ms-auto">
            <?php foreach ($pages->getAll()['private'] as $page): ?>
              <a href="<?= $page['route'] ?>"
                 class="btn text-uppercase <?= $active === $page['route'] ? 'btn btn-primary' : '' ?>"
              >
                <?= $page['title'] ?>
              </a>
            <?php endforeach; ?>
          </div>
        <?php else: ?>
          <div class="ms-auto">
            <?php foreach ($pages->getAll()['auth'] as $page): ?>
              <a href="<?= $page['route'] ?>"
                 class="btn text-uppercase <?= $active === $page['route'] ? 'btn btn-primary' : '' ?>"
              >
                <?= $page['title'] ?>
              </a>
            <?php endforeach; ?>
          </div>
        <?php endif; ?>
      </div>
    </div>
</header>
