<?php require __DIR__ . '/../partials/meta.php'; ?>

<!doctype html>
<html lang="en">
<?php include __DIR__ . '/../partials/head.php'; ?>
<?= meta('Login', 'login page of app') ?>
<body class="">
<div class="container vh-100">
  <div class="row justify-content-center align-items-center h-100">
    <div class="col-8">
      <form action="login/data" class="p-4 shadow rounded" method="POST">
        <div class="mb-3">
          <label for="email" class="form-label fs-3">Email</label>
          <input type="email" class="form-control" id="email" name="email" placeholder="email@email.com">
        </div>
        <div class="mb-3">
          <label for="password" class="form-label fs-3">Password</label>
          <input type="password" class="form-control" name="password" id="password">
        </div>
        <button type="submit" class="btn btn-primary w-100 p-2 text-uppercase fs-5">
          login
        </button>
          <div class="mt-3 text-end">
              <small>
                  <a href="registration" class="text-decoration-none">I don't have an account</a>
              </small>
          </div>
      </form>
    </div>
  </div>
</div>
</body>
</html>