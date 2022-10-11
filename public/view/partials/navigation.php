<?php
    use App\Models\Page;
    $pages = new Page;
?>

<header>
  <nav class="navigation">
      <?php foreach ($pages->getAll() as $page): ?>
          <a href="<?= print_r($page['route']) ?>"
             class="<?= print_r($page['active'] ? 'link-success' : 'link-secondary') ?>"
          >
            <?= print_r($page['title']) ?>
          </a>
      <?php endforeach; ?>
  </nav>
</header>
