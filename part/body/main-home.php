<?php
error_reporting(E_ALL & ~E_NOTICE);
?>

<?php
if (is_category()) {
    $category = get_category($cat);
    $cat_id   = $category->cat_ID;
    $cat_name = $category->cat_name;
    $cat_slug = $category->slug;
}
if (is_archive()) {
    $postType = get_queried_object();
}
if (is_tag()) {
    $tag_name = single_tag_title("", false);
}
if (is_tax()) {
    $taxonomy = $wp_query->get_queried_object();
    $tax_name = $taxonomy->name;
    $tax_slug = $taxonomy->slug;
    $tax_id = $taxonomy->term_id;
}
if (is_search()) {
    $search_word = get_search_query();
}
if (is_month()) {
    $year = get_query_var('year');
    $month = get_query_var('monthnum');
    $month_title = $year . "年" . $month . "月";
}
if (is_author()) {
    $author = get_the_author();
}
?>

<main class="max-w-screen mx-auto 1200:w-1200" data-title="<?php bloginfo('name'); ?>">

    <?php if (is_archive()) : ?>
        <div class="rounded-xl shadow-xl bg-gray-900 py-12 mb-6"
    <?php
        if (is_single()) {
            
        }
        if (is_tag()) {
            echo "tag " . $tag_name;
        }
        if (is_tax()) {
            echo $tax_slug;
        }
        if (is_search()) {
            echo "search";
        }
        if (is_month()) {
            echo "month";
        }
        if (is_author()) {
            echo "author";
        }
    ?>">

            <div class="w-auto mx-auto px-8 pt-0 text-center flex items-center justify-between flex-col lg:flex-row">
                <?php if (is_tax()) {
                    $term_idsp = "games_" . $tax_id;
                    $package = get_field('package', $term_idsp);
                    $packagesp = wp_get_attachment_image_src($package, 'full');
                } ?>

                <div class="mx-auto lg:ml-0 lg:mr-auto px-10 lg:py-0 lg:pl-0">
                    <h1 class="text-white text-2xl font-bold">
                        <?php
                        if (is_category()) {
                            echo $cat_name;
                        }
                        if (is_archive()) {
                            echo esc_html($postType->labels->singular_name);
                        }
                        if (is_tag()) {
                            echo $tag_name;
                        }
                        if (is_tax()) {
                            echo $tax_name . "のニュース・役立ち記事一覧";

                            if (is_search()) {
                                echo " / ";
                            }
                        }
                        if (is_search()) {
                            echo "「" . $search_word . "」" . "を含む記事";
                        }
                        if (is_month()) {
                            echo $month_title . "の記事";
                        }
                        if (is_author()) {
                            echo $author . "が投稿した記事";
                        }
                        ?>
                    </h1>
                    <div class="w-auto text-white border-b border-white my-3 lg:mb-0"></div>
                    <?php
                    if (is_category()) {
                        echo category_description();
                    }
                    if (is_archive() && !is_tax() && !is_tag()) {
                        echo "<p class=\"text-white\">" . $postType->labels->singular_name . "の一覧です。</p>";
                    }
                    if (is_search()) {
                        echo "<p class=\"text-white\">" . $wp_query->found_posts . "件の記事が見つかりました。</p>";
                    }
                    if (is_tag()) {
                        echo "<p class=\"text-white\">「" . $tag_name . "」タグが付けられた記事は" . $wp_query->found_posts . "件あります。</p>";
                    }
                    if (is_month()) {
                        echo "<p class=\"text-white\">" . $month_title . "に投稿された記事は" . $wp_query->found_posts . "件あります</p>";
                    }
                    if (is_author()) {
                        echo "<p class=\"text-white\">" . $author . "が投稿した記事は" . $wp_query->found_posts . "件あります</p>";
                    }
                    ?>
                </div>
                <?php if (is_tax()) : ?>
                    <div class="w-64">
                        <img src="<?php echo $packagesp[0]; ?>" />
                    </div>
                <?php endif; ?>

            </div>
        </div>
    <?php endif; ?>


    <div class="px-6 max-w-1400 mx-auto grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-8">
        <?php $counter = "";
        if (have_posts()) : while (have_posts()) : the_post();
                $counter++; ?>
                <?php get_template_part('part/post/post'); ?>
        <?php endwhile;
        endif; ?>
    </div>
    <?php if (function_exists('wp_pagenavi')) {
        wp_pagenavi();
    } ?>
</main>