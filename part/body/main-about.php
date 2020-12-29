<?php
error_reporting(E_ALL & ~E_NOTICE);
?>

<div class="l-single__container">

  <main class="l-single__main">

    <div class="l-single__top p-top">
      <div class="p-top__inner">
        <div class="mx-auto">
          <svg xmlns="//www.w3.org/2000/svg" class="w-64" width="200" viewBox="0 0 570 60">
            <?php get_template_part('part/svg/logo', 'wide') ?>
          </svg>
        </div>
        <b>このサイトについて</b>
      </div>
    </div>
    >
    <div class="l-single__2col">
      <article class="l-single__block l_single__2col__left c-story" id="<?php the_ID(); ?>">

        <!-- 記事本文 -->
        <section class="c-story__text">

          <?php the_content(); ?>

      </article><!-- /.c-story -->

      <?php get_template_part('part/body/sidebar') ?>

    </div>

  </main>
</div>