<header class="w-screen overflow-hidden z-10 mb-8">
  <div class="mx-auto w-screen 650:w-650 960:w-960 relative pt-6 h-full flex justify-center items-center sm:justify-between">
    <a class="mr-15" href="<?php echo home_url(); ?>" alt="トップページへ">
      <svg style="fill: <?php echo get_theme_mod('fill_logo') ?>" xmlns="//www.w3.org/2000/svg"
      <?php 
      $logoSelection = get_theme_mod('select_logo');
      if($logoSelection == null || $logoSelection == 'dotcom'): ?>
        width="200" viewBox="0 0 565 65"
        <?php elseif($logoSelection == 'nomaikura'): ?>
        width="200" viewBox="0 0 600 80"
        <?php elseif($logoSelection == 'manoikura'): ?>
        width="200" viewBox="0 0 640 340"
        <?php endif; ?>
      >
        <title><?php echo get_bloginfo('name'); ?></title>
        <!-- ロゴはbody/index.phpで定義 -->
        <use xmlns:xlink="//www.w3.org/1999/xlink" xlink:href="#use_logo"></use>
      </svg>
      <div class="text-center mt-1 text-gray-500"><?php echo get_theme_mod('content_underlogo'); ?></div>
    </a>

    <ul class="hidden ml-auto sm:flex">
      <li class="rounded-lg hover:bg-gray-300 mr-2 p-1"><a class="text-black" href="<?php echo home_url(); ?>/tag/mcupdate/"><span class="font-napoicon icon-chest"></span> Minecraftアップデート</a></li>
      <li class="rounded-lg hover:bg-gray-300 mr-2 p-1"><a class="text-black" href="<?php echo home_url(); ?>/tag/hytale%e5%85%ac%e5%bc%8f%e3%82%b5%e3%82%a4%e3%83%88%e7%bf%bb%e8%a8%b3/"><span class="font-napoicon icon-key"></span> Hytale情報</a></li>
      <li class="rounded-lg hover:bg-gray-300 p-1"><a class="text-black" href="https://twitter.com/napoan" onclick="ga('send', 'event', 'twitter','click', 'header_link',1 );"><span class="font-napoicon icon-twitter"></span> Twitter</a></li>
    </ul>
  </div>
</header>