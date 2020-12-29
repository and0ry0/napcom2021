<?php
//投稿のbody_classにカテゴリ名を付ける
function add_category_to_single($classes) {
    if (is_single() ) {
        global $post;
        foreach((get_the_category($post->ID)) as $category) {
            $classes[] = ''.$category->category_nicename;
        }
    }
return $classes;
}
add_filter('body_class','add_category_to_single');

// カテゴリ表示にスラッグを付ける
function categories_label() {
    $cats = get_the_category();
    foreach($cats as $cat){
        echo '<li><a href="'.get_category_link($cat->term_id).'" ';
        echo 'class="'.esc_attr($cat->slug).'">';
        echo esc_html($cat->name);
        echo '</a></li>';
    }
}

// カテゴリ一覧にスラッグ
function add_cat_slug_class( $output, $args ) {
    $regex = '/<li class="cat-item cat-item-([\d]+)[^"]*">/';
    $taxonomy = isset( $args['taxonomy'] ) && taxonomy_exists( $args['taxonomy'] ) ? $args['taxonomy'] : 'platforms';
     
    preg_match_all( $regex, $output, $m );
     
    if ( ! empty( $m[1] ) ) {
        $replace = array();
        foreach ( $m[1] as $term_id ) {
            $term = get_term( $term_id, $taxonomy );
            if ( $term && ! is_wp_error( $term ) ) {
                $replace['/<li class="cat-item cat-item-' . $term_id . '("| )/'] = '<li class="cat-item cat-item-' . $term_id . ' cat-item-' . esc_attr( $term->slug ) . '$1';
            }
        }
        $output = preg_replace( array_keys( $replace ), $replace, $output );
    }
    return $output;
}
add_filter( 'wp_list_categories', 'add_cat_slug_class', 10, 2 );

// タクソノミー表示の順番を並べ替えた通りにする
function terms($a, $b){
 
    if ( intval($a->term_order) == intval($b->term_order)) {
        return 0;
    }
    return (intval($a->term_order) < intval($b->term_order)) ? -1 : 1;
 
}
function terms_sort($terms, $object_ids, $taxonomies, $args){
    if(!is_admin()){
        usort($terms , "terms");
    }
    return $terms;
}
add_filter('wp_get_object_terms','terms_sort',99,4);

// Jetpackの余計なjsを無効化
add_action( 'wp_enqueue_scripts', 'dequeue_devicepx', 20 );
function dequeue_devicepx() {
    wp_dequeue_script( 'devicepx' );
}

// dashicons.cssを無効化
add_action('wp_print_styles', 'napo_deregister_styles', 100);
function napo_deregister_styles() { 
    wp_deregister_style( 'dashicons' ); 
}

?>
