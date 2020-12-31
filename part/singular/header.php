  <!-- 記事ヘッダー、記事タイトル -->
  <header class="mb-6 w-auto">
    <?php
    if (get_the_tag_list()) {
      echo get_the_tag_list('<dl class="mb-6 flex flex-wrap">
      <dd class="inline-block p-2 m-1 bg-gray-100 hover:bg-blue-200 border-1 font-bold border-gray-500 rounded-xl shadow-xl">', '</dd><dd class="c-singleTags__tag">', '</dd></dl>');
    }
    ?>

    <div class="flex items-start justify-between flex-row font-bold text-gray-400 mb-5">
      <div class="text-4xl mb-0">
        <div><time class="" datetime="<?php echo get_the_date('Y年m月d日') ?>" pubdate="pubdate"><?php echo get_the_date('Y.m.d'); ?></time></div>
        <div class="text-lg">/ UPDATE : <time datetime="<?php the_modified_date('Y年m月d日') ?>" pubdate="pubdate"><?php the_modified_date('Y.m.d'); ?></time></div>
      </div>
      <div>
        <div class="text-right">POSTED BY :</div>
        <div class="flex items-center rounded-lg p-1 bg-gray-100">
          <div class="rounded-full overflow-hidden mr-3">
            <?php
            $defaultAvatar = get_template_directory_uri() + '/img/napoanda.png';
            $avatar = get_avatar(get_the_author_meta('ID'), 32);
            echo $avatar; ?>
          </div>
          <b><?php echo the_author_meta('display_name'); ?></b>
        </div>
      </div>
    </div>

    <?php if (get_post_type() != ('qanda')) : ?>
      <h1 class="mb-4 text-2xl font-bold text-black sm:text-3xl" itemprop="name">
        <?php the_title(); ?>
        <?php
        $terms = get_the_terms($post->ID, 'games');
        if ($terms && !is_wp_error($terms)) : ?>
          <span id="c-singleHeader__games">
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
      <?php if (get_post_type() === 'post') : ?>
        <span class="text-gray-600">
          <?php if (function_exists('the_field')) {
            the_field("introduction", $post->ID);
          } ?>
        </span>
      <?php endif; ?>
    <?php endif; ?>

  </header>