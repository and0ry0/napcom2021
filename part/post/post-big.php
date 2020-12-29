<article id="<?php the_ID(); ?>"  class="flex flex-col overflow-hidden w-auto shadow-2xl rounded-2xl">
<a class="block h-64 overflow-hidden flex-none" href="<?php echo get_permalink(); ?>">
    <?php if (has_post_thumbnail()): ?>
      <?php if(get_the_post_thumbnail_url() == null): ?>
        <img  class="h-full object-cover w-max" alt="NO IMAGE" src="<?php echo get_template_directory_uri() ?>/img/napocomlogo2020-ogp.png" title="NO IMAGE" width="600px" height="338px"/>
      <?php else: ?>
        <img class="h-full object-cover w-max" src="<?php echo get_the_post_thumbnail_url() ?>" alt="<?php the_title(); ?>のアイキャッチ画像" title="<?php the_title(); ?>" width="600px" height="338px"/>
      <?php endif; ?>
    <?php else: ?>
      <img  class="h-full object-cover w-max" alt="NO IMAGE" src="<?php echo get_template_directory_uri() ?>/img/napocomlogo2020-ogp.png" title="NO IMAGE" width="600px" height="338px"/>
    <?php endif; ?>
</a>
<div class="flex-grow mt-3 mb-3 px-2">
<h2 class="font-bold text-lg" itemprop="name">
	<a class="" href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a>
</h2>
<small class="">
  <time datetime="<?php echo get_the_date('Y年m月d日'); ?>" pubdate="pubdate"><?php echo get_the_date('Y年m月d日'); ?></time>
</small>
</div>
</article>