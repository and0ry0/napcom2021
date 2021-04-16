<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

    <meta name="mobile-web-app-capable" content="yes">

    <meta name="format-detection" content="telephone=no,address=no,email=no">

    <?php get_template_part(('part/head/icon')); ?>

    <?php if (is_single()) : ?>
        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                <link rel="alternate" hreflang="ja" href="<?php the_permalink(); ?>">
            <?php endwhile; ?>
        <?php endif; ?>
    <?php elseif (is_home()) : ?>
        <link rel="alternate" hreflang="ja" href="<?php echo home_url(); ?>">
    <?php endif; ?>

    <meta name="author" content="sasigume">

    <?php if (is_home()) : ?>
        <meta name="description" content="<?php echo bloginfo('description') ?>">
    <?php endif; ?>

    <title>
        <?php if (is_home()) : ?>
            <?php bloginfo('name'); ?><?php if (get_query_var('paged')) : ?><?php echo ' - ページ' . get_query_var('paged'); ?><?php endif; ?>

        <?php elseif (is_page()) : ?>
            <?php wp_title(''); ?> ｜ <?php bloginfo('name'); ?>

        <?php elseif (is_single()) : ?>

            <?php wp_title(''); ?>

            <?php $terms = get_the_terms($post->ID, 'games');
            if ($terms && !is_wp_error($terms)) : ?>
                <?php foreach ($terms as $term) : ?>
                    <?php if ($term->name == 'Minecraft') : ?>
                        [<?php echo $term->name; ?>]
                    <?php endif; ?>
                <?php endforeach; ?>
                <?php endif; ?>｜ <?php bloginfo('name'); ?>

            <?php elseif (is_archive() && !is_tax() && !is_tag()) : ?>
                <?php $postType = get_queried_object(); ?>
                <?php echo esc_html($postType->labels->singular_name); ?>一覧 ｜ <?php bloginfo('name'); ?>

            <?php elseif (is_tag()) : ?>
                <?php single_tag_title() ?>タグがついた記事 ｜ <?php bloginfo('name'); ?>

            <?php elseif (is_tax()) : ?>
                <?php
                $taxonomy = $wp_query->get_queried_object();
                $tax_name = $taxonomy->name;
                echo $tax_name;
                ?>のニュース・役立ち記事一覧 | <?php bloginfo('name'); ?>

            <?php elseif (is_author()) : ?>
                <?php the_author(); ?>が投稿した記事一覧 ｜ <?php bloginfo('name'); ?>

            <?php elseif (is_month()) : ?>
                <?php the_time("Y年m月") ?>の記事一覧 ｜ <?php bloginfo('name'); ?>

            <?php elseif (is_year()) : ?>
                <?php the_time("Y年") ?>の記事一覧 ｜ <?php bloginfo('name'); ?>

            <?php elseif (is_search()) : ?>
                <?php echo get_search_query(); ?> を含む記事 ｜ <?php bloginfo('name'); ?>

            <?php elseif (is_404()) : ?>
                404 Not found - お探しのページは見つかりませんでした | <?php bloginfo('name'); ?>

            <?php else : ?>
                <?php bloginfo('name'); ?>

            <?php endif; ?>
    </title>
    <?php if (function_exists('get_field') && get_field('hide_adsense') == true) : ?>

        <script>
            dataLayer = [{
                'hideAdsense': 'true'
            }];
        </script>
    <?php endif; ?>

    <?php wp_head(); ?>

</head>