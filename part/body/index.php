<body class="flex flex-col min-h-screen bg-white"><!-- フッター下の余白をなくす -->

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

  <!-- Google Tag Manager -->
  <noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-WPT2KT" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <script>
    (function(w, d, s, l, i) {
      w[l] = w[l] || [];
      w[l].push({
        'gtm.start': new Date().getTime(),
        event: 'gtm.js'
      });
      var f = d.getElementsByTagName(s)[0],
        j = d.createElement(s),
        dl = l != 'dataLayer' ? '&l=' + l : '';
      j.async = true;
      j.src =
        '//www.googletagmanager.com/gtm.js?id=' + i + dl;
      f.parentNode.insertBefore(j, f);
    })(window, document, 'script', 'dataLayer', 'GTM-WPT2KT');
  </script>
  <!-- End Google Tag Manager -->

  <svg style="display:none;" version="1.1" xmlns="//www.w3.org/2000/svg">
    <defs>
      <symbol id="twitter-logo">
        <path d="m302 70a195 195 0 0 1 -299 175 142 142 0 0 0 97 -30 70 70 0 0 1 -58 -47 70 70 0 0 0 31 -2 70 70 0 0 1 -57 -66 70 70 0 0 0 28 5 70 70 0 0 1 -18 -90 195 195 0 0 0 141 72 67 67 0 0 1 116 -62 117 117 0 0 0 43 -17 65 65 0 0 1 -31 38 117 117 0 0 0 39 -11 65 65 0 0 1 -32 35" />
      </symbol>
    </defs>
  </svg>

  <?php
  //メニューは共通
  get_template_part('part/body/header'); ?>

<main class="flex-grow mx-auto px-4 650:px-0 w-screen 650:w-650 1000:w-960">
  <?php

  // mainタグは分岐
  if (is_home() || is_archive()) {
    get_template_part('part/body/main', 'home');
  } elseif (is_404()) {
    get_template_part('part/body/main', '404');
  } else {
    get_template_part('part/body/main', 'singular');
  };
  ?>
</main>

  <footer class="w-auto relative z-10 mt-16 py-8 px-6 text-center bg-gray-200">
    <p class="mb-4"><small>記事の文章または画像を引用・転載する際や、アンテナサイトに掲載する場合は該当ページへのリンクをお願いします。当サイトはMojang ABおよびMicrosoft社とは無関係であり、記事を利用したことによる如何なる損害も管理人は責任を負いません。</small>
    </p>
    <small>Copyright 2020 <?php bloginfo('name'); ?> <a href="/privacy-policy/">(プライバシーポリシー)</a> 　|　 <a href="https://portal.eximradar.jp">Powered by EXR-Network</a></small>
  </footer>

  <?php
  get_template_part('part/body/bottom');  ?>

</body>