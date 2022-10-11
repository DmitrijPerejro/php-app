<div class="card">
  <div class="card-body">
      <h2 class="card-title">
        <?= print_r($article['title']); ?>
      </h2>
      <p class="card-text">
        <?= print_r($article['body']); ?>
      </p>
      <a href="articles/<?php print_r($id); ?>" class="btn btn-primary">
          read more
      </a>
  </div>
</div>