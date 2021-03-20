<?php if (is_page('games')) : ?>
  <?php get_template_part('/part/special/games'); ?>
<?php else : ?>
  <?php if (get_post_type() === 'qanda') : ?>

    <div class="rounded-2xl shadow-2xl p-6 my-10 text-2xl font-bold">
      <div class="mb-10">
        <h1 class="">Q. <?php the_title(); ?>
          <?php
          $terms = get_the_terms($post->ID, 'games');
          if ($terms && !is_wp_error($terms)) : ?>
            <span id="single_games">
              <?php foreach ($terms as $term) : ?>
                <?php if ($term->name == 'Minecraft') : ?>
                  <span class="game <?php echo $term->slug; ?>">
                    <a href="<?php echo get_term_link($term->slug, 'games'); ?>">
                      [<?php echo $term->name; ?>]
                    </a>
                  </span>
                <?php endif; ?>
              <?php endforeach; ?>
            </span>
          <?php endif; ?>
        </h1>
      </div>
      <dl class="">
        <dd>A. <?php if(function_exists('the_field')){the_field("answer", $post->ID);} ?></dd>
      </dl>
    </div>

  <?php endif; ?>

<?php get_template_part('part/singular/header'); ?>

<?php if(get_field('hide_adsense') !== true) {get_template_part('/part/adsense/belowtitle');} ?>

  <div class="flex flex-col 1000:flex-row">
    <article class="w-full overflow-hidden mx-auto 1000:mr-auto 1000:ml-0 relative text-lg 650:w-650 leading-8" id="<?php the_ID(); ?>">

      <section class="impt">

        <?php $current_page_number = get_query_var('page'); ?>
        <?php if ($current_page_number >= 1) : ?>
          <?php $pages_defaults = array(
            'before'           => '<div class="flex items-center justify-center text-center">' . __(''),
            'after'            => '</div>',
            'link_before'      => '<div class="flex-grow m-3 text-2xl no-underline text-black font-bold px-10 py-8 rounded-lg shadow-lg transition duration-300 hover:shadow-2xl">',
            'link_after'       => '</div>',
            'next_or_number'   => 'number',
            'separator'        => ' ',
            'nextpagelink'     => __('前のページ'),
            'previouspagelink' => __('次のページ'),
            'pagelink'         => '%',
            'echo'             => 1
          );
          wp_link_pages($pages_defaults);
          ?>
        <?php endif; ?>
        <?php if (strpos(get_the_content(), 'id="more-')) :
          global $more;
          $more = 0;
          the_content(''); ?>

        <!-- 以下が続き -->

        <?php if(get_field('hide_adsense') !== true) {get_template_part('/part/adsense/readmore');} ?>

        <?php $more = 1;
          the_content('', true);
        else : the_content();
        endif; ?>

        <?php if (get_post_type() === 'qanda') : ?>

          <div id="moreinfo">
            <h2>もっと詳しい解説はこちら!</h2>
            <?php if(function_exists('the_field')){the_field('moreinfo');} ?>
          </div>

        <?php endif; ?>

        <?php
        $pages_defaults = array(
          'before'           => '<p>この記事はページ分割されています</p><div class="flex items-center justify-center text-center">' . __(''),
          'after'            => '</div>',
          'link_before'      => '<div class="flex-grow m-3 text-2xl no-underline text-black font-bold px-10 py-8 rounded-lg shadow-lg transition duration-300 hover:shadow-2xl">',
          'link_after'       => '</div>',
          'next_or_number'   => 'number',
          'separator'        => ' ',
          'nextpagelink'     => __('次のページ'),
          'previouspagelink' => __('前のページ'),
          'pagelink'         => '%',
          'echo'             => 1
        );
        wp_link_pages($pages_defaults);
        ?>

      </section>

      
      <section class="my-6 flex flex-row items-end bg-gray-100 rounded-lg">
        <a href="https://twitter.com/share?url=<?php the_permalink(); ?>&text=<?php echo get_the_title(); ?>&via=napoan" target="_blank" rel="nofollow"
         class="flex flex-1 items-center justify-center content-center m-3 bg-twitter rounded-lg text-white text-center py-2 px-6 text-xl font-bold transition-shadow duration-300 shadow-lg hover:shadow-2xl hover:text-white">
          <svg class="w-6 mr-2" style="fill:#fff" width="50" viewBox="0 0 335 276">
            <!-- part/body/index.php 参照 -->
            <use xlink:href="#twitter-logo"></use>
          </svg><b>Tweet</b></a>
      </section>

      <?php if(get_field('hide_adsense') !== true) {get_template_part('/part/adsense/bottomad');} ?>


      <div class="my-12">
        <ul class="text-xs sm:text-sm flex flex-col sm:flex-row">
          <li class="text-right overflow-hidden flex-1 rounded-tr-2xl rounded-tl-2xl rounded-bl-none sm:rounded-bl-2xl sm:rounded-tr-none sm:rounded-br-none shadow-lg transition duration-300 hover:shadow-2xl">

            <?php $prevpost = get_adjacent_post(false, '', true);
            if ($prevpost) : ?>
              <?php if (has_post_thumbnail($prevpost->ID)) {
                $image_id = get_post_thumbnail_id($prevpost->ID);
                $image_url = wp_get_attachment_image_src($image_id);
              } ?>
              <a class="block h-40 flex-1 bg-center bg-cover" href="<?php echo get_permalink($prevpost->ID); ?>" style="background-image: url(<?php
                                                                                                                                              if ($image_url[0] === null) {
                                                                                                                                                echo '/wp-content/themes/napcom2021/img/napocomlogo2020-ogp.png';
                                                                                                                                              } else {
                                                                                                                                                echo $image_url[0];
                                                                                                                                              };
                                                                                                                                              ?>)">
                <div class=" z-10 bg-gray-400 bg-opacity-20 w-full h-40 p-6">
                  <span class="text-white bg-gray-800 p-1 leading-10">Prev: <?php echo esc_attr($prevpost->post_title); ?></span>
                </div>
              </a>

            <?php else : ?>
              <a class="block h-40 flex-1 bg-center bg-cover" href="/" style="background-image: url(/wp-content/themes/napcom2021/img/napocomlogo2020-ogp.png)">
                <div class=" z-10 bg-gray-400 bg-opacity-20 w-full h-40 p-6">
                  <span class="text-white bg-gray-800 p-1 leading-10">Prev: not found</span>
                </div>
              </a>
            <?php endif; ?>
          </li>
          <li class="overflow-hidden flex-1 rounded-bl-2xl rounded-br-2xl sm:rounded-tr-2xl sm:rounded-bl-none shadow-lg transition duration-300 hover:shadow-2xl">
            <?php $nextpost = get_adjacent_post(false, '', false);
            if ($nextpost) : ?>
              <?php if (has_post_thumbnail($nextpost->ID)) {
                $image_id = get_post_thumbnail_id($nextpost->ID);
                $image_url = wp_get_attachment_image_src($image_id);
              } ?>
              <a class="block h-40 flex-1 bg-center bg-cover" href="<?php echo get_permalink($nextpost->ID); ?>" style="background-image: url(<?php
                                                                                                                                              if ($image_url[0] === null) {
                                                                                                                                                echo '/wp-content/themes/napcom2021/img/napocomlogo2020-ogp.png';
                                                                                                                                              } else {
                                                                                                                                                echo $image_url[0];
                                                                                                                                              };
                                                                                                                                              ?>)">
                <div class="z-10 bg-gray-400 bg-opacity-20 w-full h-40 p-6">
                  <span class="text-white bg-gray-800 p-1 leading-10">Next: <?php echo esc_attr($nextpost->post_title); ?></span></div>
              </a>
            <?php else : ?>
              <a class="block h-40 flex-1 bg-center bg-cover" href="/" style="background-image: url(/wp-content/themes/napcom2021/img/napocomlogo2020-ogp.png)">
                <div class=" z-10 bg-gray-400 bg-opacity-20 w-full h-40 p-6">
                  <span class="text-white bg-gray-800 p-1 leading-10">Next: not found</span>
                </div>
              </a>
            <?php endif; ?>
          </li>
        </ul>
      </div>

      <section class="">

        <h1 class="" id="commentform">コメント</h1>
        <div class="m-2 p-2 rounded-xl shadow-xl">記事の内容が最新のものと異なる場合があります。ご了承ください。
        </div>

        <?php comments_template(); ?>

        <div class="my-3">
          <?php if (function_exists('wpsabox_author_box')) echo wpsabox_author_box(); ?>
        </div>

      </section>

    </article><!-- /.c-story -->

    <?php get_template_part('part/body/sidebar') ?>

  </div>
<?php endif; ?>
<!-- 特殊ページ以外 -->