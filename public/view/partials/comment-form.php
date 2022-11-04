<?php
  
  use Core\SessionManager;
  
  $author_id = SessionManager::read('userId');
  dump($author_id);
?>

<form action="comment/new" class="p-2 mb-0" method="POST" novalidate>
  <div class="mb-3">
    <div class="form-floating">
      <textarea class="form-control" placeholder="Leave a comment here" id="comment" name="body"
                style="height: 140px"></textarea>
      <label for="comment">Your comment:</label>
    </div>
  </div>
  <input type="hidden" name="author_id" value="<?= $author_id ?>">
  <input type="hidden" name="article_id" value="<?= $article['id'] ?>">
  <button type="submit" class="btn btn-primary w-100 p-2 text-uppercase btn-sm">
    Comment
  </button>
</form>