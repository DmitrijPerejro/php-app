<?php require __DIR__ . '/../partials/meta.php'; ?>

<!doctype html>
<html lang="en">
<?php include __DIR__ . '/../partials/head.php'; ?>
<?= meta('Registration', 'registration page of app') ?>
<body class="">
<div class="container vh-100">
    <div class="row justify-content-center align-items-center h-100">
        <div class="col-8">
            <form action="registration/data" class="p-4 shadow rounded" method="POST" novalidate>
                <div class="mb-3">
                    <label for="email" class="form-label fs-3">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="email@email.com">
                </div>
                <div class="mb-3">
                    <label for="login" class="form-label fs-3">Login</label>
                    <input type="text" class="form-control" id="login" name="login" placeholder="perejro">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label fs-3">Password</label>
                    <input type="password" class="form-control" name="password" id="password">
                </div>
                <button type="submit" class="btn btn-primary w-100 p-2 text-uppercase fs-5">
                    registration
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

<script>
    const form = document.querySelector('form');

    form.addEventListener('submit', async (event) => {
        event.preventDefault();

        const formData = new FormData();

        form.querySelectorAll(('input')).forEach(((item) => {
            formData.set(item.getAttribute('name'), item.value)
        }));

        try {
            const response = await fetch(form.getAttribute('action'), {
                method: 'POST',
                body: formData,
            });
            const result = await response.json();
            document.location.href = 'users';
        } catch (err) {
        }
    })
</script>
</body>
</html>