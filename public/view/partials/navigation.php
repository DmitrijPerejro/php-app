<?php
    use App\Models\Page;
    $pages = new Page;
    $active = $pages->getActiveRoute();
    var_dump($active);
?>

<header>
    <hr>
    <div class="container">
        <nav class="navigation">
          <?php foreach ($pages->getAll() as $page): ?>
              <a href="<?= $page['route'] ?>" class="text-uppercase fw-semibold <?= $active === $page['route'] ? 'text-info' : 'text-decoration-none' ?>">
                <?= $page['title'] ?>
              </a>
          <?php endforeach; ?>
        </nav>
    </div>
    <hr>
</header>
