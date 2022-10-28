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
    <div class="d-flex justify-content-between">
      <form class="mb-0" action="<?= $baseUrl ?>/articles/<?= $article['id'] ?>/like" method="POST">
        <button class="btn btn-success">
          likes: <?= $article['likes']; ?>
        </button>
      </form>
      <form class="mb-0" action="<?= $baseUrl ?>/articles/<?= $article['id'] ?>/delete" method="POST">
        <button class="btn btn-danger">
          Delete
        </button>
      </form>
    </div>
    <a href="<?= $baseUrl ?>/articles/<?= $article['id']; ?>" class="btn btn-primary d-block w-100 mt-2">
      read more
    </a>
  </div>
  <?php include __DIR__ . '/comment-form.php'; ?>
</div>