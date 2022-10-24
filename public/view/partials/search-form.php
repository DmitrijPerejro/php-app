<div class="d-flex justify-content-end">
  <form action="/app/articles?search=" class="d-flex mb-0" id="search-form" method="GET">
    <input
      type="search"
      class="form-control me-2"
      placeholder="Search article"
      id="search"
      name="search"
      value="<?= $search ?>"
    >
    <button class="btn btn-outline-primary me-2" type="submit">search</button>
    <button class="btn btn-outline-warning" type="reset" id="clear">clear</button>
  </form>
</div>

<script>
  const action = '/app/articles?search=';
  const form = document.querySelector('#search-form');
  const input = form.querySelector('#search');
  const clear = form.querySelector('[type="reset"]');
  
  input.addEventListener('input', (event) => {
    form.setAttribute('action', `/app/articles?search=${event.target.value}`);
  })
  
  clear.addEventListener('click', (event) => {
    event.preventDefault();
    input.value = '';
    form.setAttribute('action', action);
    form.submit();
  })
</script>