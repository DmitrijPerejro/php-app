<!doctype html>
<html lang="en">
<?php include __DIR__ . '/../partials/head.php'; ?>
<body>
<div class="container">
    <div class="card">
        <h5 class="card-header"><?= $article['title'] ?></h5>
        <div class="card-body">
          <?= $article['body'] ?>
        </div>
    </div>
</div>
</body>
</html>