<!doctype html>
<html lang="en">
<?php include __DIR__ . '/../partials/head.php'; ?>
<body>
<?php include __DIR__ . '/../partials/navigation.php'; ?>
<div class="container">
  
  <div class="d-flex justify-content-between align-items-center mb-3">
    <a href="articles/new" class="btn btn-outline-success">
      Create new article
    </a>
    <h2>
      Total articles: <?= $total; ?>
    </h2>
    <?php include __DIR__ . '/../partials/search-form.php'; ?>
  </div>
  
  
  <?php
    if ($totalPages > 1) {
      include __DIR__ . '/../partials/page-pagination.php';
    }
  ?>
  
  <div class="row">
    <?php foreach ($articles as $article): ?>
      <div class="col col-md-4 mb-4">
        <?php include __DIR__ . '/../partials/article.php'; ?>
      </div>
    <?php endforeach; ?>
  </div>
  
  <?php
    if ($totalPages > 1) {
      include __DIR__ . '/../partials/page-pagination.php';
    }
  ?>
</div>
</body>
</html>