<div class="card h-100">
  <div class="card-body d-flex flex-column">
      <small>id: <?=  $article['id'] ?></small>
      <h2 class="card-title">
        <?php print_r($article['title']); ?>
      </h2>
      <p class="card-text flex-grow-1">
        <?php print_r($article['body']); ?>
      </p>
        <div class="d-flex justify-content-between">
            <a href="articles/<?php print_r($article['id']); ?>" class="btn btn-primary">
                read more
            </a>
            <button class="btn btn-success">
              likes: <?php print_r($article['likes']); ?>
            </button>
        </div>
  </div>
</div>