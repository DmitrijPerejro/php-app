<!doctype html>
<html lang="en">
<?php include __DIR__ . '/../partials/head.php'; ?>
<body>
<?php include __DIR__ . '/../partials/navigation.php'; ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <form action="new" class="p-4 shadow rounded" method="POST">
                <div class="mb-3">
                    <label for="title" class="form-label fs-3">Title</label>
                    <input type="text" class="form-control" id="title" name="title">
                </div>
                <div class="mb-3">
                    <label for="body" class="form-label fs-3">Body</label>
                    <textarea id="body" class="form-control h-50" name="body"></textarea>
                </div>
                <button type="submit" class="btn btn-primary w-100 p-2 text-uppercase fs-5">
                    create
                </button>
            </form>
        </div>
    </div>
  
  <?php include __DIR__ . '/../partials/footer.php'; ?>
</div>
</body>
</html>