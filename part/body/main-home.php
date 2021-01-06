<?php if (is_archive() || is_search()) : ?>
    <div class="rounded-2xl shadow-xl bg-gray-900 py-8 mb-6" <?php
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
                                                                ?>>

        <div class="w-auto mx-auto px-8 pt-0 text-center flex items-center justify-between flex-col lg:flex-row">

            <div class="mb-4 lg:mb-0 mx-auto lg:ml-0 lg:mr-auto px-10 lg:py-0 lg:pl-0">
                <h1 class="text-center lg:text-left text-white text-2xl font-bold">
                    <?php
                    if (is_category() && (!is_tax() || !is_post_type_archive())) {
                        $category = get_category($cat);
                        $cat_id   = $category->cat_ID;
                        $cat_name = $category->cat_name;
                        $cat_slug = $category->slug;
                        echo $cat_name;
                    }
                    if (is_post_type_archive() && !is_tax()) {
                        $taxonomy = $wp_query->get_queried_object();
                        $tax_name = $taxonomy->labels->singular_name;
                        echo $tax_name . "一覧";
                    }
                    if (is_tag()) {
                        $tag_name = single_tag_title("", false);
                        echo $tag_name . "タグが付いた記事一覧";
                    }
                    if (is_tax() && !is_post_type_archive()) {
                        $taxonomy = $wp_query->get_queried_object();
                        $tax_name = $taxonomy->name;
                        $tax_slug = $taxonomy->slug;
                        $tax_id = $taxonomy->term_id;
                        echo $tax_name . "のニュース・役立ち記事一覧";

                        if (is_search()) {
                            echo " / ";
                        }
                    }
                    if (is_search()) {
                        $search_word = get_search_query();
                        echo "「" . $search_word . "」" . "を含む記事";
                    }
                    if (is_month()) {
                        $year = get_query_var('year');
                        $month = get_query_var('monthnum');
                        $month_title = $year . "年" . $month . "月";
                        echo $month_title . "の記事";
                    }
                    if (is_author()) {
                        $author = get_the_author();
                        echo $author . "が投稿した記事";
                    }
                    ?>
                </h1>
            </div>
            <?php if (is_tax()) {
                $term_idsp = "games_" . $tax_id;
                $package = get_field('package', $term_idsp);
                $packagesp = wp_get_attachment_image_src($package, 'full');
            } ?>
            <?php if (is_tax()) : ?>
                <div class="w-64 rounded-xl overflow-hidden">
                    <img alt="パッケージ画像" src="<?php echo $packagesp[0]; ?>" />
                </div>
            <?php endif; ?>

        </div>
    </div>
<?php endif; ?>


<div class="mx-auto grid grid-cols-1 md:grid-cols-2 gap-x-4 gap-y-6">
    <?php $counter = "";
    if (have_posts()) : while (have_posts()) : the_post();
            $counter++; ?>
            <?php get_template_part('part/post/post'); ?>
    <?php endwhile;
    endif; ?>
</div>
<?php if (function_exists('wp_pagenavi')) : ?>
    <div class="mt-10"><?php wp_pagenavi(); ?></div>
<?php endif; ?>