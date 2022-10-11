<!doctype html>
<html lang="en">
<?php include __DIR__ . '/partials/head.php'; ?>
<body>
    <div class="container">
    <?php include __DIR__ . '/partials/navigation.php'; ?>
    <h1>
        Articles
    </h1>

    <div class="row">
      <?php foreach ($articles as $id => $article): ?>
          <div class="col col-md-4">
            <?php include __DIR__ . '/partials/article.php'; ?>
          </div>
      <?php endforeach; ?>
    </div>

    <?php include __DIR__ . '/partials/footer.php'; ?>
    </div>

</body>
</html>