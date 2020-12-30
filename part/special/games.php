<div class="mb-8 grid grid-cols-2 gap-4">
  <?php
  $terms = get_terms('games');
  foreach ($terms as $term) {
    echo '<a class="no-underline font-bold text-black block rounded-xl shadow-xl p-3" href="' . get_term_link($term) . '">' . $term->name . '</a>';
  }
  ?>
</div>