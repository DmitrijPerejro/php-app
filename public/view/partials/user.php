<div class="card h-100 d-flex flex-column align-items-center p-3 border border-primary">
  <img src="<?= $user['avatar'] ?>" class="rounded mx-auto d-block mb-3" alt="<?= $user['login'] ?>" width="150" height="150">
  <h5>
    login: <?= $user['login'] ?>
  </h5>
  <h6>
    email: <?= $user['email'] ?>
  </h6>
  <h6>
    password: <?= $user['password'] ?>
  </h6>
  <h6>
    reg date <?=  date_format(date_create($user['reg_date']), 'd M Y'); ?>
  </h6>
</div>