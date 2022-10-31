<div class="card mb-3" data-reply-form="comment-<?= $comment['id'] ?>" id="comment-<?= $comment['id'] ?>">
  <div class="card-header position-relative">
    <img
      src="https://media.gq.com/photos/5d2b46883691470008b21837/16:9/w_2560%2Cc_limit/GettyImages-1138769227.jpg"
      alt="User <?= $comment['login'] ?>"
      width="50"
      height="50"
      class="rounded rounded-circle position-absolute top-50 translate-middle-y "
      style="left: -60px; object-fit: cover"
    >
    <div class="d-flex justify-content-between">
      <div>
        <a href="/app/users/<?= $comment['author_id'] ?>"><?= $comment['login'] ?></a>
        commented
        <b>
          <?= date_format(date_create($comment['createAt']), 'd M Y') ?>
        </b>
      </div>
      <div class="d-flex align-items-center">
        <div class="btn-group">
          <form
            action="/app/articles/<?= $article['id'] ?>/comment/<?= $comment['id'] ?>/like"
            method="POST"
          >
            <button class="btn btn-primary" title="like">
              <small><?= $comment['likes'] ?></small>
              <i class="fa-regular fa-heart"></i>
            </button>
          </form>
          <button class="btn btn-primary" title="reply" id="reply" data-reply="<?= $comment['id'] ?>">
            <i class="fa-solid fa-reply"></i>
          </button>
        </div>
      </div>
    </div>
  </div>
  <div class="card-body">
    <p class="card-text flex-grow-1">
      <?= $comment['body'] ?>
    </p>
  </div>
  <div class="reply-form d-none" data-id="reply-form">
    <form action="/app/articles/<?= $article['id'] ?>/comment" class="p-3 m-0" method="POST">
      <label class="form-label w-100">
        Your answer
        <textarea class="form-control mt-2" name="body"></textarea>
      </label>
      <div class="d-flex justify-content-end">
        <button class="btn btn-success mt-2">
          publish
        </button>
      </div>
      <input type="hidden" name="author_id" value="131">
      <input type="hidden" name="article_id" value="<?= $article['id'] ?>">
      <input type="hidden" name="parent_id" value="<?= $comment['id'] ?>">
    </form>
  </div>
</div>

