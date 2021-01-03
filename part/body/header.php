<header class="z-10 w-screen overflow-hidden mb-4">
  <div class="mx-auto px-4 650:px-0 w-screen 650:w-650 1000:w-960 relative pt-6 h-full flex justify-center items-center 650:justify-between">
    <a class="mr-15" href="<?php echo home_url(); ?>" alt="トップページへ">
      <svg style="fill: <?php echo get_theme_mod('fill_logo') ?>" xmlns="//www.w3.org/2000/svg" <?php
                                                                                                $logoSelection = get_theme_mod('select_logo');
                                                                                                $width = get_theme_mod('mysvg_width');
                                                                                                $viewBox = get_theme_mod('mysvg_viewBox');
                                                                                                if (get_theme_mod('usemysvg') == 1) {
                                                                                                  echo "width=\"" . $width . "\" viewBox=\"" . $viewBox . "\"";
                                                                                                } else {
                                                                                                  if ($logoSelection == null || $logoSelection == 'dotcom') {
                                                                                                    echo "width=\"200\" viewBox=\"0 0 565 65\"";
                                                                                                  } elseif ($logoSelection == 'nomaikura') {
                                                                                                    echo "width=\"200\" viewBox=\"0 0 600 80\"";
                                                                                                  } elseif ($logoSelection == 'manoikura') {
                                                                                                    echo "width=\"200\" viewBox=\"0 0 640 340\"";
                                                                                                  } else {
                                                                                                    echo "width=\"200\" viewBox=\"0 0 565 65\"";
                                                                                                  }
                                                                                                } ?>>
        <title><?php echo get_bloginfo('name'); ?></title>
        <!-- ロゴはbody/index.phpで定義 -->
        <use xmlns:xlink="//www.w3.org/1999/xlink" xlink:href="#use_logo"></use>
      </svg>
      <div class="text-center mt-1 text-gray-500"><?php echo get_theme_mod('content_underlogo'); ?></div>
    </a>

    <div class="hidden ml-auto 650:flex">
      <?php
      wp_nav_menu(array(
        // widget.php参照
        'theme_location'    => "header_menu",
        'items_wrap' => '%3$s',
        'menu_class'        => "",
        'container_class'   => "flex flex-wrap list-none",
        'before'            => "<div class=\"ml-3\">",
        'after' => "</div>",
        'link_before' => "<a class=\"inline-block bg-gray-100 transition duradion-300 p-2 rounded-md hover:bg-gray-200\">",
        'link_after' => "</a>"
      )); ?>
    </div>
  </div>
</header>