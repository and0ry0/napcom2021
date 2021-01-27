<nav class="text-white w-screen overflow-hidden bg-gray-500">
  <div class="overflow-x-scroll mx-auto px-4 650:px-0 w-screen 650:w-650 1000:w-960 relative h-full flex items-center 650:justify-between
  <?php
  // set dafault mode
  $args = wp_parse_args(
    $args,
    array(
      'mode' => 'top',
    )
  );

  if ($args['mode'] === 'bottom') {
    echo 'pb-4';
  } else {
    echo 'pt-4';
  };
  ?>">
    <div class="flex whitespace-nowrap">
    <?php
    if ($args['mode'] === 'top') {
      $round = 'rounded-t-xl';
    } else {
      $round = 'rounded-b-xl';
    };
    ?>
      <a class="text-black bg-white inline-block p-2 font-bold <?php echo $round ?>"><?php echo bloginfo('name') ?></a>
      <?php
      $links = array(
        '🐤 Twitter' => 'https://twitter.com/napoan',
        '🚆 都市開発ワールド' => 'http://portal.eximradar.jp/?p=156',
        '🏹 RPG TheLow' => 'https://wikiwiki.jp/thelow/',
        '🍖 サバイバルワールド' => 'https://portal.eximradar.jp/?p=625'
      );

      foreach ($links as $name => $url) { ?>
        <a class="ml-1 text-gray-800 bg-gray-200 inline-block p-2 font-bold hover:bg-white hover:text-black <?php echo $round ?>" href="<?php echo $url ?>"><?php echo $name; ?></a>
      <?php };
      ?>
    </div>
  </div>
</nav>