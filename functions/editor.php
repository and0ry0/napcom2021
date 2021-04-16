<?php

// 2021-04-16 GutenbergでもCSSを適用
function napcom2021_editor_customizer_styles()
{
  wp_enqueue_style('napcom2021-editor-customizer-styles', get_theme_file_uri('/output/gutenberg-style.css'), false, '1.0', 'all');
}
add_action('enqueue_block_editor_assets', 'napcom2021_editor_customizer_styles');

//editor-style.cssを変更する
function my_styles()
{
  remove_editor_styles(); //親テーマのスタイルシートのリムーブ
  add_editor_style('/output/editor-style.css');
} //子テーマのスタイルシートの追加
add_action('admin_init', 'my_styles');

// 自動整形を無効化
add_action('init', function () {
  remove_filter('the_title', 'wptexturize');
  remove_filter('the_content', 'wptexturize');
  remove_filter('the_excerpt', 'wptexturize');
  remove_filter('the_title', 'wpautop');
  remove_filter('the_content', 'wpautop');
  remove_filter('the_excerpt', 'wpautop');
  remove_filter('the_editor_content', 'wp_richedit_pre');
});

// オートフォーマット関連の無効化 TinyMCE
add_filter('tiny_mce_before_init', function ($init) {
  $init['wpautop'] = false;
  $init['apply_source_formatting'] = 'ture';
  return $init;
});

//画像はpタグで囲まない、無駄なpタグを改行に
function filter_contents($content)
{
  return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
  return preg_replace('/<p>&nbsp;<\/p>/iU', '<br>', $content);
}
add_filter('the_content', 'filter_contents');
