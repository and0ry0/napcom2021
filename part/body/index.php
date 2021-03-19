<body class="flex flex-col min-h-screen bg-white">

  <svg style="display:none;" version="1.1" xmlns="//www.w3.org/2000/svg">
    <defs>
      <symbol id="use_logo">
        <?php
        if (get_theme_mod('usemysvg') == true) {
          echo get_theme_mod('mysvg');
        } else {
          if (get_theme_mod('select_logo') == null) {
            // 先にnullの場合を定義しないと表示されないっぽい
            get_template_part('part/svg/logo', 'dotcom');
          } else {
            get_template_part('part/svg/logo', get_theme_mod('select_logo'));
          }
        }
        ?>
      </symbol>
    </defs>
  </svg>

  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PQMHZF4" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->

  <svg style="display:none;" version="1.1" xmlns="//www.w3.org/2000/svg">
    <defs>
      <symbol id="twitter-logo">
        <path d="m302 70a195 195 0 0 1 -299 175 142 142 0 0 0 97 -30 70 70 0 0 1 -58 -47 70 70 0 0 0 31 -2 70 70 0 0 1 -57 -66 70 70 0 0 0 28 5 70 70 0 0 1 -18 -90 195 195 0 0 0 141 72 67 67 0 0 1 116 -62 117 117 0 0 0 43 -17 65 65 0 0 1 -31 38 117 117 0 0 0 39 -11 65 65 0 0 1 -32 35" />
      </symbol>
    </defs>
  </svg>

  <?php
  //メニューは共通

  get_template_part('part/body/topmenu');
  get_template_part('part/body/header', null, array(
    'mode' => 'top'
  )); ?>

  <div class="mb-8 w-screen relative overflow-hidden" style="height: 12rem;background:linear-gradient(344deg, rgba(38,135,232,0.6320903361344538) 0%, rgba(58,199,227,0.4248074229691877) 100%);">

    <div class="w-full absolute z-20 top-0 left-0 py-16">
      <div class="w-full md:w-sm lg:w-md mx-auto">
        <div class="text-2xl text-white" style="text-shadow:0px 1px 5px #000">日本最大の、<br />マインクラフト情報源。</div>
      </div>
    </div>
    <div class="absolute special_img_div">
      <img class="w-full" src="<?php bloginfo('template_directory'); ?>/img/bg-thumbnails.png')" />
    </div>
    <style>.special_img_div{top:-200px;left:-240px;min-width:140%;}
  @media screen and (max-width:1300px){.special_img_div{top:-150px;left:-100px;min-width:150%;}} 
  @media screen and (max-width:600px){.special_img_div{top:-100px;left:-150px;min-width:160%;}} 
  </style>
  </div>

  <main class="flex-grow mx-auto px-4 650:px-0 w-screen 650:w-650 1000:w-960 mb-8">


    <?php

    // mainタグは分岐
    if (is_single() || is_page()) {
      get_template_part('part/body/main', 'singular');
    } elseif (is_home() || is_archive() || is_post_type_archive() || is_search() || is_tax()) {
      get_template_part('part/body/main', 'home');
    } elseif (is_404()) {
      get_template_part('part/body/main', '404');
    } else {
      get_template_part('part/body/main', 'home');
    };
    ?>
  </main>

  <?php
  get_template_part('part/body/footer');
  get_template_part('part/body/topmenu', null, array(
    'mode' => 'bottom'
  ));
  /* get_template_part('part/body/exr'); */
  get_template_part('part/body/bottom'); ?>

</body>