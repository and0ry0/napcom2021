<?php

add_action( 'load-index.php', 
    function(){
        add_action('admin_notices', 'napcom_cpt_notice');
        add_action('admin_notices', 'napcom_tax_notice');

    }
);

function napcom_cpt_notice()
{
    $acfJson = "https://github.com/sasigume/napcom2021/blob/master/acf/acf-export-2020-12-31.json";
    $notice = '記事のデータが動かない場合は、「Advanced Custom Fields」をインストールして、 <a target="_blank" href=' . $acfJson . '>このデータ</a>をインポートしてください！';
?>
    <div class="notice my_acf_admin_notice">
        <p><?php _e($notice, 'napcom2021'); ?></p>
    </div>
    <?php

}

function napcom_tax_notice()
{
    $taxJson = "https://github.com/sasigume/napcom2021/blob/master/cpt/cpt-export-2020-12-31.json";
    $notice = 'ゲームの情報が出ない場合は「CPT UI」をインストールして、 <a noftarget="_blank" href=' . $taxJson . '>このデータ</a>をインポートしてください！';
?>
    <div class="notice napcom_first_notice">
        <p><?php _e($notice, 'napcom2021'); ?></p>
        
    </div>
<?php
}


// 記事公開前に確認
$c_message = '記事を公開します。宜しいでしょうか？';

function confirm_publish()
{
    global $c_message;
    echo '<script type="text/javascript"><!--
var publish = document.getElementById("publish");
if (publish !== null) publish.onclick = function(){
    return confirm("' . $c_message . '");
};
// --></script>';
}
add_action('admin_footer', 'confirm_publish');

// 管理画面でゲームで絞り込み
add_action('restrict_manage_posts', 'add_post_games_restrict_filter');
function add_post_games_restrict_filter()
{
    global $post_type;
    if ('post' == $post_type) {
    ?>
        <select name="games">
            <option value="">ゲーム指定なし</option>
            <?php
            $terms = get_terms('games');
            foreach ($terms as $term) { ?>
                <option value="<?php echo $term->slug; ?>"><?php echo $term->name; ?></option>
            <?php } ?>
        </select>
    <?php
    }
}

// 管理画面でプラットフォームで絞り込み
add_action('restrict_manage_posts', 'add_post_platforms_restrict_filter');
function add_post_platforms_restrict_filter()
{
    global $post_type;
    if ('post' == $post_type) {
    ?>
        <select name="platforms">
            <option value="">プラットフォーム指定なし</option>
            <?php
            $terms = get_terms('platforms');
            foreach ($terms as $term) { ?>
                <option value="<?php echo $term->slug; ?>"><?php echo $term->name; ?></option>
            <?php } ?>
        </select>
<?php
    }
}

// アイキャッチの設定忘れるなよ
add_filter('admin_post_thumbnail_html', 'add_post_thumbnail_description');
function add_post_thumbnail_description($content)
{
    return $content .= '<p style="font-weight:bold;color:red;">アイキャッチの設定、忘れるなよ!!</p>';
}

// 投稿一覧にサムネイル追加
function add_posts_columns_thumbnail($columns)
{
    $columns['thumbnail'] = 'アイキャッチ画像';
    return $columns;
}
function add_posts_columns_thumbnail_row($column_name, $post_id)
{
    if ('thumbnail' == $column_name) {
        $thumb = get_the_post_thumbnail($post_id, array(), 'thumbnail');
        echo ($thumb) ? $thumb : '－';
    }
}
add_filter('manage_posts_columns', 'add_posts_columns_thumbnail');
add_action('manage_posts_custom_column', 'add_posts_columns_thumbnail_row', 10, 2);

// サムネイルのサイズ調整CSSを追加
function my_admin_footer_script()
{
    echo '<style>
  td.thumbnail img{width:100%;height:auto;}
  </style>' . PHP_EOL;
}
add_action('admin_print_footer_scripts', 'my_admin_footer_script');

// 管理画面にfavicon追加
function admin_favicon()
{
    echo '<link rel="shortcut icon" href="' . get_stylesheet_directory_uri() . '/img/adminicon.png">';
}
add_action('admin_head', 'admin_favicon');
?>