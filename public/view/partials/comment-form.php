<form action="comment/new" class="p-4 shadow rounded" method="POST" novalidate>
    <div class="mb-3">
        <label for="comment" class="form-label fs-3">Comment</label>
        <textarea class="form-control" id="comment" name="body"></textarea>
    </div>
    <input type="hidden" name="author_id" value="2">
    <input type="hidden" name="article_id" value="<?= $article['id'] ?>">
    <button type="submit" class="btn btn-primary w-100 p-2 text-uppercase fs-5">
        Comment
    </button>
</form>