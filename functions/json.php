<?php 

// Yoast SEOのheadのog:imageを消す
add_filter('wpseo_pre_analysis_post_content', 'mysite_opengraph_content');
    function mysite_opengraph_content($val) {
    return preg_replace("/<img[^>]+>/i", "", $val);
}

//schema.orgのJSON-LD
add_action('wp_head','insert_json_ld');
function insert_json_ld (){
    if (is_single() || is_page()) {
        if (have_posts()) : while (have_posts()) : the_post();
              $context = 'http://schema.org';
              $type = 'Article';
              $name = get_the_title();
              $logo = 'https://www.napoan.com/wp-content/themes/napcom2021/img/napocomlogo2020-ogp.png';
              $authorType = 'Person';
              $authorName = get_the_author();
              $datePublished = get_the_date('Y-n-j');
              $dateModified = get_the_modified_date('Y-n-j');
              $thumbnail_id = get_post_thumbnail_id($post->ID);
              $image = wp_get_attachment_image_src( $thumbnail_id, 'full' );
              $imageurl = $image[0];
              $imagewidth = $image[1];
              $imageheight = $image[2];
              $category_info = get_the_category();
              $articleSection = $category_info[0]->name;
              $articleBody = get_the_content();
              $url = get_permalink();
              $publisherType = 'Organization';
              $publisherName = get_bloginfo('name');
              $headline = mb_substr($name, 0, 110);
 
              $json= "
              \"mainEntityOfPage\": \"{$url}\",
              \"@context\" : \"{$context}\",
              \"@type\" : \"{$type}\",
              \"name\" : \"{$name}\",
              \"author\" : {
                   \"@type\" : \"{$authorType}\",
                   \"name\" : \"{$authorName}\"
                   },
              \"datePublished\" : \"{$datePublished}\",
              \"dateModified\": \"{$dateModified}\",
              \"image\": { 
                  \"@type\": \"ImageObject\",
                  \"url\": \"{$imageurl}\",
                  \"width\": \"{$imagewidth}\",
                  \"height\": \"{$imageheight}\"
                  },
              \"articleSection\" : \"{$articleSection}\",
              \"url\" : \"{$url}\",
              \"publisher\" : {
                   \"@type\" : \"{$publisherType}\",
                   \"name\" : \"{$publisherName}\",
                   \"logo\": { 
                        \"@type\": \"ImageObject\",
                        \"url\": \"{$logo}\",
                        \"width\": 310,
                        \"height\": 39
                        }
                   },
              \"headline\": \"{$headline}\"
              ";
            echo '<script type="application/ld+json">{'.$json.'}</script>';
        endwhile; endif;
        rewind_posts();
    }
}

?>