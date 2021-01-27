<?php

// ウィジェット有効化
if ( function_exists('register_sidebar') ) {
    register_sidebar(array(
        'name' => 'サイドバーのウィジェット',
        'id' => 'sidebar',
        'before_widget' => '<div id="%1$s" class="relative mw-200 flex-1 py-3">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="font-bold mb-6 pl-2 border-l-4 border-gray-400">',
        'after_title' => '</h2>'
    ));
}
