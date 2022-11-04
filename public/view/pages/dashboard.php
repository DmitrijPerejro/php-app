<!doctype html>
<html lang="en">
<?php include __DIR__ . '/../partials/head.php'; ?>

<body>
<?php include __DIR__ . '/../partials/navigation.php'; ?>
<div class="container">
  <div class="row">
    <div class="col col-md-4">
      <a href=""></a>
      <img
        src="/app/avatars/..."
        class="rounded-circle"
        alt="avatar of <?= $user['login'] ?>"
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
        Registration: <?= date_format(date_create($user['reg_date']), 'd M Y H:i'); ?>
      </small>
      <form action="/app/dashboard/edit/info" method="POST" novalidate>
        <div class="form-floating mb-3">
          <input type="email" class="form-control" id="email" value="<?= $user['email'] ?>" name="email">
          <label for="email">Email</label>
        </div>
        <div class="form-floating mb-3">
          <input type="text" class="form-control" id="login" value="<?= $user['login'] ?>" name="login">
          <label for="login">Login</label>
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