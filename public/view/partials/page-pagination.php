<?php
  $path = parse_url($_SERVER['REQUEST_URI'])['path'];
?>

<nav>
  <ul class="pagination d-flex justify-content-center align-items-center p-2">
    <li class="page-item me-2">
      <a
        class="page-link  <?= !$hasPrevPage ? 'disabled' : '' ?>"
        href="<?= $path ?>?page=<?= $currentPage - 1 ?>"
      >
        Previous
      </a>
    </li>
    <?php for ($i = 0; $i <= $totalPages; $i++): ?>
      <li class="page-item">
        <a
          class="page-link <?= $currentPage === $i + 1 ? 'active' : '' ?>"
          href="<?= $path ?>?page=<?= $i + 1 ?>"
        >
          <?= $i + 1 ?>
        </a>
      </li>
    <?php endfor; ?>
    <li class="page-item ms-2">
      <a
        class="page-link  <?= !$hasNextPage ? 'disabled' : '' ?>"
        href="<?= $path ?>?page=<?= $currentPage + 1 ?>"
      >
        Next
      </a>
    </li>
  </ul>
</nav>