<?php
  $baseUrl = getConfig()['routing']['base'];
?>

<div class="card h-100">
  <div class="card-body d-flex flex-column">
    <small>id: <?= $article['id'] ?></small>
    <h2 class="card-title">
      <?= $article['title']; ?>
    </h2>
    <p class="card-text flex-grow-1">
      <?= $article['body']; ?>
    </p>
    <a href="<?= $baseUrl ?>/articles/<?= $article['id']; ?>" class="btn btn-primary d-block w-100 mt-2">
      read more
    </a>
  </div>
  <?php include __DIR__ . '/comment-form.php'; ?>
</div>