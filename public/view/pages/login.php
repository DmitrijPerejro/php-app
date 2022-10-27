<?php require __DIR__ . '/../partials/meta.php'; ?>

<!doctype html>
<html lang="en">
<?php include __DIR__ . '/../partials/head.php'; ?>
<?= meta('Login', 'login page of app') ?>
<body class="">
<?php include __DIR__ . '/../partials/navigation.php'; ?>
<div class="container">
  <div class="row justify-content-center">
    <div class="col-8">
      <form action="login" class="p-4 shadow rounded" method="POST" novalidate>
        <h2 class="text-center">LOGIN</h2>
        <div class="mb-3">
          <label for="email" class="form-label fs-3">Email</label>
          <input
            type="email"
            class="form-control"
            id="email"
            name="email"
            placeholder="email@email.com"
            value="<?= isset($values['email']) ? $values['email'] : '' ?>"
          >
          <?php if (isset($errors['email'])): ?>
            <small class="text-danger mt-2 d-inline-block">
              <?= $errors['email'] ?>
            </small>
          <?php endif; ?>
        </div>
        <div class="mb-3">
          <label for="password" class="form-label fs-3">Password</label>
          <input type="password" class="form-control" name="password" id="password">
          <?php if (isset($errors['password'])): ?>
            <small class="text-danger mt-2 d-inline-block">
              <?= $errors['password'] ?>
            </small>
          <?php endif; ?>
        </div>
        <div class="form-check mb-3">
          <input class="form-check-input" type="checkbox" id="remember" name="remember">
          <label class="form-check-label" for="remember">
            Remember me
          </label>
        </div>
        <div class="d-flex justify-content-center">
          <button type="submit" class="btn btn-primary w-50 p-2 text-uppercase fs-5">
            submit
          </button>
        </div>
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