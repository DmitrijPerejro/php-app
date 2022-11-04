<?php
  
  use Core\SessionManager;

?>

<!doctype html>
<html lang="en">
<?php include __DIR__ . '/../../partials/head.php'; ?>
<body>
<?php include __DIR__ . '/../../partials/navigation.php'; ?>
<?php include __DIR__ . '/../../partials/breadcrumb.php'; ?>
<div class="container">
  <div class="row">
    <?php if (empty($articles)) : ?>
      <p class="fs-1">
        You doesn't have any posts
      </p>
    <?php else: ?>
      <?php foreach ($articles as $article): ?>
        <div class="col col-md-4 mb-4">
          <?php include __DIR__ . '/../../partials/article.php'; ?>
        </div>
      <?php endforeach; ?>
    <?php endif; ?>
  </div>
</div>
</body>
</html>
