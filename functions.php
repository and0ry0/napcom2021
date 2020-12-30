<?php

switch ( wp_get_environment_type() ) {
  case 'local':
  case 'development':
      wp_enqueue_style('tailwind_notpurged',get_template_directory_uri().'/output/style-dev.css',array());
      break;
    
  case 'production':
  default:
  wp_enqueue_style('tailwind_purged',get_template_directory_uri().'/output/style.css',array());
      break;
}


require_once locate_template('functions/admin.php'); // 管理画面に関する設定
require_once locate_template('functions/amp.php'); // AMPに関する設定
require_once locate_template('functions/control.php'); // 全体的な機能の有効化や無効化に関する設定
require_once locate_template('functions/editor.php'); // 編集画面・記事内容関連
require_once locate_template('functions/etcs.php'); // 便利な関数たち
require_once locate_template('functions/image.php'); // 画像関連の関数たち
require_once locate_template('functions/widget.php'); // ウィジェット関連
require_once locate_template('functions/login.php'); // ログイン画面
require_once locate_template('functions/customize.php'); // テーマカスタマイザー
?>