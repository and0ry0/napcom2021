<?php

//カテゴリ無効化  
function unregister_categories() {
    register_taxonomy( 'category', array() );
}
add_action( 'init', 'unregister_categories' );

// wp_headのアイコン無効化
remove_action('wp_head', 'wp_site_icon', 99);

// GutenbergのCSS無効化
function dequeue_plugins_style() {
    wp_dequeue_style('wp-block-library');
}
add_action( 'wp_enqueue_scripts', 'dequeue_plugins_style', 9999);

// プロフィールでHTMLタグを使えるように
remove_filter('pre_user_description', 'wp_filter_kses');

// 絵文字を無効化
function disable_emoji() {
     remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
     remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
     remove_action( 'wp_print_styles', 'print_emoji_styles' );
     remove_action( 'admin_print_styles', 'print_emoji_styles' );    
     remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
     remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );    
     remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
}
add_action( 'init', 'disable_emoji' );

// RSSにアイキャッチ画像を含める
function post_thumbnail_in_feeds($content) {
    global $post;
    if(has_post_thumbnail($post->ID)) {
        $content = '<div>' . get_the_post_thumbnail($post->ID) . '</div>' . $content;
    }
    return $content;
}
add_filter('the_excerpt_rss', 'post_thumbnail_in_feeds');
add_filter('the_content_feed', 'post_thumbnail_in_feeds');

?>