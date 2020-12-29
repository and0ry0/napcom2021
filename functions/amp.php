<?php

// 特定の記事でAMP表示しない
add_filter( 'amp_skip_post', 'skip_disable_amp_posts', 10, 3 );
function skip_disable_amp_posts( $skip, $post_id, $post ) {
	$amp_meta = get_post_meta( $post_id, '_disable_amp', true);
	if ( 'disable' === $amp_meta ) {
		$skip = true;
	}
	return $skip;
}

// AMPプラグインが有効なとき、投稿画面にAMP無効の項目を追加
add_action( 'add_meta_boxes', 'myplg_meta_box_init' );
function myplg_meta_box_init() {
  include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
  if ( is_plugin_active('amp/amp.php') ) {
    add_meta_box( 'disable_amp', 'AMP', 'my_disable_amp_box', 'post', 'side', 'default' );   
  }
}

function my_disable_amp_box( $post, $box ) {
  $amp_meta = get_post_meta( $post->ID, '_disable_amp', true );
  $status = ( $amp_meta === 'disable' ) ? ' checked="checked"' : '';
  echo '<form action="" method="POST"><label for="disable_amp_checkbox"><input id="disable_amp_checkbox" type="checkbox" name="disable_amp" value="disable"' . $status . '/>AMPを無効にする</label>';
  wp_nonce_field( 'disable_amp_action', 'disable_amp_nonce' );
  echo '</form>';
}
// カスタムフィールドで管理
add_action( 'save_post', 'save_disable_amp_meta' );
function save_disable_amp_meta( $post_id ) {
  // 自動保存を無視
  if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
    return;
  }
  // セキュリティ関係
  if ( ! isset( $_POST['disable_amp_nonce'] ) || ! check_admin_referer( 'disable_amp_action', 'disable_amp_nonce' ) ) {
    return;
  }
  // カスタムフィールドの更新
  if ( isset($_POST['disable_amp']) ) {
    update_post_meta( $post_id, '_disable_amp', $_POST['disable_amp'] );
  } else {
    $amp_meta = get_post_meta( $post_id, '_disable_amp', false );
    if ( ! empty( $amp_meta ) ) {
    update_post_meta( $post_id, '_disable_amp', '' );
    }
  }
}

// AMPのLOGOのJSON
add_filter( 'amp_post_template_metadata', 'amp_modify_json_metadata', 10, 2 );

function amp_modify_json_metadata( $metadata, $post ) {
	$metadata['publisher']['logo'] = array(
		'@type' => 'ImageObject',
		'url' => get_template_directory_uri() . '/img/napocomlogo2020.png',
		'height' => 61,
		'width' => 568,
	);
	return $metadata;
}

?>