<!doctype html>
<html lang="en">
<?php include __DIR__ . '/../partials/head.php'; ?>
<body>
<?php include __DIR__ . '/../partials/navigation.php'; ?>
<div class="container">
  <?php include __DIR__ . '/partials/navigation.php'; ?>
    <h1 class="mb-5">
      <?php print_r($title); ?> (<?php print_r(count($users)); ?>)
    </h1>

    <div class="row">
      <?php foreach ($users as $user): ?>
          <div class="col col-md-4 mb-4">
            <?php include __DIR__ . '/../partials/user.php'; ?>
          </div>
      <?php endforeach; ?>
    </div>

  <?php include __DIR__ . '/partials/footer.php'; ?>
</div>
</body>
</html>