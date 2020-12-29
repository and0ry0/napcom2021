<?php
function my_login_logo() { ?>
    <style>
        #login h1 a, .login h1 a {
            background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/img/logo3-512x.png);
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );

function my_login_logo_url() { // リンク先変更
  return home_url();
}
add_filter( 'login_headerurl', 'my_login_logo_url' );
?>