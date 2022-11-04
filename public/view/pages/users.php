<!doctype html>
<html lang="en">
<?php include __DIR__ . '/../partials/head.php'; ?>
<body>
<?php include __DIR__ . '/../partials/navigation.php'; ?>
<div class="container">
  <h1 class="mb-5">
    Users
  </h1>
  
  <?php
    if ($totalPages > 1) {
      include __DIR__ . '/../partials/page-pagination.php';
    }
  ?>
  
  <div class="row">
    <?php foreach ($users as $user): ?>
      <div class="col col-md-3 mb-4">
        <?php include __DIR__ . '/../partials/user.php'; ?>
      </div>
    <?php endforeach; ?>
  </div>
  
  <?php
    if ($totalPages > 1) {
      include __DIR__ . '/../partials/page-pagination.php';
    }
  ?>
  
  <?php include __DIR__ . '/../partials/footer.php'; ?>
</div>
</body>
</html>

// плоская выборка
