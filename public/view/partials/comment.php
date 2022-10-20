<div class="card h-100">
  <div class="card-body d-flex flex-column">
    <small>id: <?=  $comment['id'] ?></small>
    <div>
      <p>author id: <?=  $comment['author_id'] ?></p>
      <p>article id: <?=  $comment['article_id'] ?></p>
    </div>
    <p class="card-text flex-grow-1">
      <?php print_r($comment['body']); ?>
    </p>
  </div>
</div>