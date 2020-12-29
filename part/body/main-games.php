<div class="l-single__container">

  <main class="l-single__main">

    <div class="l-single__2col">
      <article class="l-single__block l_single__2col__left c-story" id="<?php the_ID(); ?>">

        <!-- 記事本文 -->
        <section class="c-story__text">

          <h1>ゲーム一覧</h1>

          <ul class="cattag gamelist">
            <?php
            $terms = get_terms('games');
            foreach ($terms as $term) {
              echo '<li><a href="' . get_term_link($term) . '">' . $term->name . '</a></li>';
            }
            ?>
          </ul>

        </section>

      </article>


      <?php get_template_part('part/body/sidebar') ?>
    </div>

  </main>

</div><!-- /.l-single -->