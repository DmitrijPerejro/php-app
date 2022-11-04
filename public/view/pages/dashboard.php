<!doctype html>
<html lang="en">
<?php include __DIR__ . '/../partials/head.php'; ?>
<?php
  $date = date_format(date_create($user['reg_date']), 'd M Y H:i');
  $login = $user['login'];
  $email = $user['email'];
  $gender = $user['gender'];
?>
<body>
<?php include __DIR__ . '/../partials/navigation.php'; ?>
<?php include __DIR__ . '/../partials/breadcrumb.php'; ?>
<div class="container">
  <a href="/app/dashboard/articles">
    my articles
  </a>
</div>
<hr>
<div class="container">
  <div class="row">
    <div class="col col-md-4">
      <a href=""></a>
      <img
        src="/app/avatars/..."
        class="rounded-circle"
        alt="avatar of <?= $login ?>"
        width="200"
        height="200"
      >
      <form action="/app/dashboard/edit/avatar" method="POST" enctype="multipart/form-data">
        <label class="input-group-text" for="avatar">Upload</label>
        <input type="file" class="" id="avatar" name="avatar">
        <button>change</button>
      </form>
    </div>
    <div class="col col-md-8">
      <small class="mb-2 d-inline-block">
        Registration: <?= $date ?>
      </small>
      <form action="/app/dashboard/edit/info" method="POST" novalidate>
        <div class="form-floating mb-3">
          <input type="email" class="form-control" id="email" value="<?= $email ?>" name="email">
          <label for="email">Email</label>
        </div>
        <div class="form-floating mb-3">
          <input type="text" class="form-control" id="login" value="<?= $login ?>" name="login">
          <label for="login">Login</label>
        </div>
        <div class="mb-3">
          <?php foreach (['male', 'female'] as $key) : ?>
            <div class="form-check form-check-inline">
              <input
                class="form-check-input"
                type="radio"
                id="<?= $key ?>"
                value="<?= $key ?>"
                name="gender"
              <?= $gender === $key ? 'checked' : '' ?> ">
              <label
                class="form-check-label"
                for="<?= $key ?>"
              >
                <strong><?= $key ?></strong>
              </label>
            </div>
          <?php endforeach; ?>
        </div>
        <button class="btn btn-success">Update</button>
      </form>
      <!--      <form action="app/dashboard/edit/password">-->
      <!--        <div class="form-floating mb-3">-->
      <!--          <input type="text" class="form-control" id="password" value="-->
      <? //= $_SESSION['user']['password'] ?><!-- name="-->
      <!--                 password">-->
      <!--          <label for="password">Password</label>-->
      <!--        </div>-->
      <!--      </form>-->
    </div>
  </div>
  <?php include __DIR__ . '/../partials/footer.php'; ?>
</div>
</body>
</html>