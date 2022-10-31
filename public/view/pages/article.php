<!doctype html>
<html lang="en">
<?php include __DIR__ . '/../partials/head.php'; ?>
<body>

<?php include __DIR__ . '/../partials/navigation.php'; ?>
<div class="container">
  <div class="card">
    <h5 class="card-header"><?= $article['title'] ?></h5>
    <div class="card-body">
      <?= $article['body'] ?>
    </div>
  </div>
  <hr>
  <?php if (!empty($comments)) : ?>
    <?php foreach ($comments as $comment): ?>
      <div class="mb-2">
        <?php include __DIR__ . '/../partials/comment.php' ?>
        <?php if ($comment['parent_id'] !== null): ?>
          <div class="p-5">
            <p><?= $comments[$comment['parent_id']]['id'] ?></p>
            <p><?= $comments[$comment['parent_id']]['body'] ?></p>
          </div>
        <?php endif; ?>
      </div>
    <?php endforeach; ?>
  <?php endif; ?>
  <hr class="mt-5 mb-5">
  <form
    action="/app/articles/<?= $article['id'] ?>/comment"
    method="POST"
    class="p-3 shadow-lg rounded"
  >
    <label class="form-label w-100" for="new-comment">Your new comment</label>
    <textarea class="form-control" id="new-comment" name="body"></textarea>
    <button class="btn btn-primary mt-3" type="submit">
      submit
    </button>
    <input type="hidden" name="author_id" value="131">
    <input type="hidden" name="article_id" value="<?= $article['id'] ?>">
  </form>
  <hr class="mt-5 mb-5">
</div>

<script>
  $commentsReplyButtons = document.querySelectorAll('[data-reply]');
  $commentsReplyButtons.forEach(((elem) => {
    elem.addEventListener('click', () => {
      const id = elem.dataset.reply;
      console.log(id);
      const form = document.querySelector(`[data-reply-form="comment-${id}"]`);
      const replyForm = form.querySelector('[data-id="reply-form"]');
      
      if (replyForm.classList.contains('d-none')) {
        replyForm.classList.remove(('d-none'));
        replyForm.classList.add(('d-block'));
      } else {
        replyForm.classList.add(('d-none'));
        replyForm.classList.remove(('d-block'));
      }
    })
  }))
</script>

</body>
</html>
