<a class="flex flex-col overflow-hidden rounded-2xl shadow-xl" href="<?php echo get_permalink(); ?>">
  <div class="flex-grow">
    <?php if (has_post_thumbnail()) : ?>
      <?php if (get_the_post_thumbnail_url() == null) : ?>
        <img class="h-full object-cover w-max" alt="NO IMAGE" src="<?php echo get_template_directory_uri() ?>/img/napocomlogo2020-ogp.png" title="NO IMAGE" width="600px" height="338px" />
      <?php else : ?>
        <img class="h-full object-cover w-max" src="<?php echo get_the_post_thumbnail_url() ?>" alt="<?php the_title(); ?>のアイキャッチ画像" title="<?php the_title(); ?>" width="600px" height="338px" />
      <?php endif; ?>
    <?php else : ?>
      <img class="h-full object-cover w-max" alt="NO IMAGE" src="<?php echo get_template_directory_uri() ?>/img/napocomlogo2020-ogp.png" title="NO IMAGE" width="600px" height="338px" />
    <?php endif; ?>
  </div>
  <div class="flex-none p-3">
    <h2 class="font-bold text-lg mb-3" itemprop="name">
      <?php the_title(); ?>
    </h2>
    <div class="flex justify-between text-sm">
      <div class="flex items-center rounded-lg p-2 bg-gray-100"
       style="background:<?php echo get_theme_mod('bg_author'); ?>;">
        <div class="rounded-full overflow-hidden mr-3">
          <?php
          $defaultAvatar = get_template_directory_uri() + '/img/napoanda.png';
          $avatar = get_avatar(get_the_author_meta('ID'), 32);
          echo $avatar; ?>
        </div>
        <b style="color:<?php echo get_theme_mod('color_author'); ?>"><?php echo the_author_meta('display_name'); ?></b>
      </div>

      <time class="text-gray-700 self-end" datetime="<?php echo get_the_date('Y年m月d日'); ?>" pubdate="pubdate"><?php echo get_the_date('Y年m月d日'); ?></time>
    </div>
  </div>
</a>