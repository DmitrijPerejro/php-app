<a class="card h-100 d-flex flex-column align-items-center p-3 shadow text-secondary"
   href="/app/users/<?= $user['id'] ?> ">
  <img src="<?= $user['avatar'] ?>" class="rounded rounded-circle mx-auto d-block mb-3"
       alt="<?= $user['login'] ?>"
       style="object-fit: cover"
       width="100"
       height="100">
  <small>
    login: <?= $user['login'] ?>
  </small>
  <small>
    email: <?= $user['email'] ?>
  </small>
  <small>
    <?= date_format(date_create($user['reg_date']), 'd M Y'); ?>
  </small>
</a>