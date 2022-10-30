<div class="card">
  <div class="card-body d-flex flex-column">
    <small>id: <?= $comment['id'] ?></small>
    <div>
      <p>author id: <?= $comment['author_id'] ?></p>
      <p>article id: <?= $comment['article_id'] ?></p>
    </div>
    <p class="card-text flex-grow-1">
      <?= $comment['body'] ?>
    </p>
  </div>
</div>