<?php require __DIR__ . '/../partials/meta.php'; ?>
<!doctype html>
<html lang="en">
<?php include __DIR__ . '/../partials/head.php'; ?>
<?= meta('Registration', 'registration page of app') ?>
<body class="">
<?php include __DIR__ . '/../partials/navigation.php'; ?>
<div class="container">
  <div class="row justify-content-center">
    <div class="col-8">
      <form
        action="/app/registration"
        class="p-4 shadow rounded"
        method="POST"
        novalidate
      >
        <h2 class="text-center">REGISTRATION</h2>
        <div class="mb-3">
          <label for="email" class="form-label fs-3">Email</label>
          <input type="email" class="form-control" id="email" name="email" placeholder="email@email.com">
          <?php if (isset($errors['email'])): ?>
            <small class="text-danger mt-2 d-inline-block">
              <?= $errors['email'] ?>
            </small>
          <?php endif; ?>
        </div>
        <div class="mb-3">
          <label for="login" class="form-label fs-3">Login</label>
          <input type="text" class="form-control" id="login" name="login" placeholder="perejro">
          <?php if (isset($errors['login'])): ?>
            <small class="text-danger mt-2 d-inline-block">
              <?= $errors['login'] ?>
            </small>
          <?php endif; ?>
        </div>
        <div class="mb-3">
          <label for="password" class="form-label fs-3">Password</label>
          <div class="position-relative">
            <input type="password" class="form-control" name="password" id="password">
            <button
              class="position-absolute btn btn-outline-dark btn-sm top-50 end-0 me-3 translate-middle-y rounded-circle p-0 d-flex justify-content-center align-items-center"
              style="width: 28px; height: 28px"
              type="button"
              id="showPassword"
            >
              <i class="fa-solid fa-eye"></i>
            </button>
          </div>
          <?php if (isset($errors['password'])): ?>
            <small class="text-danger mt-2 d-inline-block">
              <?= $errors['password'] ?>
            </small>
          <?php endif; ?>
        </div>
        <button type="submit" class="btn btn-primary w-100 p-2 text-uppercase fs-5">
          submit
        </button>
        <div class="mt-3 text-end">
          <small>
            <a href="login" class="text-decoration-none">I have an account yet</a>
          </small>
        </div>
      </form>
    </div>
  </div>
</div>

<!--<script src="--><? //= __DIR__ ?><!-- . '/../../assets/js/inputChangeType.js'"></script>-->
<script src="/app/public/assets//js/inputChangeType.js"></script>
<script>
  inputChangeType('showPassword', 'password')
</script>
</body>
</html>