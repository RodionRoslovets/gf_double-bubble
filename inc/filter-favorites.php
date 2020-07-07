<?php

add_action('wp_enqueue_scripts', 'add_favorites_filter');
function add_favorites_filter()
{
    global $wp_query;

    wp_register_script('favorites_filter', get_stylesheet_directory_uri() . '/assets/js/favorites_filter.js', array('jquery'), '', true);

    wp_localize_script('favorites_filter', 'favorites_data', array(
        'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php',
        'posts' => json_encode($wp_query->query_vars),

    ));
    wp_enqueue_script('favorites_filter');
}


// Приём и обработка запроса
add_action('wp_ajax_favorites_filter', 'favorites_filter');
add_action('wp_ajax_nopriv_favorites_filter', 'favorites_filter');

function favorites_filter()
{

    $favorites = get_user_favorites();

    if ($favorites) {

        $args = array(
            'post__in' => $favorites,
            'post_type'   => $_POST['filterBy'],
        );

        $posts = query_posts($args);

        if ($posts) {
            foreach ($posts as $post) {
                the_post();
?>

                <div class="col-lg-4 col-sm-6 d-flex justify-content-center">
                    <div class="restaurants-preview__item">
                        <a href="<?php the_permalink(); ?>" class="restaurants-preview__item_image">
                            <?php the_post_thumbnail(array(270,175)); ?>
                        </a>

                        <div class="restaurants-preview__item_content">
                            <a href="<?php the_permalink(); ?>">
                                <h5><?php the_title(); ?></h5>
                            </a>
                            <?php the_excerpt(); ?>
                            <div class="rating-group">
                                <?php echo do_shortcode('[average_rating]') ?>
                            </div>
                        </div>
                        <?php echo do_shortcode('[favorite_button]') ?>
                    </div>
                </div>

<?php
            }

            wp_reset_postdata();
        } else {
            echo '<p>Nothing found for your criteria.</p>';
        }
    } else {
        echo '<p>Nothing found for your criteria.</p>';
    }

    wp_die();
}
